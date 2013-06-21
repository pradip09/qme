<?php


include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();


$name=$_SESSION['Name'];
$to_email=$_SESSION['vEmail'];
$totpoints =$_REQUEST['totpnt'];
$points =$_REQUEST['dollaramt'];
//$method =$_REQUEST['payment'];
$method = implode(",",$_REQUEST['payment']);


$sql_admin = "select * from configurations where vName='EMAIL_ADMIN'";
$user_admin = $obj->MySQLSelect($sql_admin);
$EMAIL_ADMIN=$user_admin[0]['vValue'];

$body_arr = Array("#NAME#","#POINT#","#TOTPOINT#","#METHOD#","#MAIL_FOOTER#","#SITE_URL#");
$post_arr = Array($name,$points,$totpoints,$method,$MAIL_FOOTER,$tconfig["tsite_url"]);
$mailObj->Send("MEMBER_REDEEM_POINT","Member",$to_email,$body_arr,$post_arr);


$adminbody_arr = Array("#NAME#","#POINT#","#TOTPOINT#","#METHOD#","#MAIL_FOOTER#","#SITE_URL#");
$adminpost_arr = Array($name,$points,$totpoints,$method,$MAIL_FOOTER,$tconfig["tsite_url"]);
$mailObj->Send("ADMIN_REDEEM_POINT","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);


//header('Location:'.$tconfig["tsite_url"].'/index.php?file=m-Redeem_points');


?>