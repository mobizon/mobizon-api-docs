### Сілтемелер тізімін алу
{{EXAMPLE_QUERY}}

Бұл әдіс жасалған қысқа сілтемелер тізімін алуға мүмкіндік береді. Іздеу [ID](/kk/help/api-docs/other#glossary-id) және қысқа сілтеменің өрістері бойынша жүргізілуі мүмкін.
#### Сұрау параметрлері

 Параметр        | Түрі    | Сипаттамасы
-----------------|---------|-----------
`criteria`       | array   | Іздеу критерийлері (қараңыз [Іздеу критерийлері](#list-criteria) кестесі).
`pagination`     | array   | Бет бойынша шығару параметрлері (қараңыз [Бет бойынша шығару параметрлері](#list-pagination) кестесі).
`sort`           | array   | Сұрыптау параметрлері (қараңыз [Сұрыптау параметрлері](#list-sort) кестесі).

#### <span data-anchor="list-criteria">Іздеу критерийлері</span>

Іздеу жүргізілетін қысқа сілтеме өрістері туралы ақпарат.
Іздеу үшін бір өрісті немесе өрістер жиынтығын пайдалануға болады.

 Параметр                    | Түрі    | Сипаттамасы
-----------------------------|---------|-----------
`criteria[status]`           | integer | Қысқа сілтеменің статусы бойынша іздеу:<br>**0** – сілтеме белсенді емес;<br>**1** – сілтеме белсенді.
`criteria[moderatorStatus]`  | integer | Сілтеменің модерация статусы бойынша іздеу:<br>**0** – бұғатталған;<br>**1** – рұқсат етілген.
`criteria[createTsFrom]`     | datetime | Сілтеменің жасалу күні бойынша іздеу, көрсетілген күннен бастап.<br>Формат: `ЖЖЖЖ-АА-КК`.
`criteria[createTsTo]`       | datetime | Сілтеменің жасалу күні мен уақыты бойынша іздеу, көрсетілген күн мен уақытқа дейін.<br>Формат: `ЖЖЖЖ-АА-КК СС:ММ:СС`.
`criteria[query]`            | string   | Сілтеменің әртүрлі атрибуттары бойынша іздеу.<br>Іздеу келесі бойынша жүргізілуі мүмкін:<br>Қысқа сілтеменің коды;<br>Алушыны қадағалау коды;<br>Қысқа сілтемеге түсініктеме.

#### <span data-anchor="list-pagination">Бет бойынша шығару параметрлері</span>

Бұл параметрлер сұратылған ақпаратты құрылымдық (ішінара) шығаруға арналған.

 Параметр                 | Түрі    | Сипаттамасы
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Бір бетте көрсетілетін элементтер саны (25, 50, 100).
`pagination[currentPage]` | integer | Ағымдағы бет <br>Беттердің нөмірленуі 0-ден басталады.

#### <span data-anchor="list-sort">Сұрыптау параметрлері</span>

Бұл параметрлерді пайдаланып, іздеу нәтижелерін өрістердің бірі бойынша өсу (ASC) немесе кему (DESC) тәртібімен сұрыптауға болады.

***Мысалы:***

Код қысқа сілтеменің коды бойынша өсу ретімен сұрыптау – `sort[code]=ASC`.<br>
Оригинал сілтеме бойынша кему ретімен сұрыптау – `sort[fullLink]=DESC`.

 Параметр              | Сипаттамасы
-----------------------|-----------
`sort[createTs]`       | Сілтеменің жасалу күні мен уақыты бойынша сұрыптау.<br>Формат: `ЖЖЖЖ-АА-КК СС-ММ-СС`.
`sort[expirationDate]` | Сілтеменің аяқталу мерзімі бойынша сұрыптау.<br>Формат: `ЖЖЖЖ-АА-КК`.
`sort[clickCnt]`       | Басу саны бойынша сұрыптау.
`sort[code]`           | Қысқа сілтеменің коды бойынша сұрыптау.
`sort[fullLink]`       | Оригинал сілтеме бойынша сұрыптау.

#### Сервердің жауабы

Деректер массиві:

 Өріс            | Түрі     | Сипаттамасы
-----------------|---------|-----------
`items`          | array   | Табылған сілтемелер тізімі.<br>Қысқа сілтемелер өрістерінің сипаттамасын [Link/Get](/kk/help/api-docs/link#Get) әдісінің сипаттамасынан қараңыз.
`totalItemCount` | integer | Табылған элементтердің жалпы саны.
