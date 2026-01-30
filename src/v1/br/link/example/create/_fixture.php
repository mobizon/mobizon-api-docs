<?php
return [
    'requestMethod' => 'POST',
    'postParams' => [
        'data' => [
            'value'       => [
                'fullLink' => [
                    'value'       => 'http://mobizon.com.br',
                    'description' => 'link completo'
                ],
                'status' => [
                    'value'       => 1,
                    'description' => 'status do link'
                ],
                'expirationDate' => [
                    'value'       => '2026-12-31',
                    'description' => 'data de expiração do link'
                ],
                'comment' => [
                    'value'       => 'Comentário do link',
                    'description' => 'comentário do link'
                ]
            ]
        ]
    ]
];
