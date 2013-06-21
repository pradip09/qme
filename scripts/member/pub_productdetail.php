<?php


$generalobj->checkFrontAuthntication();
    $url = $_REQUEST['mamberurl'];
    $useid = $_SESSION['iUserId'];
    $sql_userr = "select * from members where iMemberId='".$useid."'";
    $db_userr = $obj->MySQLSelect($sql_userr);
    $memurl=$db_userr[0]['vMemberUrl'];
    //echo $memurl;exit;
    $sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);
    
    if($db_user[0]['iMemberId'] == ''){

        header("location:".$tconfig["tsite_url"]."/home");

    }else{
        $iProductId = $_REQUEST['iProductId'];
        $iUserid = $db_user[0]['iMemberId'];
        $iCatId = $_REQUEST['iCatId'];
        if($iCatId == 1)
        {
        $sqlpro="SELECT * FROM product_general_item WHERE iMemberId = '".$iUserid."' AND iProductId = '".$iProductId."' AND eStatus = 'Active'";
        $db_product = $obj->MySQLSelect($sqlpro);
        }
        if($iCatId == 2)
        {
        $sqlpro="SELECT * FROM product_clothing_accessories WHERE iMemberId = '".$iUserid."' AND iProductId = '".$iProductId."' AND eStatus = 'Active'";
        $db_product = $obj->MySQLSelect($sqlpro);
        }
        if($iCatId == 3)
        {
        $sqlpro="SELECT * FROM product_automotive WHERE iMemberId = '".$iUserid."' AND iProductId = '".$iProductId."' AND eStatus = 'Active'";
        $db_product = $obj->MySQLSelect($sqlpro);
        $sql_gallery = "select * from automotive_gallery where iProductId = $iProductId";
        $db_gallery = $obj->MySQLSelect($sql_gallery);
        
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

        }
        if($iCatId == 4)
        {
        $sqlpro="SELECT * FROM product_real_estate WHERE iMemberId = '".$iUserid."' AND iProductId = '".$iProductId."' AND eStatus = 'Active'";
        $db_product = $obj->MySQLSelect($sqlpro);
        $iProductId = $db_product[0]['iProductId'];

        $sql_gallery = "select * from product_gallery where iProductId = $iProductId";
        $db_gallery = $obj->MySQLSelect($sql_gallery);

        }
        
        
        
    }
$plusOne = 1;

    $smarty->assign("url",$url);
    $smarty->assign("memurl",$memurl);
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("plusOne",$plusOne);
    $smarty->assign("vVehicleSafety",$vVehicleSafety);
    $smarty->assign("vVehicleComfort",$vVehicleComfort);
    $smarty->assign("vVehicleAudio",$vVehicleAudio);
    $smarty->assign("vVehicleMechanical",$vVehicleMechanical);
    $smarty->assign("vVehicleCondition",$vVehicleCondition);
    $smarty->assign("db_gallery",$db_gallery);
    $smarty->assign("iCatId", $iCatId);
    $smarty->assign("db_product", $db_product);
    $smarty->assign("db_user", $db_user);
    $smarty->assign("iMemberid", $iUserid);


?>