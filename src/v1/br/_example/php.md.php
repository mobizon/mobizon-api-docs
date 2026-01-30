<?php
$queryParams = '';
if (array_key_exists('queryParams', $fixture)) {
    $queryParams = self::parsePhpExampleParams($fixture['queryParams']);
}

$postParams = '';
if (array_key_exists('postParams', $fixture)) {
    $postParams = self::parsePhpExampleParams($fixture['postParams']);
}

if (empty($postParams) && !empty($queryParams)) {
    $postParams = 'array()';
}

return '
```
<?php
use Mobizon\MobizonApi;

$api = new MobizonApi(\'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK\', \'{widget:api-domain}\');

// Chamada do método API
if ($api->call(
    \'' . $provider . '\',
    \'' . $method . '\'' . (!empty($postParams) ? ',
    ' . $postParams : '') . (!empty($queryParams) ? ',
    ' . $queryParams : '') . '
)
) {
    // Obtenção do resultado da execução do método
    $result = $api->getData();
} else {
    // Ocorreu um erro durante a execução, exibição do código de erro e do texto da mensagem
    echo \'[\' . $api->getCode() . \'] \' . $api->getMessage() . PHP_EOL;
}
```
';




