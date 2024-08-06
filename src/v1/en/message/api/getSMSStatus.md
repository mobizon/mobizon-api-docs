### Retrieving SMS Delivery Status Report
{{EXAMPLE_QUERY}}

This method allows you to retrieve the current delivery status of one or more SMS messages.

Regardless of the type of input parameter, the returned result is always presented as an array.

If non-existent or unauthorized message identifiers are passed, the result will not contain information about these messages.

#### Request Parameters

 Parameter   | Type          | Description
------------|---------------|-----------
`ids`       | array string  | Message identifier(s).<br>An array or a string of identifiers separated by commas.<br>Maximum number of identifiers in one request is 100.

#### Server Response

Field           | Type     | Description
---------------|---------|-------------
`id`             | integer | Message identifier.
`status`         | string  | Message status.<br>See the table [List of Possible Message Statuses](/en/help/api-docs/other#SmsStatus).
`segNum`         | integer | Number of segments in this message.
`startSendTs`    | string  | Time the message sending started.<br>Format: `YYYY-MM-DD HH-MM-SS`.<br>If the message has not been sent yet, the field value will be NULL.
`statusUpdateTs` | string  | Time of the last status update of the message.<br>Format: `YYYY-MM-DD HH-MM-SS`.<br>If the message has not been sent yet, the field value will be NULL.

#### API Response Codes
Code | Description
----|----
{{API_OK}} | Delivery status report successfully retrieved.
{{API_RECORD_NOT_FOUND}} | If no message identifiers are specified.
{{API_INCORRECT_PARAM}}  | If more than 100 message identifiers are specified.
