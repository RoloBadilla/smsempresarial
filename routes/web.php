<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/caracteristicas', 'caracteristicas')->name('caracteristicas');
    Route::get('/preguntas-frecuentes', 'faq')->name('faq');
    Route::get('/tarifas', 'tarifas')->name('tarifas');
    Route::get('/contactanos', 'contactanos')->name('contactanos');
});

Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

// Direcciones anteriores: redirección permanente (301) para no perder links ni posicionamiento.
Route::permanentRedirect('/index.html', '/');
Route::permanentRedirect('/caracteristicas.html', '/caracteristicas');
Route::permanentRedirect('/faq.html', '/preguntas-frecuentes');
Route::permanentRedirect('/faq', '/preguntas-frecuentes');
Route::permanentRedirect('/rutasytarifas.html', '/tarifas');
Route::permanentRedirect('/rutasytarifas', '/tarifas');
Route::permanentRedirect('/contactanos.html', '/contactanos');
