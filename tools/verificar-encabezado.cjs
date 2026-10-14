const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage({ viewport: { width: 1440, height: 900 } });
  await page.goto('http://localhost/gambacua/contacto.php', { waitUntil: 'domcontentloaded' });

  const trigger = page.locator('.nav-dropdown-trigger');
  const dropdown = page.locator('#menu-dropdown-productos');
  await trigger.hover();
  await page.waitForTimeout(220);
  if (!await dropdown.isVisible()) throw new Error('El dropdown no abre al pasar el cursor.');
  await page.mouse.move(20, 300);
  await page.waitForTimeout(220);
  if (await dropdown.isVisible()) throw new Error('El dropdown no cierra al retirar el cursor.');

  await trigger.click();
  await page.waitForTimeout(220);
  if (await trigger.getAttribute('aria-expanded') !== 'true' || !await dropdown.isVisible()) {
    throw new Error('El dropdown no abre al hacer clic.');
  }

  const category = page.getByRole('link', { name: 'Inocuidad alimentaria', exact: true });
  const subcategory = page.getByRole('link', { name: 'Compact Dry', exact: true });
  if (await subcategory.isVisible()) throw new Error('La subcategoría se muestra antes de pasar por su categoría.');
  await category.hover();
  if (!await subcategory.isVisible()) throw new Error('La subcategoría no aparece al pasar por su categoría.');

  const expectedSubcategories = [
    'Medios de cultivo',
    'Filtración por membrana',
    'Materiales e insumos',
    'Compact Dry',
    'Micotoxinas',
    'Histamina'
  ];
  const actualSubcategories = (await page.locator('.nav-dropdown-subitem:not(.nav-dropdown-parent-link)').allTextContents())
    .map(label => label.trim());
  if (JSON.stringify(actualSubcategories) !== JSON.stringify(expectedSubcategories)) {
    throw new Error(`Orden de subcategorías incorrecto: ${actualSubcategories.join(', ')}.`);
  }

  const gap = await page.evaluate(() => {
    const triggerBox = document.querySelector('.nav-dropdown-trigger').getBoundingClientRect();
    const menuBox = document.querySelector('.nav-dropdown-menu').getBoundingClientRect();
    return Math.round(menuBox.top - triggerBox.bottom);
  });
  if (gap < 0 || gap > 8) throw new Error(`Separación inesperada del dropdown: ${gap}px.`);

  await trigger.click();
  await page.waitForTimeout(220);
  if (await trigger.getAttribute('aria-expanded') !== 'false' || await dropdown.isVisible()) {
    throw new Error('El dropdown no cierra con el segundo clic.');
  }

  await page.setViewportSize({ width: 390, height: 844 });
  await page.reload({ waitUntil: 'domcontentloaded' });
  await page.locator('.menu-toggle').click();
  if (!await page.locator('body').evaluate(body => body.classList.contains('has-mobile-nav'))) {
    throw new Error('El menú móvil no bloquea el contenido de fondo.');
  }
  await page.screenshot({ path: 'tools/screenshots/mobile-menu-open.png', fullPage: false });
  await trigger.click();
  await page.waitForTimeout(220);
  if (!await dropdown.isVisible()) throw new Error('El dropdown no abre en móvil.');
  const mobileCategory = page.getByRole('link', { name: 'Inocuidad alimentaria', exact: true });
  const mobileSubcategory = page.getByRole('link', { name: 'Compact Dry', exact: true });
  await mobileCategory.click();
  if (!await dropdown.isVisible() || !await mobileSubcategory.isVisible()) {
    throw new Error('El submenú de Inocuidad no permanece abierto después del clic.');
  }
  if (await mobileCategory.getAttribute('aria-expanded') !== 'true') {
    throw new Error('El submenú de Inocuidad no comunica su estado expandido.');
  }
  await page.screenshot({ path: 'tools/screenshots/mobile-menu-products.png', fullPage: false });
  await trigger.click();
  await page.waitForTimeout(220);
  if (await dropdown.isVisible()) throw new Error('El dropdown no cierra en móvil.');
  await page.locator('.menu-toggle').click();
  if (await page.locator('body').evaluate(body => body.classList.contains('has-mobile-nav'))) {
    throw new Error('El bloqueo del fondo permanece después de cerrar el menú.');
  }

  console.log(`PASS: dropdown abre/cierra por cursor y clic; móvil correcto; separación ${gap}px.`);
  await browser.close();
})().catch(error => {
  console.error(error);
  process.exit(1);
});
