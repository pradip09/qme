<?php
//echo "<pre>";
//print_r($_REQUEST);exit;

$mode = $_REQUEST['mode'];
$path = TPATH_SERVER_IMAGES_VIDEO;

$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];

$Data['vVideoAlbum'] = $_REQUEST['videoalbum'];
$Data['eStatus'] = "Active";
$memberId = $_SESSION['iUserId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }

$_FILES['vImage'] = $_FILES['vVideoImage'];

if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "211X131", 'PREFIX' => "1"),
		array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
                
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vImage'] = $image; }
    }
    
    if($mode == 'add')
    {
        $id = $obj->MySQLQueryPerform("video_album",$Data,'insert');
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'VideoAlbum';
	$Recent['iTypeId'] = $id;
	$Recent['vImage'] = $Data['vImage'];
	
	$Recent['vDescription'] = $_SESSION['Name'].' added new video album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vVideoAlbum'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
        if($id){
        $var_msg = "Create Video album successfully";
    }
    else{
        $var_msg = 'Error in creating Video album';
    }
    }else
    {
        $iVideoAlbumId = $_REQUEST['iVideoAlbumId'];
	$where = " iVideoAlbumId = '".$iVideoAlbumId."'";
        $id1 = $obj->MySQLQueryPerform("video_album",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'VideoAlbum';
	$Recent['iTypeId'] = $iVideoAlbumId;
	//$Recent['vImage'] = $Data['vImage'];
	if($Data['vImage'] != ''){
	       $Recent['vImage'] = $Data['vImage'];
	   }else{
	       $Recent['vImage'] = $_REQUEST['vOldImage'];
	   }
	$Recent['vDescription'] = $_SESSION['Name'].' updated video album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vVideoAlbum'];
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        if($id1){
        $var_msg = "Edit Video album successfully";
    }
    else{
        $var_msg = 'Error in editing Video album';
    }
    }
    
    header('Location:'.$site_url.'/myvideo');
    
    

    //echo $var_msg; exit;

?>