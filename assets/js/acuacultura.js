(() => {
  const visor = document.querySelector('.acuacultura-visor');
  if (!visor || typeof visor.showModal !== 'function') return;
  const contenedor = visor.querySelector('.acuacultura-visor-imagen');
  const imagenVisor = contenedor.querySelector('img');
  const menos = visor.querySelector('[data-zoom-menos]');
  const mas = visor.querySelector('[data-zoom-mas]');
  const restablecer = visor.querySelector('[data-zoom-restablecer]');
  const valor = visor.querySelector('[data-zoom-valor]');
  const escalas = [1, 1.5, 2, 3];
  let nivel = 0;
  let origen;
  let arrastre;
  const actualizarZoom = () => {
    const escala = escalas[nivel];
    contenedor.classList.toggle('is-zoomed', nivel > 0);
    imagenVisor.style.width = nivel ? `${escala * 100}%` : '';
    valor.value = `${escala * 100}%`;
    menos.disabled = nivel === 0;
    mas.disabled = nivel === escalas.length - 1;
    restablecer.disabled = nivel === 0;
  };
  menos.addEventListener('click', () => { nivel = Math.max(0, nivel - 1); actualizarZoom(); });
  mas.addEventListener('click', () => { nivel = Math.min(escalas.length - 1, nivel + 1); actualizarZoom(); });
  restablecer.addEventListener('click', () => { nivel = 0; actualizarZoom(); });
  contenedor.addEventListener('pointerdown', evento => {
    if (nivel === 0 || evento.pointerType !== 'mouse' || evento.button !== 0) return;
    arrastre = { x: evento.clientX, y: evento.clientY, izquierda: contenedor.scrollLeft, arriba: contenedor.scrollTop };
    contenedor.setPointerCapture(evento.pointerId);
    contenedor.classList.add('is-dragging');
    evento.preventDefault();
  });
  contenedor.addEventListener('pointermove', evento => {
    if (!arrastre) return;
    contenedor.scrollLeft = arrastre.izquierda + arrastre.x - evento.clientX;
    contenedor.scrollTop = arrastre.arriba + arrastre.y - evento.clientY;
  });
  const terminarArrastre = evento => {
    if (!arrastre) return;
    arrastre = null;
    contenedor.classList.remove('is-dragging');
    if (contenedor.hasPointerCapture(evento.pointerId)) contenedor.releasePointerCapture(evento.pointerId);
  };
  contenedor.addEventListener('pointerup', terminarArrastre);
  contenedor.addEventListener('pointercancel', terminarArrastre);
  imagenVisor.addEventListener('dragstart', evento => evento.preventDefault());
  visor.addEventListener('keydown', evento => {
    if (['+', '='].includes(evento.key)) { evento.preventDefault(); mas.click(); }
    if (evento.key === '-') { evento.preventDefault(); menos.click(); }
    if (evento.key === '0') { evento.preventDefault(); restablecer.click(); }
  });
  document.querySelectorAll('.acuacultura-ampliar, .acuacultura-figura a').forEach(enlace => {
    enlace.addEventListener('click', evento => {
      if (evento.ctrlKey || evento.metaKey || evento.shiftKey || evento.altKey) return;
      evento.preventDefault();
      origen = enlace;
      visor.toggleAttribute('data-entrada-suave', evento.detail > 0);
      const imagen = enlace.querySelector('img');
      imagenVisor.src = enlace.href;
      imagenVisor.alt = imagen.alt;
      visor.querySelector('h2').textContent = imagen.alt;
      nivel = 0;
      actualizarZoom();
      contenedor.scrollTo(0, 0);
      visor.showModal();
      document.documentElement.classList.add('acuacultura-visor-abierto');
    });
  });
  visor.querySelector('[data-cerrar-visor]').addEventListener('click', () => visor.close());
  visor.addEventListener('click', evento => {
    if (evento.target !== visor) return;
    const borde = visor.getBoundingClientRect();
    if (evento.clientX < borde.left || evento.clientX > borde.right || evento.clientY < borde.top || evento.clientY > borde.bottom) visor.close();
  });
  visor.addEventListener('close', () => {
    arrastre = null;
    contenedor.classList.remove('is-dragging');
    document.documentElement.classList.remove('acuacultura-visor-abierto');
    origen?.focus({ preventScroll: true });
  });
})();
