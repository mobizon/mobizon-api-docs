### Launching of the campaign
{{EXAMPLE_QUERY}}

Depending on the moderation flags of the user, who created the campaign, it will end up on moderation or will be immediately queued for sending


#### Request parameters

Parameter          | Type     | Description
------------------|---------|-----------
`id`              | integer | Campaign ID


#### Server response

integer campaign status: **1** - moderation, **2** - sending


#### Errors codes

Code                      | Description
-------------------------|-----------
{{API_RECORD_NOT_FOUND}} | If the campaign was not found.
{{API_DATA_UPDATE}}      | If campaign status failed to change.


