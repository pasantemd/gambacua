<?php
$tituloPagina = 'Ingredientes';
require __DIR__.'/includes/encabezado.php';
introduccionPagina(
    'Ingredientes',
    'Ovoproductos en polvo y pasteurizados para uso industrial y nutrición acuícola, con calidad constante y trazabilidad garantizada.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Ingredientes', 'url' => null]
    ],
    'assets/images/ovoproductos/BannerIngredientes.webp'
);
?>

<!-- 1. Introducción y Enfoque Industrial -->
<section class="wrap ingredients-intro-section">
    <div class="history-layout">
        <div>
            <h2>Ovoproductos pasteurizados para uso industrial y formulación acuícola</h2>
            <p class="lead">Soluciones en polvo de alto rendimiento desarrolladas específicamente para fabricantes de alimentos y plantas procesadoras.</p>
            <p>En Gambacua suministramos ovoproductos pasteurizados en polvo con calidad uniforme y trazabilidad garantizada lote a lote. Nuestra línea está orientada exclusivamente al sector industrial y a la fabricación de alimentos balanceados de alto valor nutricional, no al consumidor final.</p>
            <p>Gracias a su pureza y estabilidad microbiológica, nuestros ingredientes permiten a formuladores y plantas acuícolas mejorar la retención de nutrientes, la hidroestabilidad del pellet en agua y la palatabilidad general de las dietas.</p>
        </div>
        <figure class="media-slot has-image" style="min-height: 420px; clip-path: polygon(0 0,calc(100% - 22px) 0,100% 22px,100% 100%,0 100%);">
            <img src="assets/images/ovoproductos/proceso-polvo.webp" alt="Proceso de ovoproductos en polvo pasteurizados Gambacua" loading="lazy">
        </figure>
    </div>
</section>

<!-- 2. Catálogo de Ovoproductos -->
<section class="wrap ingredients-catalog-section">
    <div class="section-heading">
        <div>
            <h2>Nuestros Ovoproductos</h2>
            <p>Tres soluciones en polvo con especificaciones estandarizadas para formulaciones exigentes.</p>
        </div>
    </div>

    <div class="ingredient-grid">
        <article class="ingredient-card" id="huevo-entero">
            <div class="ingredient-card-media">
                <img src="assets/images/ovoproductos/huevo/00-egg-closed.webp" alt="Huevo entero deshidratado pasteurizado" loading="lazy">
            </div>
            <h3>Huevo Entero Deshidratado Pasteurizado</h3>
            <p>Huevo entero de gallina en polvo, obtenido mediante rotura mecánica aséptica y pasteurización térmica controlada. Proporciona una matriz integral y balanceada de proteínas nobles y lípidos naturales con digestibilidad superior.</p>
        </article>

        <article class="ingredient-card" id="clara">
            <div class="ingredient-card-media">
                <img src="assets/images/ovoproductos/huevo/03-egg-white.webp" alt="Clara deshidratada pasteurizada" loading="lazy">
            </div>
            <h3>Clara Deshidratada Pasteurizada</h3>
            <p>Clara de huevo en polvo con pureza y rendimiento constantes. Sobresale por su máxima concentración proteica, elevada solubilidad y un potente poder ligante natural para mejorar la hidroestabilidad y durabilidad de pellets en agua.</p>
        </article>

        <article class="ingredient-card" id="yema">
            <div class="ingredient-card-media">
                <img src="assets/images/ovoproductos/huevo/04-yolk.webp" alt="Yema deshidratada pasteurizada" loading="lazy">
            </div>
            <h3>Yema Deshidratada Pasteurizada</h3>
            <p>Yema en polvo pasteurizada con color, aroma y capacidad de emulsión consistentes. Fuente concentrada de energía digestible, ácidos grasos esenciales y lecitina natural para etapas críticas de desarrollo larval y engorde.</p>
        </article>
    </div>
</section>

<!-- 3. Planta de Producción y Flujo Controlado -->
<section class="wrap">
    <div class="plant-production-banner">
        <div class="plant-production-content">
            <h2>Planta de producción y flujo controlado en dos fases</h2>
            <p>Nuestra planta opera bajo un <strong>flujo controlado en dos fases</strong> que separa rigurosamente el área de procesamiento aséptico del área de secado y empaque final, eliminando cualquier posibilidad de contaminación cruzada.</p>
            <div class="capsule-list" style="margin-top: 24px;">
                <span class="capsule-item" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">Trazabilidad por lote</span>
                <span class="capsule-item" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">Control de calidad continuo</span>
                <span class="capsule-item" style="background: rgba(255,255,255,0.15); color: #fff; border-color: rgba(255,255,255,0.3);">Proceso estandarizado</span>
            </div>
        </div>
    </div>
</section>

<!-- 4. Certificaciones y Estándares de Calidad -->
<section class="wrap">
    <div class="certs-strip">
        <div class="certs-info">
            <h3>Estándares internacionales de inocuidad y calidad</h3>
            <p>El procesamiento y acondicionamiento de nuestros ovoproductos se rige por normativas internacionales de gestión de calidad, Buenas Prácticas de Manufactura (BPM) y protocolos HACCP.</p>
        </div>
        <div class="certs-badges">
            <img class="cert-row-img" src="assets/images/certificados/certificados.webp" alt="Certificados de Calidad e Inocuidad Alimentaria: SGS HACCP, BRC Food, Senasa, Halal, Kosher, Certified Humane" loading="lazy">
        </div>
    </div>
</section>

<!-- 5. Cintillo de Contacto -->
<section class="wrap contact-strip" style="margin-top: 40px;">
    <div>
        <h2>¿Requieres fichas técnicas, muestras o cotización?</h2>
        <p>Nuestro equipo técnico y comercial te orientará con los requerimientos exactos de tu planta u operación en México.</p>
    </div>
    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
        <a class="button button-light" href="contacto.php">Hablar con un asesor <?= icon('diagonal') ?></a>
    </div>
</section>

<?php require __DIR__.'/includes/pie.php'; ?>
