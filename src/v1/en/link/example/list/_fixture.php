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
                    'description' => 'links approved by the moderator'
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
                    'description' => 'number of items displayed per page'
                ]
            ],
            'description' => 'pagination parameters'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'sort by number of clicks in ascending order'
                ]
            ],
            'description' => 'sorting parameters'
        ]
    ]
];




