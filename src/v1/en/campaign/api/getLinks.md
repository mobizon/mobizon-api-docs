### Receipt of campaign's short links
{{EXAMPLE_QUERY}}

#### Request parameters

Parameter        | Type    | Description
------------------|---------|-----------
`campaignId`      | integer | Campaign ID


####Server response

Data array for each link

Field         | Type     | Description
--------------|---------|-----------
`id`          | integer | Link ID
`code`        | string  | Short link code
`fullLink`    | string  | Full link
`shortLink`   | string  | Short link
`clickCnt`    | integer | Number of clicks
`redirectCnt` | integer | Number of transitions
`comment`     | string  | Comment

#### Errors codes

Code                     | Description
-------------------------|-----------
{{API_RECORD_NOT_FOUND}} | If the campaign was not found.

