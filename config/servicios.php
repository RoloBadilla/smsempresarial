<?php

// Páginas de cada uso de la plataforma (las tarjetas de "Con nuestra plataforma puedes" en el inicio).
// La clave es la URL: /envio-de-comunicados, /recordatorios-por-sms, etc. Todas usan pages/servicio.blade.php.
// Para agregar una página, se copia un bloque y se agrega su traducción en public/lang/en.json.
//
// En las respuestas, :precio se reemplaza por la tarifa de Costa Rica de config/tarifas.php.
// Los mensajes del celular son ejemplos ilustrativos.

$enviar = [
    ['icono' => 'navegador', 'titulo' => 'Tú', 'texto' => 'Desde la plataforma web, un Excel o tu sistema por API'],
    ['icono' => 'plataforma', 'titulo' => 'SMS Empresarial', 'texto' => 'Procesa y envía cada mensaje'],
    ['icono' => 'operador', 'titulo' => 'Operador móvil', 'texto' => 'Lo lleva a la red celular'],
    ['icono' => 'celular', 'titulo' => 'Tu cliente', 'texto' => 'Lo recibe en su celular'],
];

$precio = [
    'pregunta' => '¿Cuánto cuesta cada mensaje?',
    'respuesta' => 'Pagas por mensaje enviado, con saldo prepago. Un SMS a Costa Rica cuesta $:precio + IVA; los demás países están en Rutas y tarifas. WhatsApp se cotiza según el país y el tipo de servicio.',
];

