<?php
/*echo "<pre>";print_r($_FILES);
echo "<pre>";print_r($_REQUEST);*/

	$action = $_REQUEST['action'];
	$iContestId = $_POST['iContestId'];
	$Data = $_POST["Data"];
	$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);
	$Data['iSkillId']= implode(",",$_REQUEST['iSkillId']);
	$path = TPATH_SERVER_IMAGES_CONTESTS;
	//echo $path;exit;
	if($_POST['eIsLocal'] == 'Yes'){
		$Data['eIsLocal'] = 'Yes';
	}else{
		$Data['eIsLocal'] = 'No';
	}
	if($_POST['eIsNational'] == 'Yes'){
		$Data['eIsNational'] = 'Yes';
	}else{
		$Data['eIsNational'] = 'No';
	}

	if($action == "add")
	{
		
		$memberId = $_SESSION['iUserId'];
		$Data['iAdminId'] =  $admId;
		$Data['dAddedDate'] = date('Y-m-d H:i:s');
		$cId = $obj->MySQLQueryPerform("contests",$Data,'insert');
		$admId = $cId;
		if(!is_dir($path."/".$admId)){
			@mkdir($path."/".$admId, 0777);
		}
		
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$admId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/".$admId."/".$_FILES["vMp3File"]["name"]);
	
			if($mp3) { $Data['vMp3File'] = $_FILES["vMp3File"]["name"]; }
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/".$admId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		
		$where = " iContestId = '".$cId."'";
		$res = $obj->MySQLQueryPerform("contests",$Data,'update',$where);
		
		if($cId)$var_msg = "Contest Posted Successfully.";else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action == "edit")
	{		
		
		$iContestId = $_POST['iContestId'];
		//$admId = $_SESSION['sess_iAdminId'];
		$admId = $iContestId;
		
		/*if(!is_dir($path."/contests")){
			@mkdir($path."/contests", 0777);
		}*/
		if(!is_dir($path."/".$admId)){
			@mkdir($path."/".$admId, 0777);
		}
	
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$admId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/".$admId."/".$_FILES["vMp3File"]["name"]);
	
			if($mp3)
			{
				$Data['vMp3File'] = $_FILES["vMp3File"]["name"];
			}
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/".$admId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		//echo "<pre>";print_r($Data);exit;
		$where = " iContestId = '".$iContestId."'";
		$res = $obj->MySQLQueryPerform("contests",$Data,'update',$where);
		
		if($res)$var_msg = "Contest is Updated Successfully.";else $var_msg="Eror-in Update.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action=="Active")
	{
	    $iContestId = $_REQUEST['iContestId'];
	    $totid = count($iContestId);
	    if(is_array($iContestId)){
		$iContestId  = @implode(",",$iContestId);
	    }
	    $data = array('eStatus'=>'Active');
	    $where = " iContestId IN (".$iContestId.")";
		$res = $obj->MySQLQueryPerform("contests",$data,'update',$where);
		if($res)$var_msg = $totid." Record Activeted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action=="Inactive")
	{
		
	    $iContestId = $_REQUEST['iContestId'];
	    $totid = count($iContestId);
	    if(is_array($iContestId)){
		$iContestId  = @implode(",",$iContestId);
	    }
	    $data = array('eStatus'=>'Inactive');
	    $where = " iContestId IN (".$iContestId.")";
		$res = $obj->MySQLQueryPerform("contests",$data,'update',$where);
		if($res)$var_msg = $totid." Record Inactiveted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action == "Delete")
	{
		$iContestId = $_POST['iContestId'];
		$sql_sel = "select vImage,iAdminId from contests where iContestId = '$iContestId'";
		$db_sel = $obj->MySQLSelect($sql_sel);
		$img = $db_sel[0]['vImage'];
		//$adm = $db_sel[0]['iAdminId'];
		$adm = $iContestId;
		
		$sql="Delete from contests where iContestId='".$iContestId."'"; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)
		{
			unlink($path."/".$adm."/2_".$img);
			unlink($path."/".$adm."/1_".$img);				
			unlink($path."/".$adm."/".$img);		
			$var_msg = "Contest is Deleted Successfully.";
		}
		else
		{
			$var_msg="Eror-in Delete.";
		}
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	
	
	if($action=="Deletes")
	{
	    $iContestId = $_REQUEST['iContestId'];
	    $totid = count($iContestId);
	    if(is_array($iContestId)){
		$iContestId  = @implode(",",$iContestId);
	    }
	    $where = " iContestId IN (".$iContestId.")";
		$sql="Delete from contests where ".$where; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteImage")
	{	
		//$admId = $_SESSION['sess_iAdminId'];
		$iContestId = $_POST['iContestId'];
		$admId = $iContestId;
		$data_new = array("vImage"=>'');
		$where = " iContestId = '".$iContestId."'";
		$res = $obj->MySQLQueryPerform("contests",$data_new,'update',$where);
		
		unlink($path."/".$admId."/2_".$_POST['vOldImage']);
		unlink($path."/".$admId."/1_".$_POST['vOldImage']);				
		unlink($path."/".$admId."/".$_POST['vOldImage']);
		
		if($res){
			$var_msg = "Image is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Image Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=edit&iContestId=$iContestId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteMp3")
	{	
		//$admId = $_SESSION['sess_iAdminId'];
		$iContestId = $_POST['iContestId'];
		$admId = $iContestId;
		$data_new = array("vMp3File"=>'');
		$where = " iContestId = '".$iContestId."'";
		$res = $obj->MySQLQueryPerform("contests",$data_new,'update',$where);
		
		unlink($path."/".$admId."/".$_POST['vOldMp3']);
		
		if($res){
			$var_msg = "Mp3 is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Mp3 Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=edit&iContestId=$iContestId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteVideo")
	{	
		//$admId = $_SESSION['sess_iAdminId'];
		$iContestId = $_POST['iContestId'];
		$admId = $iContestId;
		$data_new = array("vVideoFile"=>'');
		$where = " iContestId = '".$iContestId."'";
		$res = $obj->MySQLQueryPerform("contests",$data_new,'update',$where);
		
		unlink($path."/".$admId."/".$_POST['vOldVideo']);
		
		if($res){
			$var_msg = "Video is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Video Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=con-contests&mode=edit&iContestId=$iContestId&var_msg=$var_msg");
		exit;
	}
	
?>