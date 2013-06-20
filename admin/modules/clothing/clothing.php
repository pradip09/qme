<?php
    
    $mode = $_REQUEST['mode'];
    $iProductId = $_REQUEST['iProductId'];
	
    if($iProductId !=''){
        
       	$sql_Product = "select * from   product_clothing_accessories where iProductId='".$iProductId."' ";
		$db_clothing = $obj->MySQLSelect($sql_Product);
        
    }
    
    $sql_category = "select * from product_category where eStatus = 'Active'";
    $db_category = $obj->MySQLSelect($sql_category);
    $sql_store = "select * from store where eStatus = 'Active'";
    $db_store = $obj->MySQLSelect($sql_store);
    
    $sqlMember = "select iMemberId,vName from members";
    $db_storeMember = $obj->MySQLSelect($sqlMember);
    
    $sqlMember="select * from  members";
    $db_Clothmember = $obj->MySQLSelect($sqlMember);
    
    $smarty->assign("db_storeMember",$db_storeMember);
    $smarty->assign("db_store",$db_store);
    $smarty->assign("db_category",$db_category);
    $smarty->assign("db_Clothmember",$db_Clothmember);
    $smarty->assign("mode",$mode);
    $smarty->assign("db_clothing",$db_clothing);   
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("result",$result);
    
    
?>
