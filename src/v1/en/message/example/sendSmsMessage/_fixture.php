<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'recipient of the SMS message'
        ],
        'text'      => [
            'value'       => 'Test sms message',
            'description' => 'text of the SMS message'
        ],
        'from'      => [
            'value'       => 'YourAlpha',
            'description' => 'sender ID'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'message validity period'
                ],
            ]
        ]
    ]
];
