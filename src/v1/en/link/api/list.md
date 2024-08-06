### Getting List of Links
{{EXAMPLE_QUERY}}

This method allows you to get a list of created short links. The search can be performed by [ID](/en/help/api-docs/other#glossary-id) and short link fields.

#### Request Parameters

 Parameter        | Type     | Description
-----------------|---------|-----------
`criteria`       | array   | Search criteria (see the table [Search Criteria](#list-criteria)).
`pagination`     | array   | Pagination parameters (see the table [Pagination Parameters](#list-pagination)).
`sort`           | array   | Sorting parameters (see the table [Sorting Parameters](#list-sort)).

#### <span data-anchor="list-criteria">Search Criteria</span>

Information about the fields of the short link by which the search is performed.
The search can be done by one field or a combination of fields.

 Parameter                    | Type     | Description
-----------------------------|---------|-----------
`criteria[status]`           | integer | Search by short link status:<br>**0** – link is inactive;<br>**1** – link is active. 
`criteria[moderatorStatus]`  | integer | Search by link moderation status:<br>**0** – blocked;<br>**1** – approved.
`criteria[createTsFrom]`     | datetime | Search by link creation date, starting from the specified date.<br>Format: `YYYY-MM-DD`.
`criteria[createTsTo]`       | datetime | Search by link creation date and time up to the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[query]`            | string   | Search by various link attributes.<br>The search can be performed by:<br>Short link code;<br>Recipient tracking code;<br>Short link comment.

#### <span data-anchor="list-pagination">Pagination Parameters</span>

These parameters are intended for structured (partial) output of the requested information.

 Parameter                 | Type     | Description
--------------------------|---------|-----------
`pagination[pageSize]`    | integer | Number of items displayed per page (25, 50, 100).
`pagination[currentPage]` | integer | Current page <br>Page numbering starts from 0.

#### <span data-anchor="list-sort">Sorting Parameters</span>

These parameters allow you to sort the search results by one of the fields in ascending (ASC) or descending (DESC) order.

***For example:***
 
Sort by short link code in ascending order – `sort[code]=ASC`.<br>
Sort by original link in descending order – `sort[fullLink]=DESC`.

 Parameter              | Description
-----------------------|-----------
`sort[createTs]`       | Sort by link creation date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`sort[expirationDate]` | Sort by link expiration date.<br>Format: `YYYY-MM-DD`.
`sort[clickCnt]`       | Sort by number of clicks.
`sort[code]`           | Sort by short link code.
`sort[fullLink]`       | Sort by original link.

#### Server Response

Array of data:

 Field            | Type     | Description
-----------------|---------|-----------
`items`          | array   | List of found links.<br>For a description of the short link fields, see the description of the [Link/Get](/en/help/api-docs/link#Get) method.
`totalItemCount` | integer | Total number of found items.
