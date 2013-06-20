<?php
/*echo "<pre>";
print_r($_SERVER);
echo "<pre>";
print_r($_REQUEST);exit;*/
$action = $_REQUEST['action'];
$iCampaignId = $_POST['iCampaignId'];
$Data = $_POST["Data"];
$memberId = $_POST['iMemberId'];
$path = TPATH_SERVER_IMAGES_CAMPAIGN;
$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);
$Data['iSkillId']= implode(",",$_REQUEST['iSkillId']);
$Data['dAddedDate'] = date('Y-m-d H:i:s');
$str = $_SERVER['HTTP_REFERER'];
$mem= (explode("=",$str));
$mid=$mem[3];

//echo $mid;exit;
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

list($m, $d, $y) = explode('-', $Data['dStartDate']);
$Data['dStartDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
list($m, $d, $y) = explode('-', $Data['dFinishDate']);
$Data['dFinishDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));

$actionCamp = $_REQUEST['actionCamp'];
if($actionCamp){
	$action = $_REQUEST['actionCamp'];
	 }
	 
if($action == "add")
	{
		$Data['iMemberId'] = $memberId;
		
		$Data['dAddedDate'] = date('Y-m-d H:i:s');
	
		$cId = $obj->MySQLQueryPerform("post_campaign",$Data,'insert');
			
		if(!is_dir($path."/member")){
			@mkdir($path."/member", 0777);
		}
		if(!is_dir($path."/member/".$memberId)){
			@mkdir($path."/member/".$memberId, 0777);
		}
		
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/member/".$memberId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vMp3File"]["name"]);
	
			if($mp3) { $Data['vMp3File'] = $_FILES["vMp3File"]["name"]; }
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		
		$where = " iCampaignId = '".$cId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$Data,'update',$where);
	
	
		if($res)$var_msg = "Campaign Posted Successfully.";else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}
if($action == "edit")
	{
		
		if(!is_dir($path."/member")){
			@mkdir($path."/member", 0777);
		}
		if(!is_dir($path."/member/".$memberId)){
			@mkdir($path."/member/".$memberId, 0777);
		}
	
		if ($_FILES['vImage']['name'] != "") {
		$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/member/".$memberId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2")
				);
	
			$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
			if($image !=''){ $Data['vImage'] = $image; }
	
		}
		if ($_FILES['vMp3File']['name'] != "") {
			
			$mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vMp3File"]["name"]);
			if($mp3)
			{
				$Data['vMp3File'] = $_FILES["vMp3File"]["name"];
			}
		}
		if ($_FILES['vVideoFile']['name'] != "") {
			
			$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vVideoFile"]["name"]);
	
			if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
		}
		
		$iCampaignId = $_POST['iCampaignId'];
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$Data,'update',$where);
		if($res)$var_msg = "Posted Campaign is Updated Successfully.";else $var_msg="Eror-in Update.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=add&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
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
		if($res)$var_msg = $totid."Record Activeted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
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
		if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Inactive.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}
	if($action == "Delete")
	{
		$iCampaignId = $_POST['iCampaignId'];
		$sql="Delete from post_campaign where iCampaignId='".$iCampaignId."'"; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)$var_msg = "Campaign is Deleted Successfully.";else $var_msg="Eror-in Delete.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
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
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}

	if($action == "DeleteImage")
	{	
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vImage"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/member/".$memberId."/2_".$_POST['vOldImage']);
		unlink($path."/member/".$memberId."/1_".$_POST['vOldImage']);				
		unlink($path."/member/".$memberId."/".$_POST['vOldImage']);
		
		if($res){
			$var_msg = "Image is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Image Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iCampaignId=$iCampaignId&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}
	if($action == "DeleteMp3")
	{	
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vMp3File"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/member/".$memberId."/".$_POST['vOldMp3']);
		
		if($res){
			$var_msg = "Mp3 is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Mp3 Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iCampaignId=$iCampaignId&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}
	if($action == "DeleteVideo")
	{	
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vVideoFile"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("post_campaign",$data_new,'update',$where);
		
		unlink($path."/member/".$memberId."/".$_POST['vOldVideo']);
		
		if($res){
			$var_msg = "Video is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Video Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iCampaignId=$iCampaignId&iMemberId=$memberId&var_msg=$var_msg#tab-postcampaign");
		exit;
	}
	if($action=="Show all")
	{
			
		//$mId =$_REQUEST['iMemberId'];
		
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$mid#tab-postcampaign");
		exit;
	}

?>