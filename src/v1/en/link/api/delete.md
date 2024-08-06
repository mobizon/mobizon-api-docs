### Deleting Short Links
{{EXAMPLE_QUERY}}

This method is intended for deleting short links.

#### Request Parameters

 Parameter | Type    | Description
----------|--------|-----------
`ids`     | array  | Link identifiers.

#### Server Response
Array of data

Field           | Type     | Description
---------------|---------|-------------
`processed`    | array   | Identifiers of deleted links.
`notProcessed` | array   | Identifiers of links that were not deleted.
