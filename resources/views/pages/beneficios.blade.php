@extends('layouts.app', [
    'pageKey' => 'beneficios',
    'footerVariant' => 'marketing',
    'title' => 'Beneficios y ventajas de SMS Empresarial | SMS y WhatsApp',
    'description' => 'Beneficios de SMS Empresarial para pequeñas, medianas y grandes empresas: comunicación inmediata, automatización, integración por API y autenticación 2FA en Costa Rica.',
    'breadcrumb' => 'Beneficios y ventajas',
])

@php
    // Íconos de línea (viewBox 24×24). Cada beneficio aparece una sola vez en la página.
    $iconos = [
        'celular' => '<rect x="6" y="2" width="12" height="20" rx="2.5"/><path d="M11 18h2"/>',
        'engranes' => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M2 12h3M19 12h3M4.9 19.1 7 17M17 7l2.1-2.1"/>',
        'usuario' => '<circle cx="12" cy="8" r="4"/><path d="M4 21v-1a7 7 0 0 1 14 0v1"/><path d="m17 4 2 2 3-3"/>',
        'grafica' => '<path d="M4 20V4M4 20h16"/><path d="m8 15 4-4 3 3 5-6"/>',
        'mundo' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>',
        'whatsapp' => '<path d="M20 11.5a8.5 8.5 0 0 1-12.6 7.4L3 20l1.2-4.2A8.5 8.5 0 1 1 20 11.5Z"/><path d="M9 9c0 3 3 6 6 6"/>',
        'codigo' => '<path d="m8 8-4 4 4 4M16 8l4 4-4 4M14 5l-4 14"/>',
        'banco' => '<path d="M3 10h18L12 4 3 10Z"/><path d="M5 10v8M9.5 10v8M14.5 10v8M19 10v8M3 21h18"/>',
        'carrito' => '<circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M2 3h3l2.5 12h11.5l2-8H6.2"/>',
        'edificio' => '<path d="M4 21V5l8-3v19M12 9h8v12M3 21h18"/><path d="M7 8h2M7 12h2M7 16h2M15 13h2M15 17h2"/>',
        'chip' => '<rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 2v4M15 2v4M9 18v4M15 18v4M2 9h4M2 15h4M18 9h4M18 15h4"/>',
        'correo' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'telefono' => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 5a2 2 0 0 1 2-2Z"/>',
        'redes' => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/>',
        'salud' => '<rect x="3" y="3" width="18" height="18" rx="4"/><path d="M12 8v8M8 12h8"/>',
        'tienda' => '<path d="M4 9h16l-1.5-5h-13L4 9Z"/><path d="M5 9v11h14V9M10 20v-6h4v6"/>',
        'cubiertos' => '<path d="M7 3v8M5 3v5a2 2 0 0 0 4 0V3M7 11v10"/><path d="M17 21V3c-2 1.5-3 4-3 7v3h3"/>',
        'maletin' => '<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M3 13h18"/>',
    ];

    // Precios: salen de config/tarifas.php, como en Tarifas, para que nunca queden desactualizados.
    $inicial = \App\Support\PaquetesSms::inicial();
    $precioMinimo = \App\Support\PaquetesSms::precioDesde();

    $generales = [
        ['celular', 'Comunicación directa e inmediata', 'Tus avisos llegan al celular de clientes, colaboradores y proveedores, sin depender solo del correo electrónico o de las redes sociales.'],
        ['engranes', 'Automatización y ahorro de tiempo', 'Notificaciones, recordatorios y confirmaciones automáticas que antes requerían trabajo manual.'],
        ['usuario', 'Mensajes personalizados', 'Incluye el nombre del cliente, el número de factura, la fecha de la cita o el monto pendiente, también en campañas masivas desde Excel.'],
        ['grafica', 'Control y seguimiento', 'Reportes de envío y recepción, bitácora de acciones y administración de contactos y listas.'],
        ['whatsapp', 'SMS y WhatsApp en una plataforma', 'Elige el canal adecuado para cada tipo de comunicación.'],
        ['mundo', 'Cobertura en Costa Rica y soporte 24/7', 'Envía a los operadores del país y cuenta con atención todo el año.'],
    ];

    $pymes = [
        ['Promoción de productos', 'Comunica ofertas, descuentos y nuevos servicios.'],
        ['Recordatorios', 'Recuerda citas, pagos, entregas y reuniones.'],
        ['Fidelización de clientes', 'Mantén una comunicación periódica con tus clientes.'],
        ['Imagen profesional', 'Usa mensajes empresariales en lugar de un teléfono personal.'],
    ];

    $sectoresPymes = [
        ['salud', 'Clínicas y consultorios', 'Recordatorios de citas y confirmaciones.'],
        ['tienda', 'Comercios', 'Promociones, descuentos y ofertas.'],
        ['cubiertos', 'Restaurantes', 'Confirmaciones de pedidos y entregas.'],
        ['maletin', 'Profesionales independientes', 'Recordatorios de pagos y reuniones.'],
    ];

    // [título, texto, página del servicio relacionada (o null)]
    $empresas = [
        ['Alto volumen y velocidad', 'Campañas con grandes cantidades de destinatarios, enviadas de forma rápida.', 'envio-de-comunicados'],
        ['Continuidad operativa', 'Diferentes rutas de proveedores según tus requerimientos.', null],
        ['Autenticación 2FA', 'Códigos de verificación para el acceso y las operaciones de tus usuarios.', 'codigos-otp-por-sms'],
        ['Notificaciones transaccionales', 'Informa sobre compras, pagos, facturas y movimientos.', 'notificaciones-y-alertas'],
        ['Comunicación bidireccional', 'Recibe respuestas e intégralas con tus sistemas, según la ruta.', 'sms-dos-vias-sinpe-movil'],
        ['Usuarios y roles', 'Configura diferentes usuarios con sus propios permisos.', null],
    ];

    $sectoresEmpresas = [
        ['banco', 'Entidades financieras', 'Códigos 2FA, notificaciones de transacciones e integración con SINPE Móvil y sistemas bancarios.'],
        ['carrito', 'Comercio electrónico y logística', 'Confirmación de pedidos, despachos, seguimiento de entregas y comunicación con repartidores.'],
        ['edificio', 'Corporaciones y servicios', 'Comunicados institucionales, alertas operativas, avisos a colaboradores y campañas segmentadas.'],
        ['chip', 'Empresas tecnológicas', 'Verificación de usuarios y notificaciones automáticas dentro de sus aplicaciones.'],
    ];

    // Medio, su limitación y cómo la resuelve SMS Empresarial.
    $comparacion = [
        ['correo', 'Correo electrónico', 'Depende de que la persona revise su bandeja de entrada.', 'El mensaje llega directamente al celular.'],
        ['whatsapp', 'WhatsApp personal', 'Mensajes desde un teléfono personal, sin gestión de campañas ni contactos.', 'Campañas, contactos y comunicaciones desde una plataforma empresarial.'],
        ['telefono', 'Llamadas telefónicas', 'Hay que llamar a cada destinatario, uno por uno.', 'Comunicas la misma información a muchos destinatarios a la vez.'],
        ['redes', 'Redes sociales', 'Solo lo ve quien sigue tu página y se encuentra con la publicación.', 'No depende de que el cliente siga una página o vea una publicación.'],
        ['codigo', 'Aplicaciones propias', 'Hay que desarrollar y mantener la infraestructura de mensajería.', 'Integras notificaciones sin construir esa infraestructura desde cero.'],
    ];

    $desarrolladores = [
        ['codigo', 'API de envío y recepción', 'Conecta ERP, CRM, sistemas contables o aplicaciones propias mediante API y Webservices.'],
        ['whatsapp', 'WhatsApp Business API', 'Comunicaciones empresariales mediante plantillas aprobadas por Meta.'],
        ['banco', 'Integración bancaria', 'SMS de dos vías e integración con SINPE Móvil para entidades financieras.'],
    ];
