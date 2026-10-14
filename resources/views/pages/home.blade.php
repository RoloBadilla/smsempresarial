@extends('layouts.app', ['pageKey' => 'home', 'footerVariant' => 'marketing'])

@section('title')
SMS empresarial en Costa Rica | SMS masivos y WhatsApp
@endsection

@section('seo')
<meta property="og:locale" content="es_CR">
<meta property="og:title" content="SMS Empresarial en Costa Rica | SMS y WhatsApp Masivos">
<meta property="og:url" content="https://smsempresarial.com/">
<meta name="twitter:title" content="SMS Empresarial en Costa Rica | SMS y WhatsApp Masivos">
<!-- Bootstrap -->
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
  
  <!-- Tipografía -->
@endsection

@section('content')


  <!-- ===== MENU ===== -->
  

  <!-- ===== PORTADA ===== -->
  <header class="hero py-5">
    <div class="container py-lg-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-7">
          <h1 class="mb-4">SMS masivos y WhatsApp empresarial en Costa Rica</h1>
          <p class="lead mb-4">Ponemos a tu disposici&oacute;n el env&iacute;o de mensajes de texto (SMS) y WhatsApp desde tu computadora a tel&eacute;fonos celulares en distintos pa&iacute;ses. La plataforma permite planificar campa&ntilde;as, enviar notificaciones y conectar tus sistemas mediante una API de mensajer&iacute;a.</p>
          <div class="d-flex flex-wrap gap-3 mb-4">
            <a href="#" class="btn btn-azul btn-lg px-5">¡Lo quiero!</a>
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
              <div class="mensaje"><b style="color:var(--azul)">SMS</b><br>Recordatorio de evento</div>
              <div class="mensaje"><b style="color:#128C4A">WhatsApp</b><br>Promoción para clientes</div>
              <div class="mensaje"><b style="color:var(--azul)">SMS</b><br>Su código OTP / Token</div>
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
  <section class="container py-5 my-lg-4">
    <h2 class="fw-bold mb-3" style="color:var(--marino)">Desde nuestra plataforma usted podrá</h2>
    <p class="fs-5 mb-5" style="max-width:820px;color:#3B4A66">Desde la aplicación de SMSEmpresarial.com podrá enviar mensajes de texto SMS (Short Message Service) o WhatsApp (mensajes cortos de texto) a sus clientes para:</p>

    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v2a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1z"/><path d="M15 9a4 4 0 0 1 0 6"/><path d="M18 6.5a8 8 0 0 1 0 11"/></svg></div>
          <h3>Enviar Comunicados</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg></div>
          <h3>Enviar Recordatorios / Eventos</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4l-7.2 7.2a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="7.5" r="1.2"/></svg></div>
          <h3>Promociones o Campañas de Publicidad / Envío masivo</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0"/></svg></div>
          <h3>Notificaciones o Alertas</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/></svg></div>
          <h3>Envíe su OTP o Token para el 2FA - Segundo Factor de autenticación o validación</h3>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="tarjeta">
          <div class="icono"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2C62B1" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h13l-3-3"/><path d="M17 17H4l3 3"/></svg></div>
          <h3>Comunicarse bidireccionalmente con sus clientes / SINPE móvil</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== BANDA 99% ===== -->
  <section class="banda py-5">
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
          <a href="/rutasytarifas.html" class="btn btn-light btn-lg rounded-pill fw-bold px-4" style="color:var(--marino)">Tabla de destinos y tarifas</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== OPINIONES ===== -->
    <section class="container py-5 text-center">
    <div class="d-flex flex-wrap align-items-center justify-content-center gap-4">
        <h2 class="fw-bold fs-3 m-0" style="color:var(--marino)">
        Lo que nuestros clientes dicen
        </h2>

        <div class="d-flex align-items-center gap-3 bg-white border rounded-4 px-4 py-3">
        <span class="fw-bold">Google Reviews</span>
        <span class="display-5 fw-bold lh-1" style="color:var(--marino)">4.8</span>
        <span>
            <span style="color:#E8A400;letter-spacing:2px">&#9733;&#9733;&#9733;&#9733;&#9733;</span><br>
            <small class="text-secondary">34 reviews</small>
        </span>
        </div>
    </div>
    </section>

  <!-- ===== PIE DE PÁGINA ===== -->
  <!-- ===== MARCAS QUE ROTAN ===== -->
  <section class="marcas" aria-label="Marcas del grupo Cyberfuel">
    <div class="marcas-track" aria-hidden="true">
      <div class="marcas-grupo">
        <img class="marca-logo" src="{{ asset('site-img/cyberfuel.svg') }}" alt="Cyberfuel" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/factura-profesional.svg') }}" alt="Factura Profesional" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/planilla.svg') }}" alt="Planilla" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/cybersinpe.svg') }}" alt="CyberSinpe" width="190" height="48">
      </div>
      <div class="marcas-grupo">
        <img class="marca-logo" src="{{ asset('site-img/cyberfuel.svg') }}" alt="" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/factura-profesional.svg') }}" alt="" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/planilla.svg') }}" alt="" width="190" height="48">
        <img class="marca-logo" src="{{ asset('site-img/cybersinpe.svg') }}" alt="" width="190" height="48">
      </div>
    </div>
  </section>
  
  
  <!-- Bootstrap JS (necesario para el menú en celular) -->
  

@endsection
