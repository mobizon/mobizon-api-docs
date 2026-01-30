```
<?php

use 'Mobizon\MobizonApi.php';

$api = new Mobizon\MobizonApi('KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', '{widget:api-domain}');

// Chamada de API para enviar uma mensagem
if ($api->call('message',
    'sendSMSMessage',
    array(
        // Número de telefone internacional do destinatário
        'recipient' => '{widget:example-phone}',
        // Texto da mensagem
        'text' => 'Mensagem SMS de teste',
        // Alphaname é opcional; se você não tiver um alphaname registrado, apenas ignore este parâmetro e sua mensagem será enviada com nosso alphaname comum gratuito, se disponível para esta direção.
         'from' => 'SeuAlpha',
         // A mensagem expirará após 1440 min (24h)
         'params[validity]' => 1440
    ))
) {
    // Obtenha o ID da mensagem atribuído pelo nosso sistema para solicitar seu relatório de entrega mais tarde.
    $messageId = $api->getData('messageId');

    if (!$messageId) {
        // A mensagem não foi aceita, veja o código de erro e os dados para detalhes.
    }
    // A mensagem foi aceita pela API.
} else {
    // Ocorreu um erro ao enviar a mensagem
    echo '[' . $api->getCode() . '] ' . $api->getMessage() . ' Veja os detalhes abaixo:' . PHP_EOL . print_r($api->getData(), true) . PHP_EOL;
}
```






