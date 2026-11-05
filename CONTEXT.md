# Contexto del proyecto Gambacua

Actualizado: 2026-10-27.

## Objetivo

Sitio institucional de Gambacua para presentar la empresa, sus categorías de producto y facilitar contacto técnico en México. Lema oficial: *“Innovación, calidad y acompañamiento técnico para la industria mexicana”*. Pilares de crecimiento: Calidad, Innovación y Acompañamiento. El público principal pertenece a la industria alimentaria y acuícola.

## Ejecución local

- Entorno: Apache de XAMPP.
- URL: `http://localhost/gambacua/`.
- Stack: PHP nativo, HTML, CSS modular y JavaScript vanilla.
- No requiere base de datos ni compilación.
- PHP local: `C:\xampp\php\php.exe`.

## Identidad visual

- Logos oficiales: `assets/images/compartidas/logo-gambacua-horizontal.svg`, `assets/images/compartidas/logo-gambacua-oficial.svg` y `assets/images/compartidas/logo-gambacua-blanco.svg`.
- Favicon: `assets/images/compartidas/favicon.webp`.
- Colores oficiales: azul profundo `#004766`, azul medio `#3097B2`, blanco y azules muy claros. El naranja `#F18413` es complementario.
- Fuente de interfaz: Montserrat. Couture Bold se reserva para el logotipo.
- Rasgos: una “A” oficial recortada y proporcional a la derecha de fondos de marca; una firma discreta de dos trazos inclinados en los títulos principales de página y sección; botones y acciones con cortes superior derecho e inferior izquierdo; contraste limpio y movimiento breve con propósito.
- Dirección detallada: `DESIGN.md`.

## Arquitectura

- Páginas PHP en la raíz.
- `includes/encabezado.php`: cabecera, navegación y carga de CSS/JS.
- `includes/pie.php`: pie compartido, redes, contacto y enlaces legales.
- `includes/sitio.php`: navegación de productos, iconos SVG y utilidades compartidas.
- `includes/formulario-contacto.php`: estado, validación, CSRF y envío del formulario.
- `includes/datos-compact-dry.php`: catálogo estructurado de placas Compact Dry.
- `includes/datos-histamina.php`: información confirmada del kit Bio-Shield Histamine.
- `assets/css/sitio.css`: importador maestro de estilos globales y por página.
- `assets/css/*.css`: estilos modulares independientes organizados en secciones numeradas por página (`inicio.css`, `historia.css`, `productos.css`, `ingredientes.css`, `inocuidad.css`, `medios-cultivo.css`, `filtracion-membrana.css`, `materiales-insumos.css`, `compact-dry.css`, `micotoxinas.css`, `histamina.css`, `catalogos.css`, `contacto.css`, `legal.css`).
- `assets/js/encabezado.js`: menú principal y desplegables.
- `assets/js/movimiento-sitio.js`: revelado editorial compartido de secciones, grupos y tarjetas; usa opacidad y desplazamiento breve, escalonado limitado y respeta `prefers-reduced-motion`.
- `assets/js/carrusel-categorias.js`: carrusel de categorías de Productos (`productos.php`).
- `assets/js/compact-dry.js`: búsqueda, catálogo, modal y comportamiento de Compact Dry (`compact-dry.php`).
- `assets/js/filtracion-membrana.js`: selector y pestañas accesibles de dispensadores (`filtracion-membrana.php`).
- `assets/js/contacto.js`: validación accesible de formulario de contacto (`contacto.php`).
- `assets/js/historia.js`: soporte interactivo para la línea de tiempo (`historia.php`).
- `assets/js/visor-catalogo.js`: visor interactivo tipo libro con PageFlip (`catalogos.php`).
- `assets/js/navegador-secciones.js`: selección exclusiva de secciones en Medios de cultivo, Filtración por membrana, Materiales e insumos, Micotoxinas, Compact Dry y productos por marca de Acuacultura. Muestra solo el panel seleccionado; conserva enlaces directos (incluidos destinos internos), historial y desplegable móvil. Sin JavaScript, todas las secciones permanecen disponibles.
- `assets/css/carga.css`: preloader con animación de agua exclusivo de Inicio, barra de progreso compartida para navegación y skeleton local en imágenes para reservar espacio durante cargas lentas.
- `tools/`: verificaciones y utilidades locales. Las capturas en `tools/screenshots/` son evidencia de QA, no contenido público, y se generan directamente en WebP.
- Los recursos de `assets/images/` se organizan directamente dentro de cada carpeta principal por página o sección (`acuacultura`, `compact-dry`, `compartidas`, `filtracion-membrana`, `histamina`, `historia`, `ingredientes`, `inicio`, `inocuidad`, `materiales-insumos`, `medios-cultivo`, `micotoxinas`, `productos`), sin subcarpetas internas. `assets/images/compartidas/` se reserva para identidad y recursos consumidos por más de una página.
- Los recursos raster publicados usan WebP; los logotipos oficiales se conservan en SVG.
- `tools/verificar-movimiento-sitio.cjs`: valida cobertura de movimiento, aparición al recorrer la página, consola, desbordamiento y movimiento reducido en las 14 páginas públicas.
- `tools/verificar-rutas-imagenes.cjs`: comprueba que todas las rutas de imagen declaradas en PHP, CSS, JavaScript y documentación existan.

