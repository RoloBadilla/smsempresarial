// Buscador de destinos de la tabla de rutas y tarifas.
(() => {
  const search = document.getElementById('country-search');
  const rows = [...document.querySelectorAll('#rate-rows tr')];
  const empty = document.getElementById('empty-results');
  const table = document.getElementById('rate-table');
  const note = table?.parentElement.querySelector('.table-note');

  if (!search) return;

  search.addEventListener('input', () => {
    const term = search.value.trim().toLocaleLowerCase('es');
    let count = 0;
    rows.forEach((row) => {
      // También busca en el texto visible, para que funcione con los nombres en inglés.
      const match = `${row.dataset.country} ${row.textContent.toLocaleLowerCase()}`.includes(term);
      row.hidden = !match;
      if (match) count += 1;
    });
    // Sin resultados: se oculta la tabla vacía y se muestra el estado vacío.
    empty.hidden = count !== 0;
    if (table) table.hidden = count === 0;
    if (note) note.hidden = count === 0;
  });

  empty.querySelector('[data-empty-clear]').addEventListener('click', () => {
    search.value = '';
    search.dispatchEvent(new Event('input'));
    search.focus();
  });
})();
