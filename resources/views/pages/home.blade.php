@extends('layouts.app', [
    'pageKey' => 'home',
    'footerVariant' => 'marketing',
    'title' => 'SMS empresarial en Costa Rica | SMS masivos y WhatsApp',
    'description' => 'Envía SMS masivos y mensajes por WhatsApp en Costa Rica. Automatiza campañas, recordatorios y códigos OTP desde una plataforma web o API.',
])

@section('content')
    <main id="contenido">
        <!-- ===== PORTADA ===== -->
        <header class="hero hero-home">
            <svg class="hero-shapes" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true"
                focusable="false">
                <defs>
                    <linearGradient id="hero-arc" x1="0" y1="0" x2="1" y2="1">
                        <stop class="stop-a" offset="0" />
                        <stop class="stop-b" offset="1" />
                    </linearGradient>
                </defs>
                <circle class="shape-arc" cx="960" cy="380" r="300" />
                <circle class="shape-ring" cx="960" cy="380" r="390" />
                <circle class="shape-ring shape-ring--dashed" cx="960" cy="380" r="480" />
                <path class="shape-wave" d="M-40 690 C 260 590, 520 780, 820 680 S 1240 600, 1260 640" />
                <path class="shape-wave shape-wave--soft" d="M-40 730 C 300 640, 540 820, 860 720 S 1240 650, 1260 690" />
            </svg>
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <h1 class="mb-4">SMS masivos y WhatsApp empresarial en Costa Rica</h1>
                        <p class="lead mb-4">Ponemos a tu disposici&oacute;n el env&iacute;o de mensajes de texto (SMS) y
                            WhatsApp desde tu computadora a tel&eacute;fonos celulares en distintos pa&iacute;ses. La
                            plataforma permite planificar campa&ntilde;as, enviar notificaciones y conectar tus sistemas
                            mediante una API de mensajer&iacute;a.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('contactanos') }}" class="btn btn-azul btn-lg rounded-pill fw-bold btn-hero btn-hero-primario">¡Lo quiero!</a>
                            <a href="{{ route('tarifas') }}" class="btn btn-lg rounded-pill fw-bold btn-hero btn-hero-secundario">Consultar tarifas</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero-visual">
                            <div class="celular shadow-lg">
                                <div class="pantalla">
                                    <div class="mensaje"><b class="tag-sms">SMS</b><br>Recordatorio de evento</div>
                                    <div class="mensaje"><b class="tag-wa">WhatsApp</b><br>Promoción para clientes</div>
                                    <div class="mensaje"><b class="tag-sms">SMS</b><br>Tu código OTP / Token</div>
                                </div>
                                <div class="burbuja burbuja-sms">SMS</div>
                                <div class="burbuja burbuja-wa">WhatsApp</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ===== USOS ===== -->
        <section class="usos container">
            <div class="section-heading">
                <h2 class="mb-3">Con nuestra plataforma puedes</h2>
                <p class="section-lead mb-0">Desde SMSEmpresarial.com envías mensajes de texto (SMS) y mensajes de WhatsApp
                    a tus clientes, tu equipo o tus proveedores para:</p>
            </div>

            <div class="row g-4">
                @foreach (config('servicios') as $slug => $servicio)
                    <x-servicio :icono="$servicio['icono']" :titulo="$servicio['titulo']" :link="route('servicio', $slug)">
                        {{ $servicio['resumen'] }}
                    </x-servicio>
                @endforeach
            </div>
        </section>

        <!-- ===== BANDA 99% ===== -->
        <section class="banda">
            <div class="container py-3">
                <div class="row align-items-center g-4">
                    <div class="col-md-auto banda-cifra">
                        <div class="numero">99%</div><span class="banda-etiqueta">de los mensajes de texto son
                            leídos</span>
                    </div>
                    <div class="col-md banda-texto">
                        <div class="banda-mensaje">
                            <span class="banda-icono" aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M4 6h16v12H4z" />
                                    <path d="m4 7 8 6 8-6" />
                                    <path d="m14.5 17 2 2 4-4" />
                                </svg>
                            </span>
                            <h2 class="fw-bold mb-0">Tus mensajes sí se leen.</h2>
                        </div>
                        <p class="banda-descripcion mb-4">Usa SMS para enviar avisos, promociones y recordatorios a tus
                            clientes.</p>
                        <a href="{{ route('tarifas') }}" class="btn btn-banda btn-lg rounded-pill fw-bold px-4">Tabla de
                            destinos y tarifas</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== OPINIONES ===== -->
        <section class="reviews container text-center">
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-4">
                <h2 class="fs-3 m-0">
                    Lo que nuestros clientes dicen
                </h2>

                <div class="reviews-card d-flex align-items-center gap-3 px-4 py-3">
                    <span class="fw-bold">Google Reviews</span>
                    <span
                        class="reviews-score display-5 fw-bold lh-1">{{ $reviews ? number_format($reviews['average'], 1) : '4.8' }}</span>
                    <span>
                        <span class="reviews-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span><br>
                        <small class="text-secondary">{{ $reviews ? $reviews['total'] : 34 }} reviews</small>
                    </span>
                </div>
            </div>
            @if ($reviews && $reviews['reviews'])
                <div class="row g-3 mt-4 text-start">
                    @foreach ($reviews['reviews'] as $review)
                        <div class="col-md-6 col-lg-4">
                            <article class="review-item">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    @if ($review['photo'])
                                        <img class="review-foto" src="{{ $review['photo'] }}" alt=""
                                            width="40" height="40" loading="lazy" referrerpolicy="no-referrer">
                                    @else
                                        <span class="review-foto review-inicial"
                                            aria-hidden="true">{{ mb_substr($review['author'], 0, 1) }}</span>
                                    @endif
                                    <div>
                                        <h3 class="review-autor mb-0">{{ $review['author'] }}</h3>
                                        <span class="reviews-stars small" role="img"
                                            aria-label="{{ $review['rating'] }} de 5 estrellas">{{ str_repeat('★', $review['rating']) }}<span
                                                class="review-vacia">{{ str_repeat('★', 5 - $review['rating']) }}</span></span>
                                    </div>
                                </div>
                                <p class="review-texto mb-0">{{ \Illuminate\Support\Str::limit($review['comment'], 220) }}
                                </p>
                            </article>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
        <!-- ===== MARCAS QUE ROTAN ===== -->
    </main>
    <x-brand-marquee />


@endsection
