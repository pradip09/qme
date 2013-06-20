<?php

    $mode = $_REQUEST['mode'];
    $iNewsId = $_REQUEST['iNewsId'];
    $type = $_REQUEST['type'];

    if($iNewsId !=''){
        $sql = "select * from news_nfl where iNewsId='".$iNewsId."' ";
        $db_news = $obj->MySQLSelect($sql);
	
    }
         
	$sqlcnt= "select count(*) as total from news_nfl";
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];
	
	$initOrder =1;
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);

    
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_news",$db_news);
    $smarty->assign("iNewsId",$iNewsId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
