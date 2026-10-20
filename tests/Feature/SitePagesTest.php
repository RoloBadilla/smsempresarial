<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();
});

test('todas las páginas cargan', function (string $url) {
    $this->get($url)->assertOk();
})->with(['/', '/index.html', '/caracteristicas.html', '/faq.html', '/rutasytarifas.html', '/contactanos.html']);

test('una página que no existe da 404', function () {
    $this->get('/otra.html')->assertNotFound();
});

test('el menú usa las rutas con nombre', function () {
    $this->get('/faq.html')
        ->assertSee('href="'.route('site.page', 'caracteristicas').'"', false)
        ->assertSee('href="'.route('site.page', 'faq').'"', false)
        ->assertSee('href="'.route('site.page', 'rutasytarifas').'"', false)
        ->assertSee('href="'.route('site.page', 'contactanos').'"', false)
        ->assertSee('href="'.route('home').'"', false);
});

test('ninguna vista tiene links internos escritos a mano', function () {
    $files = collect(File::allFiles(resource_path('views')))
        ->filter(fn ($file) => preg_match('/href="\/(?:[a-z]+\.html)?"/', $file->getContents()))
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
