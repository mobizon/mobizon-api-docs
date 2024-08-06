### Getting Campaign Short Links
{{EXAMPLE_QUERY}}

This method allows you to get information and statistics of the campaign's short links.

#### Request Parameters

Parameter          | Type     | Description
------------------|---------|-----------
`campaignId`      | integer | Campaign identifier.

#### Server Response

Link object structure: an array of short links, where each element contains the following fields:

Field          | Type     | Description
--------------|---------|-----------
`id`          | integer | Short link identifier.
`code`        | string  | Short link code.
`fullLink`    | string  | Full link.
`shortLink`   | string  | Short link.
`clickCnt`    | integer | Number of clicks on the short link.
`redirectCnt` | integer | Number of redirects via the short link.
`comment`     | string  | User comment on the short link. 

#### API Response Codes

Code                      | Description
-------------------------|-----------
{{API_OK}} | Campaign short links successfully retrieved.
{{API_RECORD_NOT_FOUND}} | If the campaign is not found.
