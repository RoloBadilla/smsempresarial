@extends('layouts.app', ['pageKey' => 'home', 'footerVariant' => 'marketing'])

@section('title')
SMS empresarial en Costa Rica | SMS masivos y WhatsApp
@endsection

@section('seo')
<meta property="og:locale" content="es_CR">
<meta property="og:title" content="SMS Empresarial en Costa Rica | SMS y WhatsApp Masivos">
<meta property="og:url" content="https://smsempresarial.com/">
<meta name="twitter:title" content="SMS Empresarial en Costa Rica | SMS y WhatsApp Masivos">
    <meta name="description" content="Envía SMS masivos y mensajes por WhatsApp en Costa Rica. Automatiza campañas, recordatorios y códigos OTP desde una plataforma web o API.">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <link rel="canonical" href="https://smsempresarial.com/">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_CR">
  <meta property="og:site_name" content="SMS Empresarial">
  <meta property="og:title" content="SMS empresarial en Costa Rica | SMS masivos y WhatsApp">
  <meta property="og:description" content="Envía SMS masivos y mensajes por WhatsApp en Costa Rica. Automatiza campañas, recordatorios y códigos OTP desde una plataforma web o API.">
  <meta property="og:url" content="https://smsempresarial.com/">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="SMS empresarial en Costa Rica | SMS masivos y WhatsApp">
  <meta name="twitter:description" content="Envía SMS masivos y mensajes por WhatsApp en Costa Rica. Automatiza campañas, recordatorios y códigos OTP desde una plataforma web o API.">
  <script type="application/ld+json">{"@@context":"https://schema.org","@graph":[{"areaServed":"Costa Rica","name":"SMS Empresarial","telephone":"+506 2204 9494","email":"info@cyberfuel.com","@type":"Organization","url":"https://smsempresarial.com/"},{"url":"https://smsempresarial.com/","name":"SMS Empresarial","@id":"https://smsempresarial.com/#website","@type":"WebSite","inLanguage":"es-CR"},{"isPartOf":{"@id":"https://smsempresarial.com/#website"},"name":"SMS empresarial en Costa Rica | SMS masivos y WhatsApp","inLanguage":"es-CR","description":"Envía SMS masivos y mensajes por WhatsApp en Costa Rica. Automatiza campañas, recordatorios y códigos OTP desde una plataforma web o API.","@type":"WebPage","url":"https://smsempresarial.com/"}]}</script>
@endsection

@section('content')
  <main id="contenido">
  <!-- ===== PORTADA ===== -->
  <header class="hero hero-home">
    <svg class="hero-shapes" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
      <defs>
        <linearGradient id="hero-arc" x1="0" y1="0" x2="1" y2="1"><stop class="stop-a" offset="0"/><stop class="stop-b" offset="1"/></linearGradient>
      </defs>
      <circle class="shape-arc" cx="960" cy="380" r="300"/>
      <circle class="shape-ring" cx="960" cy="380" r="390"/>
      <circle class="shape-ring shape-ring--dashed" cx="960" cy="380" r="480"/>
      <path class="shape-wave" d="M-40 690 C 260 590, 520 780, 820 680 S 1240 600, 1260 640"/>
      <path class="shape-wave shape-wave--soft" d="M-40 730 C 300 640, 540 820, 860 720 S 1240 650, 1260 690"/>
    </svg>
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-7">
          <h1 class="mb-4">SMS masivos y WhatsApp empresarial en Costa Rica</h1>
          <p class="lead mb-4">Ponemos a tu disposici&oacute;n el env&iacute;o de mensajes de texto (SMS) y WhatsApp desde tu computadora a tel&eacute;fonos celulares en distintos pa&iacute;ses. La plataforma permite planificar campa&ntilde;as, enviar notificaciones y conectar tus sistemas mediante una API de mensajer&iacute;a.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <a href="#" class="btn btn-azul btn-lg px-5 btn-hero-primario">¡Lo quiero!</a>
            <a href="/rutasytarifas.html" class="btn btn-hero-secundario btn-lg px-4 rounded-pill fw-bold">Consultar tarifas</a>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <span class="etiqueta">Campañas personalizadas</span>
            <span class="etiqueta">API de integración</span>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="hero-visual">
          <div class="celular shadow-lg">
            <div class="pantalla">
              <div class="mensaje"><b class="tag-sms">SMS</b><br>Recordatorio de evento</div>
              <div class="mensaje"><b class="tag-wa">WhatsApp</b><br>Promoción para clientes</div>
              <div class="mensaje"><b class="tag-sms">SMS</b><br>Su código OTP / Token</div>
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
    <h2 class="mb-3">Desde nuestra plataforma usted podrá</h2>
    <p class="section-lead mb-0">Desde la aplicación de SMSEmpresarial.com podrá enviar mensajes de texto SMS (Short Message Service) o WhatsApp (mensajes cortos de texto) a sus clientes para:</p>
    </div>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v2a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1z"/><path d="M15 9a4 4 0 0 1 0 6"/><path d="M18 6.5a8 8 0 0 1 0 11"/></svg></div>
          <h3>Enviar Comunicados</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg></div>
          <h3>Enviar Recordatorios / Eventos</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4l-7.2 7.2a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="7.5" r="1.2"/></svg></div>
          <h3>Promociones o Campañas de Publicidad / Envío masivo</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0"/></svg></div>
          <h3>Notificaciones o Alertas</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg></div>
          <h3>Envíe su OTP o Token para el 2FA - Segundo Factor de autenticación o validación</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h13l-3-3"/><path d="M17 17H4l3 3"/></svg></div>
          <h3>Comunicarse bidireccionalmente con sus clientes / SINPE móvil</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== BANDA 99% ===== -->
  <section class="banda">
    <div class="container py-3">
      <div class="row align-items-center g-4">
        <div class="col-lg-auto"><div class="numero">99%</div><span class="banda-etiqueta">de los mensajes de texto son leídos</span></div>
        <div class="col-lg">
          <div class="banda-mensaje">
            <span class="banda-icono" aria-hidden="true">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16v12H4z"/><path d="m4 7 8 6 8-6"/><path d="m14.5 17 2 2 4-4"/></svg>
            </span>
            <h2 class="fw-bold mb-0">Tus mensajes sí se leen.</h2>
          </div>
          <p class="banda-descripcion mb-4">Usa SMS para enviar avisos, promociones y recordatorios a tus clientes.</p>
          <a href="/rutasytarifas.html" class="btn btn-banda btn-lg rounded-pill fw-bold px-4">Tabla de destinos y tarifas</a>
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
        <span class="reviews-score display-5 fw-bold lh-1">4.8</span>
        <span>
            <span class="reviews-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span><br>
            <small class="text-secondary">34 reviews</small>
        </span>
        </div>
    </div>
    </section>
  <!-- ===== MARCAS QUE ROTAN ===== -->
  </main>
  <x-brand-marquee />
  

@endsection
