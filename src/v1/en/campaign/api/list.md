### Getting Campaign List
{{EXAMPLE_QUERY}}

This method allows you to get a list of created campaigns. The search can be performed by [ID](/en/help/api-docs/other#glossary-id) and other fields.


#### Request Parameters

 Parameter        | Type     | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see the table [Search Criteria](#list-criteria)).
`pagination`     | array   | Pagination parameters (see the table [Pagination Parameters](#list-pagination)).
`sort`           | array   | Sorting parameters (see the table [Sorting Parameters](#list-sort)).


#### <span data-anchor="list-criteria">Search Criteria</span>
The following are the fields by which the search is performed.
The search can be done by one or several fields simultaneously.

 Parameter                  | Type     | Description
---------------------------|---------|-----------
`criteria[id]`             | integer | Search for a single campaign by its [ID](/en/help/api-docs/other#glossary-id).
`criteria[ids]`            | array   | Search for multiple campaigns by their [ID](/en/help/api-docs/other#glossary-id).<br>The parameter must be passed as an array or a string of comma-separated identifiers.<br>The maximum number of identifiers is 100; if this limit is exceeded, the search will be performed for the first 100 IDs in the list.
`criteria[recipient]`      | string  | Search by recipient's phone number or part of it.<br>For example:<br>**{widget:example-phone}** – will find all campaigns in which this number participated;<br>**38097** – will find all campaigns with numbers containing the specified digit combination.<br>Only one number can participate in the search.
`criteria[from]`           | string  | Search by [sender ID](/en/help/api-docs/other#glossary-sender-id) used in the campaign.
`criteria[text]`           | string  | Search by campaign message text.<br>Performed based on the complete match of the search value.
`criteria[status]`         | string  | Search by [campaign status](#list-campaign-statuses).
`criteria[createTsFrom]`   | string  | Search for campaigns created from the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[createTsTo]`     | string  | Search for campaigns created up to the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[sentTsFrom]`     | string  | Search for campaigns sent from the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[sentTsTo]`       | string  | Search for campaigns sent up to the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[type]`           | integer | Search by campaign type:<br>**1** – Single message (sent to one number);<br>**2** – Mass mailing (default);<br>**3** – Template campaign (the message text may contain placeholders that will be replaced with text unique to each recipient).
`criteria[groups]`         | string  | Search by identifiers of [contact groups](/en/help/contact-book/contact-groups) used in the campaign.<br>The parameter must be passed as an array or a string of comma-separated identifiers.


#### <span data-anchor="list-pagination">Pagination Parameters</span>
These parameters are intended for structured (partial) output of the requested information.

 Parameter                 | Type     | Description
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Number of items displayed per page (25, 50, 100).
`pagination[currentPage]` | integer | Current page.<br>Page numbering starts from 0.


#### <span data-anchor="list-sort">Sorting Parameters</span>
These parameters allow you to sort the search results by one of the fields in ascending (ASC) or descending (DESC) order.

***For example:***

Sort by campaign creation date in ascending order – `sort[createTs]=ASC`.<br>
Sort by campaign [ID](/en/help/api-docs/other#glossary-id) in descending order – `sort[id]=DESC`.

 Parameter                     | Description
------------------------------|----------
`sort[id]`                    | Sort by campaign [ID](/en/help/api-docs/other#glossary-id).
`sort[name]`                  | Sort by campaign name.
`sort[from]`                  | Sort by sender ID.
`sort[counters.totalMsgNum]`  | Sort by the number of phone numbers in the campaign.
`sort[counters.totalCost]`    | Sort by campaign cost.
`sort[createTs]`              | Sort by campaign creation date and time.
`sort[startSendTs]`           | Sort by campaign send start date and time.
`sort[endSendTs]`             | Sort by campaign send end date and time.


#### Server Response

Contains an array of two fields:

 Field            | Type     | Description
-----------------|---------|-----------
`items`          | array   | List of found campaigns.<br>For a description of the campaign fields, see the description of the [campaign/getInfo](#GetInfo) method.
`totalItemCount` | integer | Total number of found items.


##### <span data-anchor="list-campaign-statuses">Campaign Statuses</span>

Status              | Description
--------------------|-------------------------------
NEW                 | The campaign is created, but the user has not sent it yet.<br>Adding recipients is allowed in this status.
MODERATION          | Under moderation to comply with the service rules.
DECLINED            | Declined by the moderator as it does not comply with the service rules or the requirements of the operators whose numbers are present in the campaign.
READY_FOR_SEND      | The campaign is ready to be sent, but the sending has not started yet.
AUTO_READY_FOR_SEND | No moderation is required. The campaign will be sent without moderation.
NOT_YET_SENT        | Includes all statuses when the campaign has not yet been sent.<br>**This value is used only for search. Campaigns cannot have it.**
RUNNING             | The campaign is running, the sending process to the operator is ongoing.
DEFERRED            | The campaign send is scheduled for a specific time.<br>**This value is used only for search. Campaigns cannot have it.**
SENT                | The campaign is fully sent, but not all messages have received a delivery report from the mobile operators yet.
DONE                | The campaign is fully processed, all final delivery reports have been received.<br>After this status is set, no campaign counters are changed.
