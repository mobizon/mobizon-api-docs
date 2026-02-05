### Вебхук сұрауының құрылымы

Барлық вебхуктар **POST** әдісімен HTTP(S)-сұрау арқылы жіберіледі.

#### Жоғарғы деңгейдегі өрістер

| Өріс            | Сипаттамасы                                                       |
| --------------- | ----------------------------------------------------------------- |
| `eventId`       | Оқиғаның бірегей идентификаторы (қайталау әрекеттері үшін бірдей) |
| `eventType`     | Оқиға түрі (мысалы, `sms-delivery-report`)                        |
| `eventCreateTs` | Оқиға жасалған күн мен уақыт (`yyyy-mm-dd hh:mm:ss`)              |
| `webhookId`     | Вебхук идентификаторы                                             |
| `attempt`       | Жеткізу әрекетінің нөмірі                                         |
| `data`          | Оқиға деректері                                                   |
| `sign`          | Сұраудың цифрлық қолтаңбасы                                       |

---

### Payload мысалы: SMS жеткізу күйі (`sms-delivery-report`)

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

#### `data` өрісі

| Өріс             | Сипаттамасы                |
| ---------------- | -------------------------- |
| `campaignId`     | SMS-науқанның ID-і         |
| `messageId`      | SMS-хабарламаның ID-і      |
| `segNum`         | SMS сегменттерінің саны    |
| `statusUpdateTs` | Күйдің жаңартылған уақыты  |
| `status`         | Жеткізудің соңғы күйі      |
| `to`             | Алушының нөмірі            |

---

### Payload мысалдары: нысан оқиғалары

Нысандарға арналған вебхуктар пайдаланушының әртүрлі әрекеттері кезінде жіберілуі мүмкін: нысанды жіберу, контактіні растау немесе жазылымнан бас тарту.

#### Нысанды жіберу (`form-submission`)

Оқиға пайдаланушы нысанды сәтті толтырып, жібергеннен кейін бірден жіберіледі.

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
        "fieldName": "Аты",
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
        "fieldName": "Ұялы телефон",
        "value": "380737893456",
        "confirmationRequired": 1
      }
    ]
  },
  "sign": "0a38941c47689e3cb3634db817cd4851d2511c47"
}
```

**items өрісінің сипаттамасы**

Жиымның әрбір элементі нысанның бір өрісіне сәйкес келеді.

| Өріс                   | Сипаттамасы                                              |
| ---------------------- | -------------------------------------------------------- |
| `submissionDataId`     | Нысан өрісі мәнінің ID-і                                 |
| `fieldId`              | Нысан өрісінің ID-і                                      |
| `fieldType`            | Өріс түрі (TEXT\_STRING, EMAIL, MOBILE және т.б.)        |
| `fieldName`            | Өріс атауы                                               |
| `value`                | Пайдаланушы енгізген мән                                 |
| `confirmationRequired` | Растау қажеттілігінің белгісі (1 — талап етіледі)        |

---

#### Контактіні растау (`form-contact-confirmation`)

Оқиға пайдаланушы SMS немесе Email арқылы келген кодтың көмегімен email мекенжайын немесе телефон нөмірін растағаннан кейін жіберіледі.

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
      "fieldName": "Ұялы телефон",
      "value": "380737893456",
      "confirmationTs": "2026-01-15 16:54:14"
    }
  },
  "sign": "fe0da5443a9f5cadd0e972301415816cec481137"
}
```

---

#### Контактінің нысаннан жазылымын тоқтату (`form-contact-unsubscribe`)

Оқиға пайдаланушы жазылымнан бас тарту нысаны арқылы жазылымын тоқтатса жіберіледі.

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
