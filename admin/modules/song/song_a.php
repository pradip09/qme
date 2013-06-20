<?php

$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];

$action = $_REQUEST['action'];
$iSongId = $_POST['iSongId'];
//echo $action;exit;
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

$path = TPATH_SERVER_MUSIC_SONG;
$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
#echo "<pre>";
#print_r($memberId);exit;

$actionSong = $_REQUEST['actionSong'];
if($actionSong){
	$action = $_REQUEST['actionSong'];
	 }

#echo "<pre>";
#print_r($action);exit;
if($action == "add")
{
	$Data['iMemberId'] = $memberId;
	
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	
	$bId = $obj->MySQLQueryPerform("song",$Data,'insert');
	
	if ($_FILES['vCoverImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$memberId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vCoverImage']);
		if($image !=''){ $Data['vCoverImage'] = $image; }
	}

	$audio = move_uploaded_file($_FILES["vSong"]["tmp_name"],$path."/".$memberId."/".$_FILES["vSong"]["name"]);
	
	if($audio) { $Data['vSong'] = $_FILES["vSong"]["name"]; }

	$where = " iSongId = '".$bId."'";
	$res = $obj->MySQLQueryPerform("song",$Data,'update',$where);
  
	if($bId)$var_msg = "Record is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action == "edit")
{
	$Data['iMemberId'] = $memberId;
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	
	if ($_FILES['vCoverImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$memberId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "50X50", 'PREFIX' => "2")
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vCoverImage']);
		if($image !='')
		{
			$Data['vCoverImage'] = $image;
			unlink($path."/".$memberId."/".$_POST['vOldImage']);
			unlink($path."/".$memberId."/1_".$_POST['vOldImage']);
			unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
		}
	}
	if ($_FILES['vSong']['name'] != "")
	{	
		$audio = move_uploaded_file($_FILES["vSong"]["tmp_name"],$path."/".$memberId."/".$_FILES["vSong"]["name"]);
		if($audio) {
			$Data['vSong'] = $_FILES["vSong"]["name"];
			unlink($path."/".$memberId."/".$_POST['vOldSong']);
		}
	}
	

	
	$iSongId = $_POST['iSongId'];
	$where = " iSongId = '".$iSongId."'";
	$res = $obj->MySQLQueryPerform("song",$Data,'update',$where);

	if($res)$var_msg = "Record is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action=="Active")
{
	
	//echo "<pre>";
    //print_r($action);exit;
    $iSongId = $_REQUEST['iSongId'];
    
    $totid = count($iSongId);
       
    if(is_array($iSongId)){
        $iSongId  = @implode(",",$iSongId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iSongId IN (".$iSongId.")";
	$res = $obj->MySQLQueryPerform("song",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action=="Inactive")
{
    $iSongId = $_REQUEST['iSongId'];
    $totid = count($iSongId );
    if(is_array($iSongId )){
        $iSongId = @implode(",",$iSongId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iSongId IN (".$iSongId.")";
	$res = $obj->MySQLQueryPerform("song",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action == "Delete")
{	
	$iSongId = $_POST['iSongId'];
	
	$sql_sel = "select vImage,iMemberId from song where iSongId = '$iSongId'";
	$db_sel = $obj->MySQLSelect($sql_sel);
	
	$img = $db_sel[0]['vImage'];
	$mId = $db_sel[0]['iMemberId'];
	
	$sql="Delete from song where iSongId='".$iSongId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/".$img);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action=="Deletes")
{	
	$iSongId="";
	foreach ($_POST['iSongId'] as $id) {	
		$iSongId = $iSongId . $id .',';
	}
	
	$iSongId = substr($iSongId, 0, strlen($iSongId)-1); 
	
	$where = " iSongId IN (".$iSongId.")";
	$sql="Delete from song where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action == "DeleteCoverImage")
{	
	$mId = $Data['iMemberId'];
	$iSongId = $_POST['iSongId'];
	$data_new = array("vImage"=>'');
	$where = " iSongId = '".$iSongId."'";
	$res = $obj->MySQLQueryPerform("song",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&iSongId=$iSongId&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
	
}
if($action == "DeleteSong")
{	
	$mId = $Data['iMemberId'];
	$iSongId = $_POST['iSongId'];
	$data_new = array("vSong"=>'');
	$where = " iSongId = '".$iSongId."'";
	$res = $obj->MySQLQueryPerform("song",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_MUSIC_SONG."/".$mId."/".$_POST['vOldSong']);
	
	if($res){
		$var_msg = "Music File is Deleted Successfully.";
	}else{
		$var_msg="Eror-in File Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iSongId=$iSongId&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-song");
	exit;
}
?>
