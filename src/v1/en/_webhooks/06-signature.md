### Request Authenticity Verification

The `sign` field, calculated using the **SHA1** algorithm, is used for verification.

#### Signature Generation

The signature string is formed in the following order:

```
eventId|attempt|eventCreateTs|secretKey
```

Where `secretKey` is the secret key specified when creating the webhook.

---

#### PHP Signature Verification Example

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
