const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');
const { execFileSync } = require('node:child_process');
const fs = require('node:fs');
const path = require('node:path');

for (const dir of ['.', 'includes']) {
  for (const file of fs.readdirSync(dir).filter(item => item.endsWith('.php'))) {
    console.log(execFileSync('C:/xampp/php/php.exe', ['-l', path.join(dir, file)], { encoding: 'utf8' }).trim());
  }
}

(async () => {
  const browser = await chromium.launch({ headless: true });
  const errors = [];
  const page = await browser.newPage();
  const routes = ['index', 'historia', 'productos', 'ingredientes', 'inocuidad', 'micotoxinas', 'histamina', 'medios-cultivo', 'filtracion-membrana', 'materiales-insumos', 'compact-dry', 'catalogos', 'contacto', 'legal'];

  page.on('pageerror', error => errors.push(error.message));
  fs.mkdirSync('tools/screenshots', { recursive: true });

  for (const width of [1440, 768, 390, 320]) {
    await page.setViewportSize({ width, height: 1000 });
    for (const route of routes) {
      const response = await page.goto(`http://localhost/gambacua/${route}.php`, { waitUntil: 'load' });
      await page.evaluate(() => document.fonts.ready);
      const state = await page.evaluate(() => ({
        overflow: document.documentElement.scrollWidth > innerWidth,
        broken: [...document.images].filter(image => image.getAttribute('src') && image.complete && !image.naturalWidth).map(image => image.src),
        active: document.querySelectorAll('#main-nav [aria-current="page"]').length
      }));
      const expectedActive = route === 'legal' ? 0 : 1;
      if (response.status() !== 200 || state.overflow || state.broken.length || state.active !== expectedActive) {
        errors.push({ width, route, status: response.status(), ...state });
      }
      if (['index', 'inocuidad'].includes(route) && [1440, 390].includes(width)) {
        await page.screenshot({ path: `tools/screenshots/${route}-${width}.png`, fullPage: true });
      }
    }

    if (width <= 768) {
        await page.getByRole('button', { name: /menú principal/i }).click();
      if (!await page.locator('#main-nav').isVisible()) errors.push('Mobile menu did not open');
      await page.keyboard.press('Escape');
      if (await page.locator('#main-nav').isVisible()) errors.push('Escape did not close menu');
    }
  }

  await page.setViewportSize({ width: 1440, height: 1000 });
  await page.goto('http://localhost/gambacua/index.php');
  for (const [label, href] of [['Nuestra historia', 'historia.php'], ['Catalogos', 'catalogos.php'], ['Contacto', 'contacto.php'], ['Inicio', 'index.php']]) {
    await page.locator(`#main-nav a[href="${href}"]`).first().click();
    await page.waitForLoadState('domcontentloaded');
    if (!await page.locator(`#main-nav a[href="${href}"]`).first().getAttribute('aria-current')) {
      errors.push(`Navigation failed: ${label}`);
    }
  }

  console.log(JSON.stringify({ pages: routes.length, widths: [1440, 768, 390, 320], errors }, null, 2));
  await browser.close();
  if (errors.length) process.exitCode = 1;
})().catch(error => {
  console.error(error);
  process.exitCode = 1;
});
