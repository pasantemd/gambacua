<?php

$categoriasMediosCultivo = [
    [
        'id' => 'listos-para-usar',
        'title' => 'Listos para usar',
        'summary' => 'Están diseñados para el control de calidad microbiológica en agua y bebidas. Gracias a su formato listo para el uso, eliminan la necesidad de preparación previa, lo que incrementa la productividad y precisión en el laboratorio. Cada lote es sometido a rigurosas pruebas de selectividad, especificidad y productividad, conforme a los requisitos de la ISO 11133:2014.',
        'image' => 'assets/images/medios-cultivo/listos-para-usar/kit-viales-riverlabs.webp',
        'image_alt' => 'Kit RiverLabs de 50 viales listos para usar',
        'facts' => [
            'Formato listo para usar',
            'Control microbiológico de agua y bebidas',
            'Control de selectividad, especificidad y productividad conforme a ISO 11133:2014'
        ],
        'indicators' => [
            ['type' => 'Medio', 'name' => 'M-Green yeast & mold', 'color' => '#56b13b'],
            ['type' => 'Cromogénico', 'name' => 'E. coli Coliform (C-EC)', 'color' => '#7047c8'],
            ['type' => 'Caldo', 'name' => 'Acetamida', 'color' => '#4668f2'],
            ['type' => 'Caldo', 'name' => 'Asparagina', 'color' => '#788496'],
            ['type' => 'Membrana', 'name' => 'M-Endo', 'color' => '#cf3d30'],
            ['type' => 'Caldo', 'name' => 'Extracto de levadura', 'color' => '#bd922a'],
            ['type' => 'Caldo', 'name' => 'R2A', 'color' => '#3b9eaa']
        ]
    ],
    [
        'id' => 'medios-deshidratados',
        'title' => 'Medios de cultivo deshidratados',
        'summary' => 'Ofrecemos una amplia gama de medios de cultivo deshidratados, diseñados para aplicaciones microbiológicas en alimentos, aguas y productos farmacéuticos, cosméticos, entre otros. Todos nuestros productos cumplen con la norma internacional ISO 11133:2014, garantizando seguridad, confiabilidad y desempeño constante.',
        'image' => 'assets/images/medios-cultivo/deshidratados/medios-deshidratados-riverlabs.webp',
        'image_alt' => 'Frasco de medio de cultivo deshidratado RiverLabs',
        'facts' => [],
        'shelf_life' => '5 años',
        'applications' => [
            'Farmacéuticas y cosméticos',
            'Alimentos',
            'Agua de consumo'
        ],
        'solutions' => [
            'Medios de cultivo deshidratados',
            'Suplementos',
            'Medios cromogénicos RiverChrome'
        ],
    ],
    [
        'id' => 'medios-dosificados',
        'title' => 'Medios deshidratados dosificados',
        'summary_html' => 'Ofrecemos medios de cultivo <strong>prepesados</strong> para medios universales, diseñados para minimizar riesgo operativo en el pesaje, dispensación y homogenización, optimizando tiempos y mejorando la eficiencia en el trabajo de laboratorio.',
        'image' => 'assets/images/medios-cultivo/dosificados/packs-dosificados-riverlabs.webp',
        'image_alt' => 'Packs de medios deshidratados dosificados RiverLabs',
        'facts' => [],
        'shelf_life' => '5 años',
        'table' => [
            ['BPW (BAM)', '4.5 g, 20 g, 22.5 g, 30 g, 86 g', 'mTSB + Casamino Acids & Novobiocin', '145 g'],
            ['BPW (ISO)', '4.5 g, 22.5 g', 'BLEB', '54 g'],
            ['nBPW (USDA, FSIS)', '16.2 g', 'NFDM', '325 g'],
            ['Half Fraser Broth Base', '12.6 g, 12.9 g', 'Tryptic Soy Broth', '15 g, 101 g'],
            ['Half Fraser Broth with FAC', '29 g, 65 g', 'Tetrathionate Broth Base', '36.8 g'],
            ['Demi Fraser Broth Base', '14.2 g, 49 g', 'mTSB + Casamino Acids & Novobiocin', '145 g'],
            ['Demi Fraser Broth with FAC', '29 g, 65 g', 'Universal Preenrichment Broth', '8.5 g, 38 g'],
            ['Lactose Broth', '12.6 g, 39 g, 44 g', 'UVM', '5.2 g, 11.7 g, 58.5 g'],
            ['mTSB', '64.5 g, 129 g', '', '']
        ]
    ]
];
