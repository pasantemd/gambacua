<?php
$tituloPagina = 'Productos';
require __DIR__.'/includes/encabezado.php';
introduccionPagina(
    'Productos',
    'Soluciones para formulación industrial, nutrición acuícola y diagnóstico microbiológico de alta precisión.',
    'Productos'
);
?>

<!-- 1. Carrusel de Categorías de Producto -->
<section class="wrap product-categories-section" aria-labelledby="categorias-title">
    <div class="product-categories-heading">
        <div>
            <h2 id="categorias-title">Categorías</h2>
            <p>Selecciona una categoría para conocer sus soluciones y aplicaciones.</p>
        </div>

        <!-- Controles de navegación del carrusel (visibles en móviles/tablets) -->
        <div class="categories-carousel-nav" aria-label="Navegación del carrusel de categorías">
            <button type="button" class="cat-nav-btn" id="cat-prev-btn" aria-label="Categoría anterior">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button type="button" class="cat-nav-btn" id="cat-next-btn" aria-label="Categoría siguiente">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>
    </div>

    <!-- Carrusel de categorías con los colores de la página -->
    <div class="categories-carousel-track" id="categories-carousel-track" tabindex="0" role="region" aria-label="Carrusel de categorías de producto">
        <!-- 1. Ingredientes (Pale Ice Blue de la página) -->
        <a class="cat-brand-card cat-card-ingredientes" href="ingredientes.php" aria-label="Ver categoría Ingredientes">
            <div class="cat-card-header">
                <h3 class="cat-card-title">Ingredientes</h3>
                <span class="cat-card-sub">Ovoproductos pasteurizados</span>
            </div>
            <div class="cat-card-media">
                <img src="assets/images/huevo-en-polvo.webp" alt="Ingredientes ovoproductos en polvo Gambacua" loading="lazy">
            </div>
            <div class="cat-card-corner">
                <span class="cat-card-circle-btn" aria-hidden="true">
                    <?= icono('diagonal') ?>
                </span>
            </div>
        </a>

        <!-- 2. Inocuidad alimentaria (Navy de la página) -->
        <a class="cat-brand-card cat-card-inocuidad" href="inocuidad.php" aria-label="Ver categoría Inocuidad alimentaria">
            <div class="cat-card-header">
                <h3 class="cat-card-title">Inocuidad alimentaria</h3>
                <span class="cat-card-sub">Control microbiológico</span>
            </div>
            <div class="cat-card-media">
                <img src="assets/images/inocuidad-cat.webp" alt="Inocuidad alimentaria y control microbiológico Gambacua" loading="lazy">
            </div>
            <div class="cat-card-corner">
                <span class="cat-card-circle-btn" aria-hidden="true">
                    <?= icono('diagonal') ?>
                </span>
            </div>
        </a>
    </div>

    <!-- Indicadores de paginación sincronizados -->
    <div class="categories-carousel-dots" id="categories-carousel-dots" aria-hidden="true"></div>
</section>

<!-- 2. Cintillo de Contacto -->
<section class="wrap contact-strip">
    <div>
        <h2>¿Requieres asesoría sobre alguna de nuestras líneas o productos?</h2>
        <p>Nuestro equipo técnico y comercial puede orientarte sobre la solución adecuada para tu proceso.</p>
    </div>
    <a class="button button-light" href="contacto.php">Hablar con un asesor <?= icono('diagonal') ?></a>
</section>

<script src="assets/js/carrusel-categorias.js?v=3" defer></script>

<?php require __DIR__.'/includes/pie.php'; ?>
