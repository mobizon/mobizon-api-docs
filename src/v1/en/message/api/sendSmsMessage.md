### Sending of a single message
{{EXAMPLE_QUERY}}
This message allows to send a single message to a specified mobile phone number. 


#### Request parameters

  Parameter | Type    | Description 
------------|--------|-----------
`recipient` | string | SMS message recipient - number in international format, if the number contains `+` in the beginning, it should be encoded in the URL entity `%2B` or delete, leaving numbers only.
`text`      | string | SMS message text, encoded in the URL entity. If whilst attempting to send a message using a GET request, the system does not return the response with the message data, you should first check the presence of special characters in the request body, such as: `? / \ & + `and` [space] `.
`from`      | string | Sender's signature. It is ok not to specify it, then in case there isn't any valid signature, the general system signature will be used. <br>`Note:` The signature may be different for each operator and may be changed without a prior notice at any time. If there are any confirmed signatures, the one, for which the "By default" flag is set, will be used.
`params`    | array  | Advanced settings (see [Advanced settings](#send-sms-message-params)).


#### <span data-anchor="send-sms-message-params">Advanced settings</span>

 Parameter             | Type    | Description
-----------------------|---------|-------------
`params[name]`         | string  | Name fo the campaign
`params[deferredToTs]` | string  | Date and time of the campaign, if it is necessary to postpone the campaign until the specified time. Should start not later than 14 days and not earlier than an hour from the current time. Format: 2013-12-31 15:34:55
`params[mclass]`       | integer | The method of SMS processing by a mobile device. <br>***0*** - are displayed as a popup and are not saved (flashSMS), *is supported not by all phones*;<br>***1*** *(by default)*  - messages are saved to the `Incoming messages` folder in the recipient's phone;<br>***2*** - are saved to SIM-card;<br>***3*** - SIM Toolkit SMS
`params[validity]`     | integer | SMS message expiration time in minutes makes from 1 min to 3 days (4320 min) from the moment of sending. By default: 1440 (24 hours)


#### Server response

Field              | Type    | Description
-------------------|---------|-------------
campaignId         | integer | SMS campaign ID (using it, you can later check various parameters of the campaign, request a list of segments, their statuses and other information of the campaign module)
messageId          | integer | SMS message ID (using it, you can check the message delivery status with a help of [message::getsmsstatus](#GetSMSStatus)
status             | integer | SMS campaign sending status .<br>***1*** - campaign awaits moderation,<br>***2*** - campaign was sent without prior moderation


#### Errors codes

Code | Description
----|----
{{API_VALIDATION}} | If at least one parameter is invalid 
