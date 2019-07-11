<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'status' => [
                    'value' => 1,
                    'description' => 'только активные ссылки'
                ],
                'moderatorStatus' => [
                    'value' => 1,
                    'description' => 'ссылки разрешены модератором'
                ]
            ],
            'description' => 'критерии поиска'
        ],
        'pagination' => [
            'value'       => [
                'currentPage' => [
                    'value' => 2,
                    'description' => 'текущая страница'
                ],
                'pageSize' => [
                    'value' => 50,
                    'description' => 'количество отображаемых элементов на странице'
                ]
            ],
            'description' => 'параметры постраничного вывода'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'сортировка по количеству кликов по возрастанию'
                ]
            ],
            'description' => 'параметры сортировки'
        ]
    ]
];



