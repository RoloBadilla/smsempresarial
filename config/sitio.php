<?php

// Datos de la empresa que se repiten en el sitio (SEO y datos estructurados para Google y buscadores con IA).
// Cambiarlos aquí los actualiza en todas las páginas.

return [
    'nombre' => 'SMS Empresarial',
    // Dominio público. El canonical y los datos para Google siempre apuntan aquí,
    // aunque el sitio se abra en la copia de prueba (smsempresarial.test).
    'url' => 'https://smsempresarial.com',
    'descripcion' => 'Plataforma de Cyberfuel para enviar SMS masivos y mensajes de WhatsApp desde Costa Rica: campañas, recordatorios, notificaciones y códigos OTP desde la web o por API.',
    'telefono' => '+506 2204 9494',
    'correo' => 'info@cyberfuel.com',
    'pais' => 'Costa Rica',
    'idioma' => 'es-CR',
    'og_locale' => 'es_CR',

    'direccion' => [
        'calle' => 'Edificio E, Forum 1',
        'ciudad' => 'Santa Ana',
        'provincia' => 'San José',
        'pais' => 'CR',
    ],

    // Archivos dentro de public/
    'logo' => 'images/logos/sms-empresarial.svg',
    'imagen_compartir' => 'images/compartir/sms-empresarial.png', // 1200×630, para WhatsApp, Facebook, LinkedIn…

    // Empresa que respalda el servicio.
    'empresa_matriz' => [
        'nombre' => 'Cyberfuel',
        'url' => 'https://www.cyberfuel.com/',
    ],

    // Perfiles oficiales: le dicen a Google y a la IA que estas cuentas son de la misma empresa.
    'redes' => [
        'https://www.facebook.com/cyberfuelcom',
        'https://www.instagram.com/cyberfuel_sa/',
        'https://www.linkedin.com/company/1017615',
        'https://www.tiktok.com/@cyberfuel.com',
    ],
];
