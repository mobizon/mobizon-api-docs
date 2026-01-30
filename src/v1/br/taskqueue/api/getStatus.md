### Obter o progresso de execução de uma tarefa em segundo plano
{{EXAMPLE_QUERY}}

Este método permite obter o progresso de execução de uma tarefa em segundo plano por seu [ID](/br/help/api-docs/other#glossary-id).
Nosso serviço utiliza tarefas em segundo plano para que seus processos não precisem esperar pela conclusão de uma requisição longa em casos como: 
<ul>
<li>Carregamento de destinatários em uma campanha de SMS;</li>
<li>Importação de contatos para a agenda de contatos;</li>
<li>Criação de relatórios sobre campanhas e mensagens.</li>
</ul>Esta requisição deve ser enviada no máximo uma vez por segundo. 


#### Parâmetros da requisição

 Parâmetro   | Tipo     | Descrição
------------|---------|-----------
`id`        | integer | Identificador da tarefa em segundo plano.

#### Resposta do servidor
Array de dados:

Campo     | Tipo     | Descrição
---------|---------|-------------
progress | integer | Progresso da execução da tarefa em uma escala de 0 a 100%.
status   | integer | Código de status da tarefa:<br>**0** – aguardando o início da execução;<br>**1** – em processo;<br>**2** – concluída;<br>**3** – rejeitada.

#### Códigos de resposta da API
Código | Descrição
----|----
{{API_OK}} | Progresso da execução da tarefa em segundo plano obtido com sucesso.
{{API_RECORD_NOT_FOUND}} | Se a tarefa com o identificador especificado não for encontrada.






