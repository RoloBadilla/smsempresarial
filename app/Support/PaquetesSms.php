<?php

namespace App\Support;

use Illuminate\Support\Collection;

/**
 * Paquetes de SMS para Costa Rica (config/tarifas.php). Lo usan Tarifas, el inicio, las preguntas frecuentes
 * y las páginas de cada servicio, para que todas muestren los mismos precios.
 */
class PaquetesSms
{
    /** Los paquetes con el precio total ya calculado (cantidad × precio por SMS), en dólares. */
    public static function todos(): Collection
    {
        return collect(config('tarifas.paquetes'))->map(fn (array $paquete) => $paquete + [
            'precio' => round($paquete['cantidad'] * (float) $paquete['precio_sms'], 2),
        ]);
    }

    /** El paquete más pequeño (el primero de la lista). */
    public static function inicial(): array
    {
        return self::todos()->first();
    }

    /** El precio por SMS más bajo, sin ceros de más: "0.00532". */
    public static function precioDesde(): string
    {
        return self::limpio(self::todos()->min(fn (array $paquete) => (float) $paquete['precio_sms']));
    }

    /** Quita los ceros de más de un precio: 0.00600 → "0.006". */
    public static function limpio(string|float $numero): string
    {
        return rtrim(rtrim(number_format((float) $numero, 5, '.', ''), '0'), '.');
    }

    /** Dólares con dos decimales y separador de miles: 1770 → "1,770.00". */
    public static function dolares(float $numero): string
    {
        return number_format($numero, 2, '.', ',');
    }

    /** Cantidad con separador de miles: 12000 → "12,000". */
    public static function miles(int $numero): string
    {
        return number_format($numero, 0, '.', ',');
    }
}
