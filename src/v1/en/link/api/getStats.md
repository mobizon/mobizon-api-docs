### Getting link's statistics
{{EXAMPLE_QUERY}}

#### Request parameters

 Parameter   | Type    | Description
-------------------|---------|-------------
`ids`              | array   | Links' IDs (maximum links number makes 5)
`type`             | string  | Statistic's type, possible values:<br>**monthly** - number of clicks and redirects on monthly basis, the maximum interval for getting statistics - 3 years<br>**daily** - number of clicks and redirects on daily basis, the maximum interval for obtaining statistics - 90 days<br>**hourly** - number of clicks and redirects on an hourly basis, the maximum interval for getting statistics - 1 week<br>**minute** - number of clicks and redirects by the minute, the maximum interval for getting statistics - 3 hours.
`criteria`         | array   | Search criteria (see [Search criteria](#get-stats-criteria)).

#### <span data-anchor="get-stats-criteria">Search criteria</span>

 Parameter   | Type    | Description
---------------------|---------|-------------
`criteria[dateFrom]` | string  | Retrieve statistics since<br>(date and time in a format `YYYY-MM-DD HH:ММ:SS`)
`criteria[dateTo]`   | string  | Retrieve statistics before<br>(date and time in a format `YYYY-MM-DD HH:ММ:SS`)

For time statistics **monthly**, **daily**, **hourly**, **minute**:
if search criteria `dateFrom` and `dateTo` are not set, the statistics will be retrieved for the last maximum possible interval.
if only the criterion `dateFrom` is set, or the period of time between `dateFrom` and `dateTo` exceeds maximum possible interval,
the statistics will be retrieved for the last maximum possible interval, starting with the date `dateFrom`,
if only one criterion `dateTo` is set, the statistics will be retrieved for the last maximum possible interval before the date`dateTo`

#### Server response
Data array

Field              | Type     | Description
-------------------|---------|-------------
`items`            | array   | Statistical data
`totals`           | string  | Counters


#### Errors codes

Code | Description
----|----
{{API_INCORRECT_PARAM}}  | If more than 5 link IDs are specified or the statistics' type is invalid
