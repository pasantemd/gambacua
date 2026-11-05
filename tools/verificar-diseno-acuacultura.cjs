const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
const sharp = require('C:/Users/pasantemd/.cache/codex-runtimes/codex-primary-runtime/dependencies/node/node_modules/sharp');
const assert = require('node:assert/strict');
const fs = require('node:fs');
(async () => {
 const navegador = await chromium.launch();
 const errores = [];
 fs.mkdirSync('tools/screenshots', {recursive:true});
 try {
  for (const ancho of [390,1440]) {
   const pagina = await navegador.newPage({viewport:{width:ancho,height:1000},hasTouch:ancho<768,reducedMotion:'reduce'});
   pagina.on('pageerror', e => errores.push(e.message));
   for (const marca of ['', 'koi', 'acopio', 'acqua-co', 'mixer-pro', 'nexwater']) {
    await pagina.goto('http://localhost/gambacua/acuacultura.php'+(marca?'?marca='+marca:''), {waitUntil:'networkidle'});
    const destino=pagina.locator(marca?'.acuacultura-producto':'.acuacultura-marcas').first();
    await destino.evaluate(e=>scrollTo(0,e.getBoundingClientRect().top+scrollY-110));
    await pagina.waitForTimeout(200);
    await sharp(await pagina.screenshot()).webp().toFile(`tools/screenshots/acuacultura-redisenada-${marca||'marcas'}-${ancho}.webp`);
    if (!marca) continue;
    const enlace=pagina.locator('.acuacultura-ampliar').first();
    await enlace.focus();
    await pagina.keyboard.press('Enter');
    assert(await pagina.locator('dialog').evaluate(e=>e.open));
    await pagina.keyboard.press('Escape');
    assert(await enlace.evaluate(e=>e===document.activeElement));
    assert(!await pagina.locator('html').evaluate(e=>e.classList.contains('acuacultura-visor-abierto')));
    if (ancho<768) await enlace.tap(); else await enlace.click();
    await pagina.getByRole('button',{name:'Cerrar',exact:true}).click();
    assert(!await pagina.locator('dialog').evaluate(e=>e.open));
    await pagina.locator('.acuacultura-indice summary').click();
    assert(!await pagina.locator('.acuacultura-indice').evaluate(e=>e.open));
    await pagina.locator('.acuacultura-indice summary').click();
    await pagina.locator('.acuacultura-indice a').last().click();
    assert(await pagina.locator(pagina.url().slice(pagina.url().indexOf('#'))).count()===1);
    assert(await pagina.locator('.acuacultura-producto strong').count()>0);
    if (marca==='koi') {
     const figura=pagina.locator('.acuacultura-figura a').first();
     await figura.evaluate(e=>scrollTo(0,e.closest('.acuacultura-bloque-visual').getBoundingClientRect().top+scrollY-110));
     await sharp(await pagina.screenshot()).webp().toFile(`tools/screenshots/acuacultura-diagrama-${ancho}.webp`);
     await figura.click();
     assert((await pagina.locator('dialog > img').getAttribute('src')).endsWith('cabeza-ciclonica-indicaciones.webp'));
     await pagina.keyboard.press('Escape');
    }
   }
   await pagina.close();
  }
  assert.deepEqual(errores,[]);
  console.log('PASS: cinco marcas, índice, énfasis, visor, teclado, touch, Escape y restauración del foco; capturas 390/1440.');
 } finally { await navegador.close(); }
})();
