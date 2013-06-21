<?php

#echo "<pre>";
#print_r($_REQUEST);exit;
$generalobj->checkFrontAuthntication();
    $songalbumid = $_REQUEST['songalbumid'];
    $iMemberId  = $_SESSION['iUserId'];
    if($songalbumid == 'add')
    {
        $mode = 'add';
        
    }
    else
    {
    	$sql_allsongcategory = "select * from song_album where iSongAlbumId='".$songalbumid."' AND iMemberId = '".$iMemberId."'";
        $db_allsongcategory = $obj->MySQLSelect($sql_allsongcategory);
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
    


$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_allsongcategory",$db_allsongcategory);

?>