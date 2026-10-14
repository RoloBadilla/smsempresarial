@props(['page'])

<nav class="navbar navbar-expand-xl navbar-dark {{ $page === 'contactanos' ? '' : 'border-bottom' }} px-lg-5" aria-label="Navegación principal" @if($page !== 'contactanos') style="background-color:var(--azul)" @endif>
    <div class="container-fluid">
        <a class="logo" href="/" aria-label="SMS Empresarial, inicio">
            <img src="{{ asset('site-img/sms-empresarial-white.svg') }}" alt="SMS Empresarial" width="200" height="94">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-xl-4 gap-xl-3">
                <li class="nav-item"><a class="nav-link {{ $page === 'home' ? 'active' : '' }}" href="/" @if($page === 'home') aria-current="page" @endif>Inicio</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'caracteristicas' ? 'active' : '' }}" href="/caracteristicas.html" @if($page === 'caracteristicas') aria-current="page" @endif>Características</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'faq' ? 'active' : '' }}" href="/faq.html" @if($page === 'faq') aria-current="page" @endif>Preguntas frecuentes</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'rutasytarifas' ? 'active' : '' }}" href="/rutasytarifas.html" @if($page === 'rutasytarifas') aria-current="page" @endif>Rutas y tarifas</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'contactanos' ? 'active' : '' }}" href="/contactanos.html" @if($page === 'contactanos') aria-current="page" @endif>Contáctenos</a></li>
            </ul>
        </div>
    </div>
</nav>
