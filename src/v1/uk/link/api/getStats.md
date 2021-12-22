### Отримання статистики кліків по посиланнях
{{EXAMPLE_QUERY}}

Даний метод призначений для отримання статистики кліків для одного або декількох коротких посилань за їх [ID](/uk/help/api-docs/other#glossary-id).

Дані можуть бути згруповані по місяцях, днях, годинах, хвилинах.

#### Параметри запиту

 Параметр          | Тип     | Опис
-------------------|---------|-------------
`ids`              | array   | Ідентифікатори посилань. <br>Максимальна кількість [ID](/uk/help/api-docs/other#glossary-id) в запиті – 5.<br>Синтаксис параметра: `ids[]` для кожного ідентифікатора.
`type`             | string  | Тип запитуваної статистики. <br> Дозволяє отримати дані в різні часові проміжки:<br>**monthly** – кількість кліків по місяцях. Максимальний інтервал для отримання статистики – 3 роки;<br>**daily** – кількість кліків по днях. Максимальний інтервал для отримання статистики – 90 днів;<br>**hourly** – кількість кліків по годинах. Максимальний інтервал для отримання статистики – 1 тиждень;<br>**minute** – кількість кліків по хвилинах. Максимальний інтервал для отримання статистики – 3 години.
`criteria`         | array   | Критерії пошуку (Див. таблицю [Критерії пошуку](#get-stats-criteria)).

#### <span data-anchor="get-stats-criteria">Критерії пошуку</span>

Пошук статистичних даних формується виходячи із зазначених дати та часу.

 Параметр            | Тип     | Опис
---------------------|---------|-------------
`criteria[dateFrom]` | string  | Витягувати статистику, починаючи з зазначеної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`criteria[dateTo]`   | string  | Витягувати статистику до зазначеної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.

**Важливо**: якщо критерії пошуку `dateFrom` і `dateTo` не встановлені, то статистика поля `type` буде витягатися за останній максимально можливий інтервал.

Якщо встановлений тільки один критерій `dateFrom` або проміжок часу між `dateFrom` і `dateTo` перевищує максимально допустимий інтервал, то статистика буде вилучатись за максимально допустимий інтервал, починаючи з дати `dateFrom`. 

Якщо встановлений тільки критерій `dateTo`, то статистика буде вилучатись за максимально можливий період до дати `dateTo`.

#### Відповідь сервера
Масив даних:

Поле               | Тип     | Опис
-------------------|---------|-------------
`items`            | array   | Дані статистики.
`totals`           | string  | Загальна кількість кліків за запитуваний період.


#### Коди відповідей API

Код | Опис
----|----
{{API_OK}}  | Статистика успішно отримана.
{{API_INCORRECT_PARAM}}  | Якщо вказано більше 5 ідентифікаторів посилань або невірно вказано тип статистики.