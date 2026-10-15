// Buscador de destinos (restaurado desde resources/site-pages/rutasytarifas.html).
(() => {
  const search = document.getElementById('country-search');
  const rows = [...document.querySelectorAll('#rate-rows tr')];
  const empty = document.getElementById('empty-results');

  if (!search) return;

  search.addEventListener('input', () => {
    const term = search.value.trim().toLocaleLowerCase('es');
    let count = 0;
    rows.forEach((row) => {
      const match = row.dataset.country.includes(term);
      row.hidden = !match;
      if (match) count += 1;
    });
    empty.hidden = count !== 0;
  });
})();
