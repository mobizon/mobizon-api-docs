### Видалення кампанії
{{EXAMPLE_QUERY}}

Цей метод дозволяє видалити кампанію за її [ID](/help/api-docs/other#glossary-id).
<br>Кампанія може бути видалена, якщо її відправка ще не почалася. 
<br>Якщо кампанія відкладена: відкладена кампанія може бути видалена за умови, що до початку відправки залишилося не менше 5 хвилин.

#### Параметри запиту

 Параметр               | Тип     | Опис
------------------------|---------|-----------
`id`                    | integer | Ідентифікатор кампанії.




#### Коди відповідей API

Код | Опис
----|----
{{API_OK}}               | Кампанія успішно видалена.
{{API_RECORD_NOT_FOUND}} | Якщо кампанія з вказаним ідентифікатором не знайдена.
{{API_DATA_UPDATE}}      | Якщо кампанія з вказаним ідентифікатором не може бути видалена.
