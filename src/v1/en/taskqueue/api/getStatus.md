### Getting Background Task Progress
{{EXAMPLE_QUERY}}

This method allows you to get the progress of a background task by its [ID](/en/help/api-docs/other#glossary-id).
Our service uses background tasks so that your processes do not have to wait for the completion of a long request in cases such as: 
<ul>
<li>Uploading recipients to an SMS campaign;</li>
<li>Importing contacts into the address book;</li>
<li>Creating reports on campaigns and messages.</li>
</ul> This request should be sent no more than once per second.

#### Request Parameters

 Parameter   | Type     | Description
-------------|----------|-------------
`id`         | integer  | Identifier of the background task.

#### Server Response
Data array:

Field     | Type     | Description
----------|----------|-------------
progress  | integer  | Progress of the task on a scale from 0 to 100%.
status    | integer  | Task status code:<br>**0** – waiting to start;<br>**1** – in progress;<br>**2** – completed;<br>**3** – rejected.

#### API Response Codes
Code | Description
-----|------------
{{API_OK}} | Background task progress successfully retrieved.
{{API_RECORD_NOT_FOUND}} | If the task with the specified identifier is not found.
