### Obter dados básicos do link curto
{{EXAMPLE_QUERY}}

Este método permite obter os dados básicos de um link curto através de um de seus três parâmetros: **id**, **code**, **shortLink**.

Em uma única requisição, é possível obter os dados de apenas um link curto.

#### Parâmetros da requisição
Para obter os dados, deve-se passar um dos parâmetros:

 Parâmetro   | Tipo     | Descrição
------------|---------|-----------
`id`        | integer | Identificador do link.
`code`      | string  | Código do link curto.<br>Combinação de caracteres única para cada link curto.<br>Localizado no final do link curto.<br>Exemplo: http://mbz.im/mgjf, onde **mgjf** é o código do link curto.
`shortLink` | string  | [Link curto](/br/help/api-docs/other#glossary-shortlink).<br>URL criada pelo nosso serviço que, ao ser acessada, redirecionará seus visitantes para o link originalmente definido por você.<br>Exemplo: http://mbz.im/mgjf.

#### Resposta do servidor
Array de dados

Campo               | Tipo     | Descrição
-------------------|---------|-------------
`id`               | integer | Identificador do link.
`status`           | integer | Status definido pelo usuário:<br>**0** – link inativo;<br>**1** – link ativo.
`moderatorStatus`        | integer | Status definido pelo administrador:<br>**0** – bloqueado pelo administrador;<br>**1** – confirmado pelo administrador.
`clickCnt`         | integer | Número de cliques no link curto.
`createTs`         | string  | Hora de criação do link curto.<br>Formato: `AAAA-MM-DD HH-MM-SS`.
`moderatorStatus`  | integer | Status de moderação do link (**0** – bloqueado, **1** – confirmado).
`expirationDate`   | string | Data de expiração do link curto.<br>Formato: `AAAA-MM-DD`.<br>Se a data não estiver definida – o valor do campo é NULL.
`code`             | string  | Código do link curto.
`fullLink`         | string  | Link completo.
`shortLink`        | string  | Link curto.
`comment`          | string  | Comentário do usuário para o link curto.<br>Se o comentário estiver ausente – o valor do campo é NULL.
`moderatorComment` | string  | Comentário do moderador.<br>Se o comentário estiver ausente – o valor do campo é NULL.


#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}} | Dados básicos do link curto obtidos com sucesso.
{{API_RECORD_NOT_FOUND}} | Se o link com o identificador especificado não for encontrado.
{{API_INCORRECT_PARAM}}  | Se nenhum dos parâmetros for passado.






