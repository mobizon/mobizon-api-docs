### Obter lista de campanhas
{{EXAMPLE_QUERY}}

Este método permite obter uma lista de campanhas criadas. A busca pode ser realizada por [ID](/br/help/api-docs/other#glossary-id) e outros campos.

#### Parâmetros da requisição

 Parâmetro        | Tipo     | Descrição
-----------------|---------|-----------
`criteria`       | array   | Critérios de busca (consulte a tabela [Critérios de busca](#list-criteria)).
`pagination`     | array   | Parâmetros de paginação (consulte a tabela [Parâmetros de paginação](#list-pagination)).
`sort`           | array   | Parâmetros de ordenação (consulte a tabela [Parâmetros de ordenação](#list-sort)).


#### <span data-anchor="list-criteria">Critérios de busca</span>
Abaixo estão listados os campos das campanhas pelos quais a busca é realizada. 
A busca pode ser realizada por um ou vários campos simultaneamente. 

 Parâmetro                  | Tipo     | Descrição
---------------------------|---------|-----------
`criteria[id]`             | integer | Busca de uma única campanha por seu [ID](/br/help/api-docs/other#glossary-id).
`criteria[ids]`            | array   | Busca de várias campanhas por seus [IDs](/br/help/api-docs/other#glossary-id).<br>O parâmetro deve ser passado como um array ou uma string de identificadores separados por vírgulas.<br>O número máximo de identificadores é 100; se este limite for excedido, a busca ocorrerá pelos primeiros 100 IDs da lista.
`criteria[recipient]`      | string  | Busca pelo número de telefone do destinatário ou parte dele.<br>Por exemplo:<br>**{widget:example-phone}** – encontrará todas as campanhas em que este número participou;<br>**38097** – serão encontradas todas as campanhas com números contendo a combinação de dígitos especificada.<br>Apenas um número pode participar da busca.
`criteria[from]`           | string  | Busca pelo [ID do remetente](/br/help/api-docs/other#glossary-sender-id) que foi usado na campanha.
`criteria[text]`           | string  | Busca pelo texto da mensagem da campanha.<br>Realizada de acordo com o princípio de correspondência exata do valor pesquisado.
`criteria[status]`         | string  | Busca pelo [status da campanha](#list-campaign-statuses).
`criteria[createTsFrom]`   | string  | Busca de campanhas criadas a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[createTsTo]`     | string  | Busca de campanhas criadas até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[sentTsFrom]`     | string  | Busca de campanhas cujo envio ocorreu a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[sentTsTo]`       | string  | Busca de campanhas cujo envio ocorreu até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[type]`           | integer | Busca pelo tipo de campanha:<br>**1** – Mensagem única (envio para um número);<br>**2** – Envio em massa (definido por padrão);<br>**3** – Campanha de modelo (o texto da mensagem pode conter espaços reservados que serão substituídos por texto único para cada destinatário). 
`criteria[groups]`         | string  | Busca pelos identificadores de [grupos de contatos](/br/help/contact-book/contact-groups) usados na campanha.<br>O parâmetro deve ser passado como um array ou uma string de identificadores separados por vírgulas.


#### <span data-anchor="list-pagination">Parâmetros de paginação</span>
Estes parâmetros são destinados à saída estruturada (parcial) da informação solicitada.

 Parâmetro                 | Tipo     | Descrição
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Número de elementos exibidos por página (25, 50, 100).
`pagination[currentPage]` | integer | Página atual.<br>A numeração das páginas começa em 0.


#### <span data-anchor="list-sort">Parâmetros de ordenação</span>
Com esses parâmetros, você pode ordenar os resultados da busca por um dos campos em ordem crescente (ASC) ou decrescente (DESC). 

***Exemplo:***

Ordenação por data de criação da campanha em ordem crescente – `sort[createTs]=ASC`.<br>
Ordenação por [ID](/br/help/api-docs/other#glossary-id) da campanha em ordem decrescente – `sort[id]=DESC`.

 Parâmetro                     | Descrição
------------------------------|----------
`sort[id]`                    | Ordenação pelo [ID](/br/help/api-docs/other#glossary-id) da campanha.
`sort[name]`                  | Ordenação pelo nome da campanha.
`sort[from]`                  | Ordenação pelo ID do remetente.
`sort[counters.totalMsgNum]`  | Ordenação pelo número de telefones da campanha.
`sort[counters.totalCost]`    | Ordenação pelo custo da campanha.
`sort[createTs]`              | Ordenação pela data e hora de criação da campanha.
`sort[startSendTs]`           | Ordenação pela data e hora de início do envio da campanha.
`sort[endSendTs]`             | Ordenação pela data e hora de término do envio da campanha.


#### Resposta do servidor

Contém um array com dois campos:

 Campo            | Tipo     | Descrição
-----------------|---------|-----------
`items`          | array   | Lista das campanhas encontradas.<br>Consulte a descrição dos campos da campanha na descrição do método [campaign/getInfo](#GetInfo).
`totalItemCount` | integer | Número total de elementos encontrados.


##### <span data-anchor="list-campaign-statuses">Status das campanhas</span>

Status              | Descrição
--------------------|-------------------------------
NEW                 | A campanha foi criada, mas o usuário ainda não a enviou.<br>Neste status, a adição de destinatários é permitida.
MODERATION          | Passando por moderação para conformidade com as regras do serviço.
DECLINED            | Recusada pelo moderador, pois não cumpre as regras do serviço ou os requisitos das operadoras cujos números estão presentes na campanha.
READY_FOR_SEND      | A campanha está pronta para envio, mas o envio ainda não começou.
AUTO_READY_FOR_SEND | Não há necessidade de moderação da campanha. A campanha será enviada sem moderação.
NOT_YET_SENT        | Inclui todos os status em que a campanha ainda não foi enviada.<br>**Este valor é usado apenas para busca. As campanhas não podem tê-lo.**
RUNNING             | A campanha foi iniciada, o processo de envio para a operadora está em andamento.
DEFERRED            | O envio da campanha está agendado para um horário específico.<br>**Este valor é usado apenas para busca. As campanhas não podem tê-lo.**
SENT                | A campanha foi totalmente enviada, mas nem todas as mensagens receberam relatório de entrega das operadoras.
DONE                | A campanha foi totalmente processada, todos os relatórios finais de entrega foram recebidos.<br>Após definir este status, nenhum contador da campanha é alterado.






