<?php
$generalobj->checkFrontAuthntication();
$iProductId = $_REQUEST['iProductId'];

$sql_product = "SELECT * from product_automotive where iProductId = '".$iProductId."'";
$db_product = $obj->MySQLSelect($sql_product);


$sql_gallery = "select * from automotive_gallery where iProductId = $iProductId";
$db_gallery = $obj->MySQLSelect($sql_gallery);

$sql_country = "SELECT * from country_master";
$db_country = $obj->MySQLSelect($sql_country);


$sql_state = "SELECT * from state_master";
$db_state = $obj->MySQLSelect($sql_state);
#echo "<pre>";
#print_r($db_state); exit;

$iVehicleSafetyId = explode("|", $db_product[0]['iVehicleSafetyId']);
$vVehicleSafety = array();
foreach($iVehicleSafetyId as $key)
{
    $sql_vehicle_safety_security = "SELECT * from vehicle_safety_security where iVehicleSafetyId = '".$key."'";
    $db_vehicle_safety_security = $obj->MySQLSelect($sql_vehicle_safety_security);
    $vVehicleSafety[] = $db_vehicle_safety_security[0]['vVehicleSafety'];
}


$iVehicleComfortId = explode("|", $db_product[0]['iVehicleComfortId']);
$vVehicleComfort = array();
foreach($iVehicleComfortId as $key)
{
    $sql_vehicle_comfort_convenience = "SELECT * from vehicle_comfort_convenience where iVehicleComfortId = '".$key."'";
    $db_vehicle_comfort_convenience = $obj->MySQLSelect($sql_vehicle_comfort_convenience);
    $vVehicleComfort[] = $db_vehicle_comfort_convenience[0]['vVehicleComfort'];
}

$iVehicleaudioId = explode("|", $db_product[0]['iVehicleAudioId']);
$vVehicleAudio = array();
foreach($iVehicleaudioId as $key)
{
    $sql_vehicle_audio_entertainment = "SELECT * from vehicle_audio_entertainment where iVehicleaudioId = '".$key."'";
    $db_vehicle_audio_entertainment = $obj->MySQLSelect($sql_vehicle_audio_entertainment);
    $vVehicleAudio[] = $db_vehicle_audio_entertainment[0]['vVehicleAudio'];
}

$iVehicleMechanicalId = explode("|", $db_product[0]['iVehicleMechanicalId']);
$vVehicleMechanical = array();
foreach($iVehicleMechanicalId as $key)
{
    $sql_vehicle_mechanical_accessaries = "SELECT * from vehicle_mechanical_accessaries where iVehicleMechanicalId = '".$key."'";
    $db_vehicle_mechanical_accessaries = $obj->MySQLSelect($sql_vehicle_mechanical_accessaries);
    $vVehicleMechanical[] = $db_vehicle_mechanical_accessaries[0]['vVehicleMechanical'];
}

$iVehicleConditionId = explode("|", $db_product[0]['iVehicleConditionId']);
$vVehicleCondition = array();
foreach($iVehicleConditionId as $key)
{
    $sql_vehicle_condition_history = "SELECT * from vehicle_condition_history where iVehicleConditionId = '".$key."'";
    $db_vehicle_condition_history = $obj->MySQLSelect($sql_vehicle_condition_history);
    $vVehicleCondition[] = $db_vehicle_condition_history[0]['vVehicleCondition'];
}

$plusOne = 1;
$smarty->assign("plusOne",$plusOne);
$smarty->assign("db_country",$db_country);
$smarty->assign("db_state",$db_state);
$smarty->assign("db_product",$db_product);
$smarty->assign("vVehicleSafety",$vVehicleSafety);
$smarty->assign("vVehicleComfort",$vVehicleComfort);
$smarty->assign("vVehicleAudio",$vVehicleAudio);
$smarty->assign("vVehicleMechanical",$vVehicleMechanical);
$smarty->assign("vVehicleCondition",$vVehicleCondition);
$smarty->assign("db_gallery",$db_gallery);
?>