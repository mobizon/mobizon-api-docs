### Глоссарий

<span data-anchor="glossary-id">`id`</span> - это уникальный идентификатор, который позволяет однозначно определить искомый объект - кампанию, группу и т.д.

<span data-anchor="glossary-contact-card">`Контактная карта`</span> – запись в Контактной книге, содержащая реальные данные клиента, такие как: ФИО, email, дату рождения и другую информацию. 
Обязательно должна содержать номер телефона.

<span data-anchor="glossary-sender-id">`Подпись отправителя (Sender ID, альфанумерическое имя)`</span> - отображается в качестве отправителя SMS на телефоне получателя вместо номера телефона.  
К подписи отправителя существует [ряд требований](../../sender-id/sender-id).

<span data-anchor="glossary-shared-senderid">`Общая подпись (отправителя SMS)`</span> - одна из подписей сервиса, используемая при отправке сообщения, в случае, если у пользователя нет подписей или выбранная подпись недоступна для отправки на указанный номер телефона. 

<span data-anchor="glossary-recipient">`Получатель (абонент)`</span> – пользователь услуг мобильной связи, на номер которого происходит отправка SMS-сообщения.

<span data-anchor="glossary-shortlink">`Короткая ссылка`</span> - это сокращенный (альтернативный) URL-адрес для доступа к WEB-странице. 

Использование короткой ссылки вместо обычной минимизирует ненамеренное искажение URL - короткую ссылку легче запомнить, скопировать или ввести вручную. 

Благодаря этой функции вы можете отслеживать количество переходов по каждой короткой ссылке, созданной в нашем сервисе.

Статистические данные предоставляются в удобной форме: можно увидеть количество кликов за последние 2 часа, день, неделю, 30 дней или все время. (Ссылка на раздел Короткие Ссылки)

Также короткие ссылки удобно использовать в SMS. Они позволяют уменьшить стоимость отправки за счет меньшего количества символов в сообщении. 

При использовании короткой ссылки, созданной в нашем сервисе, есть возможность задействовать функцию отслеживания получателей, открывших ссылку.

<span data-anchor="glossary-dlr">`Отчет о доставке сообщения (DLR)`</span> - информация от оператора связи о статусе доставки SMS-сообщения получателю. 

<span data-anchor="glossary-personal-link">`Персональная ссылка (ссылка отслеживания получателя)`</span> - специальная короткая ссылка, созданная при помощи нашего сервиса и позволяющая отследить кто именно из получателей SMS-рассылки перешел по ней. Ссылка уникальна для каждого отдельного получателя SMS. 

<span data-anchor="glossary-recipienttracking">`Функция отслеживания получателей`</span> - это инструмент сбора статистики о получателях, которые перешли по короткой ссылке, размещенной в сообщении. 
Это удобное и эффективное средство для аналитики целевой аудитории и оценки эффективности SMS-кампании.

Функция доступна для SMS-сообщений, содержащих гиперссылки. Чтобы активировать функцию, необходимо в Форме Отправки SMS нажать кнопку замены обычной ссылки на короткую и проверить, стоит ли галочка напротив опции “отслеживать получателей”.  

<span data-anchor="glossary-form">`Форма`</span> - удобный инструмент для сбора данных о клиентах, проведения электронных опросов, формирования базы номеров для рассылки и множества других задач. 

С помощью Форм ваши клиенты могут подписаться на SMS-рассылку, новости, акции и т.д.

Благодаря гибкому и интуитивно понятному конструктору полей вы можете легко создать Форму, максимально эффективную для ваших задач.

Кроме того, вы можете настроить оформление Формы: выбрать цвет текста, кнопок, фона и т.д. 
Подробнее о создании Форм вы можете узнать в разделе [“Формы”](../../forms/how-to-create-form).  

<span data-anchor="glossary-sms-campaign">`SMS Кампания`</span> - позволяет сгруппировать множество получателей одного SMS и проанализировать результаты SMS-рассылки. 

<span data-anchor="glossary-single-campaign">`Одиночная кампания`</span> - отправка сообщения на один номер.

<span data-anchor="glossary-mass-campaign">`Массовая кампания`</span> - отправка сообщения на два и больше номеров.

<span data-anchor="glossary-functional-campaign">`Функциональная (служебная) кампания`</span> - в нее входят функциональные или, другими словами, служебные сообщения системы, например, сообщения с кодом подтверждения номера из форм.

<span data-anchor="glossary-template">`Шаблонная кампания`</span> - это тип SMS-кампании, в которой используется особая форма сообщения, содержащая плейсхолдеры, которые заменяются на персональный для каждого получателя текст.

**Пример шаблона**

В фигурных скобках {} размещены плейсхолдеры.  

Шаблонный текст с плейсхолдерами      | Текст, который будет получен клиентом    
-----------------|---------
Здравствуйте, {name}! Ваш баланс на {date} составляет {balance}{currency}.     | Здравствуйте, Иван! Ваш баланс на 12.09.2019 составляет 15.50 грн. array  
{name}, машина подъехала ({carNumber}). Телефон водителя: {driverPhone}.    | Алексей, машина подъехала (АА 4444). Телефон водителя: 099 999 99 99.
Напоминаем, что вы записаны на прием в {place}. Дата приема: {date}.    | Напоминаем, что вы записаны на прием в Клинике. Дата приема: 11.11.2019.  






