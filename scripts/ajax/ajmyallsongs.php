<?php
	
	
	include_once(TPATH_CLASS_APP."/class.songalbum.php");
	$SongCategoryObj = new SongCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$iSongAlbumId    = $_REQUEST['iSongAlbumId'];
	
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' AND iSongAlbumId='".$iSongAlbumId."'";
	}
	
	$SongArr = $SongCategoryObj->getSongs($var_limit,$ssql);
	
	
	$smarty->assign("SongArr", $SongArr);
	
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 