# Gambacua

Sitio institucional de Gambacua en PHP nativo, CSS modular y JavaScript vanilla. Funciona con Apache de XAMPP en `http://localhost/gambacua/`; no requiere base de datos ni compilación.

## Contenido principal

- `index.php`: inicio.
- `historia.php`: historia y equipo.
- `productos.php`: categorías de soluciones.
- `ingredientes.php`: ingredientes y ovoproductos.
- `inocuidad.php`: portal de inocuidad alimentaria.
- `medios-cultivo.php`: medios listos para usar, deshidratados y dosificados.
- `filtracion-membrana.php`: sistemas de filtración, unidades de conversión y dispensadores.
- `materiales-insumos.php`: materiales de laboratorio.
- `compact-dry.php`: placas, Compact Vision, EC Blue y preguntas frecuentes.
- `catalogos.php`: visor tipo libro del catálogo de inocuidad 2026.
- `contacto.php`: formulario, datos y mapa.

## Identidad

El Manual de Identidad Corporativa es la referencia visual. La interfaz usa Montserrat, azul profundo `#004766`, azul medio `#3097B2`, blanco y superficies azuladas claras. Couture Bold se reserva para el logotipo. Los logotipos oficiales están en `assets/images/logo-gambacua-*.svg`.

La “A” recortada de la marca aparece como marca de agua proporcional en fondos oscuros mediante `assets/css/identidad-marca.css`. Botones y tarjetas de acción usan cortes en la esquina superior derecha e inferior izquierda; el hover conserva el matiz de cada variante.

## Contacto

El formulario valida en cliente y servidor, usa CSRF y no simula envíos. Para habilitar correo configura `GAMBACUA_CONTACT_TO`, `GAMBACUA_MAIL_FROM` y el transporte de correo de PHP.

## Validación

```powershell
rtk C:\xampp\php\php.exe -l ruta\archivo.php
rtk node tools\auditar-interfaz.cjs
rtk node tools\verificar-encabezado.cjs
```

`tools/auditar-interfaz.cjs` revisa las rutas públicas en 1440, 1024, 768, 390 y 320 px, además de desbordamiento, imágenes rotas, elementos recortados, identificadores duplicados y errores de consola.
