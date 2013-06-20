<?php
    
    $mode = $_REQUEST['mode'];
    $var_msg = $_REQUEST['var_msg'];
    
    $sql_tool="select * from question_tool_tip where eStatus='Active'";
    $db_tool=$obj->MySQLSelect($sql_tool);	
    
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_tool",$db_tool);
    $smarty->assign("var_msg",$var_msg);
?>
