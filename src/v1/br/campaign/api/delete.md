### Excluir campanha
{{EXAMPLE_QUERY}}

Este método permite excluir uma campanha por seu [ID](/br/help/api-docs/other#glossary-id).
<br>Uma campanha pode ser excluída se o seu envio ainda não tiver começado.
<br>Se a campanha estiver agendada: uma campanha agendada pode ser excluída, desde que faltem pelo menos 5 minutos para o início do envio.

#### Parâmetros da requisição

 Parâmetro               | Tipo     | Descrição
------------------------|---------|-----------
`id`                    | integer | Identificador da campanha.




#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}}               | Campanha excluída com sucesso.
{{API_RECORD_NOT_FOUND}} | Se a campanha com o identificador especificado não for encontrada.
{{API_DATA_UPDATE}}      | Se a campanha com o identificador especificado não puder ser excluída.






