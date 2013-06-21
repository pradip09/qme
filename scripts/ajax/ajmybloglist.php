<?php
	
	include_once(TPATH_CLASS_APP."/class.bloglist.php");
	$BlogListObj = new BlogList();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "b.eStatus='Active' AND b.iMemberId='".$iMemberId."' order by iBlogId desc";
	}
	
	
	$BlogListArr = $BlogListObj->getAllBlogList($var_limit,$ssql);
	$totRec = count($BlogListArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}


	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymyblog');
	$BlogListArr = $BlogListObj->getAllBlogList($var_limit,$ssql);
	
	for($i=0;$i<count($BlogListArr);$i++){
		
		if($BlogListArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_BLOG."/".$BlogListArr[$i]['iMemberId']."/".$BlogListArr[$i]['vImage'])){
			$BlogListArr[$i]['vImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$BlogListArr[$i]['vImage'] = $tconfig["tsite_upload_images_blog"].$BlogListArr[$i]['iMemberId']."/"."1_".$BlogListArr[$i]['vImage'];
		}
		$BlogListArr[$i]['dCreateDate'] = date('m-d-Y',strtotime($BlogListArr[$i]['dCreateDate']));
		
		$BlogListArr[$i]['vText'] = $generalobj->limit_words($BlogListArr[$i]['vText'],43);
	}
	
	$recmsg = $PagingObj->setMessage('Blogs');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	
	$smarty->assign("BlogListArr", $BlogListArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 