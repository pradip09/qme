<?php
    
    $mode = $_REQUEST['mode'];
    
    $iProductId = $_REQUEST['iProductId'];
    #echo "<pre>";
    #print_r($iProductId);exit;
	
    if($iProductId !=''){
        
       	$sql_Product = "select * from  product_general_item where iProductId='".$iProductId."' ";
		$db_product = $obj->MySQLSelect($sql_Product);
        
    }
   #echo "<pre>";
        #print_r($db_product2); exit;
    $sql_category = "select * from product_category where eStatus = 'Active'";
    $db_category = $obj->MySQLSelect($sql_category);
    $sql_store = "select * from store where eStatus = 'Active'";
    $db_store = $obj->MySQLSelect($sql_store);
    #echo "<pre>";
    #print_r($db_category);
    #exit;
    $sqlMember = "select iMemberId,vName from members";
	$db_storeMember = $obj->MySQLSelect($sqlMember);
    
    $sqlMember="select * from  members";
    $db_Genmember = $obj->MySQLSelect($sqlMember);
    
    $smarty->assign("db_storeMember",$db_storeMember);
    $smarty->assign("db_store",$db_store);
    $smarty->assign("db_category",$db_category);
    $smarty->assign("db_Genmember",$db_Genmember);
    $smarty->assign("mode",$mode);
    $smarty->assign("db_product",$db_product);   
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("result",$result);
?>
