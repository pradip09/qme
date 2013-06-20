<?php

$action = $_REQUEST['action'];
$iProductId = $_POST['iProductId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_STORE;
$Data['iStoreCategoryId'] = 2;

if($_POST['eHideProduct'] == 'Yes'){
	$Data['eHideProduct'] = 'Yes';
}else{
	$Data['eHideProduct'] = 'No';
}

if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("product_clothing_accessories",$Data,'insert');
	if ($_FILES['vProductImage']['name'] != "") {
	 
	if(!is_dir($path.'/2/')){
		@mkdir($path.'/2/', 0777);
	}
	if(!is_dir($path.'/2/'.$id)){
		@mkdir($path.'/2/'.$id, 0777);
	}
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path.'/2/'.$id,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "164X170", 'PREFIX' => "2")
			);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);
		if($image !=''){ $Data['vProductImage'] = $image; }
	}
	
	$where = " iProductId = '".$id."'";
	$res = $obj->MySQLQueryPerform("product_clothing_accessories",$Data,'update',$where);
	if($res)$var_msg = "Clothing and Accessories is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
			
	if ($_FILES['vProductImage']['name'] != "")
	{
	 
	if(!is_dir($path.'/2')){
		@mkdir($path.'/2', 0777);
	}
	   if(!is_dir($path.'/2/'.$iProductId)){
		@mkdir($path.'/2/'.$iProductId, 0777);
	}             
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path.'/2/'.$iProductId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "164X170", 'PREFIX' => "2")
		 );
		
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);
		if($image !=''){
		    $Data['vProductImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/1_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vProductImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_clothing_accessories",$Data,'update',$where);

	if($res)$var_msg = "Clothing and Accessories is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Active")
{
    $iProductId = $_REQUEST['iProductId'];
    $totid = count($iProductId);
       
    if(is_array($iProductId)){
        $iProductId  = @implode(",",$iProductId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iProductId IN (".$iProductId.")";
	$res = $obj->MySQLQueryPerform("product_clothing_accessories",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
	
    $iProductId = $_REQUEST['iProductId'];
    $totid = count($iProductId );
    if(is_array($iProductId )){
        $iProductId = @implode(",",$iProductId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iProductId IN (".$iProductId.")";
	$res = $obj->MySQLQueryPerform("product_clothing_accessories",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iProductId = $_POST['iProductId'];
        $sql_img = "select vProductImage from   product_clothing_accessories where iProductId='".$iProductId."' ";
	$db_clothing = $obj->MySQLSelect($sql_img);
	$vProductImage=$db_clothing[0]['vProductImage'];
	
	$sql="Delete from  product_clothing_accessories where iProductId='".$iProductId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/2_".$vProductImage);	
		unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/1_".$vProductImage);				
		unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/".$vProductImage);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iProductId="";
	foreach ($_POST['iProductId'] as $id) {	
		$iProductId = $iProductId . $id .',';
	}
	
	$iProductId = substr($iProductId, 0, strlen($iProductId)-1); 
	$where = " iProductId IN (".$iProductId.")";
	$sql="Delete from product_clothing_accessories where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else    $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	
	$iProductId = $_POST['iProductId'];
	$data_new = array("vProductImage"=>'');
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_clothing_accessories",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/2_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE.'/2/'.$iProductId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=cl-clothing&mode=edit&iProductId=$iProductId&var_msg=$var_msg");
	exit;
}


?>
