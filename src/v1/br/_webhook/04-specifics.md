### Características de funcionamento dos webhooks

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
