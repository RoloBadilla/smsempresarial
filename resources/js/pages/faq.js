(() => {
      const input = document.getElementById('faqSearch');
      const count = document.getElementById('faqSearchCount');
      const empty = document.getElementById('faqEmpty');
      const items = [...document.querySelectorAll('#faqAccordion .accordion-item')];
      const normalize = (value) => value.toLocaleLowerCase('es').normalize('NFD').replace(/[̀-ͯ]/g, '');

      input.addEventListener('input', () => {
        const query = normalize(input.value.trim());
        let visible = 0;
        items.forEach((item) => {
          const matches = normalize(item.textContent).includes(query);
          item.hidden = !matches;
          if (matches) visible += 1;
        });
        empty.hidden = visible !== 0;
        const english = document.documentElement.lang === 'en';
        const found = english
          ? (visible === 1 ? 'result found' : 'results found')
          : (visible === 1 ? 'resultado encontrado' : 'resultados encontrados');
        count.textContent = query
          ? `${visible} ${found}`
          : `${items.length} ${english ? 'questions available' : 'preguntas disponibles'}`;
      });

      // Estado vacío: "Limpiar búsqueda" vuelve a mostrar todas las preguntas.
      empty.querySelector('[data-empty-clear]').addEventListener('click', () => {
        input.value = '';
        input.dispatchEvent(new Event('input'));
        input.focus();
      });
    })();
