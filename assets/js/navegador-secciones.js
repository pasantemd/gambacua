document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-section-rail]').forEach(navegador => {
    const enlaces = [...navegador.querySelectorAll('a[href^="#"]')];
    const secciones = enlaces
      .map(enlace => document.querySelector(enlace.getAttribute('href')))
      .filter(Boolean);

    if (!enlaces.length || !secciones.length) return;

    let navegandoPorClic = false;
    let temporizadorClic = null;
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
    navegador.prepend(campoMovil);
    navegador.classList.add('has-mobile-select');

    const enlacesMoviles = [...opcionesMoviles.querySelectorAll('a[href^="#"]')];

    const activar = (id, centrarEnlace = false) => {
      enlaces.forEach(enlace => {
        const activo = enlace.getAttribute('href') === `#${id}`;
        enlace.classList.toggle('is-active', activo);
        enlace.setAttribute('aria-current', activo ? 'location' : 'false');
        if (activo) valorMovil.textContent = enlace.textContent.trim();
        if (activo && centrarEnlace && window.innerWidth <= 800 && !navegador.classList.contains('has-mobile-select')) {
          enlace.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        }
      });

      enlacesMoviles.forEach(enlace => {
        const activo = enlace.getAttribute('href') === `#${id}`;
        enlace.classList.toggle('is-active', activo);
        enlace.setAttribute('aria-current', activo ? 'location' : 'false');
      });
    };

    let actualizacionPendiente = false;
    const actualizarPorDesplazamiento = () => {
      if (navegandoPorClic || actualizacionPendiente) return;
      actualizacionPendiente = true;
      requestAnimationFrame(() => {
        const posicion = window.scrollY + 220;
        const estaAlFinal = window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 80;
        let idActual = secciones[0].id;

        if (estaAlFinal) {
          idActual = secciones[secciones.length - 1].id;
        } else {
          secciones.forEach(seccion => {
            if (posicion >= seccion.offsetTop) idActual = seccion.id;
          });
        }

        activar(idActual, true);
        actualizacionPendiente = false;
      });
    };

    window.addEventListener('scroll', actualizarPorDesplazamiento, { passive: true });
    window.addEventListener('resize', actualizarPorDesplazamiento, { passive: true });

    const registrarClic = (enlace, cerrarDesplegable) => {
      enlace.addEventListener('click', () => {
        navegandoPorClic = true;
        clearTimeout(temporizadorClic);
        activar(enlace.hash.slice(1), !cerrarDesplegable);
        if (cerrarDesplegable) controlMovil.open = false;
        temporizadorClic = setTimeout(() => { navegandoPorClic = false; }, 800);
      });
    };

    enlaces.forEach(enlace => registrarClic(enlace, false));
    enlacesMoviles.forEach(enlace => registrarClic(enlace, true));

    controlMovil.addEventListener('keydown', evento => {
      if (evento.key === 'Escape' && controlMovil.open) {
        controlMovil.open = false;
        resumenMovil.focus();
      }
    });

    actualizarPorDesplazamiento();
  });
});
