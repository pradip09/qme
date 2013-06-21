<style>
    .checker input{
        opacity: 1 !important;
    }
</style>
<?php
$contents="<html>
<head>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js' type='text/javascript' charset='utf-8'></script>
<script src='js/jquery.uniform.min.js' type='text/javascript' charset='utf-8'></script>
<script type='text/javascript' charset='utf-8'>
  $(function(){
	$('input, textarea, select, button').uniform();
  });
</script>
<link rel='stylesheet' href='css/uniform.default.css' type='text/css' media='screen'>
<style type='text/css' media='screen'>
body {
	font-family:Arial, Helvetica, sans-serif;
color: #666;
padding: 7px;

}
.btn_import{background:red; width:125px; height:25px; line-height:25px;}
.yourcontacttext{font-size:19px; color:#727272; font-weight:bold;}
.namefonttxt{font-size:14px; font-weight:bold; color:#727272;}
.namefonttxtsmall{font-size:12px;  color:#727272;}
.buttonfooter{ margin-left: 77px;
    margin-top: 7px;   
}
.gmailrightalignment{ 
float:left;
}
.uniform{width:450px; height:250px; background:#CCC;}
.signing{padding-top:27px;}
.submitbtn{float:left;  margin-left: 132px; margin-top:15px;}	
h1 {
margin-top: 0;
}
ul {
list-style: none;
padding: 0;
margin: 0;
}
li {
margin-bottom: 20px;
clear: both;
}
label {
font-size: 15px;
font-family:Arial, Helvetica, sans-serif;
font-weight: bold;
text-transform: uppercase;
display: block;
submitbtnmargin-right:5px;
margin-bottom: 3px;
clear: both;
}
</style>
</head>
";
include('../openinviter.php');
$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins();
$pluginContent="";
if (isset($_POST['provider_box'])) 
	{
	if (isset($oi_services['email'][$_POST['provider_box']])) $plugType='email';
	elseif (isset($oi_services['social'][$_POST['provider_box']])) $plugType='social';
	else $plugType='';
	if ($plugType) $pluginContent=createPluginContent($_POST['provider_box']);
	}
elseif(!empty($_GET['provider_box']))
	{
	if (isset($oi_services['email'][$_GET['provider_box']])) $plugType='email';
	elseif (isset($oi_services['social'][$_GET['provider_box']])) $plugType='social';
	else $plugType='';
	if($plugType) 
		{ 
		$_POST['provider_box']=$_GET['provider_box'];
		$pluginContent=createPluginContent($_GET['provider_box']);
		}
	}
else { $plugType = ''; $_POST['provider_box']=''; }

function ers($ers)
	{
	if (!empty($ers))
		{
		$contents="<table  width='100%' cellspacing='0' cellpadding='0' align='center'><tr><td valign='middle' style='color:red; font-size:16px;  font-weight:normal;  font-family: PT Sans; text-align:center;'>";
		foreach ($ers as $key=>$error)
			$contents.="{$error}";
		$contents.="</td></tr></table><br >";
		return $contents;
		}
	}
	
function oks($oks)
	{
	if (!empty($oks))
		{
		$contents="<table border='0'   width='100%'  cellspacing='0' cellpadding='10' align='center'><td valign='middle' style='color:#5897FE; font-weight:normal;  font-family: PT Sans;  font-size:16px; text-align:center;'>";
		foreach ($oks as $key=>$msg)
			$contents.="{$msg}";
		$contents.="</td></tr></table><br >";
		return $contents;
		}
	}

if (!empty($_POST['step'])) $step=$_POST['step'];
else $step='get_contacts';

$ers=array();$oks=array();$import_ok=false;$done=false;
if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	if ($step=='get_contacts')
		{
		if (empty($_POST['email_box']))
			$ers['email']="Email missing !";
		if (empty($_POST['password_box']))
			$ers['password']="Password missing !";	
		if (empty($_POST['provider_box']))
			$ers['provide']='Provider missing!';
		if (count($ers)==0)
			{
			$inviter->startPlugin($_POST['provider_box']);
			$internal=$inviter->getInternalError();
			if ($internal)
				$ers['inviter']=$internal;
			elseif (!$inviter->login($_POST['email_box'],$_POST['password_box']))
				{
				$internal=$inviter->getInternalError();
				$ers['login']=($internal?$internal:"Login failed. Please check the email and password you have provided and try again later !");
				}
			elseif (false===$contacts=$inviter->getMyContacts())
				$ers['contacts']="Unable to get contacts !";
			else
				{
				$import_ok=true;
				$step='send_invites';
				$_POST['oi_session_id']=$inviter->plugin->getSessionID();
				$_POST['message_box']='';
				}
			}
		}
	elseif ($step=='send_invites')
		{
		if (empty($_POST['provider_box'])) $ers['provider']='Provider missing !';
		else
			{
			$inviter->startPlugin($_POST['provider_box']);
			$internal=$inviter->getInternalError();
			if ($internal) $ers['internal']=$internal;
			else
				{
				if (empty($_POST['email_box'])) $ers['inviter']='Inviter information missing !';
				if (empty($_POST['oi_session_id'])) $ers['session_id']='No active session !';
				if (empty($_POST['message_box'])) $ers['message_body']='Message missing !';
				else $_POST['message_box']=strip_tags($_POST['message_box']);
				$selected_contacts=array();$contacts=array();
				$message=array('subject'=>$inviter->settings['message_subject'],'body'=>$inviter->settings['message_body'],'attachment'=>"\n\rAttached message: \n\r".$_POST['message_box']);
				if ($inviter->showContacts())
					{
					foreach ($_POST as $key=>$val)
						if (strpos($key,'check_')!==false)
							$selected_contacts[$_POST['email_'.$val]]=$_POST['name_'.$val];
						elseif (strpos($key,'email_')!==false)
							{
							$temp=explode('_',$key);$counter=$temp[1];
							if (is_numeric($temp[1])) $contacts[$val]=$_POST['name_'.$temp[1]];
							}
					if (count($selected_contacts)==0) $ers['contacts']="You haven't selected any contacts to invite !";
					}
				}
			}
		if (count($ers)==0)
			{
			$sendMessage=$inviter->sendMessage($_POST['oi_session_id'],$message,$selected_contacts);
			$inviter->logout();
			if ($sendMessage===-1)
				{
				$message_footer="";
				$message_subject=$message['subject'];
				/*$message_body=$message['body'].$message['attachment'].$message_footer; 
				$headers="From: {$_POST['email_box']}";
				foreach ($selected_contacts as $email=>$name)
					mail($email,$message_subject,$message_body,$headers);
				$oks['mails']="Mails sent successfully";*/
                                
                                
                                
                                
$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
 <title>'.$message_subject.'</title>
</head>
<body>
<table class='bg1' cellspacing='0' border='0' style='background-color: #eeeeee; font-family:Arial, Helvetica, sans-serif;' cellpadding='0' width='100%'>
   <tr>
      <td align='center'>
         <table class='bg2' cellspacing='0' border='0' style='background-color: #ffffff;' cellpadding='0' width='600'>

            <tr>
               <td class='permission' style='background-color: #eeeeee; padding: 10px 20px 10px 20px;'>
                    <img src='http://myqme.com/public/images/logo2.png' alt=''/>
               </td>
            </tr>
            
            <tr>
               <td class='body' valign='top' style='background-color: #ffffff; padding: 0 20px 20px 20px;  border:2px solid #868686;'>
                    <table>
                        <tr>
                            <td>
                                <h2>From ".$_SESSION['Name']."</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ".$_POST['message_box']."
                            </td>
                        </tr>
                        <tr>
                            <td>
                                -".$_SESSION['Name']."
                            </td>
                        </tr>
				    <tr>
                            <td height='20'></td>
                        </tr>
                        <tr>
                            <td>
                                <a href='http://myqme.com/sign_up/".$_SESSION['vMemberUrl']."' style='background:#727273; display:block; height:30px; line-height:30px; text-decoration:none; color:#fff; width:150px; text-align:center; border:1px solid #000;'>Sign Up QME</a>
                            </td>
                        </tr>
                    </table>
               </td>
            </tr>
            
         </table>
         
      </td>
   </tr>
     <tr>
        <td class='permission' style='background-color: #eeeeee; padding: 10px 20px 10px 20px;'>
             
        </td>
     </tr>
</table>
</body>
</html>";           
                                
                                
                                
                                
                                /*
                                
$message_body="<table class='bg1' cellspacing='0' border='0' style='background-color: #eeeeee;' cellpadding='0' width='100%'>
   <tr>
      <td align='center'>
         
         <table class='bg2' cellspacing='0' border='0' style='background-color: #ffffff;' cellpadding='0' width='600'>

            <tr>
               <td class='permission' align='center' style='background-color: #eeeeee; padding: 10px 20px 10px 20px;'>
               </td>
            </tr>
            
            <tr>
               <td class='body' valign='top' style='background-color: #ffffff; padding: 0 20px 20px 20px;'>
                  
               </td>
            </tr>
            <tr>

               <td class='footer' height='25' align='left' valign='middle' style='background-repeat: no-repeat; background-color: #333; padding: 0 20px 0 20px; height: 25px; vertical-align: middle; background-image: url('http://change_me.ua.edu/email/footer.gif'); background-position: top center;'>
                  <p style='font-size: 11px; font-weight: normal; margin: 0; font-family: Arial; line-height: 16px; color: #ffffff; padding: 0;'>CanalNayarit.com, Todos los derechos reservados. Este email fue generado automaticamente por {$_POST['email_box']}, CanalNayarit no almacena ninguna informacion personal. Este email se generada cada vez que el usuario invitador lo desea.</p>
                </td>
            </tr>
         </table>
         
      </td>
   </tr>
</table>";*/

                    $headers="From: {$_POST['email_box']}\n";
                    $headers .= "Reply-To: {$_POST['email_box']}\n";
                    $headers .= "Return-Path: {$_POST['email_box']}\n";
                    $headers .= "MIME-Version: 1.0\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\n";
                foreach ($selected_contacts as $email=>$name)
                    mail($email,$message_subject,$message_body,$headers);
                $oks['mails']="Mails sent successfully";
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
				}
			elseif ($sendMessage===false)
				{
				$internal=$inviter->getInternalError();
				$ers['internal']=($internal?$internal:"There were errors while sending your invites.<br>Please try again later!");
				}
			else $oks['internal']="Invites sent successfully!";
			$done=true;
			}
		}
	}
else
	{
	$_POST['email_box']='';
	$_POST['password_box']='';
	}


$contents.="<form action='' method='POST' name='openinviter'>".ers($ers).oks($oks);
if (!$done)
	{
	if ($step=='get_contacts')
		{
			
			
		$contents.="<table align='center' class='thTable' cellspacing='2' cellpadding='0' style='border:none;'>
		
			<tr><td align='right'><label for='email_box'>Email</label></td><td><input id='vEmail' class='singinput' placeholder='E-mail' type='text' name='email_box' value='{$_POST['email_box']}'></td></tr>
			<tr><td align='right'><label for='password_box'>Password</label></td><td><input class='singinput' type='password' name='password_box' value='{$_POST['password_box']}'></td></tr>			
			<tr><td colspan='2' align='center'><input type='submit' name='import' value='Import Contacts'></td></tr>
		</table><input type='hidden' name='provider_box' value='{$_POST['provider_box']}'><input type='hidden' name='step' value='get_contacts'>";
$contents.="<center>{$pluginContent}</center>";
		}
	else
		$contents.="<table cellspacing='0' cellpadding='0' width='100%' style='border:none;'>
				<tr><td align='center' valign='top'><label for='message_box' >Message</label></td><td><textarea rows='5' cols='50'  name='message_box' style='width:421px; height:118px;'>{$_POST['message_box']}</textarea></td></tr>
				<tr><td align='center' colspan='2'><div class='submitbtn'><input type='submit' name='send' value='Send Invites'></div><div class='gmailrightalignment'>{$pluginContent}</div></td></tr>
			</table>";
	}


if (!$done)
	{
	if ($step=='send_invites')
		{		
		if ($inviter->showContacts())
			{			
			$contents.="<table width='100%' align='center' cellspacing='0' cellpadding='0'><tr><td colspan='".($plugType=='email'? "3":"2")."' class='yourcontacttext'>Your contacts</td></tr>";
			if (count($contacts)==0)
				$contents.="<tr><td align='center' style='padding:20px;' colspan='".($plugType=='email'? "3":"2")."'>You do not have any contacts in your address book.</td></tr>";
			else
				{
				$contents.="<tr><td><input type='checkbox' onChange='toggleAll(this)' name='toggle_all' title='Select/Deselect all'>Invite?</td><td>Name</td>".($plugType == 'email' ?"<td>E-mail</td>":"")."</tr>";
				$counter=0;
				foreach ($contacts as $email=>$name)
					{
					$counter++;					
					$contents.="<tr><td><input name='check_{$counter}' value='{$counter}' type='checkbox'><input type='hidden' name='email_{$counter}' value='{$email}'><input type='hidden' name='name_{$counter}' value='{$name}'></td><td>{$name}</td>".($plugType == 'email' ?"<td>{$email}</td>":"")."</tr>";
					}
				$contents.="<tr><td colspan='".($plugType=='email'? "3":"2")."'>&nbsp;</td></tr>";
                                $contents.="<tr><td colspan='".($plugType=='email'? "3":"2")."' style='padding:3px; text-align: center;'><input type='submit' name='send' value='Send invites'></td></tr>";
				}
			$contents.="</table>";
			}
		$contents.="<input type='hidden' name='step' value='send_invites'>
			<input type='hidden' name='provider_box' value='{$_POST['provider_box']}'>
			<input type='hidden' name='email_box' value='{$_POST['email_box']}'>
			<input type='hidden' name='oi_session_id' value='{$_POST['oi_session_id']}'>";
		$contents.="<script>self.parent.$.fancybox.resize();</script>";
		}
	}
$contents.="</form>";
$contents.="<script type='text/javascript'>
	function toggleAll(element) 
	{
	var form = document.forms.openinviter, z = 0;
	for(z=0; z<form.length;z++)
		{
		if(form[z].type == 'checkbox')
			form[z].checked = element.checked;
	   	}
	}
</script>";
echo $contents;

function createPluginContent($pr)
	{
	global $oi_services,$plugType;
	$a=array_keys($oi_services[$plugType]);
	foreach($a as $r=>$sv) if ($sv==$pr) break;
	return $contentPlugin="<div style='border:none; display:block; height:60px; margin:0; padding:0; width:130px; background-position: 0px ".(-60*$r)."px; background-image:url(\"imgs/{$plugType}_services.png\");'></div>";
	}
?>