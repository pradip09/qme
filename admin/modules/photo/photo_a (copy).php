<?php

$action = $_REQUEST['action'];
$iPhotoId = $_POST['iPhotoId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_PHOTO;


if($action == "add")
{
	
	if($Data['iPhotoCategoryId'] == 0)
	{
	
		$cat = $_POST['vNewCategory'];
		
		$sql_check = "select * from photo_category where vPhotoCategory = '$cat'";
		$db_check = $obj->MySQLSelect($sql_check);
			
		$cnt = count($db_check);

		if($cnt > 0)
		{
			$var_msg = "The Photo Category already exist.";
			header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
			exit;
		}
		else
		{
			$catData['vPhotoCategory'] = $_POST['vNewCategory'];
			$id = $obj->MySQLQueryPerform("photo_category",$catData,'insert');
			$Data['iPhotoCategoryId'] = $id;
		}	
	}
	
	
	if($_POST['eExplicitContent'] == 1)
		$Data['eExplicitContent'] = 'Yes';
	else
		$Data['eExplicitContent'] = 'No';
	
	if($_POST['eHidePhoto'] == 1)
		$Data['eHidePhoto'] = 'Yes';
	else
		$Data['eHidePhoto'] = 'No';
	#echo "<pre>"; print_r($Data); print_r($_POST); exit;
	
	$mId = $Data['iMemberId'];
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	$bId = $obj->MySQLQueryPerform("photo",$Data,'insert');
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
		$where = " iPhotoId = '".$bId."'";
		$res = $obj->MySQLQueryPerform("photo",$Data,'update',$where);
	}
  
	if($bId)$var_msg = "Record is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	
	if($Data['iPhotoCategoryId'] == 0)
	{
		$cat = $_POST['vNewCategory'];
		
		$sql_check = "select * from photo_category where vPhotoCategory = '$cat'";
		$db_check = $obj->MySQLSelect($sql_check);
			
		$cnt = count($db_check);

		if($cnt > 0)
		{
			$var_msg = "The Photo Category already exist.";
			header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
			exit;
		}
		else
		{
			$catData['vPhotoCategory'] = $_POST['vNewCategory'];
			$id = $obj->MySQLQueryPerform("photo_category",$catData,'insert');
			$Data['iPhotoCategoryId'] = $id;
		}	
	}
	

	if($_POST['eExplicitContent'] == 1)
		$Data['eExplicitContent'] = 'Yes';
	else
		$Data['eExplicitContent'] = 'No';
	
	if($_POST['eHidePhoto'] == 1)
		$Data['eHidePhoto'] = 'Yes';
	else
		$Data['eHidePhoto'] = 'No';
	
	
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
		    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/".$_POST['vOldImage']);
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
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iPhotoId = $_REQUEST['iPhotoId'];
    $totid = count($iPhotoId);
       
    if(is_array($iPhotoId)){
        $iPhotoId  = @implode(",",$iPhotoId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iPhotoId IN (".$iPhotoId.")";
	$res = $obj->MySQLQueryPerform("photo",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iPhotoId = $_REQUEST['iPhotoId'];
    $totid = count($iPhotoId );
    if(is_array($iPhotoId )){
        $iPhotoId = @implode(",",$iPhotoId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iPhotoId IN (".$iPhotoId.")";
	$res = $obj->MySQLQueryPerform("photo",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
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
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
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
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	
	$mId = $Data['iMemberId'];
	$iPhotoId = $_POST['iPhotoId'];
	$data_new = array("vImage"=>'');
	$where = " iPhotoId = '".$iPhotoId."'";
	$res = $obj->MySQLQueryPerform("photo",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=ph-photo&mode=edit&iPhotoId=$iPhotoId&var_msg=$var_msg");
	exit;
}
?>
