@php
    // Preguntas frecuentes: de esta lista salen el acordeón y los datos estructurados FAQPage
    // (lo que leen Google y los buscadores con IA). Para agregar una pregunta, se agrega aquí.
    // Si se cambia un texto, actualizar también su traducción en public/lang/en.json.
    $tarifas = collect(config('tarifas.sms'));
    $local = $tarifas->firstWhere('ruta', 'Local');
    $internacionales = $tarifas->where('ruta', 'Internacional');
    $desde = $internacionales->sortBy(fn ($tarifa) => (float) $tarifa['precio'])->first();

    $registro = e(config('services.plataforma.registro'));

    $preguntas = [
        [
            'pregunta' => '¿Qué es SMSEmpresarial.com?',
            'respuesta' => '<p>SMSEmpresarial.com es una plataforma de Cyberfuel para enviar mensajes de texto SMS y mensajes
                de WhatsApp desde Internet a tus clientes en Costa Rica y otros países. Funciona desde el navegador o
                conectada a tus sistemas por API.</p>
                <p>No necesitas invertir en equipo, software ni mantenimiento, y puedes hacer varios envíos al mismo
                tiempo sin esperas largas.</p>
                <p>Para usarla solo necesitas conexión a Internet: entra a <a href="'.route('home').'">smsempresarial.com</a>,
                <a href="'.$registro.'">regístrate</a> e ingresa a tu cuenta.</p>
                <p>SMSEmpresarial.com no brinda bases de datos de teléfonos. Cada cliente es responsable de contar con la
                autorización de la persona que recibe el mensaje, según la legislación de cada país donde se hace el envío.</p>',
        ],
        [
            'pregunta' => '¿Quién proporciona la base de datos de contactos?',
            'respuesta' => '<p>La base de datos de contactos la proporciona el cliente: SMSEmpresarial.com no brinda bases de
                datos de teléfonos.</p>
                <p>Cada cliente es responsable del uso de sus contactos, de contar con su autorización para enviarles
                mensajes y del contenido de esos mensajes.</p>',
        ],
        [
            'pregunta' => '¿Para qué puedo usar SMSEmpresarial.com?',
            'respuesta' => '<p>Te permite comunicarte de forma directa y efectiva con tus clientes, tu equipo o tus
                proveedores. Puedes usarlo para:</p>
                <ul>
                    <li>Enviar comunicados a tus mensajeros.</li>
                    <li>Enviar mensajes a las personas de tu oficina.</li>
                    <li>Enviar recordatorios de cobro personalizados con el sistema de campañas.</li>
                    <li>Enviar saludos de cumpleaños, Navidad y Año Nuevo a tus clientes.</li>
                    <li>Recordar citas o reuniones.</li>
                    <li>Hacer campañas publicitarias o de mercadeo con mensajes personalizados.</li>
                    <li>Enviar promociones, información de productos, circulares, recordatorios, boletines o eventos.</li>
                    <li>Enviar códigos OTP o tokens para la verificación en dos pasos (2FA).</li>
                    <li>Recibir en tu celular contenido enviado desde un correo electrónico.</li>
                    <li>Conectar los sistemas de alertas de tu empresa para que envíen mensajes de texto.</li>
                </ul>',
        ],
        [
            'pregunta' => '¿Puedo enviar mensajes de WhatsApp?',
            'respuesta' => '<p>Sí. SMSEmpresarial.com envía y recibe mensajes de WhatsApp Business por medio de su Web
                Service (API). WhatsApp necesita un número exclusivo para tu empresa; para activarlo,
                <a href="'.route('contactanos').'">escríbele al equipo de ventas</a>.</p>',
        ],
        [
            'pregunta' => '¿En qué países funciona y cuánto cuesta?',
            'respuesta' => '<p>Puedes enviar SMS a Costa Rica y a <strong>'.$internacionales->count().'</strong> destinos
                internacionales. Un SMS a Costa Rica cuesta <strong>$'.e($local['precio']).'</strong> + IVA; a otros
                países, desde <strong>$'.e($desde['precio']).'</strong> por mensaje.</p>
                <p>Las tarifas están en dólares estadounidenses y el IVA se cobra solo a clientes de Costa Rica. WhatsApp
                se cotiza según el país y el tipo de servicio.</p>
                <p>Consulta todos los países y precios en <a href="'.route('tarifas').'">Tarifas</a>.</p>',
        ],
        [
            'pregunta' => '¿Cuánto dura el saldo adquirido?',
            'respuesta' => '<p>Cada recarga extiende la vigencia del nuevo saldo por 12 meses. Si no haces otra recarga antes
                de que pasen esos 12 meses, pierdes el saldo adquirido.</p>',
        ],
        [
            'pregunta' => '¿Cómo puedo dejar de recibir mensajes de los clientes de SMSEmpresarial?',
            'respuesta' => '<p>SMSEmpresarial.com no proporciona bases de datos: cada empresa cliente administra sus propios
                contactos y es responsable de sus envíos. Si ya no quieres recibir sus mensajes, contacta directamente a
                la empresa que te los envía y pide que retire tu número de su lista.</p>',
        ],
        [
            'pregunta' => '¿Cómo puedo comprar saldo y empezar a utilizar el servicio?',
            'respuesta' => '<p>El sistema acepta tarjetas de crédito Visa, MasterCard y American Express. Para empezar,
                <a href="'.$registro.'">regístrate</a> y compra el monto inicial.</p>
                <p>Cuando el pago se aprueba, recibes una confirmación por correo electrónico y puedes empezar a usar
                SMSEmpresarial.com de inmediato.</p>',
        ],
        [
            'pregunta' => '¿Cuál es el largo de un mensaje de texto SMS?',
            'respuesta' => '<p>Un mensaje SMS tiene hasta 160 caracteres en formato UTF-8 (UCS Transformation Format 8).
                Si la ruta seleccionada admite caracteres especiales, el límite puede reducirse según los caracteres
                utilizados.</p>
                <p>Si la ruta permite mensajes largos, también se reduce la cantidad disponible por mensaje: el protocolo
                utiliza 20 caracteres para identificar los mensajes anteriores y siguientes, de manera que el dispositivo
                pueda ordenarlos correctamente.</p>',
        ],
        [
            'pregunta' => '¿Cuáles son los caracteres especiales?',
            'respuesta' => '<p>Los mensajes de texto utilizan el formato UTF-8 (UCS Transformation Format 8). Algunos
                caracteres latinos, como Á, É, Í, Ó, Ú, Ñ, á, é, í, ó, ú, ñ, ä, ë, ï, ö, ü y ¿, pueden ocupar más
                espacio que un carácter básico y reducir la longitud disponible del mensaje.</p>',
        ],
    ];

    $texto = fn (string $html) => trim(preg_replace('/\s+/u', ' ', strip_tags(str_replace('<li>', '<li>• ', $html))));
