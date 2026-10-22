@extends('layouts.app', ['pageKey' => 'faq', 'footerVariant' => 'marketing'])

@section('title')
Preguntas frecuentes sobre SMS y WhatsApp | SMS Empresarial
@endsection

@section('seo')
  <meta name="description" content="Resuelve tus dudas sobre SMS Empresarial: campañas, WhatsApp, tarifas, saldo, contactos, mensajes SMS y uso de la plataforma.">
  <meta name="robots" content="index,follow,max-image-preview:large">
  <link rel="canonical" href="{{ route('faq') }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="es_CR">
  <meta property="og:site_name" content="SMS Empresarial">
  <meta property="og:title" content="Preguntas frecuentes sobre SMS y WhatsApp | SMS Empresarial">
  <meta property="og:description" content="Resuelve tus dudas sobre SMS Empresarial: campañas, WhatsApp, tarifas, saldo, contactos, mensajes SMS y uso de la plataforma.">
  <meta property="og:url" content="{{ route('faq') }}">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Preguntas frecuentes sobre SMS y WhatsApp | SMS Empresarial">
  <meta name="twitter:description" content="Resuelve tus dudas sobre SMS Empresarial: campañas, WhatsApp, tarifas, saldo, contactos, mensajes SMS y uso de la plataforma.">
  <script type="application/ld+json">{"@@context":"https://schema.org","@graph":[{"areaServed":"Costa Rica","name":"SMS Empresarial","telephone":"+506 2204 9494","email":"info@cyberfuel.com","@type":"Organization","url":"{{ url('/') }}/"},{"url":"{{ url('/') }}/","name":"SMS Empresarial","@id":"{{ url('/') }}/#website","@type":"WebSite","inLanguage":"es-CR"},{"isPartOf":{"@id":"{{ url('/') }}/#website"},"name":"Preguntas frecuentes sobre SMS y WhatsApp | SMS Empresarial","inLanguage":"es-CR","description":"Resuelve tus dudas sobre SMS Empresarial: campañas, WhatsApp, tarifas, saldo, contactos, mensajes SMS y uso de la plataforma.","@type":"WebPage","url":"{{ route('faq') }}"}]}</script>
@endsection

