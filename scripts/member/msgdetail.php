<?php

$generalobj->checkFrontAuthntication();
require_once(TPATH_CLASS_GEN."class.mailbox.php");
$mailboxObj = new Mailbox($_SESSION['iUserId'],'Member');

$msgsDetail = 	$mailboxObj->MailDetail($_REQUEST['iMailId'],$_REQUEST['viewtype']);
$sql="select * from qme_sentmails where iMailId=".$_REQUEST['iMailId']."";
$db_sent = $obj->MySQLSelect($sql);
$sqll="select * from members where iMemberId=".$db_sent[0]['iFromId']."";
$db_memname = $obj->MySQLSelect($sqll);


if($_REQUEST['viewtype'] == 'inbox'){
	$data_mail = array();
	$data_mail = array_merge($data_mail,array('eRead' => 1));
	$where = " iMailId = ".$_REQUEST['iMailId']."";
	$result  = $obj->MySQLQueryPerform('qme_inbox',$data_mail,'update',$where);
	$sent = 0;
}
if($_REQUEST['viewtype'] == 'sentmail')
{
	$data = array();
	$data = array_merge($data,array('eRead' => 1));
	$where = " iMailId = ".$_REQUEST['iMailId']."";
	$result  = $obj->MySQLQueryPerform('qme_inbox',$data,'update',$where);
	$sent = 1;
}
$iMailId = $_REQUEST['iMailId'];

$smarty->assign("iMailId",$iMailId);
$smarty->assign("db_memname",$db_memname);
$smarty->assign("sent",$sent);
$smarty->assign("msgsDetail",$msgsDetail);


?>
