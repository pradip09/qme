<?php
    
    $mode = $_REQUEST['mode'];
    $var_msg = $_REQUEST['var_msg'];
    
    $sql="select * from configurations where eStatus='Active' ORDER BY eType ASC,vOrder ASC";
    $db_res=$obj->MySQLSelect($sql);	
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_res",$db_res);
    $smarty->assign("var_msg",$var_msg);
?>
