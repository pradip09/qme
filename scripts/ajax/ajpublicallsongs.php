<?php
	
	include_once(TPATH_CLASS_APP."/class.songalbum.php");
	$SongCategoryObj = new SongCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['UserId'];
	$CategoryId    = $_REQUEST['iCatSongId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' AND iSongAlbumId='".$CategoryId."'";
	}
	
	
	$SongArr = $SongCategoryObj->getSongs($var_limit,$ssql);
	
	for($i=0;$i<count($SongArr);$i++){
		
		if($SongArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_SONG."/".$SongArr[$i]['iMemberId']."/".$SongArr[$i]['vImage'])){
			$SongArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$SongArr[$i]['vImagePopup'] = $tconfig["tsite_upload_music_song"].$SongArr[$i]['iMemberId']."/".$SongArr[$i]['vImage'];
			$SongArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$SongArr[$i]['iMemberId']."/"."2_".$SongArr[$i]['vImage'];
		}
	}
	
	$sql_category = "Select * from song_album where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);
	
        $smarty->assign("db_albums", $db_albums);
	$smarty->assign("SongArr", $SongArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 