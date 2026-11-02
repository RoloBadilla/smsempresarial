// Tema claro/oscuro: botón del menú y seguimiento de la preferencia del sistema.
// El tema inicial y las funciones compartidas vienen de js/inline/preferences.js (window.preferences).

export function initTheme() {
  const root = document.documentElement;
  const toggle = document.querySelector('[data-theme-toggle]');
  const { storedTheme, saveTheme } = window.preferences;

  const applyTheme = (theme) => {
    window.preferences.applyTheme(theme);
    if (toggle) toggle.setAttribute('aria-pressed', String(theme === 'dark'));
  };

  if (toggle) {
    toggle.hidden = false;
    applyTheme(root.dataset.theme === 'light' ? 'light' : 'dark');
    toggle.addEventListener('click', () => {
      const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
      applyTheme(next);
      saveTheme(next);
    });
  }

  // Si el usuario no ha elegido, seguimos la preferencia del sistema.
  window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', (event) => {
    if (!storedTheme()) applyTheme(event.matches ? 'light' : 'dark');
  });
}
