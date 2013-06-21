<?php
$generalobj->checkFrontAuthntication();
$url = $_REQUEST['mamberurl'];
$sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);


if($db_user[0]['iMemberId'] == ''){
 
    header("location:".$tconfig["tsite_url"]."/home");

}else{
        $iUserid = $db_user[0]['iMemberId'];
        $iMemberId    = $iUserid;
            
	if($iMemberId !=''){
		$ssql .= "sa.eStatus='Active' AND sa.iMemberId='".$iMemberId."'";
	}
	
	$sql = "SELECT sa.*,count(s.iSongAlbumId) AS count from song_album AS sa LEFT JOIN song AS s ON(sa.iSongAlbumId =  s.iSongAlbumId) where $ssql GROUP BY sa.iSongAlbumId";
        $SongCategoryArr =$obj->MySQLSelect($sql);
	
	
	for($i=0;$i<count($SongCategoryArr);$i++){
		
		if($SongCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_MUSIC_SONG."/".$SongCategoryArr[$i]['iMemberId']."/".$SongCategoryArr[$i]['vImage'])){
			$SongCategoryArr[$i]['vImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$SongCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_music_song"].$SongCategoryArr[$i]['iMemberId']."/"."1_".$SongCategoryArr[$i]['vImage'];
		}
		if($SongCategoryArr[$i]['count'] >1)
		{
			$SongCategoryArr[$i]['count'] = $SongCategoryArr[$i]['count'].' Songs';
		}elseif($SongCategoryArr[$i]['count'] == 1)
		{
			$SongCategoryArr[$i]['count'] = $SongCategoryArr[$i]['count'].' Song';
		}else{
			$SongCategoryArr[$i]['count'] = 'Empty';
		}
			
		}
	
	$sql = "select * from members where iMemberId = '".$iMemberId."'";
	$db_code = $obj->MySQLSelect($sql);
	$code = $db_code[0]['vMemberUrl'];
	$iMemberid = $db_code[0]['iMemberId'];
	
	$sql_cate = "select * from song where iSongAlbumId = '0' AND iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_cate);
        $gen_count = count($db_albums);

	if($gen_count >1)
	{
		
		$count_word = $gen_count.' Songs';
	}elseif($gen_count == 1)
	{
		$count_word = $gen_count.' Song';
	}else{
		$count_word = 'Empty';
	}
        
}

        $smarty->assign("gen_count", $gen_count);
	$smarty->assign("count_word", $count_word);
	$smarty->assign("iMemberid", $iMemberid);
	$smarty->assign("code", $code);
	$smarty->assign("SongCategoryArr", $SongCategoryArr);
	
	
	$smarty->assign("iMemberId",$iMemberId);
        $smarty->assign("db_user", $db_user);
        $smarty->assign("iMemberid", $iUserid);


?>