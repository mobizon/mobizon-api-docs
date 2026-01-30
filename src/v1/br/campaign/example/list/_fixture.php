<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'criteria' => [
            'value'       => [
                'from' => [
                    'value' => 'Alpha',
                    'description' => 'assinatura do remetente'
                ],
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
            'description' => 'parâmetros de paginação'
        ],
        'sort' => [
            'value'       => [
                'type' => [
                    'value' => 'ASC',
                    'description' => 'ordenação por tipo de campanha'
                ]
            ],
            'description' => 'parâmetros de ordenação'
        ]
    ]
];



