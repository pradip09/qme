<?php
    $action = $_REQUEST['action'];
    $iAgencybannerId = $_POST['iAgencybannerId'];
   
    $Data = $_POST["Data"];
    //echo "<pre>";
    //print_r($Data);exit;
    $path = TPATH_SERVER_IMAGES_AGENCY_BANNER;	
    list($width, $height, $type, $attr)= getimagesize($_FILES['vImage']['tmp_name']);
   
          if($width != 897 || $height != 360){
		
		
		if($action == 'add')
		{
		    $var_msg = "Error! PLease upload (897 X 360) size Image.";
		    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=add&var_msg=$var_msg");exit;
		}
		elseif($action == 'edit' && $width != '' )
		{
		    $var_msg = "Error! PLease upload (897 X 360) size Image.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=edit&iAgencybannerId=$iAgencybannerId&var_msg=$var_msg"); exit;   
		}
		 
	}
    

    if($action == "add")
    {	
	    $id = $obj->MySQLQueryPerform("agency_banner",$Data,'insert');
                        
            
	    if ($_FILES['vImage']['name'] != "") {
	      
                $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		
                if($image !=''){
		
			$image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		}
                
                
		$where = " iAgencybannerId = '".$id."'";
		$res = $obj->MySQLQueryPerform("agency_banner",$Data,'update',$where);
	    }
            
	    if($id)$var_msg = "Agency Support banner is Added Successfully.";else $var_msg="Eror-in Add.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action == "edit")
    {
	
	if ($_FILES['vImage']['name'] != "") {
	    $image = move_uploaded_file($_FILES['vImage']['tmp_name'],$path.'/'.$_FILES['vImage']['name']);
		if($image !=''){
		    $image_name = $_FILES['vImage']['name'];
		    $Data['vImage'] = addslashes($image_name);
		    unlink(TPATH_SERVER_IMAGES_AGENCY_BANNER."/".$_POST['vOldImage']);
		}
		
	}else{
		if($_POST['vOldImage'] != ""){
			$Data['vImage'] = addslashes($_POST['vOldImage']);
		}
	}
	$iAgencybannerId = $_POST['iAgencybannerId'];
	$where = " iAgencybannerId = '".$iAgencybannerId."'";
	$res = $obj->MySQLQueryPerform("agency_banner",$Data,'update',$where);    	
	if($res)$var_msg = "Agency Support banner Updated Successfully.";else $var_msg="Eror-in Update.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	exit;  
    }
    if($action == "Active"){
    
	$iAgencybannerId = $_REQUEST['iAgencybannerId'];
	$totid = count($iAgencybannerId);
	if(is_array($iAgencybannerId)){
	    $iAgencybannerId  = @implode(",",$iAgencybannerId);
	}
	$data = array('eStatus'=>'Active');
	$where = " iAgencybannerId IN (".$iAgencybannerId.")";
	    $res = $obj->MySQLQueryPerform("agency_banner",$data,'update',$where);
	    if($res)$var_msg = $totid."Record Activated Successfully.";else $var_msg="Eror-in Active.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action == "Inactive")
    {
	$iAgencybannerId = $_REQUEST['iAgencybannerId'];
	
	$totid = count($iAgencybannerId);
	if(is_array($iAgencybannerId)){
	    $iAgencybannerId  = @implode(",",$iAgencybannerId);
	}
	$data = array('eStatus'=>'Inactive');
	$where = " iAgencybannerId IN (".$iAgencybannerId.")";
	    $res = $obj->MySQLQueryPerform("agency_banner",$data,'update',$where);
	    if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
   
    
    if($action == "Delete")
    {
	    $iAgencybannerId = $_POST['iAgencybannerId'];
	    $sql="Delete from agency_banner where iAgencybannerId='".$iAgencybannerId."'"; 
	    $db_sql=$obj->sql_query($sql);	
	    if($db_sql)$var_msg = "Banner is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	    exit;
    }
    
    if($action=="Deletes")
    {
	$iAgencybannerId = $_REQUEST['iAgencybannerId'];
	$totid = count($iAgencybannerId);
	if(is_array($iAgencybannerId)){
	    $iAgencybannerId  = @implode(",",$iAgencybannerId);
	}
	$where = " iAgencybannerId IN (".$iAgencybannerId.")";
	    $sql="Delete from agency_banner where ".$where; 
	    $db_sql=$obj->sql_query($sql);	
	    if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=view&var_msg=$var_msg");
	    exit;
    }
    if($action == "DeleteImage")
    {	
    
	    $iAgencybannerId = $_POST['iAgencybannerId'];
	    $data_new = array("vImage"=>'');
	    $where = " iAgencybannerId = '".$iAgencybannerId."'";
	    $res = $obj->MySQLQueryPerform("agency_banner",$data_new,'update',$where);
	    //echo TPATH_SERVER_IMAGES_BANNER."/1_".$_POST['vOldImage'];exit;	   
	    unlink(TPATH_SERVER_IMAGES_AGENCY_BANNER."/".$_POST['vOldImage']);
	    
	    if($res){
		    $var_msg = "Image is Deleted Successfully.";
	    }else{
		    $var_msg="Eror-in Image Delete.";
	    }	
	    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-agencybanner&mode=edit&iAgencybannerId=$iAgencybannerId&var_msg=$var_msg");
	    exit;
    }
    
   
?>
