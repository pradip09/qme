<?php
//echo "<pre>";
//print_r($_SESSION);exit;

    ob_clean();
    $Subject = $_REQUEST['Subject'];
    $message = $_REQUEST['Message'];
    $Name=$_SESSION['Name'];
    $to = $EMAIL_ADMIN;
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    
    $mailObj = new SendPHPMail();
    
    $body_arr = Array("#NAME#","#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#SUBJECT#","#COMMENTS#");
    $post_arr = Array($Name,$SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$Subject,$message,);
    $mailObj->Send("FEEDBACK_US_INFORMATION","Administrator",$to,$body_arr,$post_arr);
                        
    $var_msg = 'success';
    echo $var_msg;exit;
?>

