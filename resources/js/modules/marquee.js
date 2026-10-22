// Carrusel de marcas: botón de pausa.

export function initMarquee() {
  document.querySelectorAll('[data-marquee-toggle]').forEach((button) => {
    const section = button.closest('.marcas');
    button.hidden = false;
    button.addEventListener('click', () => {
      const paused = button.getAttribute('aria-pressed') !== 'true';
      button.setAttribute('aria-pressed', String(paused));
      section.classList.toggle('is-paused', paused);
    });
  });
}
