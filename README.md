# About APP

This is a single page application.

The purpose of application is to present the tests and to test the users' knowledge.

Each user can attend to any test just once. After the test is completed, the app shows the success rate and the total numbers of correct answer to user. If the user tries to take same test again; a modal will be shown that contains the results of test which was taken before.

The control mechanism of that flow is being provided by http session. Since the test results are being kept in the http session, there is no need to register for taking any test. However, because of data is kept in session; that data is not persistent really. Some behaviours such as browsing in private, using different device etc. will cause the breaking the control mechanism.

--

Languages & Frameworks in the APP

+ PHP, Laravel, Javascript, Jquery, Html, Css, Bootstrap





