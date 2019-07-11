### Short links deletion
{{EXAMPLE_QUERY}}

#### Request parameters

 Parameter | Type    | Description
----------|--------|-----------
`ids`     | array  | Links' IDs


#### Sever response
Data array
 
Field          | Type    | Description
---------------|---------|-------------
`processed`    | array   | Deleted links' IDs
`notProcessed` | array   | Undeleted links' IDs

