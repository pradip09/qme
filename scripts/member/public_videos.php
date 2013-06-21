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
		$ssql .= "va.eStatus='Active' AND va.iMemberId='".$iMemberId."'";
	}
	
	$sql = "SELECT va.*,count(v.iVideoAlbumId) AS count from video_album AS va LEFT JOIN video AS v ON(va.iVideoAlbumId =  v.iVideoAlbumId) where $ssql GROUP BY va.iVideoAlbumId";
        $VideoCategoryArr =$obj->MySQLSelect($sql);
	
	
	for($i=0;$i<count($VideoCategoryArr);$i++){
		
		if($VideoCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_VIDEO."/".$VideoCategoryArr[$i]['iMemberId']."/".$VideoCategoryArr[$i]['vImage'])){
			$VideoCategoryArr[$i]['vImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$VideoCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_images_video"].$VideoCategoryArr[$i]['iMemberId']."/"."1_".$VideoCategoryArr[$i]['vImage'];
		}
		if($VideoCategoryArr[$i]['count'] >1)
		{
			$VideoCategoryArr[$i]['count'] = $VideoCategoryArr[$i]['count'].' Songs';
		}elseif($VideoCategoryArr[$i]['count'] == 1)
		{
			$VideoCategoryArr[$i]['count'] = $VideoCategoryArr[$i]['count'].' Song';
		}else{
			$VideoCategoryArr[$i]['count'] = 'Empty';
		}
			
		}
	
	$sql = "select * from members where iMemberId = '".$iMemberId."'";
	$db_code = $obj->MySQLSelect($sql);
	$code = $db_code[0]['vMemberUrl'];
	$iMemberid = $db_code[0]['iMemberId'];
	
	$sql_cate = "select * from video where iVideoAlbumId = '0' AND iMemberId = '".$iMemberId."'";
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
	$smarty->assign("VideoCategoryArr", $VideoCategoryArr);
	
	
	$smarty->assign("iMemberId",$iMemberId);
        $smarty->assign("db_user", $db_user);
        


?>