### Criação de uma nova campanha
{{EXAMPLE_QUERY}}

Este método permite que você crie uma nova [campanha SMS](/br/help/api-docs/other#glossary-sms-campaign).
Após criar a campanha, você deve [adicionar destinatários](#AddRecipients) e, em seguida, [enviá-la](#Send).

#### Parâmetros da requisição

**data** `array` – Parâmetros da campanha 

 Parâmetro                       | Tipo     | Descrição
--------------------------------|---------|-----------
`data[name]`                    | string  | Nome da campanha.<br>Este campo facilita a navegação pelas campanhas criadas.<br>Por exemplo: "Descontos da Black Friday" ou "Lembrete de Saldo Negativo".<br>O comprimento máximo do nome da campanha é de 255 caracteres. 
`data[text]`                    | string  | Texto da mensagem SMS a ser enviada.<br>Para [campanhas de modelo](/br/help/api-docs/other#glossary-template) (data[type]=3), este texto deve conter variáveis que serão substituídas por valores únicos para cada destinatário. A variável deve ser escrita com letras latinas, números e os símbolos `«_»` ,`«-»`, e envolta em chaves, por exemplo: `{name}` ou `{clientBalance}`.<br>[Requisitos de texto de SMS](/br/help/send-sms/sms-length-and-symbols).<br>No texto da mensagem, você pode usar [links curtos](/br/help/api-docs/other#glossary-shortlink) e o [recurso de rastreamento de destinatários](/br/help/api-docs/other#glossary-recipienttracking) para ver quem entre os destinatários clicou no seu link.
`data[type]`                    | integer | Tipo de campanha:<br>**1** – Mensagem única (enviada para um número);<br>**2** – Envio em massa (definido por padrão);<br>**3** – Campanha de modelo (o texto da mensagem pode conter espaços reservados que serão substituídos por texto único para cada destinatário).
`data[from]`                    | string  | [ID do remetente](/br/help/api-docs/other#glossary-sender-id).<br>Para usar um ID de remetente personalizado, ele deve ser [registrado](/br/help/sender-id/sender-id) antecipadamente.<br>Se o ID do remetente não for especificado, será usado o ID de remetente padrão ou padrão do serviço.
`data[rateLimit]`               | integer | O limite do número de mensagens enviadas no período especificado no campo `ratePeriod`.<br>Esta opção permite que você reduza a velocidade de envio de um grande envio de SMS para distribuir a carga em seu Call Center.<br>O limite de velocidade de envio não é superior a 100 mensagens por segundo quando calculado por segundo.<br>As mensagens são enviadas em intervalos iguais em lotes de 10, com base no `rateLimit` especificado por `ratePeriod`. Por exemplo, se você especificar uma velocidade de 600 e um período de 60, 600/60=10 SMS serão enviados a cada segundo.
`data[ratePeriod]`              | integer |  O período em segundos durante o qual o número de SMS especificado no campo `rateLimit` será enviado.<br>Pode ser:<br>**60** – 1 minuto;<br>**3600** – 1 hora;<br>**86400** – 1 dia.
`data[deferredToTs]`            | string  |  Data e hora do envio diferido da campanha. <br>O início do envio pode ser definido para não antes de uma hora depois e não depois de 14 dias.<br>Formato: `AAAA-MM-DD HH:MM:SS`. 
`data[validity]`                | integer |  O tempo máximo de espera para a entrega da mensagem se o destinatário não puder recebê-la imediatamente.<br>Por exemplo, se o telefone estiver desligado ou fora da cobertura da rede.<br>Especificado em minutos a partir do momento do envio: de **60** (1 hora) a **1440** (24 horas).
`data[shortenLinks]`            | integer |  Encurtar links no texto - **1**, padrão não encurtar - **0**.
`data[trackShortLinkRecipients]`| integer |  [Recurso de rastreamento de destinatários](/br/help/api-docs/other#glossary-recipienttracking).<br>Disponível para uso apenas se houver [links curtos](/br/help/api-docs/other#glossary-shortlink) criados em [nosso serviço](/br/help/url-shortener/how-to-shorten-url) no texto da mensagem (no campo `data[text]`).<br>**0** – não usar o recurso (padrão);<br>**1** – usar o recurso.

#### Resposta do servidor
`integer` – identificador da campanha, se for criada com sucesso.


#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}}         | A campanha foi criada com sucesso.
{{API_VALIDATION}} | Se algum parâmetro contiver valores inválidos.






