{{-- Ilustración de "Nosotros": la nube de Cyberfuel en Costa Rica envía SMS y WhatsApp a los celulares
     de los clientes, con soporte 24/7. Va sobre la cabecera azul, por eso usa blancos y celestes. --}}
<figure class="ilustracion-nosotros">
    <svg viewBox="0 0 420 380" role="img" aria-label="Desde la nube de Cyberfuel en Costa Rica salen mensajes SMS y WhatsApp hacia los celulares de tus clientes" focusable="false">
        <circle class="iln-halo" cx="210" cy="190" r="170" />

        {{-- Señales de la nube a cada celular --}}
        <path class="iln-linea" d="M180 190 C160 230 110 230 90 262" />
        <path class="iln-linea" d="M210 192 V262" />
        <path class="iln-linea" d="M240 190 C260 230 310 230 330 262" />

        {{-- Nube con servidores --}}
        <g class="iln-nube">
            <circle cx="170" cy="138" r="40" />
            <circle cx="228" cy="118" r="54" />
            <circle cx="275" cy="152" r="34" />
            <rect x="132" y="140" width="176" height="52" rx="26" />
        </g>
        @foreach ([128, 148, 168] as $y)
            <rect class="iln-servidor" x="172" y="{{ $y }}" width="76" height="14" rx="4" />
            <circle class="iln-led" cx="182" cy="{{ $y + 7 }}" r="2.5" />
            <path class="iln-ranura" d="M200 {{ $y + 7 }}h38" />
        @endforeach

        {{-- Celulares con un mensaje cada uno --}}
        @foreach ([[62, 'sms'], [182, 'wa'], [302, 'sms']] as [$x, $canal])
            <g transform="translate({{ $x }} 262)">
                <rect class="iln-celular" width="56" height="96" rx="11" />
                <rect class="iln-pantalla" x="5" y="9" width="46" height="78" rx="6" />
                <rect class="iln-msj iln-msj--{{ $canal }}" x="10" y="20" width="34" height="14" rx="5" />
                <rect class="iln-msj-gris" x="14" y="40" width="30" height="10" rx="4" />
                <rect class="iln-msj-gris" x="10" y="56" width="24" height="10" rx="4" />
            </g>
        @endforeach

        {{-- Rótulos: Costa Rica y soporte --}}
        <g transform="translate(6 14)">
            <rect class="iln-rotulo" width="160" height="40" rx="20" />
            <g transform="translate(14 12)">
                <rect width="24" height="16" rx="3" fill="#002B7F" />
                <rect y="2.7" width="24" height="10.6" fill="#FFF" />
                <rect y="5.3" width="24" height="5.4" fill="#CE1126" />
            </g>
            <text class="iln-texto" x="48" y="25">Costa Rica</text>
        </g>
        <g transform="translate(262 14)">
            <rect class="iln-rotulo" width="152" height="40" rx="20" />
            <circle class="iln-verde" cx="22" cy="20" r="5" />
            <text class="iln-texto" x="36" y="25">Soporte 24/7</text>
        </g>
    </svg>
</figure>
