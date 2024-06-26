### Список возможных статусов SMS-сообщений

Статус   | Окончательный | Описание
---------|---------------|------------------------------------
`NEW`    |      нет      | Новое сообщение, еще не было отправлено.
`ENQUEUD`|      нет      | Поставлено в очередь на отправку.
`ACCEPTD`|      нет      | Отправлено из системы и принято оператором для дальнейшей пересылки получателю.
`UNDELIV`|      да       | Не доставлено получателю.
`REJECTD`|      да       | Отклонено оператором по одной из множества причин – неверный номер получателя, запрещенный текст, подпись отправителя не зарегистрирована, и т.д.
`PDLIVRD`|      нет      | Не все сегменты сообщения доставлены получателю **(этот статус может быть только у сообщений, но не у сегментов)**. Некоторые операторы возвращают отчет только о первом доставленном сегменте, поэтому такое сообщение после истечения срока жизни перейдет в статус, установленный для первого сегмента.
`DELIVRD`|      да       | Доставлено получателю полностью.
`EXPIRED`|      да       | Доставка не удалась так как истек срок ожидания, в течение которого сообщение так и не было доставлено получателю. Как правило, доставка невозможна, если телефон получателя отключен, находится вне зоны действия сети или память устройства переполнена. Максимальное время ожидания доставки - 1 сутки с момента отправки.
`DELETED`|      да       | Удалено из-за каких-либо ограничений на стороне оператора связи и не доставлено получателю.
