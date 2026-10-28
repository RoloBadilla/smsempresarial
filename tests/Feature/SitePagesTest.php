<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

test('todas las páginas cargan', function (string $url) {
    $this->get($url)->assertOk();
})->with(['/', '/caracteristicas', '/preguntas-frecuentes', '/tarifas', '/contactanos']);

test('las direcciones viejas con .html redirigen de forma permanente', function (string $vieja, string $nueva) {
    $this->get($vieja)->assertStatus(301)->assertRedirect($nueva);
})->with([
    ['/index.html', '/'],
    ['/caracteristicas.html', '/caracteristicas'],
    ['/faq.html', '/preguntas-frecuentes'],
    ['/faq', '/preguntas-frecuentes'],
    ['/rutasytarifas.html', '/tarifas'],
    ['/rutasytarifas', '/tarifas'],
    ['/contactanos.html', '/contactanos'],
]);

test('una página que no existe da 404', function () {
    $this->get('/otra')->assertNotFound();
    $this->get('/otra.html')->assertNotFound();
});

test('el tema y el idioma se aplican en el head antes de pintar', function () {
    $this->get('/')->assertSee('window.preferences = {', false);
});

test('los archivos de public que no pasan por Vite llevan versión en la URL', function () {
    $this->get('/')
        ->assertSee(asset('lang/en.json').'?v='.filemtime(public_path('lang/en.json')), false)
        ->assertSee(asset('images/logos/sms-empresarial-white.svg').'?v=', false);
});

test('todos los archivos de public usados en las vistas existen', function () {
    $missing = collect(File::allFiles(resource_path('views')))
        ->flatMap(function ($file) {
            preg_match_all("/versioned_asset\('([^']+)'\)/", $file->getContents(), $matches);

            return $matches[1];
        })
        ->unique()
        ->reject(fn ($path) => is_file(public_path($path)))
        ->values()
        ->all();

    expect($missing)->toBe([]);
});

test('cada página tiene datos estructurados válidos con los datos de la empresa', function (string $url) {
    $html = $this->get($url)->assertOk()->getContent();

    preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $match);
    $graph = collect(json_decode($match[1], true, flags: JSON_THROW_ON_ERROR)['@graph']);

    $empresa = $graph->first(fn ($nodo) => str_ends_with($nodo['@id'] ?? '', '#organization'));

    expect($empresa['@type'])->toContain('Organization', 'LocalBusiness')
        ->and($empresa['telephone'])->toBe(config('sitio.telefono'))
        ->and($empresa['address']['addressLocality'])->toBe(config('sitio.direccion.ciudad'))
        ->and($empresa['sameAs'])->toBe(config('sitio.redes'))
        ->and($graph->firstWhere('@type', 'WebPage'))->not->toBeNull()
        ->and($html)->toContain('<meta property="og:image" content="'.rtrim(config('sitio.url'), '/').'/'.config('sitio.imagen_compartir').'">');
})->with(['/', '/caracteristicas', '/preguntas-frecuentes', '/tarifas', '/contactanos']);

test('la imagen para compartir y el logo de los datos estructurados existen', function () {
    expect(public_path(config('sitio.imagen_compartir')))->toBeFile()
        ->and(public_path(config('sitio.logo')))->toBeFile();
});

test('las preguntas frecuentes generan FAQPage con las mismas preguntas del acordeón', function () {
    $html = $this->get('/preguntas-frecuentes')->assertOk()->getContent();

    preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $match);
    $faq = collect(json_decode($match[1], true, flags: JSON_THROW_ON_ERROR)['@graph'])->firstWhere('@type', 'FAQPage');

    expect($faq['mainEntity'])->toHaveCount(substr_count($html, 'class="accordion-item"'));

    foreach ($faq['mainEntity'] as $pregunta) {
        expect($html)->toContain(e($pregunta['name']))
            ->and($pregunta['acceptedAnswer']['text'])->not->toBeEmpty()->not->toContain('<');
    }
});

test('las tarifas generan un Service con una oferta por destino', function () {
    $html = $this->get('/tarifas')->assertOk()->getContent();

    preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $match);
    $servicio = collect(json_decode($match[1], true, flags: JSON_THROW_ON_ERROR)['@graph'])->firstWhere('@type', 'Service');

    expect($servicio['offers'])->toHaveCount(count(config('tarifas.sms')))
        ->and(collect($servicio['offers'])->pluck('price')->all())->toBe(array_column(config('tarifas.sms'), 'precio'));
});

test('solo producción permite que Google indexe el sitio', function () {
    $this->get('/')->assertSee('<meta name="robots" content="noindex, nofollow">', false);

    app()['env'] = 'production';
    $this->get('/')->assertSee('<meta name="robots" content="index,follow,max-image-preview:large">', false);
});

test('la tabla de tarifas muestra cada destino de la configuración con su bandera local', function () {
    $response = $this->get('/tarifas')->assertOk();

    foreach (config('tarifas.sms') as $tarifa) {
        expect(public_path("images/banderas/{$tarifa['bandera']}.png"))->toBeFile();
        $response->assertSee('$'.$tarifa['precio'])->assertSee($tarifa['pais']);
    }

    $response->assertDontSee('flagcdn.com');
});

