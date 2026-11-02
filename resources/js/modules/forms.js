// Formularios: estado de carga al enviar.
// El botón muestra "Enviando…" y no se puede pulsar dos veces. Solo se activa si el navegador
// ya validó los campos (el evento submit no llega si falta alguno).

import { isEnglish } from './language';

export function initForms() {
  document.querySelectorAll('form[data-loading-text]').forEach((form) => {
    const button = form.querySelector('[type="submit"]');
    if (!button) return;

    let original = null;
    form.addEventListener('submit', () => {
      original = button.innerHTML;
      button.classList.add('is-loading');
      button.setAttribute('aria-busy', 'true');
      button.textContent = isEnglish() ? form.dataset.loadingTextEn || 'Sending…' : form.dataset.loadingText;
    });

    // Al volver con "Atrás", el navegador restaura la página tal cual: se devuelve el botón a su estado normal.
    window.addEventListener('pageshow', (event) => {
      if (!event.persisted || original === null) return;
      button.classList.remove('is-loading');
      button.removeAttribute('aria-busy');
      button.innerHTML = original;
    });
  });
}
