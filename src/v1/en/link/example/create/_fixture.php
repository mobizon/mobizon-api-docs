<?php
return [
    'requestMethod' => 'POST',
    'postParams' => [
        'data' => [
            'value'       => [
                'fullLink' => [
                    'value'       => 'http://mobizon.com',
                    'description' => 'full link'
                ],
                'status' => [
                    'value'       => 1,
                    'description' => 'link status'
                ],
                'expirationDate' => [
                    'value'       => '2020-10-05',
                    'description' => 'link expiration date'
                ],
                'comment' => [
                    'value'       => 'Comment on the link',
                    'description' => 'comment on the link'
                ]
            ]
        ]
    ]
];
