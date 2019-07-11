<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'получатель SMS сообщения'
        ],
        'text'      => [
            'value'       => 'Test sms message',
            'description' => 'текст SMS сообщения'
        ],
        'from'      => [
            'value'       => 'YourAlpha',
            'description' => 'подпись отправителя'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'время жизни сообщения'
                ],
            ]
        ]
    ]
];
