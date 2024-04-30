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
    // Отримання результату виконання методу
    $result = $api->getData();
} else {
    // Під час виконання сталася помилка, виведення коду помилки і тексту повідомлення
    echo \'[\' . $api->getCode() . \'] \' . $api->getMessage() . PHP_EOL;
}
```
';




