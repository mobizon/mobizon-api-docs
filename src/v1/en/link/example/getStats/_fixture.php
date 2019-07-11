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
            'description' => 'short link IDs'
        ],
        'type'     => [
            'value'       => 'monthly',
            'description' => 'statistics type'
        ],
        'criteria' => [
            'value'       => [
                'dateFrom' => [
                    'value' => '2018-01-21 13:30:00',
                ],
            ],
            'description' => 'search criteria'
        ]
    ]
];
