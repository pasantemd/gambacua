<?php
$tituloPagina = 'Medios de cultivo';
require __DIR__.'/includes/encabezado.php';
require __DIR__.'/includes/datos-medios-cultivo.php';

introduccionPagina(
    'Medios de cultivo',
    'Soluciones para preparación, recuperación y control microbiológico en distintas aplicaciones de laboratorio.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Medios de cultivo', 'url' => null]
    ]
);
?>

<div class="culture-media-page">
    <div class="wrap section-layout culture-media-layout">
        <nav class="section-rail culture-media-jump" data-section-rail aria-label="Subcategorías de medios de cultivo">
            <div class="section-rail-list">
<?php foreach ($categoriasMediosCultivo as $index => $category): ?>
                    <a href="#<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>"<?= $index === 0 ? ' class="is-active" aria-current="location"' : '' ?>>
                        <span><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?= icon('arrow-right') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="culture-media-list">
<?php foreach ($categoriasMediosCultivo as $index => $category): ?>
            <?php if ($category['id'] === 'listos-para-usar'): ?>
                <article class="culture-ready-minimal" id="listos-para-usar">
                    <header class="culture-minimal-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($category['summary'], ENT_QUOTES, 'UTF-8') ?></p>
                    </header>

                    <div class="culture-ready-showcase">
                        <section class="culture-ready-facts" aria-label="Características">
                            <h3>Características</h3>
                            <ul>
                                <?php foreach ($category['facts'] as $fact): ?>
                                    <li><?= icon('check') ?><span><?= htmlspecialchars($fact, ENT_QUOTES, 'UTF-8') ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </section>

                        <figure class="culture-ready-product">
                            <img
                                src="<?= htmlspecialchars($category['image'], ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($category['image_alt'], ENT_QUOTES, 'UTF-8') ?>"
                                loading="eager"
                                decoding="async"
                            >
                        </figure>

                        <section class="culture-ready-indicators" aria-labelledby="ready-indicators-title">
                            <h3 id="ready-indicators-title">Medios disponibles</h3>
                            <ul>
                                <?php foreach ($category['indicators'] as $indicator): ?>
                                    <li style="--indicator-color: <?= htmlspecialchars($indicator['color'], ENT_QUOTES, 'UTF-8') ?>">
                                        <span class="culture-media-indicator-dot" aria-hidden="true"></span>
                                        <span><small><?= htmlspecialchars($indicator['type'], ENT_QUOTES, 'UTF-8') ?></small><strong><?= htmlspecialchars($indicator['name'], ENT_QUOTES, 'UTF-8') ?></strong></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                    </div>
                </article>
            <?php elseif (in_array($category['id'], ['medios-deshidratados', 'medios-dosificados'], true)): ?>
                <article class="culture-media-card-minimal" id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
                    <header class="culture-minimal-header">
                        <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p>
                            <?php if (!empty($category['summary_html'])): ?>
                                <?= $category['summary_html'] ?>
                            <?php else: ?>
                                <?= htmlspecialchars($category['summary'], ENT_QUOTES, 'UTF-8') ?>
                            <?php endif; ?>
                        </p>
                    </header>

                    <div class="culture-minimal-showcase<?= !empty($category['applications']) ? ' has-details' : '' ?>">
                        <?php if (!empty($category['applications'])): ?>
                            <section class="culture-minimal-side culture-minimal-applications">
                                <h3>Aplicaciones</h3>
                                <ul>
                                    <?php foreach ($category['applications'] as $application): ?>
                                        <li><?= htmlspecialchars($application, ENT_QUOTES, 'UTF-8') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>

                        <div class="culture-minimal-product">
                            <figure class="culture-minimal-visual">
                                <img
                                    src="<?= htmlspecialchars($category['image'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="<?= htmlspecialchars($category['image_alt'], ENT_QUOTES, 'UTF-8') ?>"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </figure>
                            <p class="culture-minimal-life">Vida útil: <?= htmlspecialchars($category['shelf_life'], ENT_QUOTES, 'UTF-8') ?> a partir de la fecha de fabricación</p>
                        </div>

                        <?php if (!empty($category['applications'])): ?>
                            <section class="culture-minimal-side culture-minimal-solutions">
                                <h3>Soluciones</h3>
                                <ul>
                                    <?php foreach ($category['solutions'] as $solution): ?>
                                        <li><?= htmlspecialchars($solution, ENT_QUOTES, 'UTF-8') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($category['table'])): ?>
                        <div class="culture-minimal-table">
                            <h3>Productos dosificados y presentaciones</h3>
                            <div class="culture-media-table-scroll" tabindex="0" aria-label="Tabla desplazable de productos dosificados y presentaciones">
                                <table class="culture-media-table">
                                    <thead><tr><th>Descripción</th><th>Presentación</th><th>Descripción</th><th>Presentación</th></tr></thead>
                                    <tbody>
                                        <?php foreach ($category['table'] as $row): ?>
                                            <tr><?php foreach ($row as $cell): ?><td><?= htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') ?></td><?php endforeach; ?></tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                </article>
            <?php else: ?>
            <article class="culture-media-card<?= $index % 2 ? ' is-reversed' : '' ?><?= !empty($category['table']) ? ' has-table' : '' ?>" id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="culture-media-copy">
                    <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="culture-media-summary">
                        <?php if (!empty($category['summary_html'])): ?>
                            <?= $category['summary_html'] ?>
                        <?php else: ?>
                            <?= htmlspecialchars($category['summary'], ENT_QUOTES, 'UTF-8') ?>
                        <?php endif; ?>
                    </p>

                    <?php if (!empty($category['facts'])): ?>
                        <ul class="culture-media-facts">
                            <?php foreach ($category['facts'] as $fact): ?>
                                <li><?= icon('check') ?><span><?= htmlspecialchars($fact, ENT_QUOTES, 'UTF-8') ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($category['indicators'])): ?>
                        <section class="culture-media-indicators" aria-labelledby="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-indicators">
                            <h3 id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-indicators">Medios disponibles</h3>
                            <ul>
                                <?php foreach ($category['indicators'] as $indicator): ?>
                                    <li style="--indicator-color: <?= htmlspecialchars($indicator['color'], ENT_QUOTES, 'UTF-8') ?>">
                                        <span class="culture-media-indicator-dot" aria-hidden="true"></span>
                                        <span>
                                            <small><?= htmlspecialchars($indicator['type'], ENT_QUOTES, 'UTF-8') ?></small>
                                            <strong><?= htmlspecialchars($indicator['name'], ENT_QUOTES, 'UTF-8') ?></strong>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                    <?php endif; ?>

                    <?php if (!empty($category['applications'])): ?>
                        <div class="culture-media-structured">
                            <section class="culture-media-group" aria-labelledby="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-applications">
                                <h3 id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-applications">Aplicaciones</h3>
                                <ul>
                                    <?php foreach ($category['applications'] as $application): ?>
                                        <li><?= htmlspecialchars($application, ENT_QUOTES, 'UTF-8') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                            <section class="culture-media-group" aria-labelledby="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-solutions">
                                <h3 id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-solutions">Soluciones</h3>
                                <ul>
                                    <?php foreach ($category['solutions'] as $solution): ?>
                                        <li><?= htmlspecialchars($solution, ENT_QUOTES, 'UTF-8') ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        </div>
                    <?php endif; ?>

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
                </figure>

                <?php if (!empty($category['table'])): ?>
                    <div class="culture-media-table-block">
                        <h3>Productos dosificados y presentaciones</h3>
                        <div class="culture-media-table-scroll" tabindex="0" aria-label="Tabla desplazable de productos dosificados y presentaciones">
                            <table class="culture-media-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Presentación</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Presentación</th>
                                    </tr>
                                </thead>
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
