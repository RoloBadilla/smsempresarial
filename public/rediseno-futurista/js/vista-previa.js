/*
  Solo para ver la propuesta en el navegador (Laragon: http://smsempresarial-rediseno.test/).
  Une layout.html + la página + partials, como lo hará Blade en el servidor.
  En Laravel este archivo se elimina: @extends, @section e @include hacen este trabajo
  y la página llega completa, sin ningún paso intermedio.

  Va como PRIMERA línea de cada página para que el contenido sin estilos nunca se pinte.
*/

// 1) Antes de que el navegador pinte nada: ocultar la página y usar el fondo del tema
(() => {
  let tema = null;
  try { tema = localStorage.getItem('sms-tema'); } catch (error) { /* modo privado */ }
  const claro = tema ? tema === 'claro' : matchMedia('(prefers-color-scheme: light)').matches;
  document.write(`<style>html{background:${claro ? '#F4F8FD' : '#0A1A3A'}}body{visibility:hidden}</style>`);
})();

// 2) Armar la página completa y reemplazar el documento
(async () => {
  const traer = (ruta) => fetch(ruta).then((respuesta) => {
    if (!respuesta.ok) throw new Error(`No se pudo cargar ${ruta}`);
    return respuesta.text();
  });

  // La página, el layout y los dos partials se piden a la vez
  const [pagina, layout, encabezado, pie] = await Promise.all([
    traer(location.pathname),
    traer('layout.html'),
    traer('partials/header.html'),
    traer('partials/footer.html'),
  ]);
  const parciales = { header: encabezado, footer: pie };

  const titulo = (pagina.match(/@section\('titulo', '([^']*)'\)/) || [])[1] || 'SMS Empresarial';
  const contenido = pagina
    .replace(/<script src="js\/vista-previa\.js[^"]*"><\/script>/, '')
    .replace(/<!-- @(extends|section)\([^)]*\) -->/g, '')
    .replace(/<!-- @include\('partials\.([a-z-]+)'\) -->/g, (marca, nombre) => parciales[nombre] ?? marca);

  const documento = layout
    .replace('<!-- TITULO -->', titulo)
    .replace('<!-- CONTENIDO -->', () => contenido);

  // Esperar a que termine de leerse la página original antes de reemplazarla
  if (document.readyState === 'loading') {
    await new Promise((listo) => document.addEventListener('DOMContentLoaded', listo, { once: true }));
  }

  document.open();
  document.write(documento);
  document.close();
})();
