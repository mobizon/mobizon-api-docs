### Retrieving Basic Data of a Short Link
{{EXAMPLE_QUERY}}

This method allows you to retrieve the basic data of a short link by one of its three parameters: **id**, **code**, **shortLink**.

Only one short link's data can be retrieved in a single request.

#### Request Parameters
To retrieve the data, one of the parameters must be passed:

 Parameter   | Type     | Description
------------|---------|-----------
`id`        | integer | Link identifier.
`code`      | string  | Short link code.<br>A combination of characters unique to each short link.<br>Located at the very end of the short link.<br>Example: http://mbz.im/mgjf, where **mgjf** is the short link code.
`shortLink` | string  | [Short link](/en/help/api-docs/other#glossary-shortlink).<br>URL created by our service, which redirects your visitors to the link you initially specified.<br>Example: http://mbz.im/mgjf.

#### Server Response
Array of data

Field               | Type     | Description
-------------------|---------|-------------
`id`               | integer | Link identifier.
`status`           | integer | Status set by the user:<br>**0** – link inactive;<br>**1** – link active.
`moderatorStatus`  | integer | Status set by the administrator:<br>**0** – blocked by the administrator;<br>**1** – approved by the administrator.
`clickCnt`         | integer | Number of clicks on the short link.
`createTs`         | string  | Creation time of the short link.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`expirationDate`   | string  | Expiration date of the short link.<br>Format: `YYYY-MM-DD`.<br>If the date is not set, the field value is NULL.
`code`             | string  | Short link code.
`fullLink`         | string  | Full link.
`shortLink`        | string  | Short link.
`comment`          | string  | User's comment on the short link.<br>If the comment is absent, the field value is NULL.
`moderatorComment` | string  | Moderator's comment.<br>If the comment is absent, the field value is NULL.


#### API Response Codes

Code | Description
----|----
{{API_OK}} | Basic data of the short link successfully retrieved.
{{API_RECORD_NOT_FOUND}} | If the link with the specified identifier is not found.
{{API_INCORRECT_PARAM}}  | If none of the parameters are passed.
