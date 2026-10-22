# SMS Empresarial

Sitio web de [SMS Empresarial](https://smsempresarial.com), el servicio de SMS masivos y WhatsApp Business de Cyberfuel (Costa Rica).

Páginas: inicio, características, preguntas frecuentes, tarifas y contacto. El formulario de contacto envía los datos como lead al sistema de Cyberfuel.

## Tecnologías

- Laravel 13 (PHP 8.3+) con vistas Blade
- Vite para compilar el CSS y el JS
- Bootstrap 5 (solo los módulos que se usan) y CSS propio con modo claro/oscuro
- Pest para las pruebas

## Instalación

Requiere PHP, Composer y Node.js. En desarrollo se sirve con Laragon en `http://smsempresarial.test`.

```sh
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

Luego completar en `.env` las credenciales (no van en Git): Cyberfuel (leads y medios comerciales), reCAPTCHA y Google (reseñas). Sin reCAPTCHA el formulario funciona igual en local.

## Después de un pull o cambio de rama

```sh
composer install
npm install
npm run build
php artisan migrate
php artisan optimize:clear
```

## Desarrollo

- Mientras se edita CSS o JS: `npm run dev` (los cambios se ven al instante). Cerrarlo con `Ctrl+C`.
- Al terminar y para producción: `npm run build`.
- Pruebas: `php artisan test`.

## Dónde está cada cosa

| Qué | Dónde |
|---|---|
| Rutas | `routes/web.php` |
| Páginas | `resources/views/pages/` |
| Layout, menú, footers y componentes | `resources/views/layouts/` y `resources/views/components/` |
| CSS (colores y tipografía de marca en `site-shared.css`) | `resources/css/` |
| JS compartido (tema, idioma, animaciones...) | `resources/js/modules/` |
| JS de cada página | `resources/js/pages/` |
| Tarifas de SMS por país | `config/tarifas.php` |
| Datos de la empresa para SEO | `config/sitio.php` |
| Formulario de contacto | `app/Http/Controllers/ContactController.php` y `app/Http/Requests/ContactRequest.php` |
| Conexión con Cyberfuel, reCAPTCHA y reseñas de Google | `app/Services/` |
| Imágenes | `public/images/` |
| Traducción al inglés | `public/lang/en.json` |

Más detalles del flujo de trabajo (ramas, Git, dos computadoras) en `CLAUDE.md`.
