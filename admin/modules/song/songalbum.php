<?php
	$mode = $_REQUEST['mode'];
	$iSongAlbumId = $_REQUEST['iSongAlbumId'];
	$type = $_REQUEST['type'];
	
	if($iSongAlbumId !='')
	{
		$sql = "select * from song_album where iSongAlbumId='".$iSongAlbumId."' ";
		$db_songalbum = $obj->MySQLSelect($sql);
	}
	
	$smarty->assign("mode",$mode);
	$smarty->assign("type",$type);
	$smarty->assign("db_songalbum",$db_songalbum);
	$smarty->assign("iSongAlbumId",$iSongAlbumId);
	$smarty->assign("stateArr",$stateArr);
	$smarty->assign("address",$address);
?>
