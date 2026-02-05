### Перевірка справжності запиту

Для перевірки використовується поле `sign`, що обчислюється за алгоритмом **SHA1**.

#### Формування підпису

Рядок для підпису формується в такому порядку:

```
eventId|attempt|eventCreateTs|secretKey
```

Де `secretKey` — секретний ключ, вказаний при створенні вебхука.

---

#### Приклад перевірки підпису на PHP

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
