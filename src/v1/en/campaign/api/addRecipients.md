### Adding recipients to a bulk SMS campaign

{{EXAMPLE_QUERY}}

Within one request it is only allowed to send one of the following recipients’ data source:

- list of numbers / contact card ID / contact ID
- list of groups ID from the contact book
- file with the list of recipients.

If you try to send several different types of recipients at once, the error {{API_INCORRECT_PARAM}} will be returned. 

If you need to add recipients from multiple sources to the same campaign, please proceed with several requests.
When adding recipient numbers, contacts or contact cards, the maximum number of recipients in one request shouldn’t exceed 500 entries. If the limit is exceeded, an error {{API_INCORRECT_PARAM}} will be returned and none of the recipients will be added.

To add any desired number of contacts to the same campaign, divide the list into parts consisting of 500 or fewer elements and send each new part by a separate API request - the recipients will be added to the existing list unless the **replace=1** parameter is specified.

Uploading of numbers, contacts and contact cards is performed within the main webserver thread and returns the result for each processed recipient as an array (check the returned data format below).

Import from a contact group or file creates a background task (asynchronous loading) and returns its ID for further status tracking. In this case the API response code will be {{API_BACKGROUND_WAIT}}.

Mobile numbers you are sending must be entered in international format. All extraneous characters will be removed automatically.

Each number will be verified through sending of a message to it using the country code and operator prefix.

All non-verified numbers will be rejected with the corresponding error code (code), and for each added number the generated message ID (messageId) will be returned to enable further status request.

If not all imported recipients were added successfully (some errors occurred), then the API returns one of the following response codes:
- {{API_PARTIALLY_DONE}} - if not all recipients were added, but at least one recipient was verified
- {{API_NOTHING_DONE}} - if no recipient was verified.

While the recipients are being added, the campaign is blocked for any other adding recipients' request, therefore simultaneous import is impossible.


#### Request parameters

 Parameter             | Type          | Description
