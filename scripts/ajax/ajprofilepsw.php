<?php

$sUserId= $_SESSION['iUserId'];
$oldPassword=$_REQUEST['oldPassword'];
$newPassword=$_REQUEST['newPassword'];

include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$sql="select * from members where vPassword= '".$oldPassword."' AND iMemberId ='".$sUserId."'";
$row=$obj->MySQLSelect($sql);

$total=count($row);
//echo $total;exit;
$Data = array(
              'vPassword'=>$newPassword,
             );
$where = " iMemberId = '".$row[0][iMemberId]."'";
if($total==0){
     $var_msg="notmatch";
     
     //$var_msg='Contrase&ntilde;a anterior no coincide';
}else{
     $id = $obj->MySQLQueryPerform("members",$Data,'update',$where);
    
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