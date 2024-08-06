### API Response Codes

Each API request response returns an array consisting of [three fields](/en/help/api-docs/sms-api#server-response-format), one of which is `code`. This field contains the request processing status and can serve as a guide for further actions by the client application. The following table shows the API codes and their meanings:

Code                                         | Description
--------------------------------------------|----------------
<span data-anchor="apiCode-0">0</span>     | Operation completed successfully.
<span data-anchor="apiCode-1">1</span>     | Validation error of the transmitted data during the creation or update of any entity. The `data` field contains information on which fields are filled incorrectly. Correct the errors and repeat the request with new data.
<span data-anchor="apiCode-2">2</span>     | The specified record was not found. Most likely it has been deleted, the record ID is incorrect, or the user trying to access this record does not have the necessary permissions.
<span data-anchor="apiCode-3">3</span>     | Unidentified application error. Contact support and provide details of the request during which it was received.
<span data-anchor="apiCode-4">4</span>     | Incorrect `module` parameter specified. Check the correctness of the parameter in the [API documentation](/en/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-5">5</span>     | Incorrect `method` parameter specified. Check the correctness of the parameter in the [API documentation](/en/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-6">6</span>     | Incorrect `format` parameter specified. Check the correctness of the parameter in the [API documentation](/en/help/api-docs/sms-api#required-api-query-parameters).
<span data-anchor="apiCode-8">8</span>     | Login error. Occurs in cases where:<ul><li>Login data is incorrect;</li><li>The user's session has expired or was forcibly closed by the server during system operation.</li></ul> More detailed information can be seen in the `message` field.
<span data-anchor="apiCode-9">9</span>     | Error accessing the specified API method.
<span data-anchor="apiCode-10">10</span>   | Error saving data on the server directly during this operation. This error is usually associated with simultaneous access to data from multiple clients or changes to data saving conditions during saving.
<span data-anchor="apiCode-11">11</span>   | Some required parameters are missing from the request. Check the correctness of the parameters in the [API documentation](/en/help/api-docs/sms-api#required-api-query-parameters) and complete the request with the necessary parameters.
<span data-anchor="apiCode-12">12</span>   | The input parameter of the request does not meet the established conditions or limitations. This error code occurs when a parameter violates restrictions during the execution of a request. It is similar to an attribute validation error but can be obtained in requests that do not create or modify data.
<span data-anchor="apiCode-13">13</span>   | Attempt to make a request to an API server that does not serve this user. If this code is received, the correct domain can be obtained in the `data` field.
<span data-anchor="apiCode-14">14</span>   | This error occurs if the user's account is blocked or deleted.
<span data-anchor="apiCode-15">15</span>   | Error during the execution of any operation not related to data update. Details of this error are specified in the `message` field of the API response.
<span data-anchor="apiCode-30">30</span>   | Exceeded permissible request rate limit. This error occurs when there are too frequent calls to the same API method within a certain period. Reduce the request frequency if this error occurs.
<span data-anchor="apiCode-98">98</span>   | The operation was not fully completed but only with some data. This code is usually returned during any mass operations, where some elements were not processed due to errors or restrictions, but some elements were processed. If this code is received, information about which elements were processed and which were not, along with the errors, can be obtained in the `data` field.
<span data-anchor="apiCode-99">99</span>   | None of the elements of the mass operation were processed. Detailed information about errors in each specific element can be obtained in the `data` field, and a general error description in the `message` field.
<span data-anchor="apiCode-100">100</span> | This code is not an error and means that the operation was sent for background execution. In this case, the `data` field contains the ID of the background operation, which can be tracked using the API [TaskQueue/GetStatus](/en/help/api-docs/taskqueue#GetStatus).
<span data-anchor="apiCode-999">999</span> | General service error. Details can be obtained in the `message` field.
