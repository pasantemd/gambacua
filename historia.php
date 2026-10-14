<?php 
require __DIR__.'/includes/encabezado.php'; 
introduccionPagina('Nuestra historia', 'Innovación, calidad y acompañamiento técnico para la industria mexicana.'); 
?>

<section class="wrap history-layout">
  <div>
    <h2>Una visión que comenzó en México</h2>
    <p class="lead">En Gambacua iniciamos operaciones en México en 2022, con el objetivo de ofrecer al mercado sistemas especializados de alimentación para camarón, enfocándonos inicialmente en el norte del país.</p>
    <p>Gracias a la confianza de nuestros clientes y al crecimiento constante del mercado mexicano, en 2024 decidimos ampliar nuestras instalaciones y fortalecer nuestra capacidad operativa. Esta expansión nos permitió continuar brindando el mismo nivel de calidad, servicio y acompañamiento técnico que nos caracteriza, al tiempo que nos preparábamos para atender nuevas necesidades de la industria.</p>
  </div>
  <?php espacioMultimedia('historia/laboratorio-operacion.webp', 'Instalaciones de laboratorio y diagnóstico Gambacua'); ?>
</section>

<section class="wrap history-timeline-section" aria-label="Línea de tiempo de nuestra historia">
  <div class="timeline-header">
    <h2>Nuestra trayectoria</h2>
    <p>La evolución constante de Gambacua al servicio del desarrollo acuícola mexicano.</p>
  </div>
  <div class="timeline-horizontal-wrap">
    <div class="timeline-track">
      <div class="timeline-axis-line" aria-hidden="true"></div>

      <div class="timeline-grid">
        <!-- 2022 -->
        <div class="timeline-step">
          <div class="timeline-node-wrap">
            <span class="timeline-tag">Fundación</span>
            <div class="timeline-node" aria-hidden="true">
              <span class="timeline-dot"></span>
            </div>
          </div>
          <article class="timeline-card">
            <div class="timeline-meta">
              <span class="timeline-year">2022</span>
              <span class="timeline-badge">Fundación</span>
            </div>
            <h3 class="timeline-title">Inicios y enfoque en el norte</h3>
            <p class="timeline-desc">Iniciamos operaciones en México con el objetivo de ofrecer al mercado sistemas especializados de alimentación para camarón, enfocándonos inicialmente en el norte del país.</p>
          </article>
        </div>

        <!-- 2024 -->
        <div class="timeline-step">
          <div class="timeline-node-wrap">
            <span class="timeline-tag">Expansión</span>
            <div class="timeline-node" aria-hidden="true">
              <span class="timeline-dot"></span>
            </div>
          </div>
          <article class="timeline-card">
            <div class="timeline-meta">
              <span class="timeline-year">2024</span>
              <span class="timeline-badge">Expansión</span>
            </div>
            <h3 class="timeline-title">Crecimiento operativo</h3>
            <p class="timeline-desc">Gracias a la confianza de nuestros clientes, ampliamos nuestras instalaciones y fortalecimos nuestra capacidad para atender nuevas necesidades de la industria.</p>
          </article>
        </div>

        <!-- Presente -->
        <div class="timeline-step is-present">
          <div class="timeline-node-wrap">
            <span class="timeline-tag is-present-tag">Actualidad</span>
            <div class="timeline-node is-present-node" aria-hidden="true">
              <span class="timeline-dot is-present-dot"></span>
            </div>
          </div>
          <article class="timeline-card is-present">
            <div class="timeline-meta">
              <span class="timeline-year is-present-year">Presente</span>
              <span class="timeline-badge">Actualidad</span>
            </div>
            <h3 class="timeline-title">Innovación y acompañamiento</h3>
            <p class="timeline-desc">Consolidados como un aliado estratégico integral de la industria acuícola y de los sectores relacionados con la alimentación y la inocuidad.</p>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="wrap team-section" aria-labelledby="team-title">
  <div class="team-heading">
    <h2 id="team-title">Nuestro equipo</h2>
    <p class="team-lead">Empuje, innovación y capacidad de adaptación.</p>
    <div class="team-copy">
      <p>En Gambacua nos distinguimos por nuestro empuje, innovación y capacidad de adaptación. Nuestro equipo ha construido una trayectoria de constante evolución, renovándonos y transformándonos cada vez que las necesidades del mercado y de nuestros clientes lo requieren.</p>
      <p>Creemos que estar cerca de nuestros clientes significa mucho más que ofrecer productos: significa escuchar, entender sus retos y acompañarlos técnicamente para encontrar soluciones eficientes y confiables.</p>
    </div>
  </div>

  <div class="team-content">
    <?php espacioMultimedia('historia/equipo-gambacua.webp', 'Equipo Gambacua acompañando una operación', 'team-visual'); ?>
  </div>
</section>


<section class="wrap contact-strip">
  <div>
    <h2>Hablemos de lo que tu operación necesita</h2>
    <p>Acompañamos técnicamente cada etapa de tu proceso con soluciones eficientes y confiables.</p>
  </div>
  <a class="button button-light" href="contacto.php">Contacta a nuestro equipo <?= icono('diagonal') ?></a>
</section>

<?php require __DIR__.'/includes/pie.php'; ?>



