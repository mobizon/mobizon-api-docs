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
                    'description' => 'кількість відображуваних елементів на сторінці'
                ]
            ],
            'description' => 'параметри посторінкового виводу'
        ],
        'sort' => [
            'value'       => [
                'campaignId' => [
                    'value' => 'ASC',
                    'description' => 'сортування за ідентифікатором кампанії'
                ]
            ],
            'description' => 'параметри сортування'
        ]
    ]
];




