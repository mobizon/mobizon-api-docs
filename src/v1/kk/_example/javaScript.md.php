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
var data = ' . ($requestMethod === 'POST' && !empty($postParams) ? '"' . $postParams . '"' : 'null') . ';

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
if (this.readyState === 4) {
console.log(this.responseText);
}
});

xhr.open("' . $requestMethod . '", "https://{widget:api-domain}/service/' . $provider . '/'
    . $method . '?output=json&api=' . self::$_apiVersion . '&apiKey=KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK' . (!empty($queryParams) ? '&' . $queryParams : '') . '");
xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
xhr.setRequestHeader("cache-control", "no-cache");

xhr.send(data);
```';






















