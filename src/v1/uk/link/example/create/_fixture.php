<?php
return [
    'requestMethod' => 'POST',
    'postParams' => [
        'data' => [
            'value'       => [
                'fullLink' => [
                    'value'       => 'http://mobizon.kz',
                    'description' => 'повне посилання'
                ],
                'status' => [
                    'value'       => 1,
                    'description' => 'статус посилання'
                ],
                'expirationDate' => [
                    'value'       => '2020-10-05',
                    'description' => 'дата закінчення дії посилання'
                ],
                'comment' => [
                    'value'       => 'Коментар до посилання',
                    'description' => 'коментар до посилання'
                ]
            ]
        ]
    ]
];
