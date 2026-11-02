@props(['current'])

{{-- Si se llega desde Nosotros (enlaces con ?desde=nosotros), la ruta muestra Inicio › Nosotros › página. --}}
@php($desdeNosotros = request()->query('desde') === 'nosotros' && ! request()->routeIs('nosotros'))

<nav class="pagina-breadcrumbs mb-4" aria-label="Ruta de navegación"><a href="{{ route('home') }}">Inicio</a><span class="mx-2" aria-hidden="true">&rsaquo;</span>@if ($desdeNosotros)<a href="{{ route('nosotros') }}">Nosotros</a><span class="mx-2" aria-hidden="true">&rsaquo;</span>@endif<span aria-current="page">{{ $current }}</span></nav>
