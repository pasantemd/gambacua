<?php
$tituloPagina = 'Filtración por membrana';
require __DIR__.'/includes/encabezado.php';
require __DIR__.'/includes/datos-filtracion-membrana.php';

introduccionPagina(
    'Filtración por membrana',
    'Soluciones para procesos de concentración, recuperación y análisis microbiológico por membrana en agua y bebidas.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Filtración por membrana', 'url' => null]
    ]
);
?>

<div class="culture-media-page">
    <div class="wrap section-layout culture-media-layout">
        <nav class="section-rail culture-media-jump" data-section-rail aria-label="Subcategorías de filtración por membrana">
            <div class="section-rail-list">
<?php foreach ($categoriasFiltracion as $index => $category): ?>
                    <a href="#<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>"<?= $index === 0 ? ' class="is-active" aria-current="location"' : '' ?>>
                        <span><?= htmlspecialchars($category['rail_title'] ?? $category['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?= icon('arrow-right') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="culture-media-list">
<?php foreach ($categoriasFiltracion as $index => $category): ?>
            <?php if ($category['id'] === 'filtros'): ?>
                <article class="culture-media-card culture-media-card-filtros" id="filtros">
                    <div class="filtros-card-inner">
                        <header class="filtros-header">
                            <h2>Filtros</h2>
                        </header>

                        <!-- Diagrama Anatómico de la Unidad de Filtración -->
                        <div class="filtros-diagram-wrapper">
                            <div class="filtros-diagram-stage filtros-diagram-stage-composite">
                                <figure class="filtros-diagram-visual">
                                    <img
                                        src="assets/images/filtracion-membrana/diagrama-sistema-filtracion-transparente.webp?v=3"
                                        alt="Sistema de filtración con tapa removible, embudo medidor, adaptador, tapón y membrana MCE cuadriculada"
                                        class="filtros-diagram-img"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </figure>

                                <!-- SVG Leader Lines con guiones y puntos exactos del PDF -->
                                <svg class="filtros-diagram-svg" viewBox="0 0 680 416" preserveAspectRatio="none" aria-hidden="true">
                                    <g class="filtros-lead-lines">
                                        <!-- 1. Tapa removible (De tapa superior derecha hacia la derecha y baja hacia el texto) -->
                                        <path d="M 432 57 L 565 57 L 565 98" />
                                        <!-- 2. Embudo medidor de filtro (De pared superior izquierda hacia la izquierda y baja hacia el texto) -->
                                        <path d="M 302 98 L 169 98 L 169 139" />
                                        <!-- 3. Adaptador del sistema de filtración (Horizontal directo al pico violeta) -->
                                        <path d="M 270 251 L 166 251" />
                                        <!-- 4. Tapón (Del lado derecho del tapón hacia la derecha y baja hacia el texto) -->
                                        <path d="M 188 330 L 239 330 L 239 357" />
                                        <!-- 5. Membrana MCE cuadrícula (De la cuadrícula hacia la derecha y baja hacia el texto) -->
                                        <path d="M 452 245 L 503 245 L 503 273" />
                                    </g>
                                    <g class="filtros-lead-dots">
                                        <!-- Tapa removible -->
                                        <circle cx="432" cy="57" r="4.5" />
                                        <circle cx="565" cy="98" r="4.5" />
                                        <!-- Embudo medidor -->
                                        <circle cx="302" cy="98" r="4.5" />
                                        <circle cx="169" cy="139" r="4.5" />
                                        <!-- Adaptador -->
                                        <circle cx="270" cy="251" r="4.5" />
                                        <circle cx="166" cy="251" r="4.5" />
                                        <!-- Tapón -->
                                        <circle cx="188" cy="330" r="4.5" />
                                        <circle cx="239" cy="357" r="4.5" />
                                        <!-- Membrana MCE -->
                                        <circle cx="452" cy="245" r="4.5" />
                                        <circle cx="503" cy="273" r="4.5" />
                                    </g>
                                </svg>

                                <!-- Callout Labels -->
                                <div class="filtros-callouts-layer">
                                    <div class="filtros-callout filtros-callout-tapa">
                                        <span>Tapa removible</span>
                                    </div>
                                    <div class="filtros-callout filtros-callout-embudo">
                                        <span>Embudo medidor<br>de filtro</span>
                                    </div>
                                    <div class="filtros-callout filtros-callout-adaptador">
                                        <span>Adaptador<br>del sistema<br>de filtración</span>
                                    </div>
                                    <div class="filtros-callout filtros-callout-tapon">
                                        <span>Tapón</span>
                                    </div>
                                    <div class="filtros-callout filtros-callout-membrana">
                                        <span>Membrana MCE<br>cuadrícula</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Fallback Chips (visible solo en pantallas pequeñas) -->
                            <div class="filtros-mobile-parts" aria-label="Componentes del sistema de filtración">
                                <?php foreach ($category['parts'] as $part): ?>
                                    <div class="filtros-mobile-chip">
                                        <span class="filtros-chip-dot" aria-hidden="true"></span>
                                        <span><?= htmlspecialchars($part, ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Sección de Conversión a Placa de Petri -->
                        <div class="filtros-conversion-section">
                            <h3 class="filtros-conversion-title"><?= htmlspecialchars($category['conversion_title'], ENT_QUOTES, 'UTF-8') ?></h3>
                            
                            <div class="filtros-conversion-grid">
                                <figure class="filtros-petri-visual">
                                    <img
                                        src="<?= htmlspecialchars($category['image_petri'], ENT_QUOTES, 'UTF-8') ?>"
                                        alt="<?= htmlspecialchars($category['image_petri_alt'], ENT_QUOTES, 'UTF-8') ?>"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </figure>

                                <div class="filtros-conversion-steps">
                                    <div class="filtros-badge-pill"><?= htmlspecialchars($category['conversion_badge'], ENT_QUOTES, 'UTF-8') ?></div>
                                    <ol class="filtros-steps-list">
                                        <?php foreach ($category['steps'] as $step): ?>
                                            <li>
                                                <span class="filtros-step-num"><?= htmlspecialchars($step['num'], ENT_QUOTES, 'UTF-8') ?></span>
                                                <span class="filtros-step-text"><?= htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8') ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <footer class="filtros-card-footer">
                            <p class="filtros-shelf-note-center">
                                <?= htmlspecialchars($category['shelf_life_note'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                        </footer>
                    </div>
                </article>
            <?php elseif ($category['id'] === 'dispensadores'): ?>
                <article class="culture-media-card culture-media-card-dispensadores" id="dispensadores">
                    <div class="dispensadores-card-inner">
                        <header class="dispensadores-header">
                            <h2><?= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                            <p class="dispensadores-lead"><?= htmlspecialchars($category['subtitle'], ENT_QUOTES, 'UTF-8') ?></p>
                        </header>

                        <!-- Selector interactivo de productos dividido por imágenes -->
                        <div class="dispensador-selector" role="tablist" aria-label="Productos de filtración y consumibles">
                            <?php foreach ($category['items'] as $i => $item): ?>
                                <button
                                    type="button"
                                    class="dispensador-tab<?= $i === 0 ? ' is-active' : '' ?>"
                                    role="tab"
                                    id="tab-<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                                    aria-controls="panel-<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    tabindex="<?= $i === 0 ? '0' : '-1' ?>"
                                    data-target="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                >
                                    <figure class="dispensador-tab-thumb">
                                        <img
                                            src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
                                            alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </figure>
                                    <span class="dispensador-tab-title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <!-- Paneles interactivos: Información a la izquierda, Imagen a la derecha -->
                        <div class="dispensador-panels-container">
                            <?php foreach ($category['items'] as $i => $item): ?>
                                <div
                                    class="dispensador-panel<?= $i === 0 ? ' is-active' : '' ?>"
                                    id="panel-<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    role="tabpanel"
                                    aria-labelledby="tab-<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                                    <?= $i !== 0 ? 'hidden' : '' ?>
                                >
                                    <!-- Lado Izquierdo: Información -->
                                    <div class="dispensador-info-col">
                                        <h3 class="dispensador-item-title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>

                                        <?php if (!empty($item['presentacion']) || !empty($item['cantidad']) || !empty($item['vida_util'])): ?>
                                            <dl class="dispensador-specs-list">
                                                <?php if (!empty($item['presentacion'])): ?>
                                                    <div class="dispensador-spec-item">
                                                        <dt>Presentación:</dt>
                                                        <dd><?= htmlspecialchars($item['presentacion'], ENT_QUOTES, 'UTF-8') ?></dd>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($item['cantidad'])): ?>
                                                    <div class="dispensador-spec-item">
                                                        <dt>Cantidad:</dt>
                                                        <dd><?= htmlspecialchars($item['cantidad'], ENT_QUOTES, 'UTF-8') ?></dd>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if (!empty($item['vida_util'])): ?>
                                                    <div class="dispensador-spec-item">
                                                        <dt>Vida útil:</dt>
                                                        <dd><?= htmlspecialchars($item['vida_util'], ENT_QUOTES, 'UTF-8') ?></dd>
                                                    </div>
                                                <?php endif; ?>
                                            </dl>
                                        <?php endif; ?>

                                    </div>

                                    <!-- Lado Derecho: Imagen del Producto -->
                                    <div class="dispensador-visual-col">
                                        <figure class="dispensador-main-visual">
                                            <img
                                                src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
                                                alt="<?= htmlspecialchars($item['image_alt'] ?? $item['title'], ENT_QUOTES, 'UTF-8') ?>"
                                                loading="eager"
                                                decoding="async"
                                            >
                                        </figure>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
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

                        <?php if (!empty($category['indicators'])): ?>
                            <section class="culture-media-indicators" aria-labelledby="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-indicators">
                                <h3 id="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>-indicators">Medios disponibles en viales</h3>
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
                                    <ul class="culture-media-application-list">
                                        <?php foreach ($category['applications'] as $application): ?>
                                            <?php if (is_array($application)): ?>
                                                <li class="culture-media-application">
                                                    <span class="culture-media-application-icon" aria-hidden="true"><?= icon($application['icon']) ?></span>
                                                    <span><?= htmlspecialchars($application['label'], ENT_QUOTES, 'UTF-8') ?></span>
                                                </li>
                                            <?php else: ?>
                                                <li><?= htmlspecialchars($application, ENT_QUOTES, 'UTF-8') ?></li>
                                            <?php endif; ?>
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
                            <h3><?= htmlspecialchars($category['table_title'] ?? 'Especificaciones técnicas', ENT_QUOTES, 'UTF-8') ?></h3>
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
<script src="assets/js/filtracion-membrana.js?v=2" defer></script>

<?php require __DIR__.'/includes/pie.php'; ?>
