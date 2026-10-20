<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Servicios web de Cyberfuel: registrar leads del formulario y listar los medios comerciales.
 */
class CyberfuelLeads
{
    public function enabled(): bool
    {
        return filled(config('services.cyberfuel_leads.usuario')) && filled(config('services.cyberfuel_leads.clave'));
    }

    /**
     * Nombres para "¿Cómo te enteraste de nosotros?". Se guardan un día en caché;
     * si el servicio falla devuelve [] y el formulario no muestra la pregunta.
     *
     * @return list<string>
     */
    public function mediosComerciales(): array
    {
        $config = config('services.cyberfuel_medios');

        if (blank($config['usuario']) || blank($config['clave'])) {
            return [];
        }

        $medios = Cache::get('cyberfuel.medios_comerciales');

        if (is_array($medios)) {
            return $medios;
        }

        try {
            $info = Http::timeout(8)->post($config['url'], [
                'usuario' => $config['usuario'],
                'clave' => $config['clave'],
            ])->throw()->json('info');
        } catch (Throwable $e) {
            Log::warning('No se pudieron obtener los medios comerciales: '.$e->getMessage());

            return [];
        }

        $medios = collect(is_array($info) ? $info : [])
            ->pluck('nombre')
            ->filter(fn ($nombre) => is_string($nombre) && $nombre !== '')
            ->unique()
            ->values()
            ->all();

        if ($medios !== []) {
            Cache::put('cyberfuel.medios_comerciales', $medios, now()->addDay());
        }

        return $medios;
    }

    /**
     * @param  array<string, string>  $lead
     */
    public function send(array $lead): bool
    {
        $config = config('services.cyberfuel_leads');

        try {
            $response = Http::timeout(15)->post($config['url'], [
                'usuario' => $config['usuario'],
                'clave' => $config['clave'],
                'producto' => $config['producto'],
                'canal' => 'Formulario contacto',
                'campania' => 'sitio_web',
                'desestimado' => 'no',
                'razon_desestimado' => '',
                'fecha_creacion' => now()->format('Y-m-d H:i:s'),
                ...$lead,
            ]);
        } catch (Throwable $e) {
            Log::error('Error al enviar el lead a Cyberfuel: '.$e->getMessage());

            return false;
        }

        if ($response->failed()) {
            Log::error('El servicio de leads respondió '.$response->status().': '.$response->body());

            return false;
        }

        return true;
    }
}
