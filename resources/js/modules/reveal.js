// Animación de revelado suave al hacer scroll.

const SELECTORS = [
  '.feature-heading', '.feature-card', '.feature-note', '.feature-cta',
  '.tarjeta', '.banda .row > *', '.reviews-card', '.section-heading',
  '.accordion-item', '.panel', '.card-panel', '.wa-card', '.contact-item',
].join(',');

export function initReveal() {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (reducedMotion.matches || !('IntersectionObserver' in window)) return;

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
    const below = [...document.querySelectorAll(SELECTORS)].filter((el) => el.getBoundingClientRect().top >= viewportHeight);
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
}
