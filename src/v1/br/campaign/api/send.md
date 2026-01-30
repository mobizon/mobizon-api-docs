### Enviar campanha
{{EXAMPLE_QUERY}}

Este método permite enviar uma campanha criada por seu [ID](/br/help/api-docs/other#glossary-id).

**Atenção!** Dependendo das condições, como suspeita de spam, presença de conteúdo suspeito no texto da mensagem, restrição para uma determinada direção, etc., bem como das condições de cooperação (contrato assinado), a campanha pode passar por moderação.

#### Parâmetros da requisição

Parâmetro | Tipo     | Descrição
---------|---------|-----------
`id`     | integer | Identificador da campanha.

#### Resposta do servidor

`integer`: status de envio da campanha.

##### Valores possíveis:

**1** – a campanha está sendo verificada pelo moderador;<br>
**2** – a campanha foi enviada.

#### Códigos de resposta da API

Código                      | Descrição
-------------------------|-----------
{{API_OK}}               | Campanha enviada com sucesso.
{{API_RECORD_NOT_FOUND}} | Se a campanha não for encontrada.
{{API_DATA_UPDATE}}      | Se não foi possível alterar o status da campanha.








