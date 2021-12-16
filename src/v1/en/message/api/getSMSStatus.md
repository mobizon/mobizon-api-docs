### Getting of SMS message delivery status report 
{{EXAMPLE_QUERY}}

The method accepts both a string with one message ID and an array of message IDs. Regardless of the type of the input parameter, the returned result is always represented as an array. If you send non-existent or not-owned by the user message IDs, the result will not contain information about these messages.


#### List of possible message statuses

See [List of possible statuses of messages](/en/help/api-docs/other#SmsStatus) table.

#### Request parameters

  Parameter       | Type    | Description
------------|--------|-----------
`ids`       | array&nbsp;\|&nbsp;string | Message ID(s) is (are) an array or a string of Ids, separated by commas. Maximum equals to 100 characters.

#### Server response

Field           | Type    | Description
---------------|---------|-------------
`id`             | integer | Message ID
`status`         | string  | Message status
`segNum`         | integer | Number of segments in the message
`startSendTs`    | string  | Message sending start time
`statusUpdateTs` | string  | Last status update of the message

#### Errors codes
Code | Description
----|----
{{API_RECORD_NOT_FOUND}} | If none of the message ID was specified
{{API_INCORRECT_PARAM}}  | If more then 100 message Ids were specified.
