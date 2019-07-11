### Short link's data editing
{{EXAMPLE_QUERY}}

#### Request parameters

 Parameter | Type    | Description
-----------|---------|-----------
`id`       | integer | Link ID
`data`     | integer | Link parameters (see [Link parameters](#update-data)).

#### <span data-anchor="update-data">Link parameters</span>

  Parameter           | Type    | Description
----------------------|---------|-----------
`data[status]`        | integer | Link status (***0*** - inactive, ***1*** - active)
`data[expirationDate]`| date    | Link expiry date (in format `YYYY-MM-DD`), by default is not limited
`data[comment]`       | string  | Comment on link

#### Server response

string : Short link

#### Errors codes


Code| Description
----|----
{{API_VALIDATION}} | If any parameter contains invalid values.
{{API_RECORD_NOT_FOUND}} | If the link with specified ID was not found.

