<?php
    $generalobj->checkFrontAuthntication();
    
    $iStoreCategoryId = $_REQUEST['iStoreCategoryId'];
 
    $sql = "select vStoreCategory from store_category where iStoreCategoryId = $iStoreCategoryId";
    $db_store = $obj->MySQLSelect($sql);
    $vStoreCategory =  $db_store[0]['vStoreCategory'];
    
    $smarty->assign("iStoreCategoryId",$iStoreCategoryId);
    $smarty->assign("vStoreCategory",$vStoreCategory);
?>
