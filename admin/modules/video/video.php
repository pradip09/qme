<?php

//echo "hi";exit;
//echo "<pre>";
//print_r($_SESSION);exit;
	$mode = $_REQUEST['mode'];
	$iVideoAlbumId = $_REQUEST['iVideoAlbumId'];
	$iVideoId = $_REQUEST['iVideoId'];
	$type = $_REQUEST['type'];
	$modeVideoAlb = 'add';
	$modeVideo = 'add';
	$iMemberId = $_REQUEST['iMemberId'];
	//echo $iVideoAlbumId;exit;
	if($iVideoAlbumId !=''){
	    $sql_alb = "select * from video_album where iVideoAlbumId='".$iVideoAlbumId."' ";
	    $db_video_album = $obj->MySQLSelect($sql_alb);
	    $modeVideoAlb = 'edit';
	    
	}
	//echo "<pre>";
  //print_r($iVideoAlbumId);exit;
	if($iVideoId !=''){
	    $sql = "select * from video where iVideoId='".$iVideoId."' ";
	    $db_video_vid = $obj->MySQLSelect($sql);
	    $modeVideo = 'edit';
	}
	
	
	$video_genre=array("Adventure","Animation","Classic Game","Comedy","Documentry","Drama","Family","Fantasy","Fighting","FPS","Horror","Music Video","RPG","Thriller");
	$VideoViewerAccess=array('Streaming Only Preview: 10%','Streaming Only Preview: 15%','Streaming Only Preview: 20%','Streaming Only Preview: 25%','Streaming Only Preview: 30%','Streaming Only Preview: 35%','Streaming Only Preview: 40%','Streaming Only Preview: 45%','Streaming Only Preview: 50%','Streaming Only Preview: 60%','Streaming Only Preview: 75%','Streaming Only Preview: 90%');
	
	$sqlMember = "select iMemberId,vName from members";
	$db_videoMember = $obj->MySQLSelect($sqlMember);
	    
	$smarty->assign("db_video_vid",$db_video_vid);
	$smarty->assign("db_videoMember",$db_videoMember);
	$smarty->assign("modeVideoAlb",$modeVideoAlb);
	$smarty->assign("modeVideo",$modeVideo);
	$smarty->assign("iVideoAlbumId",$iVideoAlbumId);
	$smarty->assign("mode",$mode);
	$smarty->assign("iMemberId",$iMemberId);
	$smarty->assign("type",$type);
	$smarty->assign("iVideoId",$iVideoId);
	$smarty->assign("db_video_album",$db_video_album);
	$smarty->assign("video_genre",$video_genre);
	$smarty->assign("video_genre",$video_genre);
	$smarty->assign("VideoViewerAccess",$VideoViewerAccess);
?>
