<?php

error_reporting(0);
require_once(TPATH_CLASS_APP.'/payment/CallerService.php'); 
require_once(TPATH_CLASS_APP.'/payment/constants.php'); 
include_once(TPATH_CLASS_APP."/Shopcart.class.php");

if($_SESSION['iUserId'] != ''){
    
    $sql = "select * from members where iMemberId='".$_SESSION['iUserId']."'";
    $user_info = $obj->MySQLSelect($sql);
    
    $sql_coun_info = "SELECT * from country_master  where iCountryId = ".$user_info[0]['iCountryId']."";
    $db_coun_info = $obj->MySQLSelect($sql_coun_info);
	
    $sql_state_pay = "SELECT * from state_master  where iStateId = ".$user_info[0]['iStateId']."";
    $db_state_pay = $obj->MySQLSelect($sql_state_pay);
    
    $id=$_POST['plan_id'];
    $sql="select * from store_plan where iStorePlanId =".$id."";
    $db_sql=$obj->MysqlSelect($sql);
    
    $data['iMemberId'] = $_SESSION['iUserId'];
    $data['iPlanId'] =$_POST['plan_id'];    
    $data['fTotalPrice'] = $_POST['plan_price'];
    $data['vCardNo'] =str_replace(' ','',$_POST['cardno']);
    $data['vPaymentType'] =$_POST['cardId'];
    $data['vCCV'] =$_POST['secureno'];
    $data['dExpiaryDate'] =$_POST['selmonth'].$_POST['selyear'];
    $data['dTransactionDate'] =date("Y-m-d");
    $data['ePlanstatus'] ='InProcess';    
    $plan_transaction_id = $obj->MySQLQueryPerform("plan_transaction",$data,'insert');
    
}    
    $sql_data = "select * from plan_transaction where iPlanTransactionId='".$plan_transaction_id."'";
    $plan_data = $obj->MySQLSelect($sql_data);
    
    $sql="select * from configurations where vName='EMAIL_ADMIN' ";
    $db_email=$obj->MysqlSelect($sql);
          
    
    $iPAddress = $_SERVER['REMOTE_ADDR'];
    $amount= urlencode($plan_data[0]['fTotalPrice']);
    $creditCardType = urlencode($plan_data[0]['vPaymentType']);
    $creditCardNumber = urlencode($plan_data[0]['vCardNo']);
    $expDateYear = urlencode($plan_data[0]['dExpiaryDate']);
    $cvv2Number = urlencode($plan_data[0]['vCCV']);
    $firstName = $user_info[0]['vFirstName'];
    $lastName = urlencode($user_info[0]['vLastName']);
    $address1 = urlencode($user_info[0]['vAddress']);
    $city = urlencode($user_info[0]['vCity']);
    $state = urlencode($db_state_pay[0]['vState']);
    $zip = urlencode($user_info[0]['vZipCode']);
    $CountryCode = urlencode($db_coun_info[0]['vCountryCode']);    
    $date_time = date("d-M-Y");
    
    $nvpstr ="&PAYMENTACTION=Sale&IPADDRESS=$iPAddress&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber&EXPDATE=$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$CountryCode&CURRENCYCODE=USD&DESC=PaymentsPro";
    $RECresArray = hash_call("DoDirectPayment",$nvpstr);
    
    
if($RECresArray['ACK'] == 'Success'){
    
    $TRANSACTIONID =$RECresArray['CORRELATIONID'];    
    $updateplan_sql = "UPDATE plan_transaction SET eTransactionStatus ='Success',ePlanstatus='Completed',vTransactionId = '".$TRANSACTIONID."' WHERE iPlanTransactionId = '".$plan_transaction_id."'";
    $obj->sql_query($updateplan_sql);
    
    $name = $user_info[0]['vName'];
    $p_name = $db_sql[0]['vStorePlanName'];
    $price = $db_sql[0]['fPrice'];
    $limit = $db_sql[0]['item_limit'];
    $payment_status = 'Success';
    //$to_email = $user_info[0]['vEmail'];
    $to_email = 'bamadeb.upadhyaya@php2india.com';
    $EMAIL_ADMIN=$db_email[0]['vValue'];
  
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    $mailObj = new SendPHPMail();    
   
    $body_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#ITEM_LIMIT#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
    $post_arr = Array($name,$p_name,$price,$limit,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
    $mailObj->Send("MEMBER_PLAN_INFORMATION","Member",$to_email,$body_arr,$post_arr);

    $adminbody_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#ITEM_LIMIT#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
    $adminpost_arr = Array($name,$p_name,$price,$limit,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
    $mailObj->Send("ADMIN_PLAN_INFORMATION","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);


}else{
    
    $TRANSACTIONID =$RECresArray['CORRELATIONID'];    
    $updateplan_sql = "UPDATE plan_transaction SET eTransactionStatus ='Cancelled',ePlanstatus='Continue',vTransactionId = '".$TRANSACTIONID."' WHERE iPlanTransactionId = '".$plan_transaction_id."'";
    $obj->sql_query($updateplan_sql);
   
    $name = $user_info[0]['vName'];
    $p_name = $db_sql[0]['vStorePlanName'];
    $price = $db_sql[0]['fPrice'];
    $limit = $db_sql[0]['item_limit'];
    //$to_email = $user_info[0]['vEmail'];
    $admin_email=$db_email[0]['vValue'];
    $to_email = 'bamadeb.upadhyaya@php2india.com';
    $payment_status = 'Cancelled';
	
	
     include_once(TPATH_CLASS_GEN."class.sendmail.php");
     $mailObj = new SendPHPMail();
  
    $body_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#ITEM_LIMIT#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
    $post_arr = Array($name,$p_name,$price,$limit,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
    $mailObj->Send("MEMBER_PLAN_INFORMATION","Member",$to_email,$body_arr,$post_arr);

    $adminbody_arr = Array("#NAME#","#PLAN_NAME#","#PRICE#","#ITEM_LIMIT#","#DATE#","#MAIL_FOOTER#","#EMAIL#","#SITE_URL#","#PLANSTATUS#");
    $adminpost_arr = Array($name,$p_name,$price,$limit,$date_time,$MAIL_FOOTER,$to_email,$tconfig["tsite_url"],$payment_status);
    $mailObj->Send("ADMIN_PLAN_INFORMATION","Administrator",$admin_email,$adminbody_arr,$adminpost_arr);
    
   
 
}

$_SESSION["response_array"] = $RECresArray;
header('Location:'.$tconfig["tsite_url"].'/index.php?file=m-mystore_thank');
//header("Location:".$site_url."/?file=m-paymentsuccess&id=$iOrderId");
exit();
    
     
?>