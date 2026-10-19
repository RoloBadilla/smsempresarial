@extends('layouts.app')

@section('titulo', 'Preguntas frecuentes de SMSempresarial.com sobre SMS y WhatsApp')

@section('contenido')
<main id="contenido">
  <header class="cabecera-pagina">
    <div class="contenedor">
      <nav class="migas" aria-label="Ruta de navegación">
        <ol>
          <li><a href="{{ route('home') }}">Inicio</a></li>
          <li aria-current="page">Preguntas Frecuentes</li>
        </ol>
      </nav>
      <h1 class="cabecera-pagina__titulo">Preguntas Frecuentes</h1>
    </div>
  </header>

  <div class="contenedor">
    <div class="preguntas">
      <details class="pregunta" name="preguntas" open>
        <summary><h2>1. ¿Qué es SMSEmpresarial.com?</h2></summary>
        <div class="pregunta__respuesta">
          <p>SMSEmpresarial.com es un ente pasivo que le permite enviar mensajes de texto SMS (Short Message Service, mensajes cortos de texto) o WhatsApp, desde Internet a usuarios finales en diferentes países.</p>
          <p>Con la facilidad de que usted no debe invertir en equipo, software y mantenimiento; ni teniendo que esperar gran tiempo de recepción al tener que hacer varios envíos simultáneos.</p>
          <p>Para utilizar el sistema de SMSEmpresarial.com solo necesita estar conectado a Internet y acceder en su navegador a <a href="{{ route('home') }}">smsempresarial.com</a>; debe de registrarse e ingresar a su cuenta.</p>
          <p>SMSempresarial.com no brinda ninguna Base de Datos de teléfonos y es responsabilidad de cada cliente de SMSEmpresarial.com tener la autorización del abonado o usuario final (el que recibe el mensaje de texto SMS o WhatsApp) para poder enviar el mensaje, según la legislación de cada país donde se realice el envío.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>2. ¿Quién proporciona la base de datos de contactos?</h2></summary>
        <div class="pregunta__respuesta">
          <p>SMSempresarial.com no brinda ninguna Base de Datos de teléfonos y es responsabilidad de cada cliente de SMSEmpresarial.com tener la autorización del abonado o usuario final (el que recibe el mensaje de texto SMS o WhatsApp) para poder enviar el mensaje, según la legislación de cada país donde se realice el envío.</p>
          <p>La base de datos de contactos la debe de brindar el cliente y es responsabilidad de este el uso de los mismos, así como el contenido del mensaje.</p>
          <p>SMSEmpresarial.com es un sistema pasivo que permite a los clientes que adquieren el servicio la comunicación.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>3. ¿Para qué puedo usar SMSempresarial.com?</h2></summary>
        <div class="pregunta__respuesta">
          <p>Con el servicio que SMSempresarial.com le brinda usted podrá tener una comunicación directa de forma eficiente y efectiva con sus clientes.</p>
          <ul>
            <li>Enviar comunicados a sus mensajeros</li>
            <li>Enviar mensajes a todos los integrantes de su oficina</li>
            <li>Enviar de mensajes de cobro personalizados (mediante el sistema de Campañas)</li>
            <li>Enviar saludos de cumpleaños, navideños y de año nuevo a clientes</li>
            <li>Recordar citas o reuniones</li>
            <li>Realizar campañas publicitarias o de mercadeo a sus clientes mediante el envío masivo de comunicados personalizados. (mediante el sistema de Campañas)</li>
            <li>Enviar comunicados de promociones, productos, circulares, recordatorios, boletines o eventos.</li>
            <li>Recibir de un correo electrónico (e-mail) a su celular.</li>
            <li>Interconectar los sistemas de su empresa de avisos electrónicos con nuestro sistema para que envíe un mensaje de texto.</li>
          </ul>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>4. ¿Puedo hacer uso de WhatsApp?</h2></summary>
        <div class="pregunta__respuesta">
          <p>SMSempresarial.com permite que el sistema de Webservice pueda enviar y recibir mensajes de WhatsApp. Sin embargo, para dar de alta una línea de WhatsApp comuníquese con el departamento de ventas.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>5. ¿En qué países funciona y cuáles son las tarifas?</h2></summary>
        <div class="pregunta__respuesta">
          <p>Favor ir a la sección de Rutas y Tarifas donde podrá encontrar la información solicitada.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>6. ¿Cuánto dura el saldo adquirido?</h2></summary>
        <div class="pregunta__respuesta">
          <p>Cada vez que usted realice una recarga el nuevo saldo tendrá una vigencia de 12 meses. Si usted no recarga antes de esos 12 meses se perderá el saldo adquirido.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>7. ¿Cómo puedo dejar de recibir mensajes de los clientes de SMSempresarial?</h2></summary>
        <div class="pregunta__respuesta">
          <p>El sistema de SMSEmpresarial.com acepta las tarjetas de crédito (Visa, Master Card o American Express). Debe de Registrarse y comprar el monto inicial para poder ser utilizado. Si la transacción fue efectiva, usted recibirá por correo electrónico la confirmación de la compra y en ese mismo momento usted podrá empezar a utilizar el servicio de SMSEmpresarial.com</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>8. ¿Largo de un mensaje de texto SMS?</h2></summary>
        <div class="pregunta__respuesta">
          <p>Un mensaje de texto SMS se comprende de 160 caracteres en formato UTF-8 (UCS Transformation Format 8).</p>
          <p>En caso de que la Ruta seleccionada soporte mensajes con caracteres especiales el mensaje se acortará según la posición del carácter en el texto. Así como si la Ruta seleccionada permite enviar mensajes largos, la cantidad de caracteres se disminuirá, ya que el protocolo utiliza 20 caracteres para poder conocer cuál siguiente mensaje y el anterior con el fin de que al llegar al dispositivo se pueda ordenar de la forma correcta para mostrarse.</p>
        </div>
      </details>

      <details class="pregunta" name="preguntas">
        <summary><h2>9. ¿Cuáles son los caracteres especiales?</h2></summary>
        <div class="pregunta__respuesta">
          <p>A nivel de mensajes de texto los caracteres definidos son los del formato UTF-8 (UCS Transformation Format 8).</p>
          <p>Es por esta razón que lo caracteres Latinos como ejemplo: Á, É, Í, Ó, Ú, Ń, á,é, í, ó, ú, ń, ä, ë, ï, ö, ü, ¿, entre otros al utilizarlos en el mensaje utilizan más espacios que solo un carácter.</p>
        </div>
      </details>
    </div>
  </div>
</main>
@endsection
