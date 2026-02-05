# Webhooks: User Guide

## What is a Webhook and why is it needed

**Webhook** is a mechanism for automatically sending notifications from our service to your system (CRM, ERP, 1C, your own application, etc.) when certain events occur via HTTP(S) requests.

Instead of regularly polling the API (for example, checking SMS delivery status), your server receives an HTTP(S) request at the moment the event actually occurs.

Using webhooks allows you to:

- receive data in near real-time;
- reduce the load on both your system and the service API;
- simplify the integration architecture;
- accurately track final SMS delivery statuses or form events, such as submission, contact confirmation, or unsubscribing.

---

## Supported Event Types

The following event types are currently available:

- **Form events** — data entered by the user into the form is transmitted, as well as a notification upon confirmation of a phone number or email address, or when unsubscribing from a form.
- **SMS statuses** — the final status of SMS delivery to the subscriber is transmitted.

---

## How to create a Webhook

### Step 1. Go to Settings

Go to **Control Panel → API → Webhooks** and click the **"Create Webhook"** button. The form for creating a new webhook will open.

<!-- Creation window screenshot -->

---

### Step 2. Configure Parameters

In the webhook creation form, specify the following parameters:

#### Event Type

Determines the event in the Mobizon system upon which the webhook will be sent.

Available options:

- Form events
- SMS statuses

---

#### Data Transfer Format

The format in which the webhook data will be sent to your server:

- `raw`
- `xml`
- `json`

Choose the format depending on the capabilities of your handler.

---

#### Handler Address (URL)

The URL to which webhooks will be sent.

Restrictions:

- maximum URL length — **up to 1000 characters**;
- requests are sent **only by POST method**;
- **no more than one server redirect (HTTP 301 or 302)** is allowed.

**Important:**

- only server redirects are supported;
- redirect chains are not supported;
- if more than one redirect occurs, the notification is considered undelivered.

---

#### Secret Key

The secret key is used to verify the authenticity of the request.

Features:

- can contain any set of characters;
- maximum length — **255 characters**;
- not transmitted in the HTTP request;
- used only for generating and verifying the signature.

If the secret key is not set:

- the request signature is not generated;
- handler security must be ensured by other means (e.g., URL access restriction).

---

#### Webhook Activity

Check the **"Active"** flag if the webhook should start working immediately after creation.

---

### Step 3. Saving

Click the **"Save"** button. The created webhook will appear in the list.

---

## Webhook Operation Details

- A webhook is sent **for one whole SMS message**, not for each of its segments.
- Notifications are sent **only upon receiving the final delivery status** of the SMS.
- You can create **multiple webhooks for the same event type**.
- Each webhook receives events for all SMS and forms of your account.
- A request is considered successfully delivered if the handler server returned an HTTP code `200–299` **no later than 5 seconds**.
- If a response is not received within 5 seconds or a code outside the `200–299` range is returned, the system will perform a retry.

Retry attempts:

- up to **10 attempts** are performed;
- the interval between attempts increases by 1 minute with each new attempt;
- after exhausting the attempts, the event is considered undelivered.

---

## Webhook Request Structure

All webhooks are sent via an HTTP(S) request using the **POST** method.

### Top-level Fields

| Field           | Description                                                      |
|-----------------| ---------------------------------------------------------------- |
| `eventId`       | Unique event identifier (same for retry attempts)                |
| `eventType`     | Event type (e.g., `sms-delivery-report`)                         |
| `eventCreateTs` | Event creation date and time (`yyyy-mm-dd hh:mm:ss`)             |
| `webhookId`     | Webhook identifier                                               |
| `attempt`       | Delivery attempt number                                          |
| `data`          | Event data                                                       |
| `sign`          | Digital signature of the request                                 |

---

## Payload Example: SMS Delivery Status (`sms-delivery-report`)

```json
{
  "eventId": 26,
  "eventType": "sms-delivery-report",
  "eventCreateTs": "2026-01-15 11:42:28",
  "webhookId": 1,
  "attempt": 1,
  "data": {
    "campaignId": 245455096,
    "messageId": 169275418,
    "segNum": 3,
    "statusUpdateTs": "2026-01-15 11:42:08",
    "status": "DELIVRD",
    "to": "380737893456"
  },
  "sign": "3f0a37cf5e27fe0615504b6d700b4b657ecfd39d"
}
```

### `data` Field

| Field             | Description                 |
| ----------------- | --------------------------- |
| `campaignId`      | SMS campaign ID             |
| `messageId`       | SMS message ID              |
| `segNum`          | Number of SMS segments      |
| `statusUpdateTs`  | Status update time          |
| `status`          | Final delivery status       |
| `to`              | Recipient number            |

