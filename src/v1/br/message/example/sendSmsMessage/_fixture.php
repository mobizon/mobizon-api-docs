<?php

return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'recipient' => [
            'value'       => '{widget:example-phone}',
            'description' => 'destinatário da mensagem SMS'
        ],
        'text'      => [
            'value'       => 'Mensagem SMS de teste',
            'description' => 'texto da mensagem SMS'
        ],
        'from'      => [
            'value'       => 'SeuAlpha',
            'description' => 'assinatura do remetente'
        ],
        'params'    => [
            'value'       => [
                'validity' => [
                    'value'       => 1440,
                    'description' => 'tempo de vida da mensagem'
                ],
            ]
        ]
    ]
];
