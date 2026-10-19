<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0A1A3A">
  <meta name="diccionario-en" content="{{ asset('lang/en.json') }}">
  <title>@yield('titulo', 'SMS Empresarial')</title>
  @if (app()->environment('local', 'testing'))
    <meta name="robots" content="noindex, nofollow">
  @endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Unbounded:wght@500;700;800&family=Onest:wght@400;500;700&display=swap">
  @include('partials.preferencias')
  @vite(['resources/css/base.css', 'resources/css/paginas.css'])
  <link rel="icon" href="{{ asset('img/iconos/sms.svg') }}" type="image/svg+xml">
</head>
<body>
  <a class="saltar" href="#contenido">Saltar al contenido</a>

  @include('partials.header')

  @yield('contenido')

  @include('partials.footer')

  @vite('resources/js/sitio.js')
</body>
</html>
