document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-section-rail], [data-section-panels]').forEach(navegador => {
    const enlaces = [...navegador.querySelectorAll('a[href^="#"]')];
    const secciones = enlaces
      .map(enlace => document.querySelector(enlace.getAttribute('href')))
      .filter(Boolean);

    if (!enlaces.length || !secciones.length) return;

    const campoMovil = document.createElement('div');
    const etiquetaMovil = document.createElement('span');
    const controlMovil = document.createElement('details');
    const resumenMovil = document.createElement('summary');
    const valorMovil = document.createElement('span');
    const opcionesMoviles = document.createElement('div');

    campoMovil.className = 'section-rail-mobile';
    etiquetaMovil.className = 'section-rail-mobile-label';
    etiquetaMovil.textContent = 'Ir a sección';
    controlMovil.className = 'section-rail-mobile-control';
    resumenMovil.setAttribute('aria-label', navegador.getAttribute('aria-label') || 'Secciones de la página');
    valorMovil.className = 'section-rail-mobile-value';
    opcionesMoviles.className = 'section-rail-mobile-options';

    enlaces.forEach(enlace => {
      const enlaceMovil = enlace.cloneNode(true);
      enlaceMovil.removeAttribute('id');
      enlaceMovil.classList.remove('is-active');
      opcionesMoviles.append(enlaceMovil);
    });

    resumenMovil.append(valorMovil);
    controlMovil.append(resumenMovil, opcionesMoviles);
    campoMovil.append(etiquetaMovil, controlMovil);
    if (navegador.hasAttribute('data-section-rail')) {
      navegador.prepend(campoMovil);
      navegador.classList.add('has-mobile-select');
    }

    const enlacesMoviles = [...opcionesMoviles.querySelectorAll('a[href^="#"]')];

    const activar = id => {
      secciones.forEach(seccion => {
        seccion.setAttribute('data-section-panel', '');
        seccion.hidden = seccion.id !== id;
      });
      enlaces.forEach(enlace => {
        const activo = enlace.getAttribute('href') === `#${id}`;
        enlace.classList.toggle('is-active', activo);
        enlace.setAttribute('aria-current', activo ? 'location' : 'false');
        if (activo) valorMovil.textContent = enlace.textContent.trim();
      });

      enlacesMoviles.forEach(enlace => {
        const activo = enlace.getAttribute('href') === `#${id}`;
        enlace.classList.toggle('is-active', activo);
        enlace.setAttribute('aria-current', activo ? 'location' : 'false');
      });
    };

    const destinoHash = hash => {
      try { return document.getElementById(decodeURIComponent(hash.slice(1))); }
      catch { return null; }
    };
    const seccionDe = destino => secciones.find(seccion => seccion === destino || seccion.contains(destino));
    const sincronizar = () => {
      const destino = destinoHash(location.hash);
      const seccion = seccionDe(destino) || secciones[0];
      activar(seccion.id);
      if (destino && seccion.contains(destino)) requestAnimationFrame(() => destino.scrollIntoView({ behavior: 'instant', block: 'start' }));
    };
    document.addEventListener('click', evento => {
      if (evento.defaultPrevented || evento.button !== 0 || evento.ctrlKey || evento.metaKey || evento.shiftKey || evento.altKey) return;
      const enlace = evento.target.closest('a[href]');
      if (!enlace || enlace.hasAttribute('download') || (enlace.target && enlace.target !== '_self')) return;
      const url = new URL(enlace.href, location.href);
      if (url.origin !== location.origin || url.pathname !== location.pathname || url.search !== location.search || !url.hash) return;
      const destino = destinoHash(url.hash);
      const seccion = seccionDe(destino);
      if (!seccion) return;
      evento.preventDefault();
      const origenOculto = seccionDe(enlace) && seccionDe(enlace) !== seccion;
      activar(seccion.id);
      if (origenOculto) {
        const titulo = seccion.querySelector('h2, h3') || seccion;
        titulo.setAttribute('tabindex', '-1');
        titulo.focus({ preventScroll: true });
      }
      if (location.hash !== url.hash) history.pushState(null, '', url.hash);
      if (controlMovil.open) {
        controlMovil.open = false;
        resumenMovil.focus({ preventScroll: true });
      }
      destino.scrollIntoView({ behavior: 'instant', block: 'start' });
    });
    window.addEventListener('hashchange', sincronizar);

    controlMovil.addEventListener('keydown', evento => {
      if (evento.key === 'Escape' && controlMovil.open) {
        controlMovil.open = false;
        resumenMovil.focus();
      }
    });

    sincronizar();
  });
});
