<?php
    $iCategoryId = $_REQUEST['iCategoryId'];
    
    $sql_p = "select iParentId from categories where eStatus='Active' AND iCategoryId='".$iCategoryId."'";
    $result =$obj->MySQLSelect($sql_p);
    
    
    
    
    $smarty->assign("iParentId", $result[0]['iParentId']);
    $smarty->assign("iCategoryId", $iCategoryId);
    
    
    
    
?>