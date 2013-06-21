<?php
	
	
	include_once(TPATH_CLASS_APP."/class.songalbum.php");
	$SongCategoryObj = new SongCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "sa.eStatus='Active' AND sa.iMemberId='".$iMemberId."'";
	}
	
	
	$SongCategoryArr = $SongCategoryObj->getAllsongalbums($var_limit,$ssql);
	$totRec = count($SongCategoryArr);
	
	for($i=0;$i<count($SongCategoryArr);$i++){
		
		if($SongCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_SONG."/".$SongCategoryArr[$i]['iMemberId']."/".$SongCategoryArr[$i]['vImage'])){
			$SongCategoryArr[$i]['vImage'] = $tconfig["front_images"]."1_nomusic_img.jpg";
		}else{
			$SongCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_music_song"].$SongCategoryArr[$i]['iMemberId']."/"."1_".$SongCategoryArr[$i]['vImage'];
		}
	}
	$smarty->assign("SongCategoryArr", $SongCategoryArr);
	
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 