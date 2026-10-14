---
name: gambacua-maintenance
description: Mantener y ampliar el sitio PHP de Gambacua respetando su identidad, arquitectura modular, categorías, contenido verificado, accesibilidad y pruebas locales. Usar para cualquier cambio de código, contenido o interfaz dentro de este proyecto.
---

# Mantenimiento de Gambacua

Lee primero [CONTEXT.md](CONTEXT.md), `PRODUCT.md` y, para cambios visuales, `DESIGN.md`. Confirma siempre el estado real en los archivos afectados porque el proyecto puede haber cambiado desde la última actualización del contexto.

## Flujo

1. Traduce la solicitud a un comportamiento observable.
2. Aplica ponytail full para optimizar tokens — la ladder corta el código al mínimo antes de escribir.
3. Localiza referencias con `rg` antes de leer o editar.
4. Determina si el cambio es local, compartido o global.
5. Modifica la menor superficie correcta y conserva el trabajo existente.
6. Valida sintaxis y comportamiento en las páginas consumidoras.
7. Actualiza `CONTEXT.md` solo si cambió una decisión duradera.

## Selección de skills por situación

Esta tabla orienta la selección; no obliga a cargar todas las skills de una categoría. La solicitud vigente del usuario y las reglas de este proyecto prevalecen. Antes de anunciar o aplicar una skill, comprueba que aparece en el catálogo del entorno actual y lee su `SKILL.md`. Usa el conjunto mínimo que cambie una decisión o mejore el resultado, y evita combinar auditorías o filosofías que dupliquen trabajo.

### Base del proyecto

- `gambacua-maintenance`: esta skill; se aplica a cualquier cambio de código, contenido o interfaz del repositorio.
- `ponytail`: aplica su modo full durante la implementación para elegir la solución más corta que cumpla el comportamiento pedido. No sacrifiques accesibilidad, validación ni decisiones de `DESIGN.md`.
- `antislop`: filtro general para evitar soluciones y texto genéricos. Combínala solo con el módulo específico necesario: `antislop-code`, `antislop-copywriting`, `antislop-human`, `antislop-layoutmobile` o `antislop-ui`.

### Interfaz, contenido y diseño

- `compact-dry-emil-design`: primera opción para pulir páginas, componentes, responsive, interacción y movimiento de esta web PHP.
- `impeccable`: úsala para rediseños, auditorías visuales o mejoras amplias de jerarquía, composición, color y tipografía.
- `emil-design-eng`: úsala para decisiones finas de componentes, estados, microinteracciones y sensación de calidad.
- `ui-ux-pro-max`: consulta sus referencias cuando la tarea requiera patrones o criterios de UX; nunca sustituye la identidad de `DESIGN.md` ni autoriza frameworks.
- `antislop-ui`, `antislop-human` y `antislop-layoutmobile`: aplícalas respectivamente a acabado visual, accesibilidad/estados y adaptación responsive.
- `antislop-copywriting`: úsala al redactar o editar textos. Conserva la información confirmada y no inventes afirmaciones comerciales.
- `prototype`: úsala cuando el usuario pida variantes comparables o cuando elegir entre conceptos distintos sea parte real de la tarea.
- `pick-ui-library`: solo cuando se invoque explícitamente. Este proyecto prefiere PHP, CSS y JavaScript vanilla.
- `ask-sonner`: solo si la tarea usa Sonner de forma explícita; no lo introduzcas en este proyecto por defecto.

### Movimiento

- `animate`: implementa animaciones con propósito, interrupción correcta y `prefers-reduced-motion`.
- `animation-vocabulary`: identifica el nombre técnico de un efecto descrito de forma informal.
- `find-animation-opportunities`: auditoría de solo lectura para detectar dónde conviene animar.
- `improve-animations`: auditoría y plan de mejora de movimiento; no implementa por sí sola.
- `review-animations`: revisa movimiento ya implementado o un diff.
- `apple-design`: resérvala para interacciones gestuales, resortes, arrastre o materiales que realmente lo necesiten; conserva la marca Gambacua.

### Diagnóstico, calidad y arquitectura

- `webapp-testing`: valida la aplicación local con navegador, incluidos responsive, foco, teclado, touch, consola y flujos afectados.
- `bug-hunter`: úsala cuando se pida una búsqueda amplia de errores, una revisión de seguridad o una validación adversarial; no para cada ajuste visual ordinario.
- `graphify`: úsala para preguntas sobre arquitectura y relaciones del código, especialmente si existe `graphify-out/`.
- `desloppify`: solo cuando el usuario solicite medir deuda técnica, salud del repositorio o un plan general de limpieza.
- `antislop-code`: limpia comentarios genéricos sin cambiar el comportamiento del código.

### Planificación, automatización y coordinación

- `planner`: solo cuando el usuario pida un plan de implementación.
- `claude-automation-recommender`: para solicitudes explícitas sobre automatizaciones o configuración de Claude Code; no modifica el stack del producto.
- `cavecrew`: solo cuando la delegación esté autorizada por el usuario y por el entorno activo.
- `find-skills`: para localizar una capacidad que no esté disponible o recomendar su instalación.

### Creación de recursos y configuración de Codex

