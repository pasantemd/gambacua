<?php require_once __DIR__ . '/sitio.php'; ?>
<!doctype html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($tituloPagina ?? $paginas[$paginaActual] ?? 'Inicio', ENT_QUOTES, 'UTF-8') ?> | Gambacua</title>
    <meta name="description" content="Sistemas especializados de alimentación para camarón. Innovación, calidad y acompañamiento técnico para la industria mexicana.">
    <meta name="theme-color" content="#104d67">
    <script>document.documentElement.classList.add('js');</script>

    <!-- Favicons -->
    <link rel="icon" type="image/webp" sizes="512x512" href="assets/images/favicon.webp">
    <link rel="apple-touch-icon" href="assets/images/favicon.webp">

    <!-- Estilos modulares principales -->
    <link rel="stylesheet" href="assets/css/sitio.css?v=127">

    <!-- Scripts modulares -->
    <script src="assets/js/encabezado.js?v=9" defer></script>
    <script src="assets/js/sitio.js?v=7" defer></script>
    <script src="assets/js/movimiento-sitio.js?v=6" defer></script>
    <?php if ($paginaActual === 'historia'): ?>
        <script src="assets/js/historia.js?v=2" defer></script>
    <?php elseif ($paginaActual === 'contacto'): ?>
        <script src="assets/js/contacto.js?v=3" defer></script>
    <?php endif; ?>

    <!-- Critical CSS para Skeleton Loader y Revelado Fluido (evita pantalla en blanco y salto brusco) -->
    <style id="skeleton-critical-css">
        #site-progress-bar{position:fixed;top:0;left:0;width:0%;height:3px;background:linear-gradient(90deg,#3097b2 0%,#78cad7 50%,#004766 100%);box-shadow:0 1px 8px rgba(48,151,178,0.55);z-index:100000;pointer-events:none;opacity:0;transition:width 220ms ease,opacity 180ms ease}
        #site-progress-bar.is-active{opacity:1}
        html.js body:not(.is-page-ready) #contenido,html.js body:not(.is-page-ready) .site-header{opacity:0;transform:translateY(6px)}
        html.js body.is-page-ready #contenido,html.js body.is-page-ready .site-header{opacity:1;transform:translateY(0);transition:opacity 280ms cubic-bezier(0.16,1,0.3,1),transform 280ms cubic-bezier(0.16,1,0.3,1)}
        body.is-page-exiting #contenido,body.is-page-exiting .site-header{opacity:0.65;transition:opacity 160ms cubic-bezier(0.16,1,0.3,1)}
        .page-skeleton{position:fixed;inset:0;z-index:99999;background:#fff;pointer-events:none;overflow:hidden;opacity:1;visibility:visible;transition:opacity 280ms cubic-bezier(0.16,1,0.3,1),visibility 280ms cubic-bezier(0.16,1,0.3,1)}
        .page-skeleton.is-loaded{opacity:0;visibility:hidden}
        .skeleton-shimmer-box{background:linear-gradient(90deg,#edf4f6 0%,#f7fafb 45%,#edf4f6 80%);background-size:200% 100%;animation:skeleton-shimmer 1.6s ease-in-out infinite;border-radius:6px}
        @keyframes skeleton-shimmer{0%{background-position:-200% 0}100%{background-position:200% 0}}
        .skeleton-header{height:85px;border-bottom:1px solid #d5e2e5;display:flex;align-items:center;background:#fff}
        .skeleton-header-inner{display:flex;align-items:center;justify-content:space-between;width:100%;gap:32px}
        .skeleton-logo{width:190px;height:34px}
        .skeleton-nav{display:flex;align-items:center;gap:28px}
        .skeleton-nav-item{width:76px;height:14px}
        .skeleton-nav-btn{width:110px;height:40px}
        .skeleton-hero{padding:clamp(48px,6vw,76px) 0 clamp(40px,5vw,64px);background:linear-gradient(180deg,#f7fafb 0%,#fff 100%);border-bottom:none}
        .skeleton-hero-inner{display:grid;grid-template-columns:minmax(0,1.15fr) minmax(320px,0.85fr);gap:clamp(32px,5vw,64px);align-items:center}
        .skeleton-copy{display:flex;flex-direction:column;gap:16px}
        .skeleton-tag{width:130px;height:14px}
        .skeleton-title-1{width:88%;height:clamp(32px,3.4vw,44px)}
        .skeleton-title-2{width:65%;height:clamp(32px,3.4vw,44px)}
        .skeleton-lead-1{width:95%;height:16px;margin-top:8px}
        .skeleton-lead-2{width:78%;height:16px}
        .skeleton-btn-row{display:flex;gap:16px;margin-top:14px}
        .skeleton-btn-main{width:180px;height:48px}
        .skeleton-btn-sec{width:150px;height:48px}
        .skeleton-media-box{width:100%;height:clamp(260px,28vw,380px);border-radius:18px}
        .skeleton-cards-row{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;padding-top:40px}
        .skeleton-card{height:180px;border-radius:16px}
        @media (max-width:900px){.skeleton-hero-inner{grid-template-columns:1fr;gap:32px}.skeleton-cards-row{grid-template-columns:1fr 1fr}}
        @media (max-width:768px){.skeleton-nav-item,.skeleton-nav-btn{display:none}.skeleton-header-inner::after{content:'';display:block;width:38px;height:38px;border-radius:8px;background:#edf4f6}.skeleton-btn-row{flex-direction:column;width:100%}.skeleton-btn-main,.skeleton-btn-sec{width:100%}.skeleton-cards-row{grid-template-columns:1fr}}
        @media (prefers-reduced-motion:reduce){.skeleton-shimmer-box{animation:none!important;background:#edf4f6!important}.page-skeleton,#site-progress-bar,html.js body:not(.is-page-ready) #contenido,html.js body:not(.is-page-ready) .site-header,html.js body.is-page-ready #contenido,html.js body.is-page-ready .site-header,body.is-page-exiting #contenido,body.is-page-exiting .site-header{transition:none!important;transform:none!important;opacity:1!important}}
    </style>
    <noscript><style>#page-skeleton{display:none!important}#contenido,.site-header{opacity:1!important;transform:none!important}</style></noscript>
</head>
<body class="page-<?= htmlspecialchars($paginaActual, ENT_QUOTES, 'UTF-8') ?>">
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <!-- Barra de progreso para navegación en conexiones lentas -->
    <div id="site-progress-bar" aria-hidden="true"></div>

    <!-- Skeleton Loader inicial para evitar pantalla en blanco -->
    <div id="page-skeleton" class="page-skeleton" aria-hidden="true">
        <div class="skeleton-header">
            <div class="wrap skeleton-header-inner">
                <div class="skeleton-shimmer-box skeleton-logo"></div>
                <div class="skeleton-nav">
                    <div class="skeleton-shimmer-box skeleton-nav-item"></div>
                    <div class="skeleton-shimmer-box skeleton-nav-item"></div>
                    <div class="skeleton-shimmer-box skeleton-nav-item"></div>
                    <div class="skeleton-shimmer-box skeleton-nav-item"></div>
                    <div class="skeleton-shimmer-box skeleton-nav-btn"></div>
                </div>
            </div>
        </div>
        <div class="skeleton-hero">
            <div class="wrap skeleton-hero-inner">
                <div class="skeleton-copy">
                    <div class="skeleton-shimmer-box skeleton-tag"></div>
                    <div class="skeleton-shimmer-box skeleton-title-1"></div>
                    <div class="skeleton-shimmer-box skeleton-title-2"></div>
                    <div class="skeleton-shimmer-box skeleton-lead-1"></div>
                    <div class="skeleton-shimmer-box skeleton-lead-2"></div>
                    <div class="skeleton-btn-row">
                        <div class="skeleton-shimmer-box skeleton-btn-main"></div>
                        <div class="skeleton-shimmer-box skeleton-btn-sec"></div>
                    </div>
                </div>
                <div class="skeleton-media">
                    <div class="skeleton-shimmer-box skeleton-media-box"></div>
                </div>
            </div>
        </div>
        <div class="wrap skeleton-cards-row">
            <div class="skeleton-shimmer-box skeleton-card"></div>
            <div class="skeleton-shimmer-box skeleton-card"></div>
            <div class="skeleton-shimmer-box skeleton-card"></div>
        </div>
    </div>

    <!-- Encabezado principal del sitio -->
    <header class="site-header">
        <div class="wrap header-inner">
            <a href="index.php" class="brand" aria-label="Gambacua, inicio">
                <img src="assets/images/logo-gambacua-horizontal.svg" alt="Gambacua" width="274" height="39">
            </a>

            <!-- Navegación centrada -->
            <nav id="main-nav" aria-label="Navegación principal">
                <?php foreach ($paginas as $identificador => $etiqueta): ?>
                    <?php if ($identificador === 'productos'): ?>
                        <div class="nav-dropdown" id="nav-dropdown-productos">
                            <div class="nav-dropdown-trigger-row">
                                <button type="button" class="nav-dropdown-trigger" aria-expanded="false" aria-controls="menu-dropdown-productos">
                                    <span><?= $etiqueta ?></span>
                                    <?= icono('chevron-down') ?>
                                </button>
                            </div>
                            <div class="nav-dropdown-menu" id="menu-dropdown-productos" role="region" aria-label="Submenú de <?= $etiqueta ?>">
                                <a class="nav-dropdown-overview" href="productos.php"<?= $paginaActual === 'productos' ? ' aria-current="page"' : '' ?>>Ver todas las categorías</a>
                                <ul class="nav-dropdown-list">
                                    <?php foreach ($elementosMenuProductos as $elemento): ?>
                                        <?php
                                        $tieneSubsecciones = !empty($elemento['subsecciones']);
                                        $esGrupoActual = $paginaActual === ($elemento['identificador'] ?? '');
                                        if ($tieneSubsecciones) {
                                            foreach ($elemento['subsecciones'] as $subseccion) {
                                                if ($paginaActual === pathinfo($subseccion['url'], PATHINFO_FILENAME)) {
                                                    $esGrupoActual = true;
                                                    break;
                                                }
                                            }
                                        }
                                        $idSubmenu = 'submenu-'.($elemento['identificador'] ?? 'categoria');
                                        ?>
                                        <li class="nav-dropdown-group<?= $tieneSubsecciones && $esGrupoActual ? ' is-expanded' : '' ?>">
                                            <a href="<?= $elemento['url'] ?>" class="nav-dropdown-item<?= $tieneSubsecciones ? ' has-subcategories' : '' ?><?= $esGrupoActual ? ' is-active' : '' ?>"<?= $tieneSubsecciones ? ' aria-expanded="'.($esGrupoActual ? 'true' : 'false').'" aria-controls="'.$idSubmenu.'"' : '' ?><?= $paginaActual === ($elemento['identificador'] ?? '') ? ' aria-current="page"' : '' ?>>
                                                <span class="nav-dropdown-icon" aria-hidden="true"><?= icono($elemento['icono']) ?></span>
                                                <div class="nav-dropdown-text">
                                                    <strong class="nav-dropdown-title"><?= $elemento['titulo'] ?></strong>
                                                    <?php if (!empty($elemento['descripcion'])): ?>
                                                        <span class="nav-dropdown-desc"><?= $elemento['descripcion'] ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if ($tieneSubsecciones): ?>
                                                    <span class="nav-dropdown-category-arrow" aria-hidden="true"><?= icono('chevron-down') ?></span>
                                                <?php endif; ?>
                                            </a>
                                            <?php if ($tieneSubsecciones): ?>
                                                <ul class="nav-dropdown-sublist" id="<?= $idSubmenu ?>">
                                                    <?php foreach ($elemento['subsecciones'] as $subseccion): ?>
                                                        <li>
                                                            <?php $esSubseccionActual = $paginaActual === pathinfo($subseccion['url'], PATHINFO_FILENAME); ?>
                                                            <a href="<?= $subseccion['url'] ?>" class="nav-dropdown-subitem<?= $esSubseccionActual ? ' is-active' : '' ?>"<?= $esSubseccionActual ? ' aria-current="page"' : '' ?>>
                                                                <span class="nav-dropdown-subtitle"><?= $subseccion['titulo'] ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= $identificador ?>.php" <?= $paginaActual === $identificador ? 'aria-current="page"' : '' ?>>
                            <?= $etiqueta ?><?= $identificador === 'contacto' ? ' ' . icono('diagonal') : '' ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </nav>

            <!-- Botón toggle para dispositivos móviles -->
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menú principal">
                Menú <span class="menu-lines" aria-hidden="true"></span>
            </button>
        </div>
    </header>

    <main id="contenido">
