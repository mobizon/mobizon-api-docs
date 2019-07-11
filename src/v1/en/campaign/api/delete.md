### Full deletion of the campaign
{{EXAMPLE_QUERY}}

You can delete the campaign, which has not yet started, but if the campaign was postponed, there should be not less than 5 minutes left till start.

####Request parameters

 Parameter              | Type     | Description
------------------------|---------|-----------
`id`                    | integer | Campaign ID

#### Server response
boolean **true** - if the deletion was successfully completed

#### Errors codes

Code | Description
----|----
{{API_RECORD_NOT_FOUND}} | If the campaign with specified ID was not found
{{API_DATA_UPDATE}}      | If the campaign with specified ID can't be deleted