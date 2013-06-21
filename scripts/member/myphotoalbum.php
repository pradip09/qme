<?php

$generalobj->checkFrontAuthntication();
    $albumid = $_REQUEST['albumid'];
    
    $iMemberId    = $_SESSION['iUserId'];
    
    
//echo "<pre>";
//print_r($_REQUEST);exit;
    if($albumid == 'add')
    {
        $mode = 'add';
        
    }else{
       

	$sql_allcategory = "select * from photo_category where iPhotoCategoryId='".$albumid."' AND iMemberId = '".$iMemberId."'";
        
        $db_allcategory = $obj->MySQLSelect($sql_allcategory);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    
#echo "<pre>";
#print_r ($db_allcategory);exit;

$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allcategory",$db_allcategory);

?>