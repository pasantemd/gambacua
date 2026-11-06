const assert = require('node:assert/strict');
const fs = require('node:fs');
const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
const sharp = require('C:/Users/pasantemd/.cache/codex-runtimes/codex-primary-runtime/dependencies/node/node_modules/sharp');
const origen = 'http://localhost/gambacua/acuacultura.php';
const marcas = { koi: 3, acopio: 4, nexwater: 1, 'acqua-co': 10, 'mixer-pro': 1 };
(async () => {
  const navegador = await chromium.launch({ headless: true });
  const errores = [];
  fs.mkdirSync('tools/screenshots', { recursive: true });
  try {
    for (const ancho of [320, 390, 768, 1024, 1440]) {
      const pagina = await navegador.newPage({ viewport: { width: ancho, height: 900 }, hasTouch: ancho < 768, reducedMotion: 'reduce' });
      pagina.on('pageerror', error => errores.push(error.message));
      pagina.on('response', response => { if (response.status() >= 400) errores.push(response.status() + ' ' + response.url()); });
      await pagina.goto(origen, { waitUntil: 'networkidle' });
      assert.equal(await pagina.locator('.acuacultura-marca').count(), 5);
      const enlaces = await pagina.locator('.acuacultura-marca').evaluateAll(elementos => elementos.map(e => e.getAttribute('href')));
      assert.deepEqual(enlaces, Object.keys(marcas).map(clave => `acuacultura.php?marca=${clave}`));
      for (const enlace of enlaces) {
        await pagina.locator(`.acuacultura-marca[href="${enlace}"]`).click();
        await pagina.waitForLoadState('networkidle');
        const clave = new URL(pagina.url()).searchParams.get('marca');
        assert.equal(await pagina.locator('.acuacultura-producto').count(), marcas[clave]);
        assert.equal(await pagina.getByText('Ampliar imagen', {exact:true}).count(), 0);
        assert.equal(await pagina.locator('.acuacultura-ficha').count(), 0);
        assert.equal(await pagina.locator('.acuacultura-navegacion, .acuacultura-volver').count(), 0);
        if (clave === 'koi') {
          assert.equal(await pagina.locator('summary').filter({ hasText: /^Funcionamiento de cabeza ciclónica$/ }).count(), 1);
          assert.equal(await pagina.locator('.acuacultura-producto img[src$="monitoreo-bintrac-apracom.webp"]').count(), 1);
          assert.equal(await pagina.locator('.acuacultura-figura').count(), 1);
        }
        if (clave === 'acopio') {
          assert.equal(await pagina.locator('.acuacultura-destacado').count(), 3);
          assert.equal(await pagina.locator('.acuacultura-lista-iconos img').count(), 6);
          assert.equal(await pagina.locator('.acuacultura-figura').count(), 2);
        }
        for (const figura of await pagina.locator('.acuacultura-figura a').all()) {
          const destino = await figura.getAttribute('href');
          assert.equal((await pagina.request.get(new URL(destino, origen).href)).status(), 200);
        }
        for (const imagen of await pagina.locator('img:visible').all()) await imagen.scrollIntoViewIfNeeded();
        await pagina.waitForFunction(() => [...document.images].filter(i => i.getClientRects().length).every(i => i.complete && i.naturalWidth > 0));
        assert(await pagina.evaluate(() => document.documentElement.scrollWidth <= innerWidth + 1), `Overflow ${clave} ${ancho}`);
        if ([390, 1440].includes(ancho) && ['acqua-co', 'nexwater'].includes(clave)) {
          await pagina.evaluate(() => scrollTo(0, 0));
          await sharp(await pagina.screenshot({ fullPage: true })).resize({ height: 16000, withoutEnlargement: true }).webp().toFile(`tools/screenshots/acuacultura-${clave}-${ancho}.webp`);
        }
        await pagina.goto('http://localhost/gambacua/acuacultura.php');
        await pagina.waitForLoadState('networkidle');
      }
      assert(await pagina.evaluate(() => document.documentElement.scrollWidth <= innerWidth + 1), `Overflow índice ${ancho}`);
      if ([390, 1440].includes(ancho)) await sharp(await pagina.screenshot({ fullPage: true })).webp().toFile(`tools/screenshots/acuacultura-marcas-${ancho}.webp`);
      await pagina.locator('.acuacultura-marca').first().focus();
      assert(await pagina.locator('.acuacultura-marca').first().evaluate(e => e.matches(':focus-visible')));
      await pagina.keyboard.press('Enter');
      await pagina.waitForURL('**marca=koi');
      await pagina.goBack({ waitUntil: 'networkidle' });
      assert.equal(await pagina.locator('.acuacultura-marca').count(), 5);
      console.log(`OK ${ancho}px: 5 marcas, 19 fichas, imágenes, clics, regreso, teclado y overflow`);
      await pagina.close();
    }
    const pagina = await navegador.newPage({ javaScriptEnabled: false });
    for (const parametro of ['', '?marca[]=koi', '?marca=desconocida', '?marca=%3Cscript%3E']) {
      await pagina.goto(origen + parametro);
      assert.equal(await pagina.locator('.acuacultura-marca').count(), 5);
    }
    await pagina.locator('.acuacultura-marca').first().click();
    assert.equal(await pagina.locator('.acuacultura-producto').count(), 3);
    for (const antigua of ['variomac', 'ema']) {
      await pagina.goto(origen + '?marca=' + antigua);
      assert.equal(new URL(pagina.url()).searchParams.get('marca'), 'acqua-co');
      assert.equal(await pagina.locator('.acuacultura-producto').count(), 10);
    }
    assert.deepEqual(errores, []);
    console.log('OK sin JavaScript, parámetros inválidos y sin errores de consola o HTTP');
  } finally { await navegador.close(); }
})().catch(error => { console.error(error); process.exitCode = 1; });
