### Редагування даних короткого посилання
{{EXAMPLE_QUERY}}

Даний метод дозволяє змінити параметри створеного короткого посилання.

#### Параметри запиту

 Параметр  | Тип     | Опис
-----------|---------|-----------
`id`       | integer | Ідентифікатор посилання.
`data`     | integer | Редаговані параметри посилання вказані в таблиці [Параметри посилання](#update-data).

#### <span data-anchor="update-data">Параметри посилання/span>

 Параметр             | Тип     | Опис
----------------------|---------|-----------
`data[status]`        | integer | Статус короткого посилання:<br>**0** – посилання неактивне;<br>**1** – посилання активне.
`data[expirationDate]`| date    | Дата закінчення дії короткого посилання.<br>Формат: `РРРР-ММ-ДД`.<br>Якщо значення не передане – термін дії посилання буде необмежений.
`data[comment]`       | string  | Коментар до посилання. <br> Максимальна довжина коментаря – 255 символів.

#### Відповідь сервера

`string` – Коротке посилання.

#### Коди відповідей API

Код                      | Опис
-------------------------|----
{{API_OK}}               | Параметри успішно змінені.
{{API_VALIDATION}}       | Якщо будь-які параметри містять невірні значення.
{{API_RECORD_NOT_FOUND}} | Якщо посилання з зазначеним ідентифікатором не знайдено.

