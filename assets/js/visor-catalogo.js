import * as pdfjsLib from '../vendor/pdfjs/pdf.min.mjs';

pdfjsLib.GlobalWorkerOptions.workerSrc = 'assets/vendor/pdfjs/pdf.worker.min.mjs';

const catalog = window.GAMBACUA_CATALOG || {};
const objectUrls = [];
let pdfDocument = null;
let book = null;
let totalPages = 0;
let currentPage = 1;
let fullyLoaded = false;
let isUnloading = false;

const normalPageSize = { width: 500, height: 707 };
const pageRatio = normalPageSize.height / normalPageSize.width;

const nodes = {
  book: document.getElementById('catalogBook'),
  frame: document.getElementById('catalogBookFrame'),
  status: document.getElementById('catalogBookStatus'),
  previous: document.getElementById('catalogBookPrevious'),
  next: document.getElementById('catalogBookNext'),
  indicator: document.getElementById('catalogBookIndicator'),
  fullscreen: document.getElementById('catalogBookFullscreen')
};

function pageText() {
  return `Página ${currentPage} de ${totalPages || '…'}`;
}

function updateControls() {
  const label = pageText();
  if (nodes.indicator) nodes.indicator.textContent = label;
  if (fullyLoaded && nodes.status) nodes.status.textContent = label;
  if (nodes.previous) nodes.previous.disabled = !book || currentPage <= 1;
  if (nodes.next) nodes.next.disabled = !book || currentPage >= totalPages;
}

async function renderPage(pdf, pageNumber, targetWidth = 980) {
  const page = await pdf.getPage(pageNumber);
  const baseViewport = page.getViewport({ scale: 1 });
  const viewport = page.getViewport({ scale: targetWidth / baseViewport.width });
  const pixelRatio = Math.min(window.devicePixelRatio || 1, 2);
  const canvas = document.createElement('canvas');
  const context = canvas.getContext('2d', { alpha: false });

  canvas.width = Math.floor(viewport.width * pixelRatio);
  canvas.height = Math.floor(viewport.height * pixelRatio);
  canvas.style.width = `${viewport.width}px`;
  canvas.style.height = `${viewport.height}px`;

  await page.render({
    canvasContext: context,
    viewport,
    transform: pixelRatio === 1 ? null : [pixelRatio, 0, 0, pixelRatio, 0, 0]
  }).promise;

  const blob = await new Promise((resolve) => canvas.toBlob(resolve, 'image/jpeg', 0.91));
  if (!blob) throw new Error(`No se pudo preparar la página ${pageNumber}`);

  const url = URL.createObjectURL(blob);
  objectUrls.push(url);
  canvas.width = 0;
  canvas.height = 0;
  return url;
}

function initializeBook(images) {
  if (!window.St?.PageFlip || !nodes.book) throw new Error('El visor de libro no está disponible');

  const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

  book = new window.St.PageFlip(nodes.book, {
    width: normalPageSize.width,
    height: normalPageSize.height,
    size: 'stretch',
    minWidth: 280,
    maxWidth: normalPageSize.width,
    minHeight: 396,
    maxHeight: normalPageSize.height,
    showCover: true,
    mobileScrollSupport: false,
    usePortrait: true,
    autoSize: true,
    maxShadowOpacity: reduceMotion ? 0 : 0.34,
    flippingTime: reduceMotion ? 1 : 240,
    drawShadow: !reduceMotion,
    swipeDistance: 30
  });

  book.loadFromImages(images);
  book.on('flip', (event) => {
    currentPage = Number(event.data || 0) + 1;
    updateControls();
  });
  updateControls();
}

function updateBook(images) {
  if (!book) initializeBook(images);
  else if (typeof book.updateFromImages === 'function') book.updateFromImages(images);
  else book.loadFromImages(images);
  updateControls();
}

async function loadCatalog() {
  if (!catalog.file || !nodes.book) throw new Error('No se encontró el archivo del catálogo');

  pdfDocument = await pdfjsLib.getDocument(catalog.file).promise;
  totalPages = pdfDocument.numPages;
  const images = [];
  const initialPageCount = Math.min(2, totalPages);

  for (let pageNumber = 1; pageNumber <= totalPages; pageNumber += 1) {
    nodes.status.textContent = `Preparando páginas: ${pageNumber} de ${totalPages}`;
    images.push(await renderPage(pdfDocument, pageNumber));
    if (images.length === initialPageCount) initializeBook(images);
    else if (images.length > initialPageCount) updateBook(images);
    await new Promise((resolve) => requestAnimationFrame(resolve));
  }

  fullyLoaded = true;
  updateControls();
}

function toggleFullscreen() {
  if (!nodes.frame) return;
  if (document.fullscreenElement) document.exitFullscreen();
  else nodes.frame.requestFullscreen?.();
}

function resizeBookForFullscreen() {
  if (!book || !nodes.book || !nodes.frame) return;

  const isFullscreen = document.fullscreenElement === nodes.frame;
  const usePortrait = book.getOrientation() === 'portrait' || nodes.frame.clientWidth < 700;
  const horizontalSpace = usePortrait ? 48 : 180;
  const availableWidth = Math.max(280, nodes.frame.clientWidth - horizontalSpace);
  const availableHeight = Math.max(396, nodes.frame.clientHeight - 48);
  const pageWidth = isFullscreen
    ? Math.max(280, Math.floor(Math.min(usePortrait ? availableWidth : availableWidth / 2, availableHeight / pageRatio)))
    : normalPageSize.width;
  const pageHeight = Math.round(pageWidth * pageRatio);
  const settings = book.getSettings();

  settings.width = pageWidth;
  settings.height = pageHeight;
  settings.maxWidth = pageWidth;
  settings.maxHeight = pageHeight;
  nodes.book.style.maxWidth = `${pageWidth * 2}px`;

  book.getUI()?.update?.();
  book.update();
}

function updateFullscreenLabel() {
  const label = nodes.fullscreen?.querySelector('span');
  if (label) label.textContent = document.fullscreenElement ? 'Salir de pantalla completa' : 'Pantalla completa';
  requestAnimationFrame(resizeBookForFullscreen);
}

function handleKeyboard(event) {
  if (['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName)) return;
  if (event.key === 'ArrowLeft') book?.flipPrev();
  else if (event.key === 'ArrowRight') book?.flipNext();
  else if (event.key === 'Home') book?.flip(0);
  else if (event.key === 'End' && totalPages) book?.flip(totalPages - 1);
  else return;
  event.preventDefault();
}

nodes.previous?.addEventListener('click', () => book?.flipPrev());
nodes.next?.addEventListener('click', () => book?.flipNext());
nodes.fullscreen?.addEventListener('click', toggleFullscreen);
document.addEventListener('fullscreenchange', updateFullscreenLabel);
window.addEventListener('resize', () => {
  if (document.fullscreenElement === nodes.frame) requestAnimationFrame(resizeBookForFullscreen);
});
document.addEventListener('keydown', handleKeyboard);
window.addEventListener('beforeunload', () => {
  isUnloading = true;
  objectUrls.forEach((url) => URL.revokeObjectURL(url));
  pdfDocument?.destroy?.();
});

loadCatalog().catch((error) => {
  if (isUnloading || error?.name === 'RenderingCancelledException') return;
  console.error(error);
  if (nodes.status) nodes.status.textContent = 'No fue posible abrir el catálogo.';
  nodes.frame?.classList.add('has-error');
});
