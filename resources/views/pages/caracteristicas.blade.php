@extends('layouts.app', ['pageKey' => 'caracteristicas', 'footerVariant' => 'marketing'])

@section('title')
Características de SMS Empresarial | SMS, WhatsApp y API
@endsection

@section('seo')
  <meta name="description" content="Funciones de SMS Empresarial: campañas masivas de SMS y WhatsApp, integración por API, recepción de respuestas, reportes y gestión de contactos.">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <link rel="canonical" href="{{ route('caracteristicas') }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_CR">
  <meta property="og:site_name" content="SMS Empresarial">
  <meta property="og:title" content="Características de SMS Empresarial | SMS, WhatsApp y API">
  <meta property="og:description" content="Funciones de SMS Empresarial: campañas masivas de SMS y WhatsApp, integración por API, recepción de respuestas, reportes y gestión de contactos.">
  <meta property="og:url" content="{{ route('caracteristicas') }}">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Características de SMS Empresarial | SMS, WhatsApp y API">
  <meta name="twitter:description" content="Funciones de SMS Empresarial: campañas masivas de SMS y WhatsApp, integración por API, recepción de respuestas, reportes y gestión de contactos.">
  <script type="application/ld+json">{"@@context":"https://schema.org","@graph":[{"@type":"Organization","@id":"{{ url('/') }}/#organization","name":"SMS Empresarial","url":"{{ url('/') }}/","telephone":"+506 2204 9494","email":"info@cyberfuel.com","areaServed":"Costa Rica"},{"@type":"WebSite","@id":"{{ url('/') }}/#website","url":"{{ url('/') }}/","name":"SMS Empresarial","inLanguage":"es-CR","publisher":{"@id":"{{ url('/') }}/#organization"}},{"@type":"WebPage","@id":"{{ route('caracteristicas') }}#webpage","url":"{{ route('caracteristicas') }}","name":"Características de SMS Empresarial | SMS, WhatsApp y API","description":"Funciones de SMS Empresarial: campañas masivas de SMS y WhatsApp, integración por API, recepción de respuestas, reportes y gestión de contactos.","inLanguage":"es-CR","isPartOf":{"@id":"{{ url('/') }}/#website"},"breadcrumb":{"@id":"{{ route('caracteristicas') }}#breadcrumb"}},{"@type":"BreadcrumbList","@id":"{{ route('caracteristicas') }}#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Inicio","item":"{{ url('/') }}/"},{"@type":"ListItem","position":2,"name":"Características","item":"{{ route('caracteristicas') }}"}]}]}</script>
@endsection

