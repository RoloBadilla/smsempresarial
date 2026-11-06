<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Abre la aplicación de correo del visitante con su consulta lista para enviar a info@cyberfuel.com.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $subject = rawurlencode('Consulta web: '.$data['tema']);
        $body = rawurlencode(implode("\n", [
            'Nombre: '.$data['nombre'],
            'Empresa: '.(($data['empresa'] ?? null) ?: 'No indicada'),
            'Correo: '.$data['correo'],
            'Tema: '.$data['tema'],
            '',
            'Mensaje:',
            $data['mensaje'],
        ]));

        return redirect()->away("mailto:info@cyberfuel.com?subject={$subject}&body={$body}");
    }
}
