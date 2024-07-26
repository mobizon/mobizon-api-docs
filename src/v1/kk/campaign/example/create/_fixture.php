<?php
return [
    'requestMethod' => 'POST',
    'postParams'    => [
        'data' => [
            'value'       => [
                'type' => [
                    'value'       => '3',
                    'description' => 'кампанияның түрі'
                ],
                'from' => [
                    'value'       => 'Alpha',
                    'description' => 'жіберушінің қолтаңбасы'
                ],
                'text' => [
                    'value'       => 'Сәлеметсіз бе, {name}! {date} күнгі баланс {balance}{currency} құрайды.',
                    'description' => 'хабарламаның мәтіні'
                ]
            ],
            'description' => 'кампанияның параметрлері'
        ]
    ]
];



