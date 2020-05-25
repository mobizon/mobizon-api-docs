<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'status' => [
                    'value' => 1,
                    'description' => 'тільки активні посилання'
                ],
                'moderatorStatus' => [
                    'value' => 1,
                    'description' => 'посилання дозволені модератором'
                ]
            ],
            'description' => 'критерії пошуку'
        ],
        'pagination' => [
            'value'       => [
                'currentPage' => [
                    'value' => 2,
                    'description' => 'поточна сторінка'
                ],
                'pageSize' => [
                    'value' => 50,
                    'description' => 'кількість елементів, які відображаються на сторінці'
                ]
            ],
            'description' => 'параметри посторінкового виведення'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'сортування за кількістю кліків за зростанням'
                ]
            ],
            'description' => 'параметри сортування'
        ]
    ]
];



