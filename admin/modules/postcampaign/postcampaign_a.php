<?php



	$action = $_REQUEST['action'];
	$iCampaignId = $_POST['iCampaignId'];
	$Data = $_POST["Data"];
	$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);
	$Data['iSkillId']= implode(",",$_REQUEST['iSkillId']);
	
	$path = TPATH_SERVER_IMAGES_CAMPAIGN;
	
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
		$admId = $_SESSION['sess_iAdminId'];
		$memberId = $_SESSION['iUserId'];
		//$Data['iMemberId'] = $memberId;
		$Data['iAdminId'] =  $admId;
		$Data['dAddedDate'] = date('Y-m-d H:i:s');
		$cId = $obj->MySQLQueryPerform("post_campaign",$Data,'insert');
		
		if(!is_dir($path."/admin")){
			@mkdir($path."/admin", 0777);
		}
		if(!is_dir($path."/admin/".$admId)){
			@mkdir($path."/admin/".$admId, 0777);
		}
		
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/admin/".$admId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/admin/".$admId."/".$_FILES["vMp3File"]["name"]);
	
			if($mp3) { $Data['vMp3File'] = $_FILES["vMp3File"]["name"]; }
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/admin/".$admId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		
		$where = " iCampaignId = '".$cId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$Data,'update',$where);
		
		if($cId)$var_msg = "Campaign Posted Successfully.";else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action == "edit")
	{
		
		
		$iCampaignId = $_POST['iCampaignId'];
		$admId = $_SESSION['sess_iAdminId'];
		
		if(!is_dir($path."/admin")){
			@mkdir($path."/admin", 0777);
		}
		if(!is_dir($path."/admin/".$admId)){
			@mkdir($path."/admin/".$admId, 0777);
		}
	
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/admin/".$admId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/admin/".$admId."/".$_FILES["vMp3File"]["name"]);
			if($mp3)
			{
				$Data['vMp3File'] = $_FILES["vMp3File"]["name"];
			}
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/admin/".$admId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$Data,'update',$where);
		
		if($res)$var_msg = "Campaign is Updated Successfully.";else $var_msg="Eror-in Update.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action=="Active")
	{
	    $iCampaignId = $_REQUEST['iCampaignId'];
	    $totid = count($iCampaignId);
	    if(is_array($iCampaignId)){
		$iCampaignId  = @implode(",",$iCampaignId);
	    }
	    $data = array('eStatus'=>'Active');
	    $where = " iCampaignId IN (".$iCampaignId.")";
		$res = $obj->MySQLQueryPerform("post_campaign",$data,'update',$where);
		if($res)$var_msg = $totid." Record Activeted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action=="Inactive")
	{
		
	    $iCampaignId = $_REQUEST['iCampaignId'];
	    $totid = count($iCampaignId);
	    if(is_array($iCampaignId)){
		$iCampaignId  = @implode(",",$iCampaignId);
	    }
	    $data = array('eStatus'=>'Inactive');
	    $where = " iCampaignId IN (".$iCampaignId.")";
		$res = $obj->MySQLQueryPerform("post_campaign",$data,'update',$where);
		if($res)$var_msg = $totid." Record Inactiveted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	
	if($action == "Delete")
	{
		$iCampaignId = $_POST['iCampaignId'];
		$sql_sel = "select vImage,iAdminId from post_campaign where iCampaignId = '$iCampaignId'";
		$db_sel = $obj->MySQLSelect($sql_sel);
		$img = $db_sel[0]['vImage'];
		$adm = $db_sel[0]['iAdminId'];
		
		$sql="Delete from post_campaign where iCampaignId='".$iCampaignId."'"; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)
		{
			unlink($path."/admin/".$adm."/2_".$img);
			unlink($path."/admin/".$adm."/1_".$img);				
			unlink($path."/admin/".$adm."/".$img);		
			$var_msg = "Campaign is Deleted Successfully.";
		}
		else
		{
			$var_msg="Eror-in Delete.";
		}
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	
	
	if($action=="Deletes")
	{
	    $iCampaignId = $_REQUEST['iCampaignId'];
	    $totid = count($iCampaignId);
	    if(is_array($iCampaignId)){
		$iCampaignId  = @implode(",",$iCampaignId);
	    }
	    $where = " iCampaignId IN (".$iCampaignId.")";
		$sql="Delete from post_campaign where ".$where; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteImage")
	{	
		$admId = $_SESSION['sess_iAdminId'];
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vImage"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/admin/".$admId."/2_".$_POST['vOldImage']);
		unlink($path."/admin/".$admId."/1_".$_POST['vOldImage']);				
		unlink($path."/admin/".$admId."/".$_POST['vOldImage']);
		
		if($res){
			$var_msg = "Image is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Image Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteMp3")
	{	
		$admId = $_SESSION['sess_iAdminId'];
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vMp3File"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/admin/".$admId."/".$_POST['vOldMp3']);
		
		if($res){
			$var_msg = "Mp3 is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Mp3 Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteVideo")
	{	
		$admId = $_SESSION['sess_iAdminId'];
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vVideoFile"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/admin/".$admId."/".$_POST['vOldVideo']);
		
		if($res){
			$var_msg = "Video is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Video Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pc-postcampaign&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
	
?>