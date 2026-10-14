<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('seo')
    @if (app()->environment('local', 'testing'))
        <meta name="robots" content="noindex, nofollow">
    @endif
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preload" href="{{ asset('assets/fonts/plus-jakarta-sans-latin.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @php
        $pageStyles = [
            'home' => 'resources/css/pages/home.css',
            'caracteristicas' => 'resources/css/pages/features.css',
            'faq' => 'resources/css/pages/faq.css',
            'contactanos' => 'resources/css/pages/contact.css',
            'rutasytarifas' => 'resources/css/pages/rates.css',
        ];
        $styleEntries = in_array($pageKey, ['home', 'caracteristicas', 'faq'], true)
            ? ['resources/css/site-shared.css', $pageStyles[$pageKey]]
            : [$pageStyles[$pageKey]];
    @endphp
    @vite($styleEntries)
</head>
<body>
    <x-header :page="$pageKey" />
    @yield('content')
    <x-footer :variant="$footerVariant" />
    <x-whatsapp-button :variant="$pageKey === 'rutasytarifas' ? 'rates' : ($pageKey === 'contactanos' ? 'contact' : 'default')" />
    @if ($pageKey === 'faq')
        @vite('resources/js/pages/faq.js')
    @elseif ($pageKey === 'rutasytarifas')
        @vite('resources/js/pages/rates.js')
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
