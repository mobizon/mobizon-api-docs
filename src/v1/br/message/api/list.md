### Obter lista de mensagens SMS
{{EXAMPLE_QUERY}}

Este método permite obter uma lista das mensagens SMS criadas.

A busca pode ser realizada por [ID](/br/help/api-docs/other#glossary-id) e dados dos campos da campanha.

#### Parâmetros da requisição

 Parâmetro        | Tipo     | Descrição
-----------------|---------|-----------
`criteria`       | array   | Critérios de busca (consulte a tabela [Critérios de busca](#list-criteria)).
`pagination`     | array   | Parâmetros de paginação (consulte a tabela [Parâmetros de paginação](#list-pagination)).
`sort`           | array   | Parâmetros de ordenação (consulte a tabela [Parâmetros de ordenação](#list-sort)).
`withNumberInfo` | integer | Este parâmetro permite obter informações adicionais do servidor sobre o número do destinatário, como "país" e "operadora".<br>Valores possíveis:<br>**0** – não receber (definido por padrão);<br>**1** – receber.

#### <span data-anchor="list-criteria">Critérios de busca</span>

Informações sobre os campos da mensagem SMS pelos quais a busca é realizada. 
Para a busca, pode-se usar um único campo ou vários simultaneamente.


 Parâmetro                     | Tipo     | Descrição
------------------------------|---------|-----------
`criteria[campaignIds]`         | array \ string | Busca por identificadores de campanhas.<br>O parâmetro deve ser passado como um array ou uma string de identificadores separados por vírgulas.<br>O número máximo de identificadores é 100; se este limite for excedido, a busca ocorrerá pelos primeiros 100 [IDs](/br/help/api-docs/other#glossary-id) da lista.
`criteria[from]`        | string | Busca pelo [ID do remetente](/br/help/api-docs/other#glossary-sender-id).<br>A busca é feita pelo ID do remetente que foi criado na campanha.
`criteria[to]`       | string   | Busca pelo número de telefone do destinatário.<br>A busca pode ser feita pelo número completo ou parte dele.<br>Exemplo:<br>`{widget:example-phone}` – encontrará todas as campanhas em que este número participou;<br>`38097` – serão encontradas todas as campanhas com números contendo a combinação de dígitos especificada.<br>Apenas um número pode participar da busca.
`criteria[text]`              | string  | Busca pelo texto da mensagem da campanha.<br>Realizada de acordo com o princípio de correspondência exata do valor pesquisado. 
`criteria[status]`                | integer | Busca pelo [status da mensagem](/br/help/api-docs/other#SmsStatus).
`criteria[groups]`              | string  | Busca pelos identificadores de [grupos de contatos](/br/help/contact-book/contact-groups) usados na campanha.<br>O parâmetro deve ser passado como um array ou uma string de identificadores separados por vírgulas.
`criteria[campaignStatus]`            | string | Busca pelo [status da campanha](/br/help/api-docs/campaign#list-campaign-statuses) da mensagem SMS.
`criteria[campaignCreateTsFrom]`            | string  | Busca pela data e hora de criação das campanhas, a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[campaignCreateTsTo]` | string | Busca pela data e hora de criação das campanhas até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[campaignSentTsFrom]` | string | Busca pela data e hora das campanhas enviadas, a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[campaignSentTsTo]` | string | Busca pela data e hora das campanhas enviadas até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[startSendTsFrom]` | string | Busca pela data e hora das mensagens enviadas, a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[startSendTsTo]` | string | Busca pela data e hora das mensagens enviadas até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[statusUpdateTsFrom]` | string | Busca pela data e hora das mensagens cujo status foi alterado, a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[statusUpdateTsTo]` | string | Busca pela data e hora das mensagens cujo status foi alterado até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.


### <span data-anchor="list-pagination">Parâmetros de paginação</span>

Estes parâmetros foram criados para a saída estruturada (parcial) da informação solicitada.

 Parâmetro                 | Tipo     | Descrição
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Número de elementos exibidos por página (25, 50, 100).
`pagination[currentPage]` | integer | Página atual <br>A numeração das páginas começa em 0.


### <span data-anchor="list-sort">Parâmetros de ordenação</span>

Com esses parâmetros, você pode ordenar os resultados da busca por um dos campos em ordem crescente (ASC) ou decrescente (DESC). 

Exemplo: 

Ordenação pelo número do destinatário em ordem crescente – `sort[to]`: ASC.

Ordenação pelo status da mensagem em ordem decrescente – `sort[status]`: DESC.

 Parâmetro                 | Descrição
--------------------------|---------
`sort[campaignId]`        | Ordenação pelo identificador da campanha.
`sort[from]`              | Ordenação pelo ID do remetente.
`sort[to]`                | Ordenação pelo número do destinatário.
`sort[text]`              | Ordenação pelo texto.
`sort[status]`            | Ordenação pelo status da mensagem.
`sort[startSendTs]`            | Ordenação pela hora de envio. 
`sort[statusUpdateTs]` | Ordenação pela atualização do status.
`sort[segNum]` | Ordenação pelo número de segmentos.


### Resposta do servidor

Array de dados:

 Campo            | Tipo     | Descrição
-----------------|---------|-----------
`items`          | array   | Lista de mensagens encontradas (consulte a tabela [Lista de mensagens](#list-items)).
`totalItemCount` | integer | Número total de elementos encontrados.


##### <span data-anchor="list-items">Lista de mensagens</span>

Cada uma das mensagens contém os campos:

 Campo               | Tipo     | Descrição
--------------------|---------|-----------
`id`                | integer | Identificador da mensagem.
`campaignId`        | integer | Identificador da campanha da mensagem.
`segNum`            | integer | Número de segmentos.
`segUserBuy`        | float   | Custo do segmento da mensagem para o usuário <br>Indicado na moeda do usuário.
`from`              | string  | [ID do remetente](/br/help/api-docs/other#glossary-sender-id).
`to`                | string  | Número do destinatário.
`text`              | string  | Texto da mensagem.
`status`            | string  | Status da mensagem (consulte a tabela [Lista de status de mensagens possíveis](/br/help/api-docs/other#SmsStatus)).
`groups`            | string  | Identificadores de [grupos de contatos](/br/help/contact-book/contact-groups) aos quais o número do destinatário pertencia no momento da criação da campanha.
`uuid`              | string  | Identificador interno da mensagem.
`countryA2`         | string  | Código do país do destinatário no formato ISO-3166 alpha2.
`operatorName`      | string  | Nome da operadora do destinatário.
`startSendTs`      | date  | Data e hora de envio da mensagem.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`statusUpdateTs`      | date  | Data e hora da última atualização do status da mensagem.<br>Formato: `AAAA-MM-DD HH:MM:SS`.






