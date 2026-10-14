<?php
$tituloPagina = 'Inocuidad alimentaria';
require __DIR__.'/includes/encabezado.php';
introduccionPagina(
    'Inocuidad alimentaria',
    'Soluciones para control microbiológico, diagnóstico rápido y aseguramiento de calidad.',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => null]
    ],
    'assets/images/banner-inocuidad.webp'
);
?>

<?php
$inocuidadLines = [
    [
        'id' => 'medios-cultivo',
        'name' => 'Medios de cultivo',
        'icon' => 'plate',
        'description' => 'Formatos listos para usar, deshidratados y dosificados para distintas rutinas y estándares analíticos de laboratorio.',
        'url' => 'medios-cultivo.php',
        'cta' => 'Explorar catálogo de medios',
        'meta' => [
            [
                'label' => 'Listos para usar',
                'desc' => 'Viales preparados para agua y bebidas',
                'url' => 'medios-cultivo.php#listos-para-usar',
                'icon' => 'droplet'
            ],
            [
                'label' => 'Deshidratados',
                'desc' => 'Para alimentos, agua y farmacia',
                'url' => 'medios-cultivo.php#medios-deshidratados',
                'icon' => 'flask'
            ],
            [
                'label' => 'Dosificados',
                'desc' => 'Dosis prepesadas en packs universales',
                'url' => 'medios-cultivo.php#medios-dosificados',
                'icon' => 'box'
            ]
        ]
    ],
    [
        'id' => 'filtracion-membrana',
        'name' => 'Filtración por membrana',
        'icon' => 'filter',
        'description' => 'Soluciones para procesos de concentración, recuperación y análisis microbiológico por membrana en agua y bebidas.',
        'url' => 'filtracion-membrana.php',
        'cta' => 'Explorar catálogo de filtración',
        'meta' => [
            [
                'label' => 'Filtros',
                'desc' => 'Unidad de filtración y conversión a placa Petri',
                'url' => 'filtracion-membrana.php#filtros',
                'icon' => 'filter'
            ],
            [
                'label' => 'Dispensadores',
                'desc' => 'Dispensador automático y membranas continuas',
                'url' => 'filtracion-membrana.php#dispensadores',
                'icon' => 'cpu'
            ]
        ]
    ],
    [
        'id' => 'materiales-insumos',
        'name' => 'Materiales e insumos',
        'icon' => 'box',
        'description' => 'Consumibles especializados para respaldar las tareas continuas de preparación, muestreo y análisis.',
        'url' => 'materiales-insumos.php',
        'cta' => 'Explorar materiales e insumos',
        'meta' => [
            [
                'label' => 'Puntas para micropipetas',
                'desc' => 'Gradillas de 96 y a granel, estándar USP Clase VI',
                'url' => 'materiales-insumos.php#puntas-micropipetas',
                'icon' => 'pipette'
            ],
            [
                'label' => 'Bolsas de muestreo',
                'desc' => 'Modelos planos, THIO, Stand Up y con filtro',
                'url' => 'materiales-insumos.php#bolsas',
                'icon' => 'box'
            ],
            [
                'label' => 'Asas de inoculación',
                'desc' => 'Asas calibradas 1 y 10 µl y L-spreader azul',
                'url' => 'materiales-insumos.php#asas-inoculacion',
                'icon' => 'touch'
            ],
            [
                'label' => 'Tubos de centrífuga',
                'desc' => 'Microcentrífuga 1.5 ml y cónicos de 15 y 50 ml',
                'url' => 'materiales-insumos.php#tubos-centrifuga',
                'icon' => 'tube'
            ]
        ]
    ],
    [
        'id' => 'compact-dry',
        'name' => 'Compact Dry',
        'icon' => 'plate',
        'description' => 'Explora las placas Compact Dry, el lector Compact Vision y EC Blue para tus procesos de control microbiológico.',
        'url' => 'compact-dry.php',
        'cta' => 'Ver productos',
        'meta' => [
            [
                'label' => 'Medios deshidratados',
                'desc' => 'Placas listas para siembra',
                'url' => 'compact-dry.php#seccion-placas',
                'icon' => 'plate'
            ],
            [
                'label' => 'Compact Vision',
                'desc' => 'Lector automatizado de colonias',
                'url' => 'compact-dry.php#compact-vision',
                'icon' => 'cpu'
            ],
            [
                'label' => 'EC Blue',
                'desc' => 'Detección de coliformes y E. coli',
                'url' => 'compact-dry.php#ec-blue',
                'icon' => 'droplet'
            ]
        ]
    ],
    [
        'id' => 'micotoxinas',
        'name' => 'Micotoxinas',
        'icon' => 'shield-check',
        'description' => 'Alternativas analíticas confiables para apoyar la detección y el control estricto dentro de tus procesos.',
        'url' => 'micotoxinas.php',
        'cta' => 'Ver productos',
        'meta' => [
            [
                'label' => 'Biotech Bio-Shield',
                'desc' => 'Resultados en 5 minutos',
                'url' => 'micotoxinas.php#biotech-bio-shield',
                'icon' => 'shield-check'
            ],
            [
                'label' => 'Symmetric Green - Quantum Green',
                'desc' => 'Resultados en 3 minutos',
                'url' => 'micotoxinas.php#symmetric-quantum-green',
                'icon' => 'flask'
            ]
        ]
    ],
    [
        'id' => 'histamina',
        'name' => 'Histamina',
        'icon' => 'gauge',
        'description' => 'Prueba para la determinación cuantitativa de histamina en pescado fresco, enlatado, congelado y harina de pescado.',
        'url' => 'histamina.php',
        'cta' => 'Bio-Shield Histamine'
    ],
];

