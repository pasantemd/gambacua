# Gambacua — instrucciones para agentes

@C:\Users\pasantemd\.codex\RTK.md

Estas reglas aplican a cualquier agente que trabaje dentro de este proyecto, incluido Codex, OpenCode y Antigravity.

## Inicio obligatorio

Antes de analizar, proponer o modificar cualquier archivo:

1. Lee [CONTEXT.md](CONTEXT.md) para conocer el producto, la arquitectura y el estado vigente.
2. Lee [SKILL.md](SKILL.md) y aplica su flujo de mantenimiento.
3. Consulta en [SKILL.md](SKILL.md) la selección de skills por situación. Usa solo las que estén expuestas por el entorno actual y carga el conjunto mínimo que aporte al trabajo.
4. Confirma en el código los archivos relacionados con la solicitud. El código actual prevalece si la documentación quedó desactualizada.
5. Respeta los cambios existentes del usuario. No reviertas trabajo ajeno salvo una petición explícita.

La instrucción más reciente del usuario tiene prioridad. Si cambia una decisión documentada, implementa la nueva decisión y actualiza `CONTEXT.md` cuando el cambio sea duradero.

## Reglas esenciales

- Trabaja en español salvo que el usuario pida otro idioma.
- Usa PHP nativo, CSS modular y JavaScript vanilla; no añadas frameworks ni un proceso de compilación sin una necesidad expresa.
- Mantén `includes/encabezado.php`, `includes/pie.php` e `includes/sitio.php` como componentes compartidos.
- Conserva la identidad descrita en `DESIGN.md`: Montserrat, paleta oficial `#004766`/`#3097B2`, logotipos SVG, una “A” recortada proporcional y botones con cortes superior derecho e inferior izquierdo.
- No inventes productos, certificaciones, direcciones, estadísticas, testimonios ni descargas.
- Reutiliza imágenes y datos existentes antes de crear contenido nuevo.
- Los cambios visibles deben funcionar con teclado, mouse y touch, y respetar `prefers-reduced-motion` cuando haya movimiento.
- Evita ediciones globales para corregir un caso local. Modifica el archivo de página o componente más específico.
- No borres assets, herramientas, páginas o contenido sin comprobar primero sus referencias con `rg`.
- No expongas destinatarios, credenciales, tokens ni datos personales. El formulario usa variables de entorno.

## Herramientas y búsqueda

- Prefija los comandos de terminal con `rtk`.
- Usa `rg` y `rg --files` antes de abrir archivos completos.
- Aplique ponytail full para acelerar respuestas y reducir tokens en código.
- La presencia de una skill en otro agente o carpeta del equipo no implica que el entorno actual pueda invocarla. Verifica su disponibilidad antes de anunciar que la usarás.
- No edite archivos binarios, fuentes o capturas como texto.
- Usa `apply_patch` para cambios de código y documentación.

## Validación mínima

- PHP modificado: `rtk C:\xampp\php\php.exe -l ruta\archivo.php`.
- JavaScript modificado: `rtk node --check ruta\archivo.js`.
- Encabezado: `rtk node tools\verificar-encabezado.cjs`.
- Contacto: `rtk node tools\verificar-contacto.cjs` cuando cambie el formulario o su procesamiento.
- UI: abre la página en `http://localhost/gambacua/` y revisa escritorio y móvil, overflow, foco, hover, touch, consola y enlaces.
- Cambios en Compact Dry: prueba catálogo, búsqueda, modal, cierre, teclado y tamaños móviles.

No declares terminado un cambio solo porque compila. Comprueba el comportamiento afectado.

