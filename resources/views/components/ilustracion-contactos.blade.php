{{-- Ilustración de "Configuración y gestión de contactos": un celular envía a tres listas,
     dos contactos suscritos (check verde) y uno bloqueado (gris, escudo con X) al que no le llega.
     Los colores salen de las variables del tema, así funciona en modo claro y oscuro. --}}
@php
    // [x, y, nombre, colores de los avatares, avatares con check de suscrito]
    $grupos = [
        [14, 22, 'Clientes VIP', ['azul', 'celeste', 'marino'], []],
        [296, 22, 'Recordatorios', ['celeste', 'marino', 'azul'], [0, 1]],
        [14, 236, 'Promociones', ['marino', 'azul', 'celeste'], []],
    ];
@endphp

<figure class="ilustracion-contactos">
    <svg viewBox="0 0 440 340" role="img" aria-label="Un celular envía mensajes a tus listas de contactos; los suscritos los reciben y los números bloqueados no" focusable="false">
        {{-- Conexiones del celular a cada lista --}}
        <path class="ilu-linea" d="M180 128 C160 110 160 70 144 62" />
        <path class="ilu-linea" d="M260 128 C280 110 280 70 296 62" />
        <path class="ilu-linea" d="M180 212 C160 230 160 268 144 276" />
        <path class="ilu-linea ilu-linea--bloqueada" d="M260 212 C282 228 296 236 306 244" />

        {{-- Burbujas de mensaje en camino --}}
        @foreach ([[150, 92], [270, 92], [150, 244]] as [$bx, $by])
            <g class="ilu-burbuja" transform="translate({{ $bx }} {{ $by }})">
                <rect x="-15" y="-10" width="30" height="20" rx="8" />
                <path d="M-6 10 -2 15 2 10Z" />
                <circle cx="-7" cy="0" r="2" /><circle cx="0" cy="0" r="2" /><circle cx="7" cy="0" r="2" />
            </g>
        @endforeach

        {{-- Celular --}}
        <rect class="ilu-celular" x="180" y="92" width="80" height="156" rx="16" />
        <rect class="ilu-pantalla" x="187" y="104" width="66" height="132" rx="9" />
        <rect class="ilu-celular" x="208" y="98" width="24" height="4" rx="2" />
        <rect class="ilu-msj ilu-msj--azul" x="194" y="116" width="46" height="16" rx="6" />
        <rect class="ilu-msj" x="200" y="138" width="46" height="16" rx="6" />
        <rect class="ilu-msj ilu-msj--azul" x="194" y="160" width="40" height="16" rx="6" />
        <rect class="ilu-msj" x="206" y="182" width="40" height="16" rx="6" />
        <circle class="ilu-enviar" cx="220" cy="220" r="9" />
        <path class="ilu-enviar-flecha" d="m216 220 8 0m-3-3 3 3-3 3" />

        {{-- Listas de contactos --}}
        @foreach ($grupos as [$x, $y, $nombre, $colores, $suscritos])
            <g>
                <rect class="ilu-grupo" x="{{ $x }}" y="{{ $y }}" width="130" height="80" rx="14" />
                <text class="ilu-texto" x="{{ $x + 14 }}" y="{{ $y + 25 }}">{{ $nombre }}</text>
                @foreach ($colores as $i => $color)
                    @php($cx = $x + 28 + $i * 24)
                    @php($cy = $y + 54)
                    <circle class="ilu-avatar ilu-avatar--{{ $color }}" cx="{{ $cx }}" cy="{{ $cy }}" r="14" />
                    <circle class="ilu-persona" cx="{{ $cx }}" cy="{{ $cy - 4 }}" r="4.5" />
                    <path class="ilu-persona" d="M{{ $cx - 8 }} {{ $cy + 10 }}q8-12 16 0z" />
                    @if (in_array($i, $suscritos))
                        <circle class="ilu-check" cx="{{ $cx + 10 }}" cy="{{ $cy - 11 }}" r="6.5" />
                        <path class="ilu-check-marca" d="m{{ $cx + 7 }} {{ $cy - 11 }} 2 2 4-4" />
                    @endif
                @endforeach
                <text class="ilu-mas" x="{{ $x + 102 }}" y="{{ $y + 58 }}">+12</text>
            </g>
        @endforeach

        {{-- Contacto bloqueado: el mensaje se detiene antes de llegar --}}
        <circle class="ilu-alto" cx="294" cy="234" r="9" />
        <path class="ilu-alto-x" d="m290 230 8 8m0-8-8 8" />
        <g transform="translate(352 278)">
            <circle class="ilu-avatar ilu-avatar--bloqueado" r="24" />
            <circle class="ilu-persona" cy="-6" r="7.5" />
            <path class="ilu-persona" d="M-13 17q13-20 26 0z" />
            <g transform="translate(-2 26)">
                <path class="ilu-escudo" d="M20 -30s10-4 10-13v-7l-10-4-10 4v7c0 9 10 13 10 13Z" />
                <path class="ilu-escudo-x" d="m16.5 -46.5 7 7m0-7-7 7" />
            </g>
        </g>
    </svg>
</figure>
