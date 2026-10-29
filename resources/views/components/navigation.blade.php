@props(['page'])

<nav class="site-nav navbar navbar-expand-xl" aria-label="Navegación principal">
    <div class="container">
        <a class="logo" href="{{ route('home') }}" aria-label="SMS Empresarial, inicio">
            <img src="{{ versioned_asset('images/logos/sms-empresarial-white.svg') }}" alt="SMS Empresarial" width="200" height="94">
        </a>
        <div class="nav-actions order-xl-last">
            {{-- Bandera del idioma actual: Costa Rica en español, Estados Unidos en inglés (el CSS la cambia según <html lang>). --}}
            <span class="lang-bandera" aria-hidden="true">
                <svg class="bandera-cr" viewBox="0 0 30 30" focusable="false"><path fill="#002B7F" d="M0 0h30v30H0z"/><path fill="#FFF" d="M0 5h30v20H0z"/><path fill="#CE1126" d="M0 10h30v10H0z"/></svg>
                <svg class="bandera-us" viewBox="0 0 30 30" focusable="false"><path fill="#B22234" d="M0 0h30v30H0z"/><path fill="#FFF" d="M0 2.308h30v2.308H0zM0 6.923h30v2.308H0zM0 11.538h30v2.308H0zM0 16.154h30v2.308H0zM0 20.769h30v2.308H0zM0 25.385h30v2.308H0z"/><path fill="#3C3B6E" d="M0 0h17v16.154H0z"/><g fill="#FFF"><circle cx="2.10" cy="1.90" r=".7"/><circle cx="8.50" cy="1.90" r=".7"/><circle cx="14.90" cy="1.90" r=".7"/><circle cx="5.30" cy="5.00" r=".7"/><circle cx="11.70" cy="5.00" r=".7"/><circle cx="2.10" cy="8.10" r=".7"/><circle cx="8.50" cy="8.10" r=".7"/><circle cx="14.90" cy="8.10" r=".7"/><circle cx="5.30" cy="11.20" r=".7"/><circle cx="11.70" cy="11.20" r=".7"/><circle cx="2.10" cy="14.30" r=".7"/><circle cx="8.50" cy="14.30" r=".7"/><circle cx="14.90" cy="14.30" r=".7"/></g></svg>
            </span>
            <button class="theme-toggle lang-toggle" type="button" data-lang-toggle lang="en" title="View in English" aria-label="View in English" hidden>EN</button>
            <button class="theme-toggle" type="button" data-theme-toggle aria-pressed="true" title="Modo oscuro" hidden>
                <span class="visually-hidden">Modo oscuro</span>
                <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
                <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M20 14.5A8.5 8.5 0 0 1 9.5 4a8.5 8.5 0 1 0 10.5 10.5Z"/></svg>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-xl-4 gap-xl-3">
                <li class="nav-item"><a class="nav-link {{ $page === 'home' ? 'active' : '' }}" href="{{ route('home') }}" @if($page === 'home') aria-current="page" @endif>Inicio</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'caracteristicas' ? 'active' : '' }}" href="{{ route('caracteristicas') }}" @if($page === 'caracteristicas') aria-current="page" @endif>Características</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'faq' ? 'active' : '' }}" href="{{ route('faq') }}" @if($page === 'faq') aria-current="page" @endif>Preguntas frecuentes</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'tarifas' ? 'active' : '' }}" href="{{ route('tarifas') }}" @if($page === 'tarifas') aria-current="page" @endif>Tarifas</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'nosotros' ? 'active' : '' }}" href="{{ route('nosotros') }}" @if($page === 'nosotros') aria-current="page" @endif>Nosotros</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'contactanos' ? 'active' : '' }}" href="{{ route('contactanos') }}" @if($page === 'contactanos') aria-current="page" @endif>Contáctenos</a></li>
            </ul>
        </div>
    </div>
    <div class="reading-progress" aria-hidden="true"><span class="reading-progress__bar"></span></div>
</nav>
