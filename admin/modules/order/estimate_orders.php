<?php
    
    $mode = $_REQUEST['mode'];
    
    $iEstimateDetailId = $_REQUEST['iEstimateDetailId'];
    
    if($iEstimateDetailId !=''){
        $sql_cat = "SELECT * FROM estimate_orders  WHERE iEstimateDetailId='".$iEstimateDetailId."'";	
        $db_cat = $obj->MySQLSelect($sql_cat);
    }
    #echo "<pre>";
    #print_r($db_admin);exit;
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_cat",$db_cat);
    $smarty->assign("iEstimaiEstimateDetailId");
    
    ?>
