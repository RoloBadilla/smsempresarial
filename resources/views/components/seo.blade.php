{{-- Etiquetas SEO de cada página: descripción, canonical, Open Graph, Twitter y datos estructurados (JSON-LD).
     Cada página solo pasa su título, descripción y, si no es la portada, el nombre para la miga de pan. --}}
@props(['title', 'description', 'breadcrumb' => null])

@php
    $sitio = config('sitio');
    $dominio = rtrim($sitio['url'], '/');
    $inicio = $dominio.'/';
    $url = request()->routeIs('home') ? $inicio : $dominio.'/'.ltrim(request()->path(), '/');

    $pagina = [
        '@type' => 'WebPage',
        '@id' => $url.'#webpage',
        'url' => $url,
        'name' => $title,
        'description' => $description,
        'inLanguage' => $sitio['idioma'],
        'isPartOf' => ['@id' => $inicio.'#website'],
    ];

    $grafo = [
        [
            '@type' => 'Organization',
            '@id' => $inicio.'#organization',
            'name' => $sitio['nombre'],
            'url' => $inicio,
            'telephone' => $sitio['telefono'],
            'email' => $sitio['correo'],
            'areaServed' => $sitio['pais'],
        ],
        [
            '@type' => 'WebSite',
            '@id' => $inicio.'#website',
            'url' => $inicio,
            'name' => $sitio['nombre'],
            'inLanguage' => $sitio['idioma'],
            'publisher' => ['@id' => $inicio.'#organization'],
        ],
    ];

    if ($breadcrumb) {
        $pagina['breadcrumb'] = ['@id' => $url.'#breadcrumb'];
        $grafo[] = $pagina;
        $grafo[] = [
            '@type' => 'BreadcrumbList',
            '@id' => $url.'#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Inicio', 'item' => $inicio],
                ['@type' => 'ListItem', 'position' => 2, 'name' => $breadcrumb, 'item' => $url],
            ],
        ];
    } else {
        $grafo[] = $pagina;
    }

    $jsonLd = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $grafo],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG,
    );
@endphp

<meta name="description" content="{{ $description }}">
@if (app()->environment('local', 'testing'))
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index,follow,max-image-preview:large">
@endif
<link rel="canonical" href="{{ $url }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ $sitio['og_locale'] }}">
<meta property="og:site_name" content="{{ $sitio['nombre'] }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $url }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<script type="application/ld+json">{!! $jsonLd !!}</script>
