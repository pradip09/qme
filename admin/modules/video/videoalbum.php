<?php


	$mode = $_REQUEST['mode'];
	$iVideoAlbumId = $_REQUEST['iVideoAlbumId'];
	$type = $_REQUEST['type'];
	

    if($iVideoAlbumId !=''){
        $sql = "select * from video_album where $iVideoAlbumId='".$iVideoAlbumId."' ";
        $db_videoalbum = $obj->MySQLSelect($sql);
    }


    $smarty->assign("mode",$mode);
    $smarty->assign("type",$type);
    $smarty->assign("db_videoalbum",$db_videoalbum);
    $smarty->assign("iVideoAlbumId",$iVideoAlbumId);
    
?>
