### Глосарій

<span data-anchor="glossary-id">`ID`</span> – унікальний ідентифікатор, який дозволяє однозначно визначити шуканий об'єкт: кампанію, групу і т.д.

<span data-anchor="glossary-contact-card">`Контактна картка`</span> – запис у Контактній книзі, що містить дані клієнта, такі як: ПІБ, email, дату народження та іншу інформацію. 
Обов'язково повинна містити номер телефону.

<span data-anchor="glossary-sender-id">`Підпис відправника (Sender ID, алфавітно-цифрове ім'я)`</span> – відображається як відправник SMS на телефоні одержувача замість номера телефону.  
До підписів відправника існує [ряд вимог](/help/sender-id/sender-id).

<span data-anchor="glossary-shared-senderid">`Загальний підпис (відправника SMS)`</span> – один із підписів сервісу, який використовується при відправленні повідомлення, якщо у користувача немає підписів або вибраний підпис недоступний для відправлення на вказаний номер телефону. 

<span data-anchor="glossary-recipient">`Одержувач (абонент)`</span> – користувач послуг мобільного зв'язку, на номер якого відбувається відправлення SMS-повідомлення.

<span data-anchor="glossary-shortlink">`Коротке посилання`</span> – скорочений (альтернативний) URL-адреса для доступу до WEB-сторінки. 

Використання короткого посилання замість звичайного мінімізує ненавмисне спотворення URL – коротке посилання легше запам'ятати, скопіювати або ввести вручну. 

Статистичні дані надаються в зручній формі: можна побачити кількість кліків за останні 2 години, день, тиждень, 30 днів або весь час (детальніше див. у розділі [короткі посилання](/help/url-shortener/how-to-shorten-url)).

Також короткі посилання зручно використовувати в SMS. Вони дозволяють зменшити вартість відправлення за рахунок меншої кількості символів у повідомленні. 

При використанні короткого посилання, створеного в нашому сервісі, є можливість задіяти функцію [відстеження одержувачів](#glossary-recipienttracking), які відкрили посилання.

<span data-anchor="glossary-personal-link">`Персональне посилання (посилання відстеження одержувача)`</span> – спеціальне коротке посилання, створене за допомогою нашого сервісу і дозволяє відстежити хто саме з одержувачів SMS-розсилки перейшов за ним. Посилання унікальне для кожного окремого одержувача SMS. 

<span data-anchor="glossary-recipienttracking">`Функція відстеження одержувачів`</span> – інструмент збору статистики про одержувачів, які перейшли за коротким посиланням, розміщеним у повідомленні. 

Це зручний і ефективний засіб для аналітики цільової аудиторії та оцінки ефективності SMS-кампанії.

Функція доступна для SMS-повідомлень, що містять гіперпосилання. Щоб активувати функцію, необхідно у Формі Відправлення SMS натиснути кнопку заміни звичайного посилання на коротке та перевірити, чи стоїть галочка напроти опції «відстежувати одержувачів».  

<span data-anchor="glossary-dlr">`Звіт про доставку повідомлення (DLR)`</span> – інформація від оператора зв'язку про статус доставки SMS-повідомлення одержувачу. 

<span data-anchor="glossary-sms-campaign">`SMS Кампанія`</span> – дозволяє згрупувати багато одержувачів одного SMS і проаналізувати результати SMS-розсилки. 

<span data-anchor="glossary-single-campaign">`Одиночна кампанія`</span> – відправка повідомлення на один номер.

<span data-anchor="glossary-mass-campaign">`Масова кампанія`</span> – відправка повідомлення на два і більше номерів.

<span data-anchor="glossary-functional-campaign">`Функціональна (службова) кампанія`</span> – до неї входять функціональні або, іншими словами, службові повідомлення системи, наприклад, повідомлення з кодом підтвердження номера з форм.

<span data-anchor="glossary-template">`Шаблонна кампанія`</span> – тип SMS-кампанії, в якій використовується особлива форма повідомлення, що містить плейсхолдери, які замінюються на персональний для кожного одержувача текст.

**Приклад шаблону**

У фігурних дужках {} розміщені плейсхолдери.  

Шаблонний текст з плейсхолдерами      | Текст, який буде доставлений одержувачу    
-----------------|---------
Вітаємо, {name}! Ваш баланс на {date} становить {balance}{currency}.     | Вітаємо, Іван! Ваш баланс на 12.09.2019 становить 15.50 грн.  
{name}, машина під'їхала ({carNumber}). Телефон водія: {driverPhone}.    | Олексій, машина під'їхала (АА 4444). Телефон водія: 099 999 99 99.
Нагадуємо, що ви записані на прийом у {place}. Дата прийому: {date}.    | Нагадуємо, що ви записані на прийом у Клініці 11.11.2019 о 11:30.  

<span data-anchor="glossary-form">`Форма`</span> – зручний інструмент для збору даних про клієнтів, проведення електронних опитувань, формування бази номерів для розсилки і безлічі інших завдань. 

За допомогою Форм ваші клієнти можуть підписатися на SMS-розсилку, новини, акції тощо.

Завдяки гнучкому та інтуїтивно зрозумілому конструктору полів ви можете легко створити Форму, максимально ефективну для ваших завдань.

Крім того, ви можете налаштувати оформлення Форми: вибрати колір тексту, кнопок, фону тощо. 
Детальніше про створення Форм ви можете дізнатися в розділі [“Форми”](/help/forms/how-to-create-form).
