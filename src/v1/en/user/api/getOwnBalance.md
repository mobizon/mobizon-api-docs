### Getting Balance Information
{{EXAMPLE_QUERY}}

This method allows you to retrieve information about the user's balance.

#### Server Response
Data array

Field     | Type    | Description
----------|---------|-------------
balance  | fixed   | Current amount on the user's balance with a precision of 4 decimal places.
currency | char(3) | Balance currency in [ISO 4217 alphabetic code](https://en.wikipedia.org/wiki/ISO_4217#cite_ref-exponent_7-0) format.
