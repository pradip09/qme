<?php
       
	include_once(TPATH_CLASS_APP."/class.promotion.php");
	$PromotionObj = new Promotion();
	$start 		= $_REQUEST['start'];
        $iMemberId    = $_REQUEST['iMemberId'];
	$FRONT_REC_LIMIT_ALL = $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$keyword = $_REQUEST['keyword'];
	$iCategoryId = $_REQUEST['iCategoryId'];
	$iParentId = $_REQUEST['iParentId'];
        
        $var_limit = " ";
	
	if($keyword !='' && $iCategoryId !=''){
		if($keyword !=''){
			$ssql = " AND vTitle LIKE '%".$keyword."%' OR tDescription LIKE '%".$keyword."%'";
		}
		if($iCategoryId !=''){
			$ssql.= " AND iCategoryId = '".$iCategoryId."'";
		}
		
	}elseif($keyword !='' &&  $iCategoryId ==''){
		$ssql = " AND vTitle LIKE '%".$keyword."%' OR tDescription LIKE '%".$keyword."%'";
		
	}elseif($keyword =='' &&  $iCategoryId !=''){
		$ssql = " AND iCategoryId = '".$iCategoryId."'";
	}
	
        $PromotionArr = $PromotionObj->getPromotionList($var_limit,$ssql);
	$totRec = count($PromotionArr);
        if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'GetPromotionProducts');
	
	$PromotionArr = $PromotionObj->getPromotionList($var_limit,$ssql);
        
	for($i=0;$i<count($PromotionArr);$i++){
		
                if(strlen($PromotionArr[$i]['tDescription'])>130){
			
                        $PromotionArr[$i]['tDescription'] = substr($PromotionArr[$i]['tDescription'],0,130).'..';
		}
                
                
                if($PromotionArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$PromotionArr[$i]['iProductId']."/".$PromotionArr[$i]['vImage'])){
			$PromotionArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$PromotionArr[$i]['vImage'] = $tconfig["tsite_upload_images_product"].$PromotionArr[$i]['iProductId']."/"."1_".$PromotionArr[$i]['vImage'];
		}
	}
	$recmsg = $PagingObj->setMessage('Product');
	$pages = $PagingObj->displayPaging();
        
	$smarty->assign("PromotionArr", $PromotionArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>