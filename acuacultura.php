<?php
require __DIR__ . '/includes/datos-acuacultura.php';
require __DIR__ . '/includes/enfasis-acuacultura.php';
$claveMarca = $_GET['marca'] ?? '';
if (is_string($claveMarca) && in_array($claveMarca, ['variomac', 'ema'], true)) {
    header('Location: acuacultura.php?marca=acqua-co', true, 302);
    exit;
}
$marca = is_string($claveMarca) ? ($marcasAcuacultura[$claveMarca] ?? null) : null;
$tituloPagina = $marca ? $marca['nombre'] . ' | Acuacultura' : 'Acuacultura';
$escapar = static fn($texto) => htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
$formatear = static function ($texto, $pagina) use ($escapar, $enfasisAcuacultura) {
    $texto = $escapar($texto);
    $fragmentos = $enfasisAcuacultura[$pagina] ?? [];
    if (!$fragmentos) return $texto;
    usort($fragmentos, static fn($a, $b) => strlen($b) <=> strlen($a));
    $patron = '~(' . implode('|', array_map(static fn($frase) => preg_quote($escapar($frase), '~'), $fragmentos)) . ')~iu';
    return preg_replace($patron, '<strong>$1</strong>', $texto);
};
$rutaImagenes = 'assets/images/acuacultura/';
$mostrarFigura = static function ($figura) use ($escapar, $rutaImagenes) {
    $ruta = $escapar($rutaImagenes . $figura['imagen']);
    $titulo = $escapar($figura['titulo']);
    echo '<figure class="acuacultura-figura">' . (!empty($figura['mostrar_titulo']) ? '<figcaption>' . $titulo . (!empty($figura['descripcion']) ? '<p>' . $escapar($figura['descripcion']) . '</p>' : '') . '</figcaption>' : '') . '<a href="' . $ruta . '" aria-label="Ampliar: ' . $titulo . '"><img src="' . $ruta . '" alt="' . $titulo . '" loading="lazy"></a></figure>';
};
$mostrarBloque = static function ($bloque, $pagina) use ($escapar, $formatear, $mostrarFigura, $rutaImagenes) {
    if (!empty($bloque['imagenes'])) {
        echo '<details class="acuacultura-bloque acuacultura-desplegable acuacultura-aplicaciones"><summary>' . $escapar($bloque['titulo']) . '</summary><div class="acuacultura-bloque-contenido"><ul>';
        foreach ($bloque['elementos'] as $indice => $elemento) {
            $ruta = $escapar($rutaImagenes . $bloque['imagenes'][$indice]);
            echo '<li><img src="' . $ruta . '" alt="" width="208" height="110" loading="lazy"><span>' . $formatear($elemento, $pagina) . '</span></li>';
        }
        echo '</ul></div></details>';
        return;
    }
    echo '<details class="acuacultura-bloque acuacultura-desplegable"><summary>' . $escapar($bloque['titulo']) . '</summary><div class="acuacultura-bloque-contenido">';
    if (!empty($bloque['imagen'])) $mostrarFigura($bloque);
    if (!empty($bloque['elementos'])) {
        echo '<ul>';
        foreach ($bloque['elementos'] as $elemento) echo '<li>' . $formatear($elemento, $pagina) . '</li>';
        echo '</ul>';
    }
    echo '</div></details>';
};
require __DIR__ . '/includes/encabezado.php';
$migas = [
    ['label' => 'Inicio', 'url' => 'index.php'],
    ['label' => 'Productos', 'url' => 'productos.php'],
    ['label' => 'Acuacultura', 'url' => $marca ? 'acuacultura.php' : null],
];
if ($marca) $migas[] = ['label' => $marca['nombre'], 'url' => null];
introduccionPagina($marca ? $marca['nombre'] : 'Acuacultura', $marca ? $marca['descripcion'] : 'Equipamiento para almacenamiento, trazabilidad del alimento, aireación, monitoreo y tratamiento del agua.', $migas);
?>
<section class="wrap acuacultura-catalogo" aria-labelledby="titulo-catalogo">
<?php if (!$marca): ?>
    <div class="section-heading"><div>
        <h2 id="titulo-catalogo">Marcas de Acuacultura</h2>
        <p>Selecciona una marca para conocer sus productos y características.</p>
    </div></div>
    <div class="acuacultura-marcas">
        <?php $indiceMarca = 0; foreach ($marcasAcuacultura as $clave => $item): ?>
            <a class="acuacultura-marca <?= $indiceMarca++ % 2 === 0 ? 'cat-card-clara' : 'cat-card-oscura' ?>" href="acuacultura.php?marca=<?= $escapar($clave) ?>" aria-label="Ver productos de <?= $escapar($item['nombre']) ?>">
                <div class="acuacultura-logo">
                    <img src="<?= $escapar($rutaImagenes . $item['logo']) ?>" alt="<?= $escapar($item['nombre']) ?>" width="280" height="100">
                </div>
                <p><?= $escapar($item['resumen'] ?? $item['descripcion']) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="acuacultura-cabecera-marca">
        <h2 id="titulo-catalogo">Productos <?= $escapar($marca['nombre']) ?></h2>
        <?php if ($marca['logo']): ?>
            <img src="<?= $escapar($rutaImagenes . $marca['logo']) ?>" alt="<?= $escapar($marca['nombre']) ?>" width="240" height="90">
        <?php endif; ?>
    </div>
    <details class="acuacultura-indice" open>
        <summary>Explorar productos de <?= $escapar($marca['nombre']) ?></summary>
        <nav data-section-panels aria-label="Productos de <?= $escapar($marca['nombre']) ?>">
            <?php foreach ($marca['productos'] as $numero => $item): ?>
                <a href="#producto-<?= $numero + 1 ?>" aria-label="<?= $escapar($item['nombre']) ?>" title="<?= $escapar($item['nombre']) ?>">
                    <img src="<?= $escapar($rutaImagenes . $item['imagen']) ?>" alt="" width="88" height="72">
                </a>
            <?php endforeach; ?>
        </nav>
    </details>
    <div class="acuacultura-productos<?= count($marca['productos']) === 1 ? ' acuacultura-productos-unico' : '' ?>">
        <?php foreach ($marca['productos'] as $numero => $producto): ?>
            <article class="acuacultura-producto" id="producto-<?= $numero + 1 ?>" aria-labelledby="nombre-producto-<?= $numero + 1 ?>">
                <header class="acuacultura-producto-cabecera">
                    <h3 id="nombre-producto-<?= $numero + 1 ?>"><?= $escapar($producto['nombre']) ?></h3>
                    <p class="acuacultura-producto-descripcion"><?= $formatear($producto['descripcion'], $producto['pagina']) ?></p>
                </header>
                    <?php if (!empty($producto['destacados'])): ?>
                        <div class="acuacultura-destacados">
                            <?php foreach ($producto['destacados'] as $destacado): ?>
                                <div class="acuacultura-destacado">
                                    <img src="<?= $escapar($rutaImagenes . $destacado['icono']) ?>" alt="" width="48" height="48" loading="lazy">
                                    <h4><?= $escapar($destacado['titulo']) ?></h4>
                                    <p><?= $escapar($destacado['texto']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <div class="acuacultura-producto-imagen">
                    <a href="<?= $escapar($rutaImagenes . $producto['imagen']) ?>" class="acuacultura-ampliar" aria-label="Ampliar: <?= $escapar($producto['nombre']) ?>">
                    <img src="<?= $escapar($rutaImagenes . $producto['imagen']) ?>" alt="<?= $escapar($producto['nombre']) ?>" width="600" height="400" loading="lazy">
                    </a>

                </div>
                <div class="acuacultura-producto-info<?= !empty($producto['figura_junto_detalles']) ? ' acuacultura-producto-info--figura-lateral' : '' ?>">
                    <?php if (!empty($producto['secciones_despues_imagen']) && !empty($producto['figura'])) $mostrarFigura($producto['figura']); ?>
                    <?php if (!empty($producto['secciones_primero']) || !empty($producto['secciones_despues_imagen'])): ?>
                        <?php foreach ($producto['secciones'] ?? [] as $bloque) $mostrarBloque($bloque, $producto['pagina']); ?>
                    <?php endif; ?>
                    <?php if (!empty($producto['detalles'])): ?><details class="acuacultura-bloque acuacultura-desplegable acuacultura-caracteristicas">
                        <summary><?= $escapar($producto['titulo_detalles'] ?? 'Características') ?></summary>
                        <div class="acuacultura-bloque-contenido">
                            <ul<?= !empty($producto['iconos_detalles']) ? ' class="acuacultura-lista-iconos"' : '' ?>>
                                <?php foreach ($producto['detalles'] as $indice => $detalle): ?>
                                    <li><?php if (isset($producto['iconos_detalles'][$indice])): ?><img src="<?= $escapar($rutaImagenes . $producto['iconos_detalles'][$indice]) ?>" alt="" width="40" height="40" loading="lazy"><?php endif; ?><span><?= $formatear($detalle, $producto['pagina']) ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </details><?php endif; ?>
                    <?php if (empty($producto['secciones_primero']) && empty($producto['secciones_despues_imagen'])): ?>
                        <?php foreach ($producto['secciones'] ?? [] as $bloque) $mostrarBloque($bloque, $producto['pagina']); ?>
                    <?php endif; ?>
                    <?php if (!empty($producto['figura']) && empty($producto['secciones_despues_imagen'])) $mostrarFigura($producto['figura']); ?>
                    <?php if (!empty($producto['tabla'])): ?>
                        <div class="acuacultura-tabla-wrap">
                            <table class="acuacultura-tabla">
                            <?php if (empty($producto['ocultar_titulo_tabla'])): ?><caption><?= $escapar($producto['nombre']) ?></caption><?php endif; ?>
                            <thead><tr><th scope="col">Ítem</th><th scope="col">Código</th><th scope="col">Descripción</th><th scope="col">Cant.</th><th scope="col">Und.</th><?php if (isset($producto['tabla'][0]['peso'])): ?><th scope="col">Peso und.</th><?php endif; ?></tr></thead>
                            <tbody><?php foreach ($producto['tabla'] as $fila): ?><tr><th scope="row"><?= $escapar($fila['item']) ?></th><td><?= $escapar($fila['codigo']) ?></td><td><?= $escapar($fila['descripcion']) ?></td><td><?= $escapar($fila['cantidad']) ?></td><td><?= $escapar($fila['unidad']) ?></td><?php if (isset($fila['peso'])): ?><td><?= $escapar($fila['peso']) ?></td><?php endif; ?></tr><?php endforeach; ?></tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($producto['nota'])): ?><p class="acuacultura-nota"><?= $formatear($producto['nota'], $producto['pagina']) ?></p><?php endif; ?>
                    <?php if (!empty($producto['aplicaciones'])) $mostrarBloque($producto['aplicaciones'], 28); ?>
                    <?php if (!empty($producto['beneficios'])) $mostrarBloque($producto['beneficios'], 28); ?>
                </div>
                <?php if (count($marca['productos']) > 1): ?>
                    <nav class="acuacultura-recorrido" aria-label="Recorrer productos de <?= $escapar($marca['nombre']) ?>">
                        <?php if ($numero > 0): ?><a class="button acuacultura-recorrido-enlace" href="#producto-<?= $numero ?>">← Anterior</a><?php endif; ?>
                        <span><?= $numero + 1 ?> de <?= count($marca['productos']) ?></span>
                        <?php if ($numero + 1 < count($marca['productos'])): ?><a class="button acuacultura-recorrido-enlace" href="#producto-<?= $numero + 2 ?>">Siguiente →</a><?php endif; ?>
                    </nav>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</section>
