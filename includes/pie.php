    </main>

    <!-- Pie de página institucional -->
    <footer class="site-footer">
        <div class="wrap">
            <div class="footer-row">
                <!-- Identidad y redes sociales -->
                <div class="footer-identity">
                    <a href="index.php" class="footer-brand" aria-label="Gambacua inicio">
                        <img src="assets/images/logo-gambacua-oficial.svg" alt="Gambacua" width="265" height="95">
                    </a>
                    <div class="footer-socials" aria-label="Redes sociales">
                        <a href="https://www.instagram.com/gambacua/?hl=es" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                <rect x="3" y="3" width="18" height="18" rx="5"/>
                                <circle cx="12" cy="12" r="4"/>
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/gambacua" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M14 22v-9h3l.5-4H14V7c0-1.2.4-2 2-2h2V1.4A24 24 0 0 0 15 1c-3 0-5 1.8-5 5v3H7v4h3v9Z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/company/112899980/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <circle cx="4.5" cy="4.5" r="2.2"/>
                                <path d="M2.5 8h4v14h-4ZM9 8h4v2c.8-1.4 2.1-2.3 4-2.3 3.5 0 4.5 2.2 4.5 5.5V22h-4v-8c0-1.8-.3-3-2-3-1.8 0-2.5 1.2-2.5 3v8H9Z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Columna Menú -->
                <div class="footer-column">
                    <h2>Menú</h2>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="historia.php">Nuestra historia</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="catalogos.php">Catálogo</a></li>
                    </ul>
                </div>

                <!-- Columna Contacto -->
                <div class="footer-column footer-contact">
                    <h2>Contacto</h2>
                    <a href="tel:+526621101511"><?= icono('phone') ?> +52 662 110 1511</a>
                    <a href="mailto:ventas@gambacua.com"><?= icono('mail') ?> ventas@gambacua.com</a>
                    <a href="mailto:ventasingredientes@gambacua.com"><?= icono('mail') ?> ventasingredientes@gambacua.com</a>
                    <address>
                        <a href="https://www.google.com/maps/search/?api=1&amp;query=Blvd.+Garcia+Morales+1279+M+La+Manga+Hermosillo+83220" target="_blank" rel="noopener noreferrer">
                            <?= icono('pin') ?>
                            <span>Blvd. García Morales 1279 M,<br>Col. La Manga, Hermosillo,<br>CP 83220, Sonora, México.</span>
                        </a>
                    </address>
                    <p>CDMX, México</p>
                </div>

                <!-- Columna Legal -->
                <div class="footer-column">
                    <h2>Información legal</h2>
                    <ul>
                        <li><a href="legal.php?tipo=cookies">Política de cookies</a></li>
                        <li><a href="legal.php?tipo=privacidad">Privacidad</a></li>
                        <li><a href="legal.php?tipo=terminos">Términos y condiciones</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>© <?= date('Y') ?> Gambacua. Todos los derechos reservados.</span>
            </div>
        </div>
    </footer>

    <?php if ($paginaActual === 'index'): ?>
    <!-- Retiro del preloader exclusivo de Inicio -->
    <script>
    (function() {
        var startTime = performance.now();
        var isReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var minDisplay = isReduced ? 0 : 750;

        function dismissPreloader() {
            var elapsed = performance.now() - startTime;
            var delay = Math.max(0, minDisplay - elapsed);

            setTimeout(function() {
                var el = document.getElementById('site-preloader');
                if (el && !el.classList.contains('is-loaded')) {
                    el.classList.add('is-loaded');
                    document.body.classList.add('is-page-ready');
                    setTimeout(function() {
                        if (el && el.parentNode) el.parentNode.removeChild(el);
                    }, 400);
                } else {
                    document.body.classList.add('is-page-ready');
                }
            }, delay);
        }

        if (document.readyState === 'complete') {
            window.requestAnimationFrame(dismissPreloader);
        } else {
            window.addEventListener('load', function() {
                window.requestAnimationFrame(dismissPreloader);
            }, { once: true });
        }
        setTimeout(dismissPreloader, 2200);
    })();
    </script>
    <?php endif; ?>
</body>
</html>


