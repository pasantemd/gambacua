/** Navegación principal para mouse, teclado y toque. */
function iniciarNavegacionEncabezado() {
  const encabezado = document.querySelector('.site-header');
  if (!encabezado || encabezado.dataset.navigationReady === 'true') return;
  encabezado.dataset.navigationReady = 'true';

  const botonMenu = document.querySelector('.menu-toggle');
  const navegacion = document.querySelector('#main-nav');
  const desplegables = document.querySelectorAll('.nav-dropdown');

  function cerrarDesplegables() {
    desplegables.forEach(desplegable => {
      desplegable.classList.remove('is-open');
      desplegable.dataset.clickPinned = 'false';
      desplegable.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', 'false');
    });
  }

  if (botonMenu && navegacion) {
    function cerrarMenu() {
      botonMenu.setAttribute('aria-expanded', 'false');
      botonMenu.setAttribute('aria-label', 'Abrir menú principal');
      navegacion.classList.remove('is-open');
      document.body.classList.remove('has-mobile-nav');
      cerrarDesplegables();
    }

    botonMenu.addEventListener('click', evento => {
      evento.stopPropagation();
      const abrir = botonMenu.getAttribute('aria-expanded') !== 'true';
      botonMenu.setAttribute('aria-expanded', String(abrir));
      botonMenu.setAttribute('aria-label', abrir ? 'Cerrar menú principal' : 'Abrir menú principal');
      navegacion.classList.toggle('is-open', abrir);
      document.body.classList.toggle('has-mobile-nav', abrir);
      if (!abrir) cerrarDesplegables();
    });

    document.addEventListener('keydown', evento => {
      if (evento.key === 'Escape' && botonMenu.getAttribute('aria-expanded') === 'true') {
        cerrarMenu();
        botonMenu.focus();
      }
    });

    document.addEventListener('click', evento => {
      if (!evento.target.closest('.header-inner')) cerrarMenu();
    });

    matchMedia('(min-width: 861px)').addEventListener('change', evento => {
      if (evento.matches) cerrarMenu();
    });
  }

  desplegables.forEach(desplegable => {
    const botonDesplegable = desplegable.querySelector('.nav-dropdown-trigger');

    function establecerAbierto(abierto) {
      desplegable.classList.toggle('is-open', abierto);
      botonDesplegable?.setAttribute('aria-expanded', String(abierto));
    }

    botonDesplegable?.addEventListener('click', evento => {
      evento.preventDefault();
      evento.stopPropagation();
      const fijar = desplegable.dataset.clickPinned !== 'true';
      desplegable.dataset.clickPinned = String(fijar);
      establecerAbierto(fijar);
    });

    desplegable.addEventListener('pointerenter', evento => {
      if (evento.pointerType !== 'touch' && innerWidth > 860) establecerAbierto(true);
    });

    desplegable.addEventListener('pointerleave', evento => {
      if (evento.pointerType !== 'touch' && innerWidth > 860 && desplegable.dataset.clickPinned !== 'true') establecerAbierto(false);
    });

    desplegable.addEventListener('keydown', evento => {
      if (evento.key === 'Escape' && desplegable.classList.contains('is-open')) {
        evento.stopPropagation();
        desplegable.dataset.clickPinned = 'false';
        establecerAbierto(false);
        botonDesplegable?.focus();
      }
    });

    desplegable.querySelectorAll('.nav-dropdown-item.has-subcategories').forEach(enlaceCategoria => {
      enlaceCategoria.addEventListener('click', evento => {
        if (innerWidth > 860) return;
        evento.preventDefault();
        evento.stopPropagation();
        const grupo = enlaceCategoria.closest('.nav-dropdown-group');
        const expandir = !grupo.classList.contains('is-expanded');

        desplegable.querySelectorAll('.nav-dropdown-group.is-expanded').forEach(grupoAbierto => {
          if (grupoAbierto !== grupo) {
            grupoAbierto.classList.remove('is-expanded');
            grupoAbierto.querySelector('.nav-dropdown-item.has-subcategories')?.setAttribute('aria-expanded', 'false');
          }
        });

        grupo.classList.toggle('is-expanded', expandir);
        enlaceCategoria.setAttribute('aria-expanded', String(expandir));
      });
    });

    desplegable.querySelectorAll('.nav-dropdown-item, .nav-dropdown-subitem, .nav-dropdown-all-link').forEach(enlace => {
      enlace.addEventListener('click', () => {
        if (innerWidth <= 860 && enlace.classList.contains('has-subcategories')) return;
        if (innerWidth <= 860 && botonMenu && navegacion) {
          botonMenu.setAttribute('aria-expanded', 'false');
          botonMenu.setAttribute('aria-label', 'Abrir menú principal');
          navegacion.classList.remove('is-open');
          document.body.classList.remove('has-mobile-nav');
          cerrarDesplegables();
        }
      });
    });
  });

  document.addEventListener('click', evento => {
    desplegables.forEach(desplegable => {
      if (!desplegable.contains(evento.target)) {
        desplegable.classList.remove('is-open');
        desplegable.dataset.clickPinned = 'false';
        desplegable.querySelector('.nav-dropdown-trigger')?.setAttribute('aria-expanded', 'false');
      }
    });
  });
}

iniciarNavegacionEncabezado();
