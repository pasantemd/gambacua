<?php
/**
 * Gambacua - Datos estructurados: Materiales e Insumos (Riverlabs)
 * Fuentes: Páginas 07, 08, 09, 10, 11 y 12 del Catálogo de Inocuidad Gambacua 2026.
 */

$categoriasMateriales = [
    [
        'id' => 'puntas-micropipetas',
        'title' => 'Puntas para micropipetas',
        'subtitle' => 'Estériles, autoclavables, ultratransparentes y compatibles con la mayoría de pipetas',
        'summary' => 'Puntas universales para micropipetas disponibles en gradillas estériles de 96 unidades y presentaciones a granel.',
        'shelf_life' => '5 años',
        'material' => [
            'El polipropileno cumple con los estándares de la USP Clase VI.',
            'Libre de DNasa/RNasa y pirógenos.',
            'Las puntas con filtros hidrofóbicos actúan como barreras contra los aerosoles, reduciendo el riesgo de contaminación cruzada y asegurando un rendimiento óptimo.'
        ],
        'products' => [
            [
                'code' => 'R304016',
                'description' => '1000 µl universal pipette tips, clear, racked, sterile, extra long',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-1000ul-gradilla.webp'
            ],
            [
                'code' => 'R316012',
                'description' => '100 µl universal pipette tips, clear, racked, sterile, filter',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-100ul-filtro-gradilla.webp'
            ],
            [
                'code' => 'R314036',
                'description' => '10 µl universal pipette tips, clear, racked, sterile, DNase & RNase free, filter',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-10ul-filtro-gradilla.webp'
            ],
            [
                'code' => 'R313012',
                'description' => '1000 µl filter universal pipette tips, clear, racked, sterile, extra long',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-1000ul-filtro-gradilla.webp'
            ],
            [
                'code' => 'R302116',
                'description' => '200 µl universal pipette tips, yellow, racked, sterile',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-200ul-amarilla-gradilla.webp'
            ],
            [
                'code' => 'R302116',
                'description' => '20 µl universal pipette tips, clear, racked, sterile, DNase & RNase free, filter',
                'presentation' => 'Rack of 96 tips',
                'image' => 'assets/images/materiales-insumos/puntas-20ul-filtro-gradilla.webp'
            ],
            [
                'code' => 'R304006',
                'description' => '1000 µl universal pipette tips, clear, bulk, extra long',
                'presentation' => 'Bag of 500 tips',
                'image' => 'assets/images/materiales-insumos/puntas-1000ul-granel.webp'
            ],
            [
                'code' => 'R302106',
                'description' => '200 µl universal pipette tips, yellow, bulk',
                'presentation' => 'Bag of 1000 tips',
                'image' => 'assets/images/materiales-insumos/puntas-200ul-amarilla-granel.webp'
            ]
        ]
    ],
    [
        'id' => 'bolsas',
        'title' => 'Bolsas de muestreo',
        'subtitle' => 'Solución segura y eficiente para la recolección, almacenamiento y transporte de muestras',
        'summary' => 'Solución integral para el muestreo microbiológico de alimentos, aguas, bebidas, cosméticos y superficies. Disponibles en versiones planas, con tiosulfato (THIO) para neutralizar cloro residual en agua, autosostenibles (Stand Up) y con filtro para homogenización en Stomacher. Fabricadas en polietileno virgen aprobado por la FDA.',
        'image' => 'assets/images/materiales-insumos/bolsa-710ml-standup.webp',
        'image_alt' => 'Bolsas de muestreo estériles Stand Up y planas Riverlabs',
        'shelf_life' => '5 años',
        'products' => [
            ['code' => 'RL0818T', 'name' => 'WRITE-ON THIO BAG', 'capacity' => '4 oz (118 ml)', 'dimensions' => '2.9 x 7.28 in (7.5 x 18.5 cm)', 'presentation' => 'Caja de 100 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-118ml.webp'],
            ['code' => 'RL0818', 'name' => 'WRITE-ON STERILE SAMPLING BAGS', 'capacity' => '4 oz (118 ml)', 'dimensions' => '2.9 x 7.28 in (7.5 x 18.5 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-118ml.webp'],
            ['code' => 'RL1018', 'name' => 'WRITE-ON STERILE SAMPLING BAGS', 'capacity' => '7 oz (207 ml)', 'dimensions' => '3.7 x 7.0 in (9.5 x 18 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-207ml.webp'],
            ['code' => 'RL1123ST', 'name' => 'WRITE-ON THIO STAND UP BAGS', 'capacity' => '10 oz (300 ml)', 'dimensions' => '4.5 x 9.0 in (11.5 x 23 cm)', 'presentation' => 'Caja de 100 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-300ml.webp'],
            ['code' => 'RL1123S', 'name' => 'WRITE-ON STERILE STAND UP BAGS', 'capacity' => '18 oz (532 ml)', 'dimensions' => '4.5 x 9.0 in (11.5 x 23 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-532ml-standup.webp'],
            ['code' => 'RL1123', 'name' => 'WRITE-ON STERILE SAMPLING BAGS', 'capacity' => '18 oz (532 ml)', 'dimensions' => '5.9 x 9.0 in (15 x 23 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-532ml-plana.webp'],
            ['code' => 'RL1523', 'name' => 'WRITE-ON STERILE SAMPLING BAGS', 'capacity' => '24 oz (710 ml)', 'dimensions' => '5.9 x 9.0 in (15 x 23 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-710ml-plana.webp'],
            ['code' => 'RL1523F', 'name' => 'WRITE-ON STERILE FILTER BAGS', 'capacity' => '24 oz (710 ml)', 'dimensions' => '5.9 x 9.0 in (15 x 23 cm)', 'presentation' => 'Caja de 250 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-710ml-filtro.webp'],
            ['code' => 'RL1523S', 'name' => 'WRITE-ON STERILE STAND UP BAGS', 'capacity' => '24 oz (710 ml)', 'dimensions' => '5.9 x 9.0 in (15 x 23 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-710ml-standup.webp'],
            ['code' => 'RL1930', 'name' => 'WRITE-ON STERILE SAMPLING BAGS', 'capacity' => '55 oz (1627 ml)', 'dimensions' => '7.4 x 9.0 in (19 x 23 cm)', 'presentation' => 'Caja de 500 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-1627ml.webp'],
            ['code' => 'RL2638', 'name' => 'WRITE-ON STERILE STAND UP BAGS', 'capacity' => '92 oz (2721 ml)', 'dimensions' => '10 x 14.9 in (25.4 x 38 cm)', 'presentation' => 'Caja de 250 unidades', 'image' => 'assets/images/materiales-insumos/bolsa-2721ml-standup.webp']
        ],
        'application_items' => [
            ['label' => 'Agua', 'icon' => 'droplet'],
            ['label' => 'Bebidas', 'icon' => 'bottle'],
            ['label' => 'Cosméticos', 'icon' => 'sparkles'],
            ['label' => 'Comida', 'icon' => 'plate'],
            ['label' => 'Farmacéuticos', 'icon' => 'flask'],
            ['label' => 'Muestras ambientales', 'icon' => 'shield-check']
        ],
        'facts' => [
            'Pestañas de alambre resistentes a perforaciones con extremos sellados de seguridad',
            'Franja blanca rotulable de alta adherencia para identificación indeleble',
            'Sellado perimetral continuo que garantiza hermeticidad durante el transporte',
            'Esterilización posterior a la fabricación (+1) para máxima bioseguridad',
            'Película de polietileno grado alimentario aprobada por la FDA',
            'Lengüetas de Tyvek antideslizantes para apertura aséptica sin tocar el interior'
        ],
        'thumbs' => [
            ['src' => 'assets/images/materiales-insumos/bolsa-118ml.webp', 'alt' => 'Bolsa 4 oz (118 ml) con pestañas de alambre'],
            ['src' => 'assets/images/materiales-insumos/bolsa-532ml-plana.webp', 'alt' => 'Bolsa plana 18 oz (532 ml)'],
            ['src' => 'assets/images/materiales-insumos/bolsa-710ml-filtro.webp', 'alt' => 'Bolsa con filtro para homogenizador 24 oz (710 ml)'],
            ['src' => 'assets/images/materiales-insumos/bolsa-2721ml-standup.webp', 'alt' => 'Bolsa Stand Up de gran capacidad 92 oz (2721 ml)']
        ],
        'applications' => [
            'Agua y bebidas',
            'Alimentos y materias primas cárnicas, lácteas y agrícolas',
            'Cosméticos y productos farmacéuticos',
            'Muestreo ambiental e hisopados de superficies'
        ],
        'table_title' => 'Formatos, capacidades y códigos de referencia',
        'table_headers' => ['Código', 'Modelo / Tipo', 'Capacidad / Medidas', 'Presentación'],
        'table' => [
            ['RL0818T', 'WRITE-ON THIO BAG (con tiosulfato)', '4 oz (118 ml) | 7.5 x 18.5 cm', 'Caja de 100 u'],
            ['RL0818', 'WRITE-ON STERILE SAMPLING BAGS', '4 oz (118 ml) | 7.5 x 18.5 cm', 'Caja de 500 u'],
            ['RL1018', 'WRITE-ON STERILE SAMPLING BAGS', '7 oz (207 ml) | 9.5 x 18 cm', 'Caja de 500 u'],
            ['RL1123ST', 'WRITE-ON THIO STAND UP BAGS', '10 oz (300 ml) | 11.5 x 23 cm', 'Caja de 100 u'],
            ['RL1123S', 'WRITE-ON STERILE STAND UP BAGS', '18 oz (532 ml) | 11.5 x 23 cm', 'Caja de 500 u'],
            ['RL1123', 'WRITE-ON STERILE SAMPLING BAGS (Plana)', '18 oz (532 ml) | 15 x 23 cm', 'Caja de 500 u'],
            ['RL1523', 'WRITE-ON STERILE SAMPLING BAGS (Plana)', '24 oz (710 ml) | 15 x 23 cm', 'Caja de 500 u'],
            ['RL1523F', 'WRITE-ON STERILE FILTER BAGS (Con filtro)', '24 oz (710 ml) | 15 x 23 cm', 'Caja de 250 u'],
            ['RL1523S', 'WRITE-ON STERILE STAND UP BAGS', '24 oz (710 ml) | 15 x 23 cm', 'Caja de 500 u'],
            ['RL1930', 'WRITE-ON STERILE SAMPLING BAGS (Gran volumen)', '55 oz (1627 ml) | 19 x 23 cm', 'Caja de 500 u'],
            ['RL2638', 'WRITE-ON STERILE STAND UP BAGS (Máximo volumen)', '92 oz (2721 ml) | 25.4 x 38 cm', 'Caja de 250 u']
        ]
    ],
    [
        'id' => 'asas-inoculacion',
        'title' => 'Asas de inoculación',
        'subtitle' => 'Estériles, de un solo uso, ideales para aislar y sembrar microorganismos',
        'summary' => 'Herramientas de siembra desechables diseñadas para obtener colonias aisladas y distribuciones uniformes sobre medios de cultivo en placa sin dañar la superficie del agar. Libres de metales pesados, DNasa, RNasa y pirógenos.',
        'image' => 'assets/images/materiales-insumos/asas-bacteriologicas.webp',
        'image_alt' => 'Asas bacteriológicas azules calibradas y esparcedor celular L-spreader',
        'shelf_life' => '3 años',
        'facts' => [
            'Asas bacteriológicas fabricadas en polipropileno flexible con acabado liso no abrasivo',
            'Puntas calibradas para inoculaciones volumétricas precisas (1 µl en punta y 10 µl en anillo)',
            'Esparcidores en forma de L (L-Spreader) de poliestireno rígido para distribución homogénea',
            'Empaque estéril de alta capacidad con 4000 unidades por caja para laboratorios analíticos'
        ],
        'thumbs' => [
            ['src' => 'assets/images/materiales-insumos/esparcedor-l-spreader.webp', 'alt' => 'Esparcidor L-Spreader azul estéril']
        ],
        'table_title' => 'Modelos y especificaciones de calibración',
        'table_headers' => ['Código', 'Descripción', 'Material', 'Presentación'],
        'table' => [
            ['R717101', 'Asa bacteriológica azul (calibrada 1 µl / punta aguja)', 'Polipropileno estéril', 'Caja de 4000 u'],
            ['R718201', 'Asa bacteriológica azul (calibrada 10 µl / anillo)', 'Polipropileno estéril', 'Caja de 4000 u'],
            ['R711001', 'L-Spreader Azul (esparcedor celular en forma de L)', 'Poliestireno estéril', 'Empaque estéril']
        ]
    ],
    [
        'id' => 'tubos-centrifuga',
        'title' => 'Tubos de centrífuga',
        'subtitle' => 'Esterilidad, alta resistencia y amplio rango térmico',
        'summary' => 'Tubos de microcentrífuga y centrifugación fabricados en polipropileno de grado médico con tapas de polietileno de alta densidad (HDPE). Diseñados para resistir fuerzas centrífugas de hasta 12.000×g y temperaturas extremas entre -80 °C y 121 °C.',
        'image' => 'assets/images/materiales-insumos/tubos-conicos-gradilla.webp',
        'image_alt' => 'Tubos de centrífuga cónicos en gradilla verde de 15 ml y microcentrífuga de 1.5 ml',
        'shelf_life' => '3 años',
        'facts' => [
            'Resistencia centrífuga probada de hasta 12.000×g sin deformación ni fugas',
            'Amplio rango térmico operativo: desde ultracongelación a -80 °C hasta autoclave a 121 °C',
            'Graduación serigrafiada clara y panel blanco rotulable resistente a solventes',
            'Cumplimiento estricto con los estándares USP Clase VI, libres de DNasa/RNasa y pirógenos'
        ],
        'thumbs' => [
            ['src' => 'assets/images/materiales-insumos/tubos-microcentrifuga.webp', 'alt' => 'Tubos de microcentrífuga de 1.5 ml'],
            ['src' => 'assets/images/materiales-insumos/tubos-conicos-15ml.webp', 'alt' => 'Tubos cónicos de 15 ml con tapa estanca']
        ],
        'table_title' => 'Modelos y capacidades de centrifugación',
        'table_headers' => ['Código', 'Descripción', 'Material', 'Presentación'],
        'table' => [
            ['R615601', 'Tubo de microcentrífuga de 1,5 ml, transparente, cónico, con tapa de cierre, estéril', 'Polipropileno estéril', 'Paquete de 50 piezas'],
            ['R601001', 'Tubos de microcentrífuga de 15 ml, transparentes, en gradilla verde, estériles', 'Polipropileno estéril', 'Gradilla de 50 piezas'],
            ['R602051', 'Tubo de centrifugación de 50 ml, transparente, en gradilla, estéril', 'Polipropileno estéril', 'Gradilla de 25 piezas']
        ]
    ]
];
