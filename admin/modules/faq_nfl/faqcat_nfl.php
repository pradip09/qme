<?php

    $mode = $_REQUEST['mode'];
    $iFAQCategoryId = $_REQUEST['iFAQCategoryId'];
    $type = $_REQUEST['type'];

    if($iFAQCategoryId !=''){
        $sql = "select * from faq_category_nfl where iFAQCategoryId='".$iFAQCategoryId."' ";
        $db_faqcat = $obj->MySQLSelect($sql);
    }	
	$sqlcnt= "select count(*) as total from faq_category_nfl";
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];
	$initOrder =1;	
	
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);
	$smarty->assign("mode",$mode);
	$smarty->assign("type",$type);
	$smarty->assign("db_faqcat",$db_faqcat);
	$smarty->assign("iFAQCategoryId",$iFAQCategoryId);
    
?>
