### URL кодтау жолдары
Әрбір серверлік тілде цифрлық-әріптік емес барлық таңбалар, `-` `_` `.` таңбаларынан басқа, пайыз белгісімен (`%`) ауыстырылған жолды қайтаратын функция бар, одан кейін екі он алтылық сан, ал бос орындар қосу белгісімен (`+`) кодталады. Жол веб-форманың POST деректері сияқты кодталады, яғни контент түрі бойынша `application/x-www-form-urlencoded`. Бұл [RFC 3986](http://www.faqs.org/rfcs/rfc3986) бойынша кодтаудан өзгеше, өйткені тарихи себептерге байланысты бос орындар "плюс" (`+`) белгісімен кодталады.

#### Әртүрлі бағдарламалау тілдерінде жүзеге асырылуы

Тіл | Функция | Құжаттама сілтемесі
-----|---------|------------------------
PHP  | [urlencode](http://php.net/manual/ru/function.urlencode.php) | [http://php.net/manual/ru/function.urlencode.php](http://php.net/manual/ru/function.urlencode.php)
.Net | [HttpUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[WebUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode) | [https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode)
Python | [urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)|[https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)
Java | [URLEncoder.encode](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html) | [https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html)
JavaScript | [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent)
