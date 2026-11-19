<?php

// Tarifas de SMS Empresarial (solo Costa Rica). La página /tarifas se arma sola con estos datos.

return [
    // Paquetes de SMS para Costa Rica, en dólares (+ IVA).
    // Fuente: Documentos/20230905_Calculo-SMS-PlanesLiberty.xlsx, hoja "PRECIOS AL PUBLICO" (tipo de cambio ₡500).
    // precio_sms: precio de cada SMS del paquete. El precio del paquete lo calcula App\Support\PaquetesSms (cantidad × precio_sms).
    // adicional:  precio de cada SMS que se envía después de agotar el paquete.
    'paquetes' => [
        ['nombre' => 'SS0', 'cantidad' => 12000, 'precio_sms' => '0.00884', 'adicional' => '0.0124'],
        ['nombre' => 'SS1', 'cantidad' => 25000, 'precio_sms' => '0.00848', 'adicional' => '0.0124'],
        ['nombre' => 'SS2', 'cantidad' => 35870, 'precio_sms' => '0.00816', 'adicional' => '0.01204'],
        ['nombre' => 'SS3', 'cantidad' => 62500, 'precio_sms' => '0.0078', 'adicional' => '0.01204'],
        ['nombre' => 'SS4', 'cantidad' => 119048, 'precio_sms' => '0.00744', 'adicional' => '0.01168'],
        ['nombre' => 'SS5', 'cantidad' => 250000, 'precio_sms' => '0.00708', 'adicional' => '0.01168'],
        ['nombre' => 'SS6', 'cantidad' => 355263, 'precio_sms' => '0.00672', 'adicional' => '0.01132'],
        ['nombre' => 'SS7', 'cantidad' => 500000, 'precio_sms' => '0.00636', 'adicional' => '0.01132'],
        ['nombre' => 'SS8', 'cantidad' => 705882, 'precio_sms' => '0.006', 'adicional' => '0.01096'],
        ['nombre' => 'SS9', 'cantidad' => 1000000, 'precio_sms' => '0.00568', 'adicional' => '0.01096'],
        ['nombre' => 'SS10', 'cantidad' => 1000000, 'precio_sms' => '0.00532', 'adicional' => '0.0106'],
    ],

    // IVA de Costa Rica (%), para la calculadora de WhatsApp.
    'iva' => 13,

    // WhatsApp Business API: precio por mensaje en Costa Rica (US$ + IVA), según el tipo de plantilla de Meta.
    // Fuente: Ficha Técnica (julio 2026). Meta cambia estos precios según el país y la fecha.
    // El precio de WhatsApp Business Web y el del número exclusivo están al final de este archivo (los usa la
    // calculadora de /tarifas); también aparecen escritos en los textos de pages/tarifas.blade.php,
    // pages/faq.blade.php y config/servicios.php.
    'whatsapp' => [
        ['clave' => 'marketing', 'tipo' => 'Marketing (ofertas, promociones)', 'precio' => '0.13'],
        ['clave' => 'utilidad', 'tipo' => 'Utilidad (pedidos, pagos, entregas)', 'precio' => '0.03'],
        ['clave' => 'autenticacion', 'tipo' => 'Autenticación (códigos OTP)', 'precio' => '0.03'],
        ['clave' => 'servicio', 'tipo' => 'Servicio (respuestas a consultas)', 'precio' => '0.01'],
        ['clave' => 'recibido', 'tipo' => 'Mensaje recibido', 'precio' => '0.01'],
    ],

    // WhatsApp Business Web: precio por mensaje. Número exclusivo de WhatsApp: precio al mes. (US$ + IVA)
    'whatsapp_web' => '0.01',
    'numero_exclusivo' => '106',
];

