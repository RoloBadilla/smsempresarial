{{-- Íconos de línea del sitio (24×24, usan el color del texto). Uso: <x-icono nombre="otp" /> --}}
@props(['nombre', 'size' => 28])

@php
    $iconos = [
        'comunicados' => '<path d="M3 11v2a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1z" /><path d="M15 9a4 4 0 0 1 0 6" /><path d="M18 6.5a8 8 0 0 1 0 11" />',
        'recordatorios' => '<rect x="3" y="5" width="18" height="16" rx="2" /><path d="M8 3v4M16 3v4M3 10h18" />',
        'campanas' => '<path d="M20.6 13.4l-7.2 7.2a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8z" /><circle cx="7.5" cy="7.5" r="1.2" />',
        'alertas' => '<path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" /><path d="M10.3 21a1.9 1.9 0 0 0 3.4 0" />',
        'otp' => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z" /><path d="M9 12l2 2 4-4" />',
        'dos-vias' => '<path d="M7 7h13l-3-3" /><path d="M17 17H4l3 3" />',
        'lista' => '<circle cx="9" cy="8" r="3.5" /><path d="M2.5 20a6.5 6.5 0 0 1 13 0" /><path d="M16 4.5a3.5 3.5 0 0 1 0 7" /><path d="M18 14.5a6.5 6.5 0 0 1 3.5 5.5" />',
        'archivo' => '<path d="M14 3H6a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8z" /><path d="M14 3v5h5" /><path d="M9 13l4 4M13 13l-4 4" />',
        'reloj' => '<circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 2" />',
        'personalizar' => '<path d="M4 20h4L19 9a2.8 2.8 0 0 0-4-4L4 16z" /><path d="M13.5 6.5l4 4" />',
        'bloqueo' => '<circle cx="12" cy="12" r="9" /><path d="M5.6 5.6l12.8 12.8" />',
        'suscripcion' => '<circle cx="10" cy="8" r="3.5" /><path d="M3.5 20a6.5 6.5 0 0 1 11-4.7" /><path d="M15 19l2 2 4-4" />',
        'api' => '<path d="M8 8l-4 4 4 4" /><path d="M16 8l4 4-4 4" /><path d="M13.5 5l-3 14" />',
        'correo' => '<rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3 7l9 6 9-6" />',
        'reportes' => '<path d="M4 20V10M10 20V4M16 20v-7M21 20H3" />',
        'mensaje' => '<path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z" /><path d="M9 12l2 2 4-4" />',
        'bandeja' => '<path d="M3 13l3-8h12l3 8v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z" /><path d="M3 13h5l1.5 2.5h5L16 13h5" />',
        'navegador' => '<rect x="3" y="4" width="18" height="16" rx="2" /><path d="M3 9h18M7 6.5h.01M10 6.5h.01" />',
        'celular' => '<rect x="6" y="2.5" width="12" height="19" rx="2.5" /><path d="M11 18.5h2" />',
        'operador' => '<path d="M12 10v11" /><path d="M8.5 6.5a5 5 0 0 1 7 0" /><path d="M5.5 3.5a9 9 0 0 1 13 0" /><circle cx="12" cy="10" r="1.5" />',
        'plataforma' => '<rect x="3" y="4" width="18" height="12" rx="2" /><path d="M8 20h8M12 16v4" />',
    ];
@endphp

<svg width="{{ $size }}" height="{{ $size }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" {{ $attributes }}>{!! $iconos[$nombre] !!}</svg>
