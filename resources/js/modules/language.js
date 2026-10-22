// Idioma español / inglés: botón ES/EN y traducción de la página.
// El idioma inicial (root.lang) lo decide js/inline/preferences.js antes de pintar.
// public/lang/en.json usa el texto en español como clave, igual que lang/en.json de Laravel.

export const isEnglish = () => document.documentElement.lang === 'en';

const normalize = (text) => text.replace(/\s+/g, ' ').trim();

function translate(dictionary, langToggle) {
  const walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, {
    acceptNode: (node) => (node.parentElement.closest('script, style') ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT),
  });
  const nodes = [];
  while (walker.nextNode()) nodes.push(walker.currentNode);
  nodes.forEach((node) => {
    const translation = dictionary[normalize(node.nodeValue)];
    if (translation === undefined) return;
    const [, before, , after] = node.nodeValue.match(/^(\s*)([\s\S]*?)(\s*)$/);
    node.nodeValue = before + translation + after;
  });

  ['alt', 'aria-label', 'placeholder', 'title'].forEach((attribute) => {
    document.querySelectorAll(`body [${attribute}]`).forEach((el) => {
      if (el === langToggle) return;
      const translation = dictionary[normalize(el.getAttribute(attribute))];
      if (translation !== undefined) el.setAttribute(attribute, translation);
    });
  });

  const title = dictionary[normalize(document.title)];
  if (title) document.title = title;
}

export function initLanguage() {
  const root = document.documentElement;
  const english = isEnglish();
  const langToggle = document.querySelector('[data-lang-toggle]');

  if (langToggle) {
    const label = english ? 'Ver en español' : 'View in English';
    langToggle.textContent = english ? 'ES' : 'EN';
    langToggle.lang = english ? 'es' : 'en';
    langToggle.title = label;
    langToggle.setAttribute('aria-label', label);
    langToggle.hidden = false;
    langToggle.addEventListener('click', () => {
      langToggle.classList.add('is-loading');
      window.preferences.saveLanguage(english ? 'es' : 'en');
      // Recarga con ?lang= para que funcione aunque no haya almacenamiento.
      const url = new URL(window.location.href);
      url.searchParams.set('lang', english ? 'es' : 'en');
      window.location.replace(url.toString());
    });

    // Al volver con "Atrás", el navegador restaura la página tal cual: se quita el estado de carga.
    window.addEventListener('pageshow', (event) => {
      if (event.persisted) langToggle.classList.remove('is-loading');
    });
  }

  if (english) {
    fetch(document.querySelector('meta[name="diccionario-en"]').content)
      .then((response) => response.json())
      .then((dictionary) => translate(dictionary, langToggle))
      .catch(() => { /* si falla, la página queda en español */ })
      .finally(() => root.classList.remove('traduciendo'));
  }
}
