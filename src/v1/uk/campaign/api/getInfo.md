### Отримання статистичних даних кампанії
{{EXAMPLE_QUERY}}

Даний метод дозволяє отримати основні та статистичні дані кампанії за її [ID](/uk/help/api-docs/other#glossary-id).

Статистика формується за допомогою різних лічильників, які відображаються в полі `counters`.

**ВАЖЛИВО!** 

Через технічні особливості підрахунку вартості кампанії, дані про можливу вартість кампанії вказані на момент додавання одержувачів і не змінюються з перебігом часу. 

Зміни можуть відбутися тільки при повторному завантаженні одержувачів або при редагуванні даних кампанії (в разі редагування даних всі одержувачі та розрахунки скидаються – потрібне повторне завантаження).

#### Параметри запиту

 Параметр                  | Тип     | Опис
---------------------------|---------|-----------
`id`                       | integer | Ідентифікатор кампанії.
`getFilledTplCampaignText` | integer | Формат даних, які повертаються:<br>**0** – текст кампанії з плейсхолдерами;<br>**1** – повертати текст шаблонної кампанії, заповнений реальними даними одержувача (за замовчуванням).

#### Відповідь сервера

Поле           | Тип     | Опис
---------------|---------|-----------
`id`                       | integer | Ідентифікатор кампанії.
`moderationStatus`         | string  | Поточний статус модерації:<br>**MODERATION** – кампанія перебуває на модерації;<br>**DECLINED** – кампанія відхилена модератором;<br>**READY_FOR_SEND** – кампанія дозволена модератором;<br>**AUTO_READY_FOR_SEND** – кампанія відправлена без модерації.
`commonStatus`             | string  | Поточний статус кампанії:<br>**MODERATION** – кампанія проходить модерацію;<br>**DECLINED** – кампанія відхилена модератором (причина відхилення вказана в полі `globalComment`);<br>**READY_FOR_SEND** – кампанія готова до відправки, але відправка ще не почалася;<br>**RUNNING** – кампанія в процесі відправки;<br>**SENT** – кампанія повністю відправлена, але ще не всі повідомлення отримали звіт про доставку від оператора зв'язку;<br>**DONE** – кампанія повністю оброблена, всі остаточні звіти про доставку отримані.
`groupsList`               | array   | Список контактних груп, включених в кампанію. <br> Для кожної групи містить:<br>**id** – номер групи;<br>**name** – ім'я групи;<br>**cardsCnt** – кількість контактів в групі, доступних для відправки повідомлення. <br> Якщо групи не використовувалися в кампанії, це поле буде порожнім.
`type`                     | integer | Тип кампанії:<br>**1** – Одиночне повідомлення (відправка на один номер);<br>**2** – Масова розсилка;<br>**3** – Шаблонна кампанія;<br>**7** – Функціональна (службова) кампанія.
`msgType`                  | string  | Тип повідомлень кампанії. <br> На даний момент підтримується тільки тип «SMS».
`rateLimit`                | integer | Обмеження кількості повідомлень, відправлених за період часу, вказаний в полі `ratePeriod`.
`ratePeriod`               | integer | Період, протягом якого за відрізок часу буде відправлено кількість SMS, вказану в полі `rateLimit`.
`sendStatus`               | string  | Статус відправки кампанії:<br>**SENT** – кампанія відправлена;<br>**DONE** – кампанія завершена.
`isDeleted`                | integer | Прапор, який означає, що кампанія видалена:<br>**0** – кампанія доступна;<br>**1**– кампанія видалена.
 `deferredToTs`            | string  | Дата і час відкладеної відправки кампанії.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
 `createTs`                | string  | Дата і час створення кампанії.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
 `startSendTs`             | string  | Дата і час фактичного початку відправки кампанії. <br> Якщо відправка не розпочата, то дане поле містить NULL.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
 `endSendTs`               | string  | Дата і час закінчення відправки всіх повідомлень кампанії.<br>Якщо відправка повідомлень не була завершена – дане поле містить NULL.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
 `name`                    | string  | Назва кампанії.
 `from`                    | string  | [Підпис відправника](/uk/help/api-docs/other#glossary-sender-id), який було обрано для відправки кампанії.
 `text`                    | string  | Повний текст повідомлення або шаблонний текст з плейсхолдерами.
 `validity`                | integer | Максимальний час очікування доставки повідомлення, якщо абонент не прийняв його відразу, в хвилинах з моменту відправки.
 `mclass`                  | integer | Клас повідомлення, що відправляється:<br>**0** – повідомлення відображаються спливаючих вікном і ніде не зберігаються (flashSMS);<br>**1** – повідомлення зберігаються в папку Вхідних повідомлень телефону. 
 `trackShortLinkRecipients`| integer | Чи використана функція відстеження одержувачів:<br>**0** – функція не використана;<br>**1** – функція використана.
 `groups`                  | string  | Ідентифікатори [контактних груп](/uk/help/contact-book/contact-groups), які використовуються в кампанії, розділені комами.
 `globalComment`           | string  | Коментар модератора, в разі, якщо кампанія відхилена.
 `creationWay`             | integer | Спосіб створення кампанії:<br>**1** – за допомогою Інтернет-браузера;<br>**5** – [функціональна (службова) кампанія](/uk/help/api-docs/other#glossary-functional-campaign).
 `counters`                | array   | Різні лічильники кампанії, описані в таблиці [Поля об'єкта `counters`](#data-counters).

##### <span data-anchor="data-counters">Поля об'єкта `counters`</span>
 
Поле                 | Тип      | Опис
---------------------|----------|-----------
`updateTs`           | datetime | Час останнього оновлення лічильників. <br> Для зниження навантаження на систему, оновлення лічильників може відбуватися з затримкою.<br>Формат: `РРРР-ММ-ДД ГГ:ХХ:СС`.
`totalNewSegNum`     | integer  | Загальна кількість сегментів зі статусом `NEW`.
`totalAcceptdSegNum` | integer  | Загальна кількість сегментів зі статусом `ACCEPTD`.
`totalDelivrdSegNum` | integer  | Загальна кількість сегментів зі статусом `DELIVRD`.
`totalRejectdSegNum` | integer  | Загальна кількість сегментів зі статусом `REJECTD`.
`totalExpiredSegNum` | integer  | Загальна кількість сегментів зі статусом `EXPIRED`.
`totalUndelivSegNum` | integer  | Загальна кількість сегментів зі статусом `UNDELIV`.
`totalDeletedSegNum` | integer  | Загальна кількість сегментів зі статусом `DELETED`.
`totalUnknownSegNum` | integer  | Загальна кількість сегментів зі статусом `UNKNOWN`.
`totalPdlivrdSegNum` | integer  | Загальна кількість сегментів зі статусом `PDLIVRD`.
`totalSegNum`        | integer  | Загальна кількість сегментів в кампанії. Оновлюється при додаванні одержувачів.
`totalNewMsgNum`     | integer  | Загальна кількість сегментів зі статусом `NEW`.
`totalAcceptdMsgNum` | integer  | Загальна кількість сегментів зі статусом `ACCEPTD`.
`totalDelivrdMsgNum` | integer  | Загальна кількість сегментів зі статусом `DELIVRD`.
`totalRejectdMsgNum` | integer  | Загальна кількість сегментів зі статусом `REJECTD`.
`totalExpiredMsgNum` | integer  | Загальна кількість сегментів зі статусом `EXPIRED`.
`totalUndelivMsgNum` | integer  | Загальна кількість сегментів зі статусом `UNDELIV`.
`totalDeletedMsgNum` | integer  | Загальна кількість сегментів зі статусом `DELETED`.
`totalUnknownMsgNum` | integer  | Загальна кількість сегментів зі статусом `UNKNOWN`.
`totalPdlivrdMsgNum` | integer  | Загальна кількість сегментів зі статусом `PDLIVRD`.
`totalMsgNum`        | integer  | Загальна кількість повідомлень (не сегментів). Оновлюється при обробці (перед відправкою) повідомлень/сегментів кампанії.
`totalNewMsgCost`    | float    | Загальна вартість всіх сегментів зі статусом `NEW`.
`totalAcceptdMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `ACCEPTD`.
`totalDelivrdMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `DELIVRD`.
`totalRejectdMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `REJECTD`.
`totalExpiredMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `EXPIRED`.
`totalUndelivMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `UNDELIV`.
`totalDeletedMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `DELETED`.
`totalUnknownMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `UNKNOWN`.
`totalPdlivrdMsgCost`| float    | Загальна вартість всіх сегментів зі статусом `PDLIVRD`.
`totalCost`          | float    | Загальна вартість кампанії.
`recipientsRejected` | integer  | Кількість відхилених одержувачів (які не включені до кампанії). Оновлюється при додаванні одержувачів.