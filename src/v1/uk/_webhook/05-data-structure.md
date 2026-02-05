### Структура запиту вебхука

Усі вебхуки надсилаються HTTP(S)-запитом методом **POST**.

#### Поля верхнього рівня

| Поле            | Опис                                                           |
| --------------- | -------------------------------------------------------------- |
| `eventId`       | Унікальний ідентифікатор події (однаковий для повторних спроб) |
| `eventType`     | Тип події (наприклад, `sms-delivery-report`)                   |
| `eventCreateTs` | Дата і час створення події (`yyyy-mm-dd hh:mm:ss`)             |
| `webhookId`     | Ідентифікатор вебхука                                          |
| `attempt`       | Номер спроби доставки                                          |
| `data`          | Дані події                                                     |
| `sign`          | Цифровий підпис запиту                                         |

---

---

### Приклад payload: статус доставки SMS (`sms-delivery-report`)

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

#### Поле `data`

| Поле             | Опис                      |
| ---------------- | ------------------------- |
| `campaignId`     | ID SMS-кампанії           |
| `messageId`      | ID SMS-повідомлення       |
| `segNum`         | Кількість сегментів SMS   |
| `statusUpdateTs` | Час оновлення статусу     |
| `status`         | Підсумковий статус доставки |
| `to`             | Номер отримувача          |

---

---

### Приклади payload: події форм

Вебхуки для форм можуть надсилатися при різних діях користувача: надсиланні форми, підтвердженні контакту або відписці.

#### Надсилання форми (`form-submission`)

Подія надсилається відразу після успішного заповнення та надсилання форми користувачем.

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
        "fieldName": "Ім'я",
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
        "fieldName": "Мобільний",
        "value": "380737893456",
        "confirmationRequired": 1
      }
    ]
  },
  "sign": "0a38941c47689e3cb3634db817cd4851d2511c47"
}
```

**Опис поля items**

Кожен елемент масиву відповідає одному полю форми.

| Поле                   | Опис                                               |
| ---------------------- | -------------------------------------------------- |
| `submissionDataId`     | ID значення поля форми                             |
| `fieldId`              | ID поля форми                                      |
| `fieldType`            | Тип поля (TEXT\_STRING, EMAIL, MOBILE та ін.)      |
| `fieldName`            | Назва поля                                         |
| `value`                | Значення, введене користувачем                      |
| `confirmationRequired` | Ознака необхідності підтвердження (1 — потрібно)   |

---

#### Підтвердження контакту (`form-contact-confirmation`)

Подія надсилається після підтвердження користувачем email-адреси або номера телефону за допомогою коду в SMS або Email.

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
      "fieldName": "Мобільний",
      "value": "380737893456",
      "confirmationTs": "2026-01-15 16:54:14"
    }
  },
  "sign": "fe0da5443a9f5cadd0e972301415816cec481137"
}
```

---

#### Відписка контакту від форми (`form-contact-unsubscribe`)

Подія надсилається, якщо користувач відписався через форму відписки.

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
