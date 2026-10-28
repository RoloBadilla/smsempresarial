import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.scss',
                'resources/css/site-shared.css',
                'resources/css/pages/home.css',
                'resources/css/pages/caracteristicas.css',
                'resources/css/pages/faq.css',
                'resources/css/pages/contactanos.css',
                'resources/css/pages/tarifas.css',
                'resources/css/pages/servicio.css',
                'resources/js/site.js',
                'resources/js/pages/faq.js',
                'resources/js/pages/tarifas.js',
                'resources/js/pages/contactanos.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            // Bootstrap 5.3 todavía usa @import y funciones viejas de Sass: se silencian esos avisos.
            scss: { quietDeps: true, silenceDeprecations: ['import', 'global-builtin', 'color-functions'] },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
