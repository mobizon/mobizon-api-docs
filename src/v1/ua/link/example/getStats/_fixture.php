<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'ids'      => [
            'value'       => [
                0 => ['value' => 123],
                1 => ['value' => 455],
                2 => ['value' => 567]
            ],
            'ignoreKeys'  => true,
            'description' => 'ідентифікатори посилань'
        ],
        'type'     => [
            'value'       => 'monthly',
            'description' => 'тип статистики'
        ],
        'criteria' => [
            'value'       => [
                'dateFrom' => [
                    'value' => '2018-01-21 13:30:00',
                ],
            ],
            'description' => 'критерії пошуку'
        ]
    ]
];
