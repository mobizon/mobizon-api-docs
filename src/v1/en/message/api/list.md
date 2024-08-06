### Getting List of SMS Messages
{{EXAMPLE_QUERY}}

This method allows you to get a list of created SMS messages.

The search can be performed by [ID](/en/help/api-docs/other#glossary-id) and campaign fields.


#### Request Parameters

 Parameter        | Type     | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see the table [Search Criteria](#list-criteria)).
`pagination`     | array   | Pagination parameters (see the table [Pagination Parameters](#list-pagination)).
`sort`           | array   | Sorting parameters (see the table [Sorting Parameters](#list-sort)).
`withNumberInfo` | integer | This parameter allows you to get additional information about the recipient's number from the server, such as "country" and "operator".<br>Possible values:<br>**0** – do not get (default);<br>**1** – get.


#### <span data-anchor="list-criteria">Search Criteria</span>

Information about the fields of the SMS message by which the search is performed.
The search can be done by one field or multiple fields simultaneously.

 Parameter                     | Type     | Description
------------------------------|---------|-----------
`criteria[campaignIds]`         | array \ string | Search by campaign identifiers.<br>The parameter must be passed as an array or a string of comma-separated identifiers.<br>The maximum number of identifiers is 100; if this limit is exceeded, the search will be performed for the first 100 [IDs](/en/help/api-docs/other#glossary-id) from the list.
`criteria[from]`        | string | Search by [sender ID](/en/help/api-docs/other#glossary-sender-id).<br>The search is performed by the sender ID created in the campaign.
`criteria[to]`       | string   | Search by recipient's phone number.<br>Search is allowed both by the entire number and by part of it.<br>For example:<br>`{widget:example-phone}` – will find all campaigns in which this number participated;<br>`38097` – will find all campaigns with numbers containing the specified digit combination.<br>Only one number can participate in the search.
`criteria[text]`              | string  | Search by campaign message text.<br>Performed based on the complete match of the search value.
`criteria[status]`                | integer | Search by [message status](/en/help/api-docs/other#SmsStatus).
`criteria[groups]`              | string  | Search by identifiers of [contact groups](/en/help/contact-book/contact-groups) used in the campaign.<br>The parameter must be passed as an array or a string of comma-separated identifiers.
`criteria[campaignStatus]`            | string | Search by the [campaign status](/en/help/api-docs/campaign#list-campaign-statuses) of the SMS message.
`criteria[campaignCreateTsFrom]`            | string  | Search by the date and time of campaign creation, starting from the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[campaignCreateTsTo]` | string | Search by the date and time of campaign creation up to the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[campaignSentTsFrom]` | string | Search by the date and time of sent campaigns, starting from the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[campaignSentTsTo]` | string | Search by the date and time of sent campaigns up to the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[startSendTsFrom]` | string | Search by the date and time of sent messages, starting from the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[startSendTsTo]` | string | Search by the date and time of sent messages up to the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[statusUpdateTsFrom]` | string | Search by the date and time of messages whose status was changed, starting from the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.
`criteria[statusUpdateTsTo]` | string | Search by the date and time of messages whose status was changed up to the specified date and time.<br>Format: `YYYY-MM-DD   HH:MM:SS`.


### <span data-anchor="list-pagination">Pagination Parameters</span>

These parameters are created for structured (partial) output of the requested information.

 Parameter                 | Type     | Description
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Number of items displayed per page (25, 50, 100).
`pagination[currentPage]` | integer | Current page <br>Page numbering starts from 0.


### <span data-anchor="list-sort">Sorting Parameters</span>

These parameters allow you to sort the search results by one of the fields in ascending (ASC) or descending (DESC) order.

For example:

Sort by recipient number in ascending order – `sort[to]`: ASC.

Sort by message status in descending order – `sort[status]`: DESC.

 Parameter                 | Description
--------------------------|---------
`sort[campaignId]`        | Sort by campaign identifier.
`sort[from]`              | Sort by sender ID.
`sort[to]`                | Sort by recipient number.
`sort[text]`              | Sort by text.
`sort[status]`            | Sort by message status.
`sort[startSendTs]`            | Sort by send time.
`sort[statusUpdateTs]` | Sort by status update.
`sort[segNum]` | Sort by number of segments.


### Server Response

Array of data:

 Field            | Type     | Description
-----------------|---------|-----------
`items`          | array   | List of found messages (see the table [List of Messages](#list-items)).
`totalItemCount` | integer | Total number of found items.


##### <span data-anchor="list-items">List of Messages</span>

Each message contains fields:

 Field               | Type     | Description
--------------------|---------|-----------
`id`                | integer | Message identifier.
`campaignId`        | integer | Campaign identifier of the message.
`segNum`            | integer | Number of segments.
`segUserBuy`        | float   | Cost of the message segment for the user<br>Specified in the user's currency.
`from`              | string  | [Sender ID](/en/help/api-docs/other#glossary-sender-id).
`to`                | string  | Recipient number.
`text`              | string  | Message text.
`status`            | string  | Message status (see the table [List of Possible Message Statuses](/en/help/api-docs/other#SmsStatus)).
`groups`            | string  | Identifiers of [contact groups](/en/help/contact-book/contact-groups) that included the recipient number at the time of campaign creation.
`uuid`              | string  | Internal message identifier.
`countryA2`         | string  | Recipient country code in ISO-3166 alpha2 format.
`operatorName`      | string  | Recipient operator name.
`startSendTs`      | date  | Message send date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`statusUpdateTs`      | date  | Date and time of the last message status update.<br>Format: `YYYY-MM-DD HH:MM:SS`.
