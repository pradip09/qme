<?php

$action = $_REQUEST['action'];
$iStoreCategoryId = $_POST['iStoreCategoryId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_STORE;

if($action == "add")
{
	$storeId = $obj->MySQLQueryPerform("store_category",$Data,'insert');

	if(!is_dir($path."/".$storeId)){
		@mkdir($path."/".$storeId, 0777);
	}

	if ($_FILES['vStoreImage']['name'] != "") {
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$storeId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "128X115", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "149X110", 'PREFIX' => "2")
			);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vStoreImage']);
		if($image !=''){ $Data['vStoreImage'] = $image; }
	}
	
	$where = " iStoreCategoryId = '".$storeId."'";
	$res = $obj->MySQLQueryPerform("store_category",$Data,'update',$where);
  
	if($res)$var_msg = "Store Category is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$storeId = $iStoreCategoryId;
	if(!is_dir($path."/".$storeId)){
		@mkdir($path."/".$storeId, 0777);
	}
	
	if ($_FILES['vStoreImage']['name'] != "")
	{
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$storeId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "128X115", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "149X110", 'PREFIX' => "2")
		 );
		
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vStoreImage']);
		
		if($image !=''){
		    $Data['vStoreImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$storeId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$storeId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE."/".$storeId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vStoreImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
	$where = " iStoreCategoryId = '".$iStoreCategoryId."'";
	$res = $obj->MySQLQueryPerform("store_category",$Data,'update',$where);

	if($res)$var_msg = "Store Category is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iStoreCategoryId = $_REQUEST['iStoreCategoryId'];
    $totid = count($iStoreCategoryId);
       
    if(is_array($iStoreCategoryId)){
        $iStoreCategoryId  = @implode(",",$iStoreCategoryId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iStoreCategoryId IN (".$iStoreCategoryId.")";
	$res = $obj->MySQLQueryPerform("store_category",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iStoreCategoryId = $_REQUEST['iStoreCategoryId'];
    $totid = count($iStoreCategoryId );
    if(is_array($iStoreCategoryId )){
        $iStoreCategoryId = @implode(",",$iStoreCategoryId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iStoreCategoryId IN (".$iStoreCategoryId.")";
	$res = $obj->MySQLQueryPerform("store_category",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "DeleteImage")
{	
	$iStoreCategoryId = $_POST['iStoreCategoryId'];
	$data_new = array("vStoreImage"=>'');
	$where = " iStoreCategoryId = '".$iStoreCategoryId."'";
	$res = $obj->MySQLQueryPerform("store_category",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreCategoryId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreCategoryId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreCategoryId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=st-store&mode=edit&iStoreCategoryId=$iStoreCategoryId&var_msg=$var_msg");
	exit;
}
?>
