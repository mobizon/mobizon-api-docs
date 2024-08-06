### URL Encoding Strings
In every server-side language, there is a function that returns a string where all non-alphanumeric characters, except `-` `_` `.`, are replaced with a percent sign (`%`) followed by two hexadecimal digits, and spaces are encoded as a plus sign (`+`). The string is encoded in the same way as POST data from web forms, that is, as `application/x-www-form-urlencoded`. This differs from [RFC 3986](http://www.faqs.org/rfcs/rfc3986) encoding in that, for historical reasons, spaces are encoded as a plus sign (`+`).

#### Implementation in Various Programming Languages

Language | Function | Documentation Link
-----|---------|------------------------
PHP  | [urlencode](http://php.net/manual/en/function.urlencode.php) | [http://php.net/manual/en/function.urlencode.php](http://php.net/manual/en/function.urlencode.php)
.Net | [HttpUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[WebUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode) | [https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode)
Python | [urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)|[https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)
Java | [URLEncoder.encode](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html) | [https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html)
JavaScript | [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent)
