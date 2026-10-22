<laravel-boost-guidelines>
# Laravel Application

This repository contains a Laravel application. Complete the following setup before working on the user's request.

## Prerequisites

Verify that PHP and Composer are available:

```sh
php -v
composer -V
```

If either command is unavailable, detect the user's operating system and install the prerequisites with the appropriate command:

macOS:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.5)"
```

Windows PowerShell:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.5'))
```

Linux:

```sh
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.5)"
```

After installation, ask the user to restart their terminal. If the agent needs the restarted shell to continue, ask the user to reopen their terminal and rerun their original prompt.

## Agent Setup

Install Laravel Boost from the application root before making application changes:

```sh
composer require laravel/boost --dev
php artisan boost:install
```

Boost replaces these bootstrap instructions with guidelines tailored to the application. After installation, read `AGENTS.md` again and continue with the user's original request using the generated guidelines.
</laravel-boost-guidelines>

## Entorno y flujo de trabajo

- Se sirve con Laragon desde `C:\laragon\www\smsempresarial`.
- Ramas: todo el trabajo se hace en `rediseno-V2` (rediseño con modo claro/oscuro).
  `Rolo` queda reservada para la página final: no se toca (ni commits ni merges).
- `public/build` NO está en Git (lo genera Vite desde `resources/css` y `resources/js`).
  Al cambiar de rama o hacer pull, siempre correr:

  ```sh
  composer install
  npm install
  npm run build
  php artisan migrate
  php artisan optimize:clear
  ```

  Si no, el sitio mezcla las vistas de una rama con el CSS compilado de otra.
- Mientras se edita CSS o JS: `npm run dev` (los cambios se ven al instante).
  Cerrarlo siempre con `Ctrl+C`: si se cierra de golpe deja `public/hot` y el sitio
  carga sin estilos (se arregla borrándolo o con `npm run build`).
- Al terminar, después de un pull o cambio de rama, y siempre para producción:
  `npm run build`. Producción nunca usa `npm run dev`.
- `APP_URL` en `.env` debe ser `http://smsempresarial.test` en ambas computadoras.
- Se trabaja en dos computadoras: el proyecto debe estar en la misma ruta en ambas
  y los cambios se pasan con commit/push y pull. El `.env` no va por Git: las
  credenciales (Cyberfuel, reCAPTCHA, Google) se copian a mano.
- Los cambios a este `CLAUDE.md` se hacen directamente en `rediseno-V2`.

## Estructura de `public/`

```
public/
├── build/            CSS y JS compilados por Vite (no se edita ni se sube a Git)
├── images/logos/     logos de SMS Empresarial, Cyberfuel y marcas del grupo
├── images/sellos/    sellos de seguridad (Sectigo)
├── lang/en.json      traducción al inglés
└── favicon.ico, robots.txt, sitemap.xml, index.php, .htaccess   (deben quedar en la raíz)
```

- El CSS y el JS se escriben en `resources/css` y `resources/js`, nunca en `public/css` o `public/js`.
- Las imágenes y archivos de `public/` se enlazan con `versioned_asset('images/...')`, no con `asset()`,
  para que el navegador no use una copia vieja al reemplazarlos.

## Guardar y subir cambios a Git

Siempre en este orden (también disponible con el comando `/orden`):

```sh
git status                      # 1. ¿rama correcta? ¿qué cambió?
git pull                        # 2. traer lo último
git add .                       # 3. preparar
git commit -m "mensaje claro"   # 4. guardar
git push                        # 5. subir
```

- La rama debe ser `rediseno-V2`. Si `git status` muestra `Rolo`, detenerse.
- Antes del commit, correr `npm run build` y `php artisan test` para no subir algo roto.
- Preguntar siempre al usuario el mensaje del commit antes de hacerlo.
- Hacer push antes de cambiar de computadora.