return [
    'envio-de-comunicados' => [
        'icono' => 'comunicados',
        'titulo' => 'Enviar comunicados',
        'resumen' => 'Avisa al instante a clientes, colaboradores o proveedores con un solo envío. Elige una lista de contactos o carga un Excel, y el mensaje llega a cada celular en Costa Rica o en otros países.',
        'seo_title' => 'Envío de comunicados por SMS y WhatsApp en Costa Rica | SMS Empresarial',
        'seo_description' => 'Envía comunicados por SMS y WhatsApp a clientes, colaboradores o proveedores en Costa Rica: un solo envío, listas de contactos y carga desde Excel.',
        'h1' => 'Envía comunicados por SMS y WhatsApp',
        'intro' => 'Avisa al instante a clientes, colaboradores o proveedores con un solo envío, desde el navegador y sin instalar programas.',
        'que_es' => 'Es la forma más directa de informar a un grupo de personas: escribes el mensaje una vez, eliges a quién va y SMS Empresarial lo entrega en cada celular. Funciona en Costa Rica y en otros países, por SMS o por WhatsApp Business.',
        'mensajes' => [
            ['canal' => 'SMS', 'texto' => 'Mañana la oficina abre a las 10:00 a. m.'],
            ['canal' => 'WhatsApp', 'texto' => 'Nuevo horario de atención a partir del lunes.'],
            ['canal' => 'SMS', 'texto' => 'Circular: reunión general el viernes.'],
        ],
        'ventajas' => [
            ['icono' => 'lista', 'titulo' => 'Un solo envío para todos', 'texto' => 'Escribe el mensaje una vez y mándalo a una lista de contactos completa.'],
            ['icono' => 'archivo', 'titulo' => 'Contactos desde Excel', 'texto' => 'Carga tus contactos desde un archivo de Excel y organízalos en listas.'],
            ['icono' => 'reloj', 'titulo' => 'Al instante o programado', 'texto' => 'Envía el comunicado en el momento o prográmalo para una fecha determinada.'],
        ],
        'flujo' => $enviar,
        'cuando' => [
            'Avisar a tus mensajeros de un cambio de ruta u horario.',
            'Informar a las personas de tu oficina.',
            'Enviar circulares o boletines a tus clientes.',
            'Saludar a tus clientes en cumpleaños, Navidad y Año Nuevo.',
        ],
        'faq' => [
            ['pregunta' => '¿Necesito instalar algún programa?', 'respuesta' => 'No. La plataforma funciona desde el navegador y solo necesitas conexión a Internet. No tienes que invertir en equipo, software ni mantenimiento.'],
            ['pregunta' => '¿Quién proporciona los contactos?', 'respuesta' => 'Tú. SMS Empresarial no brinda bases de datos de teléfonos: cada cliente es responsable de contar con la autorización de las personas que reciben sus mensajes.'],
            $precio,
        ],
    ],

    'recordatorios-por-sms' => [
        'icono' => 'recordatorios',
        'titulo' => 'Enviar recordatorios y eventos',
        'resumen' => 'Recuerda citas, reuniones, cobros y eventos para reducir ausencias y atrasos. Programa el envío para la fecha que necesites y personaliza cada mensaje con el nombre de tu cliente.',
        'seo_title' => 'Recordatorios por SMS y WhatsApp para citas y cobros | SMS Empresarial',
        'seo_description' => 'Envía recordatorios de citas, reuniones, cobros y eventos por SMS y WhatsApp en Costa Rica. Prográmalos y personaliza cada mensaje con el nombre del cliente.',
        'h1' => 'Recordatorios por SMS para citas, cobros y eventos',
        'intro' => 'Reduce ausencias y atrasos con un mensaje que llega al celular de tu cliente en el momento justo.',
        'que_es' => 'Con el sistema de campañas cargas tu lista de clientes y SMS Empresarial arma un mensaje personalizado para cada uno con sus datos, como el nombre o la fecha de la cita. Lo programas para la fecha que necesites y la plataforma lo envía sola.',
        'mensajes' => [
            ['canal' => 'SMS', 'texto' => 'Hola Ana, le recordamos su cita del jueves a las 3:00 p. m.'],
            ['canal' => 'WhatsApp', 'texto' => 'Su pago vence el día 15. ¡Gracias por su preferencia!'],
            ['canal' => 'SMS', 'texto' => 'Mañana es nuestro evento anual. ¡Lo esperamos!'],
        ],
        'ventajas' => [
            ['icono' => 'personalizar', 'titulo' => 'Mensajes personalizados', 'texto' => 'Cada recordatorio lleva los datos de tu lista, como el nombre del cliente o la fecha de su cita.'],
            ['icono' => 'reloj', 'titulo' => 'Programa la fecha', 'texto' => 'Deja los recordatorios listos para que salgan en la fecha determinada, sin estar pendiente.'],
            ['icono' => 'mensaje', 'titulo' => 'Recibe la confirmación', 'texto' => 'Tus clientes pueden responder el mensaje y ves sus respuestas en la plataforma.'],
        ],
        'flujo' => $enviar,
        'cuando' => [
            'Recordar citas o reuniones.',
            'Enviar recordatorios de cobro personalizados.',
            'Avisar que un pago está por vencer.',
            'Invitar a un evento y recordarlo un día antes.',
        ],
        'faq' => [
            ['pregunta' => '¿Puedo programar los recordatorios?', 'respuesta' => 'Sí. Puedes enviar los mensajes en el momento o programarlos para una fecha determinada, también en campañas cargadas desde Excel.'],
            ['pregunta' => '¿Cuántos caracteres puede tener un recordatorio?', 'respuesta' => 'Un SMS tiene hasta 160 caracteres. Las tildes y la ñ pueden ocupar más espacio y reducir ese límite, según la ruta.'],
            ['pregunta' => '¿Cuánto dura el saldo?', 'respuesta' => 'Cada recarga da 12 meses de vigencia al saldo. Si no haces otra recarga en ese plazo, pierdes el saldo adquirido.'],
        ],
    ],

    'campanas-de-sms-masivos' => [
        'icono' => 'campanas',
        'titulo' => 'Promociones y campañas masivas',
        'resumen' => 'Envía ofertas a toda tu lista y personaliza cada mensaje con los datos de cada cliente. Con la lista de bloqueos y el sistema de suscripción respetas a quien ya no quiere recibir mensajes.',
        'seo_title' => 'Campañas de SMS masivos y WhatsApp en Costa Rica | SMS Empresarial',
        'seo_description' => 'Envía promociones y campañas de SMS masivos y WhatsApp en Costa Rica. Carga tus contactos desde Excel y personaliza cada mensaje con los datos de cada cliente.',
        'h1' => 'Campañas de SMS masivos para tus promociones',
        'intro' => 'Lleva tus ofertas al celular de toda tu lista y personaliza cada mensaje con los datos de cada cliente.',
        'que_es' => 'Una campaña es un envío masivo a una lista de contactos. Cargas la lista desde Excel, escribes el mensaje con los datos de cada cliente y eliges si sale ahora o en una fecha programada. Después revisas en los reportes lo que se envió y lo que te respondieron.',
        'mensajes' => [
            ['canal' => 'WhatsApp', 'texto' => 'Carlos, este fin de semana tienes 20 % de descuento.'],
            ['canal' => 'SMS', 'texto' => 'Nuevo producto disponible en tienda. ¡Ven a conocerlo!'],
            ['canal' => 'SMS', 'texto' => 'Gracias por ser cliente: tu cupón vence el día 30.'],
        ],
        'ventajas' => [
            ['icono' => 'personalizar', 'titulo' => 'Cada mensaje personalizado', 'texto' => 'Usa los datos de tu lista para que cada cliente reciba un mensaje con su nombre.'],
            ['icono' => 'bloqueo', 'titulo' => 'Lista de bloqueos', 'texto' => 'Administra los números bloqueados para no escribir a quien no deseas contactar.'],
            ['icono' => 'suscripcion', 'titulo' => 'Sistema de suscripción', 'texto' => 'Gestiona las altas y las solicitudes de baja según las reglas de cada ruta.'],
        ],
        'flujo' => $enviar,
        'cuando' => [
            'Lanzar una promoción o un descuento.',
            'Anunciar un producto nuevo.',
            'Enviar boletines o información de productos.',
            'Hacer campañas publicitarias o de mercadeo.',
        ],
        'faq' => [
            ['pregunta' => '¿Puedo enviar campañas por WhatsApp?', 'respuesta' => 'Sí. SMS Empresarial envía y recibe mensajes de WhatsApp Business por medio de su Web Service (API). WhatsApp necesita un número exclusivo para tu empresa; para activarlo, escríbele al equipo de ventas.'],
            ['pregunta' => '¿Qué pasa si alguien ya no quiere recibir mensajes?', 'respuesta' => 'Agrega su número a la lista de bloqueos o gestiona su baja con el sistema de suscripción. Cada empresa es responsable de contar con la autorización de sus destinatarios.'],
            $precio,
        ],
    ],

    'notificaciones-y-alertas' => [
        'icono' => 'alertas',
        'titulo' => 'Notificaciones y alertas',
        'resumen' => 'Informa entregas, cambios de estado o alertas de seguridad en el momento. Conecta los sistemas de alertas de tu empresa o convierte un correo en mensaje de texto, sin hacerlo a mano.',
        'seo_title' => 'Notificaciones y alertas por SMS y WhatsApp | SMS Empresarial Costa Rica',
        'seo_description' => 'Envía notificaciones de entregas, cambios de estado y alertas de seguridad por SMS y WhatsApp. Conecta tus sistemas por API o convierte correos en mensajes.',
        'h1' => 'Notificaciones y alertas por SMS al instante',
        'intro' => 'Informa entregas, cambios de estado o alertas de seguridad en el momento en que pasan.',
        'que_es' => 'Las notificaciones salen solas desde tus sistemas: conectas tu aplicación por API o haces que un correo se convierta en mensaje de texto, y SMS Empresarial lo entrega en el celular de la persona. Así nadie tiene que enviarlas a mano.',
        'mensajes' => [
            ['canal' => 'SMS', 'texto' => 'Tu pedido 1024 va en camino.'],
            ['canal' => 'WhatsApp', 'texto' => 'Tu equipo ya está listo para retirar.'],
            ['canal' => 'SMS', 'texto' => 'Alerta: detectamos un acceso nuevo a tu cuenta.'],
        ],
        'ventajas' => [
            ['icono' => 'api', 'titulo' => 'Integración por API', 'texto' => 'Conecta tus sistemas por API REST (GET o POST) o Web Service SOAP.'],
            ['icono' => 'correo', 'titulo' => 'De correo a mensaje', 'texto' => 'Envía el contenido de un correo como mensaje de texto y usa su encabezado para identificarlo.'],
            ['icono' => 'reportes', 'titulo' => 'Historial y reportes', 'texto' => 'Consulta el historial de mensajes enviados y recibidos con filtros de búsqueda.'],
        ],
        'flujo' => [
            ['icono' => 'api', 'titulo' => 'Tu sistema', 'texto' => 'Envía la alerta por API o por correo'],
            $enviar[1], $enviar[2], $enviar[3],
        ],
        'cuando' => [
            'Avisar que un pedido va en camino o fue entregado.',
            'Informar un cambio de estado en un trámite.',
            'Enviar alertas de seguridad.',
            'Conectar los sistemas de alertas de tu empresa.',
        ],
        'faq' => [
            ['pregunta' => '¿Cómo conecto mi sistema?', 'respuesta' => 'Por API REST con GET o POST, o por Web Service SOAP. Si tu sistema ya envía correos, también puedes convertir esos correos en mensajes de texto.'],
            ['pregunta' => '¿Puedo enviar alertas a otros países?', 'respuesta' => 'Sí. Puedes enviar SMS a Costa Rica y a otros países. Consulta los destinos y los precios en Rutas y tarifas.'],
            $precio,
        ],
    ],

    'codigos-otp-por-sms' => [
        'icono' => 'otp',
        'titulo' => 'Códigos OTP y verificación en dos pasos (2FA)',
        'resumen' => 'Envía códigos de un solo uso desde tus sistemas para validar accesos y transacciones. La integración se hace por API REST (GET o POST) o Web Service SOAP.',
        'seo_title' => 'Códigos OTP por SMS y verificación en dos pasos (2FA) | SMS Empresarial',
        'seo_description' => 'Envía códigos OTP por SMS para la verificación en dos pasos (2FA) desde tus sistemas en Costa Rica. Integración por API REST o Web Service SOAP.',
        'h1' => 'Códigos OTP por SMS para verificar a tus usuarios',
        'intro' => 'Envía códigos de un solo uso desde tus sistemas para validar accesos y transacciones.',
        'que_es' => 'Un código OTP es una clave que sirve una sola vez. Tu sistema la genera y la envía por SMS Empresarial al celular del usuario, que la escribe para confirmar que es quien dice ser. Es la base de la verificación en dos pasos (2FA).',
        'mensajes' => [
            ['canal' => 'SMS', 'texto' => 'Tu código de verificación es 482913.'],
            ['canal' => 'SMS', 'texto' => 'Usa 7741 para confirmar tu transferencia.'],
            ['canal' => 'SMS', 'texto' => 'Tu código para ingresar es 305118.'],
        ],
        'ventajas' => [
            ['icono' => 'api', 'titulo' => 'Desde tus sistemas', 'texto' => 'Envía los códigos por API REST (GET o POST) o Web Service SOAP, sin intervención manual.'],
            ['icono' => 'otp', 'titulo' => 'Accesos y transacciones', 'texto' => 'Agrega un paso extra para validar inicios de sesión y operaciones importantes.'],
            ['icono' => 'reportes', 'titulo' => 'Seguimiento de cada envío', 'texto' => 'Revisa en el historial los códigos enviados, con filtros de búsqueda.'],
        ],
        'flujo' => [
            ['icono' => 'api', 'titulo' => 'Tu sistema', 'texto' => 'Genera el código y lo envía por API'],
            $enviar[1], $enviar[2],
            ['icono' => 'celular', 'titulo' => 'Tu usuario', 'texto' => 'Lo recibe y lo escribe para validar'],
        ],
        'cuando' => [
            'Verificar el inicio de sesión en tu aplicación.',
            'Confirmar una transacción o un pago.',
            'Validar el número de teléfono de un usuario nuevo.',
            'Restablecer una contraseña.',
        ],
        'faq' => [
            ['pregunta' => '¿Cómo se integra con mi aplicación?', 'respuesta' => 'Tu sistema se conecta por API REST, con GET o POST, o por Web Service SOAP, y envía cada código como un mensaje de texto.'],
            ['pregunta' => '¿Puedo enviar códigos a usuarios de otros países?', 'respuesta' => 'Sí. Puedes enviar SMS a Costa Rica y a otros países. Consulta los destinos y los precios en Rutas y tarifas.'],
            $precio,
        ],
    ],

    'sms-dos-vias-sinpe-movil' => [
        'icono' => 'dos-vias',
        'titulo' => 'Comunicación en dos vías y SINPE Móvil',
        'resumen' => 'Recibe las respuestas de tus clientes, por ejemplo confirmaciones de pago por SINPE Móvil. Consúltalas en la plataforma, recíbelas por correo o procésalas en tu sistema por Web Service.',
        'seo_title' => 'SMS en dos vías y confirmaciones de SINPE Móvil | SMS Empresarial',
        'seo_description' => 'Recibe las respuestas de tus clientes por SMS, como confirmaciones de pago por SINPE Móvil. Consúltalas en la plataforma, por correo o en tu sistema.',
        'h1' => 'SMS en dos vías: recibe respuestas y pagos por SINPE Móvil',
        'intro' => 'Tus clientes también te pueden escribir: recibe sus respuestas y confirmaciones de pago en un solo lugar.',
        'que_es' => 'Con las rutas de recepción, los mensajes que te envían tus clientes llegan a SMS Empresarial. Puedes consultarlos en la plataforma, recibirlos por correo o procesarlos en tu sistema por medio de un Web Service, por ejemplo para registrar una confirmación de pago por SINPE Móvil.',
        'mensajes' => [
            ['canal' => 'SMS', 'texto' => 'Su factura está lista. Puede pagar por SINPE Móvil.'],
            ['canal' => 'SMS', 'texto' => 'Listo, ya hice el SINPE.'],
            ['canal' => 'SMS', 'texto' => 'Recibimos su pago. ¡Gracias!'],
        ],
        'ventajas' => [
            ['icono' => 'bandeja', 'titulo' => 'Rutas de recepción', 'texto' => 'Configura rutas para recibir los mensajes que te envían tus clientes.'],
            ['icono' => 'correo', 'titulo' => 'En la plataforma, por correo o en tu sistema', 'texto' => 'Consulta las respuestas en la plataforma, recíbelas por correo o procésalas por Web Service.'],
            ['icono' => 'reportes', 'titulo' => 'Historial completo', 'texto' => 'Revisa los mensajes enviados y recibidos con filtros de búsqueda.'],
        ],
        'flujo' => [
            ['icono' => 'celular', 'titulo' => 'Tu cliente', 'texto' => 'Responde el mensaje desde su celular'],
            ['icono' => 'operador', 'titulo' => 'Operador móvil', 'texto' => 'Lleva la respuesta a la red'],
            ['icono' => 'plataforma', 'titulo' => 'SMS Empresarial', 'texto' => 'La recibe por tu ruta de recepción'],
            ['icono' => 'bandeja', 'titulo' => 'Tú', 'texto' => 'La ves en la plataforma, por correo o en tu sistema'],
        ],
        'cuando' => [
            'Recibir confirmaciones de pago por SINPE Móvil.',
            'Confirmar o cancelar una cita respondiendo el mensaje.',
            'Recibir consultas de tus clientes.',
            'Hacer encuestas cortas de satisfacción.',
        ],
        'faq' => [
            ['pregunta' => '¿Dónde veo las respuestas de mis clientes?', 'respuesta' => 'En la plataforma, en tu correo o en tu propio sistema. Lo defines al configurar la ruta de recepción.'],
            ['pregunta' => '¿Puedo conectar las respuestas a mi sistema?', 'respuesta' => 'Sí. Las rutas de recepción pueden enviar cada mensaje a tu sistema por medio de un Web Service, para procesarlo automáticamente.'],
            ['pregunta' => '¿También puedo recibir mensajes por WhatsApp?', 'respuesta' => 'Sí. SMS Empresarial envía y recibe mensajes de WhatsApp Business por medio de su Web Service (API). WhatsApp necesita un número exclusivo para tu empresa; para activarlo, escríbele al equipo de ventas.'],
        ],
    ],
];
