<?php

    $mode = $_REQUEST['mode'];
    $iModelId = $_REQUEST['iModelId'];
    $type = $_REQUEST['type'];
	

    if($iModelId !=''){
        $sql = "select * from model where iModelId='".$iModelId."'";
        $db_model = $obj->MySQLSelect($sql);
    }

	$sql1 = "select * from make";
	$db_make = $obj->MySQLSelect($sql1);
	
	
    $smarty->assign("db_make",$db_make);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_model",$db_model);
    $smarty->assign("iModelId",$iModelId);

?>
