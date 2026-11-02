<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    config([
        'services.cyberfuel_leads.usuario' => 'usuario-leads',
        'services.cyberfuel_leads.clave' => 'clave-leads',
        'services.cyberfuel_medios.usuario' => 'usuario-medios',
        'services.cyberfuel_medios.clave' => 'clave-medios',
        'services.recaptcha.site_key' => null,
        'services.recaptcha.secret_key' => null,
    ]);

});

/**
 * Respuestas falsas de Cyberfuel y Google. Se arma en una sola llamada porque
 * con varios Http::fake() gana la primera respuesta que coincide.
 */
function fakeServicios(array $cambios = []): void
{
    Http::fake([
        '*/obtener_medios_comerciales/*' => Http::response(['info' => [['nombre' => 'Facebook'], ['nombre' => 'Google'], ['nombre' => 'Otro']]]),
        '*/addleads/*' => Http::response(['estado' => 'ok']),
        'www.google.com/recaptcha/*' => Http::response(['success' => true, 'action' => 'contacto', 'score' => 0.9]),
        ...$cambios,
    ]);
}

function datosContacto(array $cambios = []): array
{
    return [
        'nombre' => 'Ana Mora',
        'empresa' => 'Mi Empresa',
        'correo' => 'ana@example.com',
        'country_code' => '506',
        'telefono' => '8888 8888',
        'tema' => 'Tarifas SMS',
        'medio' => 'Facebook',
        'mensaje' => 'Quiero información de tarifas.',
        ...$cambios,
    ];
}

test('la página de contacto muestra los medios comerciales', function () {
    fakeServicios();

    $this->get('/contactanos')
        ->assertOk()
        ->assertSee('¿Cómo te enteraste de nosotros?')
        ->assertSee('<option value="Facebook"', false);
});

test('si el servicio de medios falla la pregunta no aparece y no es obligatoria', function () {
    fakeServicios(['*/obtener_medios_comerciales/*' => Http::response('error', 500)]);

    $this->get('/contactanos')->assertOk()->assertDontSee('¿Cómo te enteraste de nosotros?');

    $this->post('/contacto', datosContacto(['medio' => null]))->assertSessionHas('contact_sent');
});

test('un contacto válido se envía al servicio de leads', function () {
    fakeServicios();
    $this->post('/contacto', datosContacto())
        ->assertRedirect(route('contactanos').'#contacto')
        ->assertSessionHas('contact_sent');

    Http::assertSent(fn (Request $request) => str_contains($request->url(), 'addleads')
        && $request['usuario'] === 'usuario-leads'
        && $request['producto'] === 'SMSEmpresarial'
        && $request['nombre_contacto'] === 'Ana Mora'
        && $request['telefono'] === '+506.88888888'
        && $request['medio_comercial'] === 'Facebook'
        && str_contains($request['comentario'], 'Tema: Tarifas SMS'));
});

test('con "Otro" se envía lo que escribió la persona', function () {
    fakeServicios();
    $this->post('/contacto', datosContacto(['medio' => 'Otro', 'otro' => 'Un amigo']))->assertSessionHas('contact_sent');

    Http::assertSent(fn (Request $request) => str_contains($request->url(), 'addleads')
        && $request['medio_comercial'] === 'Otro: Un amigo');
});

test('valida los campos obligatorios', function () {
    fakeServicios();
    $this->post('/contacto', [])
        ->assertSessionHasErrors(['nombre', 'correo', 'telefono', 'tema', 'mensaje'])
        ->assertSessionDoesntHaveErrors('medio');

    Http::assertNotSent(fn (Request $request) => str_contains($request->url(), 'addleads'));
});

test('valida el teléfono según el país', function (string $codigo, string $telefono, bool $valido) {
    fakeServicios();
    $response = $this->post('/contacto', datosContacto(['country_code' => $codigo, 'telefono' => $telefono]));

    $valido ? $response->assertSessionHasNoErrors() : $response->assertSessionHasErrors('telefono');
})->with([
    'Costa Rica válido' => ['506', '2204-9494', true],
    'Costa Rica corto' => ['506', '8888888', false],
    'Costa Rica empieza con 1' => ['506', '18888888', false],
    'otro país válido' => ['1', '202 555 0143', true],
    'otro país corto' => ['1', '12345', false],
]);

test('"Otro" exige escribir cuál', function () {
    fakeServicios();
    $this->post('/contacto', datosContacto(['medio' => 'Otro', 'otro' => '']))->assertSessionHasErrors('otro');
});

test('rechaza un tema o medio que no está en la lista', function () {
    fakeServicios();
    $this->post('/contacto', datosContacto(['tema' => 'Cualquier cosa', 'medio' => 'Inventado']))
        ->assertSessionHasErrors(['tema', 'medio']);
});

test('si el servicio de leads falla avisa sin perder lo escrito', function () {
    fakeServicios(['*/addleads/*' => Http::response('error', 500)]);

    $this->post('/contacto', datosContacto())
        ->assertSessionHas('contact_error')
        ->assertSessionHasInput('nombre', 'Ana Mora');
});

test('sin credenciales de leads avisa en vez de romperse', function () {
    fakeServicios();
    config(['services.cyberfuel_leads.usuario' => null]);

    $this->post('/contacto', datosContacto())->assertSessionHas('contact_error');

    Http::assertNotSent(fn (Request $request) => str_contains($request->url(), 'addleads'));
});

test('con reCAPTCHA configurado exige un token válido', function () {
    fakeServicios();
    config(['services.recaptcha.site_key' => 'site', 'services.recaptcha.secret_key' => 'secret']);

    $this->post('/contacto', datosContacto())->assertSessionHasErrors('recaptcha');

    $this->post('/contacto', datosContacto(['recaptcha_token' => 'token-valido']))->assertSessionHas('contact_sent');
});

test('rechaza un token de reCAPTCHA con puntaje bajo', function () {
    fakeServicios(['www.google.com/recaptcha/*' => Http::response(['success' => true, 'action' => 'contacto', 'score' => 0.1])]);
    config(['services.recaptcha.site_key' => 'site', 'services.recaptcha.secret_key' => 'secret']);

    $this->post('/contacto', datosContacto(['recaptcha_token' => 'bot']))->assertSessionHasErrors('recaptcha');
});

test('"¿Cómo te enteraste de nosotros?" es opcional aunque el servicio de medios responda', function () {
    fakeServicios();

    $this->get('/contactanos')->assertSee('<span class="campo-opcional">(opcional)</span>', false);
    $this->post('/contacto', datosContacto(['medio' => null]))->assertSessionHas('contact_sent');
});
