### Obter links curtos da campanha
{{EXAMPLE_QUERY}}

Este método permite obter informações e estatísticas da lista de links curtos de uma campanha.
#### Parâmetros da requisição

Parâmetro          | Tipo     | Descrição
------------------|---------|-----------
`campaignId`      | integer | Identificador da campanha.


#### Resposta do servidor

Estrutura do objeto de link: array de links curtos, no qual cada elemento contém os seguintes campos:

Campo          | Tipo     | Descrição
--------------|---------|-----------
`id`          | integer | Identificador do link curto.
`code`        | string  | Código do link curto.
`fullLink`    | string  | Link completo.
`shortLink`   | string  | Link curto.
`clickCnt`    | integer | Número de cliques no link curto.
`redirectCnt` | integer | Número de redirecionamentos pelo link curto.
`comment`     | string  | Comentário do usuário para o link curto.

#### Códigos de resposta da API

Código                      | Descrição
-------------------------|-----------
{{API_OK}} | Links curtos da campanha obtidos com sucesso.
{{API_RECORD_NOT_FOUND}} | Se a campanha não for encontrada.







