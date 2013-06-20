<?php
$action = $_REQUEST['action'];
$iEstimateDetailId = $_POST['iEstimateDetailId'];

$Data = $_POST["Data"];
$path = TPATH_SERVER_IMAGES;
#echo "<pre>";
#print_r($_REQUEST);exit;
    
if($action == "add")
{
	
	 $allowedExtensions = array("jpg","jpeg","gif","png"); 
	  if (in_array(end(explode(".",strtolower($_FILES['vImage']['name']))),$allowedExtensions))
       {
		 if ($_FILES['vImage']['name'] == 0) {  
		
			$filename = "uploads_".time()."_".basename($_FILES['vImage']['name']);
			$target_path = $path .'/'. $filename;
			if (file_exists($target_path))
			{
				$var_msg = "Filename already exits. Upload with other name.";
				header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
				exit;
			}else{
				move_uploaded_file($_FILES['vImage']['tmp_name'], $target_path);
		
				}	
		  }
	}
	else
	{
	$var_msg = "You are uploading invalid file";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
	}
	$Data['vImage'] = $filename;
    $id = $obj->MySQLQueryPerform("estimate_orders",$Data,'insert');
    if($id)$var_msg = "Category is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "edit")
{
	
	 $allowedExtensions = array("jpg","jpeg","gif","png"); 
	  if (in_array(end(explode(".",strtolower($_FILES['vImage']['name']))),$allowedExtensions))
       {
		 if ($_FILES['vImage']['name'] == 0) {  
		
			$filename = "uploads_".time()."_".basename($_FILES['vImage']['name']);
			$target_path = $path .'/'. $filename;
			if (file_exists($target_path))
			{
				$var_msg = "Filename already exits. Upload with other name.";
				header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
				exit;
			}else{
				move_uploaded_file($_FILES['vImage']['tmp_name'], $target_path);
		
				}	
		  }
	}
	else
	{
	$var_msg = "You are uploading invalid file";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
	}
		
		$Data['vImage'] = $filename;
	
    $iEstimateDetailId = $_POST['iEstimateDetailId'];
	$where = " iEstimateDetailId = '".$iEstimateDetailId."'";

	$res = $obj->MySQLQueryPerform("estimate_orders",$Data,'update',$where);
	if($res)$var_msg = "Category is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iEstimateDetailId = $_POST['iEstimateDetailId'];
	$sql="Delete from estimate_orders where iEstimateDetailId='".$iEstimateDetailId."'"; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = "Category is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Deletes")
{
    $iEstimateDetailId = $_REQUEST['iEstimateDetailId'];
    $totid = count($iEstimateDetailId);
    if(is_array($iEstimateDetailId)){
        $iEstimateDetailId  = @implode(",",$iEstimateDetailId);
    }
    $where = " iEstimateDetailId IN (".$iEstimateDetailId.")";
	$sql="Delete from estimate_orders where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=o-estimate_orders&mode=view&var_msg=$var_msg");
	exit;
}

?>
