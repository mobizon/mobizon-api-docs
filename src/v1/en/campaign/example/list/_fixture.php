<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'sender ID'
                ],
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
                'type' => [
                    'value' => 'ASC',
                    'description' => 'sorting by campaign type'
                ]
            ],
            'description' => 'sorting parameters'
        ]
    ]
];




