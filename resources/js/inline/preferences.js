// Preferencias de tema e idioma: única fuente de esta lógica.
// No es un módulo de Vite: layouts/app.blade.php lo incrusta tal cual en <head> para que se ejecute
// antes de pintar (sin parpadeo). Los módulos theme.js y language.js usan window.preferences.
(function () {
  var root = document.documentElement;
  var THEME_KEY = 'tema';
  var LANG_KEY = 'idioma';

  function read(key) {
    try { return localStorage.getItem(key); } catch (e) { return null; }
  }
  function save(key, value) {
    // Sin almacenamiento disponible: la elección dura solo esta visita.
    try { localStorage.setItem(key, value); } catch (e) {}
  }

  function storedTheme() {
    var theme = read(THEME_KEY);
    return theme === 'light' || theme === 'dark' ? theme : null;
  }
  function systemTheme() {
    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
  }
  function applyTheme(theme) {
    root.setAttribute('data-theme', theme);
    root.setAttribute('data-bs-theme', theme);
  }

  // ?lang=en|es en la URL manda (y se recuerda); si no, el elegido antes; por defecto español.
  function initialLanguage() {
    var lang = new URLSearchParams(location.search).get('lang');
    if (lang === 'en' || lang === 'es') {
      save(LANG_KEY, lang);
      return lang;
    }
    return read(LANG_KEY) === 'en' ? 'en' : 'es';
  }

  // Tema: elección guardada, si no la del sistema.
  applyTheme(storedTheme() || systemTheme());
  if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) root.classList.add('motion-ok');

  if (initialLanguage() === 'en') {
    root.lang = 'en';
    // Oculta la página mientras llega la traducción; nunca más de 2 s.
    root.classList.add('traduciendo');
    setTimeout(function () { root.classList.remove('traduciendo'); }, 2000);
  }

  window.preferences = {
    storedTheme: storedTheme,
    applyTheme: applyTheme,
    saveTheme: function (theme) { save(THEME_KEY, theme); },
    saveLanguage: function (lang) { save(LANG_KEY, lang); },
  };
})();
