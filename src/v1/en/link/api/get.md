### Getting of the link
{{EXAMPLE_QUERY}}

#### Request parameters
(to get it, it is necessary to pass one of the parameters)

Parameter   | Type    | Description
------------|---------|-----------
`id`        | integer | Link ID
`code`      | string  | Short link code
`shortLink` | string  | Short link


#### Server response
Data array

Field              | Type    | Description
-------------------|---------|-------------
`id`               | integer | Link ID
`userId`           | integer | User ID
`partnerId`        | integer | Partner ID
`domainId`         | integer | Links' domain ID
`status`           | integer | Link status (***0*** - inactive, ***1*** - active)
`moderatorStatus`  | integer | Link's moderation status  (***0*** - blocked, ***1*** - allowed)
`clickCnt`         | integer | Number of clicks on the link
`createTs`         | string  | Link creation time
`expirationDate`   | string  | Link expiry date (in format `YYYY-MM-DD`)
`code`             | string  | Short link code
`fullLink`         | string  | Original link
`shortLink`        | string  | Short link
`comment`          | string  | Comment
`moderatorComment` | string  | Moderator's comment


#### Errors codes

Code | Description
----|----
{{API_RECORD_NOT_FOUND}} | If the link with the specified ID was not found
{{API_INCORRECT_PARAM}}  | If none of the parameters was passed
