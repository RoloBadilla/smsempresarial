<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Verificación de reCAPTCHA v3 con Google.
 */
class Recaptcha
{
    public function enabled(): bool
    {
        return filled(config('services.recaptcha.site_key')) && filled(config('services.recaptcha.secret_key'));
    }

    public function siteKey(): ?string
    {
        return config('services.recaptcha.site_key');
    }

    /**
     * Sin claves configuradas solo se deja pasar en local y en pruebas;
     * en producción eso es un error de configuración y el envío se rechaza.
     */
    public function verify(?string $token, string $action, ?string $ip = null): bool
    {
        if (! $this->enabled()) {
            if (app()->environment('local', 'testing')) {
                return true;
            }

            Log::error('reCAPTCHA sin configurar: faltan RECAPTCHA_SITE_KEY o RECAPTCHA_SECRET_KEY.');

            return false;
        }

        if (blank($token)) {
            return false;
        }

        try {
            $result = Http::asForm()->timeout(8)->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $token,
                'remoteip' => $ip,
            ])->json();
        } catch (Throwable $e) {
            Log::warning('No se pudo verificar reCAPTCHA: '.$e->getMessage());

            return false;
        }

        return ($result['success'] ?? false) === true
            && ($result['action'] ?? null) === $action
            && ($result['score'] ?? 0) >= config('services.recaptcha.min_score');
    }
}
