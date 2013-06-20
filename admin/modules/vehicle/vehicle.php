<?php

    $mode = $_REQUEST['mode'];
    $iVehicleTypeId = $_REQUEST['iVehicleTypeId'];
    $type = $_REQUEST['type'];
	

    if($iVehicleTypeId !=''){
        $sql = "select * from vehicle_type where iVehicleTypeId='".$iVehicleTypeId."' ";
        $db_vehicle_type = $obj->MySQLSelect($sql);
    }


    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_vehicle_type",$db_vehicle_type);
    $smarty->assign("iVehicleTypeId",$iVehicleTypeId);
    
    
?>
