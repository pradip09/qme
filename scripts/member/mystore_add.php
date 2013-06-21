<?php

 #echo "<pre>";
    #print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
    $iStoreId = $_REQUEST['iStoreId'];
    #echo "$iStoreId";
    $iMemberId = $_SESSION['iUserId'];
   
    if($iStoreId == 'add')
    {
        $mode = 'add';
        
    }else {
        
	$sql_allstore = "select * from store where iStoreId='".$iStoreId."' AND iMemberId = '".$iMemberId."'";        
        $db_allstore = $obj->MySQLSelect($sql_allstore);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    


$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allstore",$db_allstore);

?>