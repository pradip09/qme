<?php
    ob_clean();
    
    $Subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $phone_number=$_REQUEST['phone_number'];
    $email =$_REQUEST['Email'];   
    
    
    $Email =  $email;
    $to = $EMAIL_ADMIN;
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    
    $mailObj = new SendPHPMail();
    
     $body_arr = Array("#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#SUBJECT#","#COMMENTS#",'#PHONE#');
			$post_arr = Array($SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$Subject,$message,$phone_number);
			
                        $mailObj->Send("CONTACT_US_INFORMATION","Administrator",$to,$body_arr,$post_arr);
                        
    $var_msg = 'Thank you for contacting us';
    echo $var_msg;exit;
?>

