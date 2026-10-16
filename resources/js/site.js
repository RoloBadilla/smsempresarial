// Comportamiento compartido: tema claro/oscuro, revelado al hacer scroll,
// pausa del carrusel de marcas y altura de la navegación.
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
    const setNavHeight = () => root.style.setProperty('--nav-h', `${nav.offsetHeight}px`);
    setNavHeight();
    window.addEventListener('resize', setNavHeight, { passive: true });
    const onScroll = () => nav.classList.toggle('is-scrolled', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

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
  document.querySelectorAll(selectors).forEach((el) => {
    if (el.getBoundingClientRect().top < window.innerHeight) return;
    // En rejillas (.col > tarjeta) el escalonado se calcula por columna.
    const item = el.parentElement && el.parentElement.children.length === 1 ? el.parentElement : el;
    const siblings = item.parentElement ? [...item.parentElement.children] : [];
    const index = Math.max(0, siblings.indexOf(item));
    el.style.setProperty('--reveal-delay', `${(index % 3) * 70}ms`);
    el.setAttribute('data-reveal', '');
    observer.observe(el);
  });
})();
