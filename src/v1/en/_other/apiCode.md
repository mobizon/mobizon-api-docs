### API response codes

Код                                         | Тип     | Описание
--------------------------------------------|---------|----------------
<span data-anchor="api-code-0">0</span>     | integer | The operation completed successfully.
<span data-anchor="api-code-1">1</span>     | integer | Transmitted data validation error while creating or updating of any entity. The data field provides information on the fields incorrectly filled. Please correct mistakes and repeat the request with a new data.
<span data-anchor="api-code-2">2</span>     | integer | Requested entry was not found. It is likely to be deleted, the entry ID is incorrect or the user trying to access the entry does not have the appropriate access rights to it. 
<span data-anchor="api-code-3">3</span>     | integer | Unidentified application error occurred. Please contact the support team and let us know the details of the request for which it was received.
<span data-anchor="api-code-4">4</span>     | integer | Parameter "module" is incorrect. Please check the spelling accuracy in the API documentation.
<span data-anchor="api-code-5">5</span>     | integer | Parameter "method" is incorrect. Please check the spelling accuracy in the API documentation.
<span data-anchor="api-code-6">6</span>     | integer | Parameter "format" is incorrect. Please check the spelling accuracy in the API documentation.
<span data-anchor="api-code-8">8</span>     | integer | Login failed. Error occurs if: 1. Login details are incorrect. 2. When a user session has expired during the system operation or was forcibly closed by the server. For the detailed information see "message" field.
<span data-anchor="api-code-9">9</span>     | integer | Required method access error.
<span data-anchor="api-code-10">10</span>   | integer | Server saving data error directly during this operation. Usually this error is related to simultaneous data access from several clients or changes in the conditions for data saving in the process of saving.
<span data-anchor="api-code-11">11</span>   | integer | Some of the required parameters are missing in the request. Please check the spelling accuracy in the API documentation and add the required parameters to your request.
<span data-anchor="api-code-12">12</span>   | integer | The input parameter of the request does not comply with the specified conditions or restrictions. This error code occurs when a parameter violates restrictions when executing a request with parameters. It looks like an attribute validation error but can be received in requests not aimed at creation or modification of data.
<span data-anchor="api-code-13">13</span>   | integer | An attempt to request the API-server that does not serve this user. Should you receive this code, look for the correct domain in the "data" field.
<span data-anchor="api-code-14">14</span>   | integer | This error occurs if the user account was blocked or removed.
<span data-anchor="api-code-15">15</span>   | integer | Error occurred while performing of any operation not related to updating of data. Details of this error are listed in the "message" field of the API response.
<span data-anchor="api-code-30">30</span>   | integer | Excess of permissible operations limit error within a specific time interval. This error occurs due to excessively frequent requests to the same API method. In case it occurs, reduce the frequency of requests.
<span data-anchor="api-code-98">98</span>   | integer | The operation was not performed in full, but with part of the data. Usually, you get this code for any bulk operations, during the execution of which some elements were not processed due to errors or restrictions, but others were processed. Upon receipt of this code, you can check the information on processed and non-processed elements and look for the errors in the contents of the "data" field.
<span data-anchor="api-code-99">99</span>   | integer | None of the bulk operation elements was not processed. For the detailed information on errors in each specific element check the "data" field, for the general description of the error - the "message" field.
<span data-anchor="api-code-100">100</span> | integer | This code is not an error and means that the operation is executed as a background process. In this case "data" field contains the background process ID, the state of which can be checked using method Taskqueue::GetStatus.
<span data-anchor="api-code-999">999</span> | integer | General error. For details check the "message" field.
