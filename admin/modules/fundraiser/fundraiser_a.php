<?php
 

	$action = $_REQUEST['action'];	
	$iCampaignId = $_POST['iCampaignId'];
	$Data = $_POST["Data"];
	$data = $_POST['data'];	
	$path = TPATH_SERVER_IMAGES_FUNDRAISER_CAMPAIGN;
 
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
	if($_POST['iInterestId']){
	$eIntereststr = implode(",",$_POST['iInterestId']);
	$Data['iInterestId'] = $eIntereststr;
        }
        if($_POST['iIndustryId']){
	$eSinglestr = implode(",",$_POST['iIndustryId']);
	$Data['iIndustryId'] = $eSinglestr;
        }
	 
	if($action == "add")
	{
		
	
		$memberId =$Data['iMemberId'];
		$Data['dAddedDate'] = date('Y-m-d H:i:s');		   
		$cId = $obj->MySQLQueryPerform("fundraiser_campaign",$Data,'insert');
		
		
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
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$Data,'update',$where);
		
			
		if(count($data)+1 > 0){
		       for($x = 0 ; $x < $_POST['totcount'] ; $x++){			
			if($_FILES['Image']['name'][$x] !=''){
				      
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/member/'.$memberId,				 

					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                                        array('WIDTH_HEIGHT' => "200X267", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "170X176", 'PREFIX' => "2")					
				 );
				 $_FILES['Image'][$x] = array(
								"name"=>$_FILES['Image']['name'][$x],
								"type"=>$_FILES['Image']['type'][$x],
								"tmp_name"=>$_FILES['Image']['tmp_name'][$x],
								"error"=>$_FILES['Image']['error'][$x],
								"size"=>$_FILES['Image']['size'][$x]
								);
				 
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['Image'][$x]);
				if($imagegal !=''){
					$Pro['Image'] = $imagegal;
				}
				
				$Pro['vItemName'] = $data['vItemName'][$x];
			        $Pro['tDescription'] = $data['tDescription'][$x];
				$Pro['vPNotification'] = $data['vPNotification'][$x];
				$Pro['vMarkNotification'] = $data['vMarkNotification'][$x];
				$Pro['vNotification1'] = $data['vNotification1'][$x];
				$Pro['vNotification2'] = $data['vNotification2'][$x];
				$Pro['vNotification3'] = $data['vNotification3'][$x];
				$Pro['vQualify'] = $data['vQualify'][$x];
				$Pro['vQualifyall'] = $data['vQualifyall'][$x];
				$Pro['iPontsWhenBuy'] = $data['iPontsWhenBuy'][$x];
				$Pro['iMemberId'] = $memberId;						 
				$Pro['iCampaignId'] = $cId;
			
			$Id = $obj->MySQLQueryPerform("compaign_item",$Pro,'insert');
						
			}
			}
		}
	if($cId )$var_msg = " Campaign Posted Successfully.";else $var_msg="Eror-in Add.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
		exit;
		}
		
		
		
	if($action == "edit")
	{
		
		$memberId = $Data['iMemberId'];
		$iCampaignId = $_POST['iCampaignId'];		
		
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
		
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$Data,'update',$where);
		
		
		$sql_int = "select * from compaign_item WHERE iCampaignId='".$iCampaignId."'ORDER BY  iItemId";
                $db_compaignitem = $obj->MySQLSelect($sql_int);		
		
		$sql_gal="Delete from compaign_item where ".$where; 
		$db_sql=$obj->sql_query($sql_gal);
		
		
	
		if(count($data)+1 > 0){			
		       for($x = 0 ; $x < $_POST['totcount'] ; $x++){			
			if($_POST['vOldGall'][$x] !='' && $_FILES['Image']['name'][$x] !=''){
				
				$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/member/'.$memberId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "2")
				 );
				$_FILES['Image'][$x] = array(
								"name"=>$_FILES['Image']['name'][$x],
								"type"=>$_FILES['Image']['type'][$x],
								"tmp_name"=>$_FILES['Image']['tmp_name'][$x],
								"error"=>$_FILES['Image']['error'][$x],
								"size"=>$_FILES['Image']['size'][$x]
								);
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['Image'][$x]);
								
				unlink(TPATH_SERVER_IMAGES_FUNDRAISER_CAMPAIGN.'/member/'.$memberId."/1_".$_POST['vOldGall'][$x]);				
				unlink(TPATH_SERVER_IMAGES_FUNDRAISER_CAMPAIGN.'/member/'.$memberId."/".$_POST['vOldGall'][$x]);
				if($imagegal !=''){
				$Pro['Image'] = $imagegal;				
				}
				//$Idd = $obj->MySQLQueryPerform("compaign_item",$Pro,'insert');
			}
			elseif($_POST['vOldGall'][$x] =='' && $_FILES['Image']['name'][$x] !=''){
			if(!is_dir($path.'/member/'.$memberId)){
				@mkdir($path.'/member/'.$memberId, 0777);
		        }
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path.'/member/'.$memberId,
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "2")
				 );
			 $_FILES['Image'][$x] = array(
								"name"=>$_FILES['Image']['name'][$x],
								"type"=>$_FILES['Image']['type'][$x],
								"tmp_name"=>$_FILES['Image']['tmp_name'][$x],
								"error"=>$_FILES['Image']['error'][$x],
								"size"=>$_FILES['Image']['size'][$x]
								);
			   $imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['Image'][$x]);
			   if($imagegal !=''){
				$Pro['Image'] = $imagegal;
				}
				//$Idd = $obj->MySQLQueryPerform("compaign_item",$Pro,'insert');
			}
			elseif($_POST['vOldGall'][$x] !='' && $_FILES['Image']['name'][$x] ==''){			
				$Pro['Image'] = $_POST['vOldGall'][$x];
			}
			//$Pro['Image'] = $Pro['Image'];
			        $Pro['vItemName'] = $data['vItemName'][$x];
			        $Pro['tDescription'] = $data['tDescription'][$x];
				$Pro['vPNotification'] = $data['vPNotification'][$x];
				$Pro['vMarkNotification'] = $data['vMarkNotification'][$x];
				$Pro['vNotification1'] = $data['vNotification1'][$x];
				$Pro['vNotification2'] = $data['vNotification2'][$x];
				$Pro['vNotification3'] = $data['vNotification3'][$x];
				$Pro['vQualify'] = $data['vQualify'][$x];
				$Pro['vQualifyall'] = $data['vQualifyall'][$x];
				$Pro['iPontsWhenBuy'] = $data['iPontsWhenBuy'][$x];				
				$Pro['iMemberId'] = $memberId;
				$Pro['iCampaignId'] = $iCampaignId;				
			
			$Idd = $obj->MySQLQueryPerform("compaign_item",$Pro,'insert');
		       
		       }
		}
	
		if($res)$var_msg = " Campaign is Updated Successfully.";else $var_msg="Eror-in Update.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
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
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$data,'update',$where);	 	   
		if($res)$var_msg = $totid." Record Activeted Successfully.";else $var_msg="Eror-in Active.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action=="Inactive")
        {
	  
          $iCampaignId = $_REQUEST['iCampaignId'];
           $totid = count($iCampaignId);
           if(is_array($iCampaignId )){
           $iCampaignId  = @implode(",",$iCampaignId);
        }
           $data = array('eStatus'=>'Inactive');      
         
           $where = " iCampaignId IN (".$iCampaignId.")";
	   $res = $obj->MySQLQueryPerform("fundraiser_campaign",$data,'update',$where);	   
	   if($res)$var_msg = $totid." Record Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	   header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
	   exit;
        }
	if($action == "Delete")
	{
		
		
		$iCampaignId = $_POST['iCampaignId'];
		
		$sql_sel = "select vImage,iMemberId from fundraiser_campaign where iCampaignId = '$iCampaignId'";
		$db_sel = $obj->MySQLSelect($sql_sel);
		$img = $db_sel[0]['vImage'];
		$adm = $db_sel[0]['iMemberId'];
		
		$sql="Delete from fundraiser_campaign where iCampaignId='".$iCampaignId."'"; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)
		{
			unlink($path."/member/".$adm."/2_".$img);
			unlink($path."/member/".$adm."/1_".$img);				
			unlink($path."/member/".$adm."/".$img);		
			$var_msg = " Campaign is Deleted Successfully.";
		}
		else
		{
			$var_msg="Eror-in Delete.";
		}
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
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
		$sql="Delete from fundraiser_campaign where ".$where; 
		$db_sql=$obj->sql_query($sql);	
		if($db_sql)$var_msg = $totid." Record Deleted Successfully.";else $var_msg="Eror-in Delete.";
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=view&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteImage")
	{	
		$memberId = $Data['iMemberId'];
		//echo $memberId;exit;
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vImage"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$data_new,'update',$where);
		
		unlink($path."/C/".$memberId."/2_".$_POST['vOldImage']);
		unlink($path."/member/".$memberId."/1_".$_POST['vOldImage']);				
		unlink($path."/member/".$memberId."/".$_POST['vOldImage']);
		
		if($res){
			$var_msg = "Image is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Image Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteMp3")
	{	
		$memberId = $Data['iMemberId'];
		
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vMp3File"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$data_new,'update',$where);
		
		unlink($path."/member/".$memberId."/".$_POST['vOldMp3']);
		
		if($res){
			$var_msg = "Mp3 is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Mp3 Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
	if($action == "DeleteVideo")
	{	
		$memberId = $Data['iMemberId'];
		//echo $memberId;exit;
		$iCampaignId = $_POST['iCampaignId'];
		$data_new = array("vVideoFile"=>'');
		$where = " iCampaignId = '".$iCampaignId."'";
		$res = $obj->MySQLQueryPerform("fundraiser_campaign",$data_new,'update',$where);
		
		unlink($path."/member/".$memberId."/".$_POST['vOldVideo']);
		
		if($res){
			$var_msg = "Video is Deleted Successfully.";
		}else{
			$var_msg="Eror-in Video Delete.";
		}	
		header("Location: ".$tconfig["tpanel_url"]."/index.php?file=fu-fundraiser&mode=edit&iCampaignId=$iCampaignId&var_msg=$var_msg");
		exit;
	}
?>
