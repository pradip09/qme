<?php

ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$sql_user = "select * from members where vMemberUrl='".$_POST['friend_code']."'";
$db_user = $obj->MySQLSelect($sql_user);

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$email = $_REQUEST['emailid'];
$password = $_REQUEST['password'];

$sql="select * from members WHERE vEmail = '".$email."'";
$row=$obj->MySQLSelect($sql);
$total=count($row);
$activationcode = $generalobj->rand_str();
$vMemberUrl = time().generatePassword(8);
function generatePassword($len) {
  $shuffled = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
  return substr($shuffled, 0, $len);
}

$Data = array(
              'vName'=>$firstname.' '.$lastname,
	      'vMemberUrl'=>$firstname.'_'.$lastname,
              'vEmail'=>$email,
              'vPassword'=>$password,
              'eStatus' =>'Inactive',
	      'vActivationCode'=>$activationcode
              );

if($total>0){
       $var_msg = 'This Email Id allready exist.Please use another email id to register'; 
    }
else{
        $id = $obj->MySQLQueryPerform("members",$Data,'insert');
        if($id !=''){
                        $Data2 = array(
                            'iMemberId'=>$id,
                            'iFriendId'=>$db_user[0]['iMemberId'],
                            'eStatus'=>'Pending',
                        );
                        $id2 = $obj->MySQLQueryPerform("qme_friend",$Data2,'insert');
                        $Data1 = array(
                            'iMemberId'=>$db_user[0]['iMemberId'],
                            'iFriendId'=>$id,
                            'eStatus'=>'Requested',
                        );
                        $id1 = $obj->MySQLQueryPerform("qme_friend",$Data1,'insert');
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
         $var_msg = 'error';
    }
       }
    echo $var_msg;exit;

?>

