<?php


$mode=$_REQUEST['mode'];
$path = TPATH_SERVER_MUSIC_SONG;

$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];

$Data['vSongAlbum'] = $_REQUEST['songalbumname'];
$Data['eStatus'] = "Active";
$memberId = $_SESSION['iUserId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }

$_FILES['vImage'] = $_FILES['vImagesong'];

if ($_FILES['vImage']['name'] != "") {
    
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "159X139", 'PREFIX' => "1"),
                array('WIDTH_HEIGHT' => "204X179", 'PREFIX' => "2"),
		array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
                
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        
        if($image !=''){ $Data['vImage'] = $image; }
    }
    if($mode == 'add'){
    $id = $obj->MySQLQueryPerform("song_album",$Data,'insert');
    if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
    $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'SongAlbum';
	$Recent['iTypeId'] = $id;
	$Recent['vImage'] = $Data['vImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' added new song album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vSongAlbum'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    
    if($id){
        $var_msg = "Create Song album successfully";
    }
    else{
        $var_msg = 'Error in creating Song album';
    }
    }else
    {
        $iSongAlbumId = $_REQUEST['iSongAlbumId'];
	$where = " iSongAlbumId = '".$iSongAlbumId."'";
        $id1 = $obj->MySQLQueryPerform("song_album",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'SongAlbum';
	$Recent['iTypeId'] = $iSongAlbumId;
	//$Recent['vImage'] = $Data['vImage'];
	 if($Data['vImage'] != ''){
		$Recent['vImage'] = $Data['vImage'];
	    }else{
		$Recent['vImage'] = $_REQUEST['vOldImage'];
	    }
	$Recent['vDescription'] = $_SESSION['Name'].' updated song album.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vSongAlbum'];
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
        if($id1){
        $var_msg = "Edit Song album successfully";
    }
    else{
        $var_msg = 'Error in editing Song album';
    }
    }
    header('Location:'.$site_url.'/mysong');
    //echo $var_msg; exit;

?>

