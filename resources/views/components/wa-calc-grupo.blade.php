@props(['clave', 'titulo', 'precio', 'abierto' => false, 'maximo' => 100000])

{{-- Un tipo de mensaje de la calculadora de WhatsApp (pages/tarifas.blade.php): se abre y se cierra,
     y lleva una barra y un campo para la cantidad, sincronizados por resources/js/pages/tarifas.js. --}}
<details class="wa-calc-grupo" @if ($abierto) open @endif>
    <summary>
        <span class="wa-calc-grupo-nombre" id="wa-{{ $clave }}-nombre">{{ $titulo }}</span>
        <span class="wa-calc-grupo-total">US$<span data-grupo-total>0.00</span></span>
    </summary>
    <div class="wa-calc-grupo-cuerpo">
        <p class="wa-calc-tarifa"><span>US${{ $precio }}</span> <span>por mensaje</span></p>
        <div class="wa-calc-cantidad">
            <label for="wa-{{ $clave }}" id="wa-{{ $clave }}-etiqueta">Cantidad de mensajes</label>
            <input type="number" id="wa-{{ $clave }}" min="0" step="1" inputmode="numeric" value="0" data-precio="{{ $precio }}">
        </div>
        <input class="wa-calc-rango" type="range" min="0" max="{{ $maximo }}" step="100" value="0"
            aria-labelledby="wa-{{ $clave }}-etiqueta wa-{{ $clave }}-nombre" data-rango-de="wa-{{ $clave }}">
        <div class="wa-calc-escala" aria-hidden="true"><span>0</span><span>{{ number_format($maximo, 0, '.', ',') }}+</span></div>
    </div>
</details>
