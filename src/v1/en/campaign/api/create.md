### Creating a New Campaign
{{EXAMPLE_QUERY}}

This method allows you to create a new [SMS campaign](/en/help/api-docs/other#glossary-sms-campaign).
After creating the campaign, you need to [add recipients](#AddRecipients), and then [send](#Send) it.

#### Request Parameters

**data** `array` – Campaign parameters 

 Parameter                       | Type     | Description
--------------------------------|---------|-----------
`data[name]`                    | string  | Campaign name.<br>This field makes it easier to navigate through the created campaigns.<br>For example: "Black Friday Discounts" or "Reminder of Negative Balance".<br>The maximum length of the campaign name is 255 characters. 
`data[text]`                    | string  | Text of the SMS message to be sent.<br>For [template campaigns](/en/help/api-docs/other#glossary-template) (data[type]=3), this text should contain variables that will be replaced with values unique to each recipient. The variable should be written with Latin letters, numbers, and symbols `«_»` ,`«-»`, and enclosed in curly braces, for example: `{name}` or `{clientBalance}`.<br>[SMS text requirements](/en/help/send-sms/sms-length-and-symbols).<br>In the message text, you can use [short links](/en/help/api-docs/other#glossary-shortlink) and [recipient tracking feature](/en/help/api-docs/other#glossary-recipienttracking) to see who among the recipients clicked on your link.
`data[type]`                    | integer | Campaign type:<br>**1** – Single message (sent to one number);<br>**2** – Mass mailing (set by default);<br>**3** – Template campaign (the message text may contain placeholders that will be replaced with text unique to each recipient).
`data[from]`                    | string  | [Sender ID](/en/help/api-docs/other#glossary-sender-id).<br>To use a custom sender ID, it must be [registered](/en/help/sender-id/sender-id) in advance.<br>If the sender ID is not specified, the default or standard service sender ID will be used.
`data[rateLimit]`               | integer | The limit on the number of messages sent over the period specified in the `ratePeriod` field.<br>This option allows you to slow down the speed of sending a large SMS mailing to distribute the load on your Call Center.<br>The sending speed limit is no more than 100 messages per second when calculated per second.<br>Messages are sent at equal intervals in batches of 10, based on the specified `rateLimit` per `ratePeriod`. For example, if you specify a speed of 600 and a period of 60, 600/60=10 SMS will be sent each second.
`data[ratePeriod]`              | integer |  The period in seconds over which the number of SMS specified in the `rateLimit` field will be sent.<br>It can be:<br>**60** – 1 minute;<br>**3600** – 1 hour;<br>**86400** – 1 day.
`data[deferredToTs]`            | string  |  Date and time of the deferred campaign send. <br>The start of sending can be set no earlier than an hour later, and no later than 14 days.<br>Format: `YYYY-MM-DD HH:MM:SS`. 
`data[mclass]`                  | integer |  The class of the sent message:<br>**0** – messages are displayed as a pop-up window and are not saved anywhere (flashSMS);<br>**1** – messages are saved to the phone's Inbox folder (default).
`data[validity]`                | integer |  The maximum waiting time for message delivery if the recipient cannot receive it immediately.<br>For example, if the phone is off or out of network coverage.<br>Specified in minutes from the time of sending: from **60** (1 hour) to **1440** (24 hours).
`data[trackShortLinkRecipients]`| integer |  [Recipient tracking feature](/en/help/api-docs/other#glossary-recipienttracking).<br>Available for use only if there are [short links](/en/help/api-docs/other#glossary-shortlink) created in [our service](/en/help/url-shortener/how-to-shorten-url) in the message text (in the `data[text]` field).<br>**0** – do not use the feature (default);<br>**1** – use the feature.

#### Server Response
`integer` – campaign identifier if it is successfully created.

#### API Response Codes

Code | Description
----|----
{{API_OK}}         | The campaign has been successfully created.
{{API_VALIDATION}} | If any parameters contain invalid values.
