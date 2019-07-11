### Getting of the main campaign data 
{{EXAMPLE_QUERY}}

#### Request parameters

Parameter   | Type    | Description
--------------|---------|-----------
`id`          | integer | Campaign ID

#### Sever response

Data array

Field          | Type     | Description
---------------|---------|-----------
`name`         | string  | Campaign name
`text`         | string  | Full message text or template text with placeholders, which will later be replaced with a unique text for each message
`msgType`      | string  | Campaign message type, at the moment only SMS is supported
`from`         | string  | Sender's signature
`rateLimit`    | integer | Sending limit by the quantity
`ratePeriod`   | integer | Sending limit for the time period. To be ignored, if `rateLimit` is not set or equals to 0
`deferredToTs` | string  | Date and time of the campaign, when it is necessary to start sending in the specified time. It should start not later than in 14 days and not earlier than in an hour from the actual time. Format: `2013-12-31 15:34:55`
`mclass`       | integer | ***0, 1, 2, 3***, by default ***1*** - messages are saved to the Incoming messages folder in the phone, ***0*** - are displayed as a popup and are not saved (flashSMS), is supported not by all phones, ***2*** - are saved to SIM-card, ***3*** - SIM Toolkit SMS
`ttl`          | integer | Message lifetime in minutes makes from 1 min to 3 days (4320 min) from the moment of sending (the parameter is only available for SMS campaigns)




