<?php

$generalobj->checkFrontAuthntication();
require_once(TPATH_CLASS_GEN."class.mailbox.php");
$msg1	= $_REQUEST['var_msg'];
$vSearch = $_REQUEST['vSearch'];

$vRead = $_REQUEST['vRead'];

$mailboxObj = new Mailbox($_SESSION['iUserId'],'Member');

//if($vSearch	!= '') 	$ssql.= " AND kin.vSubject like('%".$vSearch."%')";
	
if($vSearch != ''){
//$ssql.= " AND inb.vSubject like '%".$vSearch."%'";	else	$ssql.= "";
$ssql.= " AND kin.vSubject LIKE '".stripslashes($vSearch)."%' or  m.vEmail  LIKE '".stripslashes($vSearch)."%'";
 
}	


if($vRead  != '') $ssql.= " AND kin.eRead = '".$vRead."'";else $ssql.= "";
$cnt = $mailboxObj->SentMails('Yes','',$ssql);
$num_totrec	=	$cnt[0]['tot'];
include(TPATH_CLASS_GEN."paging.inc.php");

$stat  	 	= $_REQUEST['stat'];
$nstart   	= $_REQUEST['nstart'];
$msgs = $mailboxObj->SentMails('No',$var_limit,$ssql);
//echo "<pre>";
//print_r($msgs);exit;

for($j=0;$j<count($msgs);$j++){
	$msgs[$j]['dMaildate'] = date("F j", strtotime($msgs[$j]['dMaildate']));
}

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

$var_msg = $_REQUEST['var_msg'];



$smarty->assign("var_msg",$var_msg);
$smarty->assign("num_totrec",$num_totrec);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("msgs",$msgs);
$smarty->assign("msg1",$msg1);
$smarty->assign("vSearch",$vSearch);
$smarty->assign("count_msg",$count_msg);
	
//$smarty->assign("page_link",$page_link);



?>
