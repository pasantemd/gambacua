/** Estado de carga, navegación e imágenes compartido por todo el sitio. */
document.addEventListener('DOMContentLoaded', () => {
  const barraProgreso = document.getElementById('site-progress-bar');

  if (barraProgreso) {
    document.addEventListener('click', evento => {
      if (evento.defaultPrevented || evento.button !== 0 || evento.metaKey || evento.ctrlKey || evento.shiftKey || evento.altKey) return;

      const enlace = evento.target.closest('a');
      if (!enlace?.href || enlace.target === '_blank' || enlace.hasAttribute('download')) return;
      if (enlace.href.startsWith('mailto:') || enlace.href.startsWith('tel:') || enlace.href.includes('#')) return;

      try {
        const destino = new URL(enlace.href, location.origin);
        if (destino.origin === location.origin && destino.pathname !== location.pathname) {
          barraProgreso.classList.add('is-active');
          barraProgreso.style.width = '75%';
          document.body.classList.add('is-page-exiting');
        }
      } catch {
        return;
      }
    });

    addEventListener('beforeunload', () => {
      barraProgreso.classList.add('is-active');
      barraProgreso.style.width = '100%';
    });

    addEventListener('pageshow', evento => {
      if (!evento.persisted) return;
      document.body.classList.remove('is-page-exiting');
      barraProgreso.classList.remove('is-active');
      barraProgreso.style.width = '0%';
    });
  }

  document.querySelectorAll('.media-slot img, .cat-card-media img').forEach(imagen => {
    const marcarCargada = () => {
      imagen.classList.add('is-loaded');
      imagen.closest('.media-slot')?.classList.add('is-loaded');
    };

    if (imagen.complete && imagen.naturalWidth > 0) marcarCargada();
    else {
      imagen.addEventListener('load', marcarCargada, { once: true });
      imagen.addEventListener('error', marcarCargada, { once: true });
    }
  });
});
