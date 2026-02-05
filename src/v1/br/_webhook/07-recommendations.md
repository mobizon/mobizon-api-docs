### Recomendações para o processamento de webhooks

- O mesmo webhook pode ser enviado várias vezes (em tentativas de reentrega).
- Recomenda-se salvar o `eventId` e não processar o mesmo evento repetidamente.
- Não execute operações demoradas durante o processamento da requisição.
- Cenário ideal:
    - verificar a assinatura;
    - salvar o evento;
    - retornar rapidamente HTTP 200;
    - realizar o processamento posterior de forma assíncrona.
