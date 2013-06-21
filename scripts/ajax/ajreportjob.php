<?php




include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$UserId=$_SESSION['iUserId'];
$name=$_REQUEST['name'];
$id=$_REQUEST['id'];
$skill=$_REQUEST['skill'];
$text=$_REQUEST['text'];
$date_time=$_REQUEST['date'];

$sql_job = "select * from post_job where iPostJobId=".$id."";
$db_job = $obj->MySQLSelect($sql_job);
$pid = $db_job[0]['iMemberId'];

//echo "<pre>";
//print_r($pid);exit;

$sql_me= "select * from members where iMemberId='".$pid."'";
$db_name= $obj->MySQLSelect($sql_me);


$to_email =$db_name[0]['vEmail'];
//echo $to_email;exit; 
$sql_admin = "select * from configurations where vName ='EMAIL_ADMIN'";
$user_admin = $obj->MySQLSelect($sql_admin);
$EMAIL_ADMIN=$user_admin[0]['vValue'];
$varify = $site_url.'/'.$db_name[0]['vMemberUrl'];

    $adminbody_arr = Array("#NAME#","#VERIFY_LINK#","#MAIL_FOOTER#","#SITE_URL#");
    $adminpost_arr = Array($name,$varify,$MAIL_FOOTER,$tconfig["tsite_url"]);
    $mailObj->Send("ADMIN_POSTJOB_REPORT","Administrator",$EMAIL_ADMIN,$adminbody_arr,$adminpost_arr);
    
    $body_arr = Array("#NAME#","#MAIL_FOOTER#","#SITE_URL#");
    $post_arr = Array($name,$MAIL_FOOTER,$tconfig["tsite_url"]);
    $mailObj->Send("MEMBER_POSTJOB_REPORT","Member",$to_email,$body_arr,$post_arr);

    $var_msg.= "success";
    echo $var_msg;exit; 

?>