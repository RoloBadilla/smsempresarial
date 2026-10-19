// Comportamiento compartido: tema claro/oscuro, revelado al hacer scroll,
// pausa del carrusel de marcas y altura de la navegación.

// Solo el "collapse" de Bootstrap (menú móvil y acordeón de FAQ), no el bundle completo.
import 'bootstrap/js/dist/collapse';

(() => {
  const root = document.documentElement;
  const THEME_KEY = 'tema';
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

  // ----- Tema -----
  const toggle = document.querySelector('[data-theme-toggle]');
  const storedTheme = () => {
    try {
      return localStorage.getItem(THEME_KEY);
    } catch {
      return null;
    }
  };
  const applyTheme = (theme) => {
    root.dataset.theme = theme;
    root.setAttribute('data-bs-theme', theme);
    if (toggle) toggle.setAttribute('aria-pressed', String(theme === 'dark'));
  };

  if (toggle) {
    toggle.hidden = false;
    applyTheme(root.dataset.theme === 'light' ? 'light' : 'dark');
    toggle.addEventListener('click', () => {
      const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
      applyTheme(next);
      try {
        localStorage.setItem(THEME_KEY, next);
      } catch {
        // Sin almacenamiento disponible: el cambio dura solo esta visita.
      }
    });
  }

  // Si el usuario no ha elegido, seguimos la preferencia del sistema.
  window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', (event) => {
    const saved = storedTheme();
    if (saved !== 'light' && saved !== 'dark') applyTheme(event.matches ? 'light' : 'dark');
  });

  // ----- Navegación: altura real y sombra al desplazarse -----
  const nav = document.querySelector('.site-nav');
  if (nav) {
    // Se mide en el siguiente cuadro para no forzar un recálculo del layout durante la carga.
    const setNavHeight = () => requestAnimationFrame(() => root.style.setProperty('--nav-h', `${nav.offsetHeight}px`));
    setNavHeight();
    window.addEventListener('resize', setNavHeight, { passive: true });
    const onScroll = () => nav.classList.toggle('is-scrolled', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // ----- Idioma español / inglés -----
  // public/lang/en.json usa el texto en español como clave, igual que lang/en.json de Laravel.
  const isEnglish = root.lang === 'en';
  const langToggle = document.querySelector('[data-lang-toggle]');

  if (langToggle) {
    const label = isEnglish ? 'Ver en español' : 'View in English';
    langToggle.textContent = isEnglish ? 'ES' : 'EN';
    langToggle.lang = isEnglish ? 'es' : 'en';
    langToggle.title = label;
    langToggle.setAttribute('aria-label', label);
    langToggle.hidden = false;
    langToggle.addEventListener('click', () => {
      langToggle.classList.add('is-loading');
      try {
        localStorage.setItem('idioma', isEnglish ? 'es' : 'en');
      } catch {
        // Sin almacenamiento: se usa ?lang= para esta visita.
      }
      // Recarga con ?lang= para que funcione aunque no haya almacenamiento.
      const url = new URL(window.location.href);
      url.searchParams.set('lang', isEnglish ? 'es' : 'en');
      window.location.replace(url.toString());
    });
  }

  const normalize = (text) => text.replace(/\s+/g, ' ').trim();
  const translate = (dictionary) => {
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
  };

  if (isEnglish) {
    fetch(document.querySelector('meta[name="diccionario-en"]').content)
      .then((response) => response.json())
      .then(translate)
      .catch(() => { /* si falla, la página queda en español */ })
      .finally(() => root.classList.remove('traduciendo'));
  }

  // ----- Formularios: estado de carga al enviar -----
  // El botón muestra "Enviando…" y no se puede pulsar dos veces. Solo se activa si el navegador
  // ya validó los campos (el evento submit no llega si falta alguno).
  document.querySelectorAll('form[data-loading-text]').forEach((form) => {
    const button = form.querySelector('[type="submit"]');
    if (!button) return;
    let original = null;
    form.addEventListener('submit', () => {
      original = button.innerHTML;
      button.classList.add('is-loading');
      button.setAttribute('aria-busy', 'true');
      button.textContent = isEnglish ? form.dataset.loadingTextEn || 'Sending…' : form.dataset.loadingText;
    });
    // Al volver con "Atrás", el navegador restaura la página tal cual: se devuelve el botón a su estado normal.
    window.addEventListener('pageshow', (event) => {
      if (!event.persisted || original === null) return;
      button.classList.remove('is-loading');
      button.removeAttribute('aria-busy');
      button.innerHTML = original;
    });
  });
  window.addEventListener('pageshow', (event) => {
    if (event.persisted && langToggle) langToggle.classList.remove('is-loading');
  });

  // ----- Carrusel de marcas: botón de pausa -----
  document.querySelectorAll('[data-marquee-toggle]').forEach((button) => {
    const section = button.closest('.marcas');
    button.hidden = false;
    button.addEventListener('click', () => {
      const paused = button.getAttribute('aria-pressed') !== 'true';
      button.setAttribute('aria-pressed', String(paused));
      section.classList.toggle('is-paused', paused);
    });
  });

  // ----- Revelado suave al hacer scroll -----
  if (reducedMotion.matches || !('IntersectionObserver' in window)) return;

  const selectors = [
    '.feature-heading', '.feature-card', '.feature-note', '.feature-cta',
    '.tarjeta', '.banda .row > *', '.reviews-card', '.section-heading',
    '.accordion-item', '.panel', '.card-panel', '.wa-card', '.contact-item',
  ].join(',');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      const el = entry.target;
      el.classList.add('is-visible');
      observer.unobserve(el);
      // Al terminar, quitamos el estado para no interferir con los efectos hover.
      window.setTimeout(() => {
        el.removeAttribute('data-reveal');
        el.classList.remove('is-visible');
        el.style.removeProperty('--reveal-delay');
      }, 900);
    });
  }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });

  // Solo se anima lo que está fuera de la pantalla inicial (evita parpadeos).
  // Primero se leen todas las posiciones y después se escribe: así el layout se calcula una sola vez.
  requestAnimationFrame(() => {
    const viewportHeight = window.innerHeight;
    const below = [...document.querySelectorAll(selectors)].filter((el) => el.getBoundingClientRect().top >= viewportHeight);
    below.forEach((el) => {
      // En rejillas (.col > tarjeta) el escalonado se calcula por columna.
      const item = el.parentElement && el.parentElement.children.length === 1 ? el.parentElement : el;
      const siblings = item.parentElement ? [...item.parentElement.children] : [];
      const index = Math.max(0, siblings.indexOf(item));
      el.style.setProperty('--reveal-delay', `${(index % 3) * 70}ms`);
      el.setAttribute('data-reveal', '');
      observer.observe(el);
    });
  });
})();
