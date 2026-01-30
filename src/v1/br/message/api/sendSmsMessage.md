### Enviar uma única mensagem SMS
{{EXAMPLE_QUERY}}

Este método permite que você envie uma única mensagem SMS para um número de telefone celular especificado.

#### Parâmetros da requisição

 Parâmetro   | Tipo    | Descrição  
------------|--------|-----------
`recipient` | string | O número de telefone do destinatário para a mensagem SMS.<br>O número deve estar no formato internacional e conter apenas dígitos.<br>Por exemplo: {widget:example-phone}.<br>Se o número tiver um `“+”` no início, ele deve ser codificado como `%2B` ou removido, deixando apenas dígitos.
`text`      | string | O texto da mensagem SMS, codificado em [codificação URL](/br/help/api-docs/other#urlencode).<br>Se o sistema não retornar uma resposta com os dados da mensagem ao tentar enviar uma mensagem usando uma requisição GET, primeiro verifique se há caracteres especiais no corpo da requisição, tais como: `?` `/` `\` `&` `+` e `[espaço]`.<br>A presença de tais caracteres indica que o texto não foi [codificado](/br/help/api-docs/other#urlencode).
`from`      | string | [ID do remetente](/br/help/api-docs/other#glossary-sender-id).<br>Para usar seu próprio ID de remetente, ele deve primeiro ser [registrado](/br/help/sender-id/sender-id).<br>Se o ID do remetente não for especificado, será usado o ID de remetente padrão selecionado em sua conta.<br>Se você não tiver IDs de remetente registrados ou se não for possível enviar com o ID de remetente especificado, um dos [IDs de remetente compartilhados do serviço](/br/help/api-docs/other#glossary-shared-senderid) será usado, se possível.<br>Para mais detalhes sobre IDs de remetente, consulte a seção [“IDs de remetente”](/br/help/api-docs/other#glossary-sender-id).
`params`    | array  | Parâmetros adicionais (veja a tabela [Parâmetros Adicionais](#send-sms-message-params)).


#### <span data-anchor="send-sms-message-params">Parâmetros Adicionais</span>

Parâmetro               | Tipo     | Descrição
-----------------------|---------|-------------
`params[name]`         | string  | Nome da campanha.
`params[deferredToTs]` | string  | Data e hora do envio diferido da mensagem SMS.<br>Você pode definir o início do envio para não antes de uma hora e não depois de 14 dias.<br>Formato: `AAAA-MM-DD HH:MM:SS`.
`params[shortenLinks]` | integer | Flag indicando a necessidade de aplicar a função de encurtamento de links a todos os links no texto do SMS. Padrão: 0 (desativado). Defina como **1** para ativar.
`params[validity]`     | integer | Tempo máximo de espera para a entrega da mensagem se o destinatário não puder recebê-la imediatamente.<br>Por exemplo, se o telefone do destinatário estiver desligado ou fora da área de cobertura.<br>Especificado em minutos a partir do momento do envio: de 60 minutos (1 hora) a 1440 minutos (24 horas).


#### Resposta do servidor
Em caso de envio bem-sucedido da mensagem, a resposta contém um array com os seguintes campos:

Campo               | Tipo     | Descrição
-------------------|---------|-------------
campaignId         | integer | ID da campanha SMS criada.
messageId          | integer | ID da mensagem SMS criada.
status             | integer | Status do envio da campanha SMS.<br>**1** – campanha aguardando moderação;<br>**2** – campanha enviada sem moderação.


#### Códigos de resposta da API

Código | Descrição
----|----
{{API_OK}}         | Mensagem SMS enviada com sucesso.
{{API_VALIDATION}} | Se algum parâmetro for especificado incorretamente.






