### Códigos de resposta da API

Cada resposta a uma requisição à API retorna um array composto por [três campos](/br/help/api-docs/sms-api#server-response-format), um dos quais é o `code`. Este campo contém o status do processamento da requisição e pode servir como guia para as próximas ações por parte do aplicativo cliente. A tabela seguinte apresenta os códigos da API e seus significados:

Código                                         | Descrição
--------------------------------------------|----------------
<span data-anchor="apiCode-0">0</span>     | Operação concluída com sucesso.
<span data-anchor="apiCode-1">1</span>     | Erro de validação dos dados transmitidos durante a criação ou atualização de alguma entidade. O campo `data` apresenta informações sobre quais campos foram preenchidos incorretamente. Deve-se corrigir os erros e repetir a requisição com os novos dados.
<span data-anchor="apiCode-2">2</span>     | O registro especificado não foi encontrado. Provavelmente foi excluído, o ID do registro está incorreto ou o usuário que tenta acessar este registro não possui os direitos de acesso correspondentes.
<span data-anchor="apiCode-3">3</span>     | Erro de aplicativo não identificado. Entre em contato com o suporte e informe os detalhes da requisição na qual o erro foi recebido.
<span data-anchor="apiCode-4">4</span>     | O parâmetro `module` foi especificado incorretamente. Verifique a ortografia do parâmetro na [documentação da API](/br/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-5">5</span>     | O parâmetro `method` foi especificado incorretamente. Verifique a ortografia do parâmetro na [documentação da API](/br/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-6">6</span>     | O parâmetro `format` foi especificado incorretamente. Verifique a ortografia do parâmetro na [documentação da API](/br/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-8">8</span>     | Erro de login no sistema. Ocorre quando:<ul><li>Os dados de login foram informados incorretamente;</li><li>Durante o uso do sistema, a sessão do usuário expirou ou foi encerrada forçadamente pelo servidor.</li></ul> Informações mais detalhadas podem ser vistas no campo `message`.
<span data-anchor="apiCode-9">9</span>     | Erro de acesso ao método de API especificado.
<span data-anchor="apiCode-10">10</span>   | Erro durante o salvamento de dados no servidor diretamente no processo de execução desta operação. Normalmente, este erro está relacionado ao acesso simultâneo aos dados por vários clientes ou à alteração das condições de salvamento dos dados durante o processo de salvamento.
<span data-anchor="apiCode-11">11</span>   | Alguns parâmetros obrigatórios estão ausentes na requisição. Verifique a ortografia dos parâmetros na [documentação da API](/br/help/api-docs/sms-api#required-api-query-parameters) e complete a requisição com os parâmetros necessários.
<span data-anchor="apiCode-12">12</span>   | O parâmetro de entrada da requisição não satisfaz as condições ou restrições estabelecidas. Este código de erro ocorre quando, ao executar uma requisição com parâmetros, algum parâmetro viola as restrições. É semelhante ao erro de validação de atributos, mas pode ser recebido em requisições que não realizam a criação ou alteração de dados.
<span data-anchor="apiCode-13">13</span>   | Tentativa de fazer uma requisição a um servidor de API que não atende a este usuário. Se receber este código, o domínio correto pode ser obtido no campo `data`.
<span data-anchor="apiCode-14">14</span>   | Este erro ocorre se a conta do usuário estiver bloqueada ou excluída.
<span data-anchor="apiCode-15">15</span>   | Erro durante a execução de alguma operação não relacionada à atualização de dados. Os detalhes deste erro estão indicados no campo `message` da resposta da API.
<span data-anchor="apiCode-30">30</span>   | Erro de excedente do limite de velocidade de requisições permitido. Este erro ocorre em chamadas excessivamente frequentes ao mesmo método de API durante um determinado período de tempo. Em caso de erro, deve-se reduzir a frequência das requisições.
<span data-anchor="apiCode-98">98</span>   | Operação realizada parcialmente, apenas com parte dos dados. Normalmente, este código é retornado em operações em massa, durante as quais alguns elementos não foram processados devido a erros ou restrições, mas parte dos elementos foi processada. Se receber este código, é possível obter informações sobre quais elementos foram processados e quais não, e com quais erros, acessando o conteúdo do campo `data`.
<span data-anchor="apiCode-99">99</span>   | Nenhum dos elementos da operação em massa foi processado. Informações detalhadas sobre os erros em cada elemento específico podem ser obtidas no campo `data`, e uma descrição geral do erro no campo `message`.
<span data-anchor="apiCode-100">100</span> | Este código não é um erro e significa que a operação foi enviada para execução em segundo plano. Neste caso, o campo `data` contém o ID da operação em segundo plano, cujo processo e término podem ser monitorados através da API [TaskQueue/GetStatus](/br/help/api-docs/taskqueue#GetStatus).
<span data-anchor="apiCode-999">999</span> | Erro geral do serviço. Os detalhes podem ser obtidos no campo `message`.






