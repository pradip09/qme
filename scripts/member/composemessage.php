<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
require_once(TPATH_CLASS_GEN."class.mailbox.php");

$mailboxObj = new Mailbox($_SESSION['iUserId'],'member');
//echo SessionVar('SESS_USERTYPE');
$all_member_sql = "SELECT * FROM qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus='Active' AND  qf.iFriendId = '".$_SESSION['iUserId']."' AND (qf.eStatus = 'Approve' OR qf.eStatus = 'Blocked') ";
 
//$all_member_sql = "select * from members where iMemberId != '".$_SESSION['iUserId']."'";
$all_member = $obj->MySQLSelect($all_member_sql);
//echo $_REQUEST['iMailId'];
if($_REQUEST['iMailId'] != '')
{
	$arr = $generalobj->getInfoTable("qme_inbox","iMailId",$_REQUEST['iMailId']);
	if($arr[0]['eFromType'] == 'Member'){
		$uname = $generalobj->getInfoTable("members","iMemberId",$arr[0]['iFromId']);
		$iMemId = $arr[0]['iFromId'];
	}
	$subject = "Fwd: ".$arr[0]['vSubject'];
}

//echo "<pre>";
//print_r($uname);exit;
$smarty->assign("all_member",$all_member);
$smarty->assign("uname",$uname);
$smarty->assign("subject",$subject);

$smarty->assign("iUserId",$_SESSION['iUserId']);
$smarty->assign("iMemId",$iMemId);

//echo $iMemId;exit;
?>