- `imagegen`: genera o edita imágenes raster cuando la tarea visual lo requiera; guarda el resultado en una ruta del proyecto y comprueba su uso real.
- `openai-docs`: para información vigente sobre OpenAI, ChatGPT o Codex.
- `plugin-creator`, `skill-creator` y `skill-installer`: solo para solicitudes de crear, actualizar o instalar esos artefactos.

### Modos y auditorías explícitas

- `ponytail-audit`, `ponytail-review`, `ponytail-debt`, `ponytail-gain` y `ponytail-help`: ejecútalas cuando el usuario pida el modo o informe correspondiente. El uso base de `ponytail` no activa automáticamente estas variantes.
- `caveman`, `caveman-commit`, `caveman-compress`, `caveman-help`, `caveman-review` y `caveman-stats`: solo cuando el usuario las invoque o solicite expresamente ese formato.

### Skills presentes en otros entornos

Las siguientes skills se encontraron en otras instalaciones o como archivos locales, pero no están expuestas con esos nombres en el catálogo actual de Codex: `agy-customizations`, `antigravity-guide`, `permissioned-github`, `a11y-debugging`, `chrome-devtools`, `debug-optimize-lcp`, `memory-leak-debugging`, `troubleshooting`, `improve-codebase-architecture` y `review-agent`. `claude-code-setup` existe como ruta local, pero publica el nombre `claude-automation-recommender`; usa este último. Un agente que sí exponga las demás puede aplicarlas según su descripción. En Codex, usa estos reemplazos:

- Accesibilidad, navegador y rendimiento: `webapp-testing`, `antislop-human` y las herramientas de navegador disponibles.
- Errores, memoria y diagnóstico general: `bug-hunter`, inspección del código y herramientas locales.
- Arquitectura: `graphify` y revisión directa de las relaciones confirmadas en el repositorio.
- Revisión general: revisión directa o la skill especializada disponible para código, seguridad, movimiento o interfaz.
- GitHub con permisos: herramientas Git/GitHub habilitadas por el entorno y la autorización del usuario.
- Configuración de Antigravity: documentación y skills propias de ese agente.

La existencia de un archivo `SKILL.md` en el disco no basta para afirmar que una skill se aplicó. Si el entorno no la expone, documenta el reemplazo usado.

## Decisiones por área

### Navegación

Edita categorías y subcategorías en `includes/sitio.php`, marcado en `includes/encabezado.php`, apariencia en `assets/css/encabezado.css` y comportamiento en `assets/js/encabezado.js`. Conserva hover para mouse, clic/toque para touch, foco de teclado y cierre con `Escape`.

### Páginas y estilos

Usa el patrón `página.php` + `assets/css/página.css`. Registra el CSS en `assets/css/sitio.css` cuando sea necesario. Reutiliza las utilidades de `includes/sitio.php` y las plantillas compartidas. Evita estilos inline nuevos cuando una regla de página sea suficiente.

### Productos

`productos.php` muestra categorías principales. Ingredientes vive en `ingredientes.php`. Inocuidad alimentaria vive en `inocuidad.php` y conserva este orden de subcategorías: Medios de cultivo, Filtración por membrana, Materiales e insumos, Compact Dry, Micotoxinas e Histamina. Compact Dry enlaza a `compact-dry.php`. El catálogo y los detalles de placas proceden de `includes/datos-compact-dry.php`; evita duplicarlos en HTML.

Medios de cultivo enlaza a `medios-cultivo.php`. Sus tres familias y datos técnicos proceden de `includes/datos-medios-cultivo.php`; conserva allí la fuente de verdad y guarda imágenes nuevas bajo `assets/images/medios-cultivo/<familia>/`.

### Contacto

Mantén validación de cliente y servidor alineadas. Nombres, apellidos, correo, asunto y mensaje son obligatorios; teléfono y empresa son opcionales. Conserva CSRF, honeypot, limitación temporal, escape de salida y variables de entorno.

### Diseño y movimiento

Aplica Montserrat y la paleta oficial documentada en `DESIGN.md`. Usa los logotipos SVG oficiales. La “A” de fondo debe aparecer una sola vez, proporcional al contenedor, recortada a la derecha y con opacidad baja. Conserva la geometría común de botones con cortes superior derecho e inferior izquierdo y su matiz durante hover. El movimiento debe comunicar estado, durar poco, ser reversible y respetar movimiento reducido. Nunca ocultes títulos como estado inicial de una animación.

### Contenido y assets

Usa solo información y recursos confirmados. Busca consumidores antes de renombrar o retirar un asset. Mantén `alt` útil cuando la imagen comunica contenido y `alt=""` cuando sea puramente decorativa.

## Validación proporcional

- Ejecuta `php -l` con `C:\xampp\php\php.exe` para cada PHP modificado.
- Ejecuta `node --check` para JavaScript modificado.
- Usa las pruebas en `tools/` para header y contacto cuando corresponda.
- Comprueba en navegador los viewports afectados, teclado, touch, hover, overflow, consola y enlaces.
- Para Compact Dry, verifica búsqueda, tarjetas, modal, cierre, navegación por teclado y datos provenientes del catálogo.

Entrega un resumen breve con archivos cambiados, comportamiento resultante, pruebas realizadas y limitaciones reales.

