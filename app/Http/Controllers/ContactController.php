<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\CyberfuelLeads;
use App\Services\Recaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(ContactRequest $request, Recaptcha $recaptcha, CyberfuelLeads $leads): RedirectResponse
    {
        $back = redirect()->to(route('site.page', 'contactanos').'#contacto')->withInput();

        if (! $recaptcha->verify($request->input('recaptcha_token'), 'contacto', $request->ip())) {
            return $back->withErrors(['recaptcha' => 'No pudimos verificar el envío. Intenta de nuevo.']);
        }

        if (! $leads->enabled()) {
            Log::error('Servicio de leads sin configurar: faltan CYBERFUEL_LEADS_USUARIO o CYBERFUEL_LEADS_CLAVE.');

            return $back->with('contact_error', true);
        }

        $data = $request->validated();
        $medio = ($data['medio'] ?? '') === 'Otro' ? 'Otro: '.$data['otro'] : ($data['medio'] ?? '');

        $sent = $leads->send([
            'nombre_contacto' => $data['nombre'],
            'empresa' => $data['empresa'] ?? '',
            'correo' => $data['correo'],
            'telefono' => '+'.$data['country_code'].'.'.$data['telefono'],
            'url_origen' => url()->previous(),
            'medio_comercial' => $medio,
            'comentario' => 'Tema: '.$data['tema']."\n\n".$data['mensaje'],
        ]);

        if (! $sent) {
            return $back->with('contact_error', true);
        }

        return redirect()->to(route('site.page', 'contactanos').'#contacto')->with('contact_sent', true);
    }
}
