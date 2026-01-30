### Obter dados estatísticos da campanha
{{EXAMPLE_QUERY}}

Este método permite obter os dados básicos e estatísticos da campanha por seu [ID](/br/help/api-docs/other#glossary-id).

As estatísticas são formadas usando vários contadores, que são exibidos no campo `counters`.

**IMPORTANTE!**

Devido a características técnicas do cálculo do custo da campanha, os dados sobre o custo possível da campanha são indicados no momento da adição dos destinatários e não mudam com o tempo.

Alterações podem ocorrer apenas no caso de um novo carregamento de destinatários ou ao editar os dados da campanha (no caso de edição de dados, todos os destinatários e cálculos são resetados – um novo carregamento é necessário).

#### Parâmetros da requisição

 Parâmetro                  | Tipo     | Descrição
---------------------------|---------|-----------
`id`                       | integer | Identificador da campanha.
`getFilledTplCampaignText` | integer | Formato dos dados retornados:<br>**0** – texto da campanha com espaços reservados;<br>**1** – retornar o texto da campanha de modelo preenchido com os dados reais do destinatário (padrão).

#### Resposta do servidor

Campo           | Tipo     | Descrição
---------------|---------|-----------
`id`                       | integer | Identificador da campanha.
`moderationStatus`         | string  | Status atual da moderação:<br>**MODERATION** – a campanha está em moderação;<br>**DECLINED** – a campanha foi recusada pelo moderador;<br>**READY_FOR_SEND** – a campanha foi autorizada pelo moderador;<br>**AUTO_READY_FOR_SEND** – a campanha foi enviada sem moderação.
`commonStatus`             | string  | Status atual da campanha:<br>**MODERATION** – a campanha está passando por moderação;<br>**DECLINED** – a campanha foi recusada pelo moderador (o motivo da recusa é indicado no campo `globalComment`);<br>**READY_FOR_SEND** – a campanha está pronta para envio, mas o envio ainda não começou;<br>**RUNNING** – a campanha está em processo de envio;<br>**SENT** – a campanha foi totalmente enviada, mas nem todas as mensagens receberam relatório de entrega da operadora;<br>**DONE** – a campanha foi totalmente processada, todos os relatórios finais de entrega foram recebidos.
`groupsList`               | array   | Lista de grupos de contatos incluídos na campanha.<br>Para cada grupo contém:<br>**id** – número do grupo;<br>**name** – nome do grupo;<br>**cardsCnt** – número de contatos no grupo disponíveis para envio de mensagem.<br>Se nenhum grupo foi usado na campanha, este campo estará vazio.
`type`                     | integer | Tipo de campanha:<br>**1** – Mensagem única (enviada para um número);<br>**2** – Envio em massa;<br>**3** – Campanha de modelo;<br>**7** – Campanha funcional (de serviço).
`msgType`                  | string  | Tipo de mensagens da campanha.<br>Atualmente, apenas o tipo "SMS" é suportado.
`rateLimit`                | integer | Limite do número de mensagens enviadas no período especificado no campo `ratePeriod`.
`ratePeriod`               | integer | Período durante o qual o número de SMS especificado no campo `rateLimit` será enviado.
`sendStatus`               | string  | Status de envio da campanha:<br>**SENT** – a campanha foi enviada;<br>**DONE** – a campanha foi concluída.
`isDeleted`                | integer | Flag indicando que a campanha foi excluída:<br>**0** – a campanha está disponível;<br>**1**– a campanha foi excluída.
 `deferredToTs`            | string  | Data e hora do envio agendado da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
 `createTs`                | string  | Data e hora de criação da campanha.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
 `startSendTs`             | string  | Data e hora do início real do envio da campanha.<br>Se o envio não tiver começado, este campo contém NULL.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
 `endSendTs`               | string  | Data e hora do término do envio de todas as mensagens da campanha.<br>Se o envio das mensagens não tiver sido concluído, este campo contém NULL.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
 `name`                    | string  | Nome da campanha.
 `from`                    | string  | [ID do remetente](/br/help/api-docs/other#glossary-sender-id) que foi selecionado para o envio da campanha.
 `text`                    | string  | Texto completo da mensagem ou texto de modelo com espaços reservados.
 `validity`                | integer | Tempo máximo de espera para entrega da mensagem, caso o destinatário não possa recebê-la imediatamente, em minutos a partir do momento do envio.
 `mclass`                  | integer | Classe da mensagem enviada:<br>**0** – as mensagens são exibidas em uma janela pop-up e não são salvas em lugar nenhum (flashSMS);<br>**1** – as mensagens são salvas na pasta de mensagens recebidas do telefone.
 `trackShortLinkRecipients`| integer | Se a função de rastreamento de destinatários foi usada:<br>**0** – a função não foi usada;<br>**1** – a função foi usada.
 `groups`                  | string  | Identificadores de [grupos de contatos](/br/help/contact-book/contact-groups) usados na campanha, separados por vírgulas.
 `globalComment`           | string  | Comentário do moderador, caso a campanha tenha sido recusada.
 `creationWay`             | integer | Método de criação da campanha:<br>**1** – via navegador de Internet;<br>**5** – [campanha funcional (de serviço)](/br/help/api-docs/other#glossary-functional-campaign).
 `counters`                | array   | Vários contadores da campanha, descritos na tabela [Campos do objeto `counters`](#data-counters).

##### <span data-anchor="data-counters">Campos do objeto `counters`</span>

Campo                 | Tipo      | Descrição
---------------------|----------|-----------
`updateTs`           | datetime | Hora da última atualização dos contadores.<br>Para reduzir a carga no sistema, a atualização dos contadores pode ocorrer com atraso.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`totalNewSegNum`     | integer  | Número total de segmentos com o status `NEW`.
`totalAcceptdSegNum` | integer  | Número total de segmentos com o status `ACCEPTD`.
`totalDelivrdSegNum` | integer  | Número total de segmentos com o status `DELIVRD`.
`totalRejectdSegNum` | integer  | Número total de segmentos com o status `REJECTD`.
`totalExpiredSegNum` | integer  | Número total de segmentos com o status `EXPIRED`.
`totalUndelivSegNum` | integer  | Número total de segmentos com o status `UNDELIV`.
`totalDeletedSegNum` | integer  | Número total de segmentos com o status `DELETED`.
`totalUnknownSegNum` | integer  | Número total de segmentos com o status `UNKNOWN`.
`totalPdlivrdSegNum` | integer  | Número total de segmentos com o status `PDLIVRD`.
`totalSegNum`        | integer  | Número total de segmentos na campanha. Atualizado ao adicionar destinatários.
`totalNewMsgNum`     | integer  | Número total de mensagens com o status `NEW`.
`totalAcceptdMsgNum` | integer  | Número total de mensagens com o status `ACCEPTD`.
`totalDelivrdMsgNum` | integer  | Número total de mensagens com o status `DELIVRD`.
`totalRejectdMsgNum` | integer  | Número total de mensagens com o status `REJECTD`.
`totalExpiredMsgNum` | integer  | Número total de mensagens com o status `EXPIRED`.
`totalUndelivMsgNum` | integer  | Número total de mensagens com o status `UNDELIV`.
`totalDeletedMsgNum` | integer  | Número total de mensagens com o status `DELETED`.
`totalUnknownMsgNum` | integer  | Número total de mensagens com o status `UNKNOWN`.
`totalPdlivrdMsgNum` | integer  | Número total de mensagens com o status `PDLIVRD`.
`totalMsgNum`        | integer  | Número total de mensagens (não segmentos). Atualizado durante o processamento (antes do envio) das mensagens/segmentos da campanha.
`totalNewMsgCost`    | float    | Custo total de todos os segmentos com o status `NEW`.
`totalAcceptdMsgCost`| float    | Custo total de todos os segmentos com o status `ACCEPTD`.
`totalDelivrdMsgCost`| float    | Custo total de todos os segmentos com o status `DELIVRD`.
`totalRejectdMsgCost`| float    | Custo total de todos os segmentos com o status `REJECTD`.
`totalExpiredMsgCost`| float    | Custo total de todos os segments com o status `EXPIRED`.
`totalUndelivMsgCost`| float    | Custo total de todos os segments com o status `UNDELIV`.
`totalDeletedMsgCost`| float    | Custo total de todos os segments com o status `DELETED`.
`totalUnknownMsgCost`| float    | Custo total de todos os segments com o status `UNKNOWN`.
`totalPdlivrdMsgCost`| float    | Custo total de todos os segments com o status `PDLIVRD`.
`totalCost`          | float    | Custo total da campanha.
`recipientsRejected` | integer  | Número de destinatários rejeitados (não incluídos na campanha). Atualizado ao adicionar destinatários.






