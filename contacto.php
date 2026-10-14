<?php 
require_once __DIR__ . '/includes/formulario-contacto.php'; 
require_once __DIR__ . '/includes/encabezado.php'; 

introduccionPagina('Cuéntanos qué necesita tu operación', 'Hablemos de tus retos y de cómo podemos acompañarte.'); 
?>

<section class="wrap contact-form-section" id="formulario">
    <form class="contact-form" action="contacto.php#formulario" method="post" novalidate>
        <p class="form-hint">Los campos con * son obligatorios.</p>

        <?php if ($enviado): ?>
            <div class="form-notice form-success" role="status">
                Tu consulta ha sido enviada con éxito. Gracias por contactar a Gambacua.
            </div>
        <?php endif; ?>

        <?php if ($aviso): ?>
            <div class="form-notice" role="alert">
                <?= escaparContacto($aviso) ?>
            </div>
        <?php endif; ?>

        <?php if ($errores): ?>
            <div class="form-notice" role="alert">
                Revisa los campos indicados antes de enviar tu consulta.
            </div>
        <?php endif; ?>

        <input type="hidden" name="token" value="<?= escaparContacto($_SESSION['contact_token']) ?>">
        
        <!-- Campo trampa antispam -->
        <div class="form-trap" aria-hidden="true">
            <label for="website">Sitio web</label>
            <input id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-grid">
            <?php 
            $configuracionCampos = [
                'nombres'   => ['Nombres', 'text', 'given-name', 100, true],
                'apellidos' => ['Apellidos', 'text', 'family-name', 100, true],
                'correo'    => ['Correo electrónico', 'email', 'email', 254, true],
                'telefono'  => ['Teléfono', 'tel', 'tel', 30, false],
                'empresa'   => ['Empresa', 'text', 'organization', 150, false],
                'asunto'    => ['Asunto', 'text', 'off', 160, true]
            ];
            foreach ($configuracionCampos as $clave => $campo): ?>
                <div class="form-field<?= in_array($clave, ['empresa', 'asunto'], true) ? ' form-field-wide' : '' ?>">
                    <label for="<?= $clave ?>">
                        <?= $campo[0] ?><?= $campo[4] ? ' *' : ' <span>(opcional)</span>' ?>
                    </label>
                    <input 
                        id="<?= $clave ?>" 
                        name="<?= $clave ?>" 
                        type="<?= $campo[1] ?>" 
                        autocomplete="<?= $campo[2] ?>" 
                        maxlength="<?= $campo[3] ?>" 
                        value="<?= escaparContacto($campos[$clave]) ?>" 
                        <?= $campo[4] ? 'required' : '' ?>
                        <?= isset($errores[$clave]) ? 'aria-invalid="true" aria-describedby="error-' . $clave . '"' : '' ?>
                    >
                    <?php if (isset($errores[$clave])): ?>
                        <small class="field-error" id="error-<?= $clave ?>"><?= $errores[$clave] ?></small>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <div class="form-field form-field-wide">
                <label for="mensaje">¿Cómo podemos ayudarte? *</label>
                <textarea 
                    id="mensaje" 
                    name="mensaje" 
                    rows="5" 
                    minlength="10" 
                    maxlength="5000" 
                    required 
                    <?= isset($errores['mensaje']) ? 'aria-invalid="true" aria-describedby="error-mensaje"' : '' ?>
                ><?= escaparContacto($campos['mensaje']) ?></textarea>
                <?php if (isset($errores['mensaje'])): ?>
                    <small class="field-error" id="error-mensaje"><?= $errores['mensaje'] ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-submit">
            <p>Usaremos tus datos para atender esta consulta conforme a nuestras políticas de privacidad.</p>
            <button class="button" type="submit">
                Enviar consulta <?= icono('diagonal') ?>
            </button>
        </div>
    </form>

    <!-- Mapa e información de ubicación -->
    <div class="map-panel contact-form-map">
        <iframe 
            title="Ubicación de Gambacua en Hermosillo" 
            src="https://maps.google.com/maps?q=Blvd.%20Garcia%20Morales%201279%20M%20La%20Manga%20Hermosillo%2083220&amp;output=embed" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade" 
            allowfullscreen>
        </iframe>
        <div class="map-caption">
            <?= icono('pin') ?>
            <div>
                <strong>Hermosillo, Sonora</strong>
                <span>Blvd. García Morales 1279 M, Col. La Manga, CP 83220.</span>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=Blvd.+Garcia+Morales+1279+M+La+Manga+Hermosillo+83220" target="_blank" rel="noopener noreferrer">
                    Cómo llegar <?= icono('diagonal') ?>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="wrap contact-info-section" aria-label="Información directa de atención">
    <div class="contact-info-grid">
        <!-- Horario de atención -->
        <article class="contact-info-card">
            <div class="contact-info-icon" aria-hidden="true">
                <?= icono('clock') ?>
            </div>
            <div class="contact-info-content">
                <span class="contact-info-label">Horario de atención</span>
                <strong class="contact-info-value">8:00 am – 5:00 pm</strong>
                <p class="contact-info-note">Lunes a viernes</p>
            </div>
        </article>

        <!-- Correo de ventas -->
        <article class="contact-info-card">
            <div class="contact-info-icon" aria-hidden="true">
                <?= icono('mail') ?>
            </div>
            <div class="contact-info-content">
                <span class="contact-info-label">Correo de ventas</span>
                <a class="contact-info-link" href="mailto:ventas@gambacua.com">
                    ventas@gambacua.com
                </a>
                <p class="contact-info-note">Atención comercial directa y cotizaciones</p>
            </div>
        </article>

        <!-- Ubicación -->
        <article class="contact-info-card">
            <div class="contact-info-icon" aria-hidden="true">
                <?= icono('pin') ?>
            </div>
            <div class="contact-info-content">
                <span class="contact-info-label">Ubicación</span>
                <strong class="contact-info-value">Hermosillo, Sonora</strong>
                <address class="contact-info-address">
                    Blvd. García Morales 1279 M, Col. La Manga, CP 83220.<br>
                    <span>Presencia operativa en CDMX, México</span>
                </address>
            </div>
        </article>
    </div>
</section>

<?php require __DIR__ . '/includes/pie.php'; ?>


