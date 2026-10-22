<!doctype html>
<html lang="es" data-theme="dark" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark light">
    <title>{{ $title }}</title>
    <x-seo :title="$title" :description="$description" :breadcrumb="$breadcrumb ?? null" />
    {{-- Tema e idioma antes de pintar (evita parpadeo). La lógica vive en un solo archivo, compartido con site.js. --}}
    <script>{!! file_get_contents(resource_path('js/inline/preferences.js')) !!}</script>
    <style>.traduciendo body { visibility: hidden; }</style>
    <meta name="diccionario-en" content="{{ versioned_asset('lang/en.json') }}">
    @php
        $pageStyles = [
            'home' => 'resources/css/pages/home.css',
            'caracteristicas' => 'resources/css/pages/caracteristicas.css',
            'faq' => 'resources/css/pages/faq.css',
            'contactanos' => 'resources/css/pages/contactanos.css',
            'tarifas' => 'resources/css/pages/tarifas.css',
        ];
        $pageScripts = [
            'faq' => 'resources/js/pages/faq.js',
            'contactanos' => 'resources/js/pages/contactanos.js',
            'tarifas' => 'resources/js/pages/tarifas.js',
        ];
    @endphp
    {{-- Un solo @vite en el head: todo el CSS (también el que importa el JS) llega antes de pintar.
         Los scripts son type="module", que esperan solos a que cargue la página: no bloquean. --}}
    @vite(array_filter([
        'resources/css/bootstrap.scss',
        'resources/css/site-shared.css',
        $pageStyles[$pageKey],
        'resources/js/site.js',
        $pageScripts[$pageKey] ?? null,
    ]))
</head>
<body>
    <x-header :page="$pageKey" />
    @yield('content')
    <x-footer :variant="$footerVariant" />
    @if ($pageKey !== 'contactanos')
        <x-lo-quiero-button />
    @endif
    <x-whatsapp-button />
</body>
</html>