## Páginas vigentes

- Acuacultura conserva el orden de páginas del Catálogo 2026: KOI 5–8, Acopio 9–12, Aqua&Co 14–24, Mixer Pro 26 y Nexwater 28–29. El índice muestra miniaturas y páginas; Anterior/Siguiente recorre las fichas conservando una sola visible. Los apartados secundarios son desplegables abiertos por defecto. `secciones_primero` sitúa la propuesta de valor de Acopio antes de sus capacidades; `introduccion` presenta las aplicaciones siempre visibles con iconos de Nexwater, y sus beneficios reunidos aparecen después de la imagen y los usos del electrodo. Las imágenes se amplían con clic y los títulos reciben el foco al cambiar desde Anterior/Siguiente.

- `index.php`: inicio, historia resumida, soluciones, valores y contacto.
- `historia.php`: historia y evolución de Gambacua.
- `productos.php`: índice visual de categorías.
- `ingredientes.php`: ovoproductos e información de Ingredientes.
- `acuacultura.php`: cinco marcas, en el orden del índice del catálogo: KOI, Acopio, Aqua&Co, Mixer Pro y Nexwater. Variomac y EMA son productos dentro de Aqua&Co, no marcas independientes. Cada acceso abre `?marca=<clave>`; las antiguas rutas de Variomac y EMA redirigen a Aqua&Co. Los datos están en `includes/datos-acuacultura.php`: KOI incluye 3 fichas, Acopio 4, Aqua&Co 10, Mixer Pro 1 y Nexwater 1. Las fichas enlazan a las páginas correspondientes del catálogo y la navegación funciona sin JavaScript.
- `inocuidad.php`: portal principal de Inocuidad con tarjetas destacadas de geometría institucional compartida (cortes diagonales, la “A” de fondo visible y botones inferiores del mismo tamaño). Compact Dry y Micotoxinas muestran accesos directos a sus secciones internas.
- `micotoxinas.php`: familias de inmunoensayos Prognosis Biotech para micotoxinas, con métodos, presentaciones, productos y aprobación indicados en la fuente proporcionada.
- `histamina.php`: información y presentación del kit Bio-Shield Histamine.
- `medios-cultivo.php`: catálogo de medios de cultivo (listos para usar, deshidratados y dosificados).
- `filtracion-membrana.php`: catálogo de filtración por membrana (unidades de filtración/conversión y dispensadores).
- `materiales-insumos.php`: catálogo de consumibles (puntas para micropipetas, bolsas de muestreo, asas de inoculación y tubos de centrífuga).
- `compact-dry.php`: catálogo completo de placas, Compact Vision, buscador, modal, proceso y preguntas frecuentes.
- `catalogos.php`: visor tipo libro del Catálogo de inocuidad Gambacua 2026.
- `contacto.php`: formulario, mapa y datos de contacto.
- `legal.php`: cookies, privacidad y términos.

## Categorías y navegación

