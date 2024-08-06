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
                    'description' => 'number of items per page'
                ]
            ],
            'description' => 'pagination parameters'
        ],
        'sort' => [
            'value'       => [
                'campaignId' => [
                    'value' => 'ASC',
                    'description' => 'sort by campaign ID'
                ]
            ],
            'description' => 'sorting parameters'
        ]
    ]
];



