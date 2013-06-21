<?php

//echo '<pre>';
//print_r($_REQUEST);exit;
//echo $count_msg;exit;

$generalobj->checkFrontAuthntication();
require_once(TPATH_CLASS_GEN."class.mailbox.php");
$ssql = '';
$msg1 = $_REQUEST['var_msg'];
$chkarr = $_POST['ch'];
$action =$_POST['moreaction'];
$vSearch = $_REQUEST['vSearch'];
$vRead	= $_REQUEST['vRead'];

for($k=0;$k<count($chkarr);$k++){
	$charr.=$chkarr[$k].",";
}

$checkedId = substr($charr,0,-1);
if(count($chkarr) > 0){
	if($_POST['view']== 'Delete'){
		$whe = "iMailId in (".$checkedId.")";
		$db_res = $dbobj->MySQLDelete('qme_inbox',$whe);
		if($db_res)
			$msg = "Deleted successfully.";
	}
	if($_POST['moreaction'] !=''){
		
		$data_mail = array();
		$data_mail = array_merge($data_mail,array('eRead' => $action));
		$where = " iMailId in(".$checkedId.")";
		$result  = $dbobj->MySQLQueryPerform('qme_inbox',$data_mail,'update',$where);
		if($result){
			switch($action){
				case("0"):
					$msg = "have been marked unread.";
					break;
				case("1"):
					$msg = "have been marked read.";
					break;	
			}
		}
	}
}

$var_msg = "".count($chkarr)." conversations ".$msg."";
if(count($chkarr) <= 0){
	$var_msg = "No conversations Selected.";
}
$mailboxObj = new Mailbox($_SESSION['iUserId'],'Member');

if($vSearch != ''){
//$ssql.= " AND inb.vSubject like '%".$vSearch."%'";	else	$ssql.= "";
$ssql.= " AND vSubject LIKE '".stripslashes($vSearch)."%' or vEmail LIKE '".stripslashes($vSearch)."%'";
 
}

if($vRead  != '')   $ssql.= " AND inb.eRead = '".$vRead."'";	else	$ssql.= "";

$cnt = count($mailboxObj->MyInbox('No','',$ssql));
$num_totrec = $cnt;
include(TPATH_CLASS_GEN."paging.inc.php");
$stat =	$_REQUEST['stat'];
$nstart = $_REQUEST['nstart'];
$msgs =	$mailboxObj->MyInbox('No',$var_limit,$ssql);
//echo "<pre>";
//print_r($ssql);exit;

/* get Array for Read / Unread Functionality */
for($j=0;$j<count($msgs);$j++){
	if($msgs[$j]['iMailId'] !=''){
		$read.="[[".$msgs[$j]['eRead']."],[".$msgs[$j]['iMailId']."]]".",";
	}
	$msgs[$j]['dMaildate'] = date("F j", strtotime($msgs[$j]['dMaildate']));
	
}
$readarr = substr($read,0,-1);
if(!isset($start))
	$start = 1;
	$num_limit = ($start-1)*$rec_limit;
	$startrec = $num_limit;
	$lastrec = $startrec + $rec_limit;
	$startrec = $startrec + 1;
	if($lastrec > $num_totrec)
		$lastrec = $num_totrec;
		if($num_totrec > 0 ){
			$recmsg = "<span class=bmatter>".$startrec." - ".$lastrec."</span> of <span class=bmatter>".$num_totrec."</span>";
		}else{
			$recmsg="No Conversation Found.";
		}



$count_msg = count($msgs);
$smarty->assign("count_msg",$count_msg);
$smarty->assign("readarr",$readarr);
$smarty->assign("msg1",$msg1);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("num_totrec",$num_totrec);
$smarty->assign("action",$action);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("msgs",$msgs);
$smarty->assign("vSearch",$vSearch);



?>

