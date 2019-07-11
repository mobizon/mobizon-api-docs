<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'status' => [
                    'value' => 1,
                    'description' => 'only active links'
                ],
                'moderatorStatus' => [
                    'value' => 1,
                    'description' => 'only approved by moderator'
                ]
            ],
            'description' => 'search criteria'
        ],
        'pagination' => [
            'value'       => [
                'currentPage' => [
                    'value' => 2,
                    'description' => 'current page'
                ],
                'pageSize' => [
                    'value' => 50,
                    'description' => 'number of displayed items per page'
                ]
            ],
            'description' => 'pagination parameters'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'sorting by number of clicks ascending'
                ]
            ],
            'description' => 'sorting parameters'
        ]
    ]
];



