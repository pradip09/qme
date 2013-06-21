<?php


$path = TPATH_SERVER_IMAGES_PHOTO;
$mode = $_REQUEST['mode'];
$vPhotoTitle = $_REQUEST['photoname'];

$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];
$Data['vPhotoTitle'] = $_REQUEST['photoname'];

if($_REQUEST['iAlbum'] != '')
{$Data['iPhotoCategoryId'] = $_REQUEST['iAlbum'];}
else{$Data['iPhotoCategoryId'] = '0';}


$Data['eStatus'] = "Active";
$Data['dAddedDate'] = date('Y-m-d H:i:s');


$memberId = $_SESSION['iUserId'];

if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }
$_FILES['vImage'] = $_FILES['vPhoto'];
if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "550X550", 'PREFIX' => "3"),
		array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
                
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vImage'] = $image;}
	
    }
    if($mode == 'add')
    {
        $id = $obj->MySQLQueryPerform("photo",$Data,'insert');
        $newId = $id;
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'Photo';
	$Recent['iTypeId'] = $id;
	$Recent['vImage'] = $Data['vImage'];	
	$Recent['vDescription'] = $_SESSION['Name'].' added new photo.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vPhotoTitle'];
	
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        if($id){
	
        $var_msg = "Your Photo upload successfully";
	
	//Twitter Status Update Start
	$twUploadType = 'PHOTO';
	$twUploadId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
	//Facebook Status Update Start
	$fbUploadType = 'PHOTO';
	$fbUploadId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
	//Facebook Status Update End

    }
    else{
        $var_msg = 'Error in upload your photo';
    }
    }
    else
    {
        $iPhotoId = $_REQUEST['iPhotoId'];
	$where = " iPhotoId = '".$iPhotoId."'";
        $id1 = $obj->MySQLQueryPerform("photo",$Data,'update',$where);        
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'PhotoCategory';
	$Recent['iTypeId'] = $iPhotoId;
	//$Recent['vImage'] = $Data['vImage'];
	if($Data['vImage'] != ''){
	       $Recent['vImage'] = $Data['vImage'];
	   }else{
	       $Recent['vImage'] = $_REQUEST['vOldImage'];
	   }
	$Recent['vDescription'] = $_SESSION['Name'].' updated photo.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vPhotoTitle'];
	
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	if($id1){
		
	$var_msg = "Your Photo update successfully";
    }
    else{
        $var_msg = 'Error in update your photo';
    }
    }
   // header('Location:'.$site_url.'/myphoto');
    
    echo $var_msg; exit;

?>