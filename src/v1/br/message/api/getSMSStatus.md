### Obter relatório de status de entrega de mensagem SMS
{{EXAMPLE_QUERY}}

Este método permite obter dados sobre o status atual de entrega de uma ou mais mensagens SMS.

Independentemente do tipo de parâmetro de entrada, o resultado retornado é sempre apresentado na forma de um array.

Se forem passados identificadores de mensagens inexistentes ou que não pertencem ao usuário, o resultado não conterá informações sobre essas mensagens.

#### Parâmetros da requisição

 Parâmetro   | Tipo    | Descrição
------------|--------|-----------
`ids`       | array string | Identificador(es) da(s) mensagem(ns).<br>Array ou string de identificadores separados por vírgulas.<br>O número máximo de identificadores em uma única requisição é 100.

#### Resposta do servidor

Campo           | Tipo     | Descrição
---------------|---------|-------------
`id`             | integer | Identificador da mensagem.
`status`         | string  | Status da mensagem.<br>Consulte a tabela [Lista de status de mensagens possíveis](/br/help/api-docs/other#SmsStatus).
`segNum`         | integer | Número de segmentos nesta mensagem.
`startSendTs`    | string  | Hora de início do envio da mensagem.<br>Formato: `AAAA-MM-DD HH-MM-SS`.<br>Se a mensagem ainda não tiver sido enviada, o valor do campo será NULL.
`statusUpdateTs` | string  | Hora da última atualização do status da mensagem.<br>Formato: `AAAA-MM-DD HH-MM-SS`.<br>Se a mensagem ainda não tiver sido enviada, o valor do campo será NULL.

#### Códigos de resposta da API
Código | Descrição
----|----
{{API_OK}} | Relatório de status de entrega obtido com sucesso.
{{API_RECORD_NOT_FOUND}} | Se nenhum identificador de mensagem for especificado.
{{API_INCORRECT_PARAM}}  | Se mais de 100 identificadores de mensagem forem especificados.