- Categorías principales actuales: **Ingredientes**, **Inocuidad alimentaria** y **Acuacultura**.
- Las fichas de Acuacultura siguen una estructura vertical limpia y centrada según el boceto de producto: Título arriba, Descripción, Imagen destacada en contenedor neutral central con zoom modal, y Características técnicas/detalles debajo con separadores sutiles. En móvil se ajusta armónicamente sin desbordamiento. Los diagramas y bloques visuales complementarios se presentan a continuación respetando la jerarquía.
- KOI y Acopio incluyen los complementos visuales de las páginas 7–12: cabeza ciclónica con indicaciones, BinTrac con silo, costos y mermas, iconos de capacidades, llenado y mapa de rutas. Los recortes e iconos del PDF se registran en el inventario, sin subcarpetas adicionales.
- Acuacultura usa fichas amplias con imagen y descripción, bloques técnicos separados e índice de productos mediante enlaces internos. `includes/enfasis-acuacultura.php` define los fragmentos en negrita cotejados con el PDF; se escapan antes de añadir marcado. `assets/js/acuacultura.js` abre imágenes en un diálogo nativo con zoom ajustable, arrastre con mouse y desplazamiento táctil de la imagen ampliada, cierre por Escape y restauración del foco; los enlaces a originales sirven de respaldo sin JavaScript. La identidad global se conserva.
- Acuacultura: las 19 fichas se cotejaron con el PDF original, que prevalece sobre la conversión Markdown con errores de OCR. Se ampliaron descripciones y características sin añadir especificaciones externas. Se reutilizan 13 imágenes de ficha existentes y seis recortes del PDF ausentes del banco; están directamente en `assets/images/acuacultura/` y documentados en el inventario. El cotejo y las discrepancias internas de la fuente están en `docs/auditoria-contenido-acuacultura.md`.
- **Inocuidad alimentaria** contiene, en este orden: **Medios de cultivo**, **Filtración por membrana**, **Materiales e insumos**, **Compact Dry**, **Micotoxinas** e **Histamina**.
- En móvil, las categorías de Productos con subsecciones funcionan como acordeones. Conservan su estado al cerrar y volver a abrir el menú principal e incluyen un enlace «Ver [categoría]» para acceder a la página principal.
- `micotoxinas.php` presenta **Biotech Bio-Shield** y **Symmetric Green- Quantum Green** como secciones navegables mediante el componente compartido `section-rail`. Sus datos viven en `includes/datos-micotoxinas.php` y utiliza recortes transparentes de producto y aprobación en `assets/images/micotoxinas/`.
- `histamina.php` presenta **Bio-Shield Histamine** en placa de tiras. La presentación indica 576 pruebas y el detalle de pruebas conserva 48 y 96. Sus datos viven en `includes/datos-histamina.php` y utiliza el logotipo oficial y una composición transparente del kit en `assets/images/histamina/`.
- `medios-cultivo.php` presenta tres subcategorías: **Listos para usar**, **Medios de cultivo deshidratados** y **Medios deshidratados dosificados**. Sus datos viven en `includes/datos-medios-cultivo.php` y sus imágenes en `assets/images/medios-cultivo/`.
- `filtracion-membrana.php` presenta dos subcategorías: **Filtros** (`#filtros`) y **Dispensadores** (`#dispensadores`). Sus datos viven en `includes/datos-filtracion-membrana.php` e imágenes en `assets/images/filtracion-membrana/`.
- `materiales-insumos.php` presenta cuatro subcategorías: **Puntas para micropipetas** (`#puntas-micropipetas`), **Bolsas de muestreo** (`#bolsas`), **Asas de inoculación** (`#asas-inoculacion`) y **Tubos de centrífuga** (`#tubos-centrifuga`). Sus datos viven en `includes/datos-materiales-insumos.php` e imágenes en `assets/images/materiales-insumos/`.
- Las páginas con navegación interna usan el componente lateral compartido `section-rail` en escritorio y un desplegable compacto ajustado al contenedor en móvil, con la banda horizontal como respaldo si JavaScript no está disponible. El estado activo se sincroniza mediante `assets/js/navegador-secciones.js`.
- `productos.php` muestra las categorías, no los productos individuales.
- El menú de Productos funciona por hover en escritorio y por clic/toque; debe conservar teclado y cierre con `Escape`.
- Los enlaces del menú se definen en `$elementosMenuProductos` dentro de `includes/sitio.php`. Medios de cultivo, Filtración por membrana y Materiales e insumos enlazan a sus páginas dedicadas.

## Compact Dry & EC Blue

