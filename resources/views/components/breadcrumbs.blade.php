@props(['current'])

<nav class="pagina-breadcrumbs mb-4" aria-label="Ruta de navegación"><a href="{{ route('home') }}">Inicio</a><span class="mx-2" aria-hidden="true">&rsaquo;</span><span aria-current="page">{{ $current }}</span></nav>
