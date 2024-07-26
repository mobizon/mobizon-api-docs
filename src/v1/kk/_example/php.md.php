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

// АПИ әдісін шақыру
if ($api->call(
    \'' . $provider . '\',
    \'' . $method . '\'' . (!empty($postParams) ? ',
    ' . $postParams : '') . (!empty($queryParams) ? ',
    ' . $queryParams : '') . '
)
) {
    // Әдістің орындалу нәтижесін алу
    $result = $api->getData();
} else {
    // Орындалу кезінде қате болды, қате коды мен хабарлама мәтінін шығару
    echo \'[\' . $api->getCode() . \'] \' . $api->getMessage() . PHP_EOL;
}
```
';




