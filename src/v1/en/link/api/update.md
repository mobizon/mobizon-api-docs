### Editing Short Link Data
{{EXAMPLE_QUERY}}

This method allows you to change the parameters of a created short link.

#### Request Parameters

 Parameter  | Type     | Description
-----------|---------|-----------
`id`       | integer | Link identifier.
`data`     | integer | Editable link parameters specified in the table [Link Parameters](#update-data).

#### <span data-anchor="update-data">Link Parameters</span>

 Parameter             | Type     | Description
----------------------|---------|-----------
`data[status]`        | integer | Status of the short link:<br>**0** – link inactive;<br>**1** – link active.
`data[expirationDate]`| date    | Expiration date of the short link.<br>Format: `YYYY-MM-DD`.<br>If the value is not provided, the link will be valid indefinitely.
`data[comment]`       | string  | Comment on the link.<br>Maximum comment length is 255 characters.

#### Server Response

`string` – Short link.

#### API Response Codes

Code                      | Description
-------------------------|----
{{API_OK}}               | Parameters successfully changed.
{{API_VALIDATION}}       | If any parameters contain invalid values.
{{API_RECORD_NOT_FOUND}} | If the link with the specified identifier is not found.
