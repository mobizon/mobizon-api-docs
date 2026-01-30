# Webhooks: guia de uso

## O que é um webhook e para que serve

**Webhook** é um mecanismo de envio automático de notificações do nosso serviço para o seu sistema (CRM, ERP, 1C, aplicativo próprio, etc.) quando ocorrem determinados eventos, através de requisições HTTP(S).

Em vez de consultar regularmente a API (por exemplo, para verificar o status de entrega de um SMS), seu servidor recebe uma requisição HTTP(S) no momento em que o evento realmente acontece.

O uso de webhooks permite:

- obter dados praticamente em tempo real;
- reduzir a carga tanto no seu sistema quanto na API do serviço;
- simplificar a arquitetura de integração;
- rastrear com precisão os status finais de entrega de SMS ou eventos de formulários, como envio, confirmação de contato ou cancelamento de inscrição.

---

## Tipos de eventos suportados

Atualmente, os seguintes tipos de eventos estão disponíveis:

- **Eventos de formulários** — são transmitidos os dados inseridos pelo usuário no formulário, bem como notificações na confirmação do número de telefone ou endereço de e-mail, ou no cancelamento de inscrição do formulário.
- **Status de SMS** — é transmitido o status final de entrega do SMS ao assinante.

---

## Como criar um webhook

### Passo 1. Acessar as configurações

Vá para **Painel de Controle → API → Webhooks** e clique no botão **"Criar webhook"**. O formulário de criação de um novo webhook será aberto.

<!-- Screenshot da janela de criação -->

---

### Passo 2. Configurar parâmetros

No formulário de criação do webhook, especifique os seguintes parâmetros:

#### Tipo de evento

Define o evento no sistema Mobizon que disparará o envio do webhook.

Opções disponíveis:

- Eventos de formulários
- Status de SMS

---

#### Formato de transmissão de dados

O formato no qual os dados do webhook serão enviados para o seu servidor:

- `raw`
- `xml`
- `json`

Escolha o formato dependendo das capacidades do seu processador.

---

#### Endereço do processador (Handler URL)

URL para o qual os webhooks serão enviados.

Restrições:

- comprimento máximo da URL — **até 1000 caracteres**;
- as requisições são enviadas **apenas pelo método POST**;
- é permitido **no máximo um redirecionamento de servidor (HTTP 301 ou 302)**.

**Importante:**

- apenas redirecionamentos de servidor são suportados;
- cadeias de redirecionamentos não são suportadas;
- se exceder um redirecionamento, a notificação será considerada não entregue.

---

#### Chave secreta

A chave secreta é usada para verificar a autenticidade da requisição.

Características:

- pode conter qualquer conjunto de caracteres;
- comprimento máximo — **255 caracteres**;
- não é transmitida na requisição HTTP;
- usada apenas para gerar e verificar a assinatura.

Se a chave secreta não for definida:

- a assinatura da requisição não é gerada;
- a segurança do processador deve ser garantida por outros meios (por exemplo, restringindo o acesso à URL).

---

#### Atividade do webhook

Marque a opção **"Ativo"**, se o webhook deve começar a funcionar imediatamente após a criação.

---

### Passo 3. Salvar

Clique no botão **"Salvar"**. O webhook criado aparecerá na lista.

---

## Características de funcionamento dos webhooks

- O webhook é enviado para **uma mensagem SMS completa**, e não para cada um de seus segmentos.
- As notificações são enviadas **apenas ao receber o status final** de entrega do SMS.
- É possível criar **vários webhooks para o mesmo tipo de evento**.
- Cada webhook recebe eventos de todos os SMS e formulários da sua conta.
- A requisição é considerada entregue com sucesso se o servidor do processador retornar um código HTTP `200–299` **em no máximo 5 segundos**.
- Se a resposta não for recebida em 5 segundos or for retornado um código fora do intervalo `200–299`, o sistema realizará um reenvio.

Tentativas de reentrega:

- são realizadas até **10 tentativas**;
- o intervalo entre as tentativas aumenta em 1 minuto a cada nova tentativa;
- após esgotar as tentativas, o evento é considerado não entregue.

---

## Estrutura da requisição do webhook

Todos os webhooks são enviados por requisição HTTP(S) usando o método **POST**.

### Campos de nível superior

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

## Exemplo de payload: status de entrega de SMS (`sms-delivery-report`)

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

### Campo `data`

| Campo            | Descrição                      |
|------------------| ------------------------------ |
| `campaignId`     | ID da campanha de SMS          |
| `messageId``     | ID da mensagem SMS             |
| `segNum`         | Número de segmentos do SMS     |
| `statusUpdateTs` | Hora da atualização do status  |
| `status`         | Status final da entrega        |
| `to`             | Número do destinatário         |

---

## Exemplos de payload: eventos de formulários

Webhooks para formulários podem ser enviados em várias ações do usuário: envio de formulário, confirmação de contato ou cancelamento de inscrição.

### Envio de formulário (`form-submission`)

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

### Confirmação de contato (`form-contact-confirmation`)

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

### Cancelamento de inscrição de contato do formulário (`form-contact-unsubscribe`)

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

---

## Verificação de autenticidade da requisição

Para verificação, é utilizado o campo `sign`, calculado pelo algoritmo **SHA1**.

### Formação da assinatura

A string para a assinatura é formada na seguinte ordem:

```
eventId|attempt|eventCreateTs|secretKey
```

Onde `secretKey` é a chave secreta especificada na criação do webhook.

---

### Exemplo de verificação de assinatura em PHP

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

## Recomendações para o processamento de webhooks

- O mesmo webhook pode ser enviado várias vezes (em tentativas de reentrega).
- Recomenda-se salvar o `eventId` e não processar o mesmo evento repetidamente.
- Não execute operações demoradas durante o processamento da requisição.
- Cenário ideal:
    - verificar a assinatura;
    - salvar o evento;
    - retornar rapidamente HTTP 200;
    - realizar o processamento posterior de forma assíncrona.

---

## Erros comuns

| Problema                | Causa possível                                          |
|-------------------------|---------------------------------------------------------|
| Webhook não chega       | URL inacessível ou número de redirecionamentos excedido |
| Notificações repetidas  | O servidor não retornou HTTP 200 a tempo                |
| Assinatura não coincide | Chave secreta incorreta ou ordem dos campos errada      |
| Erro de processamento   | Falta de verificação da estrutura do payload            |

---

## Resumo

Os webhooks permitem obter dados sobre status de SMS e formulários:

- sem a necessidade de consultar constantemente a API;
- com latência mínima;
- com garantia de reentrega em caso de falhas temporárias.

A verificação correta da assinatura e o processamento cuidadoso de requisições repetidas garantem uma integração confiável.
