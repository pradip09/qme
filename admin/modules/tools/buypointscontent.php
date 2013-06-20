<?php
    
    $mode = $_REQUEST['mode'];
    $var_msg = $_REQUEST['var_msg'];
    
    $sql="select * from buy_points_content where eStatus='Active' ORDER BY iContentId ASC";
    $db_res=$obj->MySQLSelect($sql);	
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_res",$db_res);
    $smarty->assign("TPATH_ADMIN_CKEDITOR_URL",TPATH_ADMIN_CKEDITOR_URL);
    $smarty->assign("var_msg",$var_msg);
?>
