<?php

$action = $_REQUEST['action'];
$iItemId = $_POST['iItemId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_STORE;

if($action == "add")
{
	
	$Data['vItemSize'] = implode("|", $_POST['vItemSize']);
	$Data['vItemColor'] = implode("|", $_POST['vItemColor']);
	
	if($_POST['eHideItem'] == 1)
		$Data['eHideItem'] = 'Yes';
	else
		$Data['eHideItem'] = 'No';
		
	
	$mId = $Data['iMemberId'];
	
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
	}
	
	$bId = $obj->MySQLQueryPerform("store",$Data,'insert');
	
	if ($_FILES['vItemImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$mId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vItemImage']);
		
		if($image !=''){ $Data['vItemImage'] = $image; }

	}
	
	$where = " iItemId = '".$bId."'";
	$res = $obj->MySQLQueryPerform("store",$Data,'update',$where);
  
	if($bId)$var_msg = "Record is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	
	$Data['vItemSize'] = implode("|", $_POST['vItemSize']);
	$Data['vItemColor'] = implode("|", $_POST['vItemColor']);
	
	if($_POST['eHideItem'] == 1)
		$Data['eHideItem'] = 'Yes';
	else
		$Data['eHideItem'] = 'No';
		
	$mId = $Data['iMemberId'];
	
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
	}
	
	if ($_FILES['vItemImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$mId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vItemImage']);
		
		if($image !=''){
		    $Data['vItemImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vItemImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
	
	$iItemId = $_POST['iItemId'];
	$where = " iItemId = '".$iItemId."'";
	$res = $obj->MySQLQueryPerform("store",$Data,'update',$where);

	if($res)$var_msg = "Record is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iItemId = $_REQUEST['iItemId'];
    $totid = count($iItemId);
       
    if(is_array($iItemId)){
        $iItemId  = @implode(",",$iItemId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iItemId IN (".$iItemId.")";
	$res = $obj->MySQLQueryPerform("store",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iItemId = $_REQUEST['iItemId'];
    $totid = count($iItemId );
    if(is_array($iItemId )){
        $iItemId = @implode(",",$iItemId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iItemId IN (".$iItemId.")";
	$res = $obj->MySQLQueryPerform("store",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iItemId = $_POST['iItemId'];
	
	
	$sql_sel = "select vImage,iMemberId from song where iItemId = '$iItemId'";
	$db_sel = $obj->MySQLSelect($sql_sel);
	
	$img = $db_sel[0]['vItemImage'];
	$mId = $db_sel[0]['iMemberId'];
	
	
	$sql="Delete from store where iItemId='".$iItemId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/1_".$img);				
		unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/".$img);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iItemId="";
	foreach ($_POST['iItemId'] as $id) {	
		$iItemId = $iItemId . $id .',';
	}
	
	$iItemId = substr($iItemId, 0, strlen($iItemId)-1); 
	
	$where = " iItemId IN (".$iItemId.")";
	$sql="Delete from store where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	
	$mId = $Data['iMemberId'];
	$iItemId = $_POST['iItemId'];
	$data_new = array("vItemImage"=>'');
	$where = " iItemId = '".$iItemId."'";
	$res = $obj->MySQLQueryPerform("store",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE."/".$mId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=edit&iItemId=$iItemId&var_msg=$var_msg");
	exit;
}
?>
