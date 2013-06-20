<?php
/*echo "<pre>";
print_r($_REQUEST);
echo "<pre>";
print_r($_FILES);exit;*/
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];
$path = TPATH_SERVER_MUSIC_SONG;
$action = $_REQUEST['action'];
$iSongAlbumId = $_POST['iSongAlbumId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];

$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$actionAlbsong = $_REQUEST['actionAlbsong'];
if($actionAlbsong)
{
	$action = $_REQUEST['actionAlbsong'];
	 }

if($action == "add")
{
	$Data['iMemberId'] = $_POST['iMemberId'];
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	$memberId = $_POST['iMemberId'];
	$id = $obj->MySQLQueryPerform("song_album",$Data,'insert');
	
	if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$memberId,
			 //"TARGET_DIR" =>$path."/".$memberId."/".$catId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "2")
				
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		//print_r($memberId);exit;
		if($image !=''){
			$Data['vImage'] = $image;
		}
		$where = " iSongAlbumId = '".$id."'";
		$res = $obj->MySQLQueryPerform("song_album",$Data,'update',$where);
	}
	if($id)$var_msg = "Song Album is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action == "edit")
{
	$memberId = $Data['iMemberId'];
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	
	if ($_FILES['vImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$memberId,
		//"TARGET_DIR" =>$path."/".$memberId."/".$catId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "2")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){
		    $Data['vImage'] = addslashes($image);
		    unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
		    unlink($path."/".$memberId."/1_".$_POST['vOldImage']);
		    unlink($path."/".$memberId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}

	$iSongAlbumId = $_POST['iSongAlbumId'];
	$where = " iSongAlbumId = '".$iSongAlbumId."'";
	$res = $obj->MySQLQueryPerform("song_album",$Data,'update',$where);

	if($res)$var_msg = "Song Album is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action=="Active")
{
    $iSongAlbumId = $_REQUEST['iSongAlbumId'];
    $totid = count($iSongAlbumId);
    
    if(is_array($iSongAlbumId)){
        $iSongAlbumId  = @implode(",",$iSongAlbumId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iSongAlbumId IN (".$iSongAlbumId.")";
	$res = $obj->MySQLQueryPerform("song_album",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}

if($action=="Inactive")
{
    $iSongAlbumId = $_REQUEST['iSongAlbumId'];
    $totid = count($iSongAlbumId );
    if(is_array($iSongAlbumId )){
        $iSongAlbumId = @implode(",",$iSongAlbumId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iSongAlbumId IN (".$iSongAlbumId.")";
	$res = $obj->MySQLQueryPerform("song_album",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action == "Delete")
{
	
	$iSongAlbumId = $_POST['iSongAlbumId'];
	
	$sql="Delete from song_album where iSongAlbumId='".$iSongAlbumId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Song Album is Deleted Successfully.";
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
	
	$iSongAlbumId="";
	foreach ($_POST['iSongAlbumId'] as $id) {	
		$iSongAlbumId = $iSongAlbumId . $id .',';
	}
	
	$iSongAlbumId = substr($iSongAlbumId, 0, strlen($iSongAlbumId)-1); 
	
	$where = " iSongAlbumId IN (".$iSongAlbumId.")";
	$sql="Delete from song_album where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action == "DeleteImage")
{
	$memberId = $_REQUEST['iMemberId'];
	$iSongAlbumId = $_POST['iSongAlbumId'];
	$data_new = array("vImage"=>'');
	$where = " iSongAlbumId = '".$iSongAlbumId."'";
	$res = $obj->MySQLQueryPerform("song_album",$data_new,'update',$where);
	
	unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
	unlink($path."/".$memberId."/1_".$_POST['vOldImage']);				
	unlink($path."/".$memberId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iSongAlbumId=$iSongAlbumId&iMemberId=$memberId&var_msg=$var_msg#tab-song");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-song");
	exit;
}
?>
