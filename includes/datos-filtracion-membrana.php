<?php
/**
 * Gambacua - Datos estructurados: Filtración por membrana (Riverlabs)
 * Fuentes: Páginas 04, 05 y 06 del Catálogo de Inocuidad Gambacua 2026.
 */

$categoriasFiltracion = [
    [
        'id' => 'filtros',
        'title' => 'Sistema de filtración',
        'rail_title' => 'Filtros',
        'subtitle' => 'Unidad de filtración práctica, de un solo uso y lista para usar.',
        'image_unit' => 'assets/images/filtracion-membrana/Unidad-de-filtracion-3.webp',
        'image_unit_alt' => 'Unidad de filtración práctica de un solo uso Riverlabs',
        'image_petri' => 'assets/images/filtracion-membrana/Filtro.webp',
        'image_petri_alt' => 'Unidad de filtración convertida en placa de Petri',
        'parts' => [
            'Tapa removible',
            'Embudo medidor de filtro',
            'Membrana MCE cuadrícula',
            'Adaptador del sistema de filtración',
            'Tapón'
        ],
        'conversion_title' => '¡Convierte tus unidades de filtración en placas de Petri!',
        'conversion_badge' => 'Fácil de usar',
        'steps' => [
            ['num' => '1', 'title' => 'Retire la tapa'],
            ['num' => '2', 'title' => 'Retire el embudo'],
            ['num' => '3', 'title' => 'Conviértalo en placa de Petri']
        ],
        'shelf_life' => '3 años',
        'shelf_life_note' => 'Vida útil: 3 años a partir de la fecha de fabricación'
    ],
    [
        'id' => 'dispensadores',
        'title' => 'Dispensadores',
        'rail_title' => 'Dispensadores',
        'subtitle' => 'Consumibles y equipos de filtración por membrana.',
        'items' => [
            [
                'id' => 'monitor-de-filtro',
                'title' => 'Monitor de filtro',
                'image' => 'assets/images/filtracion-membrana/Unidad-de-filtracion-1.webp',
                'image_alt' => 'Monitor de filtro en empaque individual Riverlabs',
                'presentacion' => 'Empaque individual incluye adaptador. Filtros de 0,45 – 0,22 micras en color blanco y negro.',
                'cantidad' => 'Paquete de 50 unidades',
                'vida_util' => '3 años'
            ],
            [
                'id' => 'filtro-de-membrana',
                'title' => 'Filtro de membrana',
                'image' => 'assets/images/filtracion-membrana/filtro-membrana.webp',
                'image_alt' => 'Filtro de membrana en empaque individual Riverlabs',
                'presentacion' => 'Filtro de membrana de 0,45 – 0,22 micras en empaque individual.',
                'cantidad' => 'Paquete de 100 unidades',
                'vida_util' => '3 años'
            ],
            [
                'id' => 'dispensador-automatico',
                'title' => 'Dispensador automático',
                'image' => 'assets/images/filtracion-membrana/dispensador-automatico.webp',
                'image_alt' => 'Dispensador automático de membranas Riverlabs'
            ],
            [
                'id' => 'filtro-membrana-continua',
                'title' => 'Filtros de membrana continua',
                'image' => 'assets/images/filtracion-membrana/filtro-membrana-continua.webp',
                'image_alt' => 'Filtros de membrana continua Riverlabs',
                'cantidad' => 'Caja de 150 unidades',
                'vida_util' => '3 años'
            ]
        ]
    ]
];
