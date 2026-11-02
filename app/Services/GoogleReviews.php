<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Reseñas de Google Business Profile para la portada.
 */
class GoogleReviews
{
    private const STARS = ['ONE' => 1, 'TWO' => 2, 'THREE' => 3, 'FOUR' => 4, 'FIVE' => 5];

    public function enabled(): bool
    {
        $config = config('services.google_reviews');

        return filled($config['client_id']) && filled($config['client_secret']) && filled($config['refresh_token'])
            && filled($config['account_id']) && filled($config['location_id']);
    }

    /**
     * Promedio, total y las 6 reseñas más recientes con comentario. Se guarda 6 horas en caché
     * para no llamar a Google en cada visita. Si algo falla devuelve null y la vista usa sus valores fijos.
     *
     * @return array{average: float, total: int, reviews: list<array{author: string, photo: ?string, rating: int, comment: string, date: string}>}|null
     */
    public function summary(): ?array
    {
        if (! $this->enabled()) {
            return null;
        }

        $cached = Cache::get('google.reviews');

        if (is_array($cached)) {
            return $cached;
        }

        try {
            $config = config('services.google_reviews');

            $data = Http::withToken($this->accessToken())
                ->timeout(8)
                ->get("https://mybusiness.googleapis.com/v4/accounts/{$config['account_id']}/locations/{$config['location_id']}/reviews", [
                    'pageSize' => 20,
                    'orderBy' => 'updateTime desc',
                ])
                ->throw()
                ->json();
        } catch (Throwable $e) {
            Log::warning('No se pudieron obtener las reseñas de Google: '.$e->getMessage());

            return null;
        }

        $summary = [
            'average' => round((float) ($data['averageRating'] ?? 0), 1),
            'total' => (int) ($data['totalReviewCount'] ?? 0),
            'reviews' => collect($data['reviews'] ?? [])
                ->filter(fn (array $review) => filled($review['comment'] ?? null))
                ->take(6)
                ->map(fn (array $review) => [
                    'author' => $review['reviewer']['displayName'] ?? 'Cliente de Google',
                    'photo' => $review['reviewer']['profilePhotoUrl'] ?? null,
                    'rating' => self::STARS[$review['starRating'] ?? ''] ?? 5,
                    'comment' => $this->originalComment($review['comment']),
                    'date' => $review['createTime'] ?? '',
                ])
                ->values()
                ->all(),
        ];

        Cache::put('google.reviews', $summary, now()->addHours(6));

        return $summary;
    }

    private function accessToken(): string
    {
        return Cache::remember('google.access_token', now()->addMinutes(50), function () {
            $config = config('services.google_reviews');

            return Http::asForm()->timeout(8)->post('https://oauth2.googleapis.com/token', [
                'client_id' => $config['client_id'],
                'client_secret' => $config['client_secret'],
                'refresh_token' => $config['refresh_token'],
                'grant_type' => 'refresh_token',
            ])->throw()->json('access_token');
        });
    }

    /**
     * Google agrega su traducción automática al comentario; se deja solo el texto original.
     */
    private function originalComment(string $comment): string
    {
        if (preg_match('/\(Original\)\s*(.+)$/s', $comment, $matches)) {
            return trim($matches[1]);
        }

        return trim(preg_replace('/\s*\(Translated by Google\).*$/s', '', $comment));
    }
}
