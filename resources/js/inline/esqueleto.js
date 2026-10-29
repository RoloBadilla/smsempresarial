// Pantalla esqueleto: mientras la página carga, cada texto, imagen, ícono y botón se ve como un bloque gris
// con su misma forma y posición, así el esqueleto imita el diseño real de cada página sin dibujarlo aparte.
// No es un módulo de Vite: layouts/app.blade.php lo incrusta al final del <body> para que corra antes de pintar.
// Los estilos están en resources/css/esqueleto.css.
(function () {
  var root = document.documentElement;
  if (!root.classList.contains('cargando')) return;

  var SALTAR = { SCRIPT: 1, STYLE: 1, NOSCRIPT: 1, TEXTAREA: 1, OPTION: 1, SELECT: 1, TEMPLATE: 1 };

  // Cada texto se envuelve en <esq-l> (etiqueta propia: ningún estilo del sitio la toca), para que la barra
  // gris tenga el largo exacto de cada línea de texto.
  var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
    acceptNode: function (node) {
      var padre = node.parentElement;
      if (!padre || SALTAR[padre.tagName] || padre.closest('svg') || !node.nodeValue.trim()) return NodeFilter.FILTER_REJECT;
      return NodeFilter.FILTER_ACCEPT;
    },
  });
  var textos = [];
  while (walker.nextNode()) textos.push(walker.currentNode);
  textos.forEach(function (texto) {
    var barra = document.createElement('esq-l');
    texto.parentNode.insertBefore(barra, texto);
    barra.appendChild(texto);
  });

  var terminado = false;
  function terminar() {
    if (terminado) return;
    terminado = true;
    // Primero se desvanece el gris (transición del CSS) y después se quitan las etiquetas: el HTML queda como antes.
    root.classList.remove('cargando');
    setTimeout(function () {
      document.querySelectorAll('esq-l').forEach(function (barra) { barra.replaceWith.apply(barra, barra.childNodes); });
    }, 400);
  }

  // Con ?esqueleto en la dirección se queda fijo, para revisar cómo se ve.
  if (new URLSearchParams(location.search).has('esqueleto')) return;

  // Termina cuando cargaron imágenes y letras; nunca dura más de 4 s.
  window.addEventListener('load', function () {
    (document.fonts ? document.fonts.ready : Promise.resolve()).then(terminar, terminar);
  });
  setTimeout(terminar, 4000);
})();
