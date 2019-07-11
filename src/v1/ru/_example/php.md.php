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

// Вызов АПИ метода
if ($api->call(
    \'' . $provider . '\',
    \'' . $method . '\'' . (!empty($postParams) ? ',
    ' . $postParams : '') . (!empty($queryParams) ? ',
    ' . $queryParams : '') . '
)
) {
    // Получение результата выполнения метода
    $result = $api->getData();
} else {
    // Во время выполнения произошла ошибка, вывод кода ошибки и текста сообщения
    echo \'[\' . $api->getCode() . \'] \' . $api->getMessage() . PHP_EOL;
}
```
';




