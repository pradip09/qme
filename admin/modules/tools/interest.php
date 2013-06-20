<?php
    
    $mode = $_REQUEST['mode'];
    $iInterestId = $_REQUEST['iInterestId'];
    
    if($iInterestId !=''){
        $sql_cat = "SELECT * FROM interest  WHERE iInterestId='".$iInterestId."'";
        $db_interest = $obj->MySQLSelect($sql_cat);
    }
    
    $sql = "SELECT * FROM interest ";
    $db_interest_name = $obj->MySQLSelect($sql);
        
    $smarty->assign("mode",$mode);
    $smarty->assign("db_interest",$db_interest);
    $smarty->assign("db_interest_name",$db_interest_name);
    $smarty->assign("iInterestId",$iInterestId);
   
?>