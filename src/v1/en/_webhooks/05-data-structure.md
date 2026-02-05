### Webhook Request Structure

All webhooks are sent via an HTTP(S) request using the **POST** method.

#### Top-level Fields

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

### Payload Example: SMS Delivery Status (`sms-delivery-report`)

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

#### `data` Field

| Field             | Description                 |
| ----------------- | --------------------------- |
| `campaignId`      | SMS campaign ID             |
| `messageId`       | SMS message ID              |
| `segNum`          | Number of SMS segments      |
| `statusUpdateTs`  | Status update time          |
| `status`          | Final delivery status       |
| `to`              | Recipient number            |

---

### Payload Examples: Form Events

Webhooks for forms can be sent for various user actions: form submission, contact confirmation, or unsubscribing.

#### Form Submission (`form-submission`)

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

#### Contact Confirmation (`form-contact-confirmation`)

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

#### Unsubscribing a Contact from a Form (`form-contact-unsubscribe`)

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
