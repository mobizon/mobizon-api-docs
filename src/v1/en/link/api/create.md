### Creating a Short Link
{{EXAMPLE_QUERY}}

This method is designed for creating short links.
#### Request Parameters

**data** `array` – Link parameters

 Parameter             | Type     | Description
----------------------|---------|-----------
`data[fullLink]`      | string  | Full link.<br>The link that needs to be shortened in the correct URL format.<br>For example: `https://help.mobizon.com/api-docs/sms-api?utm_campaign=docs&utm_source=help&utm_medium=test#server-response-format` or `www.mobizon.com` 
`data[status]`        | integer | Status of the short link:<br>**0** – link inactive;<br>**1** – link active (default).
`data[expirationDate]`| date    | Expiration date of the link.<br>The link will be valid until the end of the specified day in the user's time zone.<br>By default, the link does not expire.<br>Format: `YYYY-MM-DD`.
`data[comment]`       | string  | Comment on the link.<br>This field helps to easily find the short link among others.<br>For example: "Black Friday Discounts" or "Negative Balance Reminder".<br>Maximum comment length is 255 characters.

#### Server Response
`array`: Data of the created short link

Field        | Type     | Description
------------|---------|-------------
`id`        | integer | Link identifier.
`code`      | string  | Short link code.
`shortLink` | string  | Short link.


#### API Response Codes

Code | Description
----|----
{{API_OK}}         | Short link successfully created.
{{API_VALIDATION}} | If any parameters contain invalid values.
