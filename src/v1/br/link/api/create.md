### Criar link curto
{{EXAMPLE_QUERY}}

Este método destina-se à criação de links curtos.
#### Parâmetros da requisição

**data** `array` – Parâmetros do link

 Parâmetro             | Tipo     | Descrição
----------------------|---------|-----------
`data[fullLink]`      | string  | Link completo.<br>O link que deve ser encurtado no formato de uma URL válida.<br>Exemplo: `https://help.mobizon.com/api-docs/sms-api?utm_campaign=docs&utm_source=help&utm_medium=test#server-response-format` ou `www.mobizon.com` 
`data[status]`        | integer | Status do link curto:<br>**0** – link inativo;<br>**1** – link ativo (definido por padrão).
`data[expirationDate]`| date    | Data de expiração do link.<br>O link será válido até o final do dia especificado no fuso horário do usuário.<br>Por padrão, a validade do link não é limitada.<br>Formato: `AAAA-MM-DD`.
`data[comment]`       | string  | Comentário do link.<br>Graças a este campo, é possível encontrar facilmente um link curto entre outros.<br>Exemplo: "Descontos da Black Friday" ou "Lembrete de saldo negativo".<br>O comprimento máximo do comentário é de 255 caracteres.

#### Resposta do servidor
`array`: Dados do link curto criado

Campo        | Tipo     | Descrição
------------|---------|-------------
`id`        | integer | Identificador do link.
`code`      | string  | Código do link curto.
`shortLink` | string  | Link curto.


#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}}         | Link curto criado com sucesso.
{{API_VALIDATION}} | Se algum parâmetro contiver valores inválidos.






