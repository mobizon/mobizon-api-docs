<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'data' => [
            'value'       => [
                'type' => [
                    'value'       => '3',
                    'description' => 'tipo de campanha'
                ],
                'from' => [
                    'value'       => 'Alpha',
                    'description' => 'assinatura do remetente'
                ],
                'text' => [
                    'value'       => 'Olá, {name}! Seu saldo em {date} é de {balance}{currency}.',
                    'description' => 'texto da mensagem'
                ]
            ],
            'description' => 'parâmetros da campanha'
        ]
    ]
];



