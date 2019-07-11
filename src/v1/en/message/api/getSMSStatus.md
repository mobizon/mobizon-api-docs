### Getting of SMS message delivery status report 
{{EXAMPLE_QUERY}}

The method accepts both a string with one message ID and an array of message IDs. Regardless of the type of the input parameter, the returned result is always represented as an array. If you send non-existent or not-owned by the user message IDs, the result will not contain information about these messages.


#### List of possible message statuses:

Status   | Final         | Description
---------|---------------|------------------------------------
`NEW`    |      no       | New message, not yet sent
`ENQUEUD`|      no       | Passed the moderation and queued for sending
`ACCEPTD`|      no       | Sent from the system and accepted by the operator for further sending to the recipient
`UNDELIV`|      yes      | Not delivered to the recipient
`REJECTD`|      yes      | Declined by the operator on one of a variety of reasons - the wrong recipient's number, forbidden text, etc.
`PDLIVRD`|      no       | Not all message segments were delivered to the recipient; some operators return a report only for the first delivered segment, that's why such a message  will change its status to `DELIVRD` after the expiration
`DELIVRD`|      yes      | Delivered to the recipient in full
`EXPIRED`|      yes      | Delivery failed because the message has expired (3 days by default)
`DELETED`|      yes      | Deleted due to restrictions and not delivered to the recipient

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
