<?php
 $generalobj->checkFrontAuthntication();      
    $iProductId = $_REQUEST['iProductId'];
    $iMemberId = $_SESSION['iUserId'];
    $mode = $_REQUEST['mode'];
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
        
    $sqltype = "select * from product_automotive ";
	$db_product_automotive = $obj->MySQLSelect($sqltype);
    
    $sqlMake="select * from  make";
    $db_automake = $obj->MySQLSelect($sqlMake);
    
    if($iProductId == 'add')
    {
        $mode = 'add';
	
        
    }else {
        
	    $sql_allauto = "select * from product_automotive where iProductId='".$iProductId."' AND iMemberId = '".$iMemberId."'";        
        $db_allautomotive = $obj->MySQLSelect($sql_allauto);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
       
    }
    
    $safetyArr=explode("|",$db_allautomotive[0]['iVehicleSafetyId']); 
    
    $sqlSafety = "select * from vehicle_safety_security";
	$db_vehicle_safety_security = $obj->MySQLSelect($sqlSafety);
    
    $comfortArr=explode("|",$db_allautomotive[0]['iVehicleComfortId']);
    
    
    $sqlComfort = "select * from  vehicle_comfort_convenience";
  $db_vehicle_comfort_convenience = $obj->MySQLSelect($sqlComfort);
    
    $audioArr=explode("|",$db_allautomotive[0]['iVehicleAudioId']);
    
    $sqlAudio = "select * from  vehicle_audio_entertainment";
	$db_vehicle_audio_entertainment = $obj->MySQLSelect($sqlAudio); 
    
    $mechanicArr=explode("|",$db_allautomotive[0]['iVehicleMechanicalId']);
    
    $sqlMechanic = "select * from   vehicle_mechanical_accessaries";
	$db_vehicle_mechanical_accessaries = $obj->MySQLSelect($sqlMechanic);
    
    $conditionArr=explode("|",$db_allautomotive[0]['iVehicleConditionId']);
    
$sqlCondition = "select * from   vehicle_condition_history";
$db_vehicle_condition_history = $obj->MySQLSelect($sqlCondition);

$sql_vehicle = "select * from   vehicle_type";
$db_vehicle_type= $obj->MySQLSelect($sql_vehicle);



#echo "<pre>";
#print_r($db_vehicle_type);exit;

$smarty->assign("iProductId",$iProductId);
$smarty->assign("db_vehicle_type",$db_vehicle_type); 
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

$smarty->assign("mode",$mode);
$smarty->assign("type",$type);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allautomotive",$db_allautomotive);
//$smarty->assign("db_businessstore",$db_businessstore);
$smarty->assign("db_product_automotive",$db_product_automotive);
$smarty->assign("db_automake",$db_automake);
$smarty->assign("db_automotive_gallery",$db_automotive_gallery);
$smarty->assign("totgal",$totgal);
$smarty->assign("flag",$flag);

?>