$renderInocuidadLine = static function (array $line): void {
    ?>
    <li id="<?= $line['id'] ?>" class="is-featured">
        <div class="inocuidad-line-card">
            <div class="inocuidad-featured-body">
                <div class="inocuidad-featured-content">
                    <h3><?= $line['name'] ?></h3>
                    <p><?= $line['description'] ?></p>
                </div>

                <?php if (!empty($line['meta'])): ?>
                    <div class="inocuidad-subnav-panel">
                        <ul class="inocuidad-subnav-list">
                            <?php foreach ($line['meta'] as $sub): ?>
                                <li>
                                    <a href="<?= htmlspecialchars($sub['url']) ?>" class="inocuidad-subnav-card">
                                        <?php if (!empty($sub['icon'])): ?>
                                            <span class="inocuidad-subnav-icon" aria-hidden="true">
                                                <?= icon($sub['icon']) ?>
                                            </span>
                                        <?php endif; ?>
                                        <div class="inocuidad-subnav-info">
                                            <strong><?= htmlspecialchars($sub['label']) ?></strong>
                                            <?php if (!empty($sub['desc'])): ?>
                                                <span><?= htmlspecialchars($sub['desc']) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="inocuidad-subnav-arrow" aria-hidden="true">
                                            <?= icon('diagonal') ?>
                                        </span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php elseif (!empty($line['cta']) && !empty($line['url'])): ?>
                    <div class="inocuidad-subnav-panel">
                        <ul class="inocuidad-subnav-list">
                            <li>
                                <a href="<?= htmlspecialchars($line['url'], ENT_QUOTES, 'UTF-8') ?>" class="inocuidad-subnav-card" aria-label="<?= htmlspecialchars($line['cta'].': '.$line['name'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?php if (!empty($line['icon'])): ?>
                                        <span class="inocuidad-subnav-icon" aria-hidden="true">
                                            <?= icon($line['icon']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <div class="inocuidad-subnav-info">
                                        <strong><?= htmlspecialchars($line['cta'], ENT_QUOTES, 'UTF-8') ?></strong>
                                    </div>
                                    <span class="inocuidad-subnav-arrow" aria-hidden="true">
                                        <?= icon('diagonal') ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php
};
?>

<!-- 1. Líneas de Inocuidad Alimentaria -->
<section class="wrap inocuidad-lines" aria-labelledby="inocuidad-lines-title">
    <div class="section-heading">
        <h2 id="inocuidad-lines-title">Categorías de inocuidad alimentaria</h2>
    </div>
    <ul class="inocuidad-lines-grid">
        <?php foreach ($inocuidadLines as $line) $renderInocuidadLine($line); ?>
    </ul>
</section>

<!-- 2. Cintillo de Contacto -->
<section class="wrap contact-strip">
    <div><h2>Solicita información técnica</h2><p>Nuestro equipo puede orientarte sobre la solución adecuada para tu proceso.</p></div>
    <a class="button button-light" href="contacto.php">Hablar con un asesor <?= icon('diagonal') ?></a>
</section>

<?php require __DIR__.'/includes/pie.php'; ?>
