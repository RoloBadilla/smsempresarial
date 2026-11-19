@php
    // Todo sale de config/tarifas.php: paquetes de SMS (Costa Rica) y precios de WhatsApp.
    $paquetes = \App\Support\PaquetesSms::todos();
    $whatsapp = collect(config('tarifas.whatsapp'));
    $iva = config('tarifas.iva');

    // Formatos: precios sin ceros de más (0.00600 → 0.006), cantidades y dólares con separador de miles.
    $limpio = fn ($numero) => \App\Support\PaquetesSms::limpio($numero);
    $miles = fn ($numero) => \App\Support\PaquetesSms::miles($numero);
    $dolares = fn ($numero) => \App\Support\PaquetesSms::dolares($numero);

    // El precio por SMS más bajo (título) y el del paquete más pequeño (ahorro de cada paquete).
    $precioMinimo = \App\Support\PaquetesSms::precioDesde();
    $precioBase = (float) $paquetes->first()['precio_sms'];

    // Nombre de cada tipo de mensaje en la calculadora de WhatsApp.
    $titulosCalculadora = [
        'marketing' => 'Plantilla de marketing',
        'utilidad' => 'Plantilla de utilidad',
        'autenticacion' => 'Plantilla de autenticación',
        'servicio' => 'Mensajes de servicio',
        'recibido' => 'Mensajes recibidos',
    ];

    // Ejemplo de cada tipo de mensaje de WhatsApp: texto del acordeón (el chat de ejemplo está más abajo, en el teléfono).
    $tiposWhatsapp = [
        'marketing' => ['nombre' => 'Marketing', 'texto' => 'Ofertas, promociones, lanzamientos de productos, recordatorios de carritos abandonados y mensajes para atraer clientes nuevos o recuperar a los que no han vuelto.'],
        'utilidad' => ['nombre' => 'Utilidad', 'texto' => 'Se envían por algo que hizo el cliente, como una compra o un pago: confirmaciones de pedido, avisos de entrega, facturas y recordatorios de citas. No pueden incluir promociones.'],
        'autenticacion' => ['nombre' => 'Autenticación', 'texto' => 'Códigos de un solo uso (OTP) para verificar la identidad del cliente cuando inicia sesión, se registra o aprueba una transacción.'],
        'servicio' => ['nombre' => 'Servicio', 'texto' => 'Respuestas a los mensajes que te escriben tus clientes, desde un agente o un bot. Cuando un cliente te escribe, tienes 24 horas para responderle y ese plazo se reinicia con cada mensaje nuevo del cliente.'],
    ];
@endphp

@extends('layouts.app', [
    'pageKey' => 'tarifas',
    'footerVariant' => 'tarifas',
    'title' => 'Precio de SMS y WhatsApp en Costa Rica | SMS Empresarial',
    'description' => 'Paquetes de SMS para Costa Rica desde US$'.$precioMinimo.' por mensaje + IVA y WhatsApp desde US$'.config('tarifas.whatsapp_web').'. Calcula cuánto te cuestan tus mensajes de WhatsApp Business.',
    'breadcrumb' => 'Tarifas',
    // Datos estructurados: el servicio y un precio por paquete (sale de config/tarifas.php).
    'schema' => [[
        '@type' => 'Service',
        '@id' => route('tarifas').'#servicio',
        'name' => 'Envío de SMS masivos',
        'serviceType' => 'SMS masivos y mensajería empresarial',
        'provider' => ['@id' => url('/').'/#organization'],
        'areaServed' => ['@type' => 'Country', 'name' => 'Costa Rica'],
        'offers' => $paquetes->map(fn ($paquete) => [
            '@type' => 'Offer',
            'name' => 'Paquete '.$paquete['nombre'].': '.$miles($paquete['cantidad']).' SMS',
            'price' => number_format($paquete['precio'], 2, '.', ''),
            'priceCurrency' => 'USD',
            'priceSpecification' => [
                '@type' => 'UnitPriceSpecification',
                'price' => number_format($paquete['precio'], 2, '.', ''),
                'priceCurrency' => 'USD',
                'valueAddedTaxIncluded' => false,
            ],
            'url' => route('tarifas').'#sms',
        ])->all(),
    ]],
])

