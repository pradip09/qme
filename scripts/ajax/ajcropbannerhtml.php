<?php

//echo "<pre>";
//print_r($_POST);exit;
	$iBannerId = $_POST['iBannerId'];
	list($width, $height, $type, $attr) = getimagesize($_FILES['bannerImage']['tmp_name']);
	

	if($width > 2000 || $height > 1500){

		echo "0"; exit;
	}

	if($width == 959 AND $height == 300)
	{
		
		$path = TPATH_SERVER_IMAGES_MEMBER;
		$memberId = $_SESSION['iUserId'];
	
		if(!is_dir($path."/".$memberId)){
			@mkdir($path."/".$memberId, 0777);
		}
		if(!is_dir($path."/".$memberId."/banner")){
			@mkdir($path."/".$memberId."/banner", 0777);
		}
		$banner_new = $_FILES["bannerImage"]["name"];
		if ($banner_new != "") {
    
                $PARAM_ARRAY = array
               (
               "TARGET_DIR" =>$path."/".$memberId."/banner",
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                              
               );      
	
              }
		$img = move_uploaded_file($_FILES["bannerImage"]["tmp_name"],$path.'/'.$memberId."/banner/".$_FILES["bannerImage"]["name"]);
		
		if($img !=''){
		//unlink($src);
			$Data_gal['vBannerImage'] = $banner_new;
		}	
		if($iBannerId)
		{				
			$Data_gal['iMemberId'] = $memberId;
			$where = 'iBannerId = '.$iBannerId;
			$ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'update',$where);
			echo '1||'.$ban.'||'.$banner_new; exit; 
		}	
		else	
		{
			$Data_gal['iMemberId'] = $memberId;
			$ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
			$newId = $ban;
			
			//Twitter Status Update Start
			$twUploadType = 'BANNER';
			$twUploadbannerId = $newId;
			include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
			//Twitter Status Update End
			
			//Facebook Status Update Start
			$fbUploadType = 'BANNER';
			$fbUploadbannerId = $newId;
			include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
			//Facebook Status Update End
			
			echo '1||'.$ban.'||'.$banner_new; exit; 
		}exit;
	
	}
	
	
	$path = TPATH_SERVER_IMAGES_MEMBER;
	if(!is_dir($path."/banner_tmp/")){
	    @mkdir($path."/banner_tmp/", 0777);
	}
	$moved = move_uploaded_file($_FILES["bannerImage"]["tmp_name"],$path."/banner_tmp/".$_FILES["bannerImage"]["name"]);
	$imgUploaded =$_FILES["bannerImage"]["name"];
	
	
	$smarty->assign("iBannerId",$iBannerId);
	$smarty->assign("imgUploaded",$imgUploaded); 
?>
