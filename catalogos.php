<?php
require __DIR__ . '/includes/encabezado.php';

$catalogPath = 'assets/catalogos/catalogo-inocuidad-gambacua-2026.pdf';

introduccionPagina(
    'Catálogo de inocuidad',
    'Consulta nuestras soluciones y avanza por el catálogo como si fuera un libro.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Catálogo', 'url' => null]
    ]
);
?>

<section class="catalog-book wrap" aria-labelledby="catalog-book-title">
    <!-- 1. Encabezado y Acciones del Visor -->
    <header class="catalog-book__header">
        <div>
            <h2 id="catalog-book-title">Catálogo de inocuidad Gambacua</h2>
        </div>
        <div class="catalog-book__header-actions">
            <button id="catalogBookFullscreen" class="catalog-book__text-button" type="button">
                <svg class="catalog-book__fullscreen-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M8 3H3v5M16 3h5v5M21 16v5h-5M3 16v5h5"/>
                </svg>
                <span>Pantalla completa</span>
            </button>
            <a class="catalog-book__download" href="<?= htmlspecialchars($catalogPath, ENT_QUOTES, 'UTF-8') ?>" download>
                <?= icon('download') ?> Descargar catálogo
            </a>
        </div>
    </header>

    <p id="catalogBookStatus" class="catalog-book__status" role="status" aria-live="polite">Cargando catálogo…</p>

    <!-- 2. Marco del Libro y Navegación de Páginas -->
    <div id="catalogBookFrame" class="catalog-book__frame">
        <button id="catalogBookPrevious" class="catalog-book__page-arrow catalog-book__page-arrow--previous" type="button" aria-label="Página anterior" disabled>
            <span aria-hidden="true">←</span>
        </button>
        <div id="catalogBook" class="catalog-book__pages" aria-label="Catálogo de inocuidad Gambacua"></div>
        <button id="catalogBookNext" class="catalog-book__page-arrow catalog-book__page-arrow--next" type="button" aria-label="Página siguiente" disabled>
            <span aria-hidden="true">→</span>
        </button>
    </div>

    <!-- 3. Controles e Indicador de Lectura -->
    <div class="catalog-book__controls" aria-label="Controles del catálogo">
        <span id="catalogBookIndicator" class="catalog-book__indicator" aria-live="polite">Página 1 de …</span>
    </div>
</section>

<script>
window.GAMBACUA_CATALOG = { file: <?= json_encode($catalogPath, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?> };
</script>
<script src="assets/vendor/page-flip/page-flip.browser.js" defer></script>
<script src="assets/js/visor-catalogo.js?v=7" type="module"></script>

<?php require __DIR__ . '/includes/pie.php'; ?>