@section('content')
    <main id="contenido">
        <header class="rates-hero page-hero">
            <div class="container">
                <x-breadcrumbs current="Tarifas" />
                <span class="eyebrow mb-3">Tarifas para Costa Rica</span>
                <h1 class="mb-3">SMS desde <span>US${{ $precioMinimo }}</span> por mensaje.</h1>
                <p class="mb-0">Elige un paquete de SMS para escribir a celulares de kölbi, Claro y Liberty, o calcula
                    cuánto te cuesta WhatsApp Business según el tipo de mensaje. Precios en dólares estadounidenses, más IVA.</p>
                <nav class="rates-switch" aria-label="Secciones de tarifas">
                    <a href="#sms"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M4 6h16v10H8l-4 4Z"/>
                        <path d="M8 10h8M8 13h5"/>
                    </svg>Paquetes de SMS</a>
                    <a href="#whatsapp"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
                        <path d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.5 0 .16 5.34.16 11.91c0 2.1.55 4.16 1.6 5.97L.06 24l6.27-1.64a11.9 11.9 0 0 0 5.74 1.46h.01c6.57 0 11.91-5.34 11.91-11.91 0-3.18-1.24-6.17-3.47-8.43ZM12.08 21.8a9.9 9.9 0 0 1-5.05-1.38l-.36-.21-3.73.98 1-3.64-.23-.37a9.86 9.86 0 0 1-1.51-5.27c0-5.46 4.44-9.9 9.9-9.9 2.65 0 5.13 1.03 7 2.9a9.84 9.84 0 0 1 2.9 7c0 5.46-4.44 9.9-9.91 9.9Z"/>
                    </svg>WhatsApp</a>
                </nav>
            </div>
        </header>

        {{-- 1. SMS: paquetes para Costa Rica --}}
        <section class="container rates-wrap pb-4" id="sms" aria-labelledby="sms-title">
            <div class="panel p-3 p-md-4 p-lg-5">
                <div class="mb-4">
                    <span class="section-kicker">Tarifas SMS</span>
                    <h2 class="section-title mt-2 mb-2" id="sms-title">Paquetes de SMS para Costa Rica</h2>
                    <p class="section-copy mb-0">Compras un paquete y envías los mensajes a cualquier celular del país.
                        Entre más grande el paquete, menos pagas por cada SMS. Si se te acaba, cada SMS adicional se
                        cobra a la tarifa de tu paquete.</p>
                </div>

                {{-- Tabla compacta: una fila por paquete. En celular cada fila muestra cantidad y precio,
                     y el botón "Ver más" despliega el precio por SMS y el adicional (ver tarifas.css y tarifas.js). --}}
                <div class="paquetes-tabla">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Paquete</th>
                                <th scope="col" class="pt-num">Precio del paquete</th>
                                <th scope="col" class="pt-num">Precio por SMS</th>
                                <th scope="col" class="pt-num">SMS adicional</th>
                                <th scope="col" class="pt-mas"><span class="visually-hidden">Detalle</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paquetes as $paquete)
                                @php $ahorro = (int) round((1 - (float) $paquete['precio_sms'] / $precioBase) * 100); @endphp
                                <tr>
                                    <th scope="row" class="pt-paquete"><strong>{{ $miles($paquete['cantidad']) }} <span>SMS</span></strong></th>
                                    <td class="pt-num pt-precio">US${{ $dolares($paquete['precio']) }} <span class="paquete-iva">+ IVA</span></td>
                                    <td class="pt-num pt-dato"><span class="pt-etiqueta">Precio por SMS</span> <span>${{ $limpio($paquete['precio_sms']) }}@if ($ahorro > 0) <span class="paquete-ahorro">-{{ $ahorro }}%</span>@else <span class="paquete-ahorro pt-sin-ahorro" aria-hidden="true"></span>@endif</span></td>
                                    <td class="pt-num pt-dato"><span class="pt-etiqueta">SMS adicional</span> <span>${{ $limpio($paquete['adicional']) }}</span></td>
                                    <td class="pt-mas"><button type="button" class="pt-boton" aria-expanded="false"><span class="pt-abrir">Ver más</span><span class="pt-cerrar">Ver menos</span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="table-note mt-4 mb-0">Precios en dólares estadounidenses, más IVA. El porcentaje es el ahorro por SMS comparado con el paquete más pequeño. Si necesitas un volumen mayor,
                    te cotizamos un paquete a la medida. <a href="{{ route('contactanos') }}">Hablar con un agente</a></p>
            </div>
        </section>

        {{-- 2. WhatsApp: precios por tipo de mensaje y calculadora --}}
        <section class="wa-section" id="whatsapp" aria-labelledby="whatsapp-title">
            <div class="container">
                <div class="wa-card p-3 p-md-4 p-lg-5">
                    <div class="row g-4 g-xl-5">
                        <div class="col-lg-7">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="wa-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor" focusable="false">
                                    <path d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.5 0 .16 5.34.16 11.91c0 2.1.55 4.16 1.6 5.97L.06 24l6.27-1.64a11.9 11.9 0 0 0 5.74 1.46h.01c6.57 0 11.91-5.34 11.91-11.91 0-3.18-1.24-6.17-3.47-8.43ZM12.08 21.8a9.9 9.9 0 0 1-5.05-1.38l-.36-.21-3.73.98 1-3.64-.23-.37a9.86 9.86 0 0 1-1.51-5.27c0-5.46 4.44-9.9 9.9-9.9 2.65 0 5.13 1.03 7 2.9a9.84 9.84 0 0 1 2.9 7c0 5.46-4.44 9.9-9.91 9.9Zm5.43-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.66.15-.2.3-.76.97-.93 1.17-.17.2-.34.22-.64.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.14-.13.3-.34.45-.51.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.31.17-1.43-.07-.12-.27-.2-.57-.35Z"/>
                                </svg></span>
                                <div>
                                    <span class="section-kicker kicker-wa">WhatsApp Business</span>
                                    <h2 class="section-title mb-0" id="whatsapp-title">Tarifas de WhatsApp</h2>
                                </div>
                            </div>
                            <p class="section-copy">Elige cómo usar WhatsApp. Con WhatsApp Business Web, cada mensaje
                                cuesta US$0.01. Con la API oficial de WhatsApp Business, Meta cobra según el tipo de
                                plantilla y el país del número. Estos son los precios para Costa Rica:</p>
                            <div class="wa-precios">
                                <div class="wa-precios-encabezado"><span>Mensaje de WhatsApp Business API</span><span>Precio por mensaje + IVA</span></div>
                                <ul>
                                    @foreach ($whatsapp as $mensaje)
                                        <li><span>{{ $mensaje['tipo'] }}</span><strong>${{ $mensaje['precio'] }}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- En celular esta nota se pliega detrás del botón (ver tarifas.css y tarifas.js) --}}
                            <button type="button" class="pt-boton wa-nota-boton" aria-expanded="false" aria-controls="wa-nota"><span class="pt-abrir">Más información</span><span class="pt-cerrar">Ver menos</span></button>
                            <p class="table-note wa-nota mt-3 mb-0" id="wa-nota">Si no tienes un número, te damos uno exclusivo por US$106 al mes.
                                Si tu empresa quiere la insignia de cuenta verificada, la valida desde su cuenta de Meta
                                Business, paga los mensajes directamente a Meta y SMS Empresarial cobra US$0.01 por mensaje.
                                Según el volumen, las tarifas pueden mejorar.</p>
                        </div>

                        <div class="col-lg-5">
                            {{-- Calculadora (como la de Twilio): el total se calcula en resources/js/pages/tarifas.js
                                 con los precios de data-precio, que salen de config/tarifas.php --}}
                            <form class="wa-calc" id="wa-calc" aria-labelledby="wa-calc-title" data-iva="{{ $iva }}" novalidate>
                                <h3 class="wa-calc-titulo" id="wa-calc-title">Calcula tu costo mensual</h3>

                                <div class="wa-calc-pais">
                                    <span class="wa-calc-etiqueta">País</span>
                                    <span class="wa-calc-pais-valor"><img src="{{ versioned_asset('images/banderas/cr.png') }}" alt="" width="20" height="15">Costa Rica (+506)</span>
                                </div>

                                <fieldset class="wa-calc-modo">
                                    <legend class="wa-calc-etiqueta">Cómo vas a usar WhatsApp</legend>
                                    <div class="wa-calc-modo-opciones">
                                        <label><input type="radio" name="modo" value="api" checked><span>API oficial</span></label>
                                        <label><input type="radio" name="modo" value="web"><span>Business Web</span></label>
                                    </div>
                                </fieldset>

                                <div class="wa-calc-total" aria-live="polite">
                                    <span class="wa-calc-etiqueta">Total mensual estimado</span>
                                    <strong>US$<span data-total>0.00</span></strong>
                                    <small>Subtotal $<span data-subtotal>0.00</span> + IVA ({{ $iva }}%) $<span data-iva>0.00</span></small>
                                </div>
                                <button type="button" class="wa-calc-reset" data-reset>Restablecer calculadora</button>

                                <div class="wa-calc-campos" data-modo="api">
                                    @foreach ($whatsapp as $mensaje)
                                        <x-wa-calc-grupo :clave="$mensaje['clave']" :titulo="$titulosCalculadora[$mensaje['clave']]" :precio="$mensaje['precio']" :abierto="$loop->first" />
                                    @endforeach
                                    <details class="wa-calc-grupo">
                                        <summary>
                                            <span class="wa-calc-grupo-nombre">Número exclusivo de WhatsApp</span>
                                            <span class="wa-calc-grupo-total">US$<span data-grupo-total>0.00</span></span>
                                        </summary>
                                        <div class="wa-calc-grupo-cuerpo">
                                            <label class="wa-calc-check">
                                                <input type="checkbox" data-precio="{{ config('tarifas.numero_exclusivo') }}">
                                                <span><span>Quiero un número exclusivo</span><small>US${{ config('tarifas.numero_exclusivo') }} <span>al mes. Incluye 12,000 SMS al mes.</span></small></span>
                                            </label>
                                        </div>
                                    </details>
                                </div>

                                <div class="wa-calc-campos" data-modo="web" hidden>
                                    <x-wa-calc-grupo clave="web" titulo="Mensajes de WhatsApp Business Web" :precio="config('tarifas.whatsapp_web')" :abierto="true" />
                                    <p class="wa-calc-ayuda mt-3">Con WhatsApp Business Web usas el número de un celular de tu empresa, que debe estar encendido.</p>
                                </div>

                                <p class="wa-calc-ayuda mt-3 mb-3">Es una estimación en dólares. Meta define la categoría de cada plantilla al aprobarla y puede cambiar sus precios.</p>
                                <a class="btn btn-brand w-100 py-2" href="https://api.whatsapp.com/send?phone=50622049494" target="_blank" rel="noopener noreferrer">Contactar a un agente</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. WhatsApp: cada tipo de mensaje con un ejemplo de cómo lo ve el cliente --}}
        <section class="wa-tipos" aria-labelledby="wa-tipos-title">
            <div class="container">
                <div class="row g-4 g-lg-5 align-items-center">
                    <div class="col-lg-6">
                        <span class="section-kicker kicker-wa">Tipos de mensajes</span>
                        <h2 class="section-title mt-2 mb-2" id="wa-tipos-title">¿Qué mensaje vas a enviar?</h2>
                        <p class="section-copy mb-4">Meta clasifica cada plantilla de WhatsApp en una categoría y cada una
                            tiene su precio. Explora los tipos para ver cómo los recibe tu cliente.</p>

                        <div class="wa-acordeon" id="wa-acordeon">
                            @foreach ($tiposWhatsapp as $clave => $tipo)
                                <div class="wa-acordeon-item">
                                    <h3 class="m-0">
                                        <button type="button" id="wa-tipo-{{ $clave }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="wa-panel-{{ $clave }}" data-tipo="{{ $clave }}">
                                            <span class="wa-acordeon-nombre">{{ $tipo['nombre'] }}</span>
                                            <span class="wa-acordeon-precio">${{ $whatsapp->firstWhere('clave', $clave)['precio'] }}</span>
                                            <span class="wa-acordeon-signo" aria-hidden="true"></span>
                                        </button>
                                    </h3>
                                    <div class="wa-acordeon-panel" id="wa-panel-{{ $clave }}" role="region" aria-labelledby="wa-tipo-{{ $clave }}" @unless ($loop->first) hidden @endunless>
                                        <p>{{ $tipo['texto'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 wa-escena-casa">
                        {{-- Ejemplos ilustrativos: el texto de cada categoría ya está en el acordeón --}}
                        <div class="wa-escena" aria-hidden="true">
                            <div class="wa-telefono">
                                <div class="wa-tel-barra">
                                    <span class="wa-tel-avatar">TE</span>
                                    <span class="wa-tel-nombre"><strong>Tu empresa <svg viewBox="0 0 24 24" focusable="false"><path fill="#25D366" d="m12 1 2.6 2.1 3.3-.3.9 3.2 2.9 1.6-1.2 3.1 1.2 3.1-2.9 1.6-.9 3.2-3.3-.3L12 23l-2.6-2.1-3.3.3-.9-3.2-2.9-1.6 1.2-3.1-1.2-3.1 2.9-1.6.9-3.2 3.3.3Z"/><path d="m7.8 12.2 2.8 2.8 5.6-5.6" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></strong><small>Cuenta de empresa</small></span>
                                </div>
                                <div class="wa-tel-chat">
                                    <div class="wa-chat" data-chat="marketing">
                                        <div class="wa-burbuja">
                                            <div class="wa-burbuja-media">
                                                <svg viewBox="0 0 48 48" focusable="false"><path d="M12 16h24l-2 24H14Z" fill="#fff" opacity=".95"/><path d="M18 18v-4a6 6 0 0 1 12 0v4" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round"/><text x="24" y="33" text-anchor="middle" font-size="10" font-weight="700" fill="#1f7a4d">20%</text></svg>
                                                <strong>Colección de verano</strong>
                                            </div>
                                            <p>¡Hola, Ana! Esta semana tienes 20% de descuento en toda la colección de verano. Usa el código <strong>VERANO20</strong> al pagar.</p>
                                            <span class="wa-hora">10:24</span>
                                            <span class="wa-burbuja-boton">Ver ofertas</span>
                                            <span class="wa-burbuja-boton">Dejar de recibir promociones</span>
                                        </div>
                                    </div>
                                    <div class="wa-chat" data-chat="utilidad" hidden>
                                        <div class="wa-burbuja">
                                            <p>Hola, Carlos. Tu pedido <strong>#4821</strong> ya va en camino y llega hoy entre 2:00 y 4:00 p. m.</p>
                                            <span class="wa-hora">12:03</span>
                                            <span class="wa-burbuja-boton">Rastrear pedido</span>
                                        </div>
                                    </div>
                                    <div class="wa-chat" data-chat="autenticacion" hidden>
                                        <div class="wa-burbuja">
                                            <p><strong class="wa-codigo">482915</strong> es tu código de verificación. Por tu seguridad, no lo compartas.</p>
                                            <p class="wa-burbuja-nota">Este código vence en 10 minutos.</p>
                                            <span class="wa-hora">6:15</span>
                                            <span class="wa-burbuja-boton">Copiar código</span>
                                        </div>
                                    </div>
                                    <div class="wa-chat" data-chat="servicio" hidden>
                                        <div class="wa-burbuja wa-burbuja-cliente">
                                            <p>Hola, ¿me recuerdan a qué hora es mi cita hoy?</p>
                                            <span class="wa-hora">11:53 <svg viewBox="0 0 18 12" focusable="false"><path d="m1 6.5 3.2 3.2L11 2.5M7 9.7 7.6 10.3 17 1.5" fill="none" stroke="#53bdeb" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                        </div>
                                        <div class="wa-burbuja">
                                            <p>¡Hola, María! Gracias por escribirnos. Tu cita es hoy a las 2:00 p. m. Te esperamos.</p>
                                            <span class="wa-hora">11:54</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-cta-panel
            section-class="pb-5"
            button-class="px-4 py-3"
            kicker="¿Listo para comenzar?"
            title="Activa tus comunicaciones"
            text="Crea tu cuenta y empieza a enviar mensajes desde una plataforma sencilla."
            :href="config('services.plataforma.registro')"
            label="Crear mi cuenta"
        />
    </main>
@endsection

{{--
VERSIÓN ANTERIOR (hasta noviembre 2026): SMS a Costa Rica y a otros países, con tabla de tarifas por destino. Se deja comentada por si hay que volver a ella.
Para volver a ella: reemplazar todo lo de arriba por lo que sigue y cambiar los <!-- --> por comentarios de Blade.

@php
    // Precio de un SMS a Costa Rica sin ceros de más (0.0120 → 0.012). Sale de config/tarifas.php.
    // Va en su propio <span> para que la traducción al inglés no dependa del precio.
    $precioLocal = rtrim(rtrim(collect(config('tarifas.sms'))->firstWhere('pais', 'Costa Rica')['precio'], '0'), '.');
    $paises = count(config('tarifas.sms'));
@endphp

@extends('layouts.app', [
    'pageKey' => 'tarifas',
    'footerVariant' => 'tarifas',
    'title' => 'Precio de SMS y WhatsApp en Costa Rica | SMS Empresarial',
    // Si cambia el precio o la cantidad de países, actualizar también esta frase en public/lang/en.json.
    'description' => 'SMS a Costa Rica desde US$'.$precioLocal.' + IVA y WhatsApp desde US$0.01 por mensaje. Tarifas para '.$paises.' países, prepago desde US$30 o pospago.',
    'breadcrumb' => 'Tarifas',
    // Datos estructurados: el servicio y su precio por destino (sale de config/tarifas.php).
    'schema' => [[
        '@type' => 'Service',
        '@id' => route('tarifas').'#servicio',
        'name' => 'Envío de SMS masivos',
        'serviceType' => 'SMS masivos y mensajería empresarial',
        'provider' => ['@id' => url('/').'/#organization'],
        'areaServed' => array_map(fn ($tarifa) => ['@type' => 'Country', 'name' => $tarifa['pais']], config('tarifas.sms')),
        'offers' => array_map(fn ($tarifa) => [
            '@type' => 'Offer',
            'name' => 'SMS a '.$tarifa['pais'].' ('.$tarifa['marcacion'].')',
            'price' => $tarifa['precio'],
            'priceCurrency' => 'USD',
            'priceSpecification' => [
                '@type' => 'UnitPriceSpecification',
                'price' => $tarifa['precio'],
                'priceCurrency' => 'USD',
                'unitText' => 'mensaje',
                'valueAddedTaxIncluded' => false,
            ],
            'url' => route('tarifas'),
        ], config('tarifas.sms')),
    ]],
])

@section('content')
    <main id="contenido">
        <header class="rates-hero page-hero">
            <div class="container">
                <x-breadcrumbs current="Tarifas" />
                <span class="eyebrow mb-3">Tarifas de SMS y WhatsApp</span>
                <h1 class="mb-3">Desde <span>US${{ $precioLocal }}</span> por SMS en Costa Rica.</h1>
                <p class="mb-0">Pagas solo por mensaje enviado. Abres tu cuenta con una recarga desde US$30 y el saldo dura
                    12 meses. Si envías todos los meses, puedes pasar a pospago con contrato y recibir una factura mensual.
                    Las tarifas están en dólares estadounidenses.</p>
                <div class="hero-stats">
                    <span class="hero-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/>
                    </svg>Cobertura internacional</span>
                    <span class="hero-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M4 6h16v10H8l-4 4Z"/>
                        <path d="M12 8.5v5M10 9.75h3a1.25 1.25 0 0 1 0 2.5h-2a1.25 1.25 0 0 0 0 2.5h3"/>
                    </svg>Pago por mensaje</span>
                    <span class="hero-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>Sin costos ocultos</span>
                </div>
            </div>
        </header>

        <section class="container rates-wrap pb-4" aria-labelledby="sms-title">
            <div class="panel p-3 p-md-4 p-lg-5">
                <div class="d-flex flex-column flex-lg-row align-items-lg-end justify-content-between gap-3 mb-4">
                    <div>
                        <span class="section-kicker">Tarifas SMS</span>
                        <h2 class="section-title mt-2 mb-2" id="sms-title">Tarifas por país</h2>
                        <p class="section-copy mb-0">Precios por mensaje enviado. Busca un país o navega la lista completa.</p>
                    </div>
                    <label class="searchbox" aria-label="Buscar país"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
                        <circle cx="11" cy="11" r="7"/>
                        <path d="m16 16 4 4"/>
                    </svg><input type="search" id="country-search" placeholder="Buscar país o código…" autocomplete="off"></label>
                </div>

                <div class="table-shell" id="rate-table">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th scope="col">País / destino</th>
                                <th scope="col">Tarifa por SMS</th>
                                <th scope="col">Ruta</th>
                            </tr>
                        </thead>
                        <tbody id="rate-rows">
                            <!-- Las tarifas se editan en config/tarifas.php -->
                            @foreach (config('tarifas.sms') as $tarifa)
                                <tr data-country="{{ $tarifa['buscar'] }}">
                                    <td><span class="country"><img class="flag" src="{{ versioned_asset('images/banderas/'.$tarifa['bandera'].'.png') }}" alt="" width="20" height="15" loading="lazy" decoding="async">{{ $tarifa['pais'] }} <span class="dial">({{ $tarifa['marcacion'] }})</span></span></td>
                                    <td class="price">${{ $tarifa['precio'] }} <span class="text-muted fw-normal">por mensaje + IVA*</span></td>
                                    <td><span class="badge-route">{{ $tarifa['ruta'] }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="table-note mt-3 mb-0">* El IVA se cobra únicamente a clientes de Costa Rica. Tarifas en dólares estadounidenses.
                    Si envías un volumen alto de mensajes, podemos mejorar tu tarifa.</p>

                <x-empty-state
                    id="empty-results"
                    title="No encontramos ese destino"
                    text="Revisa cómo está escrito o busca por código de país, por ejemplo +506."
                    link-text="¿Necesitas otro país? Cotízalo con un agente"
                />
            </div>
        </section>

        <section class="wa-section" id="whatsapp">
            <div class="container">
                <div class="wa-card p-4 p-md-5">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-8">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="wa-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor" focusable="false">
                                    <path d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.5 0 .16 5.34.16 11.91c0 2.1.55 4.16 1.6 5.97L.06 24l6.27-1.64a11.9 11.9 0 0 0 5.74 1.46h.01c6.57 0 11.91-5.34 11.91-11.91 0-3.18-1.24-6.17-3.47-8.43ZM12.08 21.8a9.9 9.9 0 0 1-5.05-1.38l-.36-.21-3.73.98 1-3.64-.23-.37a9.86 9.86 0 0 1-1.51-5.27c0-5.46 4.44-9.9 9.9-9.9 2.65 0 5.13 1.03 7 2.9a9.84 9.84 0 0 1 2.9 7c0 5.46-4.44 9.9-9.91 9.9Zm5.43-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.66.15-.2.3-.76.97-.93 1.17-.17.2-.34.22-.64.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.14-.13.3-.34.45-.51.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.7.25-1.31.17-1.43-.07-.12-.27-.2-.57-.35Z"/>
                                </svg></span>
                                <div>
                                    <span class="section-kicker kicker-wa">También disponible</span>
                                    <h2 class="section-title mb-0">Tarifas de WhatsApp</h2>
                                </div>
                            </div>
                            <p class="section-copy">Elige cómo usar WhatsApp. Con WhatsApp Business Web, cada mensaje
                                cuesta US$0.01. Con la API oficial de WhatsApp Business, Meta cobra según el tipo de
                                plantilla y el país del número. Estos son los precios para Costa Rica:</p>
                            <!-- Los precios se editan en config/tarifas.php -->
                            <div class="wa-precios">
                                <div class="wa-precios-encabezado"><span>Mensaje de WhatsApp Business API</span><span>Precio por mensaje + IVA</span></div>
                                <ul>
                                    @foreach (config('tarifas.whatsapp') as $mensaje)
                                        <li><span>{{ $mensaje['tipo'] }}</span><strong>${{ $mensaje['precio'] }}</strong></li>
                                    @endforeach
                                </ul>
                            </div>
                            <p class="table-note mt-3 mb-0">Si no tienes un número, te damos uno exclusivo por US$106 al mes.
                                Si tu empresa quiere la insignia de cuenta verificada, la valida desde su cuenta de Meta
                                Business, paga los mensajes directamente a Meta y SMS Empresarial cobra US$0.01 por mensaje.
                                Según el volumen, las tarifas pueden mejorar.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="wa-note">
                                <strong>¿Necesitas una tarifa?</strong><br>Cuéntanos a qué país quieres escribir y un agente te ayudará con la opción adecuada.
                                <div class="mt-3">
                                    <a class="btn btn-brand px-4 py-2" href="https://api.whatsapp.com/send?phone=50622049494" target="_blank" rel="noopener noreferrer">Contactar a un agente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-cta-panel
            section-class="pb-5"
            button-class="px-4 py-3"
            kicker="¿Listo para comenzar?"
            title="Activa tus comunicaciones"
            text="Crea tu cuenta y empieza a enviar mensajes desde una plataforma sencilla."
            :href="config('services.plataforma.registro')"
            label="Crear mi cuenta"
        />
    </main>
@endsection
--}}
