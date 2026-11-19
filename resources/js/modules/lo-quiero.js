// Botón flotante "¡Lo quiero!": se esconde mientras se ve la portada (que ya tiene sus propios botones)
// o el pie de página, para no tapar títulos, botones ni datos de contacto. Sin JS queda siempre visible.

export function initLoQuiero() {
  const boton = document.querySelector('.lo-quiero-flotante');
  if (!boton || !('IntersectionObserver' in window)) return;

  const zonas = [...document.querySelectorAll('main header.hero, main header.page-hero, .footer-main, .footer')];
  if (!zonas.length) return;

  const visibles = new Set();
  const observer = new IntersectionObserver((entradas) => {
    entradas.forEach((e) => (e.isIntersecting ? visibles.add(e.target) : visibles.delete(e.target)));
    boton.classList.toggle('is-oculto', visibles.size > 0);
  });
  zonas.forEach((zona) => observer.observe(zona));
}
