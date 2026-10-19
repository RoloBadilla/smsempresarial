@extends('layouts.app')

@section('titulo', 'Características SMSempresarial.com: envío SMS y WhatsApp')

@section('contenido')
<main id="contenido">
  <header class="cabecera-pagina">
    <div class="contenedor">
      <nav class="migas" aria-label="Ruta de navegación">
        <ol>
          <li><a href="{{ route('home') }}">Inicio</a></li>
          <li aria-current="page">Características</li>
        </ol>
      </nav>
      <h1 class="cabecera-pagina__titulo">Características</h1>
    </div>
  </header>

  <div class="contenedor prosa-ancha">
    <h2 class="titulo-seccion">SMSempresarial.com por medio de su plataforma ofrecer las diferentes soluciones:</h2>

    <section class="grupo" aria-labelledby="grupo-envio">
      <h2 class="grupo__titulo" id="grupo-envio">Envío:</h2>
      <div class="grupo__contenido">
        <article class="funcion">
          <h3>Mensajes individuales y/o grupales</h3>
          <p>Permite el envío de uno o varios mensajes en el momento o en una fecha determinada.</p>
        </article>
        <article class="funcion">
          <h3>Campañas o envíos masivos personalizados</h3>
          <p>Mediante un archivo de MS-Excel podrá cargar la lista de contactos e inclusive personalizar campos en el mensaje de texto con el fin de enviarlo de forma inmediata o bien en una fecha predeterminada.</p>
        </article>
        <article class="funcion">
          <h3>Convierta un Correo Electrónico a un Mensaje</h3>
          <p>Desde un correo electrónico único utilizando el encabezado del correo como identificador podrá trasmitir el cuerpo del correo como el texto del mensaje. O bien usando un correo individual podrá también transmitir el cuerpo del correo como mensaje de texto.</p>
        </article>
        <article class="funcion">
          <h3>Webservice / API</h3>
          <p>Se cuenta con un webservice REST en método GET y POST, así como un webservice SOAP para recibir el mensaje y convertirlo un mensaje de texto SMS o WhatsApp.</p>
        </article>
      </div>
    </section>

    <section class="grupo" aria-labelledby="grupo-recepcion">
      <h2 class="grupo__titulo" id="grupo-recepcion">Recepción:</h2>
      <div class="grupo__contenido">
        <p>Permite en rutas exclusivas tener una recepción de mensajes para poder no solo dejarlo en la plataforma, si no enviarlo por correo electrónico o bien utilizar un webservice para colocar la información.</p>
      </div>
    </section>

    <section class="grupo" aria-labelledby="grupo-reportes">
      <h2 class="grupo__titulo" id="grupo-reportes">Reportes:</h2>
      <div class="grupo__contenido">
        <p>Contamos con reportes de mensajes enviados y mensajes recibidos, los mismos contienen diferentes filtros de búsqueda.</p>
      </div>
    </section>

    <section class="grupo" aria-labelledby="grupo-configuracion">
      <h2 class="grupo__titulo" id="grupo-configuracion">Configuración:</h2>
      <div class="grupo__contenido">
        <article class="funcion">
          <h3>Contactos</h3>
          <p>Podrá ingresar el nombre del contacto y el número para poderle enviar mensajes solo seleccionándolo o bien crearle el correo individual para hacer uso de este.</p>
        </article>
        <article class="funcion">
          <h3>Lista de Contactos</h3>
          <p>Los contactos registrados podrás asignarlos a una lista para que de esta forma puedas seleccionar el grupo y enviarlo. Pero también la lista crea un correo individual que al hacer uso les llega el mensaje a todos los contactos.</p>
        </article>
        <article class="funcion">
          <h3>Lista de Bloqueos</h3>
          <p>Permite bloquear usuarios de no deseados.</p>
        </article>
        <article class="funcion">
          <h3>Sistema de Suscripción:</h3>
          <p>En caso de tener un número exclusivo con su ruta, podrá optar por esta funcionalidad tanto para SMS como para WhatsApp, con el fin de que los mismos usuarios se den de alta y así poderles enviar mensajes; esta modalidad fue diseñada para la opción de WhatsApp para prevenir que los usuarios soliciten el Bloqueo del número y lo categoricen como SPAM.</p>
        </article>
      </div>
    </section>
  </div>
</main>
@endsection
