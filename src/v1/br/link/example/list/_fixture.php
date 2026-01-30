<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'status' => [
                    'value' => 1,
                    'description' => 'apenas links ativos'
                ],
                'moderatorStatus' => [
                    'value' => 1,
                    'description' => 'links permitidos pelo moderador'
                ]
            ],
            'description' => 'critérios de busca'
        ],
        'pagination' => [
            'value'       => [
                'currentPage' => [
                    'value' => 2,
                    'description' => 'página atual'
                ],
                'pageSize' => [
                    'value' => 50,
                    'description' => 'número de elementos exibidos por página'
                ]
            ],
            'description' => 'parâmetros de pagination'
        ],
        'sort' => [
            'value'       => [
                'clickCnt' => [
                    'value' => 'ASC',
                    'description' => 'ordenação por número de cliques em ordem crescente'
                ]
            ],
            'description' => 'parâmetros de ordenação'
        ]
    ]
];



