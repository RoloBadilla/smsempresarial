@props(['kicker', 'title', 'text', 'href', 'label', 'sectionClass' => '', 'buttonClass' => ''])

<section class="container {{ $sectionClass }}" id="registro"><div class="panel p-4 p-md-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3"><div><span class="section-kicker">{{ $kicker }}</span><h2 class="section-title mt-2 mb-2">{{ $title }}</h2><p class="section-copy mb-0">{{ $text }}</p></div><a class="btn btn-brand {{ $buttonClass }}" href="{{ $href }}">{{ $label }} <span aria-hidden="true">→</span></a></div></section>
