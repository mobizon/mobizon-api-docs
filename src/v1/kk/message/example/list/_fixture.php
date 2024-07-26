<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'жіберуші қолтаңбасы'
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
                    'description' => 'беттегі көрсетілетін элементтер саны'
                ]
            ],
            'description' => 'беттік шығару параметрлері'
        ],
        'sort' => [
            'value'       => [
                'campaignId' => [
                    'value' => 'ASC',
                    'description' => 'кампания идентификаторы бойынша сұрыптау'
                ]
            ],
            'description' => 'сұрыптау параметрлері'
        ]
    ]
];