-----------------------|---------------|-----------
`id`                   | integer       | ID of the campaign, you want to add recipients to
`recipients`           | array\|string | Regular campain recipients can be sent as a:<br><ul><li> string with recipient numbers separated by commas or line breaks;</li><li>one-dimensional array, where each element corresponds to one recipient number;</li><li>two-dimensional array, where each element is itself an array, containing an element with the `recipient` key and the recipient's number as a value.</li></ul>Template campaign recipients must be sent as a two-dimensional array, where each element is itself an array, containing an element with the `recipient` key and the recipient's number as a value, it can also include (but not necessarily) elements with keys corresponding to the names of variables (placeholders) in the SMS text (without surrounding curly braces). <br> At the same time, if any of the placeholders contained in text was not passed, then processing will go on depending on the passed parameter `placeholdersFlag` (see the flag description below). Examples of requests are listed below.
`recipientsCardIds`    | array\|string | The array or the string of the contact cards' IDs from the contact book, separated by comma or line break, which will form the future campaign.
`recipientsContactIds` | array\|string | The array or the string of the contact' IDs from the contact book. <br>If the campaign is template, then in order to fill in the placeholders in the text  the data from the corresponding contact card, this contact belongs to, will be used. 
`recipientsGroupIds`   | array\|string | The array or the string of the contact groups' IDs from the contact book, separated by comma or line break, which will form the future campaign.
`recipientsFile`       | file          | The object of the file with the recipients is the **CSV** or **Excel** (only **XLS**) file with recipients' numbers in the international format. <br> For regular campaign the numbers are distributed one per line. <br> For template campaign numbers are distributed one by one in a row in any of the columns with the`recipient` header, other columns may contain placeholders. Column headers must correspond to the placeholders in the text of SMS (without surrounding curly braces). To name a placeholder use only Latin letters and numbers or characters '`_`' and '`-`'. If there are columns with the same headings, an error will be returned. <br> At the same time, if there are no corresponding columns for any of the placeholders contained in the text, then processing will occur depending on the `placeholdersFlag` value passed to the` params` parameter (see the flag description below).
`params`               | array         | Advanced settings (see [Advanced settings](#add-recipients-params) table).

#####  <span data-anchor="add-recipients-params">Advanced settings</span>

 Parameter             | Type     | Description
-----------------------|----------|-----------
`params[replace]`                  | integer | Indicates whether it is necessary to delete all already added recipients and to start adding again: <br> **0** - no, add recipients to previously added ones (default value); <br>**1** - yes, delete all before adding new ones;
`params[placeholdersFlag]`         | integer | Processing of the missing variables (placeholders) for the template campaign.<br>If no variable values for the placeholder are found, then one of the following scenario is possible:<br>**1** - the message is added to the campaign, but the placeholders remain in the text as they are (default scenario);<br>**2** — the message is added, but placeholders are deleted (if you just need to send, not to reject the message);<br>**3** — the message is rejected with an error indicating missing data for the placeholder in text.
`params[recipientsFileEncoding]`   | string  | Encoding in the recipient data file, available are the following encodings: **KOI8-R, CP866, WINDOWS-1252, WINDOWS-1251, UTF-8, ASCII, ISO-8859-1, UCS-2**, default is: **UTF-8**.
`params[recipientsFileSkipHeader]` | integer | Indicates whether it is necessary to skip the first line of the file and start processing from the second. Can be of use if recipients are uploaded from a file in which the first line contains the columns' names. In this case, it is better to skip the first line and start processing the file from the second one. Possible values are:<br>**0** - start from the first line (default value);<br>**1** - skip the first line of the file and start processing from the second (used by default within the template campaign); < br> For the template campaign the value of this parameter is always set to **1** and can't be redefined, since the first line must contain the names of the placeholder variables.
`params[recipientsFileDelimiter]`  | string  | Column separator in the recipients; data file, by default: **,** (comma)
`params[recipientsFileEnclosure]`  | string  | Text separator in the recipients data file, default: **'** (single quotes)

#### Server response

array | integer : When recipients are uploaded from a list of numbers, contacts or contact cards, an array is returned, each element of which contains data of the added recipients:

Field            | Type     | Description
----------------|---------|-----------
`recipient`     | string  | Number of the recipient being added to the campaign
`code`          | integer | Recipient adding result code:<br>**0** - the number was successfully added to the campaign<br>**1** - there is no phone number in the transferred data or the value is empty<br>**2** - no phone number found in the transferred data (most likely the data was incorrectly formatted)<br>**3** - the number doesn't correspond to the international format requirements<br>**4** - the number was already added to the campaign (deletion of duplicates from a campaign)<br>**5** - the number is included to the stop-list (it can be either your stop-list or the system stop-list)<br>**6** - sending to the country of destination is limited by your account settings<br>**7** - it is impossible to identify the operator and/or the country of destination<br>**8** - the system is not able to send to this operator, please contact our technical support to clarify the possibility to send it <br>**20** - sent data does not contain all necessary placeholders (if `placeholdersFlag` is set to `1` value)<br>**30** - contact card was not found in the contact book (`recipient` equals to `null`)<br>**31** - contact card does not contain a mobile number (`recipient` equals to`null`)<br>**32** - contact was not found in the contact book (`recipient` equals to`null`)<br>**51** - for technical reasons it is currently impossible to create a short link<br>**99** - system error adding recipient number
`messageId`     | integer | The identifier of the added message; if the number was added, by the specified identifier you can check the status of the message.
`number`        | integer | Initial value of the recipient's number, added by the user (if the recipient's number was transmitted)
`contactId`     | integer | The identifier of the added contact (when `recipientsContactIds` was sent)
`contactCardId` | integer | The identifier of the added contact card(when `recipientsCardIds`was sent)

When you upload a recipients' file or a list of contact groups, the numeric identifier of the background  recipients' adding task is returned. Details for tasks servicing are to be checked [here](taskqueue).

#### Error codes

Code                     | Description
-------------------------|----
{{API_VALIDATION}}       | If any parameter contains invalid values. 
{{API_RECORD_NOT_FOUND}} | If the campaign with specified ID is not found.
{{API_DATA_UPDATE}}      | If the specified campaign is blocked by another recipients' adding process or campaign status doesn't allow adding of recipients.
{{API_INCORRECT_PARAM}}  | If none of the recipients type is sent or multiple types of recipients are sent in a single request. 
{{API_PARTIALLY_DONE}}   | If at least one of all sent recipients is not added to the campaign. 
{{API_NOTHING_DONE}}     | If in the query processing result none of the recipients is added to the campaign.
{{API_BACKGROUND_WAIT}}  | If the background recipients' adding task was started. Details for tasks servicing are to be checked [here](taskqueue).

#### Examples

##### Adding recipient's numbers to a bulk SMS campaign.
To add the list of recipients to the campaign, send the array, containing them,  like this:

```
recipients[]=380971112233&recipients[]=79101112233&recipients[]=77071112233
```

or like that:

```
recipients=380971112233,79101112233,77071112233
```

Both entry formats are identical.

##### Adding data to the template campaign.

Let's suppose, that SMS contains the following text: `Hello, {name}! Your balance as at {date} equals to {balance}{currency}.`
In this case parameter `recipients` should send these types of data:

```
recipients[0][recipient]=380971112233
&recipients[0][name]=%D0%92%D0%B0%D1%81%D0%B8%D0%BB%D0%B8%D0%B9
&recipients[0][date]=26.10.17
&recipients[0][balance]=123.45
&recipients[0][currency]=%D0%B3%D1%80%D0%BD
&recipients[1][recipient]=380971112255
&recipients[1][name]=%D0%9E%D0%BB%D1%8C%D0%B3%D0%B0
&recipients[1][date]=26.10.17
&recipients[1][balance]=3222.99
&recipients[1][currency]=%D1%80%D1%83%D0%B1
&recipients[2][recipient]=4901122211112
&recipients[2][name]=Markus
&recipients[2][date]=26.10.17
&recipients[2][balance]=555.45
&recipients[2][currency]=eur
```


All data in the HTTP request fields sent to the server should be prior encoded in the URL encoded string (each programming language has a corresponding function for this).
