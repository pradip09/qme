<?php

	$mode = $_REQUEST['mode'];
	 
	$iSongAlbumId = $_REQUEST['iSongAlbumId'];
	$iSongId = $_REQUEST['iSongId'];
	$type = $_REQUEST['type'];
	$modeSongAlb = 'add';
	$modeSong = 'add';
	$memberId = $_REQUEST['iMemberId'];
	
	if($iSongAlbumId !='')
	{
		$sql = "select * from song_album where iSongAlbumId='".$iSongAlbumId."' ";
		$db_songalbum = $obj->MySQLSelect($sql);
		$modeSongAlb = 'edit';
	}
	//echo "<pre>";
	//print_r($db_songalbum);exit;
	if($iSongId !='')
	{
		$sql = "select * from song where iSongId='".$iSongId."' ";
		$db_song = $obj->MySQLSelect($sql);
		$modeSong = 'edit';
	}

	$sqlSongAlb = "select * from song_album where iMemberId=".$memberId;
	$db_songAlb = $obj->MySQLSelect($sqlSongAlb);
	
	$sqlGenre = "select * from song_genre";
	$db_songGenre = $obj->MySQLSelect($sqlGenre);
	
	$sql_cus = "SELECT * FROM song_album where iMemberId=".$memberId;	
	$db_viewsongalbum= $obj->MySQLSelect($sql_cus);
	
	
	$innerjoin = " INNER JOIN song_album sa ON (s.iSongAlbumId = sa.iSongAlbumId)";
	$sql_res = "SELECT s.*,sa.vSongAlbum as SongAlbum FROM song s ".$innerjoin." where s.iMemberId = ".$memberId;
	$db_viewsong = $obj->MySQLSelect($sql_res);
	
	$sqlcnt= "select count(*) as total from song where iMemberId=".$memberId;
	$db_qry = $obj->MySQLSelect($sqlcnt);
	
	$totalRecSong = $db_qry[0]['total'];

	$initOrderSong =1;
	$smarty->assign("initOrderSong",$initOrderSong);
	$smarty->assign("totalRecSong",$totalRecSong);
	
	$smarty->assign("modeSongAlb",$modeSongAlb);
	$smarty->assign("modeSong",$modeSong);
	$smarty->assign("db_songalbum",$db_songalbum);
	$smarty->assign("db_viewsongalbum",$db_viewsongalbum);
	$smarty->assign("db_songGenre",$db_songGenre);
	$smarty->assign("db_songAlb",$db_songAlb);
	$smarty->assign("db_songMember",$db_songMember);
	$smarty->assign("mode",$mode);
	$smarty->assign("type",$type);
	$smarty->assign("db_song",$db_song);
	$smarty->assign("db_viewsong",$db_viewsong);
	$smarty->assign("iSongId",$iSongId);
	$smarty->assign("iSongAlbumId",$iSongAlbumId);
	$smarty->assign("stateArr",$stateArr);
	$smarty->assign("address",$address);
	
?>