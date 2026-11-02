<?php

if (! function_exists('versioned_asset')) {
    /**
     * URL de un archivo de public/ con ?v=<fecha de modificación>.
     * Para archivos que no pasan por Vite (imágenes, diccionario de idioma): al reemplazarlos cambia
     * la URL, así el navegador no sigue usando la copia vieja que tiene en caché.
     */
    function versioned_asset(string $path): string
    {
        $file = public_path($path);

        return is_file($file) ? asset($path).'?v='.filemtime($file) : asset($path);
    }
}
