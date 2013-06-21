<?php
ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();


$forgetemail = $_REQUEST['vEmailForget'];

$sql="select * from members WHERE vEmail = '".$forgetemail."'";
$row=$obj->MySQLSelect($sql);
$name=$row[0][vName];
$password=$row[0][vPassword];
$total=count($row);
//echo $total;exit;

if($row){
    if($row[0]['eStatus'] =='Active'){
            $Email =  $forgetemail;
                    $to = $Email;
                    $Name = $name;
                    $body_arr = Array("#NAME#","#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#PASSWORD#");
                    $post_arr = Array($Name,$SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$password);
                    
                    $mailObj->Send("FORGOT_PASSWORD_MEMBER","Administrator",$to,$body_arr,$post_arr);
                    $var_msg.= "Mail sent successfully to the requested password.";
        
    }else{
        $var_msg='This account has currently inactive. Please contact our administrator.';
    }
}else{
    $var_msg='This email-id does not exist.';
}

    echo $var_msg;exit;


         
?>

