### Створення короткого посилання
{{EXAMPLE_QUERY}}

Цей метод призначений для створення коротких посилань.
#### Параметри запиту

**data** `array` – Параметри посилання

 Параметр             | Тип     | Опис
----------------------|---------|-----------
`data[fullLink]`      | string  | Повне посилання.<br>Посилання, яке необхідно скоротити в форматі правильного URL.<br>Наприклад: `https://help.mobizon.com/api-docs/sms-api?utm_campaign=docs&utm_source=help&utm_medium=test#server-response-format` або `www.mobizon.com` 
`data[status]`        | integer | Статус короткого посилання:<br>**0** – посилання неактивне;<br>**1** – посилання активне (встановлено за замовчуванням).
`data[expirationDate]`| date    | Дата закінчення дії посилання.<br>Посилання буде діяти до кінця доби зазначеного дня в часовому поясі користувача.<br>За замовчуванням строк дії посилання не обмежений.<br>Формат: `РРРР-ММ-ДД`.
`data[comment]`       | string  | Коментар до посилання.<br>Завдяки цьому полю можна легко знайти коротке посилання серед інших.<br>Наприклад: «Знижки на Чорну П’ятницю» або «Нагадування про негативний баланс».<br>Максимальна довжина коментаря – 255 символів.

#### Відповідь сервера
`array`: Дані створеного короткого посилання

Поле        | Тип     | Опис
------------|---------|-------------
`id`        | integer | Ідентифікатор посилання.
`code`      | string  | Код короткого посилання.
`shortLink` | string  | Коротке посилання.

#### Коди відповідей API

Код | Опис
----|----
{{API_OK}}         | Коротке посилання успішно створене.
{{API_VALIDATION}} | Якщо які-небудь параметри містять невірні значення.
