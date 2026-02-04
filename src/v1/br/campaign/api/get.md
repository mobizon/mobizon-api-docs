### Obter dados básicos da campanha
{{EXAMPLE_QUERY}}

Este método permite obter os dados básicos de uma campanha criada por seu [ID](/br/help/api-docs/other#glossary-id).

#### Parâmetros da requisição

 Parâmetro     | Tipo     | Descrição
--------------|---------|-----------
`id`          | integer | Identificador da campanha.

#### Resposta do servidor

Um array de dados contendo os seguintes campos:

Campo           | Tipo     | Descrição
---------------|---------|-----------
`id`           | string  | Identificador da campanha.
`moderationStatus`         | string  | Status atual da moderação:<br>**MODERATION** – a campanha está em moderação;<br>**DECLINED** – a campanha foi recusada pelo moderador;<br>**READY_FOR_SEND** – a campanha foi autorizada pelo moderador;<br>**AUTO_READY_FOR_SEND** – a campanha foi enviada sem moderação.
`commonStatus` | string  | Status atual da campanha:<br>**MODERATION** – a campanha está passando por moderação;<br>**DECLINED** – a campanha foi recusada pelo moderador (o motivo da recusa é indicado no campo globalComment);<br>**READY_FOR_SEND** – a campanha está pronta para envio, mas o envio ainda não começou;<br>**RUNNING** – a campanha está em processo de envio;<br>**SENT** – a campanha foi totalmente enviada, mas nem todas as mensagens receberam relatório de entrega da operadora;<br>**DONE** – a campanha foi totalmente concluída: todos os relatórios finais de entrega foram recebidos, os contadores contêm os valores finais.
`groupsList`   | array  | Lista de grupos de contatos incluídos na campanha.<br>Para cada grupo contém:<br>**id** – número do grupo;<br>**name** – nome do grupo;<br>**cardsCnt** – número de contatos no grupo disponíveis para envio de mensagem.<br>Se nenhum grupo foi usado na campanha, este campo estará vazio.
`type`         | integer | Tipo de campanha:<br>**1** – Mensagem única (enviada para um número);<br>**2** – Envio em massa;<br>**3** – Campanha de modelo;<br>**7** – Campanha funcional (de serviço).
`msgType`      | string | Tipo de mensagens da campanha.<br>Atualmente, apenas o tipo "SMS" é suportado.
`rateLimit`    | integer | Limite do número de mensagens enviadas no período especificado no campo `ratePeriod`.
`ratePeriod`   | integer | Período de tempo em segundos durante o qual o número de SMS especificado no campo `rateLimit` será enviado.
`sendStatus`   | string | Status de envio da campanha:<br>**SENT** – a campanha foi enviada;<br>**DONE** – a campanha foi concluída.
`isDeleted`    | integer | Flag indicando que a campanha foi excluída:<br>**0** – a campanha está disponível;<br>**1** – a campanha foi excluída.
`deferredToTs` | string  | Data e hora do envio agendado da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`createTs`     | string  | Data e hora de criação da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`startSendTs`  | string  | Data e hora do início real do envio da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`endSendTs`    | string  | Data e hora do término do envio de todas as mensagens da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`name`         | string  | Nome da campanha.
`from`         | string  | [ID do remetente](/br/help/api-docs/other#glossary-sender-id) que foi selecionado para o envio da campanha.
`text`         | string  | Texto completo da mensagem ou texto de modelo com espaços reservados.
`validity`     | integer | Tempo máximo de espera para entrega da mensagem, caso o destinatário não possa recebê-la imediatamente, em minutos a partir do momento do envio.
`mclass`       | integer  | Classe da mensagem enviada:<br>**0** – as mensagens são exibidas em uma janela pop-up e não são salvas em lugar nenhum (flashSMS);<br>**1** – as mensagens são salvas na pasta de mensagens recebidas do telefone.
`trackShortLinkRecipients` | integer | Se a função de rastreamento de destinatários foi usada:<br>**0** – a função não foi usada;<br>**1** – a função foi usada.
`groups`         | string  | Identificadores de [grupos de contatos](/br/help/contact-book/contact-groups) usados na campanha, separados por vírgulas.
`globalComment`  | string  | Comentário do moderador, caso a campanha tenha sido recusada.










