<?php
/**
 * Gambacua - Catálogo Compact Dry & Lector Automatizado Compact Vision (compact-dry.php)
 * 
 * Presenta la gama completa de placas de medios deshidratados listos para usar
 * y el equipo lector de placas con Inteligencia Artificial.
 * 
 * Módulos integrados:
 * - includes/datos-compact-dry.php: Datos estructurados de placas y fichas técnicas.
 * - Buscador en tiempo real y filtrado por categorías microbiológicas.
 * - Modal accesible para consulta detallada de cada placa y descarga de PDFs.
 * - Sección de Compact Vision con tarjetas interactivas 3D Flip de beneficios.
 * - Guía ilustrada de 4 pasos de inoculación e incubación.
 * - Acordeón accesible de preguntas frecuentes (FAQ).
 */

$tituloPagina = 'Compact Dry';
require __DIR__.'/includes/encabezado.php';
$placas = require __DIR__.'/includes/datos-compact-dry.php';

// Construcción dinámica de rutas seguras para fichas técnicas y de seguridad en PDF
foreach ($placas as &$placa) {
    $codigo = $placa['codigo'];
    $guiaNombre = "Ficha técnica Compact Dry {$codigo}.pdf";
    $fichaNombre = "FICHA DE SEGURIDAD COMPACT DRY {$codigo}.pdf";
    $placa['guiaTecnica'] = 'assets/documentos/compact-dry/guias-tecnicas/' . rawurlencode($guiaNombre);
    $placa['fichaTecnica'] = 'assets/documentos/compact-dry/fichas-seguridad/' . rawurlencode($fichaNombre);
}
unset($placa);

introduccionPagina(
    'Compact Dry',
    'Soluciones para control microbiológico: placas de medios de cultivo deshidratados listos para usar y lector automatizado con Inteligencia Artificial.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Compact Dry & Compact Vision', 'url' => null]
    ]
);
?>

<!-- ==========================================================
     SECCIÓN 1: PLACAS COMPACT DRY
     ========================================================== -->
<div class="wrap section-layout cd-page-layout">
<nav class="section-rail cd-section-nav" data-section-rail aria-label="Secciones de Compact Dry">
    <div class="section-rail-list">
        <a href="#seccion-placas" class="is-active" id="tab-nav-placas" aria-current="true">
            <span>Placas Compact Dry</span>
            <?= icon('arrow-right') ?>
        </a>
        <a href="#compact-vision" id="tab-nav-vision" aria-current="false">
            <span>Lector Compact Vision</span>
            <?= icon('arrow-right') ?>
        </a>
        <a href="#ec-blue" id="tab-nav-ec-blue" aria-current="false">
            <span>EC Blue</span>
            <?= icon('arrow-right') ?>
        </a>
        <a href="#faq" aria-current="false">
            <span>Preguntas frecuentes</span>
            <?= icon('arrow-right') ?>
        </a>
    </div>
</nav>

<div class="cd-section-content">