@endphp

@extends('layouts.app', [
    'pageKey' => 'faq',
    'footerVariant' => 'marketing',
    'title' => 'Preguntas frecuentes sobre SMS y WhatsApp | SMS Empresarial',
    'description' => 'Resuelve tus dudas sobre SMS Empresarial: campañas, WhatsApp, tarifas, saldo, contactos, mensajes SMS y uso de la plataforma.',
    'breadcrumb' => 'Preguntas frecuentes',
    'schema' => [[
        '@type' => 'FAQPage',
        '@id' => route('faq').'#preguntas',
        'mainEntity' => array_map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['pregunta'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $texto($item['respuesta'])],
        ], $preguntas),
    ]],
])

@section('content')
    <main id="contenido">
        <header class="faq-hero page-hero">
            <div class="container pagina-hero-inner py-lg-4">
                <div class="faq-hero-grid">
                    <div class="faq-hero-copy">
                        <x-breadcrumbs current="Preguntas frecuentes" />
                        <span class="pagina-kicker mb-3">Centro de ayuda</span>
                        <h1 class="mb-3">Resuelve tus dudas <span>en un solo lugar.</span></h1>
                        <p class="mb-4">Encuentra respuestas sobre el envío de SMS y WhatsApp, tus contactos, el saldo y
                            las funciones de la plataforma. Consulta c&oacute;mo usar la plataforma, revisar tarifas y
                            conocer las opciones de integraci&oacute;n.</p>
                        <a class="btn btn-celeste rounded-pill px-4 py-3" href="#preguntas">Explorar preguntas <span
                                aria-hidden="true">&#8595;</span></a>
                    </div>
                    <aside class="faq-hero-card" aria-label="Temas disponibles en preguntas frecuentes">
                        <div class="faq-card-label"><span class="faq-card-dot" aria-hidden="true"></span> Centro de ayuda
                            SMSEmpresarial</div>
                        <div class="faq-card-art"><img class="faq-card-logo"
                                src="{{ versioned_asset('images/logos/sms.svg') }}" alt="Logotipo de SMS Empresarial"
                                width="205" height="205"></div>
                        <div class="faq-card-summary">
                            <div class="faq-card-count"><strong>{{ count($preguntas) }}</strong><span>respuestas<br>frecuentes</span></div>
                            <span class="faq-card-hint">Encuentra aquí lo que necesitas</span>
                        </div>
                        <div class="faq-card-topics"><span>SMS</span><span>WhatsApp</span><span>Cuenta y saldo</span></div>
                    </aside>
                </div>
            </div>
        </header>

        <section class="faq-section py-5" id="preguntas" aria-label="Preguntas y respuestas frecuentes">
            <div class="container faq-section-inner">
                <div class="faq-search-wrap">
                    <div class="faq-search-panel">
                        <label class="faq-search-label" for="faqSearch">¿Qué necesitas saber?</label>
                        <div class="faq-search-field">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                aria-hidden="true">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m20 20-4-4"></path>
                            </svg>
                            <input id="faqSearch" type="search" placeholder="Busca por tema: WhatsApp, saldo o mensajes"
                                autocomplete="off">
                        </div>
                        <p class="faq-search-count" id="faqSearchCount" aria-live="polite">{{ count($preguntas) }} preguntas disponibles</p>
                    </div>
                </div>
                <div class="feature-heading mb-4">
                    <h2>¿En qué podemos ayudarte?</h2>
                    <p>Selecciona una pregunta para consultar la información.</p>
                </div>
                <div class="accordion faq-accordion" id="faqAccordion">
                    @foreach ($preguntas as $item)
                        @php($n = $loop->iteration)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq-heading-{{ $n }}"><button
                                    class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapse-{{ $n }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="faq-collapse-{{ $n }}"><span
                                        class="faq-numero">{{ sprintf('%02d', $n) }}</span><span>{{ $item['pregunta'] }}</span></button></h3>
                            <div id="faq-collapse-{{ $n }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                aria-labelledby="faq-heading-{{ $n }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! $item['respuesta'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-empty-state id="faqEmpty" title="No encontramos preguntas con ese término"
                    text="Prueba con otra palabra, como “saldo”, “WhatsApp” o “caracteres”."
                    link-text="¿No está tu pregunta? Escríbenos" />
            </div>
        </section>
    </main>
    <x-brand-marquee />
@endsection
