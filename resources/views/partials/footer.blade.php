<footer class="pie" id="contacto">
  <div class="pie__columnas contenedor">
    <section class="pie__bloque pie__bloque--contacto" aria-labelledby="pie-contacto">
      <a class="pie__logo" href="{{ route('home') }}">
        <img src="{{ asset('img') }}/logos/sms-empresarial-white.svg" alt="SMS Empresarial" width="132" height="62" loading="lazy">
      </a>
      <h2 class="pie__titulo" id="pie-contacto">Contacto General</h2>
      <dl class="pie__datos">
        <div class="pie__dato pie__dato--destacado">
          <dt><img class="pie__bandera" src="{{ asset('img') }}/banderas/Flag_of_Costa_Rica.png" alt="Bandera de Costa Rica" width="20" height="13"> Tel / WhatsApp:</dt>
          <dd><a href="https://wa.me/50622049494">+506 2204 9494</a></dd>
        </div>
        <div class="pie__dato pie__dato--destacado">
          <dt><img class="pie__bandera" src="{{ asset('img') }}/banderas/Flag_of_the_United_States.png" alt="Bandera de Estados Unidos" width="20" height="13"> Teléfono:</dt>
          <dd><a href="tel:+13059097248">(+1)305-909-7248</a></dd>
        </div>
        <div class="pie__dato">
          <dt>Información:</dt>
          <dd><a href="mailto:info@cyberfuel.com">info@cyberfuel.com</a></dd>
        </div>
        <div class="pie__dato">
          <dt>Dirección:</dt>
          <dd>Edificio E, Forum 1. Santa Ana San José Costa Rica</dd>
        </div>
      </dl>
    </section>

    <section class="pie__bloque" aria-labelledby="pie-correos">
      <h2 class="pie__titulo" id="pie-correos">Correos Directos</h2>
      <dl class="pie__directorio">
        <div class="pie__fila">
          <dt>Ventas:</dt>
          <dd><a href="mailto:ventas@cyberfuel.com">ventas@cyberfuel.com</a></dd>
        </div>
        <div class="pie__fila">
          <dt>Servicio al cliente:</dt>
          <dd><a href="mailto:sac@cyberfuel.com">sac@cyberfuel.com</a></dd>
        </div>
        <div class="pie__fila">
          <dt>Soporte 24/7:</dt>
          <dd><a href="mailto:soporte@cyberfuel.com">soporte@cyberfuel.com</a></dd>
        </div>
      </dl>
    </section>

    <section class="pie__bloque" aria-labelledby="pie-redes">
      <h2 class="pie__titulo" id="pie-redes">Síguenos</h2>
      <p class="pie__texto">Conéctate con nosotros en redes sociales:</p>
      <ul class="redes">
        <li><a class="redes__enlace redes__enlace--facebook" href="https://www.facebook.com/cyberfuelcom" target="_blank" rel="noopener">Facebook</a></li>
        <li><a class="redes__enlace redes__enlace--instagram" href="https://www.instagram.com/cyberfuel_sa/" target="_blank" rel="noopener">Instagram</a></li>
        <li><a class="redes__enlace redes__enlace--tiktok" href="https://www.tiktok.com/@cyberfuel.com" target="_blank" rel="noopener">Tiktok</a></li>
        <li><a class="redes__enlace redes__enlace--linkedin" href="https://www.linkedin.com/company/1017615" target="_blank" rel="noopener">LinkedIn</a></li>
      </ul>
    </section>
  </div>

  <div class="pie__marcas contenedor">
    <ul class="marcas" aria-label="Marcas del grupo">
      <li class="marcas__item">
        <a href="https://www.cyberfuel.com" target="_blank" rel="noopener"><img src="{{ asset('img') }}/logos/cyberfuel.svg" alt="Cyberfuel" width="160" height="34" loading="lazy"></a>
      </li>
      <li class="marcas__item">
        <a href="https://www.facturaprofesional.com" target="_blank" rel="noopener"><img src="{{ asset('img') }}/logos/factura-profesional.svg" alt="Factura Profesional" width="160" height="40" loading="lazy"></a>
      </li>
      <li class="marcas__item">
        <a href="https://planillaprofesional.com/" target="_blank" rel="noopener"><img src="{{ asset('img') }}/logos/planilla.svg" alt="Planilla Profesional" width="160" height="40" loading="lazy"></a>
      </li>
      <li class="marcas__item">
        <a href="https://www.cybersinpe.com/" target="_blank" rel="noopener"><img src="{{ asset('img') }}/logos/cybersinpe.svg" alt="CyberSinpe" width="160" height="40" loading="lazy"></a>
      </li>
    </ul>
  </div>

  <div class="pie__legal contenedor">
    <p class="pie__copyright">Copyright © 2026</p>
    <a class="pie__cyberfuel" href="https://www.cyberfuel.com" target="_blank" rel="noopener"><img src="{{ asset('img') }}/logos/cyberfuel-white.svg" alt="Cyberfuel" width="120" height="26" loading="lazy"></a>
    <a class="pie__sello" href="https://www.trustlogo.com/ttb_searcher/trustlogo?v_querytype=W&amp;v_shortname=SECDV&amp;v_search=http://www.smsempresarial.com/&amp;x=6&amp;y=5" target="_blank" rel="noopener">
      <img src="{{ asset('img') }}/logos/secured-by-sectigo.webp" alt="PositiveSSL Trust Seal" width="100" height="38" loading="lazy">
    </a>
  </div>
</footer>

<a class="flotante-whatsapp" href="https://api.whatsapp.com/send?phone=50622049494" target="_blank" rel="noopener">
  <span class="visualmente-oculto">WhatsApp</span>
</a>
