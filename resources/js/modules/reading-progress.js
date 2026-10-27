// Barra de progreso de lectura: muestra cuánto de la página ya se recorrió.

export function initReadingProgress() {
  const bar = document.querySelector('.reading-progress');
  if (!bar) return;

  let pending = false;

  const update = () => {
    pending = false;
    const scrollable = document.documentElement.scrollHeight - window.innerHeight;
    const progress = scrollable > 0 ? Math.min(1, Math.max(0, window.scrollY / scrollable)) : 0;
    bar.style.setProperty('--progreso', `${(progress * 100).toFixed(2)}%`);
    bar.classList.toggle('is-active', progress > 0.005);
  };

  // Se agrupan los eventos en un solo cálculo por cuadro.
  const schedule = () => {
    if (pending) return;
    pending = true;
    requestAnimationFrame(update);
  };

  window.addEventListener('scroll', schedule, { passive: true });
  window.addEventListener('resize', schedule, { passive: true });
  // El alto de la página cambia cuando cargan imágenes o se abre el acordeón de FAQ.
  if ('ResizeObserver' in window) new ResizeObserver(schedule).observe(document.body);
  update();
}
