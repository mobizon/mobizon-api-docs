### Receipt of the campaigns list
{{EXAMPLE_QUERY}}

If the filter by campaign creation date or the launch date is not set, then the system automatically sets the filter by creation date for the last 24 hours from the current time(from 00:00:00 of the last 24 hours to the current moment by the user's time). The maximum sampling interval by creation date/launch date makes 90 days when trying to search for a longer interval only the results for the last 90 days before the date of the end of the search interval will return. If you set the start date or the end date only, the second date will be calculated and installed automatically at a distance of 90 days from the set one. If the date range is invalid (the end date is greater than the start date), then the result will be empty. When installing only dates, the time is set automatically - for start dates to `00: 00: 00`, and for end dates to` 23: 59: 59` according to user time in the system.




#### Request parameters

 Parameter       | Type    | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see [Search criteria](#list-criteria))
`pagination`     | array   | Pagination display options (see [Pagination display options](#list-pagination))
`sort`           | array   | Sorting options (see [Sorting options](#list-sort))


##### <span data-anchor="list-criteria">Search criteria</span>

Parameter                  | Type    | Description
---------------------------|---------|-----------
`criteria[id]`             | integer | Search for # campaign (if this parameter is set, then the compulsory limit by creation date is not used and the search is performed on all campaigns ever created)
`criteria[ids]`            | array   | Search for campaign IDs, the parameter should be passed as an array or IDs string, separated by commas,<br>maximum IDs number makes 10, if this limit is exceeded, the search will occur on the first 10 from the list.<br>(if this parameter is set, then the compulsory limit by creation date is not used and the search is performed on all campaigns ever created)
`criteria[recipient]`      | string  | Search for recipient's number
`criteria[from]`           | string  | Search for sender's signature (alfaname)
`criteria[text]`           | string  | Search for text of the campaign
`criteria[status]`         | string  | Search for campaign status; the list of possible statuses see in documentation
`criteria[createDateFrom]` | string  | Search for campaign creation date, starting from the specified date (date format `YYYY-MM-DD`)
`criteria[createTimeFrom]` | string  | Search for campaign creation date, starting from the specified date, taking into account the exact time on this day (time format `HH:MM:SS`) - if the date is not specified, this field is to be ignored
`criteria[createDateTo]`   | string  | Search for campaign creation date before the specified date (date format `YYYY-MM-DD`)
`criteria[createTimeTo]`   | string  | Search for campaign creation date before the specified date, taking into account the exact time on this day (time format `HH:MM:SS`) - if the date is not specified, this field is to be ignored
`criteria[sentDateFrom]`   | string  | Search for campaign launch date, starting from the specified date (date format `YYYY-MM-DD`)
`criteria[sendTimeFrom]`   | string  | Search for campaign launch date, starting from the specified date, taking into account the exact time on this day (time format `HH:MM:SS`) - if the date is not specified, this field is to be ignored
`criteria[sentDateTo]`     | string  | Search for campaign launch date before the specified date (date format `YYYY-MM-DD`)
`criteria[sentTimeTo]`     | string  | Search for campaign launch date before the specified date, taking into account the exact time on this day (time format `HH:MM:SS`) - if the date is not specified, this field is to be ignored
`criteria[type]`           | integer | Search for campaign type; the list of available campaign types see in documentation


##### <span data-anchor="list-pagination">Pagination display options</span>

Parameter                 | Type    | Description
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Number of visible elements on the page
`pagination[currentPage]` | integer | Current page


##### <span data-anchor="list-sort">Sorting options</span>

Parameter         | Type    | Description
------------------|---------|-----------
`sort[id]`        | integer | Campaign ID
`sort[recipient]` | string  | Recipient's number
`sort[from]`      | string  | Sender's signature
`sort[text]`      | string  | Campaign text
`sort[status]`    | string  | Campaign status
`sort[type]`      | integer | Campaign type


#### Server response

Data array

Field            | Type    | Description
-----------------|---------|-----------
`items`          | array   | List of found campaigns (see [Campaigns' list](#list-items))
`totalItemCount` | integer | Total number of the elements found

##### <span data-anchor="list-items">List of campaigns</span>

Every campaign contains the following fields:

 Field                | Type    | Description
----------------------|---------|-----------
 `userId`             | integer | User ID
 `partnerId`          | integer | Partner ID
 `type`               | integer | Campaign type
 `name`               | string  | Campaign name
 `msgType`            | integer | Message type
 `from`               | string  | Sender's signature
 `text`               | string  | Message text or template in case of template campaign
 `startTs`            | string  | Campaign start time
 `createTs`           | string  | Time of creation
 `rateLimit`          | integer | Sending limit by quantity
 `ratePeriod`         | integer | Time period for quantity limit
 `status`             | integer | Current campaign status
 `creationWay`        | integer | Method of campaign creation `WEB/SOAP/SMPP`
 `isDeleted`          | integer | Campaign deletion flag
 `extra`              | string  | Serialized parameters' value (`udh`, `ttl`, `mclass`)
 `groups`             | string  | Campaign recipients' groups
 `counters`     | object  | Different campaign counters. See below for details
 
 ##### `counters` object fields
  
 Field                | Type     | Description
 ---------------------|----------|-----------
 `updateTs`           | datetime | Last counters update time. Format: `2013-12-31 15:34:55`
 `totalNewSegNum`     | integer  | Total number of segments with `NEW` status
 `totalAcceptdSegNum` | integer  | Total number of segments with `ACCEPTD` status
 `totalDelivrdSegNum` | integer  | Total number of segments with `DELIVRD` status
 `totalRejectdSegNum` | integer  | Total number of segments with `REJECTD` status
 `totalExpiredSegNum` | integer  | Total number of segments with `EXPIRED` status
 `totalUndelivSegNum` | integer  | Total number of segments with `UNDELIV` status
 `totalDeletedSegNum` | integer  | Total number of segments with `DELETED` status
 `totalUnknownSegNum` | integer  | Total number of segments with `UNKNOWN` status
 `totalPdlivrdSegNum` | integer  | Total number of segments with `PDLIVRD` status
 `totalSegNum`        | integer  | Total number of segments in the campaign. Updates when processing (before sending) messages/campaign segments.
 `totalNewMsgNum`     | integer  | Total number of messages with `NEW` status
 `totalAcceptdMsgNum` | integer  | Total number of messages with `ACCEPTD` status
 `totalDelivrdMsgNum` | integer  | Total number of messages with `DELIVRD` status
 `totalRejectdMsgNum` | integer  | Total number of messages with `REJECTD` status
 `totalExpiredMsgNum` | integer  | Total number of messages with `EXPIRED` status
 `totalUndelivMsgNum` | integer  | Total number of messages with `UNDELIV` status
 `totalDeletedMsgNum` | integer  | Total number of messages with `DELETED` status
 `totalUnknownMsgNum` | integer  | Total number of messages with `UNKNOWN` status
 `totalPdlivrdMsgNum` | integer  | Total number of messages with `PDLIVRD` status
 `totalMsgNum`        | integer  | Total number of messages (not segments). Updates when processing (before sending) messages/campaign segments.
 `totalNewMsgCost`    | float    | Total cost of all segments with `NEW` status
 `totalAcceptdMsgCost`| float    | Total cost of all segments with `ACCEPTD` status
 `totalDelivrdMsgCost`| float    | Total cost of all segments with `DELIVRD` status
 `totalRejectdMsgCost`| float    | Total cost of all segments with `REJECTD` status
 `totalExpiredMsgCost`| float    | Total cost of all segments with `EXPIRED` status
 `totalUndelivMsgCost`| float    | Total cost of all segments with `UNDELIV` status
 `totalDeletedMsgCost`| float    | Total cost of all segments with `DELETED` status
 `totalUnknownMsgCost`| float    | Total cost of all segments with `UNKNOWN` status
 `totalPdlivrdMsgCost`| float    | Total cost of all segments with `PDLIVRD` status
 `totalCost`          | float    | Total cost of all segments of the campaign. Updates when processing (before sending) messages/campaign segments.
 `recipientsRejected` | integer  | Number of rejected recipients (not included in the campaign). Updates when processing (before sending) messages/campaign segments.
