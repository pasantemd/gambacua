<?php
// Texto cotejado con el PDF original; páginas 5–29. Se conservan las cinco marcas del índice.
$marcasAcuacultura = [
    'koi' => [
        'nombre' => 'KOI',
        'logo' => 'logo-koi-transparente.webp',
        'descripcion' => 'Sistema de almacenamiento automático.',
        'productos' => [
            [
                'nombre' => 'Sistema de almacenamiento / Unidad fija KOI',
                'imagen' => 'silo-fijo-apracom.webp',
                'pagina' => 5,
                'descripcion' => 'Los sistemas automatizados de alimentación optimizan los procesos y reducen la necesidad de mano de obra. Los silos de almacenamiento a granel son una solución ideal para resguardar el alimento balanceado de las condiciones climáticas adversas, garantizando su calidad y conservación.',
                'detalles' => [
                    'Diseño resistente: Fabricados con láminas de acero galvanizado G-90 de alta densidad y un sistema estructural reforzado con pernos de alta resistencia.',
                    'Estructura sellada: El techo troquelado y hermético a la intemperie posee bordes reforzados que aumentan su solidez y facilitan el ensamblaje.',
                    'Protección contra la humedad: La tapa superior de 55,88 cm (22 pulgadas) sella completamente para evitar la entrada de humedad.',
                    'Drenaje eficiente: Los pernos incluyen un sello contra la intemperie y un borde de escurrimiento para desaguar la tolva y el vertedero.',
                    'Flujo continuo de alimento: Las tolvas cónicas de 60° y 67° permiten una descarga uniforme y eficiente.',
                    'Fácil acceso y operación: La tapa superior se manipula con un abridor de cadena o un mecanismo de cerradura a presión.',
                ],
                'secciones' => [

                ],
            ],
            [
                'nombre' => 'Sistema de almacenamiento / Unidad móvil KOI',
                'imagen' => 'unidad-movil-apracom.webp',
                'pagina' => 7,
                'descripcion' => 'Este sistema de llenado neumático permite distribuir el alimento a las tolvas, reduciendo significativamente las horas-hombre requeridas. Funciona con un generador a diésel y su diseño en la cabeza ciclónica desacelera la entrada del alimento, asegurando que el pellet llegue en buenas condiciones al agua.',
                'detalles' => [
                    'Sistema de llenado neumático: distribuye el alimento automáticamente a las tolvas y reduce el tiempo requerido.',
                    'Generador diésel integrado: asegura operación autónoma en zonas sin suministro eléctrico.',
                    'Cabeza ciclónica: desacelera el flujo para proteger la forma y flotabilidad del pellet.',
                    'Alcance de impulsión: hasta 100 m.',
                    'Tolva con pintura de grado alimenticio: recubrimiento no tóxico y fácil de limpiar.',
                    'Válvula dispensadora volumétrica.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Capacidad y llenado',
                        'elementos' => [
                            'Capacidad de carga: A disponibilidad del cliente.',
                            'Velocidad de llenado: 2 kg/s.',
                        ],
                    ],
                    [
                        'titulo' => 'Funcionamiento de cabeza ciclónica',
                        'imagen' => 'cabeza-ciclonica-apracom.webp',
                        'elementos' => [],
                    ],
                ],
                'nota' => '*Los datos presentados pueden modificarse por mejoras de diseño o revisión de estándares.',
            ],
            [
                'nombre' => 'Sistema de monitoreo',
                'imagen' => 'monitoreo-bintrac-apracom.webp',
                'pagina' => 8,
                'descripcion' => 'El sistema de monitoreo de inventario BinTrac rastrea el inventario de alimento en tiempo real, en función del peso del contenedor. El sistema se puede instalar fácilmente en cualquier contenedor de alimento nuevo o existente. BinTrac mostrará el peso actual de cada contenedor de alimento individual en un grupo de hasta cuatro contenedores. Realiza un seguimiento del uso de alimento durante las 24 horas de los últimos cuatro días, así como de las últimas cuatro cantidades de llenado, para verificar y confirmar las entregas.',
                'detalles' => [
                    'Seguimiento del inventario de alimento en tiempo real por peso del contenedor.',
                    'Muestra el peso actual de contenedores individuales en un grupo de hasta 4 contenedores.',
                    'Registra el consumo de alimento durante las 24 horas de cada uno de los últimos cuatro días y muestra las cuatro cargas más recientes para verificar las entregas.',
                ],
                'secciones' => [

                ],
            ],
        ],
    ],
    'acopio' => [
        'nombre' => 'Acopio',
        'logo' => 'logo-acopio-transparente.webp',
        'descripcion' => 'Sistema de manejo y trazabilidad de alimento. Custodia del alimento: de planta a piscina.',
        'productos' => [
            [
                'nombre' => 'Sistema de manejo y trazabilidad de alimento Acopio',
                'imagen' => 'cadena-custodia-apracom.webp',
                'destacados' => [
                    ['icono' => 'icono-costo.webp', 'titulo' => '50–60% del costo de producción', 'texto' => 'El alimento domina la estructura de costos del ciclo de cultivo del camarón.'],
                    ['icono' => 'icono-visibilidad.webp', 'titulo' => 'Baja visibilidad entre despacho y consumo', 'texto' => 'La conciliación entre lo que sale de planta y lo que llega al alimentador es manual y propensa a errores.'],
                    ['icono' => 'icono-mermas.webp', 'titulo' => 'Mermas y desviaciones sin rastro', 'texto' => 'Robo hormiga, derrames y errores de registro se descubren semanas después, sin responsable.'],
                ],
                'pagina' => 9,
                'descripcion' => 'Cada transferencia (planta, big bags / granel, silo madre, silo móvil, alimentador) queda registrada, geolocalizada y conciliada en AquaPond.',
                'detalles' => [
                    'El alimento balanceado es el rubro de costo más grande de la camaronera, y el menos controlado entre la planta y la piscina.',
                    'Acopio convierte la cadena del alimento en una cadena de custodia medible.',
                ],
                'secciones' => [

                ],
            ],
            [
                'nombre' => 'Propuesta de valor y capacidades digitales',
                'imagen' => 'propuesta-valor-catalogo.webp',
                'titulo_detalles' => 'Capacidades digitales de la plataforma',
                'iconos_detalles' => ['icono-inventario.webp', 'icono-gps.webp', 'icono-tiempos.webp', 'icono-dosificacion.webp', 'icono-proyecciones.webp', 'icono-eficiencia.webp'],
                'pagina' => 10,
                'descripcion' => 'Desde planta hasta punto de consumo, lote por lote.',
                'detalles' => [
                    'Monitoreo en tiempo real de inventario Celdas de carga en silos madre, lectura en tiempo real.',
                    'Tracking GPS de movimientos Cada ruta del silo móvil queda geolocalizada.',
                    'Registro de tiempos por operación Duración real de cada carga, traslado y descarga.',
                    'Dosificación por alimentador Control volumétrico por alimentador automático.',
                    'Proyecciones de inventario Anticipa quiebres de stock y planifica despachos.',
                    'KPI de eficiencia de llenado Desempeño medible por equipo, ruta y operador.',
                ],
            ],
            [
                'nombre' => 'Monitoreo en tiempo real del silo madre',
                'imagen' => 'monitoreo-silo-madre-apracom.webp',
                'pagina' => 11,
                'descripcion' => 'Vista real de la plataforma: historial de carga y descarga del silo principal',
                'detalles' => [
                    'Inventario en tiempo real. Celdas de carga reportan el peso del silo en vivo.',
                    'Historial completo. Cada carga y descarga con fecha, origen y destino.',
                    'Panel de conciliación. Inventario teórico vs. peso real, con diferencia visible al instante.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Control GPS y manejo volumétrico del alimento',
                        'imagen' => 'control-gps-apracom.webp',
                        'elementos' => [
                            'Registro detallado de recargas Cada tolva llenada con hora, kg dispensados y stock antes/después.',
                            'Conciliación de inventario Carga despachada vs. suma de llenados: diferencia final visible al cierre de la ruta.',
                            'Geoposición de cada despacho El llenado queda anclado al punto exacto del mapa de la finca.',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Historial de rutas / Unidad móvil',
                'imagen' => 'historial-rutas-apracom.webp',
                'pagina' => 12,
                'descripcion' => 'Historial de rutas sobre el mapa de la granja',
                'figura' => ['imagen' => 'silo-movil-en-operacion.webp', 'titulo' => 'Operación real en finca: llenado de alimentadores'],
                'secciones_despues_imagen' => true,
                'detalles' => [
                    'Registro histórico. Cada desplazamiento dentro de la granja queda guardado.',
                    'Recargas por punto. Refills por tolva con kg dispensados y coordenadas.',
                    'Auditoría inmediata. Tiempo total, distancia y rutas comparables por día.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Unidad móvil',
                        'elementos' => [
                            'Caudal de dosificación de referencia: 2 kg/s.',
                            'Margen de error en control volumétrico: ± 1.5 %.',
                            'Capacidad de alimento: ~ 5 t (7.5 t operativo / 2.5 t vacío).',
                            'Generador diésel propio: 27.5 KVA; opera sin red eléctrica.',
                            'Dimensiones: 4.01 × 2.05 × 2.20 m.',
                            'Estructura transportable en camión estándar.',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'acqua-co' => [
        'nombre' => 'Aqua&Co',
        'logo' => 'logo-acqua-co-transparente.webp',
        'descripcion' => 'Circulación & Aireación. Tratamiento de aguas en acuacultura a través de aireadores y circuladores.',
        'productos' => [
            [
                'nombre' => 'Venturi Eco2',
                'imagen' => 'venturi-eco2-indicaciones.webp',
                'figura' => ['imagen' => 'venturi-eco2-boquillas.webp', 'titulo' => 'Entrada de O2/O3 y tres boquillas diferentes'],
                'pagina' => 14,
                'descripcion' => 'Eco2 es un aireador estático hidráulico que desgasifica, oxigena y mezcla aditivos químicos con máxima eficiencia y mínimo desperdicio. Está diseñado para aprovechar todas las fuentes de agua (desgasificada, oxigenada, aireada) y generar una circulación eficiente con menor consumo de agua y energía. Funciona hidráulicamente, aprovechando el paso del agua sin requerir energía adicional.',
                'detalles' => [
                    'Adecuado para inyectar aire, oxígeno puro, ozono y productos químicos.',
                    'Disponibles 3 boquillas diferentes, de 30 a 100 litros/minuto, para una mejor adaptabilidad a cada situación.',
                    'Sin mantenimiento.',
                    'Aplicaciones en agua dulce y salada.',
                    'Fácil manejo e instalación.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Boquillas y conexiones',
                        'elementos' => [
                            'Boquillas disponibles en tres tamaños, seleccionables según el caudal de agua: 30, 50 o 100 L/min.',
                            'Doble cámara para mezclar mejor el oxígeno u otros gases con el agua.',
                            'Entrada de aire estándar, diferentes conexiones según la aplicación (O2/O3).',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Venturi EcoMat',
                'imagen' => 'venturi-ecomat-indicaciones.webp',
                'pagina' => 15,
                'descripcion' => 'EcoMat es una evolución innovadora de los sistemas Venturi, que combina tecnología de boquillas y aceleradores de flujo para maximizar la eficiencia. Garantiza una transferencia de oxígeno hasta cuatro veces mayor que la de los sistemas Venturi tradicionales al micronizar las burbujas de aire, aumentando exponencialmente el oxígeno disuelto en el agua. Gracias a sus aceleradores de flujo, mejora notablemente la circulación y mezcla del agua. EcoMat es ideal para enriquecer el agua con aire, oxígeno u ozono, logrando un alto rendimiento de disolución mediante microburbujas.',
                'detalles' => [
                    'Uso común en acuicultura para la producción y el manejo de organismos acuáticos.',
                    'Compatible con fuentes de agua a presión, bombas sumergibles o de superficie.',
                    'Adecuado para lagos, reservorios pequeños y tanques.',
                    'Las microburbujas (<100 µm) permanecen suspendidas en los líquidos durante más tiempo.',
                    'Las burbujas ordinarias (>1 mm) suben rápidamente y estallan.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Componentes',
                        'elementos' => [
                            'Entrada de aire estándar. Diferentes conexiones según la aplicación (O2/O3).',
                            'Doble cámara para mezclar mejor el oxígeno (u otros gases) con el agua.',
                            'Aceleradores de flujo. Aumentan el caudal de agua y minimizan la dimensión de las burbujas.',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Aireador Force7',
                'imagen' => 'force7-indicaciones.webp',
                'figura' => ['imagen' => 'force7-ajustes-motor.webp', 'titulo' => 'Ángulo del motor y profundidad ajustables'],
                'pagina' => 16,
                'descripcion' => 'Force7 es un aireador sumergible disponible en bronce marino. Su hélice genera una caída de presión que succiona aire desde la superficie, creando burbujas micronizadas para una óptima disolución de oxígeno. Además, proporciona una circulación eficiente del agua, previniendo la estratificación térmica y homogeneizando las condiciones de la columna de agua.',
                'detalles' => [
                    'Distribuye oxígeno al fondo para facilitar la degradación bacteriana de materia orgánica.',
                    'Reduce gases nocivos como el nitrógeno.',
                    'Puede disolver oxígeno puro, ozono o mezclar productos químicos con agua.',
                    'Permite su instalación a diferentes profundidades y ángulos.',
                    'Ideal para acuicultura y biofloc, con aireación y circulación eficientes.',
                    'Ofrece opciones de montaje flotante o fijo.',
                    'Puede configurarse con tres tipos de hélice según las necesidades de la operación.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Tipos de hélice',
                        'elementos' => [
                            'HÉLICE AZUL: Gran efecto de circulación. Adecuado para aplicaciones de aire.',
                            'HÉLICE NEGRA: La mejor eficiencia de aireación. Oxígeno puro y aplicaciones de alta densidad.',
                            'HÉLICE AMARILLA: Circulación y aireación. Agua con gran caudal. Aplicaciones con oxígeno puro o aire.',
                        ],
                    ],
                    [
                        'titulo' => 'Componentes',
                        'elementos' => [
                            'Ánodo en Al-Zn para evitar la corrosión del motor en los entornos más exigentes.',
                            'Cuerpo del motor en latón marino apto para agua de mar y resistente a corrientes galvánicas.',
                            'Protección de hélice disponible.',
                            'Entrada dedicada de O2 y O3.',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Circulador Rio',
                'imagen' => 'circulador-rio-indicaciones.webp',
                'figura' => ['imagen' => 'circulador-rio-modelos-motor.webp', 'titulo' => 'Modelos AG 10 y AG 20 y ajuste del motor'],
                'pagina' => 17,
                'descripcion' => 'Rio AG es un potente circulador de alto caudal y bajo consumo energético. Su reductor de doble hélice, de baja velocidad, garantiza un funcionamiento silencioso, respetando a los animales del lago y minimizando el impacto ambiental en el ecosistema acuático.',
                'detalles' => [
                    'Mantiene una circulación eficiente y lateralización en cuencas de hasta 10.000 m².',
                    'Ayuda a mantener áreas libres de hielo durante el invierno, incluso en grandes cuerpos de agua.',
                    'Elimina depósitos orgánicos y contaminantes, evitando descomposición y malos olores.',
                    'Asegura homogeneización y difusión de oxígeno en todo el volumen de agua.',
                    'Previene zonas muertas y anóxicas en lagunas y tanques de tratamiento.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Modelos y componentes',
                        'elementos' => [
                            'AG 10: 740 mm; 1.0 HP.',
                            'AG 20: 860 mm; 2.0 HP.',
                            'Ángulo del motor ajustable.',
                            'Caja de conexión impermeable.',
                            'Cuerpo del motor en acero inoxidable.',
                            'Cuchilla en plástico ligero reforzado, alta capacidad de mezcla de 2.000 a 3.000 m³/h.',
                            'Hélice de acero inoxidable SS 304, disponible bajo pedido.',
                            'Caja de cambios para reducir las RPM hasta 115.',
                            'Ánodos en Al-Zn para evitar la corrosión del motor en los entornos más exigentes.',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Aireador Splash',
                'imagen' => 'splash-indicaciones.webp',
                'pagina' => 18,
                'descripcion' => 'Splash es un aireador de superficie vertical de alta eficiencia, diseñado para generar un "efecto fuente" que incrementa la concentración de oxígeno en el agua mediante el contacto entre el aire y el agua.',
                'detalles' => [
                    'Oxigena el agua sin crear turbulencias en el fondo.',
                    'Alcanza hasta 3 metros de profundidad gracias a su diseño sumergido.',
                    'Ofrece bajo consumo energético y larga vida útil.',
                    'Proporciona un excelente efecto desgasificador, eliminando CO2 y NH4 + del agua.',
                    'Ligero y fácil de transportar.',
                    'Es ideal para aplicaciones en agua dulce y también es apto para agua salobre y marina.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Componentes',
                        'elementos' => [
                            'Flotadores modulares negros de plástico resistente a los rayos UV.',
                            'Tornillo de regulación del flotador, ubicado debajo de la etiqueta.',
                            'Protección de hélice de teflón en dos piezas, fácil de reemplazar.',
                            'Cuerpo del motor en latón marino apto para agua de mar y resistente a la corriente galvánica.',
                            'Hélice de plástico ligero reforzado.',
                            'Ánodo en Al-Zn para evitar la corrosión del motor en los entornos más exigentes.',
                        ],
                    ],
                ],
            ],
            [
                'nombre' => 'Combito',
                'imagen' => 'combito-indicaciones.webp',
                'figura' => ['imagen' => 'combito-con-soportes-01.webp', 'titulo' => 'Instalación a 2 pies', 'descripcion' => 'Sistema con poste guía, fácil de retirar. Adecuado para aplicaciones en tanques profundos.', 'mostrar_titulo' => true],
                'figura_junto_detalles' => true,
                'pagina' => 19,
                'descripcion' => 'Se trata de un sistema combinado compuesto por dos motores: un aireador y un circulador, diseñado para aprovechar el gran volumen de agua circulada y mejorar la difusión del aire inyectado por el aireador. Combito es una solución indispensable en situaciones que requieren un equipo profesional de alto rendimiento, con una estructura ligera y versátil.',
                'detalles' => [
                    'Mezcla y homogeneiza nutrientes, temperatura y oxígeno en toda la columna de agua.',
                    'Aumenta la concentración de oxígeno en grandes volúmenes.',
                    'Evita sedimentaciones en el fondo y reduce problemas de fermentación, anoxia y gases nocivos.',
                    'Motores independientes para regulación precisa y mayor versatilidad.',
                    'En la versión 2FEET, los motores están más próximos, lo que la hace apta para aguas poco profundas (hasta 50 cm).',
                    'Ideal para disolver aire u oxígeno puro, garantizando la máxima tasa de transferencia.',
                ],
            ],
            [
                'nombre' => 'Combo',
                'imagen' => 'combo-indicaciones.webp',
                'pagina' => 20,
                'descripcion' => 'Este sistema combinado consta de un potente circulador de la gama RIO y 1 o 2 aireadores sumergibles, siendo ideal para depósitos grandes. Se puede utilizar en aplicaciones profesionales de alta exigencia y también para situaciones especialmente difíciles o exigentes. Gracias a sus soportes flotantes disponibles en hierro galvanizado o acero inoxidable, es adecuado para su uso en agua dulce, salobre y de mar. Garantiza un excelente rendimiento con un consumo energético reducido y es eficaz para aplicaciones con oxígeno puro o aire. Los motores funcionan de manera independiente según las necesidades de la operación, favoreciendo el ahorro energético.',
                'detalles' => [
                    'Configuración Combix disponible (1 circulador RIO con 2 aireadores Force7) para una aireación más potente.',
                    'Adecuado para agua dulce, salobre y salada.',
                    'Máximo rendimiento con un consumo de energía muy bajo.',
                    'Aplicaciones con aire u oxígeno puro.',
                    'Funcionamiento independiente de los motores según sea necesario y ahorro de energía.',
                ],
                'secciones' => [

                ],
            ],
            [
                'nombre' => 'Combix',
                'imagen' => 'combix-sin-tabla.png',
                'pagina' => 21,
                'descripcion' => 'El Combix es un equipo con estructura compuesta por elementos galvanizados mediante el proceso de inmersión en caliente, que combina las características de resistencia mecánica del acero y le da la resistencia necesaria a la corrosión. La estructura está ensamblada con pernos y, además, consta de varios motores que permiten oxigenar el agua de las piscinas de camarones, contribuyendo a mantener condiciones adecuadas de oxigenación y circulación.',
                'detalles' => [],
                'secciones' => [

                ],
                'titulo_detalles' => 'Componentes',
                'ocultar_titulo_tabla' => true,
                'tabla' => [
                    ['item' => '1', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0001', 'descripcion' => 'Galvanizado - lateral Combix derecho - DX', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '2', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0002', 'descripcion' => 'Galvanizado - lateral Combix izquierdo - SX', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '3', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0003', 'descripcion' => 'Galvanizado - ángulo separador inferior', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '4', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0004', 'descripcion' => 'Galvanizado - soporte RIO', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '5', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0005', 'descripcion' => 'Galvanizado - soporte de motor', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '6', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0010', 'descripcion' => 'Galvanizado - soporte Force 7', 'cantidad' => '2', 'unidad' => 'UND'],
                    ['item' => '7', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0006', 'descripcion' => 'Galvanizado - ángulo separador superior', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '8', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0007', 'descripcion' => 'Galvanizado - soporte tubería de succión', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '9', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0008', 'descripcion' => 'Galvanizado - soporte de flotador Combix', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '10', 'codigo' => 'ACU-AIR-PAR-APR-054-0-0009', 'descripcion' => 'Galvanizado - soporte para caja eléctrica Combix', 'cantidad' => '1', 'unidad' => 'UND'],
                    ['item' => '11', 'codigo' => 'ACU-PAR-FLT-PCA-031-C-0001', 'descripcion' => 'Boya flotador blanco 1990 × 490 mm, P/EMA-Combix', 'cantidad' => '2', 'unidad' => 'UND'],
                ],
            ],
            [
                'nombre' => 'VARIOMAC',
                'imagen' => 'variomac-indicaciones.webp',
                'pagina' => 22,
                'descripcion' => 'VARIOMAC es un aireador sumergible con variador y sonda de oxígeno disuelto que ajusta automáticamente la potencia del motor según la necesidad de la piscina, optimizando el consumo energético y mejorando la oxigenación del agua.',
                'detalles' => [
                    'Caudal de aire: 450 m³/h',
                    'Variador: 15 kW',
                    'Potencia: 0,2–13,9 kW',
                    'Velocidad: 1.700–3.600 rpm',
                    'Consumo en operación: 8–25 A',
                    'Voltaje: 380–480 V · 50–60 Hz',
                    'Peso: 26 kg',
                    'Control manual o automático por sonda de OD',
                    'Montaje en flotador, soporte fijo o riel',
                    'Tecnología Acquaeco — Italia',
                ],
                'secciones' => [

                ],
            ],
            [
                'nombre' => 'EMA: sistema autolimpiante',
                'imagen' => 'ema-apracom.webp',
                'pagina' => 23,
                'figura' => ['imagen' => 'ema-partes.png', 'titulo' => 'Partes del EMA autolimpiable'],
                'descripcion' => 'La EMA (Estación Medioambiental) con sistema autolimpiante es un equipo con estructura compuesta por elementos galvanizados mediante el proceso de inmersión en caliente, que combina las características de resistencia mecánica del acero y le da la resistencia necesaria a la corrosión. La estructura está ensamblada con pernos y, además, consta de varios equipos que, trabajando en conjunto, permiten el monitoreo de la temperatura y el oxígeno de las piscinas mediante un sensor, el cual es limpiado con aire a presión, haciendo uso de energía solar.',
                'detalles' => [
                    'Medidas: 2 160 × 2 015 × 1 680 mm (ancho × largo × alto).',
                    'Peso: 112 kg.',
                    'Material: Acero al carbono galvanizado en caliente.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Usos',
                        'elementos' => [
                            'Ideal para monitorear el oxígeno disuelto y la temperatura en piscinas de cultivo de camarón.',
                        ],
                    ],
                    [
                        'titulo' => 'Tiempo de vida útil',
                        'elementos' => [
                            '5 años.',
                        ],
                    ],
                    
                ],
                'tabla' => [
                    ['item' => '1', 'codigo' => 'ACU-PAR-TUC-APR-264-0-0001', 'descripcion' => 'Galvanizado - tubo cuadrado soporte EMA', 'cantidad' => '2', 'unidad' => 'UND', 'peso' => '5.5 KG'],
                    ['item' => '2', 'codigo' => 'ACU-PAR-ALI-APR-054-0-0027', 'descripcion' => 'Galvanizado - estructura soporte de cajas', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '14.7 KG'],
                    ['item' => '3', 'codigo' => 'ACU-PAR-ALI-APR-054-0-0028', 'descripcion' => 'Galvanizado - tubo estructural 950 mm', 'cantidad' => '2', 'unidad' => 'UND', 'peso' => '1.6 KG'],
                    ['item' => '4', 'codigo' => 'TAL-SEM-TBE-APR-100-0-0006', 'descripcion' => 'Galvanizado - tubo estructural 560 mm', 'cantidad' => '2', 'unidad' => 'UND', 'peso' => '1.0 KG'],
                    ['item' => '5', 'codigo' => 'ACU-PAR-MEA-APR-054-0-0001', 'descripcion' => 'Galvanizado - cama para panel EMA', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '11.3 KG'],
                    ['item' => '6', 'codigo' => 'ACU-PAR-FLT-PCA-031-C-0001', 'descripcion' => 'Boya flotador blanco 1990 × 490 mm, P/EMA Combix', 'cantidad' => '2', 'unidad' => 'UND', 'peso' => '12 KG'],
                    ['item' => '7', 'codigo' => 'ACU-PAR-COA-CHI-103-0-0001', 'descripcion' => 'Panel solar', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '20.3 KG'],
                    ['item' => '8', 'codigo' => 'ACU-PAR-ALI-APR-031-0-0001', 'descripcion' => 'Bandera antipájaros', 'cantidad' => '4', 'unidad' => 'UND', 'peso' => '1.0 KG'],
                    ['item' => '9', 'codigo' => 'ACU-PAR-MEA-APR-125-0-0000', 'descripcion' => 'Caja para baterías de EMA autolimpiante', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '26.3 KG'],
                    ['item' => '10', 'codigo' => 'ACU-PAR-MEA-APR-125-0-0003', 'descripcion' => 'Caja para sistema de control principal', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '5.6 KG'],
                    ['item' => '11', 'codigo' => 'ACU-PAR-MEA-APR-125-0-0002', 'descripcion' => 'Caja para compresor de aire', 'cantidad' => '1', 'unidad' => 'UND', 'peso' => '6.18 KG'],
                ],
            ],
        ],
    ],
    'mixer-pro' => [
        'nombre' => 'Mixer Pro',
        'logo' => 'logo-mixer-pro-transparente.webp',
        'descripcion' => 'Sistema MIXER PRO. Ideal para la cosecha de camarón en piscinas.',
        'productos' => [
            [
                'nombre' => 'Sistema Mixer Pro',
                'imagen' => 'mixer-pro-indicaciones.webp',
                'pagina' => 26,
                'descripcion' => 'El sistema MIXER PRO ha sido diseñado para la fabricación de hielo líquido, que consiste en mezclar sal industrial, hielo granulado y agua dentro de un Bin Isotérmico de 1000 litros. La acción mecánica del motor de 2,2 kW a 2 800 RPM, que opera con un impeler de acero inoxidable, permite realizar la mezcla para obtener un producto homogéneo. La estructura ha sido diseñada para facilitar el traslado y ofrecer versatilidad en su operación. El sistema cuenta con un variador de frecuencia alimentado a 220V/1 Ph para la alimentación eléctrica.',
                'detalles' => [
                    'Medidas: 330 mm; 330 mm; 1200 mm (ancho x largo x alto)',
                    'Peso: 57.5 kg',
                    'Material: Acero inoxidable 304.',
                ],
                'secciones' => [
                    [
                        'titulo' => 'Usos',
                        'elementos' => [
                            'Ideal para la cosecha de camarón en piscinas.',
                        ],
                    ],
                    [
                        'titulo' => 'Tiempo de vida útil',
                        'elementos' => [
                            '5 años.',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'nexwater' => [
        'introduccion' => [
                    [
                        'titulo' => 'Aplicaciones',
                        'iconos' => ['waves', 'droplet', 'shield-check', 'egg', 'sparkles'],
                        'elementos' => [
                            'ACUÍCOLA: Aplicada al lavado del camarón, tratamiento del agua de proceso y hielo, sanitización de superficies, utensilios, cámaras de frío y áreas de empaque. Ayuda a reducir la carga microbiana sin dejar residuos químicos en el producto.',
                            'LÁCTEA: Permite desinfectar pezones y ubres, realizar limpieza CIP de tanques y tuberías y sanitizar salas de ordeño, utensilios y equipos de proceso, sin residuos que alteren el sabor ni la inocuidad.',
                            'PORCÍCOLA: Aplicable en la desinfección de instalaciones, corrales y equipos, tratamiento del agua de bebida, control sanitario y sanitización de áreas y vehículos de carga.',
                            'AVÍCOLA: Se utiliza para potabilizar el agua de bebida, sanitizar galpones, jaulas y comederos, controlar microorganismos como Salmonella spp. y Campylobacter spp. y desinfectar equipos de incubación y transporte.',
                            'FRUTAS Y VERDURAS: Se emplea en lavado y desinfección durante recepción y proceso, reducción de patógenos, sanitización de tinas y bandas, tratamiento del agua de lavado y extensión de la vida de anaquel.',
                        ],
                    ],
        ],

        'nombre' => 'Nexwater',
        'resumen' => 'Agua electrolizada para desinfección y control microbiológico.',
        'logo' => 'logo-nexwater-transparente.webp',
        'descripcion' => 'NEXWATER emplea agua electrolizada como solución de desinfección para diferentes procesos productivos. Su aplicación abarca los sectores acuícola, lácteo, avícola, porcícola y de frutas y verduras, adaptándose a necesidades de higiene, sanitización y control microbiológico.',
        'productos' => [
            [
                'nombre' => 'Electrodo Nexwater',
                'imagen' => 'electrodo-nexwater-indicaciones.webp',
                'pagina' => 29,
                'descripcion' => 'El electrodo NEXWATER utiliza un proceso de electrólisis que transforma el agua en una solución de gran poder desinfectante. Durante el proceso se genera ácido hipocloroso (HOCl) y radicales libres de hidrógeno y oxígeno, logrando una acción oxidante eficaz sin dejar residuos tóxicos.',
                'detalles' => [
                    'Lavado del camarón en recepción y proceso.',
                    'Tratamiento del agua de proceso y del hielo.',
                    'Sanitización de bandas, mesas de trabajo y utensilios.',
                    'Desinfección de cámaras de frío y áreas de empaque.',
                ],
                'titulo_detalles' => 'Usos',
                'beneficios' => [
                    'titulo' => 'Beneficios',
                    'elementos' => [
                        'Control microbiológico: Ayuda a reducir microorganismos durante diferentes etapas del proceso.',
                        'Inocuidad y calidad: Contribuye al control sanitario de los productos dentro de producción.',
                        'Desinfección sin residuos tóxicos: Adecuada para superficies, equipos y procesos relacionados con alimentos.',
                        'Aplicación en múltiples industrias: Una misma tecnología puede utilizarse en diferentes sectores productivos.',
                        'Reducción de carga microbiana.',
                        'Desinfección sin residuos químicos en el producto.',
                        'Mayor inocuidad durante el proceso.',
                        'Contribuye a una mayor vida de anaquel.',
                    ],
                ],
            ],
        ],
    ],
];
