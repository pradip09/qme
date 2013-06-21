<?
/**
 * Action file for add/Update of sendmessage
 * @Created Date :24th-july-08.
 * @package		addsendmessage_a.php
 * @section		action/general
 * @author		Pradip Kumar Dash
 */
#echo "<pre>";
#print_r($_REQUEST);exit;
$view 		= $_REQUEST['view'];
$sender_id = $_REQUEST['UserId'];

$email_list	= explode(",",$_REQUEST['vTo']);

#echo "<pre>";
#print_r($email_list);exit;
for($i=0;$i<count($email_list);$i++)
{
	$ssql ='';
	$email_list[$i] = trim(str_replace("\n","",$email_list[$i]));
	$ssql = "Select iMemberId from members where vEmail = '".$email_list[$i]."'";
	$db_member = $obj->MySQLSelect($ssql);
	$iMToId[] = $db_member[0]['iMemberId'];
}

$vSubject 	= $_REQUEST['vSubject'];
$tBody 		= $_REQUEST['tBody'];
$date		= date("Y-m-d H:i:s");

$toId		=	$iMToId;

if($view == "action"){
	if($iMToId != ''){
		for($i=0;$i<count($toId);$i++)
		{
			$Data	=	array	(
						 'iFromId'	=>	$_SESSION['iUserId'],
						'eFromType'	=>	'Member',
						'iToId'		=>	$toId[$i],
						'eToType'	=>	'Member',
						'vSubject'	=>	addslashes($vSubject),
						'lBody'		=>	$tBody,
						'dMaildate'	=>	$date,
						'eRead'		=>	0);
			$iMailId = $obj->MySQLQueryPerform("qme_inbox",$Data,'insert');
			
			$Data_other	=	array	(
						 'iFromId'	=>	'',
						'eFromType'	=>	'Member',
						'iToId'		=>	$_SESSION['iUserId'],
						'eToType'	=>	'Member',
						'vSubject'	=>	addslashes($vSubject),
						'lBody'		=>	$tBody,
						'dMaildate'	=>	$date,
						'eRead'		=>	0);
			$iMailId_other = $obj->MySQLQueryPerform("qme_inbox",$Data_other,'insert');
			
			$Data1	=	array	(	'iFromId'	=>	$_SESSION['iUserId'],
									'iMailId'	=>	$iMailId_other,
									'eFromType'	=>	'Member',
									'iToId'		=>	$toId[$i],
									'eToType'	=>	'Member');
	
			$iSentMailId = $obj->MySQLQueryPerform("qme_sentmails",$Data1,'insert');
		}
	}
	if($iSentMailId)$var_msg = "Mail Send Successfully.";else $var_msg="Error in Mail send.";
}
header("Location:index.php?file=m-myinbox&var_msg=$var_msg");
echo $var_msg;
exit;
?>