@section('content')

  
  <main id="contenido">
    <header class="faq-hero page-hero">
      <div class="container pagina-hero-inner py-lg-4">
        <div class="faq-hero-grid">
          <div class="faq-hero-copy">
            <x-breadcrumbs current="Preguntas frecuentes" />
            <span class="pagina-kicker mb-3">Centro de ayuda</span>
            <h1 class="mb-3">Resuelve tus dudas <span>en un solo lugar.</span></h1>
            <p class="mb-4">Encuentra respuestas sobre el envío de SMS y WhatsApp, tus contactos, el saldo y las funciones de la plataforma. Consulta c&oacute;mo usar la plataforma, revisar tarifas y conocer las opciones de integraci&oacute;n.</p>
            <a class="btn btn-celeste rounded-pill px-4 py-3" href="#preguntas">Explorar preguntas <span aria-hidden="true">&#8595;</span></a>
          </div>
          <aside class="faq-hero-card" aria-label="Temas disponibles en preguntas frecuentes">
            <div class="faq-card-label"><span class="faq-card-dot" aria-hidden="true"></span> Centro de ayuda SMSEmpresarial</div>
            <div class="faq-card-art"><img class="faq-card-logo" src="{{ versioned_asset('site-img/sms.svg') }}" alt="Logotipo de SMS Empresarial" width="205" height="205"></div>
            <div class="faq-card-summary">
              <div class="faq-card-count"><strong>10</strong><span>respuestas<br>frecuentes</span></div>
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
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path></svg>
              <input id="faqSearch" type="search" placeholder="Busca por tema: WhatsApp, saldo o mensajes" autocomplete="off">
            </div>
            <p class="faq-search-count" id="faqSearchCount" aria-live="polite">10 preguntas disponibles</p>
          </div>
        </div>
      <div class="feature-heading mb-4">
        <h2>¿En qué podemos ayudarte?</h2>
        <p>Selecciona una pregunta para consultar la información.</p>
      </div>
      <div class="accordion faq-accordion" id="faqAccordion">
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-1" aria-expanded="true" aria-controls="faq-collapse-1"><span class="faq-numero">01</span><span>¿Qué es SMSEmpresarial.com?</span></button></h3>
          <div id="faq-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-heading-1" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>SMSEmpresarial.com es un ente pasivo que le permite enviar mensajes de texto SMS (Short Message Service, mensajes cortos de texto) o WhatsApp desde Internet a usuarios finales en diferentes países.</p>
            <p>Con este servicio no necesita invertir en equipo, software ni mantenimiento, y puede realizar varios envíos simultáneos sin tener que esperar largos tiempos de recepción.</p>
            <p>Para utilizar el sistema, solo necesita conexión a Internet. Acceda desde su navegador a <a href="{{ route('home') }}">smsempresarial.com</a>, <a href="{{ config('services.plataforma.registro') }}">regístrese</a> e ingrese a su cuenta.</p>
            <p>SMSEmpresarial.com no brinda bases de datos de teléfonos. Cada cliente es responsable de contar con la autorización del abonado o usuario final que recibe el mensaje, de acuerdo con la legislación de cada país donde se realice el envío.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-2" aria-expanded="false" aria-controls="faq-collapse-2"><span class="faq-numero">02</span><span>¿Quién proporciona la base de datos de contactos?</span></button></h3>
          <div id="faq-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>La base de datos de contactos la proporciona el cliente. SMSEmpresarial.com no brinda bases de datos de teléfonos.</p>
            <p>El cliente es responsable del uso de esos contactos, de contar con autorización para enviarles mensajes y del contenido de los mensajes. SMSEmpresarial.com es un sistema pasivo que facilita la comunicación de sus clientes.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-3" aria-expanded="false" aria-controls="faq-collapse-3"><span class="faq-numero">03</span><span>¿Para qué puedo usar SMSEmpresarial.com?</span></button></h3>
          <div id="faq-collapse-3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>El servicio le permite comunicarse de forma directa, eficiente y efectiva con sus clientes. Puede utilizarlo para:</p>
            <ul>
              <li>Enviar comunicados a sus mensajeros.</li>
              <li>Enviar mensajes a los integrantes de su oficina.</li>
              <li>Enviar mensajes de cobro personalizados mediante el sistema de campañas.</li>
              <li>Enviar saludos de cumpleaños, Navidad y Año Nuevo a sus clientes.</li>
              <li>Recordar citas o reuniones.</li>
              <li>Realizar campañas publicitarias o de mercadeo con comunicados personalizados.</li>
              <li>Enviar promociones, información de productos, circulares, recordatorios, boletines o eventos.</li>
              <li>Recibir en su celular contenido enviado desde un correo electrónico.</li>
              <li>Interconectar los sistemas de avisos electrónicos de su empresa para que envíen mensajes de texto.</li>
            </ul>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-4"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-4" aria-expanded="false" aria-controls="faq-collapse-4"><span class="faq-numero">04</span><span>¿Puedo hacer uso de WhatsApp?</span></button></h3>
          <div id="faq-collapse-4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>SMSEmpresarial.com permite que el sistema de Web Service envíe y reciba mensajes de WhatsApp. Para dar de alta una línea de WhatsApp, comuníquese con el departamento de ventas.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-5"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-5" aria-expanded="false" aria-controls="faq-collapse-5"><span class="faq-numero">05</span><span>¿En qué países funciona y cuáles son las tarifas?</span></button></h3>
          <div id="faq-collapse-5" class="accordion-collapse collapse" aria-labelledby="faq-heading-5" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>Consulte la sección <strong>Rutas y Tarifas</strong> para ver los países disponibles y la información de precios.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-6"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-6" aria-expanded="false" aria-controls="faq-collapse-6"><span class="faq-numero">06</span><span>¿Cuánto dura el saldo adquirido?</span></button></h3>
          <div id="faq-collapse-6" class="accordion-collapse collapse" aria-labelledby="faq-heading-6" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>Cada recarga extiende la vigencia del nuevo saldo por 12 meses. Si no realiza otra recarga antes de que transcurran esos 12 meses, perderá el saldo adquirido.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-7"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-7" aria-expanded="false" aria-controls="faq-collapse-7"><span class="faq-numero">07</span><span>¿Cómo puedo dejar de recibir mensajes de los clientes de SMSEmpresarial?</span></button></h3>
          <div id="faq-collapse-7" class="accordion-collapse collapse" aria-labelledby="faq-heading-7" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>SMSEmpresarial.com no proporciona bases de datos: cada cliente administra sus propios contactos y es responsable de sus envíos. Si no desea recibir más mensajes, contacte directamente a la empresa que se los envía y solicite que retire su número de su lista.</p>
            <p class="faq-nota mb-0">La información recibida no especifica un mecanismo automático de baja para los destinatarios.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-8"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-8" aria-expanded="false" aria-controls="faq-collapse-8"><span class="faq-numero">08</span><span>¿Cómo puedo comprar saldo y empezar a utilizar el servicio?</span></button></h3>
          <div id="faq-collapse-8" class="accordion-collapse collapse" aria-labelledby="faq-heading-8" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>El sistema acepta tarjetas de crédito Visa, MasterCard y American Express. Debe registrarse y comprar el monto inicial para utilizar el servicio.</p>
            <p>Si la transacción se realiza correctamente, recibirá una confirmación por correo electrónico y podrá empezar a utilizar SMSEmpresarial.com en ese momento.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-9"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-9" aria-expanded="false" aria-controls="faq-collapse-9"><span class="faq-numero">09</span><span>¿Cuál es el largo de un mensaje de texto SMS?</span></button></h3>
          <div id="faq-collapse-9" class="accordion-collapse collapse" aria-labelledby="faq-heading-9" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>Un mensaje SMS tiene hasta 160 caracteres en formato UTF-8 (UCS Transformation Format 8). Si la ruta seleccionada admite caracteres especiales, el límite puede reducirse según los caracteres utilizados.</p>
            <p>Si la ruta permite mensajes largos, también se reduce la cantidad disponible por mensaje: el protocolo utiliza 20 caracteres para identificar los mensajes anteriores y siguientes, de manera que el dispositivo pueda ordenarlos correctamente.</p>
          </div></div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="faq-heading-10"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-10" aria-expanded="false" aria-controls="faq-collapse-10"><span class="faq-numero">10</span><span>¿Cuáles son los caracteres especiales?</span></button></h3>
          <div id="faq-collapse-10" class="accordion-collapse collapse" aria-labelledby="faq-heading-10" data-bs-parent="#faqAccordion"><div class="accordion-body">
            <p>Los mensajes de texto utilizan el formato UTF-8 (UCS Transformation Format 8). Algunos caracteres latinos, como &Aacute;, &Eacute;, &Iacute;, &Oacute;, &Uacute;, &Ntilde;, &aacute;, &eacute;, &iacute;, &oacute;, &uacute;, &ntilde;, &auml;, &euml;, &iuml;, &ouml;, &uuml; y &iquest;, pueden ocupar m&aacute;s espacio que un car&aacute;cter b&aacute;sico y reducir la longitud disponible del mensaje.</p>
          </div></div>
        </div>
      </div>
        <x-empty-state id="faqEmpty" title="No encontramos preguntas con ese término" text="Prueba con otra palabra, como “saldo”, “WhatsApp” o “caracteres”." link-text="¿No está tu pregunta? Escríbenos" />
      </div>
    </section>
  </main>
  <x-brand-marquee />


  
  
  
  

@endsection
