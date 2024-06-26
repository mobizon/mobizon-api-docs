### Создание новой кампании
{{EXAMPLE_QUERY}}

Данный метод позволяет создать новую [SMS-кампанию](/ru/help/api-docs/other#glossary-sms-campaign).
После создания кампании в нее необходимо [добавить получателей](#AddRecipients), а затем [отправить](#Send).

#### Параметры запроса

**data** `array` – Параметры кампании 

 Параметр                       | Тип     | Описание
--------------------------------|---------|-----------
`data[name]`                    | string  | Название кампании.<br>Благодаря этому полю удобнее ориентироваться в создаваемых кампаниях.<br>Например: «Скидки в «Черную Пятницу» или «Напоминание об отрицательном балансе на счете».<br>Максимальная длина названия кампании – 255 символов. 
`data[text]`                    | string  | Текст SMS сообщения для отправки.<br>Для [шаблонной рассылки](/ru/help/api-docs/other#glossary-template) (data[type]=3) этот текст должен содержать переменные, которые будут заменены на значения, уникальные для каждого получателя. Переменная должна быть написана символами латиницы, цифрами и символами `«_»` ,`«-»`, и обрамлена в фигурные скобки, например: `{name}` или `{clientBalance}`.<br>[Требования к тексту SMS](/ru/help/send-sms/sms-length-and-symbols).<br>В тексте сообщения вы можете использовать [короткие ссылки](/ru/help/api-docs/other#glossary-shortlink) и [функцию отслеживания получателей](/ru/help/api-docs/other#glossary-recipienttracking), чтобы узнать кто из получателей перешел по вашей ссылке.
`data[type]`                    | integer | Тип кампании:<br>**1** – Одиночное сообщение (отправка на один номер);<br>**2** – Массовая рассылка (установлена по умолчанию);<br>**3** – Шаблонная кампания (текст сообщения может содержать плейсхолдеры, которые будут заменены на уникальный для каждого получателя текст).
`data[from]`                    | string  | [Подпись отправителя](/ru/help/api-docs/other#glossary-sender-id).<br>Для использования собственной подписи отправителя ее необходимо предварительно [зарегистрировать](/ru/help/sender-id/sender-id).<br>Если подпись не указана, будет использована подпись, установленная по умолчанию или стандартная подпись сервиса.
`data[rateLimit]`               | integer | Ограничение количества сообщений, отправленных за период времени, указанный в поле `ratePeriod`.<br>Эта опция позволяет замедлить скорость отправки большой SMS-рассылки с целью распределения нагрузки на ваш Колл-Центр.<br>Ограничение скорости отправки – не более 100 сообщений в секунду в перерасчете на посекундную отправку.<br>Сообщения отправляются через равные промежутки времени пакетами по 10 штук, исходя из указанного `rateLimit` за `ratePeriod`. Например, если указать скорость 600 и период 60, то каждую секунду будет отправляться 600/60=10 SMS.
`data[ratePeriod]`              | integer |  Период времени в секундах за который будет отправляться количество SMS, указанное в поле `rateLimit`.<br>Может быть равен:<br>**60** – 1 минута;<br>**3600** – 1 час;<br>**86400** – 1 сутки.
`data[deferredToTs]`            | string  |  Дата и время отложенной отправки кампании. <br>Можно установить начало отправки не ранее чем через час, и не позднее чем через 14 дней. <br>Формат: `ГГГГ-ММ-ДД ЧЧ:ММ:СС`. 
`data[mclass]`                  | integer |  Класс отправляемого сообщения:<br>**0** – сообщения отображаются всплывающим окном и нигде не сохраняются (flashSMS);<br>**1** – сообщения сохраняются в папку Входящих сообщений телефона (установлен по умолчанию).
`data[validity]`                | integer |  Максимальное время ожидания доставки сообщения, если получатель не может принять его сразу.<br>Например, если телефон выключен или находится за пределами действия сети.<br>Указывается в минутах с момента отправки: от **60** (1 час) до **1440** (24 часа).
`data[trackShortLinkRecipients]`| integer |  [Функция отслеживания получателей](/ru/help/api-docs/other#glossary-recipienttracking).<br>Доступна к использованию только если в тексте сообщения (в поле `data[text]`) есть [короткие ссылки](/ru/help/api-docs/other#glossary-shortlink), созданные в [нашем сервисе](/ru/help/url-shortener/how-to-shorten-url).<br>**0** – не использовать функцию (установлено по умолчанию);<br>**1** – использовать функцию.

#### Ответ сервера
`integer` – идентификатор кампании, если она успешно создана.


#### Коды ответов API

Код | Описание
----|----
{{API_OK}}         | Кампания успешно создана.
{{API_VALIDATION}} | Если какие-либо параметры содержат неверные значения.
