<?php
//echo "<pre>";
//print_r($_REQUEST);exit;

$mode = $_REQUEST['mode'];
$path = TPATH_SERVER_IMAGES_PHOTO;

$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];
$Data['vPhotoCategory'] = $_REQUEST['albumname'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$memberId = $_SESSION['iUserId'];

if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }

if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
                
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vImage'] = $image; }
    }
    
    if($mode == 'add')
    {
	
	$id = $obj->MySQLQueryPerform("photo_category",$Data,'insert');
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
	$Recent['iTypeId'] = $id;
	$Recent['vImage'] = $Data['vImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' added new photo album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vPhotoCategory'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
    }
    else if($mode == 'edit')
    {
        $iAlbumId = $_REQUEST['iAlbumId'];
	$where = " iPhotoCategoryId = '".$iAlbumId."'";
        $id = $obj->MySQLQueryPerform("photo_category",$Data,'update',$where);
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
	$Recent['iTypeId'] = $iAlbumId;
	//$Recent['vImage'] = $Data['vImage'];
	if($Data['vImage'] != ''){
	       $Recent['vImage'] = $Data['vImage'];
	   }else{
	       $Recent['vImage'] = $_REQUEST['vOldImage'];
	   }
	$Recent['vDescription'] = $_SESSION['Name'].' updated album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vPhotoCategory'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    }
    
    
    
    if($id){
	header('Location:'.$site_url.'/myphoto');
        //$var_msg = "Photo album successfully";
    }
    else{
        $var_msg = 'Error in creating Photo album';
    }

    //echo $var_msg; exit;

?>