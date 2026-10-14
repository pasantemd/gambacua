const { chromium } = require('C:/xampp/htdocs/compact-dry/node_modules/playwright');

const routes = ['index', 'historia', 'productos', 'ingredientes', 'inocuidad', 'micotoxinas', 'histamina', 'medios-cultivo', 'filtracion-membrana', 'materiales-insumos', 'compact-dry', 'catalogos', 'contacto', 'legal'];
const viewports = [
  { width: 1440, height: 900 },
  { width: 1024, height: 768 },
  { width: 768, height: 900 },
  { width: 390, height: 844 },
  { width: 320, height: 700 }
];

(async () => {
  const browser = await chromium.launch({ headless: true });
  const issues = [];

  for (const viewport of viewports) {
    const page = await browser.newPage({ viewport });
    const runtimeErrors = [];
    page.on('pageerror', error => runtimeErrors.push(error.message));
    page.on('console', message => {
      if (message.type() === 'error') runtimeErrors.push(message.text());
    });

    for (const route of routes) {
      runtimeErrors.length = 0;
      const response = await page.goto(`http://localhost/gambacua/${route}.php`, { waitUntil: 'load' });
      await page.evaluate(async () => {
        window.scrollTo(0, document.body.scrollHeight);
        await new Promise(resolve => setTimeout(resolve, 120));
        window.scrollTo(0, 0);
      });

      const state = await page.evaluate(() => {
        const visible = element => {
          const style = getComputedStyle(element);
          const rect = element.getBoundingClientRect();
          return style.display !== 'none' && style.visibility !== 'hidden' && Number(style.opacity) > 0 && rect.width > 0 && rect.height > 0;
        };
        const clipped = [...document.querySelectorAll('h1,h2,h3,h4,.button,button')]
          .filter(visible)
          .filter(element => {
            const style = getComputedStyle(element);
            const clipsX = ['hidden', 'clip'].includes(style.overflowX);
            const clipsY = ['hidden', 'clip'].includes(style.overflowY);
            return (clipsX && element.scrollWidth > element.clientWidth + 2)
              || (clipsY && element.scrollHeight > element.clientHeight + 2);
          })
          .map(element => `${element.tagName.toLowerCase()}.${element.className}`.slice(0, 100));
        const ids = [...document.querySelectorAll('[id]')].map(element => element.id);
        const duplicateIds = [...new Set(ids.filter((id, index) => ids.indexOf(id) !== index))];
        return {
          overflow: document.documentElement.scrollWidth > innerWidth + 1,
          brokenImages: [...document.images].filter(image => image.complete && !image.naturalWidth).map(image => image.src),
          clipped,
          duplicateIds
        };
      });

      if (!response || response.status() !== 200 || state.overflow || state.brokenImages.length || state.clipped.length || state.duplicateIds.length || runtimeErrors.length) {
        issues.push({ route, width: viewport.width, status: response?.status(), ...state, runtimeErrors: [...runtimeErrors] });
      }
    }
    await page.close();
  }

  console.log(JSON.stringify({ routes: routes.length, viewports: viewports.map(item => item.width), issues }, null, 2));
  await browser.close();
  if (issues.length) process.exitCode = 1;
})().catch(error => {
  console.error(error);
  process.exitCode = 1;
});
