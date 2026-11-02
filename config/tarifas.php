<?php

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
