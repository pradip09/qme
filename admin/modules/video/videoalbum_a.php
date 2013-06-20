<?php

/*echo "<pre>";
print_r($_REQUEST);
echo "<pre>";
print_r($_FILES);*/
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];

$action = $_REQUEST['action'];
$iVideoAlbumId = $_POST['iVideoAlbumId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$memberId = $_REQUEST['iMemberId'];
$path = TPATH_SERVER_IMAGES_VIDEO;
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$actionVid = $_REQUEST['actionVid'];
if($actionVid){$action = $_REQUEST['actionVid']; }
    
if($action == "add")
{
	$Data['iMemberId'] = $_POST['iMemberId'];
	$memberId = $Data['iMemberId'];
	
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }		
	
	if ($_FILES['vVideoImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$memberId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vVideoImage']);
		if($image !=''){
		$Data['vImage'] = $image;
		}
		$id = $obj->MySQLQueryPerform("video_album",$Data,'insert');	
	}
	
	if($id)$var_msg = " Video Album is Added Successfully."; else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action == "edit")
{
	$memberId = $Data['iMemberId'];
	
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }		
	if ($_FILES['vVideoImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$memberId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vVideoImage']);
		if($image !=''){
		    $Data['vImage'] = $image;
			unlink($path."/".$memberId."/".$_POST['vOldImage']);
			unlink($path."/".$memberId."/1_".$_POST['vOldImage']);
			unlink($path."/".$memberId."/2_".$_POST['vOldImage']);
		}
		
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = $_POST['vOldImage'];
		}
	}
	$iVideoAlbumId= $_POST['iVideoAlbumId'];
	$where = " iVideoAlbumId = '".$iVideoAlbumId."'";
	$res = $obj->MySQLQueryPerform("video_album",$Data,'update',$where);

	if($res)$var_msg = "Video Album is Updated Successfully."; else $var_msg="Eror-in Update.";
	//header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action=="Active")
{
    $iVideoAlbumId= $_REQUEST['iVideoAlbumId'];
    $totid = count($iVideoAlbumId);
       
    if(is_array($iVideoAlbumId)){
        $iVideoAlbumId  = @implode(",",$iVideoAlbumId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$res = $obj->MySQLQueryPerform("video_album",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}

if($action=="Inactive")
{
    $iVideoAlbumId = $_REQUEST['iVideoAlbumId'];
    $totid = count($iVideoAlbumId );
    if(is_array($iVideoAlbumId )){
        $iVideoAlbumId = @implode(",",$iVideoAlbumId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$res = $obj->MySQLQueryPerform("video_album",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action == "Delete")
{	
	$iVideoAlbumId = $_POST['iVideoAlbumId'];
	
	$sql="Delete from video_album where iVideoAlbumId='".$iVideoAlbumId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Video Album is Deleted Successfully.";
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action=="Deletes")
{	
	$iVideoAlbumId="";
	foreach ($_POST['iVideoAlbumId'] as $id) {	
		$iVideoAlbumId = $iVideoAlbumId.$id.',';
	}
	
	$iVideoAlbumId = substr($iVideoAlbumId, 0, strlen($iVideoAlbumId)-1); 
	
    $where = " iVideoAlbumId IN (".$iVideoAlbumId.")";
	$sql="Delete from video_album where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action == "DelvidAlbumImage")
{	
    $mId = $Data['iMemberId'];
	$iVideoAlbumId = $_POST['iVideoAlbumId'];
	$data_new = array("vImage"=>'');
	$where = " iVideoAlbumId = '".$iVideoAlbumId."'";
	$res = $obj->MySQLQueryPerform("video_album",$data_new,'update',$where);
		
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iVideoAlbumId=$iVideoAlbumId&iMemberId=$memberId&var_msg=$var_msg#tab-video");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-video");
	exit;
}
?>
