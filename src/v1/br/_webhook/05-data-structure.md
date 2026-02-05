### Estrutura da requisição do webhook

Todos os webhooks são enviados por requisição HTTP(S) usando o método **POST**.

#### Campos de nível superior

| Campo           | Descrição                                                        |
| --------------- |------------------------------------------------------------------|
| `eventId`       | Identificador único do evento (igual para tentativas de reenvio) |
| `eventType`     | Tipo de evento (por exemplo, `sms-delivery-report`)              |
| `eventCreateTs` | Data e hora de criação do evento (`yyyy-mm-dd hh:mm:ss`)         |
| `webhookId`     | Identificador do webhook                                         |
| `attempt`       | Número da tentativa de entrega                                   |
| `data`          | Dados do evento                                                  |
| `sign`          | Assinatura digital da requisição                                 |

---

---

### Exemplo de payload: status de entrega de SMS (`sms-delivery-report`)

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

#### Campo `data`

| Campo            | Descrição                      |
|------------------| ------------------------------ |
| `campaignId`     | ID da campanha de SMS          |
| `messageId``     | ID da mensagem SMS             |
| `segNum`         | Número de segmentos do SMS     |
| `statusUpdateTs` | Hora da atualização do status  |
| `status`         | Status final da entrega        |
| `to`             | Número do destinatário         |

---

---

### Exemplos de payload: eventos de formulários

Webhooks para formulários podem ser enviados em várias ações do usuário: envio de formulário, confirmação de contato ou cancelamento de inscrição.

#### Envio de formulário (`form-submission`)

O evento é enviado imediatamente após o preenchimento e envio bem-sucedidos do formulário pelo usuário.

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

**Descrição do campo items**

Cada elemento do array corresponde a um campo do formulário.

| Campo                  | Descrição                                            |
| ---------------------- |------------------------------------------------------|
| `submissionDataId`     | ID do valor do campo do formulário                   |
| `fieldId`              | ID do campo do formulário                            |
| `fieldType`            | Tipo do campo (TEXT\_STRING, EMAIL, MOBILE, etc.)    |
| `fieldName`            | Nome do campo                                        |
| `value`                | Valor inserido pelo usuário                          |
| `confirmationRequired` | Indicador de necessidade de confirmação (1 — requer) |

---

#### Confirmação de contato (`form-contact-confirmation`)

O evento é enviado após a confirmação do endereço de e-mail ou número de telefone pelo usuário usando um código por SMS ou e-mail.

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

#### Cancelamento de inscrição de contato do formulário (`form-contact-unsubscribe`)

O evento é enviado se o usuário cancelar a inscrição através de um formulário de cancelamento.

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
