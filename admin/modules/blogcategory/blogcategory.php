<?php
	$mode = $_REQUEST['mode'];
    $iBlogCategoryId = $_REQUEST['iBlogCategoryId'];
    $type = $_REQUEST['type'];
	

    if($iBlogCategoryId !=''){
        $sql = "select * from blogcategory where iBlogCategoryId='".$iBlogCategoryId."' ";
        $db_blogcategory = $obj->MySQLSelect($sql);
    }


    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_blogcategory",$db_blogcategory);
    $smarty->assign("iBlogCategoryId",$iBlogCategoryId);
    $smarty->assign("stateArr",$stateArr);
    $smarty->assign("address",$address);
?>
