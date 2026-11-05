const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
const assert = require('node:assert/strict');
const { capturarWebp } = require('./capturar-webp.cjs');

(async () => {
  const navegador = await chromium.launch();
  const errores = [];
  try {
    for (const ancho of [390, 1440]) {
      for (const movimiento of ['no-preference', 'reduce']) {
        const pagina = await navegador.newPage({ viewport: { width: ancho, height: 900 }, hasTouch: ancho < 768, reducedMotion: movimiento });
        pagina.on('pageerror', error => errores.push(error.message));
        pagina.on('response', respuesta => { if (respuesta.status() >= 400) errores.push(respuesta.url()); });
        const pulsar = async elemento => ancho < 768 ? elemento.tap() : elemento.click();
        await pagina.goto('http://localhost/gambacua/productos.php', { waitUntil: 'networkidle' });
        await pulsar(pagina.getByRole('link', { name: 'Ver categoría Acuacultura', exact: true }));
        await pulsar(pagina.getByRole('link', { name: 'Ver productos de Aqua&Co', exact: true }));
        const indice = pagina.locator('.acuacultura-indice');
        assert.equal(await indice.locator('a').last().evaluate(e => getComputedStyle(e).backgroundColor), 'rgba(0, 0, 0, 0)');
        await pulsar(indice.locator('a').last());
        await pagina.waitForURL(/#producto-10$/);
        const imagen = pagina.locator('#producto-10 .acuacultura-ampliar');
        await pulsar(imagen);
        const visor = pagina.locator('dialog');
        assert(await visor.evaluate(e => e.open));
        await pagina.waitForTimeout(280);
        assert.equal(await visor.evaluate(e => getComputedStyle(e).opacity), '1');
        if (movimiento === 'reduce') assert.equal(await visor.evaluate(e => getComputedStyle(e).transform), 'none');
        await capturarWebp(pagina, `tools/screenshots/recorrido-visor-${ancho}-${movimiento}.webp`);
        await pagina.keyboard.press('Escape');
        assert(await imagen.evaluate(e => e === document.activeElement));
        await imagen.press('Enter');
        assert.equal(await visor.getAttribute('data-entrada-suave'), null);
        await pagina.getByRole('button', { name: 'Cerrar', exact: true }).click();
        await pagina.waitForTimeout(280);
        await capturarWebp(pagina, `tools/screenshots/recorrido-producto-${ancho}-${movimiento}.webp`);
        await pulsar(pagina.getByRole('link', { name: 'Solicitar asesoría', exact: true }));
        await pagina.waitForURL(/contacto.php$/);
        assert(await pagina.locator('form').count());
        await pagina.goBack();
        assert(pagina.url().includes('acuacultura.php'));
        assert.equal(await pagina.evaluate(() => document.documentElement.scrollWidth > innerWidth + 1), false);
        await pagina.close();
      }
    }
    assert.deepEqual(errores, []);
    console.log('PASS: Productos → Acuacultura → Aqua&Co → EMA → visor → Contacto → atrás; mouse, touch, teclado y movimiento reducido.');
  } finally {
    await navegador.close();
  }
})().catch(error => { console.error(error); process.exitCode = 1; });