- Página detallada: `compact-dry.php`.
- Secciones internas en rail: **Placas Compact Dry** (`#seccion-placas`), **Lector Compact Vision** (`#compact-vision`), **EC Blue** (`#ec-blue`) y **Preguntas frecuentes** (`#faq`).
- Datos de placas: `includes/datos-compact-dry.php`.
- Estilos: `assets/css/compact-dry.css`.
- Comportamiento: `assets/js/compact-dry.js`.
- Assets de placas, lector y EC Blue: se organizan directamente en `assets/images/compact-dry/`. `assets/images/productos/lector.webp` pertenece exclusivamente a la página Productos.

- Documentos PDF técnicos: `assets/documentos/compact-dry/`.
- No dupliques el catálogo manualmente en otra página. La página `inocuidad.php` sirve como entrada y enlaza a la experiencia completa.

## Contacto

- Correos de atención: `ventas@gambacua.com` (ventas generales e inocuidad) y `ventasingredientes@gambacua.com` (línea de ingredientes).
- Horario de atención: Lunes a viernes, 8:00 am – 5:00 pm.
- Teléfonos: `+52 662 110 1511` y `+52 1 644 290 9674`.
- Dirección: Blvd. García Morales 1279 M, Col. La Manga, Hermosillo, CP 83220, Sonora, México.
- También se menciona CDMX, México, sin dirección específica.
- Formulario: nombres, apellidos, correo, asunto, mensaje y consentimiento obligatorio de términos y privacidad (`privacidad`); teléfono y empresa opcionales.
- Variables de entorno: `GAMBACUA_CONTACT_TO` y `GAMBACUA_MAIL_FROM`.
- El sistema no debe fingir un envío exitoso cuando el correo no está configurado.

## Redes

- Instagram: `https://www.instagram.com/gambacua/?hl=es`.
- Facebook: `https://www.facebook.com/gambacua`.
- LinkedIn público: `https://www.linkedin.com/company/112899980/`.

## Restricciones y decisiones

- Los archivos internos propios usan nombres descriptivos en español (`encabezado`, `pie`, `sitio`, `datos-*`, `verificar-*`). Las rutas públicas, nombres de marca, claves de integración y selectores CSS existentes se conservan para no romper enlaces ni contratos de interfaz.
- Los scripts exclusivos de Historia y Contacto se declaran de forma condicional desde `includes/encabezado.php`; no se insertan después mediante un cargador dinámico.
- Mantener PHP sin framework salvo petición explícita.
- No inventar información comercial o técnica.
- Preservar rutas existentes y enlaces internos.
- Las páginas compartidas deben seguir siendo responsive.
- Las medidas fijas de la interfaz se expresan en píxeles. Las unidades fluidas (`%`, `fr`, `vw`, `vh`, `ch` y `clamp()`) se conservan únicamente cuando definen un comportamiento responsive o proporcional que se rompería al fijarlo en píxeles.
- No usar animaciones que oculten títulos o información esencial.
- No depender solo de hover; toda interacción debe tener alternativa para touch y teclado.
- Mantener la geometría común de botones y escalar la “A” de fondo proporcionalmente al contenedor, sin multiplicar líneas decorativas.
- Este archivo contiene el propósito del producto y su estado operativo; `DESIGN.md` define la dirección visual.
- `SKILL.md` contiene la selección de skills por situación. Cada agente debe verificar qué skills expone su entorno y usar los reemplazos documentados cuando una skill solo exista en otra instalación.

## Cuándo actualizar este contexto

El banco de Acuacultura está organizado en `assets/images/acuacultura/` por marca o línea del Catálogo de Acuacultura 2026. Dentro de cada marca solo hay imágenes con nombres descriptivos, sin subcarpetas. Su `README.md` explica la clasificación y `inventario.json` conserva la correspondencia con los originales. AQ1, Ubiquiti y APC tienen carpetas propias; el material sin marca confirmada está directamente en `adicionales/` y no se publica como marca del catálogo. Se extrajeron del PDF seis logotipos y la imagen del electrodo Nexwater. EMA se presenta como línea de monitoreo con su nombre, sin inventar un logotipo. La página dedicada `acuacultura.php`, la categoría de Productos y el menú del encabezado enlazan al catálogo.

Actualiza `CONTEXT.md` cuando cambien la arquitectura, categorías, páginas, datos de contacto, navegación, flujo del formulario, identidad, herramientas de validación o decisiones permanentes. No lo actualices por ajustes cosméticos aislados.

