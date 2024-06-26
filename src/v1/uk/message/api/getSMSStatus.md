### Отримання звіту про статус доставки SMS повідомлення
{{EXAMPLE_QUERY}}

Даний метод дозволяє отримати дані про поточний статус доставки одного або декількох SMS-повідомлень.

Незалежно від типу вхідного параметра, результат, що повертається, завжди представлений у вигляді масиву. 

Якщо передавати неіснуючі ідентифікатори повідомлень або ті, які не належать користувачеві, то результат не буде містити інформації про ці повідомлення.

#### Параметри запиту

 Параметр   | Тип    | Опис
------------|--------|-----------
`ids`       | array string | Ідентифікатор (и) повідомлення (ь). <br> Масив або рядок ідентифікаторів, розділених комами. <br> Максимальна кількість ідентифікаторів в одному запиті – 100.

#### Відповідь сервера

Поле           | Тип     | Опис
---------------|---------|-------------
`id`             | integer | Ідентифікатор повідомлення.
`status`         | string  | Статус повідомлення.<br>Див. таблицю [Список можливих статусів повідомлень](/uk/help/api-docs/other#SmsStatus).
`segNum`         | integer | Кількість сегментів в даному повідомленні.
`startSendTs`    | string  | Час початку відправки повідомлення.<br>Формат: `РРРР-ММ-ДД ГГ-ХХ-СС`.<br>Якщо повідомлення ще не відправлено, значення поля буде NULL.
`statusUpdateTs` | string  | Час останнього оновлення статусу повідомлення.<br>Формат: `РРРР-ММ-ДД ГГ-ХХ-СС`.<br>Якщо повідомлення ще не відправлено, значення поля буде NULL.

#### Коди відповідей API
Код | Опис
----|----
{{API_OK}} | Звіт про статус доставки успішно отримано.
{{API_RECORD_NOT_FOUND}} | Якщо не вказано жодного ідентифікатора повідомлень.
{{API_INCORRECT_PARAM}}  | Якщо вказано більше 100 ідентифікаторів повідомлень.
