### Getting of the background task progress
{{EXAMPLE_QUERY}}

#### Request parameters

  Parameter | Type    | Description
------------|---------|-----------
`id`        | integer | Background task ID

#### Server response
Data array

Field    | Type    | Description
---------|---------|-------------
progress | integer | The progress of the task on a scale of *0* to *100%*
status   | integer | Task status code:<br>***0*** - forward to launching,<br>***1*** - in progress,<br>***2*** - completed,<br>***3*** - declined

#### Errors codes

Code| Description
----|----
{{API_RECORD_NOT_FOUND}} | If the task with specified ID was not found.