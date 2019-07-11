<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'data' => [
            'value'       => [
                'type' => [
                    'value'       => '3',
                    'description' => 'тип кампании'
                ],
                'from' => [
                    'value'       => 'Alpha',
                    'description' => 'подпись отправителя'
                ],
                'text' => [
                    'value'       => 'Здравствуйте, {name}! Ваш баланс на {date} составляет {balance}{currency}.',
                    'description' => 'текст сообщения'
                ]
            ],
            'description' => 'параметры кампании'
        ]
    ]
];



