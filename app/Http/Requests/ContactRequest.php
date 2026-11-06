<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public const TEMAS = [
        'Información general',
        'Tarifas SMS',
        'WhatsApp Business',
        'Integración API',
        'Soporte',
    ];

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:120'],
            'empresa' => ['nullable', 'string', 'max:160'],
            'correo' => ['required', 'email', 'max:255'],
            'tema' => ['required', Rule::in(self::TEMAS)],
            'mensaje' => ['required', 'string', 'max:5000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar 120 caracteres.',
            'empresa.max' => 'La empresa no puede superar 160 caracteres.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede superar 255 caracteres.',
            'tema.required' => 'Selecciona un tema.',
            'tema.in' => 'Selecciona un tema de la lista.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.max' => 'El mensaje no puede superar 5000 caracteres.',
        ];
    }
}