test('el canonical apunta al dominio real, sin .html, aunque se abra en la copia de prueba', function () {
    $this->get('/')->assertSee('<link rel="canonical" href="https://smsempresarial.com/">', false);
    $this->get('/preguntas-frecuentes')
        ->assertSee('<link rel="canonical" href="https://smsempresarial.com/preguntas-frecuentes">', false)
        ->assertSee('<meta property="og:url" content="https://smsempresarial.com/preguntas-frecuentes">', false);
});

test('el menú usa las rutas con nombre', function () {
    $this->get('/preguntas-frecuentes')
        ->assertSee('href="'.route('caracteristicas').'"', false)
        ->assertSee('href="'.route('faq').'"', false)
        ->assertSee('href="'.route('tarifas').'"', false)
        ->assertSee('href="'.route('contactanos').'"', false)
        ->assertSee('href="'.route('home').'"', false);
});

test('ninguna vista tiene links internos escritos a mano', function () {
    $files = collect(File::allFiles(resource_path('views')))
        ->filter(fn ($file) => preg_match('/href="\/(?:[a-z]+\.html)?"|https:\/\/smsempresarial\.com|\.html["#]/', $file->getContents()))
        ->map(fn ($file) => $file->getRelativePathname())
        ->values()
        ->all();

    expect($files)->toBe([]);
});

test('sin credenciales de Google la portada muestra las reseñas fijas', function () {
    $this->get('/')->assertOk()->assertSee('4.8')->assertSee('34 reviews');
});

test('con credenciales de Google la portada muestra las reseñas reales', function () {
    config(['services.google_reviews' => [
        'client_id' => 'id', 'client_secret' => 'secret', 'refresh_token' => 'refresh',
        'account_id' => '123', 'location_id' => '456',
    ]]);

    Http::fake([
        'oauth2.googleapis.com/*' => Http::response(['access_token' => 'token', 'expires_in' => 3600]),
        'mybusiness.googleapis.com/*' => Http::response([
            'averageRating' => 4.9,
            'totalReviewCount' => 40,
            'reviews' => [
                ['reviewer' => ['displayName' => 'Ana Mora'], 'starRating' => 'FIVE', 'comment' => 'Excelente servicio (Translated by Google) Excellent service', 'createTime' => '2026-09-01T10:00:00Z'],
                ['reviewer' => ['displayName' => 'Sin comentario'], 'starRating' => 'FOUR', 'createTime' => '2026-08-01T10:00:00Z'],
            ],
        ]),
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('4.9')
        ->assertSee('40 reviews')
        ->assertSee('Ana Mora')
        ->assertSee('Excelente servicio')
        ->assertDontSee('Translated by Google')
        ->assertDontSee('Sin comentario');
});

test('si Google falla la portada sigue cargando', function () {
    config(['services.google_reviews' => [
        'client_id' => 'id', 'client_secret' => 'secret', 'refresh_token' => 'refresh',
        'account_id' => '123', 'location_id' => '456',
    ]]);

    Http::fake(['*' => Http::response('error', 500)]);

    $this->get('/')->assertOk()->assertSee('34 reviews');
});

test('cada tarjeta del inicio lleva a la página de su servicio', function () {
    $html = $this->get('/')->assertOk()->getContent();

    foreach (array_keys(config('servicios')) as $slug) {
        expect($html)->toContain('href="'.route('servicio', $slug).'"');
    }
});

test('cada página de servicio carga con sus secciones y sus preguntas en FAQPage', function (string $slug) {
    $servicio = config('servicios.'.$slug);
    $html = $this->get('/'.$slug)->assertOk()
        ->assertSee($servicio['h1'])
        ->assertSee('Cómo llega el mensaje')
        ->assertSee('Cuándo usarlo')
        ->getContent();

    preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $match);
    $graph = collect(json_decode($match[1], true, flags: JSON_THROW_ON_ERROR)['@graph']);

    expect($graph->firstWhere('@type', 'FAQPage')['mainEntity'])->toHaveCount(count($servicio['faq']))
        ->and($graph->firstWhere('@type', 'Service')['name'])->toBe($servicio['titulo'])
        ->and(substr_count($html, 'class="accordion-item"'))->toBe(count($servicio['faq']))
        ->and($html)->not->toContain(':precio');
})->with(['envio-de-comunicados', 'recordatorios-por-sms', 'campanas-de-sms-masivos', 'notificaciones-y-alertas', 'codigos-otp-por-sms', 'sms-dos-vias-sinpe-movil']);

test('el sitemap incluye las páginas de servicios', function () {
    $sitemap = file_get_contents(public_path('sitemap.xml'));

    foreach (array_keys(config('servicios')) as $slug) {
        expect($sitemap)->toContain('<loc>https://smsempresarial.com/'.$slug.'</loc>');
    }
});
