@extends('layouts.app')

@section('titulo', 'SMS y WhatsApp empresarial fácil con SMSempresarial.com')

@section('contenido')
<main id="contenido">
  <section class="hero" aria-labelledby="hero-titulo">
    <div class="hero__marco contenedor">
      <div class="hero__texto">
        <h1 class="hero__titulo" id="hero-titulo">SMS EMPRESARIAL</h1>

        <ol class="transmisiones" aria-label="Mensajes de SMS Empresarial">
          <li class="transmision">
            <p class="transmision__texto">Ponemos a tu disposición el envío mensajes de texto (SMS) y WhatsApp desde tu computador a teléfonos celulares en diferentes países.</p>
          </li>
          <li class="transmision">
            <h2 class="transmision__titulo">Campañas personalizadas</h2>
            <p class="transmision__texto">Permite el envío de campañas de texto SMS de forma personalizada</p>
          </li>
          <li class="transmision">
            <h2 class="transmision__titulo">API de integración</h2>
            <p class="transmision__texto">Conecte su sistema para recibir y/o enviar mensajes de texto SMS o WhatsApp con su sistema.</p>
          </li>
        </ol>

        <p class="hero__acciones">
          <span class="boton deshabilitado" aria-disabled="true">Registrarse</span>
          <a class="boton boton--contorno" href="{{ route('site.page', 'rutasytarifas') }}">Rutas y Tarifas</a>
        </p>
      </div>

      <div class="orbita">
        <svg class="orbita__mapa" viewBox="-30 -10 660 620" aria-hidden="true" focusable="false">
          <circle class="orbita__anillo" cx="300" cy="300" r="205"/>
          <circle class="orbita__anillo orbita__anillo--giro" cx="300" cy="300" r="140"/>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="300.0" y2="95.0"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="300.0" y2="95.0" pathLength="100"/>
            <circle class="ruta__nodo" cx="300.0" cy="95.0" r="5"/>
            <text class="ruta__codigo" x="300.0" y="55.0" text-anchor="middle">+1242</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="374.1" y2="108.8"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="374.1" y2="108.8" pathLength="100"/>
            <circle class="ruta__nodo" cx="374.1" cy="108.8" r="5"/>
            <text class="ruta__codigo" x="390.3" y="71.9" text-anchor="start">+55</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="438.1" y2="148.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="438.1" y2="148.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="438.1" cy="148.5" r="5"/>
            <text class="ruta__codigo" x="468.4" y="120.2" text-anchor="start">+56</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="483.5" y2="208.6"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="483.5" y2="208.6" pathLength="100"/>
            <circle class="ruta__nodo" cx="483.5" cy="208.6" r="5"/>
            <text class="ruta__codigo" x="523.8" y="193.6" text-anchor="start">+57</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="504.1" y2="281.1"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="504.1" y2="281.1" pathLength="100"/>
            <circle class="ruta__nodo" cx="504.1" cy="281.1" r="5"/>
            <text class="ruta__codigo" x="548.9" y="281.9" text-anchor="start">+506</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="497.2" y2="356.1"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="497.2" y2="356.1" pathLength="100"/>
            <circle class="ruta__nodo" cx="497.2" cy="356.1" r="5"/>
            <text class="ruta__codigo" x="540.5" y="373.4" text-anchor="start">+503</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="463.6" y2="423.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="463.6" y2="423.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="463.6" cy="423.5" r="5"/>
            <text class="ruta__codigo" x="499.5" y="455.7" text-anchor="start">+34</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="407.9" y2="474.3"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="407.9" y2="474.3" pathLength="100"/>
            <circle class="ruta__nodo" cx="407.9" cy="474.3" r="5"/>
            <text class="ruta__codigo" x="431.6" y="517.6" text-anchor="start">+1</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="337.7" y2="501.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="337.7" y2="501.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="337.7" cy="501.5" r="5"/>
            <text class="ruta__codigo" x="345.9" y="550.7" text-anchor="middle">+502</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="262.3" y2="501.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="262.3" y2="501.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="262.3" cy="501.5" r="5"/>
            <text class="ruta__codigo" x="254.1" y="550.7" text-anchor="middle">+504</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="192.1" y2="474.3"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="192.1" y2="474.3" pathLength="100"/>
            <circle class="ruta__nodo" cx="192.1" cy="474.3" r="5"/>
            <text class="ruta__codigo" x="168.4" y="517.6" text-anchor="end">+52</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="136.4" y2="423.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="136.4" y2="423.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="136.4" cy="423.5" r="5"/>
            <text class="ruta__codigo" x="100.5" y="455.7" text-anchor="end">+505</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="102.8" y2="356.1"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="102.8" y2="356.1" pathLength="100"/>
            <circle class="ruta__nodo" cx="102.8" cy="356.1" r="5"/>
            <text class="ruta__codigo" x="59.5" y="373.4" text-anchor="end">+507</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="95.9" y2="281.1"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="95.9" y2="281.1" pathLength="100"/>
            <circle class="ruta__nodo" cx="95.9" cy="281.1" r="5"/>
            <text class="ruta__codigo" x="51.1" y="281.9" text-anchor="end">+51</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="116.5" y2="208.6"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="116.5" y2="208.6" pathLength="100"/>
            <circle class="ruta__nodo" cx="116.5" cy="208.6" r="5"/>
            <text class="ruta__codigo" x="76.2" y="193.6" text-anchor="end">+1939</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="161.9" y2="148.5"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="161.9" y2="148.5" pathLength="100"/>
            <circle class="ruta__nodo" cx="161.9" cy="148.5" r="5"/>
            <text class="ruta__codigo" x="131.6" y="120.2" text-anchor="end">+1849</text>
          </g>
          <g class="ruta">
            <line class="ruta__linea" x1="300" y1="300" x2="225.9" y2="108.8"/>
            <line class="ruta__pulso" x1="300" y1="300" x2="225.9" y2="108.8" pathLength="100"/>
            <circle class="ruta__nodo" cx="225.9" cy="108.8" r="5"/>
            <text class="ruta__codigo" x="209.7" y="71.9" text-anchor="end">+1868</text>
          </g>
          <circle class="orbita__centro-halo" cx="300" cy="300" r="46"/>
          <circle class="orbita__centro" cx="300" cy="300" r="34"/>
          <text class="orbita__centro-texto" x="300" y="307" text-anchor="middle">SMS</text>
        </svg>
      </div>
    </div>
  </section>

  <section class="seccion" aria-labelledby="usos-titulo">
    <div class="contenedor">
      <h2 class="titulo-seccion" id="usos-titulo">Desde nuestra plataforma usted podrá</h2>
      <p class="parrafo-guia">
        Desde la aplicación de SMSEmpresarial.com podrá enviar mensajes de texto SMS (Short Message Service
        <img class="icono-linea" src="{{ asset('img') }}/iconos/sms.svg" alt="Short Message Service" width="20" height="20">
        o WhatsApp
        <img class="icono-linea" src="{{ asset('img') }}/iconos/whatsapp.svg" alt="WhatsApp" width="20" height="20">,
        mensajes cortos de texto) a sus clientes para:
      </p>

      <ul class="usos" data-revelar>
        <li class="usos__item"><h3>Enviar Comunicados</h3></li>
        <li class="usos__item"><h3>Enviar Recordatorios / Eventos</h3></li>
        <li class="usos__item"><h3>Promociones o Campañas de Publicidad / Envío masivo</h3></li>
        <li class="usos__item"><h3>Notificaciones o Alertas</h3></li>
        <li class="usos__item"><h3>Envíe su OTP o Token para el 2FA - Segundo Factor de autenticación o validación</h3></li>
        <li class="usos__item"><h3>Comunicarse bidireccionalmente con sus clientes / SINPE móvil</h3></li>
      </ul>
    </div>
  </section>

  <section class="lectura" aria-labelledby="lectura-titulo">
    <div class="lectura__marco contenedor">
      <h2 class="lectura__frase" id="lectura-titulo">Por que el 99% de los mensajes de texto son leídos.</h2>
      <div class="medidor" aria-hidden="true" data-revelar>
        <div class="medidor__barra"></div>
      </div>
      <a class="boton" href="{{ route('site.page', 'rutasytarifas') }}">Tabla de destinos y tarifas</a>
    </div>
  </section>

  <section class="seccion" aria-labelledby="resenas-titulo">
    <div class="contenedor">
      <div class="resenas__encabezado">
        <h2 class="titulo-seccion" id="resenas-titulo">Lo que nuestros clientes Dicen</h2>
        <a class="calificacion" href="https://www.google.com/search?q=cyberfuel+sa&amp;rlz=1C1GCEU_esCR955CR955&amp;oq=cyberfuel+sa&amp;gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRg8MgYIAhBFGDwyBggDEEUYPNIBCDIzODhqMGo0qAIAsAIB&amp;sourceid=chrome&amp;ie=UTF-8#lrd=0x8fa0f9526a47746d:0x1740f4a7c60b88d1,1,,,," target="_blank" rel="noopener">
          <img src="{{ asset('img') }}/iconos/google-logo-r.svg" alt="" width="26" height="20">
          <span class="calificacion__fuente">Google Reviews</span>
          <span class="calificacion__nota">4.8</span>
          <span class="calificacion__total">34 reviews</span>
        </a>
      </div>

      <ul class="resenas">
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto resena__texto--vacio">El usuario dejó una calificación sin comentarios.</p>
          <p class="resena__autor">Carlos Enrique Rivera Viquez, 09/06/2026</p>
        </li>
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto resena__texto--vacio">El usuario dejó una calificación sin comentarios.</p>
          <p class="resena__autor">Yolanda Varela Bosque, 30/01/2025</p>
        </li>
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto">"Buen servicio (Translated by Google) Good service"</p>
          <p class="resena__autor">Daniel CR (Mclaren), 26/11/2023</p>
        </li>
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto resena__texto--vacio">El usuario dejó una calificación sin comentarios.</p>
          <p class="resena__autor">Nidia Morales, 12/01/2023</p>
        </li>
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto">"Empresa de tecnología para internet, 100% costarricense (Translated by Google) Internet technology company, 100% Costa Rican"</p>
          <p class="resena__autor">Carlos Enrique Solis Esquivel, 06/01/2021</p>
        </li>
        <li class="resena">
          <p class="resena__estrellas" aria-label="5 de 5 estrellas">★ ★ ★ ★ ★</p>
          <p class="resena__texto resena__texto--vacio">El usuario dejó una calificación sin comentarios.</p>
          <p class="resena__autor">Christopher Fernández Monge, 17/09/2022</p>
        </li>
      </ul>
    </div>
  </section>
</main>
@endsection
