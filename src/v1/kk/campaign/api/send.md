### Кампанияны жіберу
{{EXAMPLE_QUERY}}

Бұл әдіс кампанияны [ID](/kk/help/api-docs/other#glossary-id) бойынша жіберуге мүмкіндік береді.

**Назар аударыңыз!** Спамға күдік туындаған жағдайлар, хабарлама мәтінінде күдікті мазмұнның болуы, белгілі бір бағытқа шектеу және т.б., сондай-ақ келісім-шарт бойынша жағдайлар байланысты, кампания модерацияға түсуі мүмкін.

#### Сұраныс параметрлері

Параметр  | Түрі    | Сипаттамасы
---------|---------|-----------
`id`     | integer | Кампанияның идентификаторы.

#### Сервердің жауабы

`integer`: кампанияның жіберілу статусы.

##### Мүмкін мәндер:

**1** – кампания модератор тексерісінде;<br>
**2** – кампания жіберілді.

#### API жауап кодтары

Код                      | Сипаттамасы
-------------------------|-----------
{{API_OK}}               | Кампания сәтті жіберілді.
{{API_RECORD_NOT_FOUND}} | Кампания табылмады.
{{API_DATA_UPDATE}}      | Кампанияның статусын өзгерту мүмкін болмады.
