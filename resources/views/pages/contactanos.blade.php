@extends('layouts.app', ['pageKey' => 'contactanos', 'footerVariant' => 'contact'])

@section('title')
Contáctanos | SMS Empresarial Costa Rica
@endsection

@section('seo')
<meta name="description" content="Contacta a SMS Empresarial para recibir asesoría sobre SMS masivos, WhatsApp Business, tarifas e integración de mensajería.">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <link rel="canonical" href="https://smsempresarial.com/contactanos.html">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_CR">
  <meta property="og:site_name" content="SMS Empresarial">
  <meta property="og:title" content="Contáctanos | SMS Empresarial Costa Rica">
  <meta property="og:description" content="Contacta a SMS Empresarial para recibir asesoría sobre SMS masivos, WhatsApp Business, tarifas e integración de mensajería.">
  <meta property="og:url" content="https://smsempresarial.com/contactanos.html">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Contáctanos | SMS Empresarial Costa Rica">
  <meta name="twitter:description" content="Contacta a SMS Empresarial para recibir asesoría sobre SMS masivos, WhatsApp Business, tarifas e integración de mensajería.">
  <script type="application/ld+json">{"@@context":"https://schema.org","@graph":[{"areaServed":"Costa Rica","name":"SMS Empresarial","telephone":"+506 2204 9494","email":"info@cyberfuel.com","@type":"Organization","url":"https://smsempresarial.com/"},{"url":"https://smsempresarial.com/","name":"SMS Empresarial","@id":"https://smsempresarial.com/#website","@type":"WebSite","inLanguage":"es-CR"},{"isPartOf":{"@id":"https://smsempresarial.com/#website"},"name":"Contáctanos | SMS Empresarial Costa Rica","inLanguage":"es-CR","description":"Contacta a SMS Empresarial para recibir asesoría sobre SMS masivos, WhatsApp Business, tarifas e integración de mensajería.","@type":"WebPage","url":"https://smsempresarial.com/contactanos.html"}]}</script>
@endsection

@section('content')



<main id="contenido" class="main"><header class="contact-hero page-hero"><div class="container"><x-breadcrumbs current="Contáctanos" /><span class="pill mb-3">Estamos para ayudarte</span><h1 class="mb-3">Hablemos de tu próximo mensaje.</h1><p class="mb-0">Cuéntanos qué necesitas comunicar. Nuestro equipo puede orientarte sobre SMS, WhatsApp Business, tarifas e integración con tus sistemas. Atendemos consultas de empresas sobre env&iacute;os de SMS, WhatsApp Business, tarifas e integraci&oacute;n con sistemas.</p></div></header><section class="container contact-wrap" id="contacto"><div class="card-panel p-3 p-md-4 p-lg-5"><div class="row g-4 g-lg-5">
<div class="col-lg-7"><span class="eyebrow">Escríbenos</span><h2 class="title mt-2 mb-2">¿Cómo podemos ayudarte?</h2><p class="copy mb-4">Completa tus datos y prepara un mensaje para nuestro equipo.</p>
<form id="contact-form" method="post" action="{{ route('contact.submit') }}">
@csrf
@if($errors->any())<div class="alert alert-danger" role="alert"><strong>Por favor revisa los campos indicados:</strong><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif<div class="row g-3"><div class="col-md-6"><label class="form-label" for="nombre">Nombre</label><input class="form-control" id="nombre" name="nombre" autocomplete="name" required></div><div class="col-md-6"><label class="form-label" for="empresa">Empresa</label><input class="form-control" id="empresa" name="empresa" autocomplete="organization"></div><div class="col-md-6"><label class="form-label" for="correo">Correo electrónico</label><input class="form-control" id="correo" name="correo" type="email" autocomplete="email" required></div><div class="col-md-6"><label class="form-label" for="tema">¿Sobre qué quieres conversar?</label><select class="form-select" id="tema" name="tema"><option>Información general</option><option>Tarifas SMS</option><option>WhatsApp Business</option><option>Integración API</option><option>Soporte</option></select></div><div class="col-12"><label class="form-label" for="mensaje">Mensaje</label><textarea class="form-control" id="mensaje" name="mensaje" rows="5" required placeholder="Cuéntanos un poco sobre lo que necesitas…"></textarea></div><div class="col-12 d-flex flex-column flex-sm-row align-items-sm-center gap-3"><button class="btn btn-brand" type="submit">Preparar mi mensaje <span aria-hidden="true">→</span></button><span class="small text-secondary">Se abrirá tu aplicación de correo para enviarlo.</span></div></div></form>
</div><aside class="col-lg-5"><div class="row g-3">
<div class="col-12"><article class="contact-item"><div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></div><h3>Correo electrónico</h3><p class="mb-1">Escríbenos y te ayudaremos con tu consulta.</p><a href="mailto:info@cyberfuel.com">info@cyberfuel.com</a></article></div>
<div class="col-12"><article class="contact-item"><div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg></div><h3>Llámanos o escríbenos</h3><p class="mb-1">Atención por teléfono y WhatsApp.</p><a href="tel:+50622049494">+506 2204 9494</a><a href="https://api.whatsapp.com/send?phone=50622049494" target="_blank" rel="noopener noreferrer">Abrir WhatsApp</a></article></div>
<div class="col-12"><article class="contact-item"><div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 21s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg></div><h3>Visítanos</h3><p class="mb-0">Edificio E, Forum 1<br>Santa Ana, San José, Costa Rica</p></article></div>
</div><p class="note mt-3 mb-0">Al enviar tu consulta, tu aplicación de correo se abrirá con los datos que ingresaste para que puedas revisar y enviar el mensaje.</p></aside>
</div></div></section>
<x-cta-panel section-class="pt-5" kicker="¿Ya tienes todo listo?" title="Empieza a comunicarte" text="Conoce las opciones para enviar mensajes a tus clientes." href="/rutasytarifas.html" label="Ver rutas y tarifas" />
</main>




@endsection
