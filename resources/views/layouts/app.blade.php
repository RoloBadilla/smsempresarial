<!doctype html>
<html lang="es" data-theme="dark" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title')</title>
    @yield('seo')
    @if (app()->environment('local', 'testing'))
        <meta name="robots" content="noindex, nofollow">
    @endif
    {{-- Tema antes de pintar: elección guardada, si no la del sistema (oscuro si no hay preferencia clara). --}}
    <script>
        (function () {
            var root = document.documentElement, theme = null;
            try { theme = localStorage.getItem('tema'); } catch (e) {}
            if (theme !== 'light' && theme !== 'dark') {
                theme = window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
            }
            root.setAttribute('data-theme', theme);
            root.setAttribute('data-bs-theme', theme);
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) root.classList.add('motion-ok');
        })();
    </script>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @php
        $pageStyles = [
            'home' => 'resources/css/pages/home.css',
            'caracteristicas' => 'resources/css/pages/features.css',
            'faq' => 'resources/css/pages/faq.css',
            'contactanos' => 'resources/css/pages/contact.css',
            'rutasytarifas' => 'resources/css/pages/rates.css',
        ];
    @endphp
    @vite(['resources/css/site-shared.css', $pageStyles[$pageKey]])
</head>
<body>
    <x-header :page="$pageKey" />
    @yield('content')
    <x-footer :variant="$footerVariant" />
    <x-whatsapp-button />
    @vite('resources/js/site.js')
    @if ($pageKey === 'faq')
        @vite('resources/js/pages/faq.js')
    @elseif ($pageKey === 'rutasytarifas')
        @vite('resources/js/pages/rates.js')
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
