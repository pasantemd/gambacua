# Revisión visual y recorrido de visitante

## Cambios

- El estilo de Contacto se limita a `#main-nav`. Antes, `nav > a:last-child` también convertía el último enlace de los índices de productos en un botón, sin representar un estado activo real.
- Acuacultura reutiliza el movimiento editorial compartido: entrada escalonada de marcas y entrada breve de imágenes de producto.
- Los logotipos responden al cursor con un desplazamiento de 3 píxeles y las imágenes ampliables con un acercamiento de 1,025. Solo se activa con ratón y se elimina al solicitar movimiento reducido.
- El visor nativo entra mediante opacidad y escala de 0,97 a 1 durante 220 ms, con la curva de marca. La apertura con teclado permanece inmediata. Navegadores sin transiciones discretas mantienen el diálogo nativo funcional.
- El botón de cierre del visor conserva tamaño propio en móvil y no ocupa todo el ancho de la barra.

## Comprobaciones

- `tools/auditar-interfaz.cjs`: 15 rutas y cinco anchos (320, 390, 768, 1024 y 1440), consola, imágenes, overflow, recortes e identificadores duplicados.
- `tools/verificar-encabezado.cjs`: apertura y cierre por cursor, clic y menú móvil.
- `tools/verificar-recorrido-visual.cjs`: Productos → Acuacultura → Aqua&Co → EMA → ampliar → cerrar → Contacto → volver atrás. Se ejecuta a 390 y 1440 con movimiento normal y reducido, ratón/touch emulado y teclado; comprueba errores de recursos y restauración del foco.
- Revisión de capturas de producto y visor, más sintaxis de PHP y JavaScript modificados.

Las pruebas móviles utilizan emulación de navegador, no un teléfono físico. No se envía el formulario de contacto durante este recorrido.

Referencia técnica: https://developer.chrome.com/docs/modern-web-guidance/guides/ui-behaviors/motion
