<?php
	
	include_once(TPATH_CLASS_APP."/class.photocategory.php");
	$PhotoCategoryObj = new PhotoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "pc.eStatus='Active' AND pc.iMemberId='".$iMemberId."'";
	}
	
	$PhotoCategoryArr = $PhotoCategoryObj->getAllcategory($var_limit,$ssql);
	
	for($i=0;$i<count($PhotoCategoryArr);$i++)
	{
		if($PhotoCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$PhotoCategoryArr[$i]['iMemberId']."/".$PhotoCategoryArr[$i]['vImage'])){
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
	
	$smarty->assign("gen_count", $gen_count);
	$smarty->assign("count_word", $count_word);
	$smarty->assign("iMemberid", $iMemberid);
	$smarty->assign("code", $code);
	$smarty->assign("PhotoCategoryArr", $PhotoCategoryArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 