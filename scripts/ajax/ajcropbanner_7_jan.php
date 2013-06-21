<?php
$iBannerId = $_POST['iBannerId'];

$path = TPATH_SERVER_IMAGES_MEMBER;
$memberId = $_SESSION['iUserId'];

if(!is_dir($path."/".$memberId)){
	@mkdir($path."/".$memberId, 0777);
}
if(!is_dir($path."/".$memberId."/banner")){
	@mkdir($path."/".$memberId."/banner", 0777);
}
$rename = date("Ymdhis");
$banner_new = $rename."_".$_POST['banImage'];

$dest = $path.'/'.$memberId.'/banner/'.$banner_new;

    $targ_w = 940;
    $targ_h = 300;
    $jpeg_quality = 90;
    $src = $path."/banner_tmp/".$_POST['banImage'];
    
    $img_r = imagecreatefromjpeg($src);
    $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
    
    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);
    
    header('Content-type: image/jpeg');
    $img = imagejpeg($dst_r,$dest,$jpeg_quality);

	
   $memberId = $_SESSION['iUserId'];
	
	if($img !=''){
		unlink($src);
		$Data_gal['vBannerImage'] = $banner_new;
	}	
	if($iBannerId)
	{				
		$Data_gal['iMemberId'] = $memberId;
		$where = 'iBannerId = '.$iBannerId;
		$ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'update',$where);
		echo $iBannerId; exit; 
	}	
	else	
	{
		$Data_gal['iMemberId'] = $memberId;
		$ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
		echo $ban; exit; 
	}
	
?>