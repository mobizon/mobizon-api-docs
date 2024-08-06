### Deleting a Campaign
{{EXAMPLE_QUERY}}

This method allows you to delete a campaign by its [ID](/en/help/api-docs/other#glossary-id).
<br>A campaign can be deleted if its sending has not yet started.
<br>If the campaign is scheduled: a scheduled campaign can be deleted provided that there are at least 5 minutes left before the start of sending.

#### Request Parameters

 Parameter              | Type     | Description
------------------------|---------|-----------
`id`                    | integer | Campaign identifier.




#### API Response Codes

Code | Description
----|----
{{API_OK}}               | Campaign successfully deleted.
{{API_RECORD_NOT_FOUND}} | If the campaign with the specified ID is not found.
{{API_DATA_UPDATE}}      | If the campaign with the specified ID cannot be deleted.
