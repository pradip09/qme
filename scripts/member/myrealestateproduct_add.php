<?php
   $generalobj->checkFrontAuthntication();      
    $iProductId = $_REQUEST['iProductId'];
    $iMemberId = $_SESSION['iUserId'];
    
    $mode = $_REQUEST['mode'];
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
    
    
      
    //$sqlstore = "select * from store where eStatus='Active' AND iMemberId = ".$iMemberId;
	//$db_businessstore = $obj->MySQLSelect($sqlstore);
	    
    $sqltype = "select * from product_real_estate ";
	$db_product_real_estate = $obj->MySQLSelect($sqltype);
    
    $sql_real_estate_property = "select * from real_estate_property where eStatus = 'Active'";
    $db_real_estate_property = $obj->MySQLSelect($sql_real_estate_property);
    #echo "<pre>";
    #print_r($db_real_estate_property);exit;
    $sqlcountrymaster="select * from  country_master";
    $db_realcountry = $obj->MySQLSelect($sqlcountrymaster);
    
    if($iProductId == 'add')
    {
        $mode = 'add';
	
        
    }else {
        
	$sql_allreal = "select * from product_real_estate where iProductId='".$iProductId."' AND iMemberId = '".$iMemberId."'";        
	$db_allrealestate = $obj->MySQLSelect($sql_allreal);
	/*echo "<pre>";
	print_r($db_allrealestate);exit;*/
        $mode = 'edit';
    }
   
$smarty->assign("mode",$mode);
$smarty->assign("type",$type);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allrealestate",$db_allrealestate);
//$smarty->assign("db_businessstore",$db_businessstore);
$smarty->assign("db_product_real_estate",$db_product_real_estate);
$smarty->assign("db_real_estate_property",$db_real_estate_property);
$smarty->assign("db_realcountry",$db_realcountry); 
$smarty->assign("db_product_gallery",$db_product_gallery);
$smarty->assign("totgal",$totgal);
$smarty->assign("flag",$flag);
?>