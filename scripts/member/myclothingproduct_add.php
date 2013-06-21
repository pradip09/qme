<?php
 $generalobj->checkFrontAuthntication();      
    $iProductId = $_REQUEST['iProductId'];
    $iMemberId = $_SESSION['iUserId'];
       
        $sqlstore = "select * from store where eStatus='Active' AND iMemberId = ".$iMemberId;
	$db_businessstore = $obj->MySQLSelect($sqlstore);
	
	$sql_category = "select vStoreCategory from store_category where iStoreCategoryId = 2";
	$db_category = $obj->MySQLSelect($sql_category );
        $vStoreCategory = $db_category[0]['vStoreCategory'];


	
	
    if($iProductId == 'add')
    {
        $mode = 'add';
	
        
    }else {
        
	$sql_allcloth = "select * from product_clothing_accessories where eStatus='Active' AND iProductId='".$iProductId."' AND iMemberId = '".$iMemberId."'";        
        $db_allclothing = $obj->MySQLSelect($sql_allcloth);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
       
    }
    
   	#echo "<pre>";
       #print_r($db_allproduct);exit;


$smarty->assign("vStoreCategory",$vStoreCategory);
$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allclothing",$db_allclothing);
$smarty->assign("db_businessstore",$db_businessstore);

?>