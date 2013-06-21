<?php

$path = TPATH_SERVER_MUSIC_SONG;
$mode=$_REQUEST['mode'];
$Data = array();
$Data['iMemberId'] = $_SESSION['iUserId'];
$Data['vSongTitle'] = $_REQUEST['songname'];
$Data['iSongAlbumId'] = $_REQUEST['iSongAlbum'];
$Data['iSongGenreId'] = $_REQUEST['iGenre'];
$Data['eStatus'] = "Active";
$Data['dAddedDate'] = date('Y-m-d H:i:s');

$memberId = $_SESSION['iUserId'];
if(!is_dir($path."/".$memberId)){
        @mkdir($path."/".$memberId, 0777);
    }
    
    
if ($_FILES['vSong']['name'] != ""){
        
		$audio = move_uploaded_file($_FILES["vSong"]["tmp_name"],$path."/".$memberId."/".$_FILES["vSong"]["name"]);
		if($audio){
		$Data['vSong'] = $_FILES["vSong"]["name"];
                }
	}
    if($mode == 'add')
	{
	    $id = $obj->MySQLQueryPerform("song",$Data,'insert');
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
	$Recent['eType'] = 'Song';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' added new song.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vSongTitle'];
	
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	
	   if($id){
	     $var_msg = "Your Song upload successfully";
	
	//Twitter Status Update Start
	$twUploadType = 'SONG';
	$twUploadsongId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
	//Facebook Status Update Start
	$fbUploadType = 'SONG';
	$fbUploadsongId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
	//Facebook Status Update End
	     
	     
	     
		}
		else
		{
			 $var_msg = 'Error in upload your song';
		}
	}
	
    else
    {
	$iSongId = $_REQUEST['iSongId'];
	$where = " iSongId = '".$iSongId."'";
	$id1 = $obj->MySQLQueryPerform("song",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
	$Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'Song';
	$Recent['iTypeId'] = $iSongId;
	$Recent['vDescription'] = $_SESSION['Name'].' updated song.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vSongTitle'];
	
	$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	
	if($id1){
        $var_msg = "Your Song update successfully";
    }
    else{
        $var_msg = 'Error in update your song';
    }
    }
     //header('Location:'.$site_url.'/mysong');
    echo $var_msg; exit;

?>