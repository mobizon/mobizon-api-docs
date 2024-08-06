### Sending a Single SMS Message
{{EXAMPLE_QUERY}}

This method allows you to send a single SMS message to a specified mobile phone number.

#### Request Parameters

 Parameter   | Type    | Description  
------------|--------|-----------
`recipient` | string | The recipient's phone number for the SMS message.<br>The number must be in international format and contain only digits.<br>For example: {widget:example-phone}.<br>If the number has a `“+”` at the beginning, it should be encoded as `%2B` or removed, leaving only digits.
`text`      | string | The text of the SMS message, encoded in [URL encoding](/en/help/api-docs/other#urlencode).<br>If the system does not return a response with message data when attempting to send a message using a GET request, first check for special characters in the request body, such as: `?` `/` `\` `&` `+` and `[space]`.<br>The presence of such characters indicates that the text was not [encoded](/en/help/api-docs/other#urlencode).
`from`      | string | [Sender ID](/en/help/api-docs/other#glossary-sender-id).<br>To use your own sender ID, it must first be [registered](/en/help/sender-id/sender-id).<br>If the sender ID is not specified, the default sender ID selected in your account will be used.<br>If you do not have registered sender IDs or it is not possible to send with the specified sender ID, one of the [shared service sender IDs](/en/help/api-docs/other#glossary-shared-senderid) will be used if possible.<br>For more details about sender IDs, see the [“Sender IDs”](/en/help/api-docs/other#glossary-sender-id) section.
`params`    | array  | Additional parameters (see the table [Additional Parameters](#send-sms-message-params)).


#### <span data-anchor="send-sms-message-params">Additional Parameters</span>

Parameter               | Type     | Description
-----------------------|---------|-------------
`params[name]`         | string  | Campaign name.
`params[deferredToTs]` | string  | Date and time of deferred SMS message sending.<br>You can set the start of sending no earlier than one hour and no later than 14 days.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`params[mclass]`       | integer | Class of the sent message:<br>**0** – messages are displayed as a pop-up and not saved anywhere (flashSMS);<br>**1** – messages are saved in the phone's Inbox folder (default).
`params[validity]`     | integer | Maximum waiting time for message delivery if the recipient cannot receive it immediately.<br>For example, if the recipient's phone is turned off or out of network coverage.<br>Specified in minutes from the moment of sending: from 60 minutes (1 hour) to 1440 minutes (24 hours).


#### Server Response
In case of successful message sending, the response contains an array with the following fields:

Field               | Type     | Description
-------------------|---------|-------------
campaignId         | integer | ID of the created SMS campaign.
messageId          | integer | ID of the created SMS message.
status             | integer | Status of the SMS campaign sending.<br>**1** – campaign awaiting moderation;<br>**2** – campaign sent without moderation.


#### API Response Codes

Code | Description
----|----
{{API_OK}}         | SMS message successfully sent.
{{API_VALIDATION}} | If any parameter is specified incorrectly.
