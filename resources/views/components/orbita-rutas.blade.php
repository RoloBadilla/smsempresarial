{{-- Rutas de envío a las siete provincias de Costa Rica. Si se cambia el número de rutas, ajustar los retrasos en caracteristicas.css. --}}
<div class="orbita">
  <svg class="orbita__mapa" viewBox="-30 -10 660 620" role="img" aria-label="Mapa de envíos a las siete provincias de Costa Rica" focusable="false">
    <circle class="orbita__anillo" cx="300" cy="300" r="205"/>
    <circle class="orbita__anillo orbita__anillo--giro" cx="300" cy="300" r="120"/>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="300.0" y2="125.0"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="300.0" y2="125.0" pathLength="100"/>
      <circle class="ruta__nodo" cx="300.0" cy="125.0" r="6"/>
      <text class="ruta__codigo" x="300.0" y="88.0" text-anchor="middle">Guanacaste</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="436.8" y2="190.9"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="436.8" y2="190.9" pathLength="100"/>
      <circle class="ruta__nodo" cx="436.8" cy="190.9" r="6"/>
      <text class="ruta__codigo" x="464.2" y="175.1" text-anchor="start">Alajuela</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="470.6" y2="338.9"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="470.6" y2="338.9" pathLength="100"/>
      <circle class="ruta__nodo" cx="470.6" cy="338.9" r="6"/>
      <text class="ruta__codigo" x="504.7" y="352.7" text-anchor="start">Heredia</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="375.9" y2="457.7"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="375.9" y2="457.7" pathLength="100"/>
      <circle class="ruta__nodo" cx="375.9" cy="457.7" r="6"/>
      <text class="ruta__codigo" x="391.1" y="509.2" text-anchor="start">Cartago</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="224.1" y2="457.7"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="224.1" y2="457.7" pathLength="100"/>
      <circle class="ruta__nodo" cx="224.1" cy="457.7" r="6"/>
      <text class="ruta__codigo" x="208.9" y="509.2" text-anchor="end">Puntarenas</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="129.4" y2="338.9"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="129.4" y2="338.9" pathLength="100"/>
      <circle class="ruta__nodo" cx="129.4" cy="338.9" r="6"/>
      <text class="ruta__codigo" x="95.3" y="352.7" text-anchor="end">Limón</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="163.2" y2="190.9"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="163.2" y2="190.9" pathLength="100"/>
      <circle class="ruta__nodo" cx="163.2" cy="190.9" r="6"/>
      <text class="ruta__codigo" x="135.8" y="175.1" text-anchor="end">San José</text>
    </g>
    <circle class="orbita__centro-halo" cx="300" cy="300" r="46"/>
    <circle class="orbita__centro" cx="300" cy="300" r="34"/>
    <text class="orbita__centro-texto" x="300" y="307" text-anchor="middle">SMS</text>
  </svg>
</div>

