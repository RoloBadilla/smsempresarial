{{-- Página "Nosotros": secciones numeradas (01 a 05) con un diseño propio, sobre la base visual de las páginas de servicio. --}}
@php
    // Mosaico de usos: el primero es la tarjeta grande. Cada uno lleva a la página que lo explica.
    $usos = [
        ['campanas', 'Campañas y promociones', 'Envíos masivos personalizados de SMS y WhatsApp.', route('servicio', ['servicio' => 'campanas-de-sms-masivos', 'desde' => 'nosotros'])],
        ['recordatorios', 'Recordatorios y avisos', 'Citas, cobros, vencimientos y comunicados.', route('servicio', ['servicio' => 'recordatorios-por-sms', 'desde' => 'nosotros'])],
        ['otp', 'Seguridad', 'Códigos OTP y segundo factor de autenticación (2FA) para validar a tus usuarios.', route('servicio', ['servicio' => 'codigos-otp-por-sms', 'desde' => 'nosotros'])],
        ['dos-vias', 'Cobros con SINPE Móvil', 'Comunicación en ambas vías con tus clientes.', route('servicio', ['servicio' => 'sms-dos-vias-sinpe-movil', 'desde' => 'nosotros'])],
        ['api', 'Integración por API', 'Conecta tu sistema para enviar y recibir mensajes de forma automática.', route('caracteristicas', ['desde' => 'nosotros'])],
    ];
@endphp

@extends('layouts.app', [
    'pageKey' => 'nosotros',
    'footerVariant' => 'marketing',
    'title' => 'Nosotros | SMS Empresarial, servicio de Cyberfuel',
    'description' => 'SMS Empresarial es un servicio de Cyberfuel, empresa 100 % costarricense. Envía SMS y WhatsApp masivos desde una sola plataforma, con soporte 24/7.',
    'breadcrumb' => 'Nosotros',
    'schema' => [
        [
            '@type' => 'AboutPage',
            'name' => 'Nosotros',
            'about' => ['@id' => rtrim(config('sitio.url'), '/').'/#organization'],
        ],
    ],
])

