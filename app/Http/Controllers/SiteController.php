<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('pages.home');
    }

    public function show(string $page): View
    {
        abort_unless(in_array($page, self::PAGES, true), 404);

        $footerVariant = match ($page) {
            'contactanos' => 'contact',
            'rutasytarifas' => 'rates',
            default => 'marketing',
        };

        return view('pages.'.$page, [
            'pageKey' => $page,
            'footerVariant' => $footerVariant,
        ]);
    }

    public function contact(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'empresa' => ['nullable', 'string', 'max:160'],
            'correo' => ['required', 'email', 'max:255'],
            'tema' => ['required', 'string', 'max:120'],
            'mensaje' => ['required', 'string', 'max:5000'],
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar 120 caracteres.',
            'empresa.max' => 'La empresa no puede superar 160 caracteres.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede superar 255 caracteres.',
            'tema.required' => 'Selecciona un tema.',
            'tema.max' => 'El tema no puede superar 120 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.max' => 'El mensaje no puede superar 5000 caracteres.',
        ]);

        $company = $request->input('empresa') ?: 'No indicada';
        $subject = rawurlencode('Consulta web: '.$request->input('tema'));
        $body = rawurlencode(implode("\n", [
            'Nombre: '.$request->input('nombre'),
            'Empresa: '.$company,
            'Correo: '.$request->input('correo'),
            'Tema: '.$request->input('tema'),
            '',
            'Mensaje:',
            $request->input('mensaje'),
        ]));

        return redirect()->away("mailto:info@cyberfuel.com?subject={$subject}&body={$body}");
    }
}
