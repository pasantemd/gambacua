# Contexto del proyecto Gambacua

Actualizado: 2026-10-14.

## Objetivo

Sitio institucional de Gambacua para presentar la empresa, sus categorías de producto y facilitar contacto técnico en México. Lema oficial: *“Innovación, calidad y acompañamiento técnico para la industria mexicana”*. Pilares de crecimiento: Calidad, Innovación y Acompañamiento. El público principal pertenece a la industria alimentaria y acuícola.

## Ejecución local

- Entorno: Apache de XAMPP.
- URL: `http://localhost/gambacua/`.
- Stack: PHP nativo, HTML, CSS modular y JavaScript vanilla.
- No requiere base de datos ni compilación.
- PHP local: `C:\xampp\php\php.exe`.

## Identidad visual

- Logos oficiales: `assets/images/logo-gambacua-color.svg`, `assets/images/logo-gambacua-blanco.svg` y sus variantes.
- Favicon: `assets/images/favicon.webp`.
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
- `assets/css/sitio.css`: importador de estilos globales y por página.
- `assets/css/*.css`: estilos separados por componente o página.
- `assets/js/encabezado.js`: menú principal y desplegables.
- `assets/js/movimiento-sitio.js`: revelado editorial compartido de secciones, grupos y tarjetas; usa opacidad y desplazamiento breve, escalonado limitado y respeta `prefers-reduced-motion`.
- `assets/js/carrusel-categorias.js`: carrusel de categorías de Productos.
- `assets/js/compact-dry.js`: búsqueda, catálogo, modal y comportamiento de Compact Dry.
- `assets/css/carga.css`: sistema de pantalla de carga inicial, transición suave de página, barra de progreso para navegación y carga progresiva de imágenes.
- `tools/`: verificaciones y utilidades locales. Las capturas en `tools/screenshots/` son evidencia de QA, no contenido público.
- Los recursos raster publicados en `assets/images/` usan WebP; los logotipos oficiales se conservan en SVG.
- `tools/verificar-movimiento-sitio.cjs`: valida cobertura de movimiento, aparición al recorrer la página, consola, desbordamiento y movimiento reducido en las 14 páginas públicas.

## Páginas vigentes

- `index.php`: inicio, historia resumida, soluciones, valores y contacto.
- `historia.php`: historia y evolución de Gambacua.
- `productos.php`: índice visual de categorías.
- `ingredientes.php`: ovoproductos e información de Ingredientes.
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

- Categorías principales actuales: **Ingredientes** e **Inocuidad alimentaria**.
- **Inocuidad alimentaria** contiene, en este orden: **Medios de cultivo**, **Filtración por membrana**, **Materiales e insumos**, **Compact Dry**, **Micotoxinas** e **Histamina**.
- En móvil, las categorías de Productos con subsecciones funcionan como acordeones. Conservan su estado al cerrar y volver a abrir el menú principal e incluyen un enlace «Ver [categoría]» para acceder a la página principal.
- `micotoxinas.php` presenta **Biotech Bio-Shield** y **Symmetric Green- Quantum Green** como secciones navegables mediante el componente compartido `section-rail`. Sus datos viven en `includes/datos-micotoxinas.php` y utiliza recortes transparentes de producto y aprobación en `assets/images/micotoxinas/`.
- `histamina.php` presenta **Bio-Shield Histamine** en placa de tiras, con presentaciones de 48 y 96 pruebas. Sus datos viven en `includes/datos-histamina.php` y utiliza el logotipo oficial y una composición transparente del kit en `assets/images/histamina/`.
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
- Assets de placas y lector: `assets/images/compact-dry/`.
- Assets de EC Blue: `assets/images/ec-blue/`.
- Documentos PDF técnicos: `assets/documentos/compact-dry/`.
- No dupliques el catálogo manualmente en otra página. La página `inocuidad.php` sirve como entrada y enlaza a la experiencia completa.

## Contacto

- Correo de ventas: `ventas@gambacua.com`.
- Horario de atención: Lunes a viernes, 8:00 am – 5:00 pm.
- Teléfono: `+52 662 110 1511`.
- Dirección: Blvd. García Morales 1279 M, Col. La Manga, Hermosillo, CP 83220, Sonora, México.
- También se menciona CDMX, México, sin dirección específica.
- Formulario: nombres, apellidos, correo, asunto y mensaje obligatorios; teléfono y empresa opcionales.
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
- No usar animaciones que oculten títulos o información esencial.
- No depender solo de hover; toda interacción debe tener alternativa para touch y teclado.
- Mantener la geometría común de botones y escalar la “A” de fondo proporcionalmente al contenedor, sin multiplicar líneas decorativas.
- `PRODUCT.md` contiene el propósito original y `DESIGN.md` la dirección visual. Este archivo describe el estado operativo actual.
- `SKILL.md` contiene la selección de skills por situación. Cada agente debe verificar qué skills expone su entorno y usar los reemplazos documentados cuando una skill solo exista en otra instalación.

## Cuándo actualizar este contexto

Actualiza `CONTEXT.md` cuando cambien la arquitectura, categorías, páginas, datos de contacto, navegación, flujo del formulario, identidad, herramientas de validación o decisiones permanentes. No lo actualices por ajustes cosméticos aislados.

