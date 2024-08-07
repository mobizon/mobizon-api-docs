### Қысқа сілтеменің деректерін өңдеу
{{EXAMPLE_QUERY}}

Бұл әдіс жасалған қысқа сілтеменің параметрлерін өзгертуге мүмкіндік береді.

#### Сұрау параметрлері

 Параметр  | Түрі     | Сипаттамасы
-----------|---------|-----------
`id`       | integer | Сілтеменің идентификаторы.
`data`     | integer | Өңделетін сілтеме параметрлері [Сілтеме параметрлері](#update-data) кестесінде көрсетілген.

#### <span data-anchor="update-data">Сілтеме параметрлері</span>

 Параметр             | Түрі     | Сипаттамасы
----------------------|---------|-----------
`data[status]`        | integer | Қысқа сілтеменің статусы:<br>**0** – сілтеме белсенді емес;<br>**1** – сілтеме белсенді.
`data[expirationDate]`| date    | Қысқа сілтеменің жарамдылық мерзімі.<br>Формат: `ЖЖЖЖ-АА-КК`.<br>Егер мән берілмесе – сілтеменің мерзімі шектеусіз болады.
`data[comment]`       | string  | Сілтемеге түсініктеме.<br>Түсініктеменің максималды ұзындығы – 255 символ.

#### Сервердің жауабы

`string` – Қысқа сілтеме.

#### API жауап кодтары

Код                      | Сипаттамасы
-------------------------|----
{{API_OK}}               | Параметрлер сәтті өзгертілді.
{{API_VALIDATION}}       | Егер қандай да бір параметрлерде қате мәндер болса.
{{API_RECORD_NOT_FOUND}} | Егер көрсетілген идентификаторы бар сілтеме табылмаса.
