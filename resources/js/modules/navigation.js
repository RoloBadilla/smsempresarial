// Navegación: altura real (para --nav-h) y sombra al desplazarse.

export function initNavigation() {
  const nav = document.querySelector('.site-nav');
  if (!nav) return;

  // Se mide en el siguiente cuadro para no forzar un recálculo del layout durante la carga.
  const setNavHeight = () => requestAnimationFrame(() => document.documentElement.style.setProperty('--nav-h', `${nav.offsetHeight}px`));
  setNavHeight();
  window.addEventListener('resize', setNavHeight, { passive: true });

  const onScroll = () => nav.classList.toggle('is-scrolled', window.scrollY > 8);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
}