@section('content')

  
  <main id="contenido">
    <header class="pagina-hero page-hero">
      <div class="container pagina-hero-inner">
        <div class="caracteristicas-hero-grid">
          <div>
            <x-breadcrumbs current="Características" />
            <span class="pagina-kicker mb-3">Plataforma de mensajería empresarial</span>
            <h1 class="mb-3">Todo lo que necesitas para comunicarte mejor</h1>
            <p class="mb-0">Envía mensajes, organiza tus contactos, recibe respuestas y revisa resultados desde una sola plataforma para SMS y WhatsApp.</p>
          </div>
          <x-orbita-rutas />
        </div>
      </div>
    </header>

    <section class="feature-section container py-5" id="envio">
      <div class="feature-heading">
        <h2>Envío de mensajes</h2>
        <p>Elige cómo enviar tus comunicaciones: individualmente, a grupos o mediante integraciones con tus sistemas.</p>
      </div>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col"><article class="feature-card">
          <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v14H4z"/><path d="m4 7 8 6 8-6"/><path d="M8 3h8"/></svg></span>
          <div><h3>Mensajes individuales y grupales</h3><p>Envía uno o varios mensajes en el momento o prográmalos para una fecha determinada.</p></div>
        </article></div>
        <div class="col"><article class="feature-card">
          <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10v4h4l9 5V5l-9 5H3Z"/><path d="M7 14l2 6h4l-3-7"/><path d="M19 9a5 5 0 0 1 0 6"/></svg></span>
          <div><h3>Campañas masivas personalizadas</h3><p>Carga contactos desde Excel, personaliza cada mensaje con los datos de tu lista y programa el envío.</p></div>
        </article></div>
        <div class="col"><article class="feature-card">
          <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="M4 7h16"/><path d="m7 11 2 2-2 2M12 15h5"/></svg></span>
          <div><h3>Convierte correos en mensajes</h3><p>Envía el contenido de un correo como mensaje de texto y usa su encabezado para identificarlo.</p></div>
        </article></div>
        <div class="col"><article class="feature-card">
          <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m8 8-4 4 4 4M16 8l4 4-4 4M14 5l-4 14"/></svg></span>
          <div><h3>Integración Web Service / API</h3><p>Conecta tus sistemas mediante API REST (GET o POST) o Web Service SOAP para enviar SMS y WhatsApp.</p></div>
        </article></div>
      </div>
    </section>

    <section class="feature-band py-5" id="recepcion">
      <div class="container">
        <div class="feature-heading">
          <h2>Recepción de mensajes</h2>
          <p>Integra las respuestas de tus clientes en los procesos de atención y seguimiento.</p>
        </div>
        <article class="feature-card feature-horizontal">
          <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 11.5a7.5 7.5 0 0 1-7.5 7.5H7l-4 2v-6.5A7.5 7.5 0 1 1 20 11.5Z"/><path d="M8 11h8M8 14h5"/></svg></span>
          <div><h3>Recibe respuestas por tus rutas</h3><p>Configura rutas de recepción para consultar los mensajes entrantes en la plataforma, recibirlos por correo o procesarlos mediante un Web Service.</p></div>
        </article>
      </div>
    </section>

    <section class="feature-section container py-5" id="reportes">
      <div class="feature-heading">
        <h2>Reportes para dar seguimiento</h2>
        <p>Consulta el historial de mensajes enviados y recibidos con filtros de búsqueda para encontrar la información que necesitas.</p>
      </div>
      <div class="feature-note"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m5 12 5 5 9-10"/></svg> Historial de mensajes enviados y recibidos</div>
    </section>

    <section class="feature-band py-5" id="configuracion">
      <div class="container">
        <div class="feature-heading">
          <h2>Configuración y gestión de contactos</h2>
          <p>Organiza destinatarios y controla cómo se distribuyen tus campañas.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col"><article class="feature-card">
            <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M3 20v-1a6 6 0 0 1 12 0v1H3ZM17 11a3 3 0 1 0-2-5.2M17 14a5 5 0 0 1 4 5v1h-3"/></svg></span>
            <div><h3>Contactos</h3><p>Registra nombres y números para enviar mensajes a destinatarios individuales.</p></div>
          </article></div>
          <div class="col"><article class="feature-card">
            <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6h12M9 12h12M9 18h12"/><path d="M4 6h.01M4 12h.01M4 18h.01"/></svg></span>
            <div><h3>Listas de contactos</h3><p>Agrupa contactos y selecciona una lista para enviar el mismo mensaje a todos sus integrantes.</p></div>
          </article></div>
          <div class="col"><article class="feature-card">
            <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 9 6 6M15 9l-6 6"/></svg></span>
            <div><h3>Lista de bloqueos</h3><p>Administra números bloqueados para evitar comunicaciones a destinatarios que no deseas contactar.</p></div>
          </article></div>
          <div class="col"><article class="feature-card">
            <span class="feature-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5h16v14H4z"/><path d="M8 9h8M8 13h5"/><path d="m15 17 2 2 4-4"/></svg></span>
            <div><h3>Sistema de suscripción</h3><p>Gestiona las altas y solicitudes de baja de tus destinatarios según las reglas configuradas para cada ruta.</p></div>
          </article></div>
        </div>
      </div>
    </section>

    <section class="container py-5">
      <div class="feature-cta">
        <h2 class="mb-3">Conoce una forma más directa de comunicarte</h2>
        <p class="mb-4">Explora cómo combinar SMS, WhatsApp y automatización para mantener informados a tus clientes.</p>
        <a href="{{ route('home') }}" class="btn btn-celeste btn-lg rounded-pill px-4">Volver al inicio</a>
      </div>
    </section>
  </main>
  <x-brand-marquee />

  
  
  

@endsection
