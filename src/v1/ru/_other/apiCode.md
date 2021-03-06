### Коды ответов API

Код                                         | Тип     | Описание
--------------------------------------------|---------|----------------
<span data-anchor="api-code-0">0</span>     | integer | Операция завершена успешно.
<span data-anchor="api-code-1">1</span>     | integer | Ошибка валидации передаваемых данных во время создания или обновления какой-либо сущности. В поле data представлена информация о том, какие поля заполнены неверно. Следует исправить ошибки и повторить запрос с новыми данными.
<span data-anchor="api-code-2">2</span>     | integer | Указанная запись не найдена. Скорее всего она была удалена, ID записи указан неверно или у пользователя, пытающегося получить доступ к этой записи, нет соответствующих прав доступа к этой записи.
<span data-anchor="api-code-3">3</span>     | integer | Неопознанная ошибка приложения. Обратитесь в службу поддержки и сообщите детали запроса, при котором она была получена.
<span data-anchor="api-code-4">4</span>     | integer | Неверно указан параметр module. Проверьте правильность написания параметра в документации к API.
<span data-anchor="api-code-5">5</span>     | integer | Неверно указан параметр method. Проверьте правильность написания параметра в документации к API.
<span data-anchor="api-code-6">6</span>     | integer | Неверно указан параметр format. Проверьте правильность написания параметра в документации к API.
<span data-anchor="api-code-8">8</span>     | integer | Ошибка входа в систему. Ошибка возникает в случаях: 1. Неправильно указанных данных для входа. 2. Когда во время работы с системой сессия пользователя истекла или была принудительно закрыта сервером. Более подробную информацию можно увидеть в поле message.
<span data-anchor="api-code-9">9</span>     | integer | Ошибка доступа к указанному методу
<span data-anchor="api-code-10">10</span>   | integer | Ошибка во время сохранения данных на сервере непосредственно в процессе выполнения данной операции. Обычно эта ошибка связана с одновременным доступом к данным из нескольких клиентов или изменением условий сохранения данных в процессе их сохранения.
<span data-anchor="api-code-11">11</span>   | integer | Некоторые обязательные параметры отсутствуют в запросе. Проверьте правильность написания параметров в документации к API и дополните запрос необходимыми параметрами.
<span data-anchor="api-code-12">12</span>   | integer | Входной параметр запроса не удовлетворяет установленным условиям или ограничениям. Данный код ошибки возникает в случаях, когда при выполнении запроса с параметрами какой-либо параметр нарушает ограничения. Похоже на ошибку валидации атрибутов, но может быть получено в запросах, которые не производят создание или изменение данных.
<span data-anchor="api-code-13">13</span>   | integer | Попытка сделать запрос к серверу апи, который не обслуживает данного пользователя. В случае получения этого кода правильный домен можно получить в поле data
<span data-anchor="api-code-14">14</span>   | integer | Данная ошибка возникает в случае если аккаунт пользователя заблокирован или удален
<span data-anchor="api-code-15">15</span>   | integer | Ошибка во время выполнения какой-либо операции, не связанной с обновлением данных. Детали данной ошибки указаны в поле message ответа API.
<span data-anchor="api-code-30">30</span>   | integer | Ошибка превышения допустимого лимита операций в промежуток времени. Данная ошибка возникает при чрезмерно частых обращениях к одному и тому же методу API. В случае возникновения ошибки следует уменьшить частоту запросов.
<span data-anchor="api-code-98">98</span>   | integer | Операция выполнена не в полном объеме, а только с частью данных. Обычно данный код возвращается при каких либо массовых операциях, во время выполнения которых некоторые элементы не были обработаны из-за ошибок или ограничений, но часть элементов обработана. В случае получения этого кода можно получить информацию о том, какие элементы были обработаны, а какие нет и с какими ошибками, получив содержимое поля data.
<span data-anchor="api-code-99">99</span>   | integer | Ни один из элементов массовой операции не был обработан. Подробную информацию об ошибках в каждом конкретном элементе можно получить в поле data, а общее описание ошибки в поле message
<span data-anchor="api-code-100">100</span> | integer | Данный код не является ошибкой и означает, что операция была отправлена в фоновое выполнение. В этом случае поле data содержит ID фоновой операции, процесс и окончание которой можно отследить при помощи Taskqueue::GetStatus
<span data-anchor="api-code-999">999</span> | integer | Общая ошибка. Детали можно получить в поле message.
