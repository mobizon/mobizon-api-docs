<?php
return [
    'requestMethod' => 'POST',
    'postParams' => [
        'data' => [
            'value'       => [
                'fullLink' => [
                    'value'       => 'http://mobizon.kz',
                    'description' => 'полная ссылка'
                ],
                'status' => [
                    'value'       => 1,
                    'description' => 'статус ссылки'
                ],
                'expirationDate' => [
                    'value'       => '2020-10-05',
                    'description' => 'дата окончания действия ссылки'
                ],
                'comment' => [
                    'value'       => 'Комментарий к ссылке',
                    'description' => 'комментарий к ссылке'
                ]
            ]
        ]
    ]
];
