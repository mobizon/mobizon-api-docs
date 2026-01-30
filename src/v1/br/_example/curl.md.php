<?php
$requestMethod = array_key_exists('requestMethod', $fixture) ? $fixture['requestMethod'] : 'GET';

$queryParams = '';
if (array_key_exists('queryParams', $fixture)) {
    $queryParams = self::buildHttpQuery($fixture['queryParams']);
}

$postParams = '';
if (array_key_exists('postParams', $fixture)) {
    $postParams = self::buildHttpQuery($fixture['postParams']);
}

return '
```
curl -X ' . $requestMethod . ' \
  \'https://{widget:api-domain}/service/' . $provider . '/' . $method . '?output=json&api=' . self::$_apiVersion . '&apiKey=KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK'
    . (!empty($queryParams) ? '&' . $queryParams : '') . '\' \
  -H \'cache-control: no-cache\' \
  -H \'content-type: application/x-www-form-urlencoded\' ' . ($requestMethod === 'POST' && !empty($postParams) ? '\
  -d \'' . $postParams . '\'' : '') . '
```';

