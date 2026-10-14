<?php
$titulosLegales = [
    'cookies' => 'Política de cookies',
    'privacidad' => 'Privacidad',
    'terminos' => 'Términos y condiciones'
];
$tipo = $_GET['tipo'] ?? 'privacidad';

if (!is_string($tipo) || !isset($titulosLegales[$tipo])) {
    http_response_code(404);
    $tituloPagina = 'Documento no encontrado';
} else {
    $tituloPagina = $titulosLegales[$tipo];
}

require __DIR__ . '/includes/encabezado.php';
introduccionPagina($tituloPagina, 'Información legal y marco institucional de Gambacua.');
?>

<section class="wrap legal-pending">
    <h2><?= http_response_code() === 404 ? 'No encontramos este documento' : 'Documento en proceso de actualización' ?></h2>
    <p>Para cualquier consulta institucional, legal o de privacidad de datos, por favor comunícate directamente con nuestro equipo de atención.</p>
    <a class="button" href="contacto.php">
        Ir a contacto <?= icono('diagonal') ?>
    </a>
</section>

<?php require __DIR__ . '/includes/pie.php'; ?>


