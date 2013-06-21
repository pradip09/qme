<?php

ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$firstname = $_REQUEST['vFirstName'];
$lastname = $_REQUEST['vLastName'];
$email = $_REQUEST['vEmailId'];
$password = $_REQUEST['Password'];
$type = $_REQUEST['type'];

$sql="select * from members WHERE vEmail = '".$email."'";
$row=$obj->MySQLSelect($sql);
$total=count($row);
$activationcode = $generalobj->rand_str();
$vMemberUrl = time().generatePassword(8);
function generatePassword($len) {
  $shuffled = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
  return substr($shuffled, 0, $len);
}

$firstname1 = str_replace( array( ' ', '.',',','-','_',':',';' ), '', $firstname);
$lastname1 = str_replace( array( ' ', '.' ,',','-','_',':',';'), '', $lastname);


$Data = array(
              'vName'=>trim($firstname).' '.trim($lastname),
	      'vMemberUrl'=>trim($firstname1).trim($lastname1),
	      'vFirstName'=>trim($firstname),
	      'vLastName'=>trim($lastname),
              'vEmail'=>$email,
              'vPassword'=>$password,
	      'eMemberType'=>$type,
              'eStatus' =>'Inactive',
	      'vActivationCode'=>$activationcode
              );

if($total>0){
       $var_msg = 'This Email Id allready exist.Please use another email id to register'; 
    }
else{
        $id = $obj->MySQLQueryPerform("members",$Data,'insert');
        if($id !=''){
                        $Email =  $email;
			$to = $Email;
			$Name = $firstname." ".$lastname;
                        						
                        $Veryfy_Link = $site_url."/index.php?file=m-confirm&verify=yes&email=".$email."&pn=".$activationcode."";
			
                        $body_arr = Array("#NAME#","#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#PASSWORD#","#VERIFY_LINK#",'#PHONE#');
			$post_arr = Array($Name,$SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$password,$Veryfy_Link,$phone);
			
                        $mailObj->Send("MEMBER_REGISTER","Administrator",$Email,$body_arr,$post_arr);
                        $mailObj->Send("MEMBER_REGISTER_ADMIN","Administrator",$EMAIL_ADMIN,$body_arr,$post_arr);
				
			$var_msg.= "success";
    }else{
         $var_msg = 'Error in registration';
    }
       }
    echo $var_msg;exit;

?>

