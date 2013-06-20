<?php

    
    $mode = $_REQUEST['mode'];
    $iProductId = $_REQUEST['iProductId'];
    $type = $_REQUEST['type'];
    
    $sql_gal = "SELECT * FROM product_gallery  WHERE iProductId='".$iProductId."' order by iGalleryId ";	
    $db_product_gallery = $obj->MySQLSelect($sql_gal);
    if($mode == 'add'){
      $totgal = 1;  
    }else{
        if(count($db_product_gallery) > 0){
         $totgal = count($db_product_gallery);
         $flag=1;
        }else{
            $totgal = 1;
            $flag = 0;
        }
        
    }
    
    
    if($iProductId !=''){
        
       	$sql_Product = "select * from product_real_estate where iProductId='".$iProductId."' ";
		$db_realestate = $obj->MySQLSelect($sql_Product);
        
    }

    $sql_category = "select * from product_category where eStatus = 'Active'";
    $db_category = $obj->MySQLSelect($sql_category);

    $sql_store = "select * from store where eStatus = 'Active'";
    $db_store = $obj->MySQLSelect($sql_store);

    $sqlMember = "select iMemberId,vName from members";
    $db_storeMember = $obj->MySQLSelect($sqlMember);
    
    $sql_real_estate_property = "select * from real_estate_property where eStatus = 'Active'";
    $db_real_estate_property = $obj->MySQLSelect($sql_real_estate_property);
    
    $sql_state_master = "select * from  state_master where eStatus = 'Active'";
    $db_state_master = $obj->MySQLSelect($sql_state_master);
    
    
    $sqlcountrymaster="select * from  country_master";
    $db_realcountry = $obj->MySQLSelect($sqlcountrymaster);
    
    $sqlMember="select * from  members";
    $db_Realmember = $obj->MySQLSelect($sqlMember);
   
    
    $smarty->assign("db_storeMember",$db_storeMember);
    $smarty->assign("db_store",$db_store);
    $smarty->assign("db_real_estate_property",$db_real_estate_property);
    $smarty->assign("db_state_master",$db_state_master);
    $smarty->assign("db_category",$db_category);
    $smarty->assign("db_realcountry",$db_realcountry); 
    $smarty->assign("db_Realmember",$db_Realmember);   
    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_realestate",$db_realestate);   
    $smarty->assign("iProductId",$iProductId);
    $smarty->assign("result",$result);
    $smarty->assign("db_product_gallery",$db_product_gallery);
    $smarty->assign("totgal",$totgal);
    $smarty->assign("flag",$flag);
    
?>
