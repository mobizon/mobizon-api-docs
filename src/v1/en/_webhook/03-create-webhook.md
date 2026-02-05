### How to create a Webhook

#### Step 1. Go to Settings

Go to **Control Panel → API → Webhooks** and click the **"Create Webhook"** button. The form for creating a new webhook will open.

<!-- Creation window screenshot -->

---

#### Step 2. Configure Parameters

In the webhook creation form, specify the following parameters:

##### Event Type

Determines the event in the Mobizon system upon which the webhook will be sent.

Available options:

- Form events
- SMS statuses

---

##### Data Transfer Format

The format in which the webhook data will be sent to your server:

- `raw`
- `xml`
- `json`

Choose the format depending on the capabilities of your handler.

---

##### Handler Address (URL)

The URL to which webhooks will be sent.

Restrictions:

- maximum URL length — **up to 1000 characters**;
- requests are sent **only by POST method**;
- **no more than one server redirect (HTTP 301 or 302)** is allowed.

**Important:**

- only server redirects are supported;
- redirect chains are not supported;
- if more than one redirect occurs, the notification is considered undelivered.

---

##### Secret Key

The secret key is used to verify the authenticity of the request.

Features:

- can contain any set of characters;
- maximum length — **255 characters**;
- not transmitted in the HTTP request;
- used only for generating and verifying the signature.

If the secret key is not set:

- the request signature is not generated;
- handler security must be ensured by other means (e.g., URL access restriction).

---

##### Webhook Activity

Check the **"Active"** flag if the webhook should start working immediately after creation.

---

#### Step 3. Saving

Click the **"Save"** button. The created webhook will appear in the list.
