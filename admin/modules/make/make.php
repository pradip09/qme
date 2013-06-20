<?php


    $mode = $_REQUEST['mode'];
    $imakeId = $_REQUEST['imakeId'];
    $type = $_REQUEST['type'];

    if($imakeId !=''){
        $sql = "select * from make where imakeId='".$imakeId."' ";
        $db_make= $obj->MySQLSelect($sql);
    }
	
	$sqlcnt= "select count(*) as total from make";
	$db_qry = $obj->MySQLSelect($sqlcnt);
	$totalRec = $db_qry[0]['total'];
	
	$initOrder =1;
	$smarty->assign("initOrder",$initOrder);
	$smarty->assign("totalRec",$totalRec);


    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_make",$db_make);
    $smarty->assign("imakeId",$imakeId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
