<?

//echo "<pre>";
//print_r($_SESSION);exit;
error_reporting(0);
require_once(TPATH_CLASS_APP.'/payment/CallerService.php'); 
require_once(TPATH_CLASS_APP.'/payment/constants.php'); 
include_once(TPATH_CLASS_APP."/Shopcart.class.php");
$Cartobj = new Cart();

$API_UserName=API_USERNAME;
$API_Password=API_PASSWORD;
$API_Signature=API_SIGNATURE;
$API_Endpoint =API_ENDPOINT;

$iMemberId = $_SESSION['Cart']['sess_iMemberId'][0];
$userid= $_SESSION['iUserId'];
if($userid !=''){

	$sql_info = "SELECT * from members  where iMemberId = ".$userid."";
	$db_info = $obj->MySQLSelect($sql_info);
	
	$sql_coun_info = "SELECT * from country_master  where iCountryId = ".$db_info[0]['iCountryId']."";
	$db_coun_info = $obj->MySQLSelect($sql_coun_info);
	
	$sql_state_pay = "SELECT * from state_master  where iStateId = ".$db_info[0]['iStateId']."";
	$db_state_pay = $obj->MySQLSelect($sql_state_pay);
	
	$paymentType =urlencode( "Sale");
	$firstName = $db_info[0]['vFirstName'];	
	$lastName = urlencode($db_info[0]['vLastName'] );	
	$address1 = urlencode($db_info[0]['vAddress']);
	$city = urlencode($db_info[0]['vCity']);
	$state =urlencode($db_state_pay[0]['vState']);
	$zip = urlencode($db_info[0]['vZipCode']);
	$country =urlencode($db_coun_info[0]['vCountry']);
	$email=$db_info[0]['vEmail'];
	$Name= $db_info[0]['vName'];
	$CountryCode=$db_coun_info[0]['vCountryCode'];
	
}
	$id=$_REQUEST['iOrderId'];
	$sql_order = "SELECT * from `order` where iOrderId = ".$id."";	
	$db_order = $obj->MySQLSelect($sql_order);
	
	$paytype=$db_order[0]['vPaymentType'];
	$CardNo =urldecode($db_order[0]['vCardNo']);
	$vccve=$db_order[0]['vccv'];
	$vOrderNo=$db_order[0]['vOrderNo'];
	$dExpiaryDate=$db_order[0]['dExpiaryDate'];

if($paytype=='Visa'){
	  $creditCardType =urlencode('Visa');
	}elseif($paytype=='Master Card'){
	    $creditCardType =urlencode('mastercard');
	}elseif($paytype=='American Express'){
	    $creditCardType =urlencode('American Express');
	}elseif($paytype=='Discovery'){
	    $creditCardType =urlencode('Discover');
	}elseif($paytype=='maestro'){
	    $creditCardType =urlencode('maestro');
}

$creditCardNumber = urlencode($CardNo);
$paymentType = urlencode($paytype);
$expDateYear =urlencode($dExpiaryDate);
$cvv2Number = urlencode($vccve);

$iPAddress = $_SERVER['REMOTE_ADDR'];
$amount = urlencode($_SESSION[Cart][sess_total_price]+$CREDIT_CARD_PROCESSING_FEE);

$nvpstr ="&PAYMENTACTION=Sale&IPADDRESS=$iPAddress&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$CountryCode&CURRENCYCODE=USD&DESC=PaymentsPro";

$RECresArray = hash_call("DoDirectPayment",$nvpstr);

