<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // reCAPTCHA v3 (invisible) del formulario de contacto.
    'recaptcha' => [
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret_key' => env('RECAPTCHA_SECRET_KEY'),
        'min_score' => (float) env('RECAPTCHA_MIN_SCORE', 0.5),
    ],

    // Servicio de leads de Cyberfuel: recibe los contactos del formulario.
    'cyberfuel_leads' => [
        'url' => env('CYBERFUEL_LEADS_URL', 'https://paybac.cyberfuel.com/leads/public/addleads/api'),
        'usuario' => env('CYBERFUEL_LEADS_USUARIO'),
        'clave' => env('CYBERFUEL_LEADS_CLAVE'),
        'producto' => env('CYBERFUEL_LEADS_PRODUCTO', 'SMSEmpresarial'),
    ],

    // Opciones de "¿Cómo te enteraste de nosotros?".
    'cyberfuel_medios' => [
        'url' => env('CYBERFUEL_MEDIOS_URL', 'https://paybac.cyberfuel.com/ws_funciones_psc/public/obtener_medios_comerciales/api'),
        'usuario' => env('CYBERFUEL_MEDIOS_USUARIO'),
        'clave' => env('CYBERFUEL_MEDIOS_CLAVE'),
    ],

    // Reseñas de Google Business Profile para la portada.
    'google_reviews' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'refresh_token' => env('GOOGLE_REFRESH_TOKEN'),
        'account_id' => env('GOOGLE_ACCOUNT_ID'),
        'location_id' => env('GOOGLE_LOCATION_ID'),
    ],

    // Plataforma donde el cliente crea su cuenta y envía mensajes.
    'plataforma' => [
        'registro' => env('PLATAFORMA_REGISTRO_URL', 'https://app.smsempresarial.com/index.php?action=registro'),
    ],

];
