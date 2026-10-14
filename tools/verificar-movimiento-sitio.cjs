const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');

const base = 'http://localhost/gambacua/';
const allRoutes = [
  'index.php',
  'historia.php',
  'productos.php',
  'ingredientes.php',
  'inocuidad.php',
  'medios-cultivo.php',
  'filtracion-membrana.php',
  'materiales-insumos.php',
  'micotoxinas.php',
  'histamina.php',
  'compact-dry.php',
  'catalogos.php',
  'contacto.php',
  'legal.php?tipo=privacidad'
];
const routes = process.env.MOTION_ROUTE ? [process.env.MOTION_ROUTE] : allRoutes;

const sharedTargets = '.site-motion-section, .site-motion-group, .site-motion-card';
const compactTargets = '.compact-vision-section, .cd-faq-section';

function assert(condition, message) {
  if (!condition) throw new Error(message);
}

async function inspectRoute(page, route, width) {
  const errors = [];
  const onConsole = message => {
    if (message.type() === 'error') errors.push(message.text());
  };
  page.on('console', onConsole);
  await page.goto(`${base}${route}`, { waitUntil: 'domcontentloaded' });

  const isCompact = route === 'compact-dry.php';
  const selector = isCompact ? compactTargets : sharedTargets;
  const state = await page.evaluate(({ isCompact, selector }) => ({
    enabled: document.documentElement.classList.contains(isCompact ? 'cd-motion-enabled' : 'site-motion-enabled'),
    reduce: matchMedia('(prefers-reduced-motion: reduce)').matches,
    targets: document.querySelectorAll(selector).length,
    overflow: document.documentElement.scrollWidth > document.documentElement.clientWidth
  }), { isCompact, selector });

  assert(state.targets > 0, `${route} (${width}px): no tiene objetivos de movimiento.`);
  assert(state.enabled, `${route} (${width}px): el sistema de movimiento no se activó.`);
  assert(!state.overflow, `${route} (${width}px): hay desbordamiento horizontal.`);

  const motionTargets = page.locator(selector);
  for (let index = 0; index < await motionTargets.count(); index += 1) {
    await motionTargets.nth(index).scrollIntoViewIfNeeded();
    await page.waitForTimeout(40);
  }
  const pending = await page.locator(selector).evaluateAll((targets, isCompact) => targets.filter(target => {
    const visibleClass = isCompact ? 'is-visible' : 'is-motion-visible';
    return !target.classList.contains(visibleClass);
  }).map(target => target.className), isCompact);
  assert(pending.length === 0, `${route} (${width}px): objetivos sin aparecer: ${pending.join(' | ')}`);
  assert(errors.length === 0, `${route} (${width}px): errores de consola: ${errors.join(' | ')}`);
  page.off('console', onConsole);
}

(async () => {
  const browser = await chromium.launch({ headless: true });

  for (const width of [1440, 390]) {
    const page = await browser.newPage({ viewport: { width, height: 900 }, hasTouch: width < 600 });
    for (const route of routes) await inspectRoute(page, route, width);
    await page.close();
  }

  const reduced = await browser.newPage({
    viewport: { width: 390, height: 844 },
    hasTouch: true,
    reducedMotion: 'reduce'
  });
  for (const route of routes) {
    await reduced.goto(`${base}${route}`, { waitUntil: 'domcontentloaded' });
    const isCompact = route === 'compact-dry.php';
    const selector = isCompact ? compactTargets : sharedTargets;
    const state = await reduced.evaluate(({ isCompact, selector }) => {
      const enabledClass = isCompact ? 'cd-motion-enabled' : 'site-motion-enabled';
      return {
        enabled: document.documentElement.classList.contains(enabledClass),
        targets: [...document.querySelectorAll(selector)].every(target => {
          const style = getComputedStyle(target);
          return style.opacity === '1' && style.transform === 'none';
        })
      };
    }, { isCompact, selector });
    assert(!state.enabled, `${route}: reduced-motion mantiene activo el movimiento.`);
    assert(state.targets, `${route}: reduced-motion deja contenido oculto o desplazado.`);
  }

  await reduced.close();
  await browser.close();
  console.log(`PASS: movimiento validado en ${routes.length} páginas, escritorio, móvil y reduced-motion.`);
})().catch(error => {
  console.error(error);
  process.exit(1);
});
