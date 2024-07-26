<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'SMS хабарламасының алушысы'
        ],
        'text'      => [
            'value'       => 'Test sms message',
            'description' => 'SMS хабарламасының мәтіні'
        ],
        'from'      => [
            'value'       => 'YourAlpha',
            'description' => 'жіберуші қолтаңбасы'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'хабарламаның өмір сүру уақыты'
                ],
            ]
        ]
    ]
];
