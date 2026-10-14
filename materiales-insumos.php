<?php
$tituloPagina = 'Materiales e insumos';
require __DIR__.'/includes/encabezado.php';
require __DIR__.'/includes/datos-materiales-insumos.php';

introduccionPagina(
    'Materiales e insumos',
    'Consumibles especializados para respaldar las tareas continuas de preparación, muestreo y análisis microbiológico.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Materiales e insumos', 'url' => null]
    ]
);
?>

<div class="culture-media-page">
    <div class="wrap section-layout culture-media-layout">
        <nav class="section-rail culture-media-jump" data-section-rail aria-label="Subcategorías de materiales e insumos">
            <div class="section-rail-list">
<?php foreach ($categoriasMateriales as $index => $category): ?>
                    <a href="#<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>"<?= $index === 0 ? ' class="is-active" aria-current="location"' : '' ?>>
                        <span><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?= icon('arrow-right') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="culture-media-list">
<?php foreach ($categoriasMateriales as $index => $category): ?>
            <?php if ($category['id'] === 'puntas-micropipetas'): ?>
                <article class="supply-tips-section" id="puntas-micropipetas">
                    <header class="supply-tips-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($category['subtitle'], ENT_QUOTES, 'UTF-8') ?>.</p>
                    </header>

                    <div class="supply-tips-grid">
                        <?php foreach ($category['products'] as $product): ?>
                            <article class="supply-tip-card">
                                <figure>
                                    <img
                                        src="<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?>"
                                        loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                                        decoding="async"
                                    >
                                </figure>
                                <div class="supply-tip-copy">
                                    <h3><?= htmlspecialchars($product['code'], ENT_QUOTES, 'UTF-8') ?></h3>
                                    <p><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <small><?= htmlspecialchars($product['presentation'], ENT_QUOTES, 'UTF-8') ?></small>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="supply-tip-material">
                        <div>
                            <h3>Material</h3>
                            <?php foreach ($category['material'] as $paragraph): ?>
                                <p><?= htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8') ?></p>
                            <?php endforeach; ?>
                        </div>
                        <figure>
                            <img
                                src="assets/images/materiales-insumos/puntas-1000ul-sin-filtro-detalle.webp"
                                alt="Detalle de puntas universales de 1000 microlitros sin filtro"
                                loading="lazy"
                                decoding="async"
                            >
                        </figure>
                    </div>

                    <p class="supply-tip-life">Vida útil: <?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?> a partir de la fecha de fabricación</p>
                </article>
            <?php elseif ($category['id'] === 'bolsas'): ?>
                <article class="sampling-bags-section" id="bolsas">
                    <header class="sampling-bags-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($category['subtitle'], ENT_QUOTES, 'UTF-8') ?>.</p>
                    </header>

                    <div class="sampling-bags-grid">
                        <?php foreach ($category['products'] as $pIndex => $product): ?>
                            <article class="sampling-bag-card">
                                <figure>
                                    <img
                                        src="<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($product['code'] . ' ' . $product['name'], ENT_QUOTES, 'UTF-8') ?>"
                                        loading="<?= $pIndex < 4 ? 'eager' : 'lazy' ?>"
                                        decoding="async"
                                    >
                                </figure>
                                <div class="sampling-bag-copy">
                                    <h3><?= htmlspecialchars($product['code'], ENT_QUOTES, 'UTF-8') ?></h3>
                                    <strong><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                                    <span><?= htmlspecialchars($product['capacity'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <span><?= htmlspecialchars($product['dimensions'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <small><?= htmlspecialchars($product['presentation'], ENT_QUOTES, 'UTF-8') ?></small>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <section class="sampling-bags-features" aria-labelledby="sampling-bags-features-title">
                        <h3 id="sampling-bags-features-title">Bolsas THIO para análisis de agua / Bolsas en presentación plana o de pie (Stand Up)</h3>
                        <ul>
                            <?php foreach ($category['facts'] as $fact): ?>
                                <li><span><?= icon('check') ?></span><?= htmlspecialchars($fact, ENT_QUOTES, 'UTF-8') ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="sampling-bags-applications" aria-labelledby="sampling-bags-applications-title">
                        <h3 id="sampling-bags-applications-title">Aplicaciones</h3>
                        <ul>
                            <?php foreach ($category['application_items'] as $application): ?>
                                <li>
                                    <span><?= icon($application['icon']) ?></span>
                                    <small><?= htmlspecialchars($application['label'], ENT_QUOTES, 'UTF-8') ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <p class="sampling-bags-life">Vida útil: <?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?> a partir de la fecha de fabricación</p>
                </article>
            <?php elseif ($category['id'] === 'asas-inoculacion'): ?>
                <article class="inoculation-loops-section" id="asas-inoculacion">
                    <header class="catalog-special-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($category['subtitle'], ENT_QUOTES, 'UTF-8') ?>.</p>
                    </header>

                    <div class="inoculation-products">
                        <article class="inoculation-product is-loops">
                            <figure>
                                <img src="<?= htmlspecialchars($category['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Asas bacteriológicas azules de 1 y 10 microlitros" loading="lazy" decoding="async">
                            </figure>
                            <div class="inoculation-product-codes">
                                <div><strong>R717101</strong><span>Asa bacteriológica azul</span><small>Caja de 4000 unidades</small></div>
                                <div><strong>R718201</strong><span>Asa bacteriológica azul</span><small>Caja de 4000 unidades</small></div>
                            </div>
                        </article>
                        <article class="inoculation-product is-spreader">
                            <figure>
                                <img src="assets/images/materiales-insumos/esparcedor-l-spreader.webp" alt="L-Spreader azul estéril" loading="lazy" decoding="async">
                            </figure>
                            <div class="inoculation-product-codes">
                                <div><strong>R711001</strong><span>L-Spreader azul</span></div>
                            </div>
                        </article>
                    </div>

                    <p class="inoculation-material">Asas bacteriológicas fabricadas en polipropileno y esparcidor en L fabricado en poliestireno, libres de DNasa, RNasa y pirógenos.</p>
                    <p class="catalog-special-life">Vida útil: <?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?> a partir de la fecha de fabricación</p>
                </article>
            <?php elseif ($category['id'] === 'tubos-centrifuga'): ?>
                <article class="centrifuge-tubes-section" id="tubos-centrifuga">
                    <header class="catalog-special-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($category['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    </header>

                    <figure class="centrifuge-rack">
                        <img src="<?= htmlspecialchars($category['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($category['image_alt'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy" decoding="async">
                    </figure>

                    <div class="centrifuge-details">
                        <figure class="centrifuge-single">
                            <img src="assets/images/materiales-insumos/tubos-conicos-15ml.webp" alt="Tubo cónico graduado de 15 mililitros" loading="lazy" decoding="async">
                        </figure>
                        <div class="centrifuge-table-wrap">
                            <table class="centrifuge-table">
                                <thead><tr><th>Código</th><th>Descripción</th><th>Presentación</th></tr></thead>
                                <tbody>
                                    <?php foreach ($category['table'] as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($row[1], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p class="centrifuge-standard">Cumple con los estándares USP Clase VI. Libre de DNasa/RNasa y pirógenos.</p>
                    <p class="catalog-special-life">Vida útil: <?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?> a partir de la fecha de fabricación</p>
                </article>
            <?php else: ?>
            <article class="culture-media-card<?= $index % 2 ? ' is-reversed' : '' ?><?= !empty($category['table']) ? ' has-table' : '' ?>" id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="culture-media-copy">
                    <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="culture-media-summary">
                        <?= htmlspecialchars($category['summary'], ENT_QUOTES, 'UTF-8') ?>
                    </p>

                    <?php if (!empty($category['facts'])): ?>
                        <ul class="culture-media-facts">
                            <?php foreach ($category['facts'] as $fact): ?>
                                <li><?= icon('check') ?><span><?= htmlspecialchars($fact, ENT_QUOTES, 'UTF-8') ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($category['applications'])): ?>
                        <div class="culture-media-structured">
                            <section class="culture-media-group" aria-labelledby="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-applications">
                                <h3 id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-applications">Áreas de aplicación</h3>
                                <ul>
                                    <?php foreach ($category['applications'] as $application): ?>
                                        <li><?= htmlspecialchars($application, ENT_QUOTES, 'UTF-8') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        </div>
                    <?php endif; ?>

                    <div class="culture-media-actions">
                        <a class="button button-primary" href="contacto.php?asunto=<?= urlencode('Consulta sobre ' . $category['title'] . ' (Materiales e insumos)') ?>">
                            <span>Consultar disponibilidad</span>
                            <?= icon('diagonal') ?>
                        </a>
                    </div>
                </div>

                <figure class="culture-media-visual">
                    <?php if (!empty($category['shelf_life'])): ?>
                        <div class="culture-media-life">
                            <span>Vida útil</span>
                            <strong><?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?></strong>
                        </div>
                    <?php endif; ?>
                    <img
                        src="<?= htmlspecialchars($category['image'], ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($category['image_alt'], ENT_QUOTES, 'UTF-8') ?>"
                        loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                        decoding="async"
                    >
                    <?php if (!empty($category['thumbs'])): ?>
                        <div class="culture-media-thumbs" aria-label="Variantes y presentaciones de <?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?>">
                            <?php foreach ($category['thumbs'] as $thumb): ?>
                                <img
                                    class="culture-media-thumb"
                                    src="<?= htmlspecialchars($thumb['src'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="<?= htmlspecialchars($thumb['alt'], ENT_QUOTES, 'UTF-8') ?>"
                                    title="<?= htmlspecialchars($thumb['alt'], ENT_QUOTES, 'UTF-8') ?>"
                                    loading="lazy"
                                    decoding="async"
                                >
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </figure>

                <?php if (!empty($category['table'])): ?>
                    <div class="culture-media-table-block">
                        <h3><?= htmlspecialchars($category['table_title'] ?? 'Especificaciones técnicas y presentaciones', ENT_QUOTES, 'UTF-8') ?></h3>
                        <div class="culture-media-table-scroll" tabindex="0" aria-label="Tabla desplazable de especificaciones técnicas">
                            <table class="culture-media-table">
                                <?php if (!empty($category['table_headers'])): ?>
                                    <thead>
                                        <tr>
                                            <?php foreach ($category['table_headers'] as $header): ?>
                                                <th scope="col"><?= htmlspecialchars($header, ENT_QUOTES, 'UTF-8') ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                <?php endif; ?>
                                <tbody>
                                    <?php foreach ($category['table'] as $row): ?>
                                        <tr>
                                            <?php foreach ($row as $cell): ?>
                                                <td><?= htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </article>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="assets/js/navegador-secciones.js?v=7" defer></script>

<?php require __DIR__.'/includes/pie.php'; ?>
