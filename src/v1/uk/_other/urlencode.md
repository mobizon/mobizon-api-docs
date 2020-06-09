### URL-кодування рядків
У кожній серверній мові в тому чи іншому вигляді є функція, яка повертає рядок, в якому всі не цифро-буквені символи, крім `-` `_` `.` 
повинні бути замінені знаком відсотка (`%`), за яким йдуть два шістнадцятирічних числа, а пробіли закодовані як знак додавання (`+`). Рядок кодується тим же способом, що і POST-дані веб-форми, тобто за типом контенту `application/x-www-form-urlencoded`. Це відрізняється від кодування по [RFC 3986](http://www.faqs.org/rfcs/rfc3986) в тому, що з історичних причин, пробіли кодуються як знак "плюс" (`+`).

#### Реалізація в різних мовах програмування

Мова | Функція | Посилання на документацію
-----|---------|------------------------
PHP  | [urlencode](http://php.net/manual/ru/function.urlencode.php) | [http://php.net/manual/ru/function.urlencode.php](http://php.net/manual/ru/function.urlencode.php)
.Net | [HttpUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[WebUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode) | [https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode)
Python | [urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)|[https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)
Java | [URLEncoder.encode](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html) | [https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html)
JavaScript | [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent)
