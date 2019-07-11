### Creation of a new short link
{{EXAMPLE_QUERY}}

#### Request parameters

data : array Link parameters (compulsory parameter)

Parameter             | Type     | Description
----------------------|---------|-----------
`data[fullLink]`      | string  | Full link
`data[status]`        | integer | Link status (***0*** - inactive, ***1*** - active)
`data[expirationDate]`| date    | Link expiration date (in the format `YYYY-MM-DD`), by default is not limited
`data[comment]`       | string  | Comment to the link

#### Sever response
array : Short link data

Field      | Type     | Description
------------|---------|-------------
`id`        | integer | Link ID
`code`      | string  | Short link code
`shortLink` | string  | Short link


#### Errors codes

Code| Description
----|----
{{API_VALIDATION}} | If any of the parameters contains invalid values.
