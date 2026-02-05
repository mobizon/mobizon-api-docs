### Verificação de autenticidade da requisição

Para verificação, é utilizado o campo `sign`, calculado pelo algoritmo **SHA1**.

#### Formação da assinatura

A string para a assinatura é formada na seguinte ordem:

```
eventId|attempt|eventCreateTs|secretKey
```

Onde `secretKey` é a chave secreta especificada na criação do webhook.

---

#### Exemplo de verificação de assinatura em PHP

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
