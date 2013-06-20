<?php
    
    $mode = $_REQUEST['mode'];
    $iPageId = $_REQUEST['iPageId'];
    $type = $_REQUEST['type'];
   
    if($iPageId !=''){
        $sql_cat = "SELECT * FROM static_pages  WHERE iPageId='".$iPageId."'";
        $db_static_pages = $obj->MySQLSelect($sql_cat);
    }
    
    $sqlPagecode = "select distinct(vPageCode) from static_pages";
    $db_Pagecode = $obj->MySQLSelect($sqlPagecode);
    
    $smarty->assign("db_Pagecode",$db_Pagecode);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_static_pages",$db_static_pages);
    $smarty->assign("iPageId",$iPageId);
    
?>