/*
VERSIÓN ANTERIOR (hasta noviembre 2026): SMS a Costa Rica y a otros países, con tabla de tarifas por destino. Se deja comentada por si hay que volver a ella.
Para volver a ella: reemplazar todo lo de arriba por lo que sigue (sin la línea <?php).
Ojo: Perú estaba en 0.0400, pero el sitio publicado dice 0.4000.

// Tarifas de SMS por destino, en dólares por mensaje (+ IVA solo para clientes de Costa Rica).
// Para cambiar una tarifa o agregar un país, se edita esta lista; la tabla de /tarifas se arma sola.
//
// bandera:  código del país (ISO 3166, dos letras) = archivo public/images/banderas/<código>.png
// buscar:   palabras extra para el buscador de la tabla (nombre sin tildes, en inglés, código sin espacios)

return [
    'sms' => [
        ['pais' => 'Bahamas', 'bandera' => 'bs', 'marcacion' => '+1 242', 'precio' => '0.2000', 'ruta' => 'Internacional', 'buscar' => 'bahamas +1242'],
        ['pais' => 'Brasil', 'bandera' => 'br', 'marcacion' => '+55', 'precio' => '0.1000', 'ruta' => 'Internacional', 'buscar' => 'brasil brazil +55'],
        ['pais' => 'Chile', 'bandera' => 'cl', 'marcacion' => '+56', 'precio' => '0.0500', 'ruta' => 'Internacional', 'buscar' => 'chile +56'],
        ['pais' => 'Colombia', 'bandera' => 'co', 'marcacion' => '+57', 'precio' => '0.0500', 'ruta' => 'Internacional', 'buscar' => 'colombia +57'],
        ['pais' => 'Costa Rica', 'bandera' => 'cr', 'marcacion' => '+506', 'precio' => '0.0120', 'ruta' => 'Local', 'buscar' => 'costa rica +506'],
        ['pais' => 'El Salvador', 'bandera' => 'sv', 'marcacion' => '+503', 'precio' => '0.3100', 'ruta' => 'Internacional', 'buscar' => 'el salvador +503'],
        ['pais' => 'España', 'bandera' => 'es', 'marcacion' => '+34', 'precio' => '0.1000', 'ruta' => 'Internacional', 'buscar' => 'espana españa +34'],
        ['pais' => 'Estados Unidos', 'bandera' => 'us', 'marcacion' => '+1', 'precio' => '0.1000', 'ruta' => 'Internacional', 'buscar' => 'estados unidos usa +1'],
        ['pais' => 'Guatemala', 'bandera' => 'gt', 'marcacion' => '+502', 'precio' => '0.3100', 'ruta' => 'Internacional', 'buscar' => 'guatemala +502'],
        ['pais' => 'Honduras', 'bandera' => 'hn', 'marcacion' => '+504', 'precio' => '0.2000', 'ruta' => 'Internacional', 'buscar' => 'honduras +504'],
        ['pais' => 'México', 'bandera' => 'mx', 'marcacion' => '+52', 'precio' => '0.3100', 'ruta' => 'Internacional', 'buscar' => 'mexico méxico +52'],
        ['pais' => 'Nicaragua', 'bandera' => 'ni', 'marcacion' => '+505', 'precio' => '0.2000', 'ruta' => 'Internacional', 'buscar' => 'nicaragua +505'],
        ['pais' => 'Panamá', 'bandera' => 'pa', 'marcacion' => '+507', 'precio' => '0.2500', 'ruta' => 'Internacional', 'buscar' => 'panama panamá +507'],
        ['pais' => 'Perú', 'bandera' => 'pe', 'marcacion' => '+51', 'precio' => '0.0400', 'ruta' => 'Internacional', 'buscar' => 'peru perú +51'],
        ['pais' => 'Puerto Rico', 'bandera' => 'pr', 'marcacion' => '+1 939', 'precio' => '0.0500', 'ruta' => 'Internacional', 'buscar' => 'puerto rico +1939'],
        ['pais' => 'República Dominicana', 'bandera' => 'do', 'marcacion' => '+1 849', 'precio' => '0.3000', 'ruta' => 'Internacional', 'buscar' => 'republica dominicana república dominicana +1849'],
        ['pais' => 'Trinidad & Tobago', 'bandera' => 'tt', 'marcacion' => '+1 868', 'precio' => '0.3000', 'ruta' => 'Internacional', 'buscar' => 'trinidad tobago +1868'],
    ],

    // WhatsApp Business API: precio por mensaje en Costa Rica (US$ + IVA), según el tipo de plantilla de Meta.
    // Fuente: Ficha Técnica (julio 2026). Meta cambia estos precios según el país y la fecha.
    // El precio de WhatsApp Business Web (US$0.01) y el número exclusivo (US$106 al mes) también aparecen en los
    // textos de pages/tarifas.blade.php, pages/faq.blade.php y config/servicios.php.
    'whatsapp' => [
        ['tipo' => 'Marketing (ofertas, promociones)', 'precio' => '0.13'],
        ['tipo' => 'Utilidad (pedidos, pagos, entregas)', 'precio' => '0.03'],
        ['tipo' => 'Autenticación (códigos OTP)', 'precio' => '0.03'],
        ['tipo' => 'Servicio (respuestas a consultas)', 'precio' => '0.01'],
        ['tipo' => 'Mensaje recibido', 'precio' => '0.01'],
    ],
];
*/
