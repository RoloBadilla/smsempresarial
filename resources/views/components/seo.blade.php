{{-- Etiquetas SEO de cada página: descripción, canonical, Open Graph, Twitter y datos estructurados (JSON-LD).
     Cada página pasa su título, descripción y, si no es la portada, el nombre para la miga de pan.
     "schema" (opcional) agrega nodos propios de la página al grafo, por ejemplo FAQPage o Service. --}}
@props(['title', 'description', 'breadcrumb' => null, 'schema' => []])

@php
    $sitio = config('sitio');
    $dominio = rtrim($sitio['url'], '/');
    $inicio = $dominio.'/';
    $url = request()->routeIs('home') ? $inicio : $dominio.'/'.ltrim(request()->path(), '/');
    $imagen = $dominio.'/'.ltrim($sitio['imagen_compartir'], '/');

    $pagina = [
        '@type' => 'WebPage',
        '@id' => $url.'#webpage',
        'url' => $url,
        'name' => $title,
        'description' => $description,
        'inLanguage' => $sitio['idioma'],
        'isPartOf' => ['@id' => $inicio.'#website'],
        'about' => ['@id' => $inicio.'#organization'],
        'primaryImageOfPage' => $imagen,
    ];

    $grafo = [
        [
            // Organization + LocalBusiness: empresa con oficina en Costa Rica.
            '@type' => ['Organization', 'LocalBusiness'],
            '@id' => $inicio.'#organization',
            'name' => $sitio['nombre'],
            'alternateName' => 'SMSEmpresarial.com',
            'description' => $sitio['descripcion'],
            'url' => $inicio,
            'logo' => asset($sitio['logo']),
            'image' => $imagen,
            'telephone' => $sitio['telefono'],
            'email' => $sitio['correo'],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $sitio['direccion']['calle'],
                'addressLocality' => $sitio['direccion']['ciudad'],
                'addressRegion' => $sitio['direccion']['provincia'],
                'addressCountry' => $sitio['direccion']['pais'],
            ],
            'areaServed' => ['@type' => 'Country', 'name' => $sitio['pais']],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'sales',
                'telephone' => $sitio['telefono'],
                'email' => $sitio['correo'],
                'availableLanguage' => ['es', 'en'],
            ],
            'parentOrganization' => [
                '@type' => 'Organization',
                'name' => $sitio['empresa_matriz']['nombre'],
                'url' => $sitio['empresa_matriz']['url'],
            ],
            'sameAs' => $sitio['redes'],
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

    array_push($grafo, ...$schema);

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
<meta property="og:image" content="{{ $imagen }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $sitio['nombre'] }}: SMS masivos y WhatsApp empresarial en Costa Rica">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $imagen }}">
<script type="application/ld+json">{!! $jsonLd !!}</script>