<div id="seccion-placas" class="cd-main-section">
    <!-- Banner de Placas Compact Dry -->
    <section class="wrap">
        <div class="cd-hero-banner">
            <div class="cd-hero-inner">
                <div class="cd-hero-content">
                    <h2 class="cd-hero-title">Placas Compact Dry</h2>
                    <p class="cd-hero-lead">
                        Placas de medios de cultivo deshidratados listas para usar en análisis microbiológicos de alimentos, aguas, mariscos, piensos y superficies ambientales. Diseñadas para simplificar la siembra sin necesidad de preparación de medios y acelerar la toma de decisiones.
                    </p>
                </div>
                <div class="cd-hero-capsules">
                    <span class="cd-hero-capsule"><?= icon('check') ?> 1 ml inoculación autodifundible</span>
                    <span class="cd-hero-capsule"><?= icon('check') ?> 1–30 °C almacenamiento a temperatura ambiente</span>
                    <span class="cd-hero-capsule"><?= icon('check') ?> Certificaciones AOAC, MicroVal y NordVal</span>
                    <span class="cd-hero-capsule"><?= icon('check') ?> 19 microorganismos y matrices analíticas</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Catálogo de Placas Compact Dry -->
    <section class="wrap cd-catalog-section" id="placas">
        <div class="cd-catalog-header">
            <div class="cd-catalog-title-row">
                <div>
                    <h2>Catálogo de Placas Compact Dry</h2>
                </div>
                <div class="cd-count-badge" aria-live="polite">
                    Mostrando <span id="cd-visible-count"><?= min(10, count($placas)) ?></span> de <span id="cd-filtered-count"><?= count($placas) ?></span> placas
                </div>
            </div>

            <div class="cd-catalog-toolbar">
                <label class="cd-search-bar" for="cd-search-input">
                    <span class="cd-search-icon" aria-hidden="true"><?= icon('search') ?></span>
                    <span class="sr-only">Buscar placas Compact Dry</span>
                    <input
                        class="cd-search-input"
                        id="cd-search-input"
                        type="search"
                        placeholder="Buscar por placa, código, microorganismo o matriz"
                        autocomplete="off"
                    >
                    <button class="cd-search-clear" id="cd-search-clear" type="button" aria-label="Limpiar búsqueda" hidden>
                        <?= icon('x') ?>
                    </button>
                </label>
            </div>
        </div>

        <!-- Grid de Placas -->
        <div class="cd-plates-grid" id="cd-plates-container">
            <?php foreach ($placas as $p): ?>
                <?php
                $searchText = $p['codigo'] . ' ' . $p['nombre'] . ' ' . $p['organismo'] . ' ' . $p['descripcionCorta'] . ' ' . $p['matriz'];
                $jsonPlaca = htmlspecialchars(json_encode($p, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');
                ?>
                <article
                    class="cd-plate-card cd-plate-clickable"
                    role="button"
                    tabindex="0"
                    data-category="<?= $p['categoria'] ?>"
                    data-search-text="<?= htmlspecialchars($searchText, ENT_QUOTES, 'UTF-8') ?>"
                    data-plate-data="<?= $jsonPlaca ?>"
                    aria-haspopup="dialog"
                    aria-label="Ver ficha técnica de <?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?>"
                >
                    <div class="cd-card-top">
                        <span class="cd-card-badge"><?= $p['codigo'] ?></span>
                    </div>
                    <div class="cd-card-media">
                        <img
                            src="<?= $p['imagen'] ?>"
                            alt="<?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?>"
                            loading="lazy"
                        >
                    </div>
                    <div class="cd-card-body">
                        <h3 class="cd-card-title"><?= $p['nombre'] ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Estado vacío si la búsqueda no arroja resultados -->
        <nav class="cd-pagination" id="cd-pagination" aria-label="Paginación del catálogo de placas"></nav>

        <div id="cd-empty-state" class="cd-empty-state" style="display: none;">
            <div class="cd-empty-icon" aria-hidden="true"><?= icon('search') ?></div>
            <h3>No se encontraron placas con ese criterio</h3>
            <p>Intenta con otro microorganismo, código o restablece los filtros para ver todo el catálogo.</p>
            <button type="button" id="cd-empty-reset-btn" class="cd-empty-reset-btn">
                Restablecer filtros
            </button>
        </div>

    </section>
</div>

<!-- ==========================================================
     SECCIÓN 2: LECTOR COMPACT VISION
     ========================================================== -->
<section class="wrap compact-vision-section cd-main-section" id="compact-vision">
    <div class="cv-container">
        <!-- 1. Encabezado Principal y Grid Visual Superior Compactado -->
        <div class="cv-grid">
            <!-- Columna de Información -->
            <div class="cv-info-col">
                <h2 class="cv-title">
                    <img
                        src="assets/images/compact-dry/logo-compact-vision-white.webp"
                        alt="Compact Vision"
                        class="cv-brand-logo"
                        width="320"
                        height="114"
                        loading="lazy"
                        decoding="async"
                    >
                </h2>
                <p class="cv-intro-lead">
                    Automatiza la lectura e interpretación de placas Compact Dry®. Garantiza trazabilidad fotográfica inalterable y centraliza los resultados en la nube en tiempo real.
                </p>

                <!-- Botones de Acción -->
                <div class="cv-action-group">
                    <div class="cv-action-links">
                        <a
                            href="https://compact-vision-hub.vercel.app/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="cv-hub-btn"
                        >
                            Abrir Compact Vision Hub <?= icon('diagonal') ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Columna Visual: Showcase Stage del Lector -->
            <div class="cv-visual-col">
                <div class="cv-stage-card">
                    <div class="cv-stage-screen">
                        <div class="cv-stage-pedestal" aria-hidden="true"></div>
                        <img
                            src="assets/images/compact-dry/compact-vision-angulo-02.webp"
                            alt="Lector de placas Compact Vision con Inteligencia Artificial"
                            class="cv-stage-img"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Beneficios Operativos para el Laboratorio (Tarjetas Interactivas 3D Flip) -->
        <div class="cv-benefits-block">
            <h3 class="cv-block-title">
                Beneficios operativos en tu laboratorio
            </h3>
            <!-- Cuadrícula de tarjetas con giro 3D (hover/focus/touch) y cortes angulares Gambacua -->
            <div class="cv-benefits-grid">
                <!-- Beneficio 1: Diseño simple -->
                <div class="cv-benefit-card">
                    <div class="cv-benefit-card-inner">
                        <div class="cv-benefit-card-front"><div class="cv-benefit-badge"><?= icon('touch') ?></div><h4>Diseño simple</h4></div>
                        <div class="cv-benefit-card-back"><h4>Diseño simple</h4><p>Ajuste perfecto para placas Compact Dry e interfaz táctil intuitiva.</p></div>
                    </div>
                </div>

                <!-- Beneficio 2: Conteo en tiempo real -->
                <div class="cv-benefit-card">
                    <div class="cv-benefit-card-inner">
                        <div class="cv-benefit-card-front"><div class="cv-benefit-badge"><?= icon('gauge') ?></div><h4>Conteo en tiempo real</h4></div>
                        <div class="cv-benefit-card-back"><h4>Conteo en tiempo real</h4><p>Resultados en 1 segundo o menos con IA calibrada para Compact Dry.</p></div>
                    </div>
                </div>

                <!-- Beneficio 3: Diseño compacto -->
                <div class="cv-benefit-card">
                    <div class="cv-benefit-card-inner">
                        <div class="cv-benefit-card-front"><div class="cv-benefit-badge"><?= icon('square') ?></div><h4>Diseño compacto</h4></div>
                        <div class="cv-benefit-card-back"><h4>Diseño compacto</h4><p>Ocupa poco espacio en el banco sin perder capacidad analítica.</p></div>
                    </div>
                </div>

                <!-- Beneficio 4: Trazabilidad con imágenes -->
                <div class="cv-benefit-card">
                    <div class="cv-benefit-card-inner">
                        <div class="cv-benefit-card-front"><div class="cv-benefit-badge"><?= icon('cloud-sync') ?></div><h4>Trazabilidad con imágenes</h4></div>
                        <div class="cv-benefit-card-back"><h4>Trazabilidad con imágenes</h4><p>Registros en la nube para revisión, historial, notas y soporte de auditoría.</p></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 3. Recursos Técnicos y Documentación Descargable -->
        <div class="cv-resources-block">
            <h3 class="cv-block-title">Documentación oficial y recursos técnicos</h3>
            <p class="cv-resources-intro">Consulta y descarga los documentos oficiales con especificaciones técnicas, protocolos de operación y guías de usuario:</p>
            <div class="cv-resources-grid">
                <a
                    href="https://compact-dry.com/assets/documentos/MATERIAL%20PUBLICITARIO%20LECTOR.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="cv-resource-card"
                >
                    <div class="cv-resource-info">
                        <strong>Material Publicitario Oficial (PDF)</strong>
                        <span>Folleto técnico comercial con características detalladas, dimensiones y prestaciones.</span>
                    </div>
                    <span class="cv-resource-badge">Descargar PDF <?= icon('diagonal') ?></span>
                </a>

                <a
                    href="https://compact-dry.com/assets/documentos/manuales/manual-compact-vision-compressed.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="cv-resource-card"
                >
                    <div class="cv-resource-info">
                        <strong>Manual de Usuario Compact Vision (PDF)</strong>
                        <span>Guía de instalación, calibración, conectividad y mantenimiento del equipo lector.</span>
                    </div>
                    <span class="cv-resource-badge">Descargar PDF <?= icon('diagonal') ?></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================
     SECCIÓN 3: EC BLUE® (ANÁLISIS MICROBIOLÓGICO EN AGUA)
     ========================================================== -->
<section class="wrap ec-blue-section cd-main-section" id="ec-blue">
    <div class="ec-blue-container">
        <!-- 1. Encabezado Principal y Presentación de Catálogo EC BLUE -->
        <header class="ec-blue-hero">
            <div class="ec-blue-hero-grid">
                <div class="ec-blue-hero-info">
                    <h2 class="ec-blue-title">EC BLUE</h2>
                    <p class="ec-blue-lead">
                        EC Blue se desarrolló con base en el método de cultivo por sustrato enzimático específico para la detección de <em>E. coli</em> y coliformes en agua.
                    </p>
                </div>
            </div>
        </header>


        <!-- ==========================================================
             CATEGORÍA 1: EC Blue para detección de Coliformes y Escherichia coli en aguas
             ========================================================== -->
        <article class="ec-category-card" id="cat-deteccion-agua">
            <!-- Cabecera de Producto: Galería + Información Principal + Documentos -->
            <div class="ec-product-header">
                <!-- Galería Interactiva con Miniaturas -->
                <div class="ec-detalle-galeria" data-ec-blue-gallery>
                    <figure class="ec-detalle-galeria__principal">
                        <span class="ec-detalle-galeria__marco">
                            <img
                                src="assets/images/ec-blue/ec-blue-2.webp"
                                alt="Comparación de resultados EC Blue bajo luz natural"
                                data-ec-blue-main-image
                                decoding="async"
                            >
                        </span>
                        <figcaption data-ec-blue-main-caption>Comparación bajo luz natural</figcaption>
                    </figure>

                    <div class="ec-detalle-galeria__miniaturas" aria-label="Imágenes de EC Blue para detección de Coliformes y Escherichia coli en aguas">
                        <button
                            class="ec-detalle-miniatura ec-detalle-miniatura--activa"
                            type="button"
                            data-ec-blue-thumbnail
                            data-image="assets/images/ec-blue/ec-blue-2.webp"
                            data-alt="Comparación de resultados EC Blue bajo luz natural"
                            data-caption="Comparación bajo luz natural"
                            aria-label="Mostrar Comparación bajo luz natural"
                            aria-pressed="true"
                        >
                            <img src="assets/images/ec-blue/ec-blue-2.webp" alt="" loading="lazy" decoding="async">
                            <span>Comparación bajo luz natural</span>
                        </button>

                        <button
                            class="ec-detalle-miniatura"
                            type="button"
                            data-ec-blue-thumbnail
                            data-image="assets/images/ec-blue/ec.-blue.webp"
                            data-alt="Comparación de resultados EC Blue bajo luz ultravioleta"
                            data-caption="Comparación bajo luz UV"
                            aria-label="Mostrar Comparación bajo luz UV"
                            aria-pressed="false"
                        >
                            <img src="assets/images/ec-blue/ec.-blue.webp" alt="" loading="lazy" decoding="async">
                            <span>Comparación bajo luz UV</span>
                        </button>
                    </div>
                </div>

                <!-- Información Principal de Producto -->
                <div class="ec-producto-informacion">
                    <h3 class="ec-category-title">EC Blue para detección de Coliformes y Escherichia coli en aguas</h3>
                    
                    <div class="ec-producto-descripcion">
                        <h4 class="ec-subheading">Descripción</h4>
                        <div class="ec-prosa">
                            <p>
                                Tanto el Ministerio de Salud, Trabajo y Bienestar (MHLW) en 2003 como la Asociación de Obras Hidráulicas de Japón (JWWA) en 2001 aprobaron oficialmente EC Blue como uno de los métodos oficiales para la detección de <em>Escherichia coli</em> y coliformes en el agua. EC Blue se desarrolló con base en el método de cultivo por sustrato enzimático específico para la detección de <em>E. coli</em> y coliformes en agua.
                            </p>
                        </div>
                    </div>

                    <!-- Documentos Oficiales Descargables -->
                    <div class="ec-documentos" aria-label="Documentos técnicos">
                        <a class="ec-documento" href="assets/documentos/compact-dry/fichas-seguridad/Hoja%20de%20seguridad%20EC%20Blue.pdf" target="_blank" rel="noopener">
                            <?= icon('file-text') ?>
                            <span class="ec-documento__texto">
                                <strong>Ficha de Seguridad</strong>
                                <small>PDF <?= icon('diagonal') ?></small>
                            </span>
                        </a>

                        <a class="ec-documento" href="assets/documentos/compact-dry/guias-tecnicas/Ficha%20Tecnica%20EC%20Blue%20100P.100%20Cualitativo.pdf" target="_blank" rel="noopener">
                            <?= icon('file-text') ?>
                            <span class="ec-documento__texto">
                                <strong>Guía Técnica</strong>
                                <small>PDF <?= icon('diagonal') ?></small>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Base del método -->
            <section class="ec-detalle-seccion">
                <h4 class="ec-seccion-titulo">Base del método</h4>
                <div class="ec-prosa">
                    <p>
                        El sustrato de la enzima colorimétrica, Xgal (5-bromo-4-cloro-3-indolil-β-D galactopiranósido) en el medio se descompone para resaltar el color azul / azul-verde por la β-galactosidasa generada específicamente por coliformes. También MUG (4-Metil-Umbeliferil-β-D-Glucurónido) en el medio se descompone por la β-Glucuronidasa que genera <em>E. coli</em> específicamente, para aislar un sustrato de fluorescencia de 4-Metil-Umbeliferona.
                    </p>
                    <p>
                        La serie EC Blue se presenta en un paquete especial a presión (EC Blue 100P) o una botella desechable (EC Blue 100). Estos paquetes se esterilizan mediante irradiación de electrones; por lo tanto, no es necesaria la preparación del medio. El procedimiento de prueba de EC Blue 100P es muy simple y solo se agrega a la muestra de prueba. Además, el procedimiento de prueba de EC Blue 100 y 10 es simple: se agrega la muestra de agua en las botellas o tubos.
                    </p>
                </div>
            </section>


            <!-- Presentaciones de EC blue / Procedimientos de operación -->
            <section class="ec-detalle-seccion">
                <h4 class="ec-seccion-titulo">Presentaciones de EC blue</h4>
                <div class="ec-procedimientos-grid">
                    <!-- Procedimiento 1: EC Blue 100P -->
                    <article class="ec-procedimiento-card">
                        <figure class="ec-procedimiento-figura">
                            <img
                                src="assets/images/ec-blue/EC-BLUE-100P.webp"
                                alt="Paquetes EC Blue 100P"
                                loading="lazy"
                                decoding="async"
                            >
                            <figcaption>EC Blue 100P</figcaption>
                        </figure>
                        <div class="ec-procedimiento-cuerpo">
                            <h5>Procedimiento de operación EC Blue 100P para prueba cualitativa de 100 ml</h5>
                            <ol class="ec-pasos-lista">
                                <li><span>Separe una pieza del paquete Snap de los 5 paquetes de acoplamiento.</span></li>
                                <li><span>Prepare un tubo de cultivo esterilizado (botella). Dispense 100 ml de la muestra capturada limpia de la botella de recolección en un tubo de cultivo esterilizado (botella).</span></li>
                                <li><span>Consulte las siguientes figuras y agregue un paquete de EC Blue 100P en el tubo de cultivo (botella). Apriete la tapa y agite bien para disolver el medio en la muestra de agua.</span></li>
                                <li><span>Juzgue el cambio de color (azul – azul verde) del medio después de 24 horas de incubación a 35 – 37 ℃. Cuando confirme el cambio de color azul-azul verde, verifique la fluorescencia adicionalmente (para la detección de <em>E. coli</em> ).</span></li>
                            </ol>
                        </div>
                    </article>

                    <!-- Procedimiento 2: EC Blue 100 -->
                    <article class="ec-procedimiento-card">
                        <figure class="ec-procedimiento-figura">
                            <img
                                src="assets/images/ec-blue/EC-BLUE-100.webp"
                                alt="Frascos EC Blue 100"
                                loading="lazy"
                                decoding="async"
                            >
                            <figcaption>EC Blue 100</figcaption>
                        </figure>
                        <div class="ec-procedimiento-cuerpo">
                            <h5>Procedimiento de operación EC Blue 100 para prueba cualitativa de 100 ml</h5>
                            <ol class="ec-pasos-lista">
                                <li><span>Prepare EC Blue 100 (botella) y dispense 100 ml de muestra de prueba en la botella en condiciones de esterilización. El frasco está graduado con una marca de 100 ml en la circunferencia.</span></li>
                                <li><span>Apriete la tapa y agite bien para disolver el medio en la muestra de agua.</span></li>
                                <li><span>Evalúe el cambio de color (azul – azul verde) del medio después de 24 horas de incubación a 35 – 37 ℃. Cuando confirme el cambio de color azul-azul verde, verifique la fluorescencia adicionalmente (para la detección de <em>E. coli</em> ).</span></li>
                            </ol>
                        </div>
                    </article>

                    <!-- Procedimiento 3: EC Blue 10 -->
                    <article class="ec-procedimiento-card">
                        <figure class="ec-procedimiento-figura">
                            <img
                                src="assets/images/ec-blue/EC-BLUE-10.webp"
                                alt="Tubos EC Blue 10"
                                loading="lazy"
                                decoding="async"
                            >
                            <figcaption>EC Blue 10</figcaption>
                        </figure>
                        <div class="ec-procedimiento-cuerpo">
                            <h5>Procedimiento de operación EC Blue 10 para prueba cuantitativa (NMP) de 10 ml</h5>
                            <ol class="ec-pasos-lista">
                                <li><span>Prepare una serie de diluciones de 10 veces asépticamente (consulte el método NMP en los documentos oficiales emitidos).</span></li>
                                <li><span>Dispense 10 mL de muestra diluida en cada tubo. El tubo está graduado en una marca de 10 ml en la circunferencia.</span></li>
                                <li><span>Apriete la tapa y agite bien para disolver el medio en la muestra de agua.</span></li>
                            </ol>
                        </div>
                    </article>
                </div>
            </section>

            <!-- Interpretación de resultados -->
            <section class="ec-detalle-seccion">
                <h4 class="ec-seccion-titulo">Interpretación de resultados</h4>
                <div class="ec-interpretacion-grid">
                    <article class="ec-interpretacion-card">
                        <div class="ec-interpretacion-head">
                            <h5>Para coliformes</h5>
                        </div>
                        <p>
                            Si el color del medio de cultivo (azul – verde azulado) es más oscuro o igual que el comparador de color EC Blue bajo luz natural, determine el resultado de la prueba como “Coliformes positivos”.
                        </p>
                    </article>

                    <article class="ec-interpretacion-card">
                        <div class="ec-interpretacion-head">
                            <h5>Para <em>E. coli</em></h5>
                        </div>
                        <p>
                            Cuando confirme el cambio de color azul-azul verde, compruebe la fluorescencia adicionalmente bajo una lámpara UV de 365 nm. Si la fluorescencia de la muestra es más fuerte o igual a la del comparador EC Blue con una lámpara UV de 365 nm, determine el resultado de la prueba como “<em>E. coli</em> positivo”.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Almacenamiento y vida útil -->
            <section class="ec-detalle-seccion ec-storage-section">
                <h4 class="ec-seccion-titulo">Almacenamiento y vida útil</h4>
                <div class="ec-almacenamiento-grid">
                    <article class="ec-almacenamiento-card">
                        <div class="ec-almacenamiento-icon-wrap">
                            <?= icon('thermometer') ?>
                        </div>
                        <h5>Almacenamiento</h5>
                        <p>Mantener a temperatura ambiente (1-30 ℃), en la oscuridad.</p>
                    </article>

                    <article class="ec-almacenamiento-card">
                        <div class="ec-almacenamiento-icon-wrap">
                            <?= icon('calendar') ?>
                        </div>
                        <h5>Duración</h5>
                        <dl class="ec-duracion-lista">
                            <div class="ec-duracion-item">
                                <dt>EC Blue 100P</dt>
                                <dd>Dos (2) años después de la fabricación</dd>
                            </div>
                            <div class="ec-duracion-item">
                                <dt>EC Blue 100</dt>
                                <dd>Dos (2) años después de la fabricación</dd>
                            </div>
                            <div class="ec-duracion-item">
                                <dt>EC Blue 10</dt>
                                <dd>Un (1) año después de la fabricación</dd>
                            </div>
                        </dl>
                    </article>
                </div>
            </section>
        </article>

        <!-- ==========================================================
             CATEGORÍA 2: Placa EC Blue para NMP
             ========================================================== -->
        <article class="ec-category-card" id="cat-plato-nmp">
            <!-- Cabecera de Producto: Imagen Principal + Información + Documentos -->
            <div class="ec-product-header">
                <div class="ec-nmp-galeria">
                    <div class="ec-nmp-galeria__principal">
                        <img
                            src="assets/images/ec-blue/EC-Blue-plato-para-MPN-scaled.webp"
                            alt="Placa EC Blue para NMP bajo luz natural y luz UV"
                            decoding="async"
                            loading="lazy"
                        >
                    </div>
                </div>

                <div class="ec-producto-informacion">
                    <h3 class="ec-category-title">Placa EC Blue para NMP</h3>
                    <div class="ec-producto-descripcion">
                        <h4 class="ec-subheading">Descripción</h4>
                        <div class="ec-prosa">
                            <p>
                                Con dos simples pasos, la placa EC Blue para NMP se puede utilizar para completar la complicada medición cuantitativa que requiere muchos tubos de ensayo en los métodos tradicionales.
                            </p>
                        </div>
                    </div>

                    <!-- Documentos Oficiales Descargables -->
                    <div class="ec-documentos" aria-label="Documentos técnicos">
                        <a class="ec-documento" href="assets/documentos/compact-dry/guias-tecnicas/Ficha%20Tecnica%20EC%20Blue%20para%20NMP.pdf" target="_blank" rel="noopener">
                            <?= icon('file-text') ?>
                            <span class="ec-documento__texto">
                                <strong>Guía Técnica</strong>
                                <small>PDF <?= icon('diagonal') ?></small>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Placa patentada -->
            <section class="ec-detalle-seccion ec-nmp-recurso-seccion">
                <h4 class="ec-seccion-titulo">Placa patentada</h4>
                <figure class="ec-nmp-recurso">
                    <img
                        src="assets/images/ec-blue/EC-Blue-plato-para-MPN-1.webp"
                        alt="Placa patentada EC Blue para NMP"
                        loading="lazy"
                        decoding="async"
                    >
                </figure>
            </section>

            <!-- Procedimiento de prueba -->
            <section class="ec-detalle-seccion">
                <h4 class="ec-seccion-titulo">Procedimiento de prueba</h4>
                <ol class="ec-nmp-pasos">
                    <li><span>Utilice EC Blue 100 / 100P para preparar la solución de EC Blue de 100 ml con la muestra de agua mezclada.</span></li>
                    <li><span>Vierta los 100 mL EC Blue preparados en la sección inclinada de la placa (como lo indican las líneas de puntos azules en la figura de la derecha). Asegúrese de que cada celda (0.1 mL, 1.0 mL y 10 mL) esté completamente llena con la solución EC Blue. Se acumula un exceso de solución en la parte de almacenamiento de líquido (como lo indica la parte superior en la figura de la derecha).</span></li>
                    <li><span>Cubra el recipiente para evitar derrames. Mueva con cuidado el recipiente a una cámara termostática y cultive durante 24 horas a una temperatura de 35 a 37 ℃.</span></li>
                    <li><span>Después del cultivo, use una lámpara UV para generar rayos UV de 366 nm, exponga el recipiente a los rayos UV y confirme si se observa fluorescencia. Si existe un contraste evidente entre el medio de cultivo y la solución de color, se considera positivo para <em>E. coli</em>; si el contraste no es obvio, se considera <em>E. coli</em> negativo.</span></li>
                </ol>
            </section>


            <!-- Interpretación del análisis EC Blue (Diagrama de flujo interactivo) -->
            <section class="diagrama-ec-blue" aria-labelledby="titulo-diagrama-ec-blue" data-diagrama-ec-blue>
                <header class="diagrama-ec-blue__encabezado">
                    <h4 id="titulo-diagrama-ec-blue">Interpretación del análisis EC Blue</h4>
                </header>

                <div class="diagrama-ec-blue__flujo">
                    <ol class="diagrama-ec-blue__entradas">
                        <li>
                            <button class="diagrama-ec-blue__entrada" type="button" data-diagrama-entrada aria-pressed="false">
                                <span class="diagrama-ec-blue__tipo-prueba">Prueba cualitativa de 100 mL</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--muestra">Agua de muestra en recipiente de 100 mL</span>
                                <span class="diagrama-ec-blue__operador" aria-hidden="true">+</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--producto">EC Blue 100P</span>
                            </button>
                        </li>
                        <li>
                            <button class="diagrama-ec-blue__entrada" type="button" data-diagrama-entrada aria-pressed="false">
                                <span class="diagrama-ec-blue__tipo-prueba">Prueba cualitativa de 100 mL</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--producto">EC Blue 100</span>
                                <span class="diagrama-ec-blue__operador" aria-hidden="true">+</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--muestra">Agua de muestra 100 mL</span>
                            </button>
                        </li>
                        <li>
                            <button class="diagrama-ec-blue__entrada" type="button" data-diagrama-entrada aria-pressed="false">
                                <span class="diagrama-ec-blue__tipo-prueba">Prueba cuantitativa de 10 mL (NMP)</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--producto">EC Blue 10</span>
                                <span class="diagrama-ec-blue__operador" aria-hidden="true">+</span>
                                <span class="diagrama-ec-blue__bloque diagrama-ec-blue__bloque--muestra">Agua de muestra 10 mL</span>
                            </button>
                        </li>
                    </ol>

                    <svg class="diagrama-ec-blue__lineas diagrama-ec-blue__lineas--union" viewBox="0 0 1000 100" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M166 0V42H500M500 0V88M834 0V42H500"/>
                        <path class="diagrama-ec-blue__flecha" d="m488 76 12 12 12-12"/>
                    </svg>

                    <article class="diagrama-ec-blue__cultivo" data-diagrama-recorrido>
                        <strong>Cultivo</strong>
                        <span>38 ± 1 °C, durante 24–28 horas</span>
                    </article>

                    <svg class="diagrama-ec-blue__lineas diagrama-ec-blue__lineas--division" viewBox="0 0 1000 100" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M500 0V38H250V88M500 38H750V88"/>
                        <path class="diagrama-ec-blue__flecha" d="m238 76 12 12 12-12M738 76l12 12 12-12"/>
                    </svg>

                    <div class="diagrama-ec-blue__ramas">
                        <section class="diagrama-ec-blue__rama diagrama-ec-blue__rama--fluorescencia" aria-labelledby="rama-fluorescencia-titulo" data-diagrama-recorrido>
                            <header>
                                <h5 id="rama-fluorescencia-titulo">Observación de fluorescencia</h5>
                            </header>
                            <svg class="diagrama-ec-blue__ramificacion" viewBox="0 0 500 72" preserveAspectRatio="none" aria-hidden="true">
                                <path d="M250 0V28H125V65M250 28H375V65"/>
                            </svg>
                            <div class="diagrama-ec-blue__resultados">
                                <article>
                                    <span>Fluorescencia</span>
                                    <p><em>E. coli</em> <strong class="diagrama-ec-blue__positivo">Positivo</strong></p>
                                </article>
                                <article>
                                    <span>Sin fluorescencia</span>
                                    <p><em>E. coli</em> <strong class="diagrama-ec-blue__negativo">Negativo</strong></p>
                                </article>
                            </div>
                        </section>

                        <section class="diagrama-ec-blue__rama diagrama-ec-blue__rama--color" aria-labelledby="rama-color-titulo" data-diagrama-recorrido>
                            <header>
                                <h5 id="rama-color-titulo">Cambio de color del medio</h5>
                                <p>Verde azulado</p>
                            </header>
                            <svg class="diagrama-ec-blue__ramificacion" viewBox="0 0 500 72" preserveAspectRatio="none" aria-hidden="true">
                                <path d="M250 0V28H125V65M250 28H375V65"/>
                            </svg>
                            <div class="diagrama-ec-blue__resultados">
                                <article>
                                    <span>Cambio de color</span>
                                    <p>Coliformes <strong class="diagrama-ec-blue__positivo">Positivo</strong></p>
                                </article>
                                <article>
                                    <span>Sin cambio de color</span>
                                    <p>Coliformes <strong class="diagrama-ec-blue__negativo">Negativo</strong></p>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </article>
    </div>
</section>

<!-- ==========================================================
     SECCIÓN 4: PREGUNTAS FRECUENTES (COMPACT DRY & COMPACT VISION)
     ========================================================== -->
<section class="wrap cd-faq-section" id="faq">
    <div class="cd-faq-container">
        <div class="cd-faq-header">
            <h2 class="cd-faq-title">Preguntas Frecuentes</h2>
            <p class="cd-faq-intro">Respuestas a dudas comunes sobre el uso y almacenamiento de placas Compact Dry® y la operación de Compact Vision</p>
        </div>

        <div class="cd-faq-grid">
            <!-- 1. Placas compatibles -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Placas compatibles</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Solo Compact Dry®: TC, TCR, XSA, YM, YMR, ETB, EC, ETC, CF y ECO.</p>
                </div>
            </details>

            <!-- 2. Almacenamiento -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Almacenamiento</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Sube imágenes y resultados a una plataforma en la nube donde el laboratorio puede revisar, organizar y recuperar registros.</p>
                </div>
            </details>

            <!-- 3. Implementación -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Implementación</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>La mayoría de laboratorios empieza a usarlo poco después de la instalación y la capacitación. Depende de integrarlo en la rutina diaria.</p>
                </div>
            </details>

            <!-- 4. Capacitación -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Capacitación</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>La mayoría se adapta rápido, pero conviene dominar la lectura manual y automatizada de Compact Dry.</p>
                </div>
            </details>

            <!-- 5. Cuándo aporta más valor -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">¿Cuándo aporta más valor?</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Cuando el volumen de lectura hace que el conteo manual sea un cuello de botella, o cuando crecen las prioridades de trazabilidad y consistencia.</p>
                </div>
            </details>

            <!-- 6. Internet -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Internet</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Sí, requiere conexión por Ethernet o Wi-Fi. Recomiendan cable de red por estabilidad.</p>
                </div>
            </details>

            <!-- 7. ¿La nube es obligatoria? -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">¿La nube es obligatoria?</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Es la configuración estándar. Para otras configuraciones hay que contactarlos.</p>
                </div>
            </details>

            <!-- 8. Varias sedes -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Varias sedes</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>La nube permite revisar y gestionar resultados entre ubicaciones, con registros estandarizados.</p>
                </div>
            </details>

            <!-- 9. Varios equipos -->
            <details class="cd-faq-card">
                <summary class="cd-faq-summary">
                    <span class="cd-faq-question">Varios equipos</span>
                    <span class="cd-faq-chevron"><?= icon('chevron-down') ?></span>
                </summary>
                <div class="cd-faq-answer">
                    <p>Se pueden operar varios Compact Vision en paralelo. Todas las placas leídas quedan disponibles en el portal web.</p>
                </div>
            </details>
        </div>
    </div>
</section>

</div>
</div>

<!-- Modal de Ficha Técnica Detallada (Pop-up de Placa) -->
<div id="cd-detail-modal" class="cd-modal" role="dialog" aria-modal="true" aria-labelledby="cd-modal-title">
    <div class="cd-modal-overlay"></div>
    <div class="cd-modal-container">
        <button type="button" id="cd-modal-close" class="cd-modal-close" aria-label="Cerrar ventana">
            <?= icon('x') ?>
        </button>

        <div class="cd-modal-scrollable">
            <!-- 1. Tarjeta Superior: Galería de Ángulos e Información Principal -->
            <div class="cd-modal-hero-card">
                <div class="cd-modal-gallery">
                    <div class="cd-modal-main-view">
                        <img id="cd-modal-image" src="<?= htmlspecialchars($placas[0]['imagen'], ENT_QUOTES, 'UTF-8') ?>" alt="Placa Compact Dry" loading="lazy" decoding="async">
                    </div>
                    <div class="cd-modal-thumbs-col" id="cd-modal-thumbs">
                        <!-- Las miniaturas se cargan dinámicamente con la placa activa y ángulos de empaque -->
                    </div>
                </div>

                <div class="cd-modal-hero-info">
                    <h2 id="cd-modal-title" class="cd-modal-title">Compact Dry</h2>
                    <div class="cd-modal-organism-wrap">
                        <span id="cd-modal-organism" class="cd-modal-organism-pill">Organismo</span>
                    </div>
                    <p id="cd-modal-summary" class="cd-modal-summary"></p>

                    <div class="cd-modal-action-buttons">
                        <a id="cd-modal-guide-btn" href="#" target="_blank" rel="noopener" class="cd-btn-cut cd-btn-cut-primary">
                            <span class="cd-btn-cut-content">
                                <?= icon('file-text') ?>
                                <span>Guía Técnica</span>
                            </span>
                            <?= icon('diagonal') ?>
                        </a>
                        <a id="cd-modal-sheet-btn" href="#" target="_blank" rel="noopener" class="cd-btn-cut cd-btn-cut-outline">
                            <span class="cd-btn-cut-content">
                                <?= icon('file-text') ?>
                                <span>Ficha de Seguridad</span>
                            </span>
                            <?= icon('diagonal') ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Sección Descripción -->
            <div class="cd-modal-section">
                <h3 class="cd-modal-section-title">Descripción</h3>
                <div id="cd-modal-desc" class="cd-modal-desc"></div>
            </div>

            <!-- 3. Sección Especificaciones -->
            <div class="cd-modal-section">
                <h3 class="cd-modal-section-title">Especificaciones</h3>
                <div class="cd-modal-specs-box">
                    <div class="cd-specs-row">
                        <div class="cd-specs-key">Matriz</div>
                        <div class="cd-specs-val" id="cd-modal-matrix"></div>
                    </div>
                    <div class="cd-specs-row">
                        <div class="cd-specs-key">Temperatura y tiempo de incubación</div>
                        <div class="cd-specs-val" id="cd-modal-incubation"></div>
                    </div>
                    <div class="cd-specs-row">
                        <div class="cd-specs-key">Presentación</div>
                        <div class="cd-specs-val" id="cd-modal-presentation"></div>
                    </div>
                </div>
            </div>

            <!-- 4. Sección Modo de Uso -->
            <div class="cd-modal-section">
                <h3 class="cd-modal-section-title">Modo de uso</h3>
                <div class="cd-modal-steps-grid">
                    <div class="cd-step-card">
                        <span class="cd-step-badge">1</span>
                        <p class="cd-step-text">Retirar la cubierta.</p>
                    </div>
                    <div class="cd-step-card">
                        <span class="cd-step-badge">2</span>
                        <p class="cd-step-text">Deposite 1 ml de la muestra en el centro de la superficie de la placa Compact Dry.</p>
                    </div>
                    <div class="cd-step-card">
                        <span class="cd-step-badge">3</span>
                        <p class="cd-step-text">La muestra se dispersa automática y homogéneamente sobre la lámina, y transforma la lámina seca en un gel en pocos segundos.</p>
                    </div>
                    <div class="cd-step-card">
                        <span class="cd-step-badge">4</span>
                        <p class="cd-step-text">Vuelva a colocar la cubierta sobre la placa, incubar por tiempo prescrito.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Franja de Contacto / Asesoría Técnica -->
<section class="wrap contact-strip compact-contact-strip">
    <div>
        <h2>¿Requieres placas Compact Dry o demostración de Compact Vision?</h2>
        <p>Nuestro equipo de especialistas en inocuidad alimentaria te orientará con muestras, protocolos y cotizaciones para tu laboratorio o planta.</p>
    </div>
    <div class="compact-contact-actions">
        <a class="button button-light" href="contacto.php">Hablar con un asesor <?= icon('diagonal') ?></a>
    </div>
</section>

<!-- Script de interactividad -->
<script src="assets/js/compact-dry.js?v=11" defer></script>
<script src="assets/js/navegador-secciones.js?v=7" defer></script>

<?php require __DIR__.'/includes/pie.php'; ?>
