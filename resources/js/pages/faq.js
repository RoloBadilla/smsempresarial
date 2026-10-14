(() => {
      const input = document.getElementById('faqSearch');
      const count = document.getElementById('faqSearchCount');
      const empty = document.getElementById('faqEmpty');
      const items = [...document.querySelectorAll('#faqAccordion .accordion-item')];
      const normalize = (value) => value.toLocaleLowerCase('es').normalize('NFD').replace(/[\u0300-\u036f]/g, '');

      input.addEventListener('input', () => {
        const query = normalize(input.value.trim());
        let visible = 0;
        items.forEach((item) => {
          const matches = normalize(item.textContent).includes(query);
          item.hidden = !matches;
          if (matches) visible += 1;
        });
        empty.hidden = visible !== 0;
        count.textContent = query
          ? `${visible} ${visible === 1 ? 'resultado encontrado' : 'resultados encontrados'}`
          : `${items.length} preguntas disponibles`;
      });
    })();