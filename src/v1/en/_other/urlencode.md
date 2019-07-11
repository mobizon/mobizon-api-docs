### URL-encoded string
Every server language has some kind of function, returning the string, in which all non-alphanumeric characters except `-_.` have been replaced with a percent (%) sign followed by two hex digits and spaces encoded as plus (+) signs. It is encoded the same way that the posted data from a web-form, that is the same way as in `application/x-www-form-urlencoded` media type. This differs from the [RFC 3986](http://www.faqs.org/rfcs/rfc3986) encoding that for historical reasons, spaces are encoded as a plus (+) sign.

#### PHP
In PHP it is represented by [urlencode](http://php.net/manual/en/function.urlencode.php) function.
