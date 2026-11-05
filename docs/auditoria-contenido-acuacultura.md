# Cotejo del contenido de Acuacultura

Fecha: 2026-10-28.

Fuentes comparadas: **Catálogo de Acuacultura 2026.pdf**, su conversión **Catálogo de Acuacultura 2026.md** y `includes/datos-acuacultura.php`.

El PDF es la referencia principal. El Markdown conserva el contenido general, pero contiene ruido de OCR, palabras tachadas artificialmente, fragmentos de capturas de pantalla y tablas desordenadas. No se trasladaron esos artefactos a la web.

## Cambios

| Fichas | Páginas | Ajuste |
| --- | --- | --- |
| KOI fija, móvil y monitoreo | 5, 7, 8 | Descripciones y características completas; drenaje, materiales, operación y nota sobre cambios de diseño. |
| Acopio | 9–12 | Trazabilidad, capacidades digitales, control GPS, recargas, conciliación y datos de unidad móvil con sus condiciones. |
| Venturi Eco2 y EcoMat | 14–15 | Descripciones originales, boquillas, microburbujas y características omitidas. |
| Force7 y Rio | 16–17 | Aplicaciones, hélices, componentes y datos de modelos cotejados visualmente. |
| Splash, Combito y Combo | 18–20 | Descripciones, características y variantes de instalación del catálogo. |
| Combix | 21 | Descripción original y nombres de componentes. El despiece con códigos y cantidades permanece disponible en la ficha PDF enlazada. |
| Variomac | 22 | Características completas; se conserva «18.000 lb/ha · POR EQUIPO · ESTIMADO», sin convertirlo en garantía. |
| EMA | 23–24 | Descripción, material exacto, medidas, peso, uso, vida útil y nombres de componentes. Códigos, cantidades y pesos por pieza se consultan en la página 24 del catálogo. |
| Mixer Pro | 26 | Descripción completa con motor, alimentación, bin, medidas, peso, material, uso y vida útil. |
| Nexwater | 28–29 | Descripción completa del proceso, usos, beneficios y aplicaciones originales. |

Las 19 descripciones y sus listas principales se comprobaron como fragmentos literales del texto extraído del PDF, normalizando únicamente espacios y saltos de línea. Los grupos suplementarios se cotejaron con el texto y, cuando la disposición de un diagrama era importante, con la página renderizada. No se incorporaron especificaciones de fuentes externas.

## Diferencias internas de las fuentes conservadas

- El índice denomina «Sistema de monitoreo Acopio» al apartado de la página 8. La ficha se titula «Sistema de monitoreo» y describe BinTrac; la web usa el título de la ficha y conserva BinTrac en su descripción.
- El índice escribe AQUA&CO; el logotipo y las fichas escriben ACQUA&CO. Se mantiene Aqua&Co como categoría, según la instrucción del usuario, y el logotipo original.
- Force7 menciona «bronce marino» en la descripción y «latón marino» en el rótulo del motor. No se unificaron por suposición.
- Combito menciona tanques profundos en el rótulo de instalación a dos pies y aguas poco profundas (hasta 50 cm) en la característica de la versión 2FEET. Se conservaron ambos textos en sus apartados, sin deducir una profundidad distinta.
- La extracción de la página 28 arrastra «VARIOMAC», aunque la página visible y el contenido corresponden a Nexwater. No se usa ese rótulo erróneo para reclasificar el producto.

Se conservan las cinco marcas y el orden del índice. Variomac y EMA permanecen dentro de Aqua&Co.

## Imágenes verificadas

Se revisaron primero las carpetas existentes. De las 19 imágenes de ficha, se reutilizan 13 recursos existentes, incluida la vista de Force7 con motor y hélice amarilla (`force7-motor-02.webp`).

Se extrajeron seis recortes del PDF porque las versiones exactas no estaban en las carpetas: silo fijo KOI (p. 5), unidad móvil KOI (p. 7), cadena de custodia Acopio (p. 9), propuesta de valor (p. 10), panel de monitoreo (p. 11) y despiece Combix (p. 21). Se guardaron en WebP directamente dentro de su marca y se registró su procedencia en el inventario. No se recrearon imágenes ni se eliminaron variantes del banco.

## Segunda revisión de KOI y Acopio

Se revisaron visualmente las páginas 4–12 para completar los bloques omitidos: funcionamiento de cabeza ciclónica con sus tres explicaciones y leyenda (p. 7), composición BinTrac con el silo (p. 8), costo de producción, visibilidad y mermas (p. 9), seis iconos de capacidades digitales (p. 10), captura de llenado del silo móvil (p. 11) y mapa del historial de rutas (p. 12).

El diagrama ciclónico reutiliza `koi/diagrama-cabezal-ciclonico.webp`; sus rótulos se presentan como texto legible. Las otras tres composiciones y los nueve iconos se recortaron directamente del PDF, pues las capturas del banco son versiones diferentes. Las figuras complementarias enlazan a su imagen completa para poder ampliarlas con teclado o touch.

Se mantienen Montserrat, azul institucional y el diseño existente. Los iconos corresponden a las capacidades que identifican en la fuente; no añaden funciones nuevas. La composición conserva energía moderada, ritmo uniforme y el movimiento existente, sin animaciones nuevas.

## Rediseño y énfasis del catálogo

El rediseño del 29 de octubre de 2026 mantiene las 19 fichas y las cinco marcas. Se reemplaza la cuadrícula de fichas densas por una lectura con imagen protagonista, descripción y características, seguida de bloques técnicos y diagramas. El índice permite ir directamente a un producto; las imágenes se amplían en un visor accesible con enlace al original.

Se extrajeron las fuentes de peso fuerte del PDF para cotejar los fragmentos en negrita, registrados por página en `includes/enfasis-acuacultura.php`. El texto se escapa antes de aplicar los énfasis. El diagrama de la cabeza ciclónica ahora utiliza el recorte completo de la página 7, con leyenda, flechas y las tres indicaciones, además de su transcripción legible en móvil.

Validación: sintaxis PHP y JavaScript; 19 fichas, cinco marcas, imágenes y navegación en 320, 390, 768, 1024 y 1440 px; funcionamiento sin JavaScript; visor, cierre, teclado, touch y retorno del foco. La revisión independiente de 14 capturas móviles y de escritorio no encontró defectos visuales materiales. No se modificaron especificaciones de producto.
