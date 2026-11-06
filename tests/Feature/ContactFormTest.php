<?php

function datosContacto(array $cambios = []): array
{
    return array_merge([
        'nombre' => 'Ana Mora',
        'empresa' => 'Mi Pyme',
        'correo' => 'ana@ejemplo.com',
        'tema' => 'Tarifas SMS',
        'mensaje' => 'Quiero cotizar.',
    ], $cambios);
}

test('la página de contacto muestra el formulario con sus temas', function () {
    $this->get('/contactanos')
        ->assertOk()
        ->assertSee('id="contact-form"', false)
        ->assertSee('Tarifas SMS')
        ->assertSee('Preparar mi mensaje');
});

test('un contacto válido abre el correo con los datos listos', function () {
    $location = $this->post('/contacto', datosContacto())
        ->assertRedirect()
        ->headers->get('Location');

    expect($location)->toStartWith('mailto:info@cyberfuel.com?subject=')
        ->and(rawurldecode($location))
        ->toContain('Consulta web: Tarifas SMS')
        ->toContain('Nombre: Ana Mora')
        ->toContain('Empresa: Mi Pyme')
        ->toContain('Correo: ana@ejemplo.com')
        ->toContain('Quiero cotizar.');
});

test('sin empresa indica que no la dio', function () {
    $location = $this->post('/contacto', datosContacto(['empresa' => '']))->headers->get('Location');

    expect(rawurldecode($location))->toContain('Empresa: No indicada');
});

test('valida los campos obligatorios', function () {
    $this->from('/contactanos')
        ->post('/contacto', [])
        ->assertRedirect('/contactanos')
        ->assertSessionHasErrors(['nombre', 'correo', 'tema', 'mensaje']);
});

test('rechaza un tema que no está en la lista', function () {
    $this->post('/contacto', datosContacto(['tema' => 'Cualquier cosa']))->assertSessionHasErrors('tema');
});
