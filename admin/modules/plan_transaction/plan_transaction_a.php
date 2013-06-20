<?php

$action = $_REQUEST['action'];
$iPlanTransactionId = $_POST['iPlanTransactionId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_STORE;

if($action == "add")
{
	$storeId = $obj->MySQLQueryPerform("plan_transaction",$Data,'insert');
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
	
	$where = " iPlanTransactionId = '".$storeId."'";
	$res = $obj->MySQLQueryPerform("plan_transaction",$Data,'update',$where);
  
	if($res)$var_msg = "Store Category is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pt-plan_transaction&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
	$storeId = $iPlanTransactionId;
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
	
	$where = " iPlanTransactionId = '".$iPlanTransactionId."'";
	$res = $obj->MySQLQueryPerform("plan_transaction",$Data,'update',$where);

	if($res)$var_msg = "Store Category is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pt-plan_transaction&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
    $totid = count($iPlanTransactionId);
       
    if(is_array($iPlanTransactionId)){
        $iPlanTransactionId  = @implode(",",$iPlanTransactionId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iPlanTransactionId IN (".$iPlanTransactionId.")";
	$res = $obj->MySQLQueryPerform("plan_transaction",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pt-plan_transaction&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
    $totid = count($iPlanTransactionId );
    if(is_array($iPlanTransactionId )){
        $iPlanTransactionId = @implode(",",$iPlanTransactionId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iPlanTransactionId IN (".$iPlanTransactionId.")";
	$res = $obj->MySQLQueryPerform("plan_transaction",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pt-plan_transaction&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "DeleteImage")
{	
	$iPlanTransactionId = $_POST['iPlanTransactionId'];
	$data_new = array("vStoreImage"=>'');
	$where = " iPlanTransactionId = '".$iPlanTransactionId."'";
	$res = $obj->MySQLQueryPerform("plan_transaction",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iPlanTransactionId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iPlanTransactionId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE."/".$iPlanTransactionId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pt-plan_transaction&mode=edit&iPlanTransactionId=$iPlanTransactionId&var_msg=$var_msg");
	exit;
}
?>
