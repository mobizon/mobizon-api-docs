### Проверка подлинности запроса

Для проверки используется поле `sign`, вычисляемое по алгоритму **SHA1**.

#### Формирование подписи

Строка для подписи формируется в следующем порядке:

```
eventId|attempt|eventCreateTs|secretKey
```

Где `secretKey` — секретный ключ, указанный при создании вебхука.

---

#### Пример проверки подписи на PHP

```php
$secretKey = 'secret123';

$payload = json_decode(file_get_contents('php://input'), true);

$hash = sha1(
    $payload['eventId'] . '|' .
    $payload['attempt'] . '|' .
    $payload['eventCreateTs'] . '|' .
    $secretKey
);

if (hash_equals($hash, $payload['sign'])) {
    http_response_code(200);
} else {
    http_response_code(403);
}
```
