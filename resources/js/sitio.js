const raiz = document.documentElement;
raiz.classList.add('js');

const guardarPreferencia = (clave, valor) => {
  try { localStorage.setItem(clave, valor); } catch (error) { /* modo privado: no se recuerda */ }
};

// Textos de los botones de ajustes (no dependen del diccionario para funcionar sin él)
const TEXTOS_AJUSTES = {
  es: { claro: 'Modo claro', oscuro: 'Modo oscuro', otroIdioma: 'View in English', codigo: 'EN', codigoLang: 'en' },
  en: { claro: 'Light mode', oscuro: 'Dark mode', otroIdioma: 'Ver en español', codigo: 'ES', codigoLang: 'es' },
};
const idiomaActual = () => (raiz.dataset.idioma === 'en' ? 'en' : 'es');

// ---------- Tema claro / oscuro ----------
const botonTema = document.querySelector('[data-cambiar-tema]');
const metaColor = document.querySelector('meta[name="theme-color"]');

const pintarBotonTema = () => {
  const textos = TEXTOS_AJUSTES[idiomaActual()];
  const esClaro = raiz.dataset.tema === 'claro';
  // La etiqueta dice a qué modo se cambia al pulsar
  botonTema?.setAttribute('aria-label', esClaro ? textos.oscuro : textos.claro);
  botonTema?.setAttribute('title', esClaro ? textos.oscuro : textos.claro);
  metaColor?.setAttribute('content', esClaro ? '#F4F8FD' : '#0A1A3A');
};

botonTema?.addEventListener('click', () => {
  raiz.dataset.tema = raiz.dataset.tema === 'claro' ? 'oscuro' : 'claro';
  guardarPreferencia('sms-tema', raiz.dataset.tema);
  pintarBotonTema();
});

// ---------- Idioma español / inglés ----------
// public/lang/en.json usa el texto en español como clave, igual que lang/en.json de Laravel.
const botonIdioma = document.querySelector('[data-cambiar-idioma]');

const pintarBotonIdioma = () => {
  const textos = TEXTOS_AJUSTES[idiomaActual()];
  if (!botonIdioma) return;
  botonIdioma.textContent = textos.codigo;
  botonIdioma.setAttribute('aria-label', textos.otroIdioma);
  botonIdioma.setAttribute('title', textos.otroIdioma);
  botonIdioma.setAttribute('lang', textos.codigoLang);
};

const normalizar = (texto) => texto.replace(/\s+/g, ' ').trim();

const traducir = (diccionario) => {
  const recorrido = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
    acceptNode: (nodo) => (nodo.parentElement.closest('script, style') ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT),
  });
  const nodos = [];
  while (recorrido.nextNode()) nodos.push(recorrido.currentNode);

  nodos.forEach((nodo) => {
    const traduccion = diccionario[normalizar(nodo.nodeValue)];
    if (traduccion === undefined) return;
    const [, antes, , despues] = nodo.nodeValue.match(/^(\s*)([\s\S]*?)(\s*)$/);
    nodo.nodeValue = antes + traduccion + despues;
  });

  ['alt', 'aria-label', 'placeholder', 'title'].forEach((atributo) => {
    document.querySelectorAll(`[${atributo}]`).forEach((elemento) => {
      if (elemento.closest('.ajustes')) return;
      const traduccion = diccionario[normalizar(elemento.getAttribute(atributo))];
      if (traduccion !== undefined) elemento.setAttribute(atributo, traduccion);
    });
  });

  const titulo = diccionario[normalizar(document.title)];
  if (titulo) document.title = titulo;
};

const terminarTraduccion = () => raiz.classList.remove('traduciendo');

if (idiomaActual() === 'en') {
  fetch(document.querySelector('meta[name="diccionario-en"]').content)
    .then((respuesta) => respuesta.json())
    .then(traducir)
    .catch(() => { /* si falla, la página queda en español */ })
    .finally(terminarTraduccion);
}

botonIdioma?.addEventListener('click', () => {
  const nuevo = idiomaActual() === 'en' ? 'es' : 'en';
  guardarPreferencia('sms-idioma', nuevo);
  // Recarga sin ?lang= para que mande lo recién elegido
  const url = new URL(location.href);
  url.searchParams.delete('lang');
  location.replace(url.toString());
});

pintarBotonTema();
pintarBotonIdioma();

// Preguntas frecuentes: al abrir una se cierra la que estaba abierta.
// Los navegadores nuevos ya lo hacen con name="preguntas"; esto cubre a los anteriores.
const preguntas = document.querySelectorAll('.pregunta');
preguntas.forEach((pregunta) => {
  pregunta.addEventListener('toggle', () => {
    if (!pregunta.open) return;
    preguntas.forEach((otra) => {
      if (otra !== pregunta) otra.open = false;
    });
  });
});

// Animaciones que muestran datos (medidor del 99%, líneas de la lista):
// se activan una sola vez cuando entran en pantalla
const revelables = document.querySelectorAll('[data-revelar]');
const sinMovimiento = matchMedia('(prefers-reduced-motion: reduce)').matches;

if (sinMovimiento || !('IntersectionObserver' in window)) {
  revelables.forEach((elemento) => elemento.classList.add('revelado'));
} else {
  const observador = new IntersectionObserver((entradas) => {
    entradas.forEach((entrada) => {
      if (entrada.isIntersecting) {
        entrada.target.classList.add('revelado');
        observador.unobserve(entrada.target);
      }
    });
  }, { threshold: 0.25 });
  revelables.forEach((elemento) => observador.observe(elemento));
}

// Menú en móvil
const botonMenu = document.querySelector('.encabezado__menu-boton');
const menu = document.getElementById('menu-principal');

if (botonMenu && menu) {
  botonMenu.addEventListener('click', () => {
    const abierto = botonMenu.getAttribute('aria-expanded') === 'true';
    botonMenu.setAttribute('aria-expanded', String(!abierto));
    menu.classList.toggle('menu--abierto', !abierto);
  });

  document.addEventListener('keydown', (evento) => {
    if (evento.key === 'Escape' && botonMenu.getAttribute('aria-expanded') === 'true') {
      botonMenu.setAttribute('aria-expanded', 'false');
      menu.classList.remove('menu--abierto');
      botonMenu.focus();
    }
  });
}

// Contáctenos: muestra "¿Cuál Otro?" cuando se elige la opción Otro
const medios = document.getElementById('medios');
const campoOtro = document.getElementById('campo-otro');

if (medios && campoOtro) {
  medios.addEventListener('change', () => {
    const esOtro = medios.options[medios.selectedIndex].text.trim().toLowerCase() === 'otro';
    campoOtro.hidden = !esOtro;
    document.getElementById('otro').required = esOtro;
  });
}