{{--
VERSIÓN ANTERIOR (hasta noviembre 2026): SMS a Costa Rica y a otros países, con tabla de tarifas por destino. Se deja comentada por si hay que volver a ella.
Para volver a ella: reemplazar todo lo de arriba por lo que sigue y cambiar los <!-- --> por comentarios de Blade.

<div class="orbita">
  <svg class="orbita__mapa" viewBox="-30 -10 660 620" role="img" aria-label="Mapa de rutas de envío por país" focusable="false">
    <circle class="orbita__anillo" cx="300" cy="300" r="205"/>
    <circle class="orbita__anillo orbita__anillo--giro" cx="300" cy="300" r="140"/>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="300.0" y2="95.0"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="300.0" y2="95.0" pathLength="100"/>
      <circle class="ruta__nodo" cx="300.0" cy="95.0" r="5"/>
      <text class="ruta__codigo" x="300.0" y="55.0" text-anchor="middle">+1242</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="374.1" y2="108.8"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="374.1" y2="108.8" pathLength="100"/>
      <circle class="ruta__nodo" cx="374.1" cy="108.8" r="5"/>
      <text class="ruta__codigo" x="390.3" y="71.9" text-anchor="start">+55</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="438.1" y2="148.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="438.1" y2="148.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="438.1" cy="148.5" r="5"/>
      <text class="ruta__codigo" x="468.4" y="120.2" text-anchor="start">+56</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="483.5" y2="208.6"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="483.5" y2="208.6" pathLength="100"/>
      <circle class="ruta__nodo" cx="483.5" cy="208.6" r="5"/>
      <text class="ruta__codigo" x="523.8" y="193.6" text-anchor="start">+57</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="504.1" y2="281.1"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="504.1" y2="281.1" pathLength="100"/>
      <circle class="ruta__nodo" cx="504.1" cy="281.1" r="5"/>
      <text class="ruta__codigo" x="548.9" y="281.9" text-anchor="start">+506</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="497.2" y2="356.1"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="497.2" y2="356.1" pathLength="100"/>
      <circle class="ruta__nodo" cx="497.2" cy="356.1" r="5"/>
      <text class="ruta__codigo" x="540.5" y="373.4" text-anchor="start">+503</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="463.6" y2="423.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="463.6" y2="423.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="463.6" cy="423.5" r="5"/>
      <text class="ruta__codigo" x="499.5" y="455.7" text-anchor="start">+34</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="407.9" y2="474.3"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="407.9" y2="474.3" pathLength="100"/>
      <circle class="ruta__nodo" cx="407.9" cy="474.3" r="5"/>
      <text class="ruta__codigo" x="431.6" y="517.6" text-anchor="start">+1</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="337.7" y2="501.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="337.7" y2="501.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="337.7" cy="501.5" r="5"/>
      <text class="ruta__codigo" x="345.9" y="550.7" text-anchor="middle">+502</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="262.3" y2="501.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="262.3" y2="501.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="262.3" cy="501.5" r="5"/>
      <text class="ruta__codigo" x="254.1" y="550.7" text-anchor="middle">+504</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="192.1" y2="474.3"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="192.1" y2="474.3" pathLength="100"/>
      <circle class="ruta__nodo" cx="192.1" cy="474.3" r="5"/>
      <text class="ruta__codigo" x="168.4" y="517.6" text-anchor="end">+52</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="136.4" y2="423.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="136.4" y2="423.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="136.4" cy="423.5" r="5"/>
      <text class="ruta__codigo" x="100.5" y="455.7" text-anchor="end">+505</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="102.8" y2="356.1"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="102.8" y2="356.1" pathLength="100"/>
      <circle class="ruta__nodo" cx="102.8" cy="356.1" r="5"/>
      <text class="ruta__codigo" x="59.5" y="373.4" text-anchor="end">+507</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="95.9" y2="281.1"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="95.9" y2="281.1" pathLength="100"/>
      <circle class="ruta__nodo" cx="95.9" cy="281.1" r="5"/>
      <text class="ruta__codigo" x="51.1" y="281.9" text-anchor="end">+51</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="116.5" y2="208.6"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="116.5" y2="208.6" pathLength="100"/>
      <circle class="ruta__nodo" cx="116.5" cy="208.6" r="5"/>
      <text class="ruta__codigo" x="76.2" y="193.6" text-anchor="end">+1939</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="161.9" y2="148.5"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="161.9" y2="148.5" pathLength="100"/>
      <circle class="ruta__nodo" cx="161.9" cy="148.5" r="5"/>
      <text class="ruta__codigo" x="131.6" y="120.2" text-anchor="end">+1849</text>
    </g>
    <g class="ruta">
      <line class="ruta__linea" x1="300" y1="300" x2="225.9" y2="108.8"/>
      <line class="ruta__pulso" x1="300" y1="300" x2="225.9" y2="108.8" pathLength="100"/>
      <circle class="ruta__nodo" cx="225.9" cy="108.8" r="5"/>
      <text class="ruta__codigo" x="209.7" y="71.9" text-anchor="end">+1868</text>
    </g>
    <circle class="orbita__centro-halo" cx="300" cy="300" r="46"/>
    <circle class="orbita__centro" cx="300" cy="300" r="34"/>
    <text class="orbita__centro-texto" x="300" y="307" text-anchor="middle">SMS</text>
  </svg>
</div>
--}}
