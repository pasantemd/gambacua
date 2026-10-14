<?php
/**
 * Gambacua - Utilidades globales y configuración del sitio (includes/sitio.php)
 * 
 * Centraliza la definición de páginas, elementos de navegación,
 * sistema de iconos vectoriales SVG y componentes compartidos de presentación.
 */

// Mapa de páginas y sus títulos públicos correspondientes
$paginas = [
    'index'     => 'Inicio', 
    'historia'  => 'Nuestra historia', 
    'productos' => 'Productos', 
    'catalogos' => 'Catálogo', 
    'contacto'  => 'Contacto'
];

// Identificador de la página actualmente activa
$paginaActual = basename($_SERVER['SCRIPT_NAME'], '.php');

// Elementos estructurados del menú desplegable de navegación de productos
$elementosMenuProductos = [
    [
        'titulo' => 'Ingredientes',
        'descripcion' => '',
        'url' => 'ingredientes.php',
        'icono' => 'egg',
        'identificador' => 'ingredientes'
    ],
    [
        'titulo' => 'Inocuidad alimentaria',
        'descripcion' => '',
        'url' => 'inocuidad.php',
        'icono' => 'shield-check',
        'identificador' => 'inocuidad',
        'subsecciones' => [
            [
                'titulo' => 'Medios de cultivo',
                'url' => 'medios-cultivo.php'
            ],
            [
                'titulo' => 'Filtración por membrana',
                'url' => 'filtracion-membrana.php'
            ],
            [
                'titulo' => 'Materiales e insumos',
                'url' => 'materiales-insumos.php'
            ],
            [
                'titulo' => 'Compact Dry',
                'url' => 'compact-dry.php'
            ],
            [
                'titulo' => 'Micotoxinas',
                'url' => 'micotoxinas.php'
            ],
            [
                'titulo' => 'Histamina',
                'url' => 'histamina.php'
            ]
        ]
    ]
];

/**
 * Retorna un elemento SVG accesible con el trazado del icono solicitado.
 * 
 * @param string $nombre Nombre clave del icono solicitado.
 * @return string Marcado HTML del elemento SVG.
 */
function icono($nombre) {
    $trazados = [
        'arrow' => '<path d="M4 12h15m-6-6 6 6-6 6"/>',
        'arrow-right' => '<path d="M5 12h14m-7-7 7 7-7 7"/>',
        'diagonal' => '<path d="M6 18 18 6M6 6h12v12"/>',
        'phone' => '<path d="m7 3 3 5-3 3a15 15 0 0 0 6 6l3-3 5 3c0 3-2 4-4 4C9 21 3 15 3 7c0-2 1-4 4-4Z"/>',
        'pin' => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>',
        'image' => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8" cy="8" r="1"/><path d="m3 17 6-6 4 4 3-3 5 5"/>',
        'file' => '<path d="M14 2H5v20h14V7Z M14 2v6h5M8 13h8M8 17h6"/>',
        'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
        'box' => '<path d="m12.89 1.45 8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"/><path d="m2.32 6.16 9.68 4.84 9.68-4.84"/><path d="M12 22.76V11"/>',
        'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'file-text' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="10" y1="9" x2="8" y2="9"/>',
        'sparkles' => '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>',
        'egg' => '<path d="M12 22c6.23-.05 7.87-5.57 7.5-10-.36-4.34-3.95-9.96-7.5-10-3.55.04-7.14 5.66-7.5 10-.37 4.43 1.27 9.95 7.5 10z"/><circle cx="12" cy="13" r="3.5"/>',
        'shield-check' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
        'plate' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="10" cy="10" r="1.5"/>',
        'check' => '<path d="m5 12 5 5L20 7"/>',
        'clock' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'mail' => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'cloud' => '<path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"/>',
        'monitor' => '<rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/>',
        'cpu' => '<rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9"/><path d="M9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 14h3M1 9h3M1 14h3"/>',
        'search' => '<circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/>',
        'x' => '<line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/>',
        'filter' => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'download' => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>',
        'help-circle' => '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
        'touch' => '<path d="M12 2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2 2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Z"/><path d="M14 9a2 2 0 0 1 4 0v4a7 7 0 0 1-7 7H9a6 6 0 0 1-6-6v-2a2 2 0 0 1 3.4-1.4L8 12"/><path d="M8 2.5a5 5 0 0 0-4 4.5"/>',
        'gauge' => '<path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/>',
        'square' => '<rect width="18" height="18" x="3" y="3" rx="3"/>',
        'cloud-sync' => '<path d="M12 3a5 5 0 0 1 4.8 3.5"/><path d="M17 3v3.5h-3.5"/><path d="M21 16a5 5 0 0 0-4.5-5H16a7 7 0 0 0-13.3 2.5A4.5 4.5 0 0 0 4 20h14a3 3 0 0 0 3-4Z"/>',
        'droplet' => '<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>',
        'bottle' => '<path d="M9 2h6v4l2 2v12a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V8l2-2V2Z"/><path d="M9 6h6M7 11h10M10 15h4"/>',
        'thermometer' => '<path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"/>',
        'calendar' => '<rect width="18" height="18" x="3" y="4" rx="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/>',
        'flask' => '<path d="M10 2v7.31L4.1 19.4A2 2 0 0 0 5.8 22h12.4a2 2 0 0 0 1.7-2.6L14 9.31V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/>',
        'pipette' => '<path d="m19 5-2-2a2 2 0 0 0-2.8 0L9.4 7.8 8 7 6 9l.8 1.4-5.6 5.6a1 1 0 0 0 0 1.4l2.8 2.8a1 1 0 0 0 1.4 0L11 14.6l1.4.8 2-2-.8-1.4 4.8-4.8a2 2 0 0 0 0-2.8Z"/><path d="m18 6-4 4"/>',
        'tube' => '<path d="M7 2h10M9 2v15a3 3 0 0 0 6 0V2"/>'
    ];
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.($trazados[$nombre] ?? $trazados['arrow']).'</svg>';
}

