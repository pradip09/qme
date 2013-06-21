<?php


$sUserId= $_SESSION['iUserId'];
$oldPassword=$_REQUEST['oldPassword'];

$newPassword=$_REQUEST['newPassword'];

include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();


$sql="select * from users where vPassword= '".$oldPassword."' AND iUserId ='".$sUserId."'";
$row=$obj->MySQLSelect($sql);
$total=count($row);

$Data = array(
              'vPassword'=>$newPassword,
             );
$where = " iUserId = '".$row[0][iUserId]."'";
if($total==0){
     $var_msg="notmatch";

}else{
     $id = $obj->MySQLQueryPerform("users",$Data,'update',$where);
     if($id !=''){
         $var_msg="success";
         $Name = $_SESSION['Name'];
         $Email=$_SESSION['vEmail'];
         $to=$Email;
         $body_arr = Array("#NAME#","#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#NEWPASSWORD#");
         $post_arr = Array($Name,$SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$newPassword);
         $mailObj->Send("PASSWORD_CHANGED","Member",$to,$body_arr,$post_arr);
     }
}

echo $var_msg;exit;
?>