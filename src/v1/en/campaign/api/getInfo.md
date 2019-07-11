### Getting of the campaign's statistical data
{{EXAMPLE_QUERY}}

It is used to obtain preliminary information about the cost of the campaign, taking into account the current situation in the system, as well as to obtain information on the number of sent and delivered messages, the amount of money spent and other statistics related to the campaign. <br> ** IMPORTANT! ** Because of the campaign's calculation technical features, data on the preliminary  cost of the campaign are specified at the time of recipients' adding and do not change over time, unless you upload the recipients again or edit the campaign data (if you edit the data, all recipients and calculations will be reset and reloading will be necessary).
  
#### Request parameters

 Parameter                 | Type     | Description
---------------------------|---------|-----------
`id`                       | integer | Campaign ID
`getFilledTplCampaignText` | bool    | **1** - to return the text of the template campaign filled out with real recipient data, by default **0** - campaign's text containing placeholders

#### Server response

Field          | Type     | Description
---------------|---------|-----------
`name`         | string  | Campaign name
`text`         | string  | Full message text, or template text with placeholders, which will later be replaced with a unique text for each message
`msgType`      | string  | Campaign message type, at the moment only SMS is supported
`from`         | string  | Sender's signature
`rateLimit`    | integer | Sending limit by the quantity
`ratePeriod`   | integer | Sending limit for the time period. To be ignored, if `rateLimit` is not set or equals 0
`deferredToTs` | string  | Date and time of the campaign, when it is necessary to start sending in the specified time. 
It should start not later than in 14 days and not earlier than in an hour from the current time. Format: `2013-12-31 15:34:55`
`mclass`       | integer | ***0, 1, 2, 3***, by default ***1*** - messages are saved to the Incoming messages folder in the phone, ***0*** - are displayed as a popup and are not saved (flashSMS), is supported not by all phones, ***2*** - are saved to SIM-card, ***3*** - SIM Toolkit SMS
`ttl`          | integer | Message expiration time in minutes makes from 1 min to 3 days (4320 min) from the moment of sending (the parameter is only available for SMS campaigns)
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
