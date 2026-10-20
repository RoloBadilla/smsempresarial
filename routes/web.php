<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/index.html', [SiteController::class, 'home'])->name('home.legacy');
Route::get('/{page}.html', [SiteController::class, 'show'])
    ->where('page', 'caracteristicas|faq|rutasytarifas|contactanos')
    ->name('site.page');
Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');
