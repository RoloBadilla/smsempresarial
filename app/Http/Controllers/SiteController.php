<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\CyberfuelLeads;
use App\Services\GoogleReviews;
use App\Services\Recaptcha;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(GoogleReviews $reviews): View
    {
        return view('pages.home', [
            'reviews' => $reviews->summary(),
        ]);
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

    public function contactanos(CyberfuelLeads $leads, Recaptcha $recaptcha): View
    {
        return view('pages.contactanos', [
            'temas' => ContactRequest::TEMAS,
            'medios' => $leads->mediosComerciales(),
            'recaptchaKey' => $recaptcha->siteKey(),
        ]);
    }
}
