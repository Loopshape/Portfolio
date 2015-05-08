<h3>PHP • PayPal REST API - Small How to</h3>
<p><strong>
-------------------------------------------------------<br />
If you want to use ExpressCheckout via the REST API from Paypal, you can follow these steps to get a working API within your webapp.<br />
<br />
1. Install Composer, Curl and PHP on a Webserver<br />
<br />
2. a) Create a composer.json file with following data from the top of this page:<br /> 
<span class="bold">https://developer.paypal.com/webapps/developer/docs/api/</span><br />
<br />
2.b) Install the libraries with composer install<br />
<br />
2.c) Include the autoload.php from the Composer installation with a require_once.<br />
<br />
3.a) Setup the REST-API-SDK-PHP library files with your credentials from the Paypal developer site:<br /> 
<span class="bold">sdk_config.ini</span> and in the bootstrap.php that could be found in the folder <span class="bold">vendor/paypal/rest-api-sdk-php</span><br />
<br />
3.b) Set up a define command with a pointer to the sdk_config.ini file.<br />
<span class="bold">define('PP_CONFIG_PATH', ...path to the sdk_config.ini file...);</span><br />
<br />
4. Build a form with a PayPal-button and send the form parameters via $_POST to this file:<br /> 
<span class="bold">https://github.com/paypal/rest-api-sdk-php/blob/master/sample/payments/CreatePaymentUsingPayPal.php</span><br />
<br />
5. After successful payment from the Paypal website you have to redirect the user to this file:<br /> 
<span class="bold">https://github.com/paypal/rest-api-sdk-php/blob/master/sample/payments/ExecutePayment.php</span><br />
<br />
<br />
You are done. Hope this short HowTo was helpful.<br />
‪</strong>
<br />
<br />
#‎paypal‬ ‪#‎api‬ ‪#‎rest‬ ‪#‎howto‬ ‪#‎summary‬
</p>