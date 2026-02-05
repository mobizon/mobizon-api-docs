### Como criar um webhook

#### Passo 1. Acessar as configurações

Vá para **Painel de Controle → API → Webhooks** e clique no botão **"Criar webhook"**. O formulário de criação de um novo webhook será aberto.

<!-- Screenshot da janela de criação -->

---

#### Passo 2. Configurar parâmetros

No formulário de criação do webhook, especifique os seguintes parâmetros:

##### Tipo de evento

Define o evento no sistema Mobizon que disparará o envio do webhook.

Opções disponíveis:

- Eventos de formulários
- Status de SMS

---

##### Formato de transmissão de dados

O formato no qual os dados do webhook serão enviados para o seu servidor:

- `raw`
- `xml`
- `json`

Escolha o formato dependendo das capacidades do seu processador.

---

##### Endereço do processador (Handler URL)

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

##### Chave secreta

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

##### Atividade do webhook

Marque a opção **"Ativo"**, se o webhook deve começar a funcionar imediatamente após a criação.

---

#### Passo 3. Salvar

Clique no botão **"Salvar"**. O webhook criado aparecerá na lista.
