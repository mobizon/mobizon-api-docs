### List of Possible SMS Statuses

Status   | Final | Description
---------|-------|------------------------------------
`NEW`    |  no   | New message, not yet sent.
`ENQUEUD`|  no   | Queued for sending.
`ACCEPTD`|  no   | Sent from the system and accepted by the operator for further forwarding to the recipient.
`UNDELIV`|  yes  | Not delivered to the recipient.
`REJECTD`|  yes  | Rejected by the operator for one of many reasons – incorrect recipient number, prohibited text, sender signature not registered, etc.
`PDLIVRD`|  no   | Not all segments of the message delivered to the recipient **(this status can only be for messages, not segments)**. Some operators return a report only on the first delivered segment, so such a message will transition to the status set for the first segment after the expiration of its lifetime.
`DELIVRD`|  yes  | Fully delivered to the recipient.
`EXPIRED`|  yes  | Delivery failed as the waiting period expired without the message being delivered to the recipient. Typically, delivery is impossible if the recipient's phone is turned off, out of network coverage, or the device memory is full. The maximum waiting time for delivery is 1 day from the moment of sending.
`DELETED`|  yes  | Deleted due to some restrictions on the operator's side and not delivered to the recipient.
