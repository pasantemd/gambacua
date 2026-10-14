/** Selector accesible de dispensadores y consumibles. */
document.addEventListener('DOMContentLoaded', () => {
  const pestanas = document.querySelectorAll('.dispensador-tab');
  const paneles = document.querySelectorAll('.dispensador-panel');
  if (!pestanas.length || !paneles.length) return;

  paneles.forEach(panel => panel.querySelector('.dispensador-main-visual img')?.decode?.().catch(() => {}));

  function cambiarProducto(idObjetivo) {
    const pestanaActiva = document.querySelector('.dispensador-tab.is-active');
    if (pestanaActiva?.getAttribute('data-target') === idObjetivo) return;

    pestanas.forEach(pestana => {
      const esObjetivo = pestana.getAttribute('data-target') === idObjetivo;
      pestana.classList.toggle('is-active', esObjetivo);
      pestana.setAttribute('aria-selected', String(esObjetivo));
      pestana.setAttribute('tabindex', esObjetivo ? '0' : '-1');
    });

    paneles.forEach(panel => {
      const esObjetivo = panel.id === `panel-${idObjetivo}`;
      panel.toggleAttribute('hidden', !esObjetivo);
      panel.classList.toggle('is-active', esObjetivo);
    });
  }

  pestanas.forEach((pestana, indice) => {
    pestana.addEventListener('click', () => {
      const idObjetivo = pestana.getAttribute('data-target');
      if (idObjetivo) cambiarProducto(idObjetivo);
    });

    pestana.addEventListener('keydown', evento => {
      let siguiente = null;
      if (evento.key === 'ArrowRight' || evento.key === 'ArrowDown') siguiente = (indice + 1) % pestanas.length;
      else if (evento.key === 'ArrowLeft' || evento.key === 'ArrowUp') siguiente = (indice - 1 + pestanas.length) % pestanas.length;
      else if (evento.key === 'Home') siguiente = 0;
      else if (evento.key === 'End') siguiente = pestanas.length - 1;
      if (siguiente === null) return;

      evento.preventDefault();
      pestanas[siguiente].focus();
      const idObjetivo = pestanas[siguiente].getAttribute('data-target');
      if (idObjetivo) cambiarProducto(idObjetivo);
    });
  });
});
