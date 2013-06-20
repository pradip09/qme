<?php
    
    $mode = $_REQUEST['mode'];    
    $iProductId = $_REQUEST['iProductId'];    
    $type = $_REQUEST['type'];
    
    $sql_gal = "SELECT * FROM automotive_gallery  WHERE iProductId='".$iProductId."'order by iGalleryId ";	
    $db_automotive_gallery = $obj->MySQLSelect($sql_gal);
    
    if($mode == 'add'){
      $totgal = 1;  
    }else{
        if(count($db_automotive_gallery) > 0){
         $totgal = count($db_automotive_gallery);
         $flag=1;
        }else{
            $totgal = 1;
            $flag = 0;
        }
        
    }
    
    if($iProductId !=''){
        
       	$sql_Product = "select * from product_automotive where iProductId='".$iProductId."' ";
		$db_automotive = $obj->MySQLSelect($sql_Product);
        
    }
    
    $sql_category = "select * from product_category where eStatus = 'Active'";
    $db_category = $obj->MySQLSelect($sql_category);
    $sql_store = "select * from store where eStatus = 'Active'";
    $db_store = $obj->MySQLSelect($sql_store);
    
    $sqlMember = "select iMemberId,vName from members";
    $db_storeMember = $obj->MySQLSelect($sqlMember);
    
    $safetyArr=explode("|",$db_automotive[0]['iVehicleSafetyId']);
    $sqlSafety = "select * from vehicle_safety_security";
    $db_vehicle_safety_security = $obj->MySQLSelect($sqlSafety);
    
    
    $comfortArr=explode("|",$db_automotive[0]['iVehicleComfortId']);
    $sqlComfort = "select * from  vehicle_comfort_convenience";
    $db_vehicle_comfort_convenience = $obj->MySQLSelect($sqlComfort);
    
    $audioArr=explode("|",$db_automotive[0]['iVehicleAudioId']);
    $sqlAudio = "select * from  vehicle_audio_entertainment";
    $db_vehicle_audio_entertainment = $obj->MySQLSelect($sqlAudio);
    
    $mechanicArr=explode("|",$db_automotive[0]['iVehicleMechanicalId']);
    $sqlMechanic = "select * from   vehicle_mechanical_accessaries";
    $db_vehicle_mechanical_accessaries = $obj->MySQLSelect($sqlMechanic);
    
    $conditionArr=explode("|",$db_automotive[0]['iVehicleConditionId']);
    $sqlCondition = "select * from   vehicle_condition_history";
    $db_vehicle_condition_history = $obj->MySQLSelect($sqlCondition);
    
    $sqlMake="select * from  make";
    $db_automake = $obj->MySQLSelect($sqlMake);
    
    $sqlMember="select * from  members";
    $db_Automember = $obj->MySQLSelect($sqlMember);
    
    
    $smarty->assign("safetyArr",$safetyArr);   
    $smarty->assign("db_vehicle_safety_security",$db_vehicle_safety_security);
    $smarty->assign("comfortArr",$comfortArr);   
    $smarty->assign("db_vehicle_comfort_convenience",$db_vehicle_comfort_convenience);
    $smarty->assign("audioArr",$audioArr);   
    $smarty->assign("db_vehicle_audio_entertainment",$db_vehicle_audio_entertainment);
    $smarty->assign("mechanicArr",$mechanicArr);   
    $smarty->assign("db_vehicle_mechanical_accessaries",$db_vehicle_mechanical_accessaries);
    $smarty->assign("conditionArr",$conditionArr);   
    $smarty->assign("db_vehicle_condition_history",$db_vehicle_condition_history);
    $smarty->assign("db_storeMember",$db_storeMember);
    $smarty->assign("db_store",$db_store);
    $smarty->assign("db_category",$db_category);
    $smarty->assign("db_automake",$db_automake);
    $smarty->assign("db_Automember",$db_Automember);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_automotive",$db_automotive);   
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("result",$result);
    $smarty->assign("db_automotive_gallery",$db_automotive_gallery);
    $smarty->assign("totgal",$totgal);
    $smarty->assign("flag",$flag);
    
?>
