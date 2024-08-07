### Отримання списку кампаній
{{EXAMPLE_QUERY}}

Цей метод дозволяє отримати список створених кампаній. Пошук може бути здійснений за [ID](/help/api-docs/other#glossary-id) та іншими полями.


#### Параметри запиту

 Параметр        | Тип     | Опис
-----------------|---------|-----------
`criteria`       | array   | Критерії пошуку (див. таблицю [Критерії пошуку](#list-criteria)).
`pagination`     | array   | Параметри посторінкового виводу (див. таблицю [Параметри посторінкового виводу](#list-pagination)).
`sort`           | array   | Параметри сортування (див. таблицю [Параметри сортування](#list-sort)).


#### <span data-anchor="list-criteria">Критерії пошуку</span>
Нижче перераховані поля кампаній за якими здійснюється пошук. 
Пошук можна здійснювати як за одним, так і за кількома полями одночасно. 

 Параметр                  | Тип     | Опис
---------------------------|---------|-----------
`criteria[id]`             | integer | Пошук однієї кампанії за її [ID](/help/api-docs/other#glossary-id).
`criteria[ids]`            | array   | Пошук кількох кампаній за їх [ID](/help/api-docs/other#glossary-id).<br>Параметр повинен бути переданий у вигляді масиву або рядка ідентифікаторів, розділених комами.<br>Максимальна кількість ідентифікаторів – 100, при перевищенні цього ліміту пошук буде відбуватися за першими 100 ID зі списку.
`criteria[recipient]`      | string  | Пошук за номером телефону отримувача або його частини.<br>Наприклад:<br>**{widget:example-phone}** – знайде всі кампанії, в яких брав участь цей номер;<br>**38097** – будуть знайдені всі кампанії з номерами, що містять вказану комбінацію цифр.<br>У пошуку може брати участь тільки один номер.
`criteria[from]`           | string  | Пошук за [підписом відправника](/help/api-docs/other#glossary-sender-id), який був використаний у кампанії.
`criteria[text]`           | string  | Пошук за текстом повідомлення кампанії.<br>Здійснюється за принципом повної відповідності шуканого значення.
`criteria[status]`         | string  | Пошук за [статусом кампанії](#list-campaign-statuses).
`criteria[createTsFrom]`   | string  | Пошук кампаній, створених починаючи з вказаної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`criteria[createTsTo]`     | string  | Пошук кампаній, створених до вказаної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`criteria[sentTsFrom]`     | string  | Пошук кампаній, відправка яких відбулася починаючи з вказаної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`criteria[sentTsTo]`       | string  | Пошук кампаній, відправка яких відбулася до вказаної дати і часу.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`criteria[type]`           | integer | Пошук за типом кампанії:<br>**1** – Одноразове повідомлення (відправка на один номер);<br>**2** – Масова розсилка (встановлено за замовчуванням);<br>**3** – Шаблонна кампанія (текст повідомлення може містити плейсхолдери, які будуть замінені на унікальний для кожного отримувача текст). 
`criteria[groups]`         | string  | Пошук за ідентифікаторами [контактних груп](/help/contact-book/contact-groups), використовуваних у кампанії.<br>Параметр повинен бути переданий у вигляді масиву або рядка ідентифікаторів, розділених комами.


#### <span data-anchor="list-pagination">Параметри посторінкового виводу</span>
Ці параметри призначені для структурованого (часткового) виводу запитуваної інформації.

 Параметр                 | Тип     | Опис
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Кількість відображуваних елементів на сторінці (25, 50, 100).
`pagination[currentPage]` | integer | Поточна сторінка.<br>Нумерація сторінок починається з 0.


#### <span data-anchor="list-sort">Параметри сортування</span>
За допомогою цих параметрів можна відсортувати результати пошуку за одним з полів у порядку зростання (ASC) або спадання (DESC). 

***Наприклад:***

Сортування за датою створення кампанії у порядку зростання – `sort[createTs]=ASC`.<br>
Сортування за [ID](/help/api-docs/other#glossary-id) кампанії у порядку спадання – `sort[id]=DESC`.

 Параметр                     | Опис
------------------------------|----------
`sort[id]`                    | Сортування за [ID](/help/api-docs/other#glossary-id) кампанії.
`sort[name]`                  | Сортування за ім'ям кампанії.
`sort[from]`                  | Сортування за підписом відправника.
`sort[counters.totalMsgNum]`  | Сортування за кількістю телефонних номерів кампанії.
`sort[counters.totalCost]`    | Сортування за вартістю кампанії.
`sort[createTs]`              | Сортування за датою і часом створення кампанії.
`sort[startSendTs]`           | Сортування за датою і часом початку відправки кампанії.
`sort[endSendTs]`             | Сортування за датою і часом закінчення відправки кампанії.


#### Відповідь сервера

Містить масив з двох полів:

 Поле            | Тип     | Опис
-----------------|---------|-----------
`items`          | array   | Список знайдених кампаній.<br>Опис полів кампанії дивіться в описі методу [campaign/getInfo](#GetInfo).
`totalItemCount` | integer | Загальна кількість знайдених елементів.


##### <span data-anchor="list-campaign-statuses">Статуси кампаній</span>

Статус              | Опис
--------------------|-------------------------------
NEW                 | Кампанія створена, але користувач ще не відправив її.<br>У цьому статусі дозволено додавання отримувачів.
MODERATION          | Проходить модерацію на відповідність правилам сервісу.
DECLINED            | Відхилена модератором, оскільки не відповідає правилам сервісу або вимогам операторів, номери яких присутні в кампанії.
READY_FOR_SEND      | Кампанія готова до відправки, але відправка ще не почалася.
AUTO_READY_FOR_SEND | Немає необхідності у модерації кампанії. Кампанія буде відправлена без модерації.
NOT_YET_SENT        | Включає всі статуси, коли кампанія ще не була відправлена.<br>**Це значення використовується тільки для пошуку. У кампаній його бути не може.**
RUNNING             | Кампанія запущена, йде процес відправки оператору.
DEFERRED            | Відправка кампанії запланована на певний час.<br>**Це значення використовується тільки для пошуку. У кампаній його бути не може.**
SENT                | Кампанія повністю відправлена, але ще не всі повідомлення отримали звіт про доставку від операторів зв'язку.
DONE                | Кампанія повністю оброблена, всі остаточні звіти про доставку отримані.<br>Після встановлення цього статусу жодні лічильники кампанії не змінюються.
