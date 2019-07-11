### List of possible SMS message statuses

Status   | Final         | Description
---------|---------------|------------------------------------
`NEW`    |      no       | New message, not yet sent
`ENQUEUD`|      no       | Passed the moderation and queued for sending
`ACCEPTD`|      no       | Sent from the system and accepted by the operator for further sending to the recipient
`UNDELIV`|      yes      | Not delivered to the recipient
`REJECTD`|      yes      | Declined by the operator on one of a variety of reasons - the wrong recipient's number, forbidden text, etc.
`PDLIVRD`|      no       | Not all message segments were delivered to the recipient (this status applies to messages only, but not to segments). Some operators return a delivery report only for the first segment of long message, that's why status of such messages will be changed to `DELIVRD` after the expiration period
`DELIVRD`|      yes      | Delivered to the recipient in full
`EXPIRED`|      yes      | Delivery failed because the message has expired (3 days by default)
`DELETED`|      yes      | Deleted due to restrictions and not delivered to the recipient