@section('content')
    <main id="contenido" class="nosotros">
        <header class="pagina-hero page-hero">
            <div class="container">
                <div class="servicio-hero-grid">
                    <div>
                        <x-breadcrumbs current="Nosotros" />
                        <span class="pagina-kicker mb-3">Nosotros</span>
                        <h1 class="mb-3">Una empresa costarricense detrás de cada mensaje</h1>
                        <p class="mb-4">Somos SMS Empresarial, un servicio de Cyberfuel. Conectamos a las empresas con sus
                            clientes por SMS y WhatsApp, con tecnología y soporte de aquí.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('contactanos') }}" class="btn btn-celeste btn-lg rounded-pill px-4">Hablar con un asesor</a>
                            <a href="{{ config('services.plataforma.registro') }}" class="btn btn-hero-borde btn-lg rounded-pill px-4">Abrir una cuenta</a>
                        </div>
                    </div>
                    <x-ilustracion-nosotros />
                </div>
            </div>
        </header>

        {{-- 01 Qué hacemos: una frase grande, como manifiesto --}}
        <section class="container nosotros-seccion">
            <div class="nosotros-manifiesto">
                <span class="nosotros-numero"><b>01</b>Qué hacemos</span>
                <div>
                    <p class="nosotros-frase">Ayudamos a las empresas costarricenses a comunicarse con sus clientes por el
                        canal que nunca dejan de revisar: <mark class="nosotros-celular"><span>su celular</span><svg viewBox="0 0 300 40" preserveAspectRatio="none" aria-hidden="true" focusable="false"><defs><linearGradient id="trazo-celular" x1="0" x2="1"><stop offset="0" class="trazo-a"/><stop offset="1" class="trazo-b"/></linearGradient></defs><path class="trazo-1" pathLength="1" d="M6 22 C 70 10, 170 6, 294 14"/><path class="trazo-2" pathLength="1" d="M40 32 C 110 23, 200 21, 262 26"/></svg></mark>.</p>
                    <p class="nosotros-apoyo">Con SMS Empresarial envías mensajes de texto y WhatsApp masivos desde una sola
                        plataforma, de forma segura y sin complicaciones.</p>
                </div>
            </div>
        </section>

        {{-- 02 Respaldo de Cyberfuel: panel con logos y tres datos --}}
        <section class="container nosotros-seccion pt-0">
            <div class="nosotros-respaldo">
                <div class="nosotros-respaldo-texto">
                    <span class="nosotros-numero"><b>02</b>Respaldo</span>
                    <h2>Detrás de cada mensaje hay una empresa local</h2>
                    <p>SMS Empresarial es un servicio de Cyberfuel, empresa 100 % costarricense con años de experiencia en
                        tecnología en la nube, hospedaje web y dominios. La misma empresa respalda Factura Profesional y
                        otras soluciones que usan negocios en todo el país.</p>
                    <div class="nosotros-logos">
                        <img src="{{ versioned_asset('images/logos/cyberfuel.svg') }}" alt="Cyberfuel" width="150" height="38" loading="lazy">
                    </div>
                </div>
                <ul class="nosotros-datos">
                    <li><span class="nosotros-dato-icono"><x-icono nombre="bandera" size="26" /></span><strong>100 %</strong><span>costarricense</span></li>
                    <li><span class="nosotros-dato-icono"><x-icono nombre="soporte" size="26" /></span><strong>24/7</strong><span>soporte técnico</span></li>
                    <li><span class="nosotros-dato-icono"><x-icono nombre="ubicacion" size="26" /></span><strong>Forum 1</strong><span>Santa Ana, San José</span></li>
                </ul>
            </div>
        </section>

        {{-- 03 Una plataforma: Campañas destacada a la izquierda, los demás usos en lista y la cobertura abajo --}}
        @php($destacado = array_shift($usos))
        <section class="nosotros-banda">
            <div class="container">
                <div class="nosotros-encabezado">
                    <span class="nosotros-numero"><b>03</b>La plataforma</span>
                    <h2>Una plataforma, todos tus mensajes</h2>
                </div>
                <div class="nosotros-plataforma">
                    <a class="nosotros-destacado" href="{{ $destacado[3] }}">
                        <span class="feature-icon"><x-icono :nombre="$destacado[0]" /></span>
                        <h3>{{ $destacado[2] }}</h3>
                        <span class="nosotros-burbujas" aria-hidden="true">
                            <span class="is-sms"><b>SMS</b>¡20 % de descuento este fin de semana!</span>
                            <span class="is-wa"><b>WhatsApp</b>Hola Ana, tu pedido ya va en camino.</span>
                        </span>
                        <span class="nosotros-ver">Ver más <span aria-hidden="true">→</span></span>
                    </a>
                    <ul class="nosotros-lista">
                        @foreach ($usos as [$icono, $titulo, $texto, $link])
                            <li>
                                <a href="{{ $link }}">
                                    <span class="feature-icon"><x-icono :nombre="$icono" size="24" /></span>
                                    <span class="nosotros-lista-texto"><strong>{{ $titulo }}</strong><span>{{ $texto }}</span></span>
                                    <span class="nosotros-lista-flecha" aria-hidden="true">→</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Cobertura: panel azul destacado --}}
                <div class="nosotros-cobertura">
                    <div class="nosotros-cobertura-texto">
                        <span class="nosotros-cobertura-icono"><x-icono nombre="operador" size="30" /></span>
                        <div>
                            <strong>Tus mensajes llegan a todo Costa Rica</strong>
                            <span>A los clientes de los tres operadores del país, y también a otros países.</span>
                        </div>
                    </div>
                    <ul class="nosotros-operadores">
                        <li>kölbi</li>
                        <li>Claro</li>
                        <li>Liberty</li>
                    </ul>
                    <a class="btn btn-lg rounded-pill nosotros-cobertura-btn" href="{{ route('tarifas') }}">Ver rutas y tarifas</a>
                </div>
            </div>
        </section>

        {{-- 04 Socio tecnológico: texto y tres pasos de acompañamiento --}}
        <section class="container nosotros-seccion">
            <div class="nosotros-zigzag">
                <div>
                    <span class="nosotros-numero"><b>04</b>Socio tecnológico</span>
                    <h2>Te acompañamos más allá de la plataforma</h2>
                    <p>Integramos la mensajería en tus procesos, paso a paso. Agencias de marketing y desarrolladores
                        encuentran en nosotros un aliado para incluir SMS y WhatsApp en los proyectos de sus clientes.</p>
                </div>
                <ol class="nosotros-pasos">
                    <li><span class="nosotros-paso-icono"><x-icono nombre="campanas" size="22" /></span><div><strong>Tu primera campaña</strong><span>Te ayudamos a configurarla desde el inicio.</span></div></li>
                    <li><span class="nosotros-paso-icono"><x-icono nombre="api" size="22" /></span><div><strong>Integración con tu software</strong><span>Conectamos nuestra API con tus sistemas.</span></div></li>
                    <li><span class="nosotros-paso-icono"><x-icono nombre="socio" size="22" /></span><div><strong>Aliados de agencias y desarrolladores</strong><span>SMS y WhatsApp en los proyectos de sus clientes.</span></div></li>
                </ol>
            </div>
        </section>

        {{-- 05 Nuestro equipo: especialidades a la izquierda y texto a la derecha --}}
        <section class="container nosotros-seccion pt-0">
            <div class="nosotros-zigzag is-invertido">
                <div class="nosotros-equipo-visual" aria-hidden="true">
                    <span class="nosotros-equipo-icono"><x-icono nombre="equipo" size="44" /></span>
                    <span class="nosotros-especialidad" style="--i: 0">Telecomunicaciones</span>
                    <span class="nosotros-especialidad" style="--i: 1">Desarrollo de software</span>
                    <span class="nosotros-especialidad" style="--i: 2">Infraestructura en la nube</span>
                </div>
                <div>
                    <span class="nosotros-numero"><b>05</b>Nuestro equipo</span>
                    <h2>Personas que hacen que cada mensaje llegue</h2>
                    <p>Ingenieros y especialistas en telecomunicaciones, desarrollo de software e infraestructura en la
                        nube trabajan todos los días para que cada mensaje llegue rápido y seguro.</p>
                    <p class="nosotros-sello"><x-icono nombre="soporte" size="22" /><span>Y cuando necesites ayuda, te atiende
                            personal costarricense que entiende tu negocio.</span></p>
                </div>
            </div>
        </section>
    </main>
    <x-brand-marquee />
@endsection
