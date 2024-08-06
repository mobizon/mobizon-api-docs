### Sending a Campaign
{{EXAMPLE_QUERY}}

This method allows you to send a created campaign by its [ID](/en/help/api-docs/other#glossary-id).

**Please note!** Depending on conditions such as suspicion of spam, presence of suspicious content in the message text, restriction for a certain direction, etc., as well as terms of cooperation (contract), the campaign may go to moderation.

#### Request Parameters

Parameter | Type     | Description
---------|---------|-----------
`id`     | integer | Campaign identifier.

#### Server Response

`integer`: campaign sending status.

##### Possible values:

**1** – campaign is being reviewed by a moderator;<br>
**2** – campaign sent.

#### API Response Codes

Code                      | Description
-------------------------|-----------
{{API_OK}}               | Campaign successfully sent.
{{API_RECORD_NOT_FOUND}} | If the campaign is not found.
{{API_DATA_UPDATE}}      | If the campaign status could not be changed.



