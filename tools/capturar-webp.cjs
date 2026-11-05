const fs = require('node:fs');
const path = require('node:path');

async function capturarWebp(page, ruta, paginaCompleta = false) {
  const sesion = await page.context().newCDPSession(page);
  try {
    const opciones = {
      format: 'webp',
      quality: 88,
      fromSurface: true,
      captureBeyondViewport: paginaCompleta
    };

    if (paginaCompleta) {
      const { cssContentSize } = await sesion.send('Page.getLayoutMetrics');
      opciones.clip = {
        x: 0,
        y: 0,
        width: Math.ceil(cssContentSize.width),
        height: Math.ceil(cssContentSize.height),
        scale: 1
      };
    }

    const { data } = await sesion.send('Page.captureScreenshot', opciones);
    fs.mkdirSync(path.dirname(ruta), { recursive: true });
    fs.writeFileSync(ruta, Buffer.from(data, 'base64'));
  } finally {
    await sesion.detach();
  }
}

module.exports = { capturarWebp };
