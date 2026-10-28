{{-- Tarjeta de un uso de la plataforma: ícono, título con link, descripción (el contenido) y "Ver más".
     Toda la tarjeta es clickeable: el link del título se estira sobre ella (.servicio-link::after).
     icono: un nombre de components/icono.blade.php --}}
@props(['icono', 'titulo', 'link'])

<div class="col-md-6 col-lg-4">
    <article class="tarjeta servicio">
        <div class="icono"><x-icono :nombre="$icono" /></div>

        <h3><a class="servicio-link" href="{{ $link }}">{{ $titulo }}</a></h3>

        <p>{{ $slot }}</p>

        <span class="servicio-mas" aria-hidden="true">Ver más <span class="flecha">→</span></span>
    </article>
</div>