if($RECresArray['ACK'] == 'Success'){
	
   $TRANSACTIONID =$RECresArray['CORRELATIONID'];
    $iOrderId = $_REQUEST['iOrderId'];
    
    $updateplan_sql = "UPDATE `order` SET `eOrderStatus` ='Success',`vTransactionId` = '".$TRANSACTIONID."' WHERE iOrderId = '".$iOrderId."'";
    $obj->sql_query($updateplan_sql);
    
    $sql="select * from configurations where vName='EMAIL_ADMIN' ";
    $db_email=$obj->MysqlSelect($sql);
    $EMAIL_ADMIN=$db_email[0]['vValue'];
 
    $sql ="Select * from `order` where iOrderId='".$iOrderId."'";
    $ordernoarr = $obj->sql_query($sql);
    $vOrderNo = $ordernoarr[0]['vOrderNo'];
    $Name= $db_info[0]['vName'];     
    //$to_email = $email;
    $to_email = 'bamadeb.upadhyaya@php2india.com';
    $payment_status = 'Success';
    $CartArr = $Cartobj->showMyEmailBag();
    $Cart_Info = $Cartobj->EmailData($CartArr);
    
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    $mailObj = new SendPHPMail();
    
   
     $body_arr = Array("#NAME#","#CARTINFO#","#ORDERNO#","#MAIL_FOOTER#","#SITE_URL#","#ORDERSTATUS#");
     $post_arr = Array($Name,$Cart_Info,$vOrderNo,$MAIL_FOOTER,$site_url,$payment_status);
     $mailObj->Send("MEMBER_SHOPPING_INFORMATION","Member",$to_email,$body_arr,$post_arr);
     
     $adminbody_arr = Array("#NAME#","#CARTINFO#","#ORDERNO#","#MAIL_FOOTER#","#SITE_URL#","#ORDERSTATUS#");
     $adminpost_arr = Array($Name,$Cart_Info,$vOrderNo,$MAIL_FOOTER,$site_url,$payment_status);
     $mailObj->Send("ADMIN_SHOPPING_INFORMATION","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);
  
     
}else{
	
    $TRANSACTIONID =$RECresArray['CORRELATIONID'];
    $iOrderId = $_REQUEST['iOrderId'];
    $updateplan_sql = "UPDATE `order` SET `eOrderStatus` ='Cancelled',`vTransactionId` = '".$TRANSACTIONID."' WHERE iOrderId = '".$iOrderId."'";
    $obj->sql_query($updateplan_sql);
    
    $sql ="Select vOrderNo from `order`where iOrderId = '".$iOrderId."'";
    $ordernoarr = $obj->MySQLSelect($sql); 
    $vOrderNo = $ordernoarr[0]['vOrderNo'];
    
    $sql="select * from configurations where vName='EMAIL_ADMIN' ";
    $db_email=$obj->MysqlSelect($sql);
    $admin_email=$db_email[0]['vValue'];
    $CartArr = $Cartobj->showMyEmailBag();
    $Cart_Info = $Cartobj->EmailData($CartArr);
    $Name = $db_info[0]['vName'];
    //$to_email = $email;
    $to_email = 'bamadeb.upadhyaya@php2india.com';
    $payment_status = 'Cancelled';
	
	
     include_once(TPATH_CLASS_GEN."class.sendmail.php");
     $mailObj = new SendPHPMail();
  
     $body_arr = Array("#NAME#","#CARTINFO#","#ORDERNO#","#MAIL_FOOTER#","#SITE_URL#","#ORDERSTATUS#");
     $post_arr = Array($Name,$Cart_Info,$vOrderNo,$MAIL_FOOTER,$site_url,$payment_status);
     $mailObj->Send("MEMBER_SHOPPING_INFORMATION","Member",$to_email,$body_arr,$post_arr);
     
     $adminbody_arr = Array("#NAME#","#CARTINFO#","#ORDERNO#","#MAIL_FOOTER#","#SITE_URL#","#ORDERSTATUS#");
     $adminpost_arr = Array($Name,$Cart_Info,$vOrderNo,$MAIL_FOOTER,$site_url,$payment_status);
     $mailObj->Send("ADMIN_SHOPPING_INFORMATION","Administrator",$admin_email,$adminbody_arr,$adminpost_arr); 
 
}

$_SESSION["response_array"] = $RECresArray;
header("Location:".$site_url."/?file=m-paymentsuccess&id=$iOrderId");
exit();
?>
