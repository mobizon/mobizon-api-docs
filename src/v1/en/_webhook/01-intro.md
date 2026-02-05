### What is a Webhook and why is it needed

**Webhook** is a mechanism for automatically sending notifications from our service to your system (CRM, ERP, 1C, your own application, etc.) when certain events occur via HTTP(S) requests.

Instead of regularly polling the API (for example, checking SMS delivery status), your server receives an HTTP(S) request at the moment the event actually occurs.

Using webhooks allows you to:

- receive data in near real-time;
- reduce the load on both your system and the service API;
- simplify the integration architecture;
- accurately track final SMS delivery statuses or form events, such as submission, contact confirmation, or unsubscribing.
