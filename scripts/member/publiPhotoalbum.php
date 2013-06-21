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
		$ssql .= "pc.eStatus='Active' AND pc.iMemberId='".$iMemberId."'";
	}
	
	$sql = "SELECT pc.*,count(ph.iPhotoCategoryId) AS count from photo_category AS pc LEFT JOIN photo AS ph ON(pc.iPhotoCategoryId =  ph.iPhotoCategoryId) where $ssql GROUP BY pc.iPhotoCategoryId $var_limit ";
        $PhotoCategoryArr =$obj->MySQLSelect($sql);
	
	
	for($i=0;$i<count($PhotoCategoryArr);$i++){
		
		if($PhotoCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PHOTO."/".$PhotoCategoryArr[$i]['iMemberId']."/".$PhotoCategoryArr[$i]['vImage'])){
			$PhotoCategoryArr[$i]['vImage'] = $tconfig["front_images"]."cap-img.png";
		}else{
			$PhotoCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$PhotoCategoryArr[$i]['iMemberId']."/"."1_".$PhotoCategoryArr[$i]['vImage'];
		}
		if($PhotoCategoryArr[$i]['count'] >1)
		{
			$PhotoCategoryArr[$i]['count'] = $PhotoCategoryArr[$i]['count'].' Photos';
		}elseif($PhotoCategoryArr[$i]['count'] == 1)
		{
			$PhotoCategoryArr[$i]['count'] = $PhotoCategoryArr[$i]['count'].' Photo';
		}else{
			$PhotoCategoryArr[$i]['count'] = 'Empty';
		}
			
		}
	
	$sql = "select * from members where iMemberId = '".$iMemberId."'";
	$db_code = $obj->MySQLSelect($sql);
	$code = $db_code[0]['vMemberUrl'];
	$iMemberid = $db_code[0]['iMemberId'];
	
	$sql_cate = "select * from photo where iPhotoCategoryId = '0' AND iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_cate);
        $gen_count = count($db_albums);

	if($gen_count >1)
	{
		
		$count_word = $gen_count.' Photos';
	}elseif($gen_count == 1)
	{
		$count_word = $gen_count.' Photo';
	}else{
		$count_word = 'Empty';
	}
        
}

        $smarty->assign("gen_count", $gen_count);
	$smarty->assign("count_word", $count_word);
	$smarty->assign("iMemberid", $iMemberid);
	$smarty->assign("code", $code);
	$smarty->assign("PhotoCategoryArr", $PhotoCategoryArr);
	
	
	$smarty->assign("iMemberId",$iMemberId);
        $smarty->assign("db_user", $db_user);
        $smarty->assign("iMemberid", $iUserid);


?>