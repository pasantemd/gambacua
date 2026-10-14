# Sistema visual de Gambacua

Actualizado: 2026-10-06. Fuente principal: Manual de Identidad Corporativa de Gambacua.

## Marca

- Azul profundo: `#004766`.
- Azul medio: `#3097B2`.
- Naranja complementario: `#F18413`; no se usa como color principal de botones.
- Fondos: blanco y azules muy claros con contraste suficiente.
- Tipografía de interfaz: Montserrat.
- Couture Bold se limita al logotipo; no se recrea el logotipo con texto HTML.
- Usar los SVG oficiales `assets/images/logo-gambacua-*.svg` según el fondo.

## Forma gráfica

La “A” con su corte curvo es el recurso de fondo de la marca. Debe aparecer una sola vez, pegada al lado derecho, recortada por el contenedor y escalada proporcionalmente con la altura disponible. No se sustituye por múltiples líneas diagonales. Su opacidad debe permitir leer el contenido que se superpone.

Los contenedores destacados y botones usan dos cortes: esquina superior derecha e inferior izquierda. Todas las variantes conservan la misma geometría. En hover se mantiene el color de origen y solo cambia luminosidad o saturación.

La firma de dos trazos inclinados, uno azul medio y otro azul profundo, acompaña los títulos principales de página y sección. En fondos oscuros usa azul claro y blanco para mantener contraste; no se repite en títulos menores ni en cada tarjeta.

## Componentes

- Los heroes oscuros usan texto blanco, gradiente azul y la “A” a la derecha.
- `section-rail` permanece a la izquierda en escritorio y se convierte en un desplegable compacto ajustado al contenedor en móvil; la banda horizontal queda como respaldo sin JavaScript.
- Las tarjetas de producto usan imágenes reales, jerarquía clara y texto técnico verificado.
- Los documentos técnicos alternan variantes azul profundo y azul medio.
- Los fondos claros pueden usar el patrón institucional de baja intensidad sin competir con productos o texto.

## Interacción y responsive

- El estado activo del rail debe corresponder a la sección visible.
- Hover, foco, teclado y touch deben producir estados equivalentes.
- El movimiento es breve y funcional; `prefers-reduced-motion` elimina desplazamientos innecesarios.
- No se oculta contenido esencial como estado inicial.
- Verificar 1440, 1024, 768, 390 y 320 px sin overflow horizontal ni títulos recortados.
