/** Carrusel de categorías con botones, arrastre e indicadores. */

document.addEventListener('DOMContentLoaded', () => {
  const track = document.getElementById('categories-carousel-track');
  if (!track) return;

  const prevBtn = document.getElementById('cat-prev-btn');
  const nextBtn = document.getElementById('cat-next-btn');
  const dotsContainer = document.getElementById('categories-carousel-dots');
  const cards = track.querySelectorAll('.cat-brand-card');
  const scrollBehavior = matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';

  if (!cards.length) return;

  if (dotsContainer) {
    dotsContainer.innerHTML = '';
    cards.forEach((card, index) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = `cat-dot${index === 0 ? ' is-active' : ''}`;
      dot.setAttribute('aria-label', `Ir a categoría ${index + 1}`);
      dot.addEventListener('click', () => {
        card.scrollIntoView({ behavior: scrollBehavior, block: 'nearest', inline: 'start' });
      });
      dotsContainer.appendChild(dot);
    });
  }

  const dots = dotsContainer ? dotsContainer.querySelectorAll('.cat-dot') : [];

  function updateActiveDot() {
    if (!dots.length) return;
    const trackRect = track.getBoundingClientRect();
    let closestIndex = 0;
    let minDistance = Infinity;

    cards.forEach((card, index) => {
      const cardRect = card.getBoundingClientRect();
      const distance = Math.abs(cardRect.left - trackRect.left);
      if (distance < minDistance) {
        minDistance = distance;
        closestIndex = index;
      }
    });

    dots.forEach((dot, index) => {
      dot.classList.toggle('is-active', index === closestIndex);
    });
  }

  track.addEventListener('scroll', () => {
    window.requestAnimationFrame(updateActiveDot);
  }, { passive: true });

  const getStep = () => {
    const card = cards[0];
    return card ? card.offsetWidth + 20 : 300;
  };

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      track.scrollBy({ left: -getStep(), behavior: scrollBehavior });
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      track.scrollBy({ left: getStep(), behavior: scrollBehavior });
    });
  }

  let isDown = false;
  let startX = 0;
  let scrollLeft = 0;
  let hasDragged = false;

  track.addEventListener('mousedown', e => {
    isDown = true;
    hasDragged = false;
    track.classList.add('is-dragging');
    startX = e.pageX - track.offsetLeft;
    scrollLeft = track.scrollLeft;
  });

  window.addEventListener('mouseup', () => {
    if (!isDown) return;
    isDown = false;
    track.classList.remove('is-dragging');
  });

  track.addEventListener('mousemove', e => {
    if (!isDown) return;
    e.preventDefault();
    hasDragged = true;
    const x = e.pageX - track.offsetLeft;
    const walk = (x - startX) * 1.5;
    track.scrollLeft = scrollLeft - walk;
  });

  cards.forEach(card => {
    card.addEventListener('click', e => {
      if (hasDragged) {
        e.preventDefault();
      }
    });
  });
});
