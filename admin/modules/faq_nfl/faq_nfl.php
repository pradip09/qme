<?php

    $mode = $_REQUEST['mode'];
    $iFAQId = $_REQUEST['iFAQId'];
    $type = $_REQUEST['type'];

    if($iFAQId !=''){
        $sql = "select * from faq_nfl where iFAQId='".$iFAQId."' ";
        $db_faq = $obj->MySQLSelect($sql);
    }
	$sql1 = "select * from faq_category_nfl";
	$db_faqcate = $obj->MySQLSelect($sql1);
	
	$sqlcnt= "select count(*) as total from faq_nfl";
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];
	
	$initOrder =1;
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);

    $smarty->assign("db_faqcate",$db_faqcate);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_faq",$db_faq);
    $smarty->assign("iFAQId",$iFAQId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
