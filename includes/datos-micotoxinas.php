<?php

$micotoxinas = [
    'brand' => 'PROGNOSIS BIOTECH',
    'description' => 'Kits de inmunoensayos diseñados y fabricados en Europa con los límites más estrictos del mundo establecidos para los residuos de micotoxinas en granos, cereales y otros productos, incluidos los piensos.',
    'families' => [
        [
            'id' => 'biotech-bio-shield',
            'title' => 'BIOTECH BIO-SHIELD',
            'description' => 'Ensayo de ELISA, el cual utiliza una solución de extracción para todas las micotoxinas, reduciendo el error del usuario y el tiempo total del procedimiento de ensayo, proporcionando resultados en 5 minutos.',
            'image' => 'assets/images/micotoxinas/bio-shield-family.webp',
            'image_alt' => 'Cajas de la familia Bio-Shield de Prognosis Biotech',
            'methods' => [
                [
                    'name' => 'Bio-Shield Fumonisin',
                    'image' => 'assets/images/micotoxinas/bio-shield-fumonisin.webp',
                    'details' => ['Placa de tiras', 'S70 - 48 - 96 Tests'],
                ],
                [
                    'name' => 'Bio-Shield Total',
                    'image' => 'assets/images/micotoxinas/bio-shield-total.webp',
                    'details' => ['Placa de tiras', 'S34 - 48 - 96 Tests'],
                ],
            ],
            'products' => ['T2 / HT2', 'ZON', 'DON', 'Fumonisin', 'Ochratoxin', 'Aflatoxina', '48–96 tests'],
        ],
        [
            'id' => 'symmetric-quantum-green',
            'title' => 'SYMMETRIC GREEN- QUANTUM GREEN',
            'description' => 'Ensayo de flujo lateral que emplea un tampón acuoso para la fase de extracción y funciona para todas las micotoxinas. Proporciona resultados en solo 3 minutos.',
            'methods' => [
                [
                    'name' => 'Quantum Fumonisin Green',
                    'image' => 'assets/images/micotoxinas/quantum-fumonisin-green.webp',
                    'details' => ['Tiras de cassette', '18 Tests'],
                ],
                [
                    'name' => 'Symmetric Fumonisin Green',
                    'image' => 'assets/images/micotoxinas/symmetric-fumonisin-green.webp',
                    'details' => ['Tiras de cassette', '24 - 48 Tests'],
                ],
            ],
            'products' => ['T2 / HT2', 'ZON', 'DON', 'Fumonisin', 'Ochratoxin', 'Aflatoxina'],
        ],
    ],
    'approval' => [
        'title' => 'Aprobaciones:',
        'mark' => 'USDA',
        'organization' => 'Agricultural Marketing Service',
        'department' => 'U.S. DEPARTMENT OF AGRICULTURE',
        'image' => 'assets/images/micotoxinas/usda-approval.webp',
    ],
];
