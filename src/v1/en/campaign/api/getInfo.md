### Retrieving Campaign Statistics
{{EXAMPLE_QUERY}}

This method allows you to retrieve the main and statistical data of a campaign by its [ID](/en/help/api-docs/other#glossary-id).

Statistics are generated using various counters that are displayed in the `counters` field.

**IMPORTANT!**

Due to the technical features of calculating the campaign cost, the data on the possible cost of the campaign are indicated at the time of adding recipients and do not change over time.

Changes can occur only when recipients are re-uploaded or when campaign data is edited (in case of data editing, all recipients and calculations are reset – re-uploading is required).

#### Request Parameters

 Parameter                  | Type     | Description
---------------------------|---------|-----------
`id`                       | integer | Campaign identifier.
`getFilledTplCampaignText` | integer | Format of returned data:<br>**0** – campaign text with placeholders;<br>**1** – return template campaign text filled with real recipient data (default).

#### Server Response

Field           | Type     | Description
---------------|---------|-----------
`id`                       | integer | Campaign identifier.
`moderationStatus`         | string  | Current moderation status:<br>**MODERATION** – campaign is under moderation;<br>**DECLINED** – campaign declined by moderator;<br>**READY_FOR_SEND** – campaign approved by moderator;<br>**AUTO_READY_FOR_SEND** – campaign sent without moderation.
`commonStatus`             | string  | Current campaign status:<br>**MODERATION** – campaign is under moderation;<br>**DECLINED** – campaign declined by moderator (reason for rejection is indicated in the `globalComment` field);<br>**READY_FOR_SEND** – campaign ready to be sent but sending has not yet started;<br>**RUNNING** – campaign in the process of sending;<br>**SENT** – campaign fully sent but not all messages have received delivery reports from the operator;<br>**DONE** – campaign fully processed, all final delivery reports received.
`groupsList`               | array   | List of contact groups included in the campaign.<br>For each group contains:<br>**id** – group number;<br>**name** – group name;<br>**cardsCnt** – number of contacts in the group available for message sending.<br>If groups were not used in the campaign, this field will be empty.
`type`                     | integer | Campaign type:<br>**1** – Single message (sending to one number);<br>**2** – Bulk mailing;<br>**3** – Template campaign;<br>**7** – Functional (service) campaign.
`msgType`                  | string  | Campaign message type.<br>Currently only "SMS" type is supported.
`rateLimit`                | integer | Limit on the number of messages sent during the period specified in the `ratePeriod` field.
`ratePeriod`               | integer | Period during which the number of SMS specified in the `rateLimit` field will be sent.
`sendStatus`               | string  | Campaign sending status:<br>**SENT** – campaign sent;<br>**DONE** – campaign completed.
`isDeleted`                | integer | Flag indicating that the campaign is deleted:<br>**0** – campaign available;<br>**1**– campaign deleted.
 `deferredToTs`            | string  | Date and time of the deferred sending of the campaign.<br>Format: `YYYY-MM-DD HH:MM:SS`.
 `createTs`                | string  | Date and time of campaign creation.<br>Format: `YYYY-MM-DD HH:MM:SS`.
 `startSendTs`             | string  | Date and time of the actual start of the campaign sending.<br>If sending has not started, this field contains NULL.<br>Format: `YYYY-MM-DD HH:MM:SS`.
 `endSendTs`               | string  | Date and time of the end of sending all campaign messages.<br>If message sending has not been completed, this field contains NULL.<br>Format: `YYYY-MM-DD HH:MM:SS`.
 `name`                    | string  | Campaign name.
 `from`                    | string  | [Sender ID](/en/help/api-docs/other#glossary-sender-id) selected for sending the campaign.
 `text`                    | string  | Full message text or template text with placeholders.
 `validity`                | integer | Maximum message delivery waiting time if the recipient cannot receive it immediately, in minutes from the moment of sending.
 `mclass`                  | integer | Class of the sent message:<br>**0** – messages displayed as a pop-up and not saved anywhere (flashSMS);<br>**1** – messages saved in the phone's Inbox folder. 
 `trackShortLinkRecipients`| integer | Whether the recipient tracking function is used:<br>**0** – function not used;<br>**1** – function used.
 `groups`                  | string  | IDs of [contact groups](/en/help/contact-book/contact-groups) used in the campaign, separated by commas.
 `globalComment`           | string  | Moderator's comment if the campaign is declined.
 `creationWay`             | integer | Campaign creation method:<br>**1** – using an Internet browser;<br>**5** – [functional (service) campaign](/en/help/api-docs/other#glossary-functional-campaign).
 `counters`                | array   | Various campaign counters described in the table [Fields of the `counters` object](#data-counters).

##### <span data-anchor="data-counters">Fields of the `counters` Object</span>
 
Field                 | Type      | Description
---------------------|----------|-----------
`updateTs`           | datetime | Time of the last counter update.<br>To reduce system load, counter updates may occur with a delay.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`totalNewSegNum`     | integer  | Total number of segments with status `NEW`.
`totalAcceptdSegNum` | integer  | Total number of segments with status `ACCEPTD`.
`totalDelivrdSegNum` | integer  | Total number of segments with status `DELIVRD`.
`totalRejectdSegNum` | integer  | Total number of segments with status `REJECTD`.
`totalExpiredSegNum` | integer  | Total number of segments with status `EXPIRED`.
`totalUndelivSegNum` | integer  | Total number of segments with status `UNDELIV`.
`totalDeletedSegNum` | integer  | Total number of segments with status `DELETED`.
`totalUnknownSegNum` | integer  | Total number of segments with status `UNKNOWN`.
`totalPdlivrdSegNum` | integer  | Total number of segments with status `PDLIVRD`.
`totalSegNum`        | integer  | Total number of segments in the campaign. Updated when recipients are added.
`totalNewMsgNum`     | integer  | Total number of messages with status `NEW`.
`totalAcceptdMsgNum` | integer  | Total number of messages with status `ACCEPTD`.
`totalDelivrdMsgNum` | integer  | Total number of messages with status `DELIVRD`.
`totalRejectdMsgNum` | integer  | Total number of messages with status `REJECTD`.
`totalExpiredMsgNum` | integer  | Total number of messages with status `EXPIRED`.
`totalUndelivMsgNum` | integer  | Total number of messages with status `UNDELIV`.
`totalDeletedMsgNum` | integer  | Total number of messages with status `DELETED`.
`totalUnknownMsgNum` | integer  | Total number of messages with status `UNKNOWN`.
`totalPdlivrdMsgNum` | integer  | Total number of messages with status `PDLIVRD`.
`totalMsgNum`        | integer  | Total number of messages (not segments). Updated during the processing (before sending) of campaign messages/segments.
`totalNewMsgCost`    | float    | Total cost of all segments with status `NEW`.
`totalAcceptdMsgCost`| float    | Total cost of all segments with status `ACCEPTD`.
`totalDelivrdMsgCost`| float    | Total cost of all segments with status `DELIVRD`.
`totalRejectdMsgCost`| float    | Total cost of all segments with status `REJECTD`.
`totalExpiredMsgCost`| float    | Total cost of all segments with status `EXPIRED`.
`totalUndelivMsgCost`| float    | Total cost of all segments with status `UNDELIV`.
`totalDeletedMsgCost`| float    | Total cost of all segments with status `DELETED`.
`totalUnknownMsgCost`| float    | Total cost of all segments with status `UNKNOWN`.
`totalPdlivrdMsgCost`| float    | Total cost of all segments with status `PDLIVRD`.
`totalCost`          | float    | Total campaign cost.
`recipientsRejected` | integer  | Number of rejected recipients (not included in the campaign). Updated when recipients are added.
