@props(['page'])

<nav class="site-nav navbar navbar-expand-xl px-lg-5" aria-label="Navegación principal">
    <div class="container-fluid">
        <a class="logo" href="{{ route('home') }}" aria-label="SMS Empresarial, inicio">
            <img src="{{ versioned_asset('images/logos/sms-empresarial-white.svg') }}" alt="SMS Empresarial" width="200" height="94">
        </a>
        <div class="nav-actions order-xl-last">
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
                <li class="nav-item"><a class="nav-link {{ $page === 'tarifas' ? 'active' : '' }}" href="{{ route('tarifas') }}" @if($page === 'tarifas') aria-current="page" @endif>Rutas y tarifas</a></li>
                <li class="nav-item"><a class="nav-link {{ $page === 'contactanos' ? 'active' : '' }}" href="{{ route('contactanos') }}" @if($page === 'contactanos') aria-current="page" @endif>Contáctenos</a></li>
            </ul>
        </div>
    </div>
</nav>
