<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'data' => [
            'value'       => [
                'type' => [
                    'value'       => '3',
                    'description' => 'тип кампанії'
                ],
                'from' => [
                    'value'       => 'Alpha',
                    'description' => 'підпис відправника'
                ],
                'text' => [
                    'value'       => 'Вітаємо, {name}! Ваш баланс на {date} становить {balance}{currency}.',
                    'description' => 'текст повідомлення'
                ]
            ],
            'description' => 'параметри кампанії'
        ]
    ]
];



