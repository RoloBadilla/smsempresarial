<?php

namespace App\Http\Requests;

use App\Services\CyberfuelLeads;
use Closure;
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
     * El teléfono llega con o sin espacios/guiones; se valida solo con los dígitos.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'telefono' => preg_replace('/\D+/', '', (string) $this->input('telefono')),
            'country_code' => preg_replace('/\D+/', '', (string) $this->input('country_code', '506')) ?: '506',
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $medios = app(CyberfuelLeads::class)->mediosComerciales();

        return [
            'nombre' => ['required', 'string', 'max:120'],
            'empresa' => ['nullable', 'string', 'max:160'],
            'correo' => ['required', 'email', 'max:255'],
            'country_code' => ['required', 'digits_between:1,4'],
            'telefono' => ['required', 'digits_between:6,15', function (string $attribute, string $value, Closure $fail) {
                if ($this->input('country_code') === '506' && ! preg_match('/^[245678]\d{7}$/', $value)) {
                    $fail('El teléfono de Costa Rica debe tener 8 dígitos y empezar con 2, 4, 5, 6, 7 u 8.');
                }
            }],
            'tema' => ['required', Rule::in(self::TEMAS)],
            'medio' => $medios === [] ? ['nullable', 'string', 'max:120'] : ['required', Rule::in($medios)],
            'otro' => ['required_if:medio,Otro', 'nullable', 'string', 'max:120'],
            'mensaje' => ['required', 'string', 'max:5000'],
            'recaptcha_token' => ['nullable', 'string'],
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
            'country_code.*' => 'Selecciona el país del teléfono.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'Ingresa un teléfono válido.',
            'tema.required' => 'Selecciona un tema.',
            'tema.in' => 'Selecciona un tema de la lista.',
            'medio.required' => 'Cuéntanos cómo te enteraste de nosotros.',
            'medio.in' => 'Selecciona una opción de la lista.',
            'otro.required_if' => 'Indica cómo te enteraste de nosotros.',
            'otro.max' => 'La respuesta no puede superar 120 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.max' => 'El mensaje no puede superar 5000 caracteres.',
        ];
    }
}
