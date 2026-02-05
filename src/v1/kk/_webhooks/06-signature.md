### Сұраудың түпнұсқалығын тексеру

Тексеру үшін **SHA1** алгоритмі бойынша есептелетін `sign` өрісі пайдаланылады.

#### Қолтаңбаны қалыптастыру

Қолтаңбаға арналған жол келесі ретпен қалыптасады:

```
eventId|attempt|eventCreateTs|secretKey
```

Мұндағы `secretKey` — вебхукты жасау кезінде көрсетілген құпия кілт.

---

#### PHP-де қолтаңбаны тексеру мысалы

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
