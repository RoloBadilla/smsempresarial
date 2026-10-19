<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SiteController extends Controller
{
    private const PAGES = [
        'caracteristicas',
        'faq',
        'rutasytarifas',
        'contactanos',
    ];

    public function home(): View
    {
        return view('pages.home', ['pagina' => 'home']);
    }

    public function show(string $page): View
    {
        abort_unless(in_array($page, self::PAGES, true), 404);

        return view('pages.'.$page, ['pagina' => $page]);
    }
}
