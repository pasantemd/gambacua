/** Catálogo, búsqueda, fichas técnicas e interacciones de Compact Dry. */

document.addEventListener('DOMContentLoaded', () => {
  const motionSections = document.querySelectorAll('.compact-vision-section, .cd-faq-section');
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!reduceMotion && 'IntersectionObserver' in window && motionSections.length) {
    motionSections.forEach(section => {
      if (section.getBoundingClientRect().top < window.innerHeight * 0.94) {
        section.classList.add('is-visible');
      }
    });
    document.documentElement.classList.add('cd-motion-enabled');

    const sectionObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        sectionObserver.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -6% 0px', threshold: 0.08 });

    motionSections.forEach(section => {
      if (!section.classList.contains('is-visible')) sectionObserver.observe(section);
    });
  } else {
    motionSections.forEach(section => section.classList.add('is-visible'));
  }

  const filterButtons = document.querySelectorAll('.cd-filter-btn');
  const cards = document.querySelectorAll('.cd-plate-card');
  const emptyState = document.getElementById('cd-empty-state');
  const emptyResetBtn = document.getElementById('cd-empty-reset-btn');
  const countDisplay = document.getElementById('cd-visible-count');
  const filteredCountDisplay = document.getElementById('cd-filtered-count');
  const searchInput = document.getElementById('cd-search-input');
  const searchClear = document.getElementById('cd-search-clear');
  const pagination = document.getElementById('cd-pagination');

  let currentCategory = 'todas';
  let currentSearch = '';
  let currentPage = 1;
  const pageSize = 10;
  let lastFocusedElement = null;

  function renderPagination(totalItems) {
    if (!pagination) return;
    const totalPages = Math.ceil(totalItems / pageSize);
    pagination.replaceChildren();
    pagination.hidden = totalPages <= 1;
    if (totalPages <= 1) return;

    const makeButton = (label, page, options = {}) => {
      const button = document.createElement('button');
      button.type = 'button';
      button.className = options.pageNumber ? 'cd-pagination-page' : 'cd-pagination-control';
      button.textContent = label;
      button.disabled = options.disabled || false;
      if (options.current) {
        button.classList.add('is-active');
        button.setAttribute('aria-current', 'page');
      }
      button.setAttribute('aria-label', options.ariaLabel || label);
      button.addEventListener('click', () => {
        currentPage = page;
        filterPlates();
        document.querySelector('.cd-catalog-header')?.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
      });
      return button;
    };

    pagination.append(makeButton('Anterior', currentPage - 1, { disabled: currentPage === 1 }));
    for (let page = 1; page <= totalPages; page++) {
      pagination.append(makeButton(String(page), page, {
        pageNumber: true,
        current: page === currentPage,
        ariaLabel: `Ir a la página ${page}`,
      }));
    }
    pagination.append(makeButton('Siguiente', currentPage + 1, { disabled: currentPage === totalPages }));
  }

  function filterPlates() {
    const query = currentSearch.toLowerCase().trim();
    const matches = [];

    cards.forEach(card => {
      const category = card.dataset.category || '';
      const text = (card.dataset.searchText || '').toLowerCase();
      const matchCat = currentCategory === 'todas' || category === currentCategory;
      const matchSearch = !query || text.includes(query);

      if (matchCat && matchSearch) {
        matches.push(card);
      } else {
        card.style.display = 'none';
      }
    });

    const totalPages = Math.max(1, Math.ceil(matches.length / pageSize));
    currentPage = Math.min(currentPage, totalPages);
    const start = (currentPage - 1) * pageSize;
    const visibleCards = matches.slice(start, start + pageSize);
    matches.forEach(card => { card.style.display = 'none'; });
    visibleCards.forEach(card => { card.style.display = ''; });

    if (countDisplay) {
      countDisplay.textContent = visibleCards.length;
    }
    if (filteredCountDisplay) filteredCountDisplay.textContent = matches.length;

    if (emptyState) {
      emptyState.style.display = matches.length === 0 ? 'flex' : 'none';
    }
    renderPagination(matches.length);
  }

  function updateSearch(value) {
    currentSearch = value;
    currentPage = 1;
    if (searchClear) searchClear.hidden = !value;
    filterPlates();
  }

  if (searchInput) {
    searchInput.addEventListener('input', () => updateSearch(searchInput.value));
    searchInput.addEventListener('search', () => updateSearch(searchInput.value));
  }

  if (searchClear) {
    searchClear.addEventListener('click', () => {
      if (!searchInput) return;
      searchInput.value = '';
      updateSearch('');
      searchInput.focus();
    });
  }

  if (emptyResetBtn) {
    emptyResetBtn.addEventListener('click', () => {
      currentCategory = 'todas';
      currentPage = 1;
      if (searchInput) searchInput.value = '';
      currentSearch = '';
      if (searchClear) searchClear.hidden = true;
      filterButtons.forEach((button, index) => {
        button.classList.toggle('is-active', index === 0);
        button.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
      });
      filterPlates();
      searchInput?.focus();
    });
  }

  filterButtons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => {
        b.classList.remove('is-active');
        b.setAttribute('aria-selected', 'false');
      });
      btn.classList.add('is-active');
      btn.setAttribute('aria-selected', 'true');
      currentCategory = btn.dataset.filter || 'todas';
      currentPage = 1;
      filterPlates();
    });

    btn.addEventListener('keydown', e => {
      let targetIndex = null;
      const list = Array.from(filterButtons);
      if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
        targetIndex = (index + 1) % list.length;
      } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
        targetIndex = (index - 1 + list.length) % list.length;
      }
      if (targetIndex !== null) {
        e.preventDefault();
        list[targetIndex].focus();
        list[targetIndex].click();
      }
    });
  });

  filterPlates();

  const modal = document.getElementById('cd-detail-modal');
  const modalContainer = modal ? modal.querySelector('.cd-modal-container') : null;
  const modalScrollable = modal ? modal.querySelector('.cd-modal-scrollable') : null;
  const modalTitle = document.getElementById('cd-modal-title');
  const modalOrganism = document.getElementById('cd-modal-organism');
  const modalImage = document.getElementById('cd-modal-image');
  const modalThumbs = document.getElementById('cd-modal-thumbs');
  const modalSummary = document.getElementById('cd-modal-summary');
  const modalDesc = document.getElementById('cd-modal-desc');
  const modalIncubation = document.getElementById('cd-modal-incubation');
  const modalMatrix = document.getElementById('cd-modal-matrix');
  const modalPresentation = document.getElementById('cd-modal-presentation');
  const modalGuideBtn = document.getElementById('cd-modal-guide-btn');
  const modalSheetBtn = document.getElementById('cd-modal-sheet-btn');
  const closeBtn = document.getElementById('cd-modal-close');

  function setupGallery(plateData) {
    if (!modalThumbs || !modalImage) return;

    const items = [
      { src: plateData.imagen || '', alt: plateData.nombre || 'Placa Compact Dry' },
      { src: 'assets/images/compact-dry/placas/caja-lado.webp', alt: 'Caja Compact Dry' },
      { src: 'assets/images/compact-dry/placas/caja-lado-placas.webp', alt: 'Caja y placas Compact Dry' },
      { src: 'assets/images/compact-dry/placas/caja-abierta.webp', alt: 'Empaque abierto con placas' }
    ];

    modalThumbs.innerHTML = '';

    items.forEach((item, index) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `cd-thumb-btn ${index === 0 ? 'is-active' : ''}`;
      btn.setAttribute('aria-label', `Ver imagen ${index + 1}: ${item.alt}`);

      const thumbImg = document.createElement('img');
      thumbImg.src = item.src;
      thumbImg.alt = item.alt;
      thumbImg.loading = 'lazy';

      btn.appendChild(thumbImg);

      btn.addEventListener('click', () => {
        modalThumbs.querySelectorAll('.cd-thumb-btn').forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');
        modalImage.src = item.src;
        modalImage.alt = item.alt;
      });

      modalThumbs.appendChild(btn);
    });
  }

  function openModal(data, triggerElement) {
    if (!modal) return;

    lastFocusedElement = triggerElement || document.activeElement;

    if (modalTitle) modalTitle.textContent = data.nombre || 'Compact Dry';
    if (modalOrganism) modalOrganism.textContent = data.organismo || '';
    if (modalSummary) modalSummary.textContent = data.resumen || data.descripcionCorta || '';
    if (modalDesc) modalDesc.textContent = data.descripcion || '';
    if (modalIncubation) modalIncubation.textContent = data.incubacion || 'Estándar según protocolo';
    if (modalMatrix) modalMatrix.textContent = data.matriz || 'Alimentos, aguas y superficies ambientales';
    if (modalPresentation) modalPresentation.textContent = data.presentacion || 'Paquetes por 4 unidades';

    if (modalImage) {
      modalImage.src = data.imagen || '';
      modalImage.alt = data.nombre || '';
    }
    setupGallery(data);

    if (modalGuideBtn) {
      modalGuideBtn.href = data.guiaTecnica || `contacto.php?asunto=${encodeURIComponent('Guía Técnica de ' + data.nombre)}`;
    }
    if (modalSheetBtn) {
      modalSheetBtn.href = data.fichaTecnica || `contacto.php?asunto=${encodeURIComponent('Ficha Técnica de ' + data.nombre)}`;
    }

    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';

    if (modalScrollable) modalScrollable.scrollTop = 0;
    if (modalContainer) modalContainer.scrollTop = 0;

    if (closeBtn) closeBtn.focus();
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
    if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
      lastFocusedElement.focus();
    }
  }

  cards.forEach(card => {
    function handleCardActivation(e) {
      if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') {
        return;
      }
      e.preventDefault();
      try {
        const raw = card.dataset.plateData;
        if (raw) {
          const data = JSON.parse(raw);
          openModal(data, card);
        }
      } catch (err) {
        console.error('Error al abrir modal de placa:', err);
      }
    }

    card.addEventListener('click', handleCardActivation);
    card.addEventListener('keydown', handleCardActivation);
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', closeModal);
  }

  if (modal) {
    modal.addEventListener('click', e => {
      if (e.target === modal || e.target.classList.contains('cd-modal-overlay')) {
        closeModal();
      }
    });

    modal.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        closeModal();
        return;
      }

      if (e.key === 'Tab') {
        const focusable = modal.querySelectorAll('button:not([disabled]), [href]:not([disabled]), input:not([disabled]), [tabindex]:not([tabindex="-1"])');
        if (!focusable.length) return;
        const first = focusable[0];
        const last = focusable[focusable.length - 1];

        if (e.shiftKey) {
          if (document.activeElement === first) {
            e.preventDefault();
            last.focus();
          }
        } else {
          if (document.activeElement === last) {
            e.preventDefault();
            first.focus();
          }
        }
      }
    });
  }

  // Tarjetas reversibles de beneficios de Compact Vision.
  const benefitCards = document.querySelectorAll('.cv-benefit-card');
  benefitCards.forEach(card => {
    card.setAttribute('tabindex', '0');
    card.setAttribute('role', 'button');
    card.setAttribute('aria-pressed', 'false');

    function toggleCard() {
      const willOpen = !card.classList.contains('is-flipped');
      benefitCards.forEach(otherCard => {
        otherCard.classList.remove('is-flipped');
        otherCard.setAttribute('aria-pressed', 'false');
      });
      card.classList.toggle('is-flipped', willOpen);
      card.setAttribute('aria-pressed', String(willOpen));
    }

    card.addEventListener('click', toggleCard);

    card.addEventListener('keydown', event => {
      if (event.key !== 'Enter' && event.key !== ' ') return;
      event.preventDefault();
      toggleCard();
    });
  });

  // Galería y diagrama de EC Blue.
  const galeriasEcBlue = document.querySelectorAll('[data-ec-blue-gallery]');
  galeriasEcBlue.forEach(galeria => {
    const imagenPrincipal = galeria.querySelector('[data-ec-blue-main-image]');
    const nombrePrincipal = galeria.querySelector('[data-ec-blue-main-caption]');
    const miniaturas = Array.from(galeria.querySelectorAll('[data-ec-blue-thumbnail]'));

    function activarMiniatura(miniatura) {
      if (!imagenPrincipal) return;
      imagenPrincipal.src = miniatura.dataset.image;
      imagenPrincipal.alt = miniatura.dataset.alt || '';
      if (nombrePrincipal) {
        nombrePrincipal.textContent = miniatura.dataset.caption;
      }
      miniaturas.forEach(elemento => {
        const activa = elemento === miniatura;
        elemento.classList.toggle('ec-detalle-miniatura--activa', activa);
        elemento.setAttribute('aria-pressed', activa ? 'true' : 'false');
      });
    }

    miniaturas.forEach((miniatura, indice) => {
      miniatura.addEventListener('click', () => activarMiniatura(miniatura));
      miniatura.addEventListener('keydown', evento => {
        if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(evento.key)) return;
        evento.preventDefault();
        let siguienteIndice = indice;
        if (evento.key === 'ArrowLeft') {
          siguienteIndice = (indice - 1 + miniaturas.length) % miniaturas.length;
        } else if (evento.key === 'ArrowRight') {
          siguienteIndice = (indice + 1) % miniaturas.length;
        } else if (evento.key === 'Home') {
          siguienteIndice = 0;
        } else if (evento.key === 'End') {
          siguienteIndice = miniaturas.length - 1;
        }
        miniaturas[siguienteIndice].focus();
        activarMiniatura(miniaturas[siguienteIndice]);
      });
    });
  });

  document.querySelectorAll('[data-diagrama-ec-blue]').forEach(diagrama => {
    const entradas = Array.from(diagrama.querySelectorAll('[data-diagrama-entrada]'));
    const activarEntrada = entradaActiva => {
      const yaEstabaActiva = entradaActiva.getAttribute('aria-pressed') === 'true';
      entradas.forEach(entrada => {
        entrada.setAttribute('aria-pressed', entrada === entradaActiva && !yaEstabaActiva ? 'true' : 'false');
      });
      diagrama.classList.toggle('is-highlighted', !yaEstabaActiva);
    };

    entradas.forEach(entrada => {
      entrada.addEventListener('click', () => activarEntrada(entrada));
    });

    diagrama.addEventListener('keydown', evento => {
      if (evento.key !== 'Escape') return;
      entradas.forEach(entrada => entrada.setAttribute('aria-pressed', 'false'));
      diagrama.classList.remove('is-highlighted');
    });
  });
});
