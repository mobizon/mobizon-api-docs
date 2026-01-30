### Editar dados do link curto
{{EXAMPLE_QUERY}}

Este método permite alterar os parâmetros de um link curto criado.

#### Parâmetros da requisição

 Parâmetro  | Tipo     | Descrição
-----------|---------|-----------
`id`       | integer | Identificador do link.
`data`     | integer | Os parâmetros editáveis do link estão listados na tabela [Parâmetros do link](#update-data).

#### <span data-anchor="update-data">Parâmetros do link</span>

 Parâmetro             | Tipo     | Descrição
----------------------|---------|-----------
`data[status]`        | integer | Status do link curto:<br>**0** – link inativo;<br>**1** – link ativo.
`data[expirationDate]`| date    | Data de expiração do link curto.<br>Formato: `AAAA-MM-DD`.<br>Se o valor não for passado – a validade do link será ilimitada.
`data[comment]`       | string  | Comentário do link.<br>O comprimento máximo do comentário é de 255 caracteres.

#### Resposta do servidor

`string` – Link curto.

#### Códigos de resposta da API

Código                      | Descrição
-------------------------|----
{{API_OK}}               | Parâmetros alterados com sucesso.
{{API_VALIDATION}}       | Se algum parâmetro contiver valores inválidos.
{{API_RECORD_NOT_FOUND}} | Se o link com o identificador especificado não for encontrado.







