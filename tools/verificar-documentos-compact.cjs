const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');

(async () => {
  const browser = await chromium.launch({ headless: true });
  const page = await browser.newPage();
  await page.goto('http://localhost/gambacua/compact-dry.php', { waitUntil: 'load' });

  const documents = await page.locator('.cd-plate-card').evaluateAll(cards => cards.flatMap(card => {
    const data = JSON.parse(card.dataset.plateData);
    return [
      { code: data.codigo, type: 'guia', url: data.guiaTecnica },
      { code: data.codigo, type: 'ficha', url: data.fichaTecnica }
    ];
  }));

  const errors = [];
  for (const document of documents) {
    const response = await page.request.get(new URL(document.url, page.url()).href);
    if (!response.ok() || response.headers()['content-type'] !== 'application/pdf') {
      errors.push({ ...document, status: response.status(), contentType: response.headers()['content-type'] });
    }
  }

  await page.locator('.cd-plate-card').first().click();
  const modalLinks = {
    guide: await page.locator('#cd-modal-guide-btn').getAttribute('href'),
    sheet: await page.locator('#cd-modal-sheet-btn').getAttribute('href')
  };

  console.log(JSON.stringify({ plates: documents.length / 2, documents: documents.length, modalLinks, errors }, null, 2));
  if (documents.length !== 38 || errors.length || !modalLinks.guide.endsWith('.pdf') || !modalLinks.sheet.endsWith('.pdf')) process.exitCode = 1;
  await browser.close();
})().catch(error => {
  console.error(error);
  process.exitCode = 1;
});
