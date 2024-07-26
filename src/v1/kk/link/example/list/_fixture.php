<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'status' => [
                    'value' => 1,
                    'description' => 'тек белсенді сілтемелер'
                ],
                'moderatorStatus' => [
                    'value' => 1,
                    'description' => 'сілтемелер модератормен рұқсат етілген'
                ]
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
            'description' => 'беттеу параметрлері'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'басулар саны бойынша өсу ретімен сұрыптау'
                ]
            ],
            'description' => 'сұрыптау параметрлері'
        ]
    ]
];
