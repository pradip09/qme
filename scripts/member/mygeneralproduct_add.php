<?php
    
    $generalobj->checkFrontAuthntication();      
    $iProductId = $_REQUEST['iProductId'];
    $iMemberId = $_SESSION['iUserId'];
       
    $sqlstore = "select * from store where eStatus='Active' AND iMemberId = ".$iMemberId;
    $db_businessstore = $obj->MySQLSelect($sqlstore);

    if($iProductId == 'add')
    {
        $mode = 'add';    
    }
    else
    {
	$sql_allproduct = "select * from product_general_item where iProductId='".$iProductId."' AND iMemberId = '".$iMemberId."'";        
        $db_allproduct = $obj->MySQLSelect($sql_allproduct);
        $mode = 'edit';
    }


$sql_category = "select vStoreCategory from store_category where iStoreCategoryId = 1";
$db_category = $obj->MySQLSelect($sql_category );
$vStoreCategory = $db_category[0]['vStoreCategory'];

$smarty->assign("vStoreCategory",$vStoreCategory);
$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allproduct",$db_allproduct);
$smarty->assign("db_businessstore",$db_businessstore);

?>