---

## Payload Examples: Form Events

Webhooks for forms can be sent for various user actions: form submission, contact confirmation, or unsubscribing.

### Form Submission (`form-submission`)

The event is sent immediately after the user successfully fills out and submits the form.

```json
{
  "eventId": 40,
  "eventType": "form-submission",
  "eventCreateTs": "2026-01-15 16:53:30",
  "webhookId": 1,
  "attempt": 1,
  "data": {
    "formId": 846,
    "submissionId": 3680,
    "items": [
      {
        "submissionDataId": 12303,
        "fieldId": 3744,
        "fieldType": "TEXT_STRING",
        "fieldName": "Name",
        "value": "Ivan"
      },
      {
        "submissionDataId": 12304,
        "fieldId": 3745,
        "fieldType": "EMAIL",
        "fieldName": "E-mail",
        "value": "test@mobizon.com",
        "confirmationRequired": 1
      },
      {
        "submissionDataId": 12305,
        "fieldId": 3746,
        "fieldType": "MOBILE",
        "fieldName": "Celular",
        "value": "380737893456",
        "confirmationRequired": 1
      }
    ]
  },
  "sign": "0a38941c47689e3cb3634db817cd4851d2511c47"
}
```

**Description of the `items` field**

Each element of the array corresponds to one form field.

| Field                   | Description                                         |
| ----------------------- | --------------------------------------------------- |
| `submissionDataId`      | Form field value ID                                 |
| `fieldId`               | Form field ID                                       |
| `fieldType`             | Field type (TEXT\_STRING, EMAIL, MOBILE, etc.)      |
| `fieldName`             | Field name                                          |
| `value`                 | Value entered by the user                           |
| `confirmationRequired`  | Confirmation requirement flag (1 — required)        |

---

### Contact Confirmation (`form-contact-confirmation`)

The event is sent after the user confirms their email address or phone number using a code in SMS or Email.

```json
{
  "eventId": 42,
  "eventType": "form-contact-confirmation",
  "eventCreateTs": "2026-01-15 16:54:15",
  "webhookId": 1,
  "attempt": 1,
  "data": {
    "formId": 846,
    "submissionId": 3680,
    "item": {
      "submissionDataId": 12305,
      "fieldId": 3746,
      "fieldType": "MOBILE",
      "fieldName": "Celular",
      "value": "380737893456",
      "confirmationTs": "2026-01-15 16:54:14"
    }
  },
  "sign": "fe0da5443a9f5cadd0e972301415816cec481137"
}
```

---

### Unsubscribing a Contact from a Form (`form-contact-unsubscribe`)

The event is sent if the user has unsubscribed via the unsubscribe form.

```json
{
  "eventId": 45,
  "eventType": "form-contact-unsubscribe",
  "eventCreateTs": "2026-01-15 17:33:47",
  "webhookId": 1,
  "attempt": 1,
  "data": {
    "formId": 846,
    "unsubscribeTs": "2026-01-15 17:33:46",
    "items": [
      {
        "submissionId": 3675,
        "submissionDataId": 12289,
        "fieldId": 3745,
        "fieldType": "EMAIL",
        "fieldName": "E-mail",
        "value": "test@mobizon.com",
        "confirmationTs": ""
      }
    ]
  },
  "sign": "06b78cf55ad19f9810babc415e86535384b74663"
}
```

---

## Request Authenticity Verification

The `sign` field, calculated using the **SHA1** algorithm, is used for verification.

### Signature Generation

The signature string is formed in the following order:

```
eventId|attempt|eventCreateTs|secretKey
```

Where `secretKey` is the secret key specified when creating the webhook.

---

### PHP Signature Verification Example

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

---

## Webhook Processing Recommendations

- The same webhook may be sent multiple times (in case of retry delivery attempts).
- It is recommended to store `eventId` and not process the same event again.
- Do not perform long operations when processing the request.
- Optimal scenario:
    - verify the signature;
    - save the event;
    - quickly return HTTP 200;
    - perform further processing asynchronously.

---

## Common Errors

| Problem                | Possible Cause                                |
| ---------------------- | --------------------------------------------- |
| Webhook does not arrive| URL is unavailable or redirect limit exceeded |
| Repeated notifications | Server did not return HTTP 200 in time        |
| Signature mismatch     | Incorrect secret key or field order           |
| Processing error       | Missing payload structure verification        |

---

## Conclusion

Webhooks allow you to receive data about SMS statuses and forms:

- without constant API polling;
- with minimal delay;
- with guaranteed redelivery in case of temporary failures.

Correct signature verification and careful handling of repeated requests ensure reliable integration.
