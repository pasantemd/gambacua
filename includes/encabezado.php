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
    <link rel="stylesheet" href="assets/css/sitio.css?v=129">

    <!-- Scripts modulares -->
    <script src="assets/js/encabezado.js?v=9" defer></script>
    <script src="assets/js/sitio.js?v=8" defer></script>
    <script src="assets/js/movimiento-sitio.js?v=6" defer></script>
    <?php if ($paginaActual === 'historia'): ?>
        <script src="assets/js/historia.js?v=2" defer></script>
    <?php elseif ($paginaActual === 'contacto'): ?>
        <script src="assets/js/contacto.js?v=3" defer></script>
    <?php endif; ?>

    <?php if ($paginaActual === 'index'): ?>
    <!-- Estilos críticos del preloader de Inicio -->
    <style id="preloader-critical-css">
        #site-progress-bar{position:fixed;top:0;left:0;width:0%;height:3px;background:linear-gradient(90deg,#3097b2 0%,#78cad7 50%,#004766 100%);box-shadow:0 1px 8px rgba(48,151,178,0.55);z-index:100000;pointer-events:none;opacity:0;transition:width 220ms ease,opacity 180ms ease}
        #site-progress-bar.is-active{opacity:1}
        html.js body:not(.is-page-ready) #contenido,html.js body:not(.is-page-ready) .site-header{opacity:0;transform:translateY(6px)}
        html.js body.is-page-ready #contenido,html.js body.is-page-ready .site-header{opacity:1;transform:translateY(0);transition:opacity 320ms cubic-bezier(0.16,1,0.3,1),transform 320ms cubic-bezier(0.16,1,0.3,1)}
        body.is-page-exiting #contenido,body.is-page-exiting .site-header{opacity:0.65;transition:opacity 160ms cubic-bezier(0.16,1,0.3,1)}
        .site-preloader{position:fixed;inset:0;z-index:999999;background:#fff;display:flex;align-items:center;justify-content:center;pointer-events:none;overflow:hidden;opacity:1;visibility:visible;transition:opacity 360ms cubic-bezier(0.16,1,0.3,1),visibility 360ms cubic-bezier(0.16,1,0.3,1),transform 360ms cubic-bezier(0.16,1,0.3,1);will-change:opacity,transform}
        .site-preloader.is-loaded{opacity:0;visibility:hidden;transform:scale(1.02)}
        .preloader-inner{display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;text-align:center;user-select:none}
        .preloader-symbol{width:clamp(92px,12vw,115px);height:auto;overflow:visible;filter:drop-shadow(0 14px 28px rgba(0,71,102,0.12))}
        .liquid-container{animation:liquid-fill-up 1.3s cubic-bezier(0.35,0.1,0.25,1) forwards}
        @keyframes liquid-fill-up{0%{transform:translateY(48px)}100%{transform:translateY(-4px)}}
        .wave-back{fill:#3097b2;opacity:0.52;animation:wave-h-back 1.6s linear infinite}
        .wave-front{fill:url(#preloader-liquid-grad);opacity:0.95;animation:wave-h-front 1.2s linear infinite}
        .wave-shine{stroke:rgba(255,255,255,0.7);stroke-width:0.75;fill:none;animation:wave-h-front 1.2s linear infinite}
        @keyframes wave-h-back{0%{transform:translateX(0)}100%{transform:translateX(-40px)}}
        @keyframes wave-h-front{0%{transform:translateX(-40px)}100%{transform:translateX(0)}}
        .preloader-bubble{fill:rgba(255,255,255,0.7);animation:bubble-rise 1.5s ease-in-out infinite}
        .pb-1{animation-delay:0.15s}.pb-2{animation-delay:0.65s}.pb-3{animation-delay:1.05s}
        @keyframes bubble-rise{0%{transform:translateY(0);opacity:0}30%{opacity:0.85}80%{opacity:0.85}100%{transform:translateY(-22px);opacity:0}}
        .preloader-brand{font-family:'Montserrat',system-ui,sans-serif;font-size:15px;font-weight:700;letter-spacing:0.08em;color:#004766;text-transform:uppercase;opacity:0.92;animation:preloader-fade-in 800ms ease-out forwards}
        @keyframes preloader-fade-in{from{opacity:0;transform:translateY(4px)}to{opacity:0.95;transform:translateY(0)}}
        @media (prefers-reduced-motion:reduce){.site-preloader,#site-progress-bar,html.js body:not(.is-page-ready) #contenido,html.js body:not(.is-page-ready) .site-header,html.js body.is-page-ready #contenido,html.js body.is-page-ready .site-header,body.is-page-exiting #contenido,body.is-page-exiting .site-header{transition:none!important;transform:none!important;opacity:1!important}.site-preloader{display:none!important}.liquid-container,.wave-back,.wave-front,.wave-shine,.preloader-bubble,.preloader-brand{animation:none!important}}
    </style>
    <noscript><style>#site-preloader{display:none!important}#contenido,.site-header{opacity:1!important;transform:none!important}</style></noscript>
    <?php endif; ?>
</head>
<body class="page-<?= htmlspecialchars($paginaActual, ENT_QUOTES, 'UTF-8') ?>">
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <!-- Barra de progreso para navegación en conexiones lentas -->
    <div id="site-progress-bar" aria-hidden="true"></div>

    <?php if ($paginaActual === 'index'): ?>
    <!-- Preloader de Inicio: la "A" llenándose de agua -->
    <div id="site-preloader" class="site-preloader" aria-hidden="true">
        <div class="preloader-inner">
            <svg class="preloader-symbol" viewBox="97 0 52 45" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Gambacua cargando">
                <defs>
                    <linearGradient id="preloader-liquid-grad" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#3097b2" />
                        <stop offset="45%" stop-color="#197a97" />
                        <stop offset="100%" stop-color="#004766" />
                    </linearGradient>

                    <clipPath id="preloader-a-mask">
                        <path d="M114.73,25.2c.25-.02.49-.04.74-.06.44-.03.83-.31,1-.71l5-11.5,2.04-4.69h.06l6.62,15.75c.18.43.59.71,1.06.72,2.1.06,4.19.18,6.27.35.91.07,1.56-.84,1.19-1.67L128.56.71c-.19-.43-.62-.71-1.09-.71h-8.17c-.47,0-.89.27-1.09.7l-10.67,23.47c-.39.85.31,1.79,1.24,1.68,1.97-.25,3.95-.47,5.94-.65Z"/>
                        <path d="M143.58,35.68c-2.37-.33-4.74-.59-7.11-.79-.9-.07-1.55.85-1.18,1.68l2.91,6.56c.19.43.62.71,1.09.71h6.73c.87,0,1.44-.89,1.09-1.68l-2.59-5.78-.94-.71Z"/>
                        <path d="M102.54,36.44c-.39.07-.72.33-.89.69l-2.28,5.03h0c-.36.79.22,1.69,1.09,1.69h6.18c.46,0,.88-.27,1.08-.68l2.86-6.03c.4-.85-.29-1.82-1.22-1.7-2.28.28-4.55.62-6.82,1.01Z"/>
                    </clipPath>
                </defs>

                <!-- Silueta base de cristal (recipiente de la A) -->
                <g fill="rgba(48, 151, 178, 0.05)" stroke="rgba(0, 71, 102, 0.16)" stroke-width="0.75">
                    <path d="M114.73,25.2c.25-.02.49-.04.74-.06.44-.03.83-.31,1-.71l5-11.5,2.04-4.69h.06l6.62,15.75c.18.43.59.71,1.06.72,2.1.06,4.19.18,6.27.35.91.07,1.56-.84,1.19-1.67L128.56.71c-.19-.43-.62-.71-1.09-.71h-8.17c-.47,0-.89.27-1.09.7l-10.67,23.47c-.39.85.31,1.79,1.24,1.68,1.97-.25,3.95-.47,5.94-.65Z"/>
                    <path d="M143.58,35.68c-2.37-.33-4.74-.59-7.11-.79-.9-.07-1.55.85-1.18,1.68l2.91,6.56c.19.43.62.71,1.09.71h6.73c.87,0,1.44-.89,1.09-1.68l-2.59-5.78-.94-.71Z"/>
                    <path d="M102.54,36.44c-.39.07-.72.33-.89.69l-2.28,5.03h0c-.36.79.22,1.69,1.09,1.69h6.18c.46,0,.88-.27,1.08-.68l2.86-6.03c.4-.85-.29-1.82-1.22-1.7-2.28.28-4.55.62-6.82,1.01Z"/>
                </g>

                <!-- Agua en movimiento dentro de la forma de la A -->
                <g clip-path="url(#preloader-a-mask)">
                    <g class="liquid-container">
                        <path class="wave-back" d="M 60 0 Q 75 -3.5, 90 0 T 120 0 T 150 0 T 180 0 T 210 0 V 60 H 60 Z"/>
                        <path class="wave-front" d="M 60 0 Q 75 -2.6, 90 0 T 120 0 T 150 0 T 180 0 T 210 0 V 60 H 60 Z"/>
                        <path class="wave-shine" d="M 60 0 Q 75 -2.6, 90 0 T 120 0 T 150 0 T 180 0 T 210 0"/>
                        <circle cx="118" cy="36" r="0.8" class="preloader-bubble pb-1"/>
                        <circle cx="127" cy="40" r="0.6" class="preloader-bubble pb-2"/>
                        <circle cx="136" cy="38" r="0.7" class="preloader-bubble pb-3"/>
                    </g>
                </g>
            </svg>
            <span class="preloader-brand">Gambacua</span>
        </div>
    </div>
    <?php endif; ?>

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
