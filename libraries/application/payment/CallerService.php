<?php

/****************************************************
CallerService.php

This file uses the constants.php to get parameters needed 
to make an API call and calls the server.if you want use your
own credentials, you have to change the constants.php

Called by TransactionDetails.php, ReviewOrder.php, 
DoDirectPaymentReceipt.php and DoExpressCheckoutPayment.php.

****************************************************/
require_once 'constants.php';

$API_UserName=API_USERNAME;


$API_Password=API_PASSWORD;


$API_Signature=API_SIGNATURE;


$API_Endpoint =API_ENDPOINT;


$version=VERSION;


$subject = SUBJECT;

//session_start();

/**
  * hash_call: Function to perform the API call to PayPal using API signature
  * @methodName is name of API  method.
  * @nvpStr is nvp string.
  * returns an associtive array containing the response from the server.
*/


function hash_call($methodName,$nvpStr)
{
    
	//declaring of global variables	
	global $API_Endpoint,$version,$API_UserName,$API_Password,$API_Signature,$nvp_Header;
	
        // echo $API_Endpoint.' >> '.$version.' >> '.$API_UserName.' >> '.$API_Password.' >> '.$API_Signature.' >> '.$nvp_Header;exit;  
	//setting the curl parameters.	
	// $PAYPAL_URL = 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=';
	
	$ch = curl_init();
        
	curl_setopt($ch, CURLOPT_URL,$API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	
	/* Add following line if SSL used and remove SIGNATURE parameter from $nvpreq variable
	curl_setopt($ch, CURLOPT_SSLCERT, '/path/to/cert_key_pem.txt');
	*/
	
    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php
    
	if(USE_PROXY)
	     curl_setopt($ch, CURLOPT_PROXY, PROXY_HOST.":".PROXY_PORT); 

	//NVPRequest for submitting to server
	$nvpreq = "METHOD=".urlencode($methodName)."&VERSION=".urlencode($version)."&PWD=".urlencode($API_Password)."&USER=".urlencode($API_UserName)."&SIGNATURE=".urlencode($API_Signature).$nvpStr;
	
       
	
	//setting the nvpreq as POST FIELD to curl
	curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

	//getting response from server
	$response = curl_exec($ch);
        //echo $response;
	//convrting NVPResponse to an Associative Array
	$nvpResArray = deformatNVP($response);
        
	$nvpReqArray = deformatNVP($nvpreq);
	$_SESSION['nvpReqArray'] = $nvpReqArray;
        //echo "<pre>";
        //print_r($nvpReqArray);

	if(curl_errno($ch)) {
	   
           //  echo 'om';
		// moving to display page to display curl errors
		  $_SESSION['curl_error_no']=curl_errno($ch) ;
		  $_SESSION['curl_error_msg']=curl_error($ch);
		  $location = "APIError.php";
                  header("Location: $location");
	 } else {
	   //echo 'out';
		 //closing the curl
			curl_close($ch);
	 }
	 //  exit;

return $nvpResArray;
}

/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
  * It is usefull to search for a particular key and displaying arrays.
  * @nvpstr is NVPString.
  * @nvpArray is Associative Array.
  */

function deformatNVP($nvpstr)
{

	$intial=0;
 	$nvpArray = array();


	while(strlen($nvpstr)){
		//postion of Key
		$keypos= strpos($nvpstr,'=');
		//position of value
		$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpstr,$intial,$keypos);
		$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
     }
     return $nvpArray;
}

?>
