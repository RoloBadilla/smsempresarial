<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\CyberfuelLeads;
use App\Services\GoogleReviews;
use App\Services\Recaptcha;
use Illuminate\View\View;

class SiteController extends Controller
{
    private const PAGES = [
        'caracteristicas',
        'faq',
        'rutasytarifas',
        'contactanos',
    ];

    public function home(GoogleReviews $reviews): View
    {
        return view('pages.home', [
            'reviews' => $reviews->summary(),
        ]);
    }

    public function show(string $page): View
    {
        abort_unless(in_array($page, self::PAGES, true), 404);

        $footerVariant = match ($page) {
            'contactanos' => 'contact',
            'rutasytarifas' => 'rates',
            default => 'marketing',
        };

        $data = [
            'pageKey' => $page,
            'footerVariant' => $footerVariant,
        ];

        if ($page === 'contactanos') {
            $data += [
                'temas' => ContactRequest::TEMAS,
                'medios' => app(CyberfuelLeads::class)->mediosComerciales(),
                'recaptchaKey' => app(Recaptcha::class)->siteKey(),
            ];
        }

        return view('pages.'.$page, $data);
    }
}
