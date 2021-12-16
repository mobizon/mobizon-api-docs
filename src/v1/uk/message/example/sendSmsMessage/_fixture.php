<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'одержувач SMS повідомлення'
        ],
        'text'      => [
            'value'       => 'Test sms message',
            'description' => 'текст SMS повідомлення'
        ],
        'from'      => [
            'value'       => 'YourAlpha',
            'description' => 'підпис відправника'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'час життя повідомлення'
                ],
            ]
        ]
    ]
];
