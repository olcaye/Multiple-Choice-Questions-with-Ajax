# About APP

This is a single page application.

The purpose of application is to present the tests and to test the users' knowledge.

Each user can attend to any test just once. After the test is completed, the app shows the success rate and the total numbers of correct answer to user. If the user tries to take same test again; a modal will be shown that contains the results of test which was taken before.

The control mechanism of that flow is being provided by http session. Since the test results are being kept in the http session, there is no need to register for taking any test. However, because of data is kept in session; that data is not persistent really. Some behaviours such as browsing in private, using different device etc. will cause the breaking the control mechanism.

[View APP on Live](http://ec2-34-245-204-97.eu-west-1.compute.amazonaws.com/survival/public/)


During your visit, may be If you need to reset the test results; you can use the **/flush** endpoint. 


---

<dl>
  <dt>Languages & Frameworks in the APP</dt>
  <dd>PHP 8</dd>
  <dd>Laravel 9</dd>
  <dd>JS, jQuery</dd>
  <dd>HTML5, CSS3</dd>
  <dd>Bootstrap 5</dd>
</dl>




