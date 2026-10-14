<?php
$tituloPagina = 'Histamina';
require __DIR__.'/includes/encabezado.php';
require __DIR__.'/includes/datos-histamina.php';

introduccionPagina(
    'Histamina',
    '',
    [
        ['label' => 'Inicio', 'url' => 'index.php'],
        ['label' => 'Productos', 'url' => 'productos.php'],
        ['label' => 'Inocuidad alimentaria', 'url' => 'inocuidad.php'],
        ['label' => 'Histamina', 'url' => null],
    ]
);
?>

<div class="wrap histamine-page">
    <section class="histamine-product" aria-labelledby="histamine-product-title">
        <div class="histamine-product-copy">
            <img
                class="histamine-product-logo"
                src="<?= htmlspecialchars($histamina['logo'], ENT_QUOTES, 'UTF-8') ?>"
                alt=""
                width="1862"
                height="845"
                loading="eager"
                decoding="async"
            >
            <h2 class="histamine-product-title-visually-hidden" id="histamine-product-title"><?= htmlspecialchars($histamina['title'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p class="histamine-product-description"><?= htmlspecialchars($histamina['description'], ENT_QUOTES, 'UTF-8') ?></p>

            <dl class="histamine-product-details" aria-label="Presentación de <?= htmlspecialchars($histamina['product']['name'], ENT_QUOTES, 'UTF-8') ?>">
                <?php foreach ($histamina['product']['details'] as $label => $value): ?>
                    <div>
                        <dt><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></dt>
                        <dd><?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        </div>

        <figure class="histamine-product-visual">
            <img
                src="<?= htmlspecialchars($histamina['product']['image'], ENT_QUOTES, 'UTF-8') ?>"
                alt="<?= htmlspecialchars($histamina['product']['image_alt'], ENT_QUOTES, 'UTF-8') ?>"
                width="1536"
                height="1024"
                loading="eager"
                decoding="async"
            >
            <figcaption><?= htmlspecialchars($histamina['product']['name'], ENT_QUOTES, 'UTF-8') ?></figcaption>
        </figure>
    </section>
</div>

<?php require __DIR__.'/includes/pie.php'; ?>
