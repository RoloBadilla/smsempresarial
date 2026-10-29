@extends('layouts.app', [
    'pageKey' => 'tarifas',
    'footerVariant' => 'tarifas',
    'title' => 'Tarifas de SMS | SMS Empresarial Costa Rica',
    'description' => 'Consulta las tarifas por SMS de SMS Empresarial en Costa Rica y otros destinos. Solicita una cotización para WhatsApp Business.',
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
                <span class="eyebrow mb-3">Mensajería sin fronteras</span>
                <h1 class="mb-3">Tarifas de SMS en Costa Rica y más destinos.</h1>
                <p class="mb-0">Consulta nuestras tarifas de SMS por destino y elige cómo conectar con tus clientes. Precios
                    transparentes para planear tus campañas con confianza. La tabla presenta el costo por mensaje enviado
                    seg&uacute;n el destino; las tarifas se muestran en d&oacute;lares estadounidenses.</p>
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
                            {{-- Las tarifas se editan en config/tarifas.php --}}
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
                <p class="table-note mt-3 mb-0">* El IVA se cobra únicamente a clientes de Costa Rica. Tarifas expresadas en dólares estadounidenses.</p>

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
                            <p class="section-copy mb-0">WhatsApp Business requiere un número exclusivo para trabajar con las tarifas de WhatsApp y
                                SMS Empresarial. Cada conversación se cotiza según el país y el tipo de servicio.</p>
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
