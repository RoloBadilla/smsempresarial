/*
  Se carga en el <head> (sin defer) para aplicar tema e idioma antes de pintar la página.
  - Tema: lo que el usuario eligió antes; si nunca eligió, el del sistema.
  - Idioma: ?lang=en|es en la URL, o lo que eligió antes; por defecto español.
*/
(() => {
  const raiz = document.documentElement;
  const leer = (clave) => {
    try { return localStorage.getItem(clave); } catch (error) { return null; }
  };
  const guardar = (clave, valor) => {
    try { localStorage.setItem(clave, valor); } catch (error) { /* modo privado: no se recuerda */ }
  };

  const temaGuardado = leer('sms-tema');
  raiz.dataset.tema = temaGuardado || (matchMedia('(prefers-color-scheme: light)').matches ? 'claro' : 'oscuro');

  const idiomaUrl = new URLSearchParams(location.search).get('lang');
  if (idiomaUrl === 'en' || idiomaUrl === 'es') guardar('sms-idioma', idiomaUrl);
  const idioma = idiomaUrl === 'en' || idiomaUrl === 'es' ? idiomaUrl : leer('sms-idioma') || 'es';
  raiz.dataset.idioma = idioma;

  if (idioma === 'en') {
    raiz.lang = 'en';
    // Oculta la página mientras llega la traducción; nunca más de 2 s
    raiz.classList.add('traduciendo');
    setTimeout(() => raiz.classList.remove('traduciendo'), 2000);
  }
})();
