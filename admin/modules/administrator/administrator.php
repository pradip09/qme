<?php
    
    $mode = $_REQUEST['mode'];
    $iAdminId = $_REQUEST['iAdminId'];
    
    $sql_groups = "SELECT * FROM admin_groups  WHERE eStatus='Active'";	
    $db_groups = $obj->MySQLSelect($sql_groups);
    
    if($iAdminId !=''){
        $sql = "select * from administrators where iAdminId='".$iAdminId."' ";
        $db_admin = $obj->MySQLSelect($sql);
    }
    $db_admin[0]['vPassword'] = $generalobj->decrypt($db_admin[0]['vPassword']);
    
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_groups",$db_groups);
    $smarty->assign("db_admin",$db_admin);
    $smarty->assign("iAdminId",$iAdminId);
?>