/** Atajo usado por las plantillas de producto. */
function icon($nombre) {
    return icono($nombre);
}

/**
 * Renderiza un contenedor fotográfico o un espacio de reserva institucional
 * si la imagen aún no existe físicamente en el servidor.
 * 
 * @param string $archivo Nombre del archivo dentro de assets/images/.
 * @param string $etiqueta Texto alternativo descriptivo para accesibilidad.
 * @param string $clase Clases CSS adicionales para personalización visual.
 */
function espacioMultimedia($archivo, $etiqueta, $clase = '') {
    $ruta = 'assets/images/'.$archivo;
    if (is_file(__DIR__.'/../'.$ruta)) {
        $esHeroPrincipal = in_array('hero-main', preg_split('/\s+/', trim($clase)), true);
        $carga = $esHeroPrincipal ? 'eager' : 'lazy';
        $prioridad = $esHeroPrincipal ? ' fetchpriority="high"' : '';
        echo '<figure class="media-slot '.$clase.' has-image"><img src="'.$ruta.'" alt="'.htmlspecialchars($etiqueta, ENT_QUOTES, 'UTF-8').'" loading="'.$carga.'"'.$prioridad.'></figure>';
    } else {
        echo '<figure class="media-slot '.$clase.'"><div class="media-label">'.icono('image').'<span>'.htmlspecialchars($etiqueta, ENT_QUOTES, 'UTF-8').'</span><small>Espacio reservado para fotografía</small></div></figure>';
    }
}

/**
 * Renderiza la barra de navegación secundaria (migas de pan) con marcado
 * semántico estructurado conforme a Schema.org (BreadcrumbList).
 * 
 * @param array|string|null $migas Arreglo personalizado de enlaces o título de la página actual.
 */
