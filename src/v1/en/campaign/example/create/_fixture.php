<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'data' => [
            'value'       => [
                'type' => [
                    'value'       => '3',
                    'description' => 'campaign type'
                ],
                'from' => [
                    'value'       => 'Alpha',
                    'description' => 'sender ID'
                ],
                'text' => [
                    'value'       => 'Hello, {name}! Your balance on {date} is {balance}{currency}.',
                    'description' => 'message text'
                ]
            ],
            'description' => 'campaign parameters'
        ]
    ]
];




