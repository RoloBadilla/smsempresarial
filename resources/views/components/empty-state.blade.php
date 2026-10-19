@props(['id', 'title', 'text', 'linkText' => null, 'linkHref' => '/contactanos.html'])

{{-- Estado vacío de los buscadores: explica qué pasó y ofrece un siguiente paso. Lo muestra/oculta el JS de la página. --}}
<div class="empty-state" id="{{ $id }}" hidden>
    <span class="empty-state-icono" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m20 20-4.2-4.2"/><path d="M8.5 8.5l5 5M13.5 8.5l-5 5"/></svg>
    </span>
    <h3 class="empty-state-titulo">{{ $title }}</h3>
    <p class="empty-state-texto">{{ $text }}</p>
    <div class="empty-state-acciones">
        <button class="btn btn-brand btn-sm px-3" type="button" data-empty-clear>Limpiar búsqueda</button>
        @if ($linkText)
            <a class="empty-state-enlace" href="{{ $linkHref }}">{{ $linkText }}</a>
        @endif
    </div>
</div>
