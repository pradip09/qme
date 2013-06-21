<?php
	list($width, $height, $type, $attr) = getimagesize($_FILES['bannerImage']['tmp_name']);
	if($width > 1100 || $height > 500){
		echo "0"; exit;
	}
	
	
	$path = TPATH_SERVER_IMAGES_MEMBER;
	if(!is_dir($path."/banner_tmp/")){
	    @mkdir($path."/banner_tmp/", 0777);
	}
	$moved = move_uploaded_file($_FILES["bannerImage"]["tmp_name"],$path."/banner_tmp/".$_FILES["bannerImage"]["name"]);
	$imgUploaded =$_FILES["bannerImage"]["name"];
	$iBannerId = $_POST['iBannerId'];
	
	$smarty->assign("iBannerId",$iBannerId);
	$smarty->assign("imgUploaded",$imgUploaded); 
?>
