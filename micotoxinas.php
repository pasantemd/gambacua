<?php
$tituloPagina = 'Micotoxinas';
require __DIR__.'/includes/encabezado.php';
require __DIR__.'/includes/datos-micotoxinas.php';

introduccionPagina(
    'Micotoxinas',
    '',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Micotoxinas', 'url' => null],
    ]
);
?>

<div class="micotoxins-page">
    <div class="wrap section-layout micotoxins-layout">
        <nav class="section-rail micotoxins-jump" data-section-rail aria-label="Familias de pruebas para micotoxinas">
            <div class="section-rail-list">
                <?php foreach ($micotoxinas['families'] as $index => $family): ?>
                    <a href="#<?= htmlspecialchars($family['id'], ENT_QUOTES, 'UTF-8') ?>"<?= $index === 0 ? ' class="is-active" aria-current="location"' : '' ?>>
                        <span><?= htmlspecialchars($family['title'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?= icon('arrow-right') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <div class="micotoxins-sections">
            <header class="micotoxins-brand">
                <h2><?= htmlspecialchars($micotoxinas['brand'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p><?= htmlspecialchars($micotoxinas['description'], ENT_QUOTES, 'UTF-8') ?></p>
            </header>

            <?php foreach ($micotoxinas['families'] as $family): ?>
        <section class="micotoxin-family" id="<?= htmlspecialchars($family['id'], ENT_QUOTES, 'UTF-8') ?>" aria-labelledby="<?= htmlspecialchars($family['id'], ENT_QUOTES, 'UTF-8') ?>-title">
            <div class="micotoxin-family-heading">
                <div>
                    <h2 id="<?= htmlspecialchars($family['id'], ENT_QUOTES, 'UTF-8') ?>-title"><?= htmlspecialchars($family['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p><?= htmlspecialchars($family['description'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <?php if (!empty($family['image'])): ?>
                    <img
                        src="<?= htmlspecialchars($family['image'], ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($family['image_alt'], ENT_QUOTES, 'UTF-8') ?>"
                        width="1536"
                        height="1024"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endif; ?>
            </div>

            <div class="micotoxin-family-content">
                <div class="micotoxin-methods">
                    <?php foreach ($family['methods'] as $method): ?>
                        <article class="micotoxin-method">
                            <img
                                src="<?= htmlspecialchars($method['image'], ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($method['name'], ENT_QUOTES, 'UTF-8') ?>"
                                width="1536"
                                height="1024"
                                loading="lazy"
                                decoding="async"
                            >
                            <h3><?= htmlspecialchars($method['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <ul>
                                <?php foreach ($method['details'] as $detail): ?>
                                    <li><?= htmlspecialchars($detail, ENT_QUOTES, 'UTF-8') ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>

                <aside class="micotoxin-products" aria-label="Productos de <?= htmlspecialchars($family['title'], ENT_QUOTES, 'UTF-8') ?>">
                    <h3>PRODUCTOS</h3>
                    <ul>
                        <?php foreach ($family['products'] as $product): ?>
                            <li><?= htmlspecialchars($product, ENT_QUOTES, 'UTF-8') ?></li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>
        </section>
            <?php endforeach; ?>

            <section class="micotoxin-approval" aria-labelledby="micotoxin-approval-title">
                <h2 id="micotoxin-approval-title"><?= htmlspecialchars($micotoxinas['approval']['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                <div class="micotoxin-approval-mark">
                    <img
                        src="<?= htmlspecialchars($micotoxinas['approval']['image'], ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($micotoxinas['approval']['mark'].' '.$micotoxinas['approval']['organization'].' '.$micotoxinas['approval']['department'], ENT_QUOTES, 'UTF-8') ?>"
                        width="2170"
                        height="725"
                        loading="eager"
                        decoding="async"
                    >
                </div>
            </section>
        </div>
    </div>
</div>

<script src="assets/js/navegador-secciones.js?v=7" defer></script>

<?php require __DIR__.'/includes/pie.php'; ?>
