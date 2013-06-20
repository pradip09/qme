<?php

$action = $_REQUEST['action'];
$iProductId = $_POST['iProductId'];
$Data = $_POST["Data"];
$dtype = $_POST['dtype'];
$path = TPATH_SERVER_IMAGES_STORE;
//$istoreId = $Data['iStoreId'];
$Data['iStoreCategoryId'] = 1;
#echo "<pre>"; 
#print_r($Data); exit;
if($action == "add")
{
	
	$id = $obj->MySQLQueryPerform("product_general_item",$Data,'insert');
	
	if ($_FILES['vProductImage']['name'] != "") {
	   
       
       if(!is_dir($path.'/1/')){
		@mkdir($path.'/1/', 0777);
	}
	if(!is_dir($path.'/1/'.$id)){
		@mkdir($path.'/1/'.$id, 0777);
	}
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path.'/1/'.$id,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
				array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
				array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
			);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);
		if($image !=''){ $Data['vProductImage'] = $image; }
	}
	
	$where = " iProductId = '".$id."'";
	$res = $obj->MySQLQueryPerform("product_general_item",$Data,'update',$where);
  
	if($res)$var_msg = "General Items is Added Successfully."; else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
			
	if ($_FILES['vProductImage']['name'] != "")
	{
	   if(!is_dir($path.'/1/')){
		@mkdir($path.'/1/', 0777);
	}
	   if(!is_dir($path.'/1/'.$iProductId)){
		@mkdir($path.'/1/'.$iProductId, 0777);
	}               
		$PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path.'/1/'.$iProductId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")
		);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProductImage']);
		
		if($image !=''){
		    $Data['vProductImage'] = $image;
		    unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/2_".$_POST['vOldImage']);
		    unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/".$_POST['vOldImage']);
		}
	}
	else
	{
		if($_POST['vOldImage'] != ""){
			$Data['vProductImage'] = addslashes($_POST['vOldImage']);
		}
	}
	
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_general_item",$Data,'update',$where);

	if($res)$var_msg = "General Items is Updated Successfully."; else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
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
	$res = $obj->MySQLQueryPerform("product_general_item",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
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
	$res = $obj->MySQLQueryPerform("product_general_item",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{	
	$iProductId = $_POST['iProductId'];
    #echo "<pre>";
    #print_r($iProductId);exit;
        $sql_img = "select vProductImage from   product_general_item where iProductId='".$iProductId."' ";
	$db_product = $obj->MySQLSelect($sql_img);
	
	$vProductImage=$db_product[0]['vProductImage'];
    
        #echo "<pre>";
        #print_r($db_product);exit;
	
	$sql="Delete from  product_general_item where iProductId='".$iProductId."'";
	$db_sql=$obj->sql_query($sql);	
	
	if($db_sql)
	{
		$var_msg = "Record is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/2_".$vProductImage);				
		unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/1_".$vProductImage);				
		unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/".$vProductImage);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
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
	$sql="Delete from product_general_item where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$var_msg= $totid." Record Deleted Successfully.";
	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "DeleteImage")
{	
	$iProductId = $_POST['iProductId'];
	$data_new = array("vProductImage"=>'');
	$where = " iProductId = '".$iProductId."'";
	$res = $obj->MySQLQueryPerform("product_general_item",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/1_".$_POST['vOldImage']);				
	unlink(TPATH_SERVER_IMAGES_STORE.'/1/'.$iProductId."/".$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pro-product&mode=edit&iProductId=$iProductId&var_msg=$var_msg");
	exit;
}
?>
