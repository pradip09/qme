<?php

    $mode = $_REQUEST['mode'];
    $iBannerId = $_REQUEST['iBannerId'];
    $type = $_REQUEST['type'];

    if($iBannerId !=''){
        $sql = "select * from banner_tab where iBannerId='".$iBannerId."' ";
        $db_hometab = $obj->MySQLSelect($sql);
	
    }
         
	$sqlcnt= "select count(*) as total from banner_tab";
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];
	
	$initOrder =1;
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);

    
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_hometab",$db_hometab);
    $smarty->assign("iBannerId",$iBannerId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
