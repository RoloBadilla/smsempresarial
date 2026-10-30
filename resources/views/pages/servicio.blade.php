{{-- Página de un uso de la plataforma. El contenido sale de config/servicios.php (ver SiteController::servicio). --}}
@php
    $precio = collect(config('tarifas.sms'))->firstWhere('pais', 'Costa Rica')['precio'];
    $faq = array_map(fn ($item) => [
        'pregunta' => $item['pregunta'],
        'respuesta' => str_replace(':precio', $precio, $item['respuesta']),
    ], $servicio['faq']);
    $otros = collect(config('servicios'))->except($slug);
@endphp

@extends('layouts.app', [
    'pageKey' => 'servicio',
    'footerVariant' => 'marketing',
    'title' => $servicio['seo_title'],
    'description' => $servicio['seo_description'],
    'breadcrumb' => $servicio['titulo'],
    'schema' => [
        [
            '@type' => 'Service',
            'name' => $servicio['titulo'],
            'description' => $servicio['seo_description'],
            'serviceType' => $servicio['titulo'],
            'provider' => ['@id' => rtrim(config('sitio.url'), '/').'/#organization'],
            'areaServed' => ['@type' => 'Country', 'name' => config('sitio.pais')],
        ],
        [
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($item) => [
                '@type' => 'Question',
                'name' => $item['pregunta'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['respuesta']],
            ], $faq),
        ],
    ],
])

@section('content')
    <main id="contenido">
        {{-- Cabecera: qué es el servicio, botones y un celular con mensajes de ejemplo --}}
        <header class="pagina-hero page-hero">
            <div class="container">
                <div class="servicio-hero-grid">
                    <div>
                        <x-breadcrumbs :current="$servicio['titulo']" />
                        <span class="pagina-kicker mb-3">{{ $servicio['titulo'] }}</span>
                        <h1 class="mb-3">{{ $servicio['h1'] }}</h1>
                        <p class="mb-4">{{ $servicio['intro'] }}</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ config('services.plataforma.registro') }}" class="btn btn-celeste btn-lg rounded-pill px-4">Abrir una cuenta</a>
                            <a href="{{ route('contactanos') }}" class="btn btn-hero-borde btn-lg rounded-pill px-4">Hablar con un asesor</a>
                        </div>
                    </div>
                    <div class="servicio-visual" aria-hidden="true">
                        <div class="celular">
                            <div class="pantalla">
                                @foreach ($servicio['mensajes'] as $mensaje)
                                    <div class="mensaje">
                                        <b class="{{ $mensaje['canal'] === 'WhatsApp' ? 'tag-wa' : 'tag-sms' }}">{{ $mensaje['canal'] }}</b>
                                        <span>{{ $mensaje['texto'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="servicio-visual-icono"><x-icono :nombre="$servicio['icono']" size="30" /></div>
                    </div>
                </div>
            </div>
        </header>

        <section class="container servicio-seccion">
            <div class="feature-heading">
                <h2>¿Qué es?</h2>
                <p>{{ $servicio['que_es'] }}</p>
            </div>
        </section>

        <section class="servicio-banda">
            <div class="container">
                <div class="feature-heading">
                    <h2>Ventajas</h2>
                    <p>Lo que ganas al hacerlo con SMS Empresarial.</p>
                </div>
                <div class="row g-4">
                    @foreach ($servicio['ventajas'] as $ventaja)
                        <div class="col-md-4">
                            <div class="feature-card servicio-ventaja">
                                <span class="feature-icon"><x-icono :nombre="$ventaja['icono']" /></span>
                                <div>
                                    <h3>{{ $ventaja['titulo'] }}</h3>
                                    <p>{{ $ventaja['texto'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="container servicio-seccion">
            <div class="feature-heading">
                <h2>Cómo llega el mensaje</h2>
                <p>El recorrido de cada mensaje, paso a paso.</p>
            </div>
            <ol class="servicio-flujo">
                @foreach ($servicio['flujo'] as $paso)
                    <li class="servicio-paso {{ $paso['titulo'] === 'SMS Empresarial' ? 'is-marca' : '' }}">
                        <span class="servicio-paso-icono"><x-icono :nombre="$paso['icono']" size="24" /></span>
                        <strong>{{ $paso['titulo'] }}</strong>
                        <span>{{ $paso['texto'] }}</span>
                    </li>
                @endforeach
            </ol>
        </section>

        <section class="servicio-banda">
            <div class="container">
                <div class="feature-heading">
                    <h2>Cuándo usarlo</h2>
                    <p>Situaciones habituales entre nuestros clientes.</p>
                </div>
                <ul class="servicio-cuando">
                    @foreach ($servicio['cuando'] as $caso)
                        <li><x-icono nombre="mensaje" size="22" /><span>{{ $caso }}</span></li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="container servicio-seccion">
            <div class="feature-heading">
                <h2>Preguntas frecuentes</h2>
                <p>Lo que más nos consultan sobre este servicio.</p>
            </div>
            <div class="accordion faq-accordion" id="servicioFaq">
                @foreach ($faq as $item)
                    @php($n = $loop->iteration)
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="servicio-faq-heading-{{ $n }}"><button
                                class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#servicio-faq-{{ $n }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="servicio-faq-{{ $n }}"><span
                                    class="faq-numero">{{ sprintf('%02d', $n) }}</span><span>{{ $item['pregunta'] }}</span></button></h3>
                        <div id="servicio-faq-{{ $n }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            aria-labelledby="servicio-faq-heading-{{ $n }}" data-bs-parent="#servicioFaq">
                            <div class="accordion-body"><p>{{ $item['respuesta'] }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="servicio-mas-faq"><a href="{{ route('faq') }}">Ver todas las preguntas frecuentes</a></p>
        </section>

        {{-- Los demás usos: enlaces internos entre las páginas de servicios --}}
        <section class="container servicio-seccion pt-0">
            <div class="feature-heading">
                <h2>Otros usos de la plataforma</h2>
            </div>
            <ul class="servicio-otros">
                @foreach ($otros as $otroSlug => $otro)
                    <li><a href="{{ route('servicio', $otroSlug) }}"><x-icono :nombre="$otro['icono']" size="22" /><span>{{ $otro['titulo'] }}</span></a></li>
                @endforeach
            </ul>
        </section>

        <section class="container pb-5">
            <div class="feature-cta">
                <h2 class="mb-3">Empieza hoy mismo</h2>
                <p class="mb-4">Regístrate, haz una recarga inicial de US$30 y, cuando se apruebe el pago, ya puedes enviar tu
                    primer mensaje.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ config('services.plataforma.registro') }}" class="btn btn-celeste btn-lg rounded-pill px-4">Abrir una cuenta</a>
                    <a href="{{ route('tarifas') }}" class="btn btn-hero-borde btn-lg rounded-pill px-4">Ver tarifas</a>
                </div>
            </div>
        </section>
    </main>
    <x-brand-marquee />
@endsection
