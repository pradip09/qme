<?php

$action = $_REQUEST['action'];
$iBannerId = $_POST['iBannerId'];
$Data = $_POST["Data"];

$dtype = $_POST['dtype'];
$img = $_REQUEST['vOldImage'];
$path = TPATH_SERVER_IMAGES_HOMETAB;
    
 list($width, $height, $type, $attr)= getimagesize($_FILES['vImage']['tmp_name']);
   
          if($width != 244 || $height != 180){
		
		
		if($action == 'add')//echo "0"; exit;
		{
		    $var_msg = "Error! PLease upload (244 X 180) size Image.";
		    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=add&var_msg=$var_msg");exit;
		}
		elseif($action == 'edit' && $width != '' )
		{
		    $var_msg = "Error! PLease upload (244 X 180) size Image.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=edit&iBannerId=$iBannerId&var_msg=$var_msg"); exit;   
		}
		
	}   
    

    
/*if($action == "add")
{
	
	$Data['vTitle']= addslashes($Data['vTitle']);
	$Data['tSortDescription']= addslashes($Data['tSortDescription']);
	$Data['tLongDescription']= addslashes($Data['tLongDescription']);
	
	$id = $obj->MySQLQueryPerform("banner_tab",$Data,'insert');
	if ($_FILES['vImage']['name'] != "") {
	         $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		if($image !=''){
			$image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		}
	
	$where = " iBannerId = '".$id."'";
	$res = $obj->MySQLQueryPerform("banner_tab",$Data,'update',$where);
	
	if($res)$var_msg = "Home Tab is Added Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	}
}*/

if($action == "edit")
{
	
	
	
	
	$Data['vTitle']= addslashes($Data['vTitle']);
	$Data['tSortDescription']= addslashes($Data['tSortDescription']);
	$Data['tLongDescription']= addslashes($Data['tLongDescription']);
	$iBannerId = $_POST['iBannerId'];
	
	if ($_FILES['vImage']['name'] != "") {
	    $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		if($image !=''){
		    $image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		    unlink(TPATH_SERVER_IMAGES_HOMETAB."/".$_POST['vOldImage']);
		}
		
	}else{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	$where = " iBannerId = '".$iBannerId."'";
	$res = $obj->MySQLQueryPerform("banner_tab",$Data,'update',$where);
	if($res)$var_msg = "Home Tab is Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Active")
{
    $iBannerId = $_REQUEST['iBannerId'];
    $totid = count($iBannerId);
       
    if(is_array($iBannerId)){
        $iBannerId  = @implode(",",$iBannerId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iBannerId IN (".$iBannerId.")";
	$res = $obj->MySQLQueryPerform("banner_tab",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iBannerId = $_REQUEST['iBannerId'];
    $totid = count($iBannerId );
    if(is_array($iBannerId )){
        $iBannerId = @implode(",",$iBannerId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iBannerId IN (".$iBannerId.")";
	$res = $obj->MySQLQueryPerform("banner_tab",$data,'update',$where);
	if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	exit;
}
/*if($action == "Delete")
{	
	$iBannerId = $_POST['iBannerId'];
	$sql="select vImage from banner_tab where iBannerId = ".$iBannerId; 
	$db_data=$obj->sql_query($sql);
	$eImg = $db_data[0]['vImage'];

	$sql="Delete from banner_tab where iBannerId='".$iBannerId."'"; 
	$db_sql=$obj->sql_query($sql);
	if($db_sql)
	{
		$var_msg = "Home Tab is Deleted Successfully.";
		unlink(TPATH_SERVER_IMAGES_HOMETAB.'/'.$iBannerId."/".$eImg);
	}
	else
	{	 
		$var_msg="Eror-in Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{	
	$iBannerId="";
	$eImg = array();
	foreach ($_POST['iBannerId'] as $id) {	
		$iBannerId = $iBannerId . $id .',';
		$sql="select vImage from banner_tab where iBannerId = ".$id; 
			$db_data=$obj->sql_query($sql);
			$eImg[] = $db_data[0]['vImage'];
			
	}
	
	$iBannerId = substr($iBannerId, 0, strlen($iBannerId)-1); 
	
    	$where = " iBannerId IN (".$iBannerId.")";
	$sql="Delete from banner_tab where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)
	{	
		$db_data = array();
		$var_msg= $totid." Record Deleted Successfully.";
		foreach ($eImg as $img) {				
			
			unlink(TPATH_SERVER_IMAGES_HOMETAB.'/'.$iBannerId."/".$img);
		}

	}	
	else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=view&var_msg=$var_msg");
	exit;
}*/
if($action == "DeleteImage")
{	

	$iBannerId = $_POST['iBannerId'];
	$data_new = array("vImage"=>'');
	$where = " iBannerId = '".$iBannerId."'";
	$res = $obj->MySQLQueryPerform("banner_tab",$data_new,'update',$where);
	unlink(TPATH_SERVER_IMAGES_HOMETAB.'/'.$_POST['vOldImage']);
	
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-hometab&mode=edit&iBannerId=$iBannerId&var_msg=$var_msg");
	exit;
}


?>
