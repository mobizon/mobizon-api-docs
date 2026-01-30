### Obter lista de links
{{EXAMPLE_QUERY}}

Este método permite obter uma lista de links curtos criados. A busca pode ser realizada por [ID](/br/help/api-docs/other#glossary-id) e dados dos campos do link curto.
#### Parâmetros da requisição

 Parâmetro        | Tipo     | Descrição
-----------------|---------|-----------
`criteria`       | array   | Critérios de busca (consulte a tabela [Critérios de busca](#list-criteria)).
`pagination`     | array   | Parâmetros de paginação (consulte a tabela [Parâmetros de paginação](#list-pagination)).
`sort`           | array   | Parâmetros de ordenação (consulte a tabela [Parâmetros de ordenação](#list-sort)).

#### <span data-anchor="list-criteria">Critérios de busca</span>

Informações sobre os campos do link curto pelos quais a busca é realizada. 
Para a busca, pode-se usar tanto um único campo quanto um conjunto de campos.

 Parâmetro                    | Tipo     | Descrição
-----------------------------|---------|-----------
`criteria[status]`           | integer | Busca pelo status do link curto:<br>**0** – link inativo;<br>**1** – link ativo. 
`criteria[moderatorStatus]`  | integer | Busca pelo status de moderação do link:<br>**0** – bloqueado;<br>**1** – permitido.
`criteria[createTsFrom]`     | datetime | Busca pela data de criação do link, a partir da data especificada.<br>Formato: `AAAA-MM-DD`.
`criteria[createTsTo]`       | datetime | Busca pela data e hora de criação do link até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[query]`            | string   | Busca por vários atributos do link.<br>A busca pode ser realizada por:<br>Código do link curto;<br>Código de rastreamento do destinatário;<br>Comentário do link curto.

#### <span data-anchor="list-pagination">Parâmetros de paginação</span>

Estes parâmetros são destinados à saída estruturada (parcial) da informação solicitada.

 Parâmetro                 | Tipo     | Descrição
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Número de elementos exibidos por página (25, 50, 100).
`pagination[currentPage]` | integer | Página atual <br>A numeração das páginas começa em 0.

#### <span data-anchor="list-sort">Parâmetros de ordenação</span>

Com esses parâmetros, você pode ordenar os resultados da busca por um dos campos em ordem crescente (ASC) ou decrescente (DESC). 

***Exemplo:***
 
Ordenação pelo código do link curto em ordem crescente – `sort[code]=ASC`.<br>
Ordenação pelo link original em ordem decrescente – `sort[fullLink]=DESC`.

 Parâmetro              | Descrição
-----------------------|-----------
`sort[createTs]`       | Ordenação pela data e hora de criação do link.<br>Formato: `AAAA-MM-DD HH-MM-SS`.
`sort[expirationDate]` | Ordenação pela data de expiração do link.<br>Formato: `AAAA-MM-DD`.
`sort[clickCnt]`       | Ordenação pelo número de cliques.
`sort[code]`           | Ordenação pelo código do link curto.
`sort[fullLink]`       | Ordenação pelo link original.


#### Resposta do servidor

Array de dados:

 Campo            | Tipo     | Descrição
-----------------|---------|-----------
`items`          | array   | Lista de links encontrados.<br>Consulte a descrição dos campos dos links curtos na descrição do método [Link/Get](/br/help/api-docs/link#Get).
`totalItemCount` | integer | Número total de elementos encontrados.






