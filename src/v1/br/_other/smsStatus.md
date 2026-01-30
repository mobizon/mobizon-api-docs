### Lista de status de mensagens SMS possíveis

Status   | Final | Descrição
---------|---------------|------------------------------------
`NEW`    |      não      | Mensagem nova, ainda não foi enviada.
`ENQUEUD`|      não      | Colocada na fila para envio.
`ACCEPTD`|      não      | Enviada pelo sistema e aceita pela operadora para encaminhamento posterior ao destinatário.
`UNDELIV`|      sim       | Não entregue ao destinatário.
`REJECTD`|      sim       | Rejeitada pela operadora por um dos muitos motivos – número do destinatário incorreto, texto proibido, ID do remetente não registrado, etc.
`PDLIVRD`|      não      | Nem todos os segmentos da mensagem foram entregues ao destinatário **(este status pode ser apenas para mensagens, não para segmentos)**. Algumas operadoras retornam o relatório apenas para o primeiro segmento entregue, portanto, tal mensagem, após expirar o tempo de vida, passará para o status definido para o primeiro segmento.
`DELIVRD`|      sim       | Entregue totalmente ao destinatário.
`EXPIRED`|      sim       | A entrega falhou porque o tempo de espera expirou, período durante o qual a mensagem não foi entregue ao destinatário. Geralmente, a entrega é impossível se o telefone do destinatário estiver desligado, fora da área de cobertura ou se a memória do dispositivo estiver cheia. O tempo máximo de espera para entrega é de 24 horas a partir do momento do envio.
`DELETED`|      sim       | Excluída devido a alguma restrição por parte da operadora de telefonia e não entregue ao destinatário.






