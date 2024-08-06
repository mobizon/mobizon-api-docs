### Getting Campaign Basic Data
{{EXAMPLE_QUERY}}

This method allows you to get the basic data of a created campaign by its [ID](/en/help/api-docs/other#glossary-id).

#### Request Parameters

 Parameter     | Type     | Description
--------------|---------|-----------
`id`          | integer | Campaign identifier.

#### Server Response

An array of data containing the following fields:

Field           | Type     | Description
---------------|---------|-----------
`id`           | string  | Campaign identifier.
`moderationStatus`         | string  | Current moderation status:<br>**MODERATION** – the campaign is under moderation;<br>**DECLINED** – the campaign is declined by the moderator;<br>**READY_FOR_SEND** – the campaign is approved by the moderator;<br>**AUTO_READY_FOR_SEND** – the campaign is sent without moderation.
`commonStatus` | string  | Current campaign status:<br>**MODERATION** – the campaign is under moderation;<br>**DECLINED** – the campaign is declined by the moderator (the reason for the decline is specified in the globalComment field);<br>**READY_FOR_SEND** – the campaign is ready to be sent but has not started yet;<br>**RUNNING** – the campaign is in the process of sending;<br>**SENT** – the campaign is fully sent, but not all messages have received a delivery report from the mobile operator yet;<br>**DONE** – the campaign is completely finished: all final delivery reports have been received, and the counters contain final values.
`groupsList`   | array  | List of contact groups included in the campaign.<br>For each group, it contains:<br>**id** – group number;<br>**name** – group name;<br>**cardsCnt** – the number of contacts in the group available for sending messages.<br>If groups were not used in the campaign, this field will be empty.
`type`         | integer | Campaign type:<br>**1** – Single message (sending to one number);<br>**2** – Mass mailing;<br>**3** – Template campaign;<br>**7** – Functional (service) campaign.
`msgType`      | string | Type of campaign messages.<br>Currently, only the "SMS" type is supported.
`rateLimit`    | integer | The limit on the number of messages sent over the period specified in the `ratePeriod` field.
`ratePeriod`   | integer | The period in seconds over which the number of SMS specified in the `rateLimit` field will be sent.
`sendStatus`   | string | Campaign send status:<br>**SENT** – the campaign is sent;<br>**DONE** – the campaign is completed.
`isDeleted`    | integer | Flag indicating that the campaign is deleted:<br>**0** – the campaign is available;<br>**1** – the campaign is deleted.
`deferredToTs` | string  | The date and time of the deferred campaign send.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`createTs`     | string  | The date and time of the campaign creation.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`startSendTs`  | string  | The date and time of the actual start of the campaign send.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`endSendTs`    | string  | The date and time of the end of sending all campaign messages.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`name`         | string  | Campaign name.
`from`         | string  | [Sender ID](/en/help/api-docs/other#glossary-sender-id) chosen for sending the campaign.
`text`         | string  | Full message text or template text with placeholders.
`validity`     | integer | The maximum waiting time for message delivery if the recipient cannot receive it immediately, in minutes from the time of sending.
`mclass`       | integer  | The class of the sent message:<br>**0** – messages are displayed as a pop-up window and are not saved anywhere (flashSMS);<br>**1** – messages are saved to the phone's Inbox folder.
`trackShortLinkRecipients` | integer | Whether the recipient tracking feature was used:<br>**0** – the feature was not used;<br>**1** – the feature was used.
`groups`         | string  | Identifiers of [contact groups](/en/help/contact-book/contact-groups) used in the campaign, separated by commas.
`globalComment`  | string  | Moderator comment if the campaign is declined.