<section class="wrap contact-strip acuacultura-contacto">
    <div>
        <h2>Encuentra el equipo para tu operación</h2>
        <p>Contacta a nuestro equipo para recibir asesoría.</p>
    </div>
    <div class="acuacultura-acciones">
        <a class="button button-light" href="contacto.php">Solicitar asesoría <?= icono('diagonal') ?></a>
    </div>
</section>
<dialog class="acuacultura-visor" aria-labelledby="titulo-visor">
    <div class="acuacultura-visor-barra">
        <h2 id="titulo-visor">Imagen del catálogo</h2>
        <div class="acuacultura-visor-controles" role="group" aria-label="Zoom de la imagen">
            <button type="button" data-zoom-menos aria-label="Reducir imagen" disabled>−</button>
            <output data-zoom-valor aria-live="polite">100%</output>
            <button type="button" data-zoom-mas aria-label="Ampliar imagen">+</button>
            <button type="button" data-zoom-restablecer aria-label="Restablecer tamaño">100%</button>
        </div>
        <button type="button" class="button" data-cerrar-visor aria-label="Cerrar"><?= icono('x') ?></button>
    </div>
    <div class="acuacultura-visor-imagen"><img src="assets/images/acuacultura/cabeza-ciclonica-indicaciones.webp" alt=""></div>
</dialog>
<script src="assets/js/acuacultura.js?v=5" defer></script>
<script src="assets/js/navegador-secciones.js?v=9" defer></script>
<?php require __DIR__ . '/includes/pie.php'; ?>
