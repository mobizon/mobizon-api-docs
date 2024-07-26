<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'жіберушінің қолтаңбасы'
                ],
            ],
            'description' => 'іздеу критерийлері'
        ],
        'pagination' => [
            'value'       => [
                'currentPage' => [
                    'value' => 2,
                    'description' => 'ағымдағы бет'
                ],
                'pageSize' => [
                    'value' => 50,
                    'description' => 'беттегі элементтер саны'
                ]
            ],
            'description' => 'беттер бойынша параметрлер'
        ],
        'sort' => [
            'value'       => [
                'type' => [
                    'value' => 'ASC',
                    'description' => 'кампания түрі бойынша сұрыптау'
                ]
            ],
            'description' => 'сұрыптау параметрлері'
        ]
    ]
];



