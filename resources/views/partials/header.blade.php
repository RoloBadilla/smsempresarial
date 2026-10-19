<header class="encabezado">
  <div class="encabezado__barra contenedor">
    <a class="encabezado__logo" href="{{ route('home') }}">
      <img class="solo-oscuro" src="{{ asset('img') }}/logos/sms-empresarial-white.svg" alt="SMS Empresarial" width="120" height="56">
      <img class="solo-claro" src="{{ asset('img') }}/logos/sms-empresarial.svg" alt="SMS Empresarial" width="120" height="56">
    </a>

    <nav class="menu" id="menu-principal" aria-label="Principal">
      <ul class="menu__lista">
        <li><a class="menu__enlace" href="{{ route('home') }}" @if ($pagina === 'home') aria-current="page" @endif>Inicio</a></li>
        <li><a class="menu__enlace" href="{{ route('site.page', 'caracteristicas') }}" @if ($pagina === 'caracteristicas') aria-current="page" @endif>Características</a></li>
        <li><span class="menu__enlace deshabilitado" aria-disabled="true">Registrarse</span></li>
        <li><a class="menu__enlace" href="{{ route('site.page', 'faq') }}" @if ($pagina === 'faq') aria-current="page" @endif>Preguntas frecuentes</a></li>
        <li><a class="menu__enlace" href="{{ route('site.page', 'rutasytarifas') }}" @if ($pagina === 'rutasytarifas') aria-current="page" @endif>Rutas y Tarifas</a></li>
        <li><a class="menu__enlace" href="{{ route('site.page', 'contactanos') }}" @if ($pagina === 'contactanos') aria-current="page" @endif>Contáctenos</a></li>
        <li><span class="menu__enlace menu__enlace--acceso deshabilitado" aria-disabled="true">Mi acceso</span></li>
      </ul>
    </nav>

    <div class="ajustes">
      {{-- El texto y la etiqueta de estos dos botones los pone resources/js/sitio.js según el estado --}}
      <button class="ajustes__boton ajustes__boton--idioma" type="button" data-cambiar-idioma>EN</button>
      <button class="ajustes__boton ajustes__boton--tema" type="button" data-cambiar-tema aria-label="Modo claro">
        <svg class="ajustes__icono ajustes__icono--sol" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <circle cx="12" cy="12" r="4.5"/>
          <path d="M12 1.5v3M12 19.5v3M1.5 12h3M19.5 12h3M4.6 4.6l2.1 2.1M17.3 17.3l2.1 2.1M4.6 19.4l2.1-2.1M17.3 6.7l2.1-2.1"/>
        </svg>
        <svg class="ajustes__icono ajustes__icono--luna" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M20.5 14.5A8.5 8.5 0 0 1 9.5 3.5a8.5 8.5 0 1 0 11 11z"/>
        </svg>
      </button>
    </div>

    <button class="encabezado__menu-boton" type="button" aria-expanded="false" aria-controls="menu-principal">
      <span class="encabezado__menu-icono" aria-hidden="true"></span>
      <span class="encabezado__menu-texto">Menú</span>
    </button>
  </div>
</header>
