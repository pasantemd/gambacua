/** Interacción de hitos y aparición de la línea de tiempo. */
document.addEventListener('DOMContentLoaded', () => {
const tarjetas = document.querySelectorAll('.timeline-card');
  tarjetas.forEach(tarjeta => {
    tarjeta.addEventListener('click', () => {
      tarjetas.forEach(elemento => {
        const activa = elemento === tarjeta;
        elemento.classList.toggle('is-active', activa);
        if (elemento.hasAttribute('aria-pressed')) elemento.setAttribute('aria-pressed', String(activa));
      });
    });
  });

const lineaTiempo = document.querySelector('.history-timeline-section');
  if (!lineaTiempo) return;
  if (!('IntersectionObserver' in window)) {
    lineaTiempo.classList.add('is-visible');
    return;
  }

  const observador = new IntersectionObserver(entradas => {
    entradas.forEach(entrada => {
      if (!entrada.isIntersecting) return;
      entrada.target.classList.add('is-visible');
      observador.unobserve(entrada.target);
    });
  }, { threshold: 0.25 });
  observador.observe(lineaTiempo);
});
