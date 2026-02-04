### Codificação de strings em URL
Em todas as linguagens de servidor existe, de uma forma ou de outra, uma função que retorna uma string na qual todos os caracteres não alfanuméricos, exceto `-` `_` `.` devem ser substituídos por um sinal de porcentagem (`%`), seguido por dois números hexadecimais, e os espaços codificados como um sinal de adição (`+`). A string é codificada da mesma maneira que os dados POST de um formulário web, ou seja, de acordo com o tipo de conteúdo `application/x-www-form-urlencoded`. Isso difere da codificação conforme a [RFC 3986](http://www.faqs.org/rfcs/rfc3986) no fato de que, por razões históricas, os espaços são codificados como um sinal de "mais" (`+`).

#### Implementação em várias linguagens de programação

Linguagem | Função | Link para a documentação
-----|---------|------------------------
PHP  | [urlencode](http://php.net/manual/br/function.urlencode.php) | [http://php.net/manual/br/function.urlencode.php](http://php.net/manual/br/function.urlencode.php)
.Net | [HttpUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[WebUtility.UrlEncode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode) | [https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.web.httputility.urlencode)<br>[https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode](https://docs.microsoft.com/en-us/dotnet/api/system.net.webutility.urlencode)
Python | [urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)|[https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus](https://docs.python.org/3/library/urllib.parse.html#urllib.parse.quote_plus)
Java | [URLEncoder.encode](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html) | [https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html](https://docs.oracle.com/javase/8/docs/api/java/net/URLEncoder.html)
JavaScript | [encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent) | [https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURIComponent)