function migasPan($migas = null) {
    global $paginas, $paginaActual;
    if ($migas === null) {
        $etiqueta = $paginas[$paginaActual] ?? null;
        if (!$etiqueta) return;
        $migas = [
            ['etiqueta' => 'Inicio', 'url' => 'index.php'],
            ['etiqueta' => $etiqueta, 'url' => null]
        ];
    } elseif (is_string($migas)) {
        $migas = [
            ['etiqueta' => 'Inicio', 'url' => 'index.php'],
            ['etiqueta' => $migas, 'url' => null]
        ];
    }
    if (empty($migas)) return;
    ?>
    <nav class="breadcrumbs" aria-label="Migas de pan">
        <ol class="breadcrumbs-list" itemscope itemtype="https://schema.org/BreadcrumbList">
            <?php foreach ($migas as $indice => $miga): ?>
                <?php if ($indice > 0): ?>
                    <li class="breadcrumbs-separator" aria-hidden="true">/</li>
                <?php endif; ?>
                <?php $esUltima = ($indice === count($migas) - 1); ?>
                <li class="breadcrumbs-item<?= $esUltima ? ' is-active' : '' ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"<?= $esUltima ? ' aria-current="page"' : '' ?>>
                    <?php $textoMiga = $miga['etiqueta'] ?? $miga['label'] ?? ''; ?>
                    <?php if (!empty($miga['url']) && !$esUltima): ?>
                        <a href="<?= htmlspecialchars($miga['url'], ENT_QUOTES, 'UTF-8') ?>" itemprop="item"><span itemprop="name"><?= htmlspecialchars($textoMiga, ENT_QUOTES, 'UTF-8') ?></span></a>
                    <?php else: ?>
                        <span itemprop="name"><?= htmlspecialchars($textoMiga, ENT_QUOTES, 'UTF-8') ?></span>
                    <?php endif; ?>
                    <meta itemprop="position" content="<?= $indice + 1 ?>">
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
}

/**
 * Renderiza la sección hero/cabecera temática de las páginas internas,
 * aplicando cortes angulares de identidad, ambientación de haz de luz o imagen de portada.
 * 
 * @param string $titulo Título principal (h1) de la página.
 * @param string $texto Párrafo introductorio o resumen temático.
 * @param array|string|null $migas Personalización para la barra de migas de pan.
 * @param string|null $imagenPortada Ruta a imagen de portada si la página la utiliza.
 */
function introduccionPagina($titulo, $texto, $migas = null, $imagenPortada = null) {
    global $paginas, $paginaActual;
    if ($migas === null) {
        $migas = $paginas[$paginaActual] ?? $titulo;
    }
?>
<section class="page-intro<?= $imagenPortada ? ' page-intro-has-cover' : '' ?>"<?= $imagenPortada ? ' style="position: relative; isolation: isolate; overflow: hidden; min-height: 440px; display: flex; flex-direction: column; justify-content: center;"' : '' ?>>
    <?php if ($imagenPortada): ?>
        <img
            src="<?= htmlspecialchars($imagenPortada, ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?>"
            class="page-intro-cover-img"
            loading="eager"
            fetchpriority="high"
            style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: right center; z-index: 1; pointer-events: none;"
        >
        <div
            class="page-intro-cover-overlay"
            aria-hidden="true"
            style="position: absolute; inset: 0; z-index: 2; pointer-events: none; background: linear-gradient(90deg, rgba(6,38,53,0.96) 0%, rgba(6,38,53,0.88) 42%, rgba(6,38,53,0.58) 62%, rgba(6,38,53,0.12) 82%, rgba(6,38,53,0.25) 100%);"
        ></div>
    <?php else: ?>
        <div class="page-intro-backdrop" aria-hidden="true">
            <span class="intro-beam beam-1"></span>
            <span class="intro-beam beam-2"></span>
            <span class="intro-beam beam-3"></span>
            <div class="intro-glow"></div>
        </div>
    <?php endif; ?>
    <div class="wrap">
        <div class="page-intro-inner" style="position: relative; z-index: 3; max-width: 640px; margin-left: 0; margin-right: auto; text-align: left;">
            <h1 class="page-intro-title"><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="page-intro-lead"><?= htmlspecialchars($texto, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    </div>
</section>
<?php if (!empty($migas)): ?>
<div class="page-breadcrumbs-bar">
    <div class="wrap">
        <?php migasPan($migas); ?>
    </div>
</div>
<?php endif; ?>
<?php }
