<?php
    
    $mode = $_REQUEST['mode'];
    
    $iEstimateId = $_REQUEST['iEstimateId'];
    
    if($iEstimateId !=''){
        
        
        $sql_cat1 = "SELECT e.*,u.vEmail AS vEmail,e.*,concat(u.vFirstName,' ',u.vLastName) AS Name FROM estimates AS e LEFT JOIN users AS u ON(u.iUserId=e.iUserId) WHERE e.iEstimateId='5'";	
        #print_r($sql_cat1);exit;
        $db_est = $obj->MySQLSelect($sql_cat1);
        #echo "<pre>";
        #print_r($db_est);exit;
        $sql_cat = "SELECT * FROM estimate_orders  WHERE iEstimateId='".$iEstimateId."'";	
        
        $db_cat = $obj->MySQLSelect($sql_cat);
        
    }
    
    #echo "<pre>";
    #print_r($db_cat);exit;
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_est",$db_est);
    $smarty->assign("db_cat",$db_cat);
    $smarty->assign("iEstimateId",$iEstimateId);
    
    ?>
