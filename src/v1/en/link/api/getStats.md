### Retrieving Click Statistics for Links
{{EXAMPLE_QUERY}}

This method is designed to retrieve click statistics for one or more short links by their [ID](/en/help/api-docs/other#glossary-id).

Data can be grouped by months, days, hours, minutes.

#### Request Parameters

 Parameter          | Type     | Description
-------------------|---------|-------------
`ids`              | array   | Link identifiers.<br>Maximum number of [IDs](/en/help/api-docs/other#glossary-id) in a request – 5.<br>Parameter syntax: `ids[]` for each identifier.
`type`             | string  | Type of requested statistics.<br>Allows you to get data in various time intervals:<br>**monthly** – number of clicks per month. Maximum interval for retrieving statistics – 3 years;<br>**daily** – number of clicks per day. Maximum interval for retrieving statistics – 90 days;<br>**hourly** – number of clicks per hour. Maximum interval for retrieving statistics – 1 week;<br>**minute** – number of clicks per minute. Maximum interval for retrieving statistics – 3 hours.
`criteria`         | array   | Search criteria (See table [Search Criteria](#get-stats-criteria)).

#### <span data-anchor="get-stats-criteria">Search Criteria</span>

Statistical data retrieval is based on the specified date and time.

 Parameter            | Type     | Description
---------------------|---------|-------------
`criteria[dateFrom]` | string  | Retrieve statistics starting from the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.
`criteria[dateTo]`   | string  | Retrieve statistics up to the specified date and time.<br>Format: `YYYY-MM-DD HH:MM:SS`.

**Important**: if the search criteria `dateFrom` and `dateTo` are not set, the `type` field statistics will be retrieved for the last maximum possible interval.

If only one criterion `dateFrom` is set or the time interval between `dateFrom` and `dateTo` exceeds the maximum allowed interval, statistics will be retrieved for the maximum allowed interval starting from the `dateFrom` date.

If only the `dateTo` criterion is set, statistics will be retrieved for the maximum possible period up to the `dateTo` date.

#### Server Response
Array of data:

Field               | Type     | Description
-------------------|---------|-------------
`items`            | array   | Statistical data.
`totals`           | string  | Total number of clicks for the requested period.

#### API Response Codes

Code | Description
----|----
{{API_OK}}  | Statistics successfully retrieved.
{{API_INCORRECT_PARAM}}  | If more than 5 link identifiers are specified or the type of statistics is incorrectly specified.
