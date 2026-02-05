### Структура запроса вебхука

Все вебхуки отправляются HTTP(S)-запросом методом **POST**.

#### Поля верхнего уровня

| Поле            | Описание                                                          |
| --------------- | ----------------------------------------------------------------- |
| `eventId`       | Уникальный идентификатор события (одинаков для повторных попыток) |
| `eventType`     | Тип события (например, `sms-delivery-report`)                     |
| `eventCreateTs` | Дата и время создания события (`yyyy-mm-dd hh:mm:ss`)             |
| `webhookId`     | Идентификатор вебхука                                             |
| `attempt`       | Номер попытки доставки                                            |
| `data`          | Данные события                                                    |
| `sign`          | Цифровая подпись запроса                                          |

---

### Пример payload: статус доставки SMS (`sms-delivery-report`)

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

| Поле             | Описание                 |
| ---------------- | ------------------------ |
| `campaignId`     | ID SMS-кампании          |
| `messageId`      | ID SMS-сообщения         |
| `segNum`         | Количество сегментов SMS |
| `statusUpdateTs` | Время обновления статуса |
| `status`         | Итоговый статус доставки |
| `to`             | Номер получателя         |

---

### Примеры payload: события форм

Вебхуки для форм могут отправляться при различных действиях пользователя: отправке формы, подтверждении контакта или отписке.

#### Отправка формы (`form-submission`)

Событие отправляется сразу после успешного заполнения и отправки формы пользователем.

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

**Описание поля items**

Каждый элемент массива соответствует одному полю формы.

| Поле                   | Описание                                            |
| ---------------------- | --------------------------------------------------- |
| `submissionDataId`     | ID значения поля формы                              |
| `fieldId`              | ID поля формы                                       |
| `fieldType`            | Тип поля (TEXT\_STRING, EMAIL, MOBILE и др.)        |
| `fieldName`            | Название поля                                       |
| `value`                | Значение, введённое пользователем                   |
| `confirmationRequired` | Признак необходимости подтверждения (1 — требуется) |

---

#### Подтверждение контакта (`form-contact-confirmation`)

Событие отправляется после подтверждения пользователем email-адреса или номера телефона с помощью кода в SMS или Email.

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

#### Отписка контакта от формы (`form-contact-unsubscribe`)

Событие отправляется, если пользователь отписался через  форму отписки.

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
