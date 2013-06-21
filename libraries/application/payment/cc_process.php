<?php
/***********************************************************
DoDirectPaymentReceipt.php

Submits a credit card transaction to PayPal using a
DoDirectPayment request.

The code collects transaction parameters from the form
displayed by DoDirectPayment.php then constructs and sends
the DoDirectPayment request string to the PayPal server.
The paymentType variable becomes the PAYMENTACTION parameter
of the request string.

After the PayPal server returns the response, the code
displays the API request and response in the browser.
If the response from PayPal was a success, it displays the
response parameters. If the response was an error, it
displays the errors.

Called by DoDirectPayment.php.

Calls CallerService.php and APIError.php.

***********************************************************/

require_once('CallerService.php');
//session_start();

/**
 * Get required parameters from the web form for the request*/

$paymentType =urlencode($userinfo['paymentType']);
$firstName =urlencode($userinfo['b_firstname']);
$lastName =urlencode($userinfo['b_lastname']);
$temp_array=$GeneralObj->getCCOptions();
$creditCardType =urlencode($temp_array[$userinfo['card_type']]);
$creditCardNumber = urlencode($userinfo['card_number']);
$expDateMonth =urlencode($userinfo['card_expMonth']);
$email = urlencode($userinfo['email']);
// Month must be padded with leading zero
$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);

$expDateYear =urlencode( $userinfo['card_expYear']);
$cvv2Number = urlencode($userinfo['card_cvv2']);
$address1 = urlencode($userinfo['b_address']);
$city = urlencode($userinfo['b_city']);
$state =urlencode( $userinfo['b_state']);
$zip = urlencode($userinfo['b_zipcode']);
$amount = urlencode($userinfo['total_cost']);
$currencyCode = $AUTHORIZENET_CURRENCY;
$paymentType=urlencode($userinfo['paymentType']);

/* Construct the request string that will be sent to PayPal.
   The variable $nvpstr contains all the variables and is a
   name value pair string with & as a delimiter */
$nvpstr="&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=".$padDateMonth.$expDateYear."&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&EMAIL=$email&STREET=$address1&CITY=$city&STATE=$state".
"&ZIP=$zip&COUNTRYCODE=US&CURRENCYCODE=$currencyCode";
/* Make the API call to PayPal, using API signature.
   The API response is stored in an associative array called $resArray */
$resArray=hash_call("doDirectPayment",$nvpstr);

/* Display the API response back to the browser.
   If the response from PayPal was a success, display the response parameters'
   If the response was an error, display the errors received using APIError.php.
   */

$ack = strtoupper($resArray["ACK"]);
$error_msg = "";

// following code generate the error message
if($ack!="SUCCESS")
{
	if(isset($_SESSION['curl_error_no'])) { 
			$errorCode= $_SESSION['curl_error_no'] ;
			$errorMessage=$_SESSION['curl_error_msg'] ;	
			//session_unset();
		$error_msg .='Error:&nbsp;'.$errorMessage;
	 } else {
		//$error_msg .='Ack: '.$resArray['ACK'];
		//$error_msg .='Correlation ID: '.$resArray['CORRELATIONID'];
		//$error_msg .='Version: '.$resArray['VERSION'];
		$error_msg .='Error:<br>';
		$count=0;
		while (isset($resArray["L_SHORTMESSAGE".$count])){
			  $error_msg .= "&curren;&nbsp;".$resArray["L_LONGMESSAGE".$count]."<br>";
			  $count=$count+1;
		}//end while
	 }//end if
	$bill_output[code] = 0;
	$bill_output[billmes] = $error_msg;
	$bill_output['tTransDetails'] =$resArray["CORRELATIONID"];
 }
 else
 {
 	$bill_output[code] = 1;
	$bill_output[billmes] = " Approval Code: ".$mass[5];
	$bill_output['tTransDetails'] =$resArray["CORRELATIONID"];
	$bill_output[status] = 'Approved';
 }
?>
