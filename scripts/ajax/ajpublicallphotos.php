<?php
	
	include_once(TPATH_CLASS_APP."/class.photocategory.php");
	$PhotoCategoryObj = new PhotoCategory();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['UserId'];
	$CategoryId    = $_REQUEST['iCatPhotoId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' AND iPhotoCategoryId='".$CategoryId."'";
	}
	
	$PhotoArr = $PhotoCategoryObj->getPhotos($var_limit,$ssql);
	
	for($i=0;$i<count($PhotoArr);$i++){
		
		if($PhotoArr[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_PHOTO."/".$PhotoArr[$i]['iMemberId']."/".$PhotoArr[$i]['vImage'])){
			$PhotoArr[$i]['vImage'] = $tconfig["front_images"]."noimage.png";
		}else{
			$PhotoArr[$i]['vImagePopup'] = $tconfig["tsite_upload_images_photo"].$PhotoArr[$i]['iMemberId']."/".$PhotoArr[$i]['vImage'];
			$PhotoArr[$i]['vImage'] = $tconfig["tsite_upload_images_photo"].$PhotoArr[$i]['iMemberId']."/".$PhotoArr[$i]['vImage'];
			
		}
	}
	
	$sql_category = "Select * from photo_category where iMemberId = '".$iMemberId."'";
	$db_albums = $obj->MySQLSelect($sql_category);
	
        
	$smarty->assign("db_albums", $db_albums);
	$smarty->assign("PhotoArr", $PhotoArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 