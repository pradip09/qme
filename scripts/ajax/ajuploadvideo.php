<?php
/*echo "<pre>";
print_r($_FILES);
echo "<pre>";
print_r($_REQUEST);exit;*/

$path = TPATH_SERVER_IMAGES_VIDEO;
$mode = $_REQUEST['mode'];

$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];
$Data['eVideotype'] = $_REQUEST['eVideotype'];
if($_REQUEST['vVideolink'] != ''){
 $vVideolink =  $_REQUEST['vVideolink'];
 
$Data['vVideolink'] = htmlentities($vVideolink);
$Data['vVideo'] = '';
}
if($_FILES['vVideo']['name'] != ''){
 $Data['vVideolink'] = '';
}

$Data['vVideoName'] = $_REQUEST['videoname'];

$Data['iVideoAlbumId'] = $_REQUEST['iVideoAlbum'];
$Data['eStatus'] = "Active";
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$memberId = $_SESSION['iUserId'];



if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }
    
if ($_FILES['vVideo']['name'] != ""){
        
		$video=move_uploaded_file($_FILES["vVideo"]["tmp_name"],$path."/".$memberId."/".$_FILES["vVideo"]["name"]);
		if($video){
		$Data['vVideo'] = $_FILES["vVideo"]["name"];
                }
	}
    

$_FILES['vImage'] = $_FILES['vVideoImages'];
if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "213X133", 'PREFIX' => "1"),
                
                
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vImage'] = $image; }
    }
    
    
    
    if($mode == 'add')
    {
	
         $id = $obj->MySQLQueryPerform("video",$Data,'insert');
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
	$Recent['eType'] = 'Video';
	$Recent['iTypeId'] = $id;
	$Recent['vImage'] = $Data['vImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' added new video file.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vVideoName'];
        $id= $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        if($id){
        $var_msg = "Your Video upload successfully";
	
	//Facebook Status Update Start
	$fbUploadType = 'VIDEO';
	$fbUploadvidId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
	//Facebook Status Update End
    }
    else{
        $var_msg = 'Error in upload ypur video';
    }
    }
    else
    {
        $iVideoId = $_REQUEST['iVideoId'];
	$where = " iVideoId = '".$iVideoId."'";
        $id1 = $obj->MySQLQueryPerform("video",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'Video';
	$Recent['iTypeId'] = $iVideoId;
	//$Recent['vImage'] = $Data['vImage'];
	if($Data['vImage'] != ''){
	       $Recent['vImage'] = $Data['vImage'];
	   }else{
	       $Recent['vImage'] = $_REQUEST['vOldImage'];
	   }
	$Recent['vDescription'] = $_SESSION['Name'].' updated video file.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vVideoName'];
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
        if($id1){
        $var_msg = "Your Video update successfully";
    }
    else{
        $var_msg = 'Error in update ypur video';
    }
    }
    
    
   header('Location:'.$site_url.'/myvideo');
   
   // echo $var_msg; exit;

?>