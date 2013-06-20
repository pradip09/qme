<?php
    
    $mode = $_REQUEST['mode'];

    $iAgencybannerId = $_REQUEST['iAgencybannerId'];
    $type = $_REQUEST['type'];
    $var_msg = $_REQUEST['var_msg'];
    //echo $var_msg;exit;
    if($iAgencybannerId !=''){
        
        $sql_cat = "SELECT * FROM agency_banner  WHERE iAgencybannerId='".$iAgencybannerId."'";
        $db_agn_banner = $obj->MySQLSelect($sql_cat);
	
    }
    
    
    //echo "<pre>";
    //print_r($db_agn_banner);exit;
    
    $smarty->assign("path",$path);
    $smarty->assign("var_msg",$var_msg);
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_agn_banner",$db_agn_banner);
    $smarty->assign("iAgencybannerId",$iAgencybannerId);
  
    
?>

