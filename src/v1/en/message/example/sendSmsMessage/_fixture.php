<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'SMS message recipient phone number'
        ],
        'text'      => [
            'value'       => 'Test sms message',
            'description' => 'SMS message text'
        ],
        'from'      => [
            'value'       => 'YourAlpha',
            'description' => 'alphanumeric sender ID'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'SMS expiration time in seconds'
                ],
            ]
        ]
    ]
];
