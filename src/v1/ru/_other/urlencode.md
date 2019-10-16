### URL-кодирование строк
В каждом серверном языке в том или ином виде есть функция, которая возвращает строку, в которой все не цифро-буквенные символы, кроме `-` `_` `.` должны быть заменены знаком процента (`%`), за которым следует два шестнадцатеричных числа, а пробелы закодированы как знак сложения (`+`). Строка кодируется тем же способом, что и POST-данные веб-формы, то есть по типу контента `application/x-www-form-urlencoded`. Это отличается от кодирования по [RFC 3986](http://www.faqs.org/rfcs/rfc3986) в том, что по историческим причинам, пробелы кодируются как знак "плюс" (`+`).

#### Реализация в различных языках программирования

Язык | Функция | Ссылка на документацию
-----|---------|------------------------
PHP  | [urlencode](http://php.net/manual/ru/function.urlencode.php) | [http://php.net/manual/ru/function.urlencode.php](http://php.net/manual/ru/function.urlencode.php)
.Net | [HttpUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[WebUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode) | [https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode)
Python | [urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)|[https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)
Java | [URLEncoder.encode](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html) | [https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html)
JavaScript | [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent)
