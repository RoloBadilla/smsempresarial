<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function caracteristicas(): View
    {
        return view('pages.caracteristicas');
    }

    public function nosotros(): View
    {
        return view('pages.nosotros');
    }

    public function servicio(string $servicio): View
    {
        return view('pages.servicio', [
            'slug' => $servicio,
            'servicio' => config('servicios.'.$servicio),
        ]);
    }

    public function faq(): View
    {
        return view('pages.faq');
    }

    public function tarifas(): View
    {
        return view('pages.tarifas');
    }

    public function contactanos(): View
    {
        return view('pages.contactanos', [
            'temas' => ContactRequest::TEMAS,
        ]);
    }
}
