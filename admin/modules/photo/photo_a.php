<?php


$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];


$action = $_REQUEST['action'];
$iPhotoId = $_POST['iPhotoId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_PHOTO;
$memberId = $_REQUEST['iMemberId'];
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$actionPhoto = $_REQUEST['actionPhoto'];
if($actionPhoto){$action = $_REQUEST['actionPhoto']; }

if($action == "add")
{
	$catId = $Data['iPhotoCategoryId'];
	
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	
	$Data['iMemberId'] = $memberId;
	$bId = $obj->MySQLQueryPerform("photo",$Data,'insert');
	
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
		if($image !=''){
			$Data['vImage'] = $image;
		}
		$where = " iPhotoId = '".$bId."'";
		$res = $obj->MySQLQueryPerform("photo",$Data,'update',$where);
	}
	
	if($bId)$var_msg = "Record is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
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
		    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}

	$iPhotoId = $_POST['iPhotoId'];
	
	$where = " iPhotoId = '".$iPhotoId."'";
	$res = $obj->MySQLQueryPerform("photo",$Data,'update',$where);

	if($res)$var_msg = "Record is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}

if($action=="Active")
{
	$memberId = $_REQUEST['iMemberId'][0];
    $iPhotoId = $_REQUEST['iPhotoId'];
    $totid = count($iPhotoId);
    
    if(is_array($iPhotoId)){
    $iPhotoId  = @implode(",",$iPhotoId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iPhotoId IN (".$iPhotoId.")";
    $res = $obj->MySQLQueryPerform("photo",$data,'update',$where);
    if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
    exit;
}

if($action=="Inactive")
{
	
   $memberId = $_REQUEST['iMemberId'][0];
    $iPhotoId = $_REQUEST['iPhotoId'];
    $totid = count($iPhotoId );
    if(is_array($iPhotoId )){
        $iPhotoId = @implode(",",$iPhotoId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iPhotoId IN (".$iPhotoId.")";
	$res = $obj->MySQLQueryPerform("photo",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action == "Delete")
{	
	$memberId = $_REQUEST['iMemberId'][0];
	$iPhotoId = $_POST['iPhotoId'];
	
	$sql_sel = "select vImage,iMemberId from photo where iPhotoId = '$iPhotoId'";
	$db_sel = $obj->MySQLSelect($sql_sel);
	
	$img = $db_sel[0]['vImage'];
	$mId = $db_sel[0]['iMemberId'];
	
	
	$sql="Delete from photo where iPhotoId='".$iPhotoId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/".$img);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action=="Deletes")
{	
	$memberId = $_REQUEST['iMemberId'][0];
	$iPhotoId="";
	foreach ($_POST['iPhotoId'] as $id) {	
		$iPhotoId = $iPhotoId . $id .',';
	}
	
	$iPhotoId = substr($iPhotoId, 0, strlen($iPhotoId)-1); 
	
    $where = " iPhotoId IN (".$iPhotoId.")";
	$sql="Delete from photo where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action == "DeleteImage")
{
	$memberId = $_REQUEST['iMemberId'];
	$iPhotoId = $_POST['iPhotoId'];
	$data_new = array("vImage"=>'');
	$where = " iPhotoId = '".$iPhotoId."'";
	$res = $obj->MySQLQueryPerform("photo",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iPhotoId=$iPhotoId&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-photo");
	exit;
}
?>