@endphp

@section('content')
    <main id="contenido">
        <header class="pagina-hero page-hero beneficios-hero">
            <div class="container pagina-hero-inner">
                <div class="beneficios-hero-grid">
                    <div>
                        <x-breadcrumbs current="Beneficios y ventajas" />
                        <span class="pagina-kicker mb-3">Para pequeñas, medianas y grandes empresas</span>
                        <h1 class="mb-3">Beneficios y ventajas de SMS Empresarial</h1>
                        <p class="mb-0">SMS Empresarial no es solo una plataforma para enviar mensajes masivos: es una
                            solución de comunicación empresarial para automatizar procesos, integrar sistemas y mantener una
                            comunicación directa con tus clientes.</p>
                        <nav class="beneficios-atajos" aria-label="Ir a los beneficios por tipo de empresa">
                            <a href="#pequenas-empresas">Pequeñas empresas</a>
                            <a href="#grandes-empresas">Medianas y grandes empresas</a>
                            <a href="#desarrolladores">Desarrolladores y sistemas</a>
                        </nav>
                    </div>

                    {{-- Ilustración: mensaje de marketing por WhatsApp Business de un restaurante de ejemplo --}}
                    <div class="chat-demo" role="img" aria-label="Ejemplo de mensaje de marketing por WhatsApp Business: el restaurante Arbórea invita a una clienta a su noche de pastas con 2x1 y botones para reservar o ver el menú.">
                        <div class="chat-celular">
                            <div class="chat-pantalla">
                                <div class="chat-barra">
                                    <img class="chat-avatar" src="{{ versioned_asset('images/ejemplos/arborea-logo.jpg') }}" alt="" width="36" height="36" loading="lazy" decoding="async">
                                    <div class="chat-contacto">
                                        <strong>Arbórea <svg class="chat-verificado" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="m12 1 2.6 2.3 3.4-.5 1 3.3 3 1.7-1.2 3.2 1.2 3.2-3 1.7-1 3.3-3.4-.5L12 23l-2.6-2.3-3.4.5-1-3.3-3-1.7L3.2 13 2 9.8l3-1.7 1-3.3 3.4.5Z"/><path d="m7.8 12.2 2.8 2.8 5.6-5.8" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></strong>
                                        <span>Cuenta de empresa</span>
                                    </div>
                                </div>

                                <div class="chat-fondo">
                                    <span class="chat-fecha">Hoy</span>

                                    <div class="chat-plantilla">
                                        <div class="chat-portada">
                                            <img src="{{ versioned_asset('images/ejemplos/arborea-logo.jpg') }}" alt="" width="84" height="84" loading="lazy" decoding="async">
                                            <span>Noche de pastas</span>
                                        </div>
                                        <div class="chat-cuerpo">
                                            <p><strong>¡Hola, Laura!</strong> Este viernes celebramos la noche de pastas en
                                                Arbórea: <strong>2x1 en pastas frescas</strong> de 6 a 9 p. m.</p>
                                            <p>Reserva tu mesa y disfruta la auténtica cocina italiana.</p>
                                            <span class="chat-pie">Arbórea · Cocina italiana <time>10:30</time></span>
                                        </div>
                                        <span class="chat-boton"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg>Reservar mesa</span>
                                        <span class="chat-boton"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 4h6v6M20 4l-9 9"/><path d="M18 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h5"/></svg>Ver menú</span>
                                        <span class="chat-boton chat-boton--baja">Dejar de recibir promociones</span>
                                    </div>

                                    <div class="chat-respuesta">¡Quiero reservar para 4! <time>10:32</time></div>
                                </div>
                            </div>
                            <div class="burbuja burbuja-wa">WhatsApp Business</div>
                            <div class="burbuja burbuja-meta">Plantilla de marketing</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- 1. Beneficios generales: título y descripción en una fila, beneficios en una cuadrícula con divisores --}}
        <section class="feature-section container py-5" id="generales">
            <div class="generales-encabezado">
                <div>
                    <span class="section-kicker">Para todo tipo de empresa</span>
                    <h2 class="mt-2 mb-0">Beneficios generales</h2>
                </div>
                <p>Lo que obtienes con SMS Empresarial, sin importar el tamaño de tu organización.</p>
            </div>
            <ul class="generales-grid">
                @foreach ($generales as [$icono, $titulo, $texto])
                    <li>
                        <div class="generales-titulo">
                            <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $iconos[$icono] !!}</svg></span>
                            <h3>{{ $titulo }}</h3>
                        </div>
                        <p>{{ $texto }}</p>
                    </li>
                @endforeach
            </ul>
        </section>

        {{-- 2. Pequeñas empresas: lista numerada, dato destacado y sectores --}}
        <section class="feature-band py-5" id="pequenas-empresas">
            <div class="container">
                <div class="pymes-grid">
                    <div>
                        <div class="feature-heading">
                            <span class="section-kicker">Pequeñas empresas y emprendimientos</span>
                            <h2 class="mt-2">Más clientes, mejor comunicación</h2>
                            <p>Deja de avisar a tus clientes uno por uno con WhatsApp personal, llamadas o correos.
                                Comunícate de forma rápida, sencilla y profesional.</p>
                        </div>
                        <ol class="numerada">
                            @foreach ($pymes as [$titulo, $texto])
                                <li>
                                    <h3>{{ $titulo }}</h3>
                                    <p>{{ $texto }}</p>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <aside class="dato-destacado panel" aria-label="Costo para empezar">
                        <span class="dato-etiqueta">Paquete inicial</span>
                        <strong class="dato-cifra">US${{ \App\Support\PaquetesSms::dolares($inicial['precio']) }} <small>+ IVA</small></strong>
                        <span class="dato-detalle">{{ \App\Support\PaquetesSms::miles($inicial['cantidad']) }} SMS</span>
                        <p>Sin equipos ni instalaciones: todo funciona desde la plataforma web. Con paquetes más grandes,
                            el SMS baja hasta US${{ $precioMinimo }}.</p>
                        <a href="{{ route('tarifas') }}" class="btn btn-brand">Ver tarifas <span aria-hidden="true">→</span></a>
                    </aside>
                </div>

                <h3 class="beneficios-subtitulo mt-5">Sectores con alto potencial</h3>
                <div class="sectores-columnas">
                    @foreach ($sectoresPymes as [$icono, $sector, $texto])
                        <div class="sector-columna">
                            <span class="sector-icono" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $iconos[$icono] !!}</svg></span>
                            <h4>{{ $sector }}</h4>
                            <p>{{ $texto }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 3. Medianas y grandes empresas: tarjetas compactas (con enlace a su servicio) y sectores --}}
        <section class="feature-section container py-5" id="grandes-empresas">
            <div class="feature-heading">
                <span class="section-kicker">Medianas y grandes empresas</span>
                <h2 class="mt-2">Automatiza tus comunicaciones</h2>
                <p>Optimiza tus procesos con una plataforma empresarial que crece con tus volúmenes y se adapta a cada
                    organización.</p>
            </div>
            <ol class="beneficios-lista">
                @foreach ($empresas as [$titulo, $texto, $servicio])
                    <li class="feature-card beneficio-item">
                        <h3>{{ $titulo }}</h3>
                        <p>{{ $texto }}</p>
                        @if ($servicio)
                            <a class="beneficio-enlace" href="{{ route('servicio', $servicio) }}">Ver más <span aria-hidden="true">→</span><span class="visually-hidden"> sobre {{ $titulo }}</span></a>
                        @endif
                    </li>
                @endforeach
            </ol>

            <h3 class="beneficios-subtitulo mt-5">Sectores con alto potencial</h3>
            <div class="sectores-columnas">
                @foreach ($sectoresEmpresas as [$icono, $sector, $texto])
                    <div class="sector-columna">
                        <span class="sector-icono" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $iconos[$icono] !!}</svg></span>
                        <h4>{{ $sector }}</h4>
                        <p>{{ $texto }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- 4. Comparación con otros medios: banda oscura con tabla comparativa (en celular, una ficha por medio) --}}
        <section class="banda-oscura" id="comparacion">
            <div class="container">
                <div class="feature-heading banda-titulo">
                    <span class="section-kicker">Ventajas competitivas</span>
                    <h2 class="mt-2">Frente a otros medios de comunicación</h2>
                    <p>SMS y WhatsApp complementan tus canales actuales: no reemplazan el correo electrónico ni las redes
                        sociales, los refuerzan donde más importa.</p>
                </div>
                <div class="tabla-comparativa-marco">
                    <table class="tabla-comparativa">
                        <caption class="visually-hidden">Comparación de SMS Empresarial con otros medios de comunicación</caption>
                        <thead>
                            <tr>
                                <th scope="col">Medio</th>
                                <th scope="col">Limitación del medio</th>
                                <th scope="col" class="col-sms"><span class="col-sms-etiqueta">Con SMS Empresarial</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comparacion as [$icono, $medio, $limitacion, $ventaja])
                                <tr>
                                    <th scope="row">
                                        <span class="medio"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">{!! $iconos[$icono] !!}</svg>{{ $medio }}</span>
                                    </th>
                                    <td class="col-limite" data-etiqueta="Limitación del medio">
                                        <svg class="marca marca-no" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 7l10 10M17 7 7 17"/></svg>{{ $limitacion }}
                                    </td>
                                    <td class="col-sms" data-etiqueta="Con SMS Empresarial">
                                        <svg class="marca marca-si" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12 5 5 9-10"/></svg>{{ $ventaja }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- 5. Desarrolladores y sistemas: filas con divisores --}}
        <section class="feature-section container py-5" id="desarrolladores">
            <div class="especializadas-grid">
                <div>
                    <div class="feature-heading">
                        <span class="section-kicker">Desarrolladores y sistemas</span>
                        <h2 class="mt-2">Conecta tus sistemas con tus clientes</h2>
                        <p>Integra el envío de SMS y WhatsApp a las herramientas que tu equipo ya usa.</p>
                    </div>
                    <ul class="filas">
                        @foreach ($desarrolladores as [$icono, $titulo, $texto])
                            <li>
                                <span class="fila-icono" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $iconos[$icono] !!}</svg></span>
                                <h3>{{ $titulo }}</h3>
                                <p>{{ $texto }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <aside class="panel dato-destacado" aria-label="Habla con un asesor">
                    <span class="dato-etiqueta">¿Tienes un sistema?</span>
                    <p>Cuéntanos qué usas (ERP, CRM, aplicación propia) y te indicamos cómo integrarlo.</p>
                    <a href="{{ route('contactanos') }}" class="btn btn-brand">Hablar con un asesor <span aria-hidden="true">→</span></a>
                </aside>
            </div>
        </section>

        {{-- 6. Mensaje principal --}}
        <section class="container py-5">
            <div class="feature-cta">
                <h2 class="mb-3">Tus mensajes. Tus clientes. Tu empresa siempre conectada.</h2>
                <p class="mb-4">SMS y WhatsApp empresarial para comunicar, automatizar y conectar tus sistemas con tus
                    clientes.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('contactanos') }}" class="btn btn-celeste btn-lg rounded-pill px-4">Quiero más información</a>
                    <a href="{{ route('tarifas') }}" class="btn btn-cta-secundario btn-lg rounded-pill px-4">Ver tarifas</a>
                </div>
            </div>
        </section>
    </main>
    <x-brand-marquee />
@endsection
