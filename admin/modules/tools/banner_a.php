<?php


    $action = $_REQUEST['action'];
    $iBannerId = $_POST['iBannerId'];
   
    $Data = $_POST["Data"];
    $path = TPATH_SERVER_IMAGES_BANNER;	
    list($width, $height, $type, $attr)= getimagesize($_FILES['vImage']['tmp_name']);
    if($width != 1000 || $height != 350){
		
		
		if($action == 'add')//echo "0"; exit;
		{
		    $var_msg = "Error! PLease upload (1000 X 350) size Image.";
		    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=add&var_msg=$var_msg");exit;
		}
		elseif($action == 'edit')
		{
		    $var_msg = "Error! PLease upload (1000 X 350) size Image.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=edit&iBannerId=$iBannerId&var_msg=$var_msg"); exit;   
		}
		
	}

    if($action == "add")
    {	
	    $id = $obj->MySQLQueryPerform("banner",$Data,'insert');	
	    if ($_FILES['vImage']['name'] != "") {
	         $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		if($image !=''){
			$image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		}
		$where = " iBannerId = '".$id."'";
		$res = $obj->MySQLQueryPerform("banner",$Data,'update',$where);
	    }
	    if($id)$var_msg = "Banner is Added Successfully.";else $var_msg="Eror-in Add.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    if($action == "edit")
    {
	
	if ($_FILES['vImage']['name'] != "") {
	    $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		if($image !=''){
		    $image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		    unlink(TPATH_SERVER_IMAGES_BANNER."/".$_POST['vOldImage']);
		}
		
	}else{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	$iBannerId = $_POST['iBannerId'];
	$where = " iBannerId = '".$iBannerId."'";
	$res = $obj->MySQLQueryPerform("banner",$Data,'update',$where);    	
	if($res)$var_msg = "Banner Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	exit;  
    }
    if($action == "Active"){
    
	$iBannerId = $_REQUEST['iBannerId'];
	$totid = count($iBannerId);
	if(is_array($iBannerId)){
	    $iBannerId  = @implode(",",$iBannerId);
	}
	$data = array('eStatus'=>'Active');
	$where = " iBannerId IN (".$iBannerId.")";
	    $res = $obj->MySQLQueryPerform("banner",$data,'update',$where);
	    if($res)$var_msg = $totid."Record Activated Successfully.";else $var_msg="Eror-in Active.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action == "Inactive")
    {
	$iBannerId = $_REQUEST['iBannerId'];
	
	$totid = count($iBannerId);
	if(is_array($iBannerId)){
	    $iBannerId  = @implode(",",$iBannerId);
	}
	$data = array('eStatus'=>'Inactive');
	$where = " iBannerId IN (".$iBannerId.")";
	    $res = $obj->MySQLQueryPerform("banner",$data,'update',$where);
	    if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action=="Yes")
    {
	$iBannerId = $_REQUEST['iBannerId'];
	$totid = count($iBannerId);
	if(is_array($iBannerId)){
	    $iBannerId  = @implode(",",$iBannerId);
	}
	$data = array('ePromotion'=>'Yes');
	$where = " iBannerId IN (".$iBannerId.")";
	    $res = $obj->MySQLQueryPerform("banner",$data,'update',$where);
	    if($res)$var_msg = $totid."Record Activeted Successfully.";else $var_msg="Eror-in Active.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action=="No")
    {
	$iBannerId = $_REQUEST['iBannerId'];
	$totid = count($iBannerId);
	if(is_array($iBannerId)){
	    $iBannerId  = @implode(",",$iBannerId);
	}
	$data = array('ePromotion'=>'No');
	$where = " iBannerId IN (".$iBannerId.")";
	    $res = $obj->MySQLQueryPerform("banner",$data,'update',$where);
	    if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action == "Delete")
    {
	    $iBannerId = $_POST['iBannerId'];
	    $sql="Delete from banner where iBannerId='".$iBannerId."'"; 
	    $db_sql=$obj->sql_query($sql);	
	    if($db_sql)$var_msg = "Banner is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action=="Deletes")
    {
	$iBannerId = $_REQUEST['iBannerId'];
	$totid = count($iBannerId);
	if(is_array($iBannerId)){
	    $iBannerId  = @implode(",",$iBannerId);
	}
	$where = " iBannerId IN (".$iBannerId.")";
	    $sql="Delete from banner where ".$where; 
	    $db_sql=$obj->sql_query($sql);	
	    if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=view&var_msg=$var_msg");
	    exit;
    }
    if($action == "DeleteImage")
    {	
    
	    $iBannerId = $_POST['iBannerId'];
	    $data_new = array("vImage"=>'');
	    $where = " iBannerId = '".$iBannerId."'";
	    $res = $obj->MySQLQueryPerform("banner",$data_new,'update',$where);
	    //echo TPATH_SERVER_IMAGES_BANNER."/1_".$_POST['vOldImage'];exit;	   
	    unlink(TPATH_SERVER_IMAGES_BANNER."/".$_POST['vOldImage']);
	    
	    if($res){
		    $var_msg = "Image is Deleted Successfully.";
	    }else{
		    $var_msg="Eror-in Image Delete.";
	    }	
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-banner&mode=edit&iBannerId=$iBannerId&var_msg=$var_msg");
	    exit;
    }
    
   
?>
