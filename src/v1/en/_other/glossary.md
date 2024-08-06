### Glossary

<span data-anchor="glossary-id">`ID`</span> – a unique identifier that allows unambiguous identification of the desired object: campaign, group, etc.

<span data-anchor="glossary-contact-card">`Contact Card`</span> – a record in the Contact Book containing customer data such as full name, email, date of birth, and other information. Must contain a phone number.

<span data-anchor="glossary-sender-id">`Sender ID (alphanumeric name)`</span> – displayed as the sender of SMS on the recipient's phone instead of a phone number.  
There are [several requirements](/en/help/sender-id/sender-id) for sender IDs.

<span data-anchor="glossary-shared-senderid">`Shared Sender ID (SMS sender)`</span> – one of the service signatures used when sending a message if the user has no signatures or the selected signature is not available for sending to the specified phone number.

<span data-anchor="glossary-recipient">`Recipient (subscriber)`</span> – a mobile network user to whose number the SMS message is sent.

<span data-anchor="glossary-shortlink">`Short Link`</span> – a shortened (alternative) URL for accessing a web page. 

Using a short link instead of a regular one minimizes unintended URL distortion – the short link is easier to remember, copy, or enter manually.

Statistical data is provided in a convenient form: you can see the number of clicks for the last 2 hours, day, week, 30 days, or all time (for more details, see the section on [short links](/en/help/url-shortener/how-to-shorten-url)).

Short links are also convenient to use in SMS. They allow you to reduce the cost of sending due to the smaller number of characters in the message.

When using a short link created in our service, you can enable the [recipient tracking](#glossary-recipienttracking) feature to see who clicked on the link.

<span data-anchor="glossary-personal-link">`Personal Link (recipient tracking link)`</span> – a special short link created using our service that allows tracking which specific recipients of the SMS campaign clicked on it. The link is unique for each individual SMS recipient.

<span data-anchor="glossary-recipienttracking">`Recipient Tracking Feature`</span> – a tool for collecting statistics on recipients who clicked on the short link included in the message.

This is a convenient and effective means for analyzing the target audience and evaluating the effectiveness of the SMS campaign.

The feature is available for SMS messages containing hyperlinks. To activate the feature, in the SMS Sending Form, click the button to replace the regular link with a short one and check if the "track recipients" option is selected.

<span data-anchor="glossary-dlr">`Delivery Report (DLR)`</span> – information from the mobile operator about the status of SMS delivery to the recipient.

<span data-anchor="glossary-sms-campaign">`SMS Campaign`</span> – allows you to group multiple recipients of a single SMS and analyze the results of the SMS campaign.

<span data-anchor="glossary-single-campaign">`Single Campaign`</span> – sending a message to one number.

<span data-anchor="glossary-mass-campaign">`Mass Campaign`</span> – sending a message to two or more numbers.

<span data-anchor="glossary-functional-campaign">`Functional (service) Campaign`</span> – includes functional or, in other words, service system messages, such as messages with a phone number confirmation code from forms.

<span data-anchor="glossary-template">`Template Campaign`</span> – a type of SMS campaign that uses a special message form containing placeholders that are replaced with personalized text for each recipient.

**Template Example**

Placeholders are placed in curly braces {}.

Template text with placeholders      | Text that will be delivered to the recipient    
-----------------|---------
Hello, {name}! Your balance on {date} is {balance}{currency}.     | Hello, Ivan! Your balance on 12.09.2019 is 15.50 UAH.  
{name}, the car has arrived ({carNumber}). Driver's phone: {driverPhone}.    | Alexey, the car has arrived (AA 4444). Driver's phone: 099 999 99 99.
We remind you that you have an appointment at {place}. Appointment date: {date}.    | We remind you that you have an appointment at Clinic on 11.11.2019 at 11:30.  

<span data-anchor="glossary-form">`Form`</span> – a convenient tool for collecting client data, conducting electronic surveys, forming a database of numbers for mailing, and many other tasks.

With Forms, your clients can subscribe to SMS mailings, news, promotions, etc.

Thanks to the flexible and intuitive field constructor, you can easily create a Form that is most effective for your tasks.

In addition, you can customize the Form's design: choose the color of the text, buttons, background, etc. 
For more details on creating Forms, see the [“Forms”](/en/help/forms/how-to-create-form) section.
