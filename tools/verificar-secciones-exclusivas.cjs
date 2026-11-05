const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
const assert = require('node:assert/strict');
const { capturarWebp } = require('./capturar-webp.cjs');
const rutas = ['medios-cultivo.php', 'compact-dry.php', 'filtracion-membrana.php', 'materiales-insumos.php', 'micotoxinas.php', 'acuacultura.php?marca=acqua-co'];
(async () => {
  const browser = await chromium.launch();
  const errores = [];
  try {
    for (const ancho of [390, 1440]) {
      const pagina = await browser.newPage({ viewport: { width: ancho, height: 1000 }, hasTouch: ancho < 800, reducedMotion: 'reduce' });
      pagina.on('pageerror', error => errores.push(error.message));
      for (const ruta of rutas) {
        const url = 'http://localhost/gambacua/' + ruta;
        await pagina.goto(url, { waitUntil: 'networkidle' });
        const nav = pagina.locator('[data-section-rail], [data-section-panels]');
        const movil = ancho < 800 && await nav.getAttribute('data-section-rail') !== null;
        const enlaces = nav.locator(movil ? '.section-rail-mobile-options a' : '.section-rail-list a, :scope[data-section-panels] > a');
        const hashes = await enlaces.evaluateAll(es => es.map(e => e.hash));
        assert(hashes.length > 0, ruta);
        const verificar = async hash => {
          await pagina.locator(hash).waitFor({ state: 'visible' });
          assert.equal(await pagina.locator('[data-section-panel]:visible').count(), 1, ruta);
          assert(await pagina.locator(hash).isVisible(), ruta + hash);
          assert.equal(await pagina.evaluate(() => document.documentElement.scrollWidth > innerWidth + 1), false, ruta);
        };
        await verificar(hashes[0]);
        for (const hash of hashes) {
          if (movil) await nav.locator('summary').click();
          const seleccionado = enlaces.nth(hashes.indexOf(hash));
          if (ancho < 800) await seleccionado.tap();
          else { await seleccionado.focus(); await seleccionado.press('Enter'); }
          await verificar(hash);
          await pagina.evaluate(() => scrollTo({ top: document.body.scrollHeight, behavior: 'instant' }));
          await verificar(hash);
        }
        if (hashes.length > 1) {
          await pagina.goBack();
          await verificar(hashes[hashes.length - 2]);
          await pagina.goForward();
          await verificar(hashes.at(-1));
        }
        await pagina.reload({ waitUntil: 'networkidle' });
        await verificar(hashes.at(-1));
        if (ruta === rutas[0]) {
          await pagina.locator(hashes.at(-1)).scrollIntoViewIfNeeded();
          await capturarWebp(pagina, `tools/screenshots/seccion-exclusiva-${ancho}.webp`);
        }
        await pagina.goto(url + '#no-existe', { waitUntil: 'networkidle' });
        await verificar(hashes[0]);
      }
      await pagina.close();
    }
    const sinJS = await browser.newPage({ javaScriptEnabled: false });
    await sinJS.goto('http://localhost/gambacua/medios-cultivo.php');
    assert(await sinJS.locator('#listos-para-usar').isVisible());
    await sinJS.close();
    assert.deepEqual(errores, []);
    console.log('PASS: seis páginas, selección exclusiva, móvil, teclado, scroll, enlaces directos, recarga, atrás/adelante y respaldo sin JavaScript.');
  } finally { await browser.close(); }
})().catch(error => { console.error(error); process.exitCode = 1; });
