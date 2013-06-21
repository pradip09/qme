<?php
	
	include_once(TPATH_CLASS_APP."/class.photocategory.php");
	$PhotoCategoryObj = new PhotoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	
	if($iMemberId !=''){
		$ssql .= "pc.eStatus='Active' AND pc.iMemberId='".$iMemberId."'";
	}
	$PhotoCategoryArr = $PhotoCategoryObj->getAllcategory($var_limit,$ssql);
	$totRec = count($PhotoCategoryArr);
	
	for($i=0;$i<count($PhotoCategoryArr);$i++){
		
		if($PhotoCategoryArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PRODUCT."/".$PhotoCategoryArr[$i]['iMemberId']."/".$PhotoCategoryArr[$i]['vImage'])){
			$PhotoCategoryArr[$i]['vImage'] = $tconfig["front_images"]."noimage.jpg";
		}else{
			$PhotoCategoryArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$PhotoCategoryArr[$i]['iMemberId']."/"."1_".$PhotoCategoryArr[$i]['vImage'];
		}
	}
	
	$smarty->assign("PhotoCategoryArr", $PhotoCategoryArr);
	$smarty->assign("iMemberId",$iMemberId);
?>

 