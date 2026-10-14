/** Movimiento editorial compartido: una entrada por sección y grupo. */
document.addEventListener('DOMContentLoaded', () => {
  const reducirMovimiento = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const admiteObservador = 'IntersectionObserver' in window;
  if (document.body.classList.contains('page-compact-dry')) return;

  const grupos = [...document.querySelectorAll([
    '.values', '.ingredient-grid', '.timeline-grid', '.categories-carousel-track',
    '.inocuidad-lines-grid', '.contact-info-grid', '.supply-tips-grid',
    '.sampling-bags-grid', '.micotoxin-methods', '.histamine-product-details'
  ].join(','))];
  const candidatas = [...document.querySelectorAll([
    '.culture-media-card', '.culture-media-card-minimal', '.cat-brand-card',
    '.contact-form', '.contact-form-map', '.contact-info-card', '.supply-tip-card',
    '.sampling-bag-card', '.sampling-bags-features', '.sampling-bags-applications',
    '.inoculation-product', '.centrifuge-rack', '.centrifuge-details',
    '.centrifuge-standard', '.filtros-diagram-wrapper', '.filtros-conversion-section',
    '.culture-ready-minimal', '.micotoxin-family', '.micotoxin-approval', '.histamine-product'
  ].join(','))];
  const tarjetas = candidatas.filter(tarjeta => !grupos.some(grupo => grupo.contains(tarjeta)));
  const secciones = [...document.querySelectorAll('main > section:not(.page-intro):not(.hero-shell)')]
    .filter(seccion => !grupos.some(grupo => seccion.contains(grupo)) && !tarjetas.some(tarjeta => seccion.contains(tarjeta)));

  secciones.forEach(seccion => seccion.classList.add('site-motion-section'));
  grupos.forEach(grupo => {
    grupo.classList.add('site-motion-group');
    [...grupo.children].forEach((elemento, indice) => {
      elemento.classList.add('site-motion-item');
      elemento.style.setProperty('--motion-delay', `${Math.min(indice, 3) * 35}ms`);
    });
  });
  tarjetas.forEach((tarjeta, indice) => {
    tarjeta.classList.add('site-motion-card');
    tarjeta.style.setProperty('--motion-delay', `${Math.min(indice % 4, 3) * 35}ms`);
  });

  const objetivos = [...new Set([...secciones, ...grupos, ...tarjetas])];
  if (reducirMovimiento || !admiteObservador) {
    objetivos.forEach(objetivo => objetivo.classList.add('is-motion-visible'));
    return;
  }

  const mostrar = objetivo => {
    objetivo.classList.add('is-motion-visible');
    const elementos = objetivo.classList.contains('site-motion-group')
      ? [...objetivo.querySelectorAll('.site-motion-item')]
      : [objetivo];
    setTimeout(() => elementos.forEach(elemento => elemento.style.setProperty('--motion-delay', '0ms')), 360);
  };

  objetivos.forEach(objetivo => {
    if (objetivo.getBoundingClientRect().top < innerHeight) mostrar(objetivo);
  });
  document.documentElement.classList.add('site-motion-enabled');

  const observador = new IntersectionObserver(entradas => {
    entradas.forEach(entrada => {
      if (!entrada.isIntersecting) return;
      mostrar(entrada.target);
      observador.unobserve(entrada.target);
    });
  }, { rootMargin: '0px 0px -6% 0px', threshold: .08 });

  objetivos.forEach(objetivo => {
    if (!objetivo.classList.contains('is-motion-visible')) observador.observe(objetivo);
  });
});
