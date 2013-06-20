<?php

/*echo "<pre>";
print_r($_REQUEST);
echo "<pre>";
print_r($_FILES);exit;*/
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];
$path = TPATH_SERVER_IMAGES_PHOTO;
$action = $_REQUEST['action'];
$iPhotoCategoryId = $_POST['iPhotoCategoryId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$actionalb = $_REQUEST['actionalb'];
if($actionalb){$action = $_REQUEST['actionalb']; }
$Data['dAddedDate'] = date('Y-m-d H:i:s');

if($action == "add")
{	
	$Data['iMemberId'] = $_POST['iMemberId'];
	$memberId = $_POST['iMemberId'];
	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
        }
	$id = $obj->MySQLQueryPerform("photo_category",$Data,'insert');
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
		$where = " iPhotoCategoryId = '".$id."'";
		$res = $obj->MySQLQueryPerform("photo_category",$Data,'update',$where);
	}
	if($id)$var_msg = "Photo Category is Added Successfully."; else $var_msg="Eror-in Add.";
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

	$iPhotoCategoryId = $_POST['iPhotoCategoryId'];
	$where = " iPhotoCategoryId = '".$iPhotoCategoryId."'";
	$res = $obj->MySQLQueryPerform("photo_category",$Data,'update',$where);

	if($res)$var_msg = "Photo Category is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}

if($action=="Active")
{
	
	$memberId = $_REQUEST['iMemberId'];
	$iPhotoCategoryId = $_REQUEST['iPhotoCategoryId'];
	$totid = count($iPhotoCategoryId);
	
	if(is_array($iPhotoCategoryId)){
		$iPhotoCategoryId  = @implode(",",$iPhotoCategoryId);
	}
	$data = array('eStatus'=>'Active');
	$where = " iPhotoCategoryId IN (".$iPhotoCategoryId.")";
	$res = $obj->MySQLQueryPerform("photo_category",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}

if($action=="Inactive")
{
	$memberId = $_REQUEST['iMemberId'];
	$iPhotoCategoryId = $_REQUEST['iPhotoCategoryId'];
	$totid = count($iPhotoCategoryId );
	if(is_array($iPhotoCategoryId )){
	$iPhotoCategoryId = @implode(",",$iPhotoCategoryId);
	}
	$data = array('eStatus'=>'Inactive');
	$where = " iPhotoCategoryId IN (".$iPhotoCategoryId.")";
	$res = $obj->MySQLQueryPerform("photo_category",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action == "Delete")
{
	$memberId = $_REQUEST['iMemberId'];
	$iPhotoCategoryId = $_POST['iPhotoCategoryId'];	
	$sql="Delete from photo_category where iPhotoCategoryId='".$iPhotoCategoryId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Photo Category is Deleted Successfully.";
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
	$memberId = $_REQUEST['iMemberId'];
	$iPhotoCategoryId="";
	foreach ($_POST['iPhotoCategoryId'] as $id) {	
		$iPhotoCategoryId = $iPhotoCategoryId . $id .',';
	}
	
	$iPhotoCategoryId = substr($iPhotoCategoryId, 0, strlen($iPhotoCategoryId)-1); 
	
	$where = " iPhotoCategoryId IN (".$iPhotoCategoryId.")";
	$sql="Delete from photo_category where ".$where; 
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
	$iPhotoCategoryId = $_POST['iPhotoCategoryId'];
	$data_new = array("vImage"=>'');
	$where = " iPhotoCategoryId = '".$iPhotoCategoryId."'";
	$res = $obj->MySQLQueryPerform("photo_category",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$memberId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iPhotoCategoryId=$iPhotoCategoryId&iMemberId=$memberId&var_msg=$var_msg#tab-photo");
	exit;
}
if($action=="Show all")
{
		
	//$mId =$_REQUEST['iMemberId'];
	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-photo");
	exit;
}
?>
