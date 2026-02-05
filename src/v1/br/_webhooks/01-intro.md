### O que é um webhook e para que serve

**Webhook** é um mecanismo de envio automático de notificações do nosso serviço para o seu sistema (CRM, ERP, 1C, aplicativo próprio, etc.) quando ocorrem determinados eventos, através de requisições HTTP(S).

Em vez de consultar regularmente a API (por exemplo, para verificar o status de entrega de um SMS), seu servidor recebe uma requisição HTTP(S) no momento em que o evento realmente acontece.

O uso de webhooks permite:

- obter dados praticamente em tempo real;
- reduzir a carga tanto no seu sistema quanto na API do serviço;
- simplificar a arquitetura de integração;
- rastrear com precisão os status finais de entrega de SMS ou eventos de formulários, como envio, confirmação de contato ou cancelamento de inscrição.
