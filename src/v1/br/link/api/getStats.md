### Obter estatísticas de cliques nos links
{{EXAMPLE_QUERY}}

Este método destina-se a obter estatísticas de cliques para um ou mais links curtos por seus [IDs](/br/help/api-docs/other#glossary-id).

Os dados podem ser agrupados por meses, dias, horas, minutos.

#### Parâmetros da requisição

 Parâmetro          | Tipo     | Descrição
-------------------|---------|-------------
`ids`              | array   | Identificadores dos links.<br>O número máximo de [IDs](/br/help/api-docs/other#glossary-id) na requisição é 5.<br>Sintaxe do parâmetro: `ids[]` para cada identificador.
`type`             | string  | Tipo de estatística solicitada.<br>Permite obter dados em diferentes intervalos de tempo:<br>**monthly** – número de cliques por mês. O intervalo máximo para obter estatísticas é de 3 anos;<br>**daily** – número de cliques por dia. O intervalo máximo para obter estatísticas é de 90 dias;<br>**hourly** – número de cliques por hora. O intervalo máximo para obter estatísticas é de 1 semana;<br>**minute** – número de cliques por minuto. O intervalo máximo para obter estatísticas é de 3 horas.
`criteria`         | array   | Critérios de busca (consulte a tabela [Critérios de busca](#get-stats-criteria)).

#### <span data-anchor="get-stats-criteria">Critérios de busca</span>

A busca de dados estatísticos é formada com base na data e hora especificadas.

 Parâmetro            | Tipo     | Descrição
---------------------|---------|-------------
`criteria[dateFrom]` | string  | Extrair estatísticas a partir da data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`criteria[dateTo]`   | string  | Extrair estatísticas até a data e hora especificadas.<br>Formato: `AAAA-MM-DD HH:MM:SS`.

**Importante**: se os critérios de busca `dateFrom` e `dateTo` não estiverem definidos, as estatísticas do campo `type` serão extraídas para o último intervalo máximo possível.

Se apenas um critério `dateFrom` estiver definido ou se o intervalo de tempo entre `dateFrom` e `dateTo` exceder o intervalo máximo permitido, as estatísticas serão extraídas pelo intervalo máximo permitido a partir da data `dateFrom`. 

Se apenas o critério `dateTo` estiver definido, as estatísticas serão extraídas pelo período máximo possível até a data `dateTo`.

#### Resposta do servidor
Array de dados:

Campo               | Tipo     | Descrição
-------------------|---------|-------------
`items`            | array   | Dados estatísticos.
`totals`           | string  | Número total de cliques durante o período solicitado.


#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}}  | Estatísticas obtidas com sucesso.
{{API_INCORRECT_PARAM}}  | Se mais de 5 identificadores de links forem especificados ou se o tipo de estatística estiver incorreto.






