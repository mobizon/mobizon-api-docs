### Creating of a new campaign
{{EXAMPLE_QUERY}}

This method allows you to create a new [SMS-campaign](/en/help/api-docs/other#glossary-sms-campaign).
After creating a campaign, [add the recipients](#addRecipients) to it and then [send](#send) it.

#### Request parameters

**data** `array` – Campaign parameters 

 Parameter                       | Type     | Description
--------------------------------|---------|-----------
`data[name]`                    | string  | The name of the campaign.<br>Using this field, it is more convenient to navigate through the campaigns being created.<br>For example: «Black Friday» discounts» or «Negative account balance reminder».<br>The maximum length of the campaign name is 255 characters. 
`data[text]`                    | string  | Text of SMS message to be sent.<br>For a [template campaign](/en/help/api-docs/other#glossary-template) (data[type]=3), this text must contain variables that will be replaced by values unique to each recipient. The variable should be written by symbols of a Latin letters, numbers and symbols `"_"`, `"-"`, and is framed in curly braces, for example: `{name}` or `{clientBalance} `.<br>In the text of the message you can use [short links](/en/help/api-docs/other#glossary-shortlink) and the [function of tracking recipients](/en/help/api-docs/other#glossary-recipienttracking) to find out which of the recipients followed your link.
`data[type]`                    | integer | Type of campaign:<br>`1` – Single message (sending to one number);<br>`2` – Mass campaign (set by default);<br>`3` – Template campaign (the text of the message can contain placeholders, which will be replaced with unique text for each recipient).
`data[from]`                    | string  | [Sender's signature](/en/help/api-docs/other#glossary-sender-id).<br>To use the sender's own signature, it must be *registered* in advance.<br>If no signature is specified, the default signature or standard service signature will be used.
`data[rateLimit]`               | integer | Limitation of the number of messages sent during the period of time specified in the field `ratePeriod`.<br>This option allows you to slow down the speed of sending a large SMS-campaign in order to distribute the load on your Call Center.<br>Send speed limit – no more than 100 messages per second in recalculation for per second sending.<br>Messages are sent at equal intervals, in packets of 10 pieces, based on the specified `rateLimit` for `ratePeriod`. For example, if you specify the speed of 600 and the period of 60, then every second will be sent 600/60 = 10 SMS.
`data[ratePeriod]`              | integer |  Time period in seconds for which the quantity of SMS specified in the `rateLimit` field will be sent.<br>Maybe equal:<br>`60` – 1 minute;<br>`3600` – 1 hour;<br>`86400` – 1 day.
`data[deferredToTs]`            | string  |  Date and time of the deferred sending of the campaign.<br>It is possible to set the beginning of sending not earlier than one hour, and not later than 14 days.<br>Format: `YYYY-MM-DD HH:MM:SS`. 
`data[mclass]`                  | integer |  The class of the message that is being sent:<br>`0` – messages are displayed in a pop-up window and are not saved anywhere (flashSMS);<br>`1` – messages are saved in the phone's Inbox (set by default).
`data[validity]`                | integer |  Maximum waiting time for the message to be delivered if the recipient cannot accept it immediately.<br>For example, if your phone is turned off or out of range.<br>It is specified in minutes from the moment of sending: from `60 ` (1 hour) to `1440 ` (24 hours).
`data[trackShortLinkRecipients]`| integer |  [Function of tracking recipients](/en/help/api-docs/other#glossary-recipienttracking).<br>Available only if the text of the message (in the field `data[text]`) contains [short links](/en/help/api-docs/other#glossary-shortlink) created in *our service*.<br>`0` – do not use the function (set by default);<br>`1` – to use the function.

#### Server response
integer : campaign ID, if the campaign was successfully created


#### API response codes

Code | Description
----|----
{{API_OK}}         | The campaign is successfully created.
{{API_VALIDATION}} | If any of the parameters contains invalid values.
