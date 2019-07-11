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

// API method call
if ($api->call(
    \'' . $provider . '\',
    \'' . $method . '\'' . (!empty($postParams) ? ',
    ' . $postParams : '') . (!empty($queryParams) ? ',
    ' . $queryParams : '') . '
)
) {
    // Getting the result of an API request
    $result = $api->getData();
} else {
    // An error occurred during execution. Error code and message text output
    echo \'[\' . $api->getCode() . \'] \' . $api->getMessage() . PHP_EOL;
}
```
';




