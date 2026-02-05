### Webhook Operation Details

- A webhook is sent **for one whole SMS message**, not for each of its segments.
- Notifications are sent **only upon receiving the final delivery status** of the SMS.
- You can create **multiple webhooks for the same event type**.
- Each webhook receives events for all SMS and forms of your account.
- A request is considered successfully delivered if the handler server returned an HTTP code `200–299` **no later than 5 seconds**.
- If a response is not received within 5 seconds or a code outside the `200–299` range is returned, the system will perform a retry.

Retry attempts:

- up to **10 attempts** are performed;
- the interval between attempts increases by 1 minute with each new attempt;
- after exhausting the attempts, the event is considered undelivered.
