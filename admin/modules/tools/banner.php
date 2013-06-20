<?php
    
    $mode = $_REQUEST['mode'];
    $iBannerId = $_REQUEST['iBannerId'];
    $type = $_REQUEST['type'];
    $var_msg = $_REQUEST['var_msg'];
    //echo $var_msg;exit;
    if($iBannerId !=''){
        
        $sql_cat = "SELECT * FROM banner  WHERE iBannerId='".$iBannerId."'";
        $db_banner = $obj->MySQLSelect($sql_cat);
	
    }
    
    $smarty->assign("var_msg",$var_msg);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_banner",$db_banner);
    $smarty->assign("iBannerId",$iBannerId);
    $smarty->assign("bannertitle",$bannertitle);
    
?>

