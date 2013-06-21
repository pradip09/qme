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

    $targ_w = 959;
    $targ_h = 300;
    $png_quality = 90;
    $src = $path."/banner_tmp/".$_POST['banImage'];
     $arr = split("\.",$src);
    $ext = $arr[count($arr)-1];

    if($ext=="jpeg" || $ext=="jpg"){
        $img_r = @imagecreatefromjpeg($src);
    } elseif($ext=="png"){
        $img_r = @imagecreatefrompng($src);
        $kek=imagecolorallocate($img_r, 255, 255, 255);	
        imagefill($img_r,0,0,$kek);
	  
    } elseif($ext=="gif") {
        $img_r = @imagecreatefromgif($src);
    }
    //$img_r = imagecreatefrompng($src);
    //$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
     $dst_r = imagecreatetruecolor($targ_w, $targ_h);
     imagealphablending($dst_r, false);
     $col=imagecolorallocate($dst_r,255,255,255);
     imagefilledrectangle($dst_r,0,0,$targ_w, $targ_h,$col);
     imagealphablending($dst_r,true);
         
    imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);
   
    header('Content-type: image/png');
    $img = imagejpeg($dst_r,$dest,$png_quality);

	
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
		echo $ban; exit; 
	}
	
?>