<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'підпис відправника'
                ],
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
                'type' => [
                    'value' => 'ASC',
                    'description' => 'сортування за типом кампанії'
                ]
            ],
            'description' => 'параметри сортування'
        ]
    ]
];



