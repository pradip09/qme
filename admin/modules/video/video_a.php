<?php
//echo "<pre>";
//print_r($_SERVER['HTTP_REFERER']);
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];
//echo $mid;exit;

$action = $_REQUEST['action'];
$iVideoId = $_POST['iVideoId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_VIDEO;
$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$actionVideo = $_REQUEST['actionVideo'];

if($actionVideo){
	$action = $_REQUEST['actionVideo'];
	 }

#$path_video=TPATH_SERVER_VIDEO;
if($_POST['eExplicitContent'] == "Yes")
		$Data['eExplicitContent'] = 'Yes';
	else
		$Data['eExplicitContent'] = 'No';
	
if($_POST['eHideVideo'] == "Yes")
		$Data['eHideVideo'] = 'Yes';
	else
		$Data['eHideVideo'] = 'No';
		
if($_POST['eDeleteVideo'] == "Yes")
		$Data['eDeleteVideo'] = 'Yes';
	else
		$Data['eDeleteVideo'] = 'No';
	
if($_POST['eDeleteVideoImage'] == "Yes")
		$Data['eDeleteVideoImage'] = 'Yes';
	else
		$Data['eDeleteVideoImage'] = 'No';
		

if($action == "add")
{
	$Data['iMemberId'] = $memberId;
	
	/*if($Data['iVideoAlbumId'] == 0)
	{
		$cat = $_POST['vNewAlbum'];
		
		$sql_check = "select * from video_album where vVideoAlbum = '$cat'";
		$db_check = $obj->MySQLSelect($sql_check);
			
		$cnt = count($db_check);
		
		if($cnt > 0)
		{
			$var_msg = "The Video Album already exist.";
			header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
			exit;
		}
		else
		{
			$catData['vVideoAlbum'] = $_POST['vNewAlbum'];
			$id = $obj->MySQLQueryPerform("video_album",$catData,'insert');
			$Data['iVideoAlbumId'] = $id;
		}	
	}*/
	#echo "<pre>";
	#print_r($Data); exit;
	$mId = $Data['iMemberId'];
	//echo $mId;exit;
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	$bId = $obj->MySQLQueryPerform("video",$Data,'insert');
	if ($_FILES['vImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$mId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		$Data['vImage'] = $image;
		}
		
	}

	if ($_FILES['vVideo']['name'] != ""){	
		$video=move_uploaded_file($_FILES["vVideo"]["tmp_name"],$path."/".$mId."/".$_FILES["vVideo"]["name"]);
		if($video){
		$Data['vVideo'] = $_FILES["vVideo"]["name"];
		}
	}
	$Data['dLastModified'] = date('Y-m-d H:i:s');
	$where = " iVideoId = '".$bId."'";
	$res = $obj->MySQLQueryPerform("video",$Data,'update',$where);
	if($bId)$var_msg = " Record is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}



if($action == "edit")
{
	$Data['iMemberId'] = $memberId;
	/*if($Data['iVideoAlbumId'] == 0)
	{
		$cat = $_POST['vNewCategory'];
		
		$sql_check = "select * from video_album where vVideoAlbum = '$cat'";
		$db_check = $obj->MySQLSelect($sql_check);
			
		$cnt = count($db_check);

		if($cnt > 0)
		{
			$var_msg = "The Video Album already exist.";
			header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
			exit;
		}
		else
		{
			$catData['vVideoAlbum'] = $_POST['vNewCategory'];
			$id = $obj->MySQLQueryPerform("video_album",$catData,'insert');
			$Data['iVideoAlbumId'] = $id;
		}	
	}*/
	
	$mId = $Data['iMemberId'];
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	if ($_FILES['vImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$mId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		
		if($image !=''){
		    $Data['vImage'] = addslashes($image);
		    unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
		$video=move_uploaded_file($_FILES["vVideo"]["tmp_name"],$path."/".$mId."/".$_FILES["vVideo"]["name"]);
		if($video){
		$Data['vVideo'] = $_FILES["vVideo"]["name"];
		}
	
	$Data['dLastModified'] = date('Y-m-d H:i:s');
	
	
	$iVideoId = $_POST['iVideoId'];
	$where = " iVideoId = '".$iVideoId."'";
	$res = $obj->MySQLQueryPerform("video",$Data,'update',$where);

	if($res)$var_msg = " Video is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action=="Active")
{
    $iVideoId= $_REQUEST['iVideoId'];
    $totid = count($iVideoId);
       
    if(is_array($iVideoId)){
        $iVideoId  = @implode(",",$iVideoId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iVideoId IN (".$iVideoId.")";
	$res = $obj->MySQLQueryPerform("video",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action=="Inactive")
{
		
	$iVideoId = $_REQUEST['iVideoId'];
	$totid = count($iVideoId );
	if(is_array($iVideoId)){
	    $iVideoId = @implode(",",$iVideoId);
	}
	$data = array('eStatus'=>'Inactive');
	$where = " iVideoId IN (".$iVideoId.")";
	$res = $obj->MySQLQueryPerform("video",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action == "Delete")
{
	$iVideoId = $_POST['iVideoId'];
	
	$sql_sel = "select vImage,iMemberId from video where iVideoId = '$iVideoId'";
	$db_sel = $obj->MySQLSelect($sql_sel);
	
	$img = $db_sel[0]['vImage'];
	$mId = $db_sel[0]['iMemberId'];
	
	$sql="Delete from video where iVideoId='".$iVideoId."'";
	$db_sql=$obj->sql_query($sql);
	
	if($db_sql)
	{		
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/".$img);
	}
	else{
		$var_msg="Eror-in Delete.";
	}
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action=="Deletes")
{
	
	$iVideoId="";
	foreach ($_POST['iVideoId'] as $id) {	
		$iVideoId = $iVideoId. $id .',';
	}
	$iVideoId = substr($iVideoId, 0, strlen($iVideoId)-1); 
	$where = " iVideoId IN (".$iVideoId.")";
	$sql="Delete from video where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action == "DeleteImage")
{
	$mId = $Data['iMemberId'];
	$iVideoId = $_POST['iVideoId'];
	$data_new = array("vImage"=>'');
	$where = " iVideoId = '".$iVideoId."'";
	$res = $obj->MySQLQueryPerform("video",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/1_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/".$_POST['vOldImage']);
		
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iVideoId=$iVideoId&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-video");
	exit;
}
/*if($action == "DeleteVideo")
{	
	$mId = $Data['iMemberId'];
	$iVideoId = $_POST['iVideoId'];
	$data_new = array("vVideo"=>'');
	$where = " iVideoId = '".$iVideoId."'";
	$res = $obj->MySQLQueryPerform("video",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/".$_POST['vOldVideo']);
	if($res){
		$var_msg = "Video is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Video Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iVideoId=$iVideoId&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	
	exit;
}*/
?>
