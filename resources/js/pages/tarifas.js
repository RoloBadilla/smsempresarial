// Tarifas: calculadora de WhatsApp y acordeón de tipos de mensaje con su ejemplo en el teléfono.

// Calculadora: suma cantidad × precio de cada campo visible (los precios vienen de data-precio, desde config/tarifas.php).
(() => {
  const form = document.getElementById('wa-calc');
  if (!form) return;

  const iva = Number(form.dataset.iva) / 100;
  const modes = [...form.querySelectorAll('.wa-calc-campos')];
  const output = {
    subtotal: form.querySelector('[data-subtotal]'),
    iva: form.querySelector('[data-iva]'),
    total: form.querySelector('[data-total]'),
  };
  const money = (value) => value.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  const amount = (field) => {
    if (field.type === 'checkbox') return field.checked ? 1 : 0;
    return Math.max(0, Math.floor(Number(field.value) || 0));
  };

  const update = () => {
    let subtotal = 0;
    // Cada grupo muestra su propio total; el total general solo suma el modo visible (API oficial o Business Web).
    form.querySelectorAll('.wa-calc-grupo').forEach((group) => {
      let groupTotal = 0;
      group.querySelectorAll('[data-precio]').forEach((field) => {
        groupTotal += amount(field) * Number(field.dataset.precio);
      });
      group.querySelector('[data-grupo-total]').textContent = money(groupTotal);
      if (!group.closest('.wa-calc-campos').hidden) subtotal += groupTotal;
    });
    const tax = subtotal * iva;
    output.subtotal.textContent = money(subtotal);
    output.iva.textContent = money(tax);
    output.total.textContent = money(subtotal + tax);
  };

  const showMode = (mode) => {
    modes.forEach((group) => { group.hidden = group.dataset.modo !== mode; });
  };

  form.addEventListener('input', (event) => {
    const field = event.target;
    // La barra y el campo de cada tipo de mensaje muestran la misma cantidad.
    if (field.dataset.rangoDe) {
      document.getElementById(field.dataset.rangoDe).value = field.value;
    } else if (field.type === 'number') {
      const range = form.querySelector(`[data-rango-de="${field.id}"]`);
      if (range) range.value = Math.min(amount(field), Number(range.max));
    }
    update();
  });
  form.addEventListener('change', (event) => {
    if (event.target.name === 'modo') showMode(event.target.value);
    update();
  });
  form.querySelector('[data-reset]').addEventListener('click', () => {
    const mode = form.querySelector('[name="modo"]:checked').value;
    form.reset();
    form.querySelector(`[name="modo"][value="${mode}"]`).checked = true;
    update();
  });
  form.addEventListener('submit', (event) => event.preventDefault());
  update();
})();

// Paquetes de SMS en celular: "Ver más" muestra el precio por SMS y el adicional de ese paquete.
document.querySelectorAll('.pt-boton').forEach((button) => {
  button.addEventListener('click', () => {
    const open = button.getAttribute('aria-expanded') !== 'true';
    button.setAttribute('aria-expanded', String(open));
    button.closest('tr').classList.toggle('abierto', open);
  });
});

// WhatsApp en celular: "Más información" muestra la nota del número exclusivo y la cuenta verificada.
document.querySelectorAll('.wa-nota-boton').forEach((button) => {
  button.addEventListener('click', () => {
    const open = button.getAttribute('aria-expanded') !== 'true';
    button.setAttribute('aria-expanded', String(open));
    document.getElementById(button.getAttribute('aria-controls')).classList.toggle('abierta', open);
  });
});

// Acordeón de tipos de mensaje: se abre uno a la vez y se cierra tocándolo otra vez.
// El teléfono muestra el chat de ejemplo del tipo abierto: en escritorio va a la derecha y en celular
// se mueve dentro del tipo abierto, para que el ejemplo se vea junto a su texto.
(() => {
  const accordion = document.getElementById('wa-acordeon');
  if (!accordion) return;

  const buttons = [...accordion.querySelectorAll('button[data-tipo]')];
  const chats = [...document.querySelectorAll('.wa-chat')];
  const scene = document.querySelector('.wa-escena');
  const sceneHome = scene?.parentElement;
  const mobile = window.matchMedia('(max-width: 991.98px)');

  const placeScene = () => {
    if (!scene) return;
    const openButton = buttons.find((button) => button.getAttribute('aria-expanded') === 'true');
    const panel = openButton && document.getElementById(openButton.getAttribute('aria-controls'));
    if (mobile.matches && panel) panel.append(scene);
    else sceneHome.append(scene);
  };

  const toggle = (button) => {
    const opening = button.getAttribute('aria-expanded') !== 'true';
    buttons.forEach((other) => {
      const active = opening && other === button;
      other.setAttribute('aria-expanded', String(active));
      document.getElementById(other.getAttribute('aria-controls')).hidden = !active;
    });
    // Al cerrar, el teléfono se queda con el último ejemplo.
    if (opening) chats.forEach((chat) => { chat.hidden = chat.dataset.chat !== button.dataset.tipo; });
    placeScene();
  };

  buttons.forEach((button) => button.addEventListener('click', () => toggle(button)));
  mobile.addEventListener('change', placeScene);
  placeScene();
})();

/*
VERSIÓN ANTERIOR (hasta noviembre 2026): SMS a Costa Rica y a otros países, con tabla de tarifas por destino. Se deja comentada por si hay que volver a ella.
Para volver a ella: reemplazar todo lo de arriba por lo que sigue.

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
*/
