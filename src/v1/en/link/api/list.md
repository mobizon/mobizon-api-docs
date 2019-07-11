### Getting of the list of links
{{EXAMPLE_QUERY}}

#### Request parameters

 Parameter       | Type    | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see [Search criteria](#list-criteria))
`pagination`     | array   | Pagination display options (see [Pagination display options](#list-pagination))
`sort`           | array   | Sorting options (see [Sorting options](#list-sort))

##### <span data-anchor="list-criteria">Search criteria</span>

 Parameter         | Type    | Description
-------------------|---------|-----------
`status`           | integer | Link status (***0*** - inactive, ***1*** - active)
`moderatorStatus`  | integer | Link's moderation status (***0*** - blocked, ***1*** - allowed)
`createTsFrom`     | datetime| Link creation date starting with (in format `YYYY-MM-DD HH:MM:SS`)
`createTsTo`       | datetime| Link creation date ending with (in format `YYYY-MM-DD HH:MM:SS`)
`code`             | string  | Search by a short link code
`comment`          | string  | Search by a comment
`query`            | string  | Free search by link's attributes. Your request can consist of several words, separated by a space.  The search will be carried out using the short link code, codes of the corresponding long tracking links and comment to the link. The required word combination should be included to any combination among the specified fields.

##### <span data-anchor="list-pagination">Pagination display options</span>

  Parameter        | Type    | Description
-------------------|---------|-----------
`pageSize`         | integer | Number of visible elements on the page
`currentPage`      | integer | Current page

##### <span data-anchor="list-sort">Sorting options</span>

 Parameter         | Description
-------------------|-----------
`id`               | Link ID
`status`           | Link status (***0*** - inactive, ***1*** - active)
`moderatorStatus`  | Link's moderation status  (***0*** - blocked, ***1*** - allowed)
`createTs`         | Link creation time
`expirationDate`   | Link expiry date (in format `YYYY-MM-DD`)
`code`             | Short link code
`fullLink`         | Original link


#### Server response

Data array

 Field           | Type    | Description
-----------------|---------|-----------
`items`          | array   | List of found links (see [List of links](#list-items))
`totalItemCount` | integer | Total number of the elements found


##### <span data-anchor="list-items">List of links</span>

Every link contains the following fields:

 Field             | Type    | Description
-------------------|---------|-----------
`id`               | integer | Link ID
`status`           | integer | Link status (***0*** - inactive, ***1*** - active)
`moderatorStatus`  | integer | Link's moderation status (***0*** - blocked, ***1*** - allowed)
`createTs`         | string  | Link creation time
`expirationDate`   | date    | Link expiry date (in format `YYYY-MM-DD`)
`code`             | string  | Short link code
`fullLink`         | string  | Original link
`shortLink`        | string  | Short link
`domainId`         | integer | Short link domain ID
`comment`          | string  | Comment
`moderatorComment` | string  | Moderator's comment