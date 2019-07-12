### Creating of a new campaign
{{EXAMPLE_QUERY}}

This method creates a new campaign with the specified parameters, then you can add recipients to it using the method of recipients' uploading.

#### Request parameters

data : array Campaign parameters (compulsory parameter)

 Parameter                       | Type     | Description
--------------------------------|---------|-----------
`data[name]`                    | string  | Campaign name
`data[text]`                    | string  | Full text of the message or template text with placeholders.<br>Placeholders should be framed with curly brackets {}, for placeholder text it is only allowed to use Latin letters and numbers or characters '`_`', '`-`', which will later be replaced with a unique text for each message. To create a template campaign, you also need to pass the appropriate campaign `type`. If there are short links in the text and the recipient tracking is enabled (`trackShortLinkRecipients` flag), those short links that need to be monitored should be framed with placeholders [[...]] (two square quotes). Such links will be replaced with links containing the recipient tracking code, and placeholders will be removed.<br>For example, a message with the text: "Simple short link - http://mbzn.co/FbT, link with recipient tracking - [[http://mbzn.co/FbT]" will be sent to the recipient's phone as:" Simple short link - http://mbzn.co/FbT, recipient tracking link - http://mbzn.co/XxDxSa2A". The recipient tracking code length is always fixed and equals to 8 characters.
`data[type]`                    | integer | Campaign type, ***2*** - regular, ***3*** - template, default: 2. When creating template campaign type, do not forget to include placeholders in the text.
`data[from]`                    | string  | Sender's signature, displayed on the recipient's phone.
`data[rateLimit]`               | integer | Sending limit by the quantity of messages. It is used together with the `ratePeriod` parameter. Allows you to prolongate the campaign to provide gradual receipt of messages by subscribers.
`data[ratePeriod]`              | integer | Sending limit by the time period. To be ignored, if `rateLimit` is not set or equals to ***0***.
`data[deferredToTs]`            | string  | Date and time of the campaign, if you want to start sending at a specified time.It should start not later than in 14 days and not earlier than in an hour from the actual time. Format: `2013-12-31 15:34:55`
`data[mclass]`                  | integer | ***0, 1, 2, 3***, default ***1*** - messages are saved to the Incoming messages folder in the phone, ***0*** - are displayed as a popup and are not saved (flashSMS), is supported not by all phones, ***2*** - are saved to SIM-card, ***3*** - SIM Toolkit SMS
`data[ttl]`                     | integer | Message lifetime in minutes makes from 1 min to 3 days (4320 min) from the moment of sending (the parameter is only available for SMS campaigns)
`data[trackShortLinkRecipients]`| integer | To track specified short links' recipients - ***1***, by default is not tracked - ***0***

#### Server response
integer : campaign ID, if the campaign was successfully created


#### Error codes

Code | Description
----|----
{{API_VALIDATION}} | If any of the parameters contains invalid values.
