<?php


error_reporting(0);
require_once(TPATH_CLASS_APP.'/payment/CallerService.php'); 
require_once(TPATH_CLASS_APP.'/payment/constants.php'); 
$API_UserName=API_USERNAME;
$API_Password=API_PASSWORD;
$API_Signature=API_SIGNATURE;
$API_Endpoint =API_ENDPOINT;

if($_SESSION['iUserId'] != ''){
        
    $sql = "select * from members where iMemberId='".$_SESSION['iUserId']."'";
    $user_info = $obj->MySQLSelect($sql);
    
    $sql_coun_info = "SELECT * from country_master  where iCountryId = ".$user_info[0]['iCountryId']."";
    $db_coun_info = $obj->MySQLSelect($sql_coun_info);
	
    $sql_state_pay = "SELECT * from state_master  where iStateId = ".$user_info[0]['iStateId']."";
    $db_state_pay = $obj->MySQLSelect($sql_state_pay);
    
    $data['iMemberId'] = $_SESSION['iUserId'];    
    $data['fTotalPrice'] = $_POST['price'];
    $data['fPoints'] = $_POST['point'];
    $data['vCardNo'] =str_replace(' ','',$_POST['cardno']);
    $data['vPaymentType'] =$_POST['cardId'];
    $data['vCCV'] =str_replace(' ','',$_POST['secureno']);
    $data['dExpiaryDate'] =$_POST['selmonth'].$_POST['selyear'];
    $data['dTransactionDate'] =date("Y-m-d");      
    $transaction_id = $obj->MySQLQueryPerform("points_transaction",$data,'insert');      
        
}   
    $sql_transation = "select * from points_transaction where iPointTransactionId='".$transaction_id."'";
    $transation = $obj->MySQLSelect($sql_transation);
    
    $sql_admin = "select * from configurations where vName='EMAIL_ADMIN'";
    $user_admin = $obj->MySQLSelect($sql_admin);
  
  $iPAddress = $_SERVER['REMOTE_ADDR'];
  $amount= urlencode($transation[0]['fTotalPrice']);
  $creditCardType=urlencode($transation[0]['vPaymentType']);
  $creditCardNumber=urlencode($transation[0]['vCardNo']);
  $expDateYear=urlencode($transation[0]['dExpiaryDate']);
  $cvv2Number=urlencode($transation[0]['vCCV']);
  $firstName= $user_info[0]['vFirstName'];
  $lastName = urlencode($user_info[0]['vLastName']);
  $address1 = urlencode($user_info[0]['vAddress']);
  $city = urlencode($user_info[0]['vCity']);
  $state = urlencode($db_state_pay[0]['vState']);
  $zip = urlencode($user_info[0]['vZipCode']);
  $CountryCode = urlencode($db_coun_info[0]['vCountryCode']);  
  $date_time = date('m-d-Y',strtotime($transation[0]['dTransactionDate']));
  
  $nvpstr ="&PAYMENTACTION=Sale&IPADDRESS=$iPAddress&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$CountryCode&CURRENCYCODE=USD&DESC=PaymentsPro";
  $RECresArray = hash_call("DoDirectPayment",$nvpstr);
  
if($RECresArray['ACK'] == 'Success'){	
     
    $TRANSACTIONID =$RECresArray['CORRELATIONID'];    
    $updateplan_sql = "UPDATE points_transaction SET eTransactionStatus ='Success',vTransactionId = '".$TRANSACTIONID."' WHERE iPointTransactionId = '".$transaction_id."'";
    $obj->sql_query($updateplan_sql);
 
                $name = $user_info[0]['vName'];
                $Point =  $transation[0]['fPoints'];
                $price = $transation[0]['fTotalPrice'];
                //$to_email = $user_info[0]['vEmail'];
                $to_email = 'bamadeb.upadhyaya@php2india.com';
                $payment_status = 'Success';
                $EMAIL_ADMIN=$user_admin[0]['vValue'];
                
                
                include_once(TPATH_CLASS_GEN."class.sendmail.php");
                $mailObj = new SendPHPMail();
                
                $body_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
                $post_arr = Array($name,$Point,$price,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
                $mailObj->Send("MEMBER_BUYPOINT_INFORMATION","Member",$to_email,$body_arr,$post_arr);
        
                $adminbody_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
                $adminpost_arr = Array($name,$Point,$price,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
                $mailObj->Send("ADMIN_BUYPOINT_INFORMATION","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);
 
     
}else{
	
    $TRANSACTIONID =$RECresArray['CORRELATIONID'];
    $updateplan_sql = "UPDATE points_transaction SET eTransactionStatus ='Cancelled',vTransactionId = '".$TRANSACTIONID."' WHERE iPointTransactionId = '".$transaction_id."'";
    $obj->sql_query($updateplan_sql);
 
                $name = $user_info[0]['vName'];
                $Point =  $transation[0]['fPoints'];
                $price = $transation[0]['fTotalPrice'];
                //$to_email = $user_info[0]['vEmail'];
                $to_email = 'bamadeb.upadhyaya@php2india.com';
                $payment_status = 'Cancelled';
                $EMAIL_ADMIN=$user_admin[0]['vValue'];
                
                include_once(TPATH_CLASS_GEN."class.sendmail.php");
                $mailObj = new SendPHPMail();
                
                $body_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
                $post_arr = Array($name,$Point,$price,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
                $mailObj->Send("MEMBER_BUYPOINT_INFORMATION","Member",$to_email,$body_arr,$post_arr);
        
                $adminbody_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
                $adminpost_arr = Array($name,$Point,$price,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
                $mailObj->Send("ADMIN_BUYPOINT_INFORMATION","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);
               
 
}

$_SESSION["response_array"] = $RECresArray;
//unset($_SESSION);
header('Location:'.$tconfig["tsite_url"].'/index.php?file=m-buypoint_thank');
//header("Location:".$site_url."/?file=m-paymentsuccess&id=$iOrderId");
exit(); 
    
   
?>