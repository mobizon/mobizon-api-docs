### Webhook Processing Recommendations

- The same webhook may be sent multiple times (in case of retry delivery attempts).
- It is recommended to store `eventId` and not process the same event again.
- Do not perform long operations when processing the request.
- Optimal scenario:
    - verify the signature;
    - save the event;
    - quickly return HTTP 200;
    - perform further processing asynchronously.
