<?php 
require_once __DIR__ . '/includes/formulario-contacto.php'; 
require_once __DIR__ . '/includes/encabezado.php'; 

introduccionPagina('Cuéntanos qué necesita tu operación', 'Hablemos de tus retos y de cómo podemos acompañarte.'); 
?>

<!-- 1. Formulario de Contacto y Mapa de Ubicación -->
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
            <div class="form-consent">
                <label class="form-checkbox-label" for="privacidad">
                    <input 
                        type="checkbox" 
                        id="privacidad" 
                        name="privacidad" 
                        value="1" 
                        required 
                        <?= !empty($campos['privacidad']) ? 'checked' : '' ?>
                        <?= isset($errores['privacidad']) ? 'aria-invalid="true" aria-describedby="error-privacidad"' : '' ?>
                    >
                    <span class="form-checkbox-text">
                        Acepto los <a href="legal.php?tipo=terminos" target="_blank" rel="noopener noreferrer">términos</a> y el uso de mis datos conforme a las <a href="legal.php?tipo=privacidad" target="_blank" rel="noopener noreferrer">políticas de privacidad</a>. *
                    </span>
                </label>
                <?php if (isset($errores['privacidad'])): ?>
                    <small class="field-error" id="error-privacidad"><?= $errores['privacidad'] ?></small>
                <?php endif; ?>
            </div>
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

<!-- 2. Información Directa de Atención -->
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
                <span class="contact-info-label">Correos de atención</span>
                <div class="contact-email-item">
                    <span class="contact-email-role">Ventas generales e inocuidad</span>
                    <a class="contact-info-link" href="mailto:ventas@gambacua.com">
                        ventas@gambacua.com
                    </a>
                </div>
                <div class="contact-email-item">
                    <span class="contact-email-role">Línea de ingredientes</span>
                    <a class="contact-info-link" href="mailto:ventasingredientes@gambacua.com">
                        ventasingredientes@gambacua.com
                    </a>
                </div>
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


