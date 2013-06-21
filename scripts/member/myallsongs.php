<?php

$generalobj->checkFrontAuthntication();

$iSongAlbumId= $_REQUEST['iSongAlbumId'];

$iMemberId    = $_SESSION['iUserId'];

$sql_albums = "Select * from song_album where iMemberId = '".$iMemberId."' AND iSongAlbumId='".$iSongAlbumId."'";
	$db_songalbums = $obj->MySQLSelect($sql_albums);

if($db_songalbums[0]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_SONG."/".$db_songalbums[0]['iMemberId']."/".$db_songalbums[0]['vImage'])){
	$db_songalbums[0]['vImage'] = $tconfig["front_images"]."2_nomusic_img.jpg";
}else{
	$db_songalbums[0]['vImage'] = $tconfig["tsite_upload_music_song"].$db_songalbums[0]['iMemberId']."/"."2_".$db_songalbums[0]['vImage'];
}


$sql_category = "Select * from song_album where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);

$sql_genre = "Select * from song_genre";
	$db_genre = $obj->MySQLSelect($sql_genre);
	$smarty->assign("db_genre", $db_genre);
	
        
        $smarty->assign("db_songalbums", $db_songalbums);
$smarty->assign("db_albums", $db_albums);
$smarty->assign("iSongAlbumId",$iSongAlbumId);


?>