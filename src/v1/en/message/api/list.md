### Getting of the list of SMS messages
{{EXAMPLE_QUERY}}

#### Request parameters

  Parameter       | Type    | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see [Search criteria](#list-criteria))
`pagination`     | array   | Pagination display options (see [Pagination display options](#list-pagination))
`sort`           | array   | Sorting options (see [Sorting options](#list-sort))
`withNumberInfo` | integer | Recipient information retrieval flag, by default - **0**


##### <span data-anchor="list-criteria">Search criteria</span>

  Parameter       | Type    | Description
------------------------------|---------|-----------
`criteria[id]`                | integer | Message ID
`criteria[campaignId]`        | integer | Campaign ID
`criteria[campaignIds]`       | array   | Search by campaign IDs; the parameter should be passed as an array or a string of IDs, separated by commas, the maximum number of IDs equals to 10; when this limit is exceeded, the search will occur on the first 10 entries of the list (if this parameter is set, then a forced limitation on the creation date is not used and search runs on all campaigns ever created)
`criteria[from]`              | string  | Sender's signature
`criteria[to]`                | string  | Recipient number
`criteria[text]`              | string  | Message text
`criteria[status]`            | integer | Message status
`criteria[groups]`            | string  | Message recipient groups
`criteria[contentProviderId]` | integer | SMS centre ID


##### <span data-anchor="list-pagination">Pagination display options</span>

  Parameter       | Type    | Description
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Number of visible elements on the page
`pagination[currentPage]` | integer | Current page


##### <span data-anchor="list-sort">Sorting options</span>

  Parameter       | Type    | Description
--------------------------|---------|-----------
`sort[id]`                | integer | Message ID
`sort[campaignId]`        | integer | Campaign ID
`sort[from]`              | string  | Sender's signature
`sort[to]`                | string  | Recipient number
`sort[text]`              | string  | Message text
`sort[status]`            | integer | Message status
`sort[groups]`            | string  | Message recipient groups
`sort[contentProviderId]` | integer | SMS centre ID


#### Server response

Data array

 Field           | Type    | Description
-----------------|---------|-----------
`items`          | array   | List of found messages (see [List of messages](#list-items))
`totalItemCount` | integer | Total number of the elements found


##### <span data-anchor="list-items">List of messages</span>

Each of the messages contains the following fields:

 Field           | Type    | Description
--------------------|---------|-----------
`id`                | integer | Message ID
`campaignId`        | integer | Campaign ID
`segNum`            | integer | Number of segments
`segUserBuy`        | float   | Segment purchase price for a user in his currency
`from`              | string  | Sender's signature
`to`                | string  | Recipient number
`text`              | string  | Message text
`status`            | string  | Message status (See [List of possible statuses of messages](/en/help/api-docs/other#SmsStatus) table)
`groups`            | string  | Message recipient group ID, this number belonged to at the time of the campaign
`uuid`              | string  | Internal message ID 
`countryA2`         | string  | Recipient's country code
`operatorName`      | string  | Recipient's operator
