<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'подпись отправителя'
                ],
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
                'type' => [
                    'value' => 'ASC',
                    'description' => 'сортировка по типу кампании'
                ]
            ],
            'description' => 'параметры сортировки'
        ]
    ]
];



