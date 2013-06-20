<?php


/*echo"<pre>";
print_r($_FILES);
exit;*/


$action = $_REQUEST['action'];
$iMemberId = $_POST['iMemberId'];
$Data = $_POST["Data"];
$path = TPATH_SERVER_IMAGES_MEMBER;

    
    $iGeneralSettingId = $_POST['iGeneralSettingId'];    
    
    //$Data['dAddedDate'] = date('Y-m-d H:i:s');
    
    if($_POST['eShowEmail']){ $data['eShowEmail']= 'Yes'; } else { $data['eShowEmail']= 'No'; }
    if($_POST['eShowBusinessNumber']){ $data['eShowBusinessNumber']= 'Yes'; } else { $data['eShowBusinessNumber ']= 'No'; }
    if($_POST['eSupportBusiness']){ $data['eSupportBusiness']= 'Yes'; } else { $data['eSupportBusiness ']= 'No'; }
    if($_POST['eShowRelationshipStatus']){ $data['eShowRelationshipStatus']= 'Yes'; } else { $data['eShowRelationshipStatus']= 'No'; }
    if($_POST['eShowBusinessAddress']){ $data['eShowBusinessAddress']= 'Yes'; } else { $data['eShowBusinessAddress']= 'No'; }
    if($_POST['eHideOnlineStatus']){ $data['eHideOnlineStatus']= 'Yes'; } else { $data['eHideOnlineStatus']= 'No'; }
    
    if($_POST['eBizContact']){ $data['eBizContact']= 'Yes'; } else { $data['eBizContact']= 'No'; }
    if($_POST['eShowSkill']){ $data['eShowSkill']= 'Yes'; } else { $data['eShowSkill']= 'No'; }
    if($_POST['eShowIntrest']){ $data['eShowIntrest']= 'Yes'; } else { $data['eShowIntrest']= 'No'; }
    if($_POST['eShowOccupation']){ $data['eShowOccupation']= 'Yes'; } else { $data['eShowOccupation']= 'No'; }
    if($_POST['eShowStudiedat']){ $data['eShowStudiedat']= 'Yes'; } else { $data['eShowStudiedat']= 'No'; }
    if($_POST['eShowDegreein']){ $data['eShowDegreein']= 'Yes'; } else { $data['eShowDegreein']= 'No'; }
    if($_POST['eShareFavourite']){ $data['eShareFavourite']= 'Yes'; } else { $data['eShareFavourite']= 'No'; }
    
    if($Data['eNonProfit']){ $Data['eNonProfit']= 'Yes'; } else { $Data['eNonProfit']= 'No'; }
    if($Data['eChruch']){ $Data['eChruch']= 'Yes'; } else { $Data['eChruch']= 'No'; }
    if($Data['ePolitician']){ $Data['ePolitician']= 'Yes'; } else { $Data['ePolitician']= 'No'; }
    if($Data['eFundraiser']){ $Data['eFundraiser']= 'Yes'; } else { $Data['eFundraiser']= 'No'; }
    
    
    $data['vLanguage'] = $_POST['vLanguage'];
    $data['eIsPrivatePublic'] = $_POST['eIsPrivatePublic'];
    //echo "<pre>";
    //print_r($data);exit;
    
/*   
if($_POST['eDeleteProfileImage'] == '1'){
	$Data['eDeleteProfileImage'] = '1';
}else{
	$Data['eDeleteProfileImage'] = '0';
}


if($_POST['eDeleteBanner1'] == '1'){
	$Data['eDeleteBanner1'] = '1';
}else{
	$Data['eDeleteBanner1'] = '0';
}

if($_POST['eDeleteBanner2'] == '1'){
	$Data['eDeleteBanner2'] = '1';
}else{
	$Data['eDeleteBanner2'] = '0';
}

if($_POST['eDeleteBanner3'] == '1'){
	$Data['eDeleteBanner3'] = '1';
}else{
	$Data['eDeleteBanner3'] = '0';
}

if($_POST['eDeleteBanner4'] == '1'){
	$Data['eDeleteBanner4'] = '1';
}else{
	$Data['eDeleteBanner4'] = '0';
}

if($_POST['eDeleteBanner5'] == '1'){
	$Data['eDeleteBanner5'] = '1';
}else{
	$Data['eDeleteBanner5'] = '0';
}
*/



$dtype = $_POST['dtype'];

if($Data['iInterestId']){
	//echo "HIIII";
	$eIntereststr = implode(",",$Data['iInterestId']);
	$Data['iInterestId'] = $eIntereststr;	
}
if($Data['iSkillId']){
	//echo "HIIII";
	$eIntereststr1 = implode(",",$Data['iSkillId']);
	$Data['iSkillId'] = $eIntereststr1;	
}

list($m, $d, $y) = explode('-', $Data['dBirthdate']);
$Data['dBirthdate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));

if($action == "add")
{
	$mId = $obj->MySQLQueryPerform("members",$Data,'insert');
	$data['iMemberId'] = $mId;
	$gId = $obj->MySQLQueryPerform("general_setting",$data,'insert');
        
	if ($_FILES['vProfileImage']['name'] != "") {
		
	if(!is_dir($path."/".$mId)){
		@mkdir($path."/".$mId, 0777);
        }
	
	$PARAM_ARRAY = array
			(
			 "TARGET_DIR" =>$path."/".$mId,
				array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                                array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                                array('WIDTH_HEIGHT' => "84X84", 'PREFIX' => "2"),
                                array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3"),
                                array('WIDTH_HEIGHT' => "52X52", 'PREFIX' => "4"),
                                array('WIDTH_HEIGHT' => "154X154", 'PREFIX' => "5"),                                
                                array('WIDTH_HEIGHT' => "36X36", 'PREFIX' => "6")
			
			);

		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProfileImage']);
		
		if($image !=''){
		$Data['vProfileImage'] = $image;
		}
		
		//print_r($Data);exit;
		$where = " iMemberId = '".$mId."'";
		$res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
	}
	
	if(count($_FILES['gallery']['name'])  > 0){
		for($i=0;$i<count($_FILES['gallery']['name']);$i++){
			
			if(!is_dir($path."/".$mId."/banner/")){
				@mkdir($path."/".$mId."/banner/", 0777);
			}
			
			if($_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$mId."/banner/",
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "840X350", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "809X152", 'PREFIX' => "3")
					
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
			    //echo "<pre>";
			    //print_r($_FILES['gallery'][$i]);exit;
				$imagegal =$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				//echo "<pre>";
                                //print_r($_FILES['gallery'][$i]);exit;
				if($imagegal !=''){
					$Data_gal['vBannerImage'] = $imagegal;
				}
				$Data_gal['iMemberId'] = $mId;
                                
			/*echo "<pre>";
                        print_r($Data_gal);exit;*/
                        	$gal = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');	
			}
		}
	}
  
	if($mId)$var_msg = "Member is Registered Successfully.";else $var_msg="Eror-in Add.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "edit")
{
if ($_FILES['vProfileImage']['name'] != "") {
	if(!is_dir($path."/".$iMemberId)){
			@mkdir($path."/".$iMemberId, 0777);
		}
		$PARAM_ARRAY = array(
			"TARGET_DIR" =>$path."/".$iMemberId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                        array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                        array('WIDTH_HEIGHT' => "84X84", 'PREFIX' => "2"),
                        array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3"),
                        array('WIDTH_HEIGHT' => "52X52", 'PREFIX' => "4"),
                        array('WIDTH_HEIGHT' => "154X154", 'PREFIX' => "5"),                                
                        array('WIDTH_HEIGHT' => "36X36", 'PREFIX' => "6")
			
		 );
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vProfileImage']);
		if($image !=''){
		    $Data['vProfileImage'] = addslashes($image);
		    	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/".$_POST['vOldImage']);
                        unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/1_".$_POST['vOldImage']);
                        unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/2_".$_POST['vOldImage']);
                        unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/3_".$_POST['vOldImage']);
                        unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/4_".$_POST['vOldImage']);
		}
		
		
		
	}else{
		if($_POST['vOldImage'] != ""){
			$Data['vProfileImage'] = addslashes($_POST['vOldImage']);
		}
	}
	//echo "<pre>";
        //print_r($Data);exit;
        
	$iMemberId= $_POST['iMemberId'];
	$where = " iMemberId = '".$iMemberId."'";
	$res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
	$resg = $obj->MySQLQueryPerform("general_setting",$data,'update',$where);
        
	$sql_gal = "SELECT * FROM banner_image WHERE iMemberId='".$iMemberId."'";	
	$db_banner_gal = $obj->MySQLSelect($sql_gal);
	#echo "<pre>";
	#print_r($db_product_gal);exit;
	
	for($i=0;$i<count($db_banner_gal);$i++){
		
		if(!in_array($db_banner_gal[$i]['vBannerImage'],$_POST['vOldGall'])){
			//echo $db_product_gal[$i]['vBannerImage'];
			unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/1_".$db_banner_gal[$i]['vBannerImage']);				
			unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/".$db_banner_gal[$i]['vBannerImage']);
		}
		
	}
	
	$sql_gal="Delete from banner_image where ".$where; 
	$db_sql=$obj->sql_query($sql_gal);
	
	
	for($i=0;$i<$_POST['totcount'];$i++){
		
		if($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] !=''){
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$iMemberId."/banner/",
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "88X80", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "3")
					
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
			    //echo "<pre>";
			    //print_r($_FILES['gallery'][$i]);exit;
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/1_".$_POST['vOldGall'][$i]);				
				unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/".$_POST['vOldGall'][$i]);
				if($imagegal !=''){
					$Data_gal['vBannerImage'] = $imagegal;
				}
                                //echo "<pre>";
                                //print_r($Data_gal);exit;
				$Data_gal['iMemberId'] = $iMemberId;
				$gal = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] =='' && $_FILES['gallery']['name'][$i] !=''){
			if(!is_dir($path."/".$iMemberId."/banner/")){
				@mkdir($path."/".$iMemberId."/banner/", 0777);
			}					
			$PARAM_ARRAY = array
				(
				 "TARGET_DIR" =>$path."/".$iMemberId."/banner/",
					array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
					array('WIDTH_HEIGHT' => "88X80", 'PREFIX' => "1"),
					array('WIDTH_HEIGHT' => "248X247", 'PREFIX' => "3")
					
				 );
				 $_FILES['gallery'][$i] = array(
								"name"=>$_FILES['gallery']['name'][$i],
								"type"=>$_FILES['gallery']['type'][$i],
								"tmp_name"=>$_FILES['gallery']['tmp_name'][$i],
								"error"=>$_FILES['gallery']['error'][$i],
								"size"=>$_FILES['gallery']['size'][$i]
								);
				#echo "<pre>";
				#print_r($_FILES['gallery'][$i]);exit;
				$imagegal=$generalobj->import($PARAM_ARRAY, $_FILES['gallery'][$i]);
				#echo $imagegal;exit;
				if($imagegal !=''){
					$Data_gal['vBannerImage'] = $imagegal;
				}
				$Data_gal['iMemberId'] = $iMemberId;
				$gal = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
		}elseif($_POST['vOldGall'][$i] !='' && $_FILES['gallery']['name'][$i] ==''){			
			$Data_gal['vBannerImage'] = $_POST['vOldGall'][$i];
			$Data_gal['iMemberId'] = $iMemberId;
			$gal = $obj->MySQLQueryPerform("banner_image",$Data_gal,'insert');
		}
	}
	if($res)$var_msg = "Member is Modified Successfully."; else $var_msg="Eror-in Modification.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}
  


if($action=="Active")
{
    $iMemberId = $_REQUEST['iMemberId'];
    $totid = count($iMemberId);
    if(is_array($iMemberId)){
        $iMemberId  = @implode(",",$iMemberId);
    }
    $data = array('eStatus'=>'Active');
    $where = " iMemberId IN (".$iMemberId.")";
	$res = $obj->MySQLQueryPerform("members",$data,'update',$where);
	if($res)$var_msg = $totid."  Record Activated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}

if($action=="Inactive")
{
    $iMemberId = $_REQUEST['iMemberId'];
    $totid = count($iMemberId);
    if(is_array($iMemberId)){
        $iMemberId  = @implode(",",$iMemberId);
    }
    $data = array('eStatus'=>'Inactive');
    $where = " iMemberId IN (".$iMemberId.")";
	$res = $obj->MySQLQueryPerform("members",$data,'update',$where);
	if($res)$var_msg = $totid." Member Inactivated Successfully.";else $var_msg="Eror-in Activation.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}
if($action == "Delete")
{
	$iMemberId = $_POST['iMemberId'];
	$sql="Delete from members where iMemberId='".$iMemberId."'"; 
	$db_sql=$obj->sql_query($sql);
	if($db_sql)$var_msg = "Member is Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}
if($action=="Deletes")
{
	$iMemberId="";
	foreach ($_POST['iMemberId'] as $id) {
		$iMemberId = $iMemberId . $id .',';
	}
	
	$iMemberId = substr($iMemberId, 0, strlen($iMemberId)-1); 
	
	$where = " iMemberId IN (".$iMemberId.")";
	$sql="Delete from members where ".$where; 
	$db_sql=$obj->sql_query($sql);	
	if($db_sql)$var_msg = $totid." Member Deleted Successfully."; else $var_msg="Eror-in Delete.";
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=view&var_msg=$var_msg");
	exit;
}

if($action == "DeleteImage")
{	

	$iMemberId = $_POST['iMemberId'];
	$data_new = array("vProfileImage"=>'');	
	$where = " iMemberId = '".$iMemberId."'";
	$res = $obj->MySQLQueryPerform("members",$data_new,'update',$where);
	
	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/1_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/2_".$_POST['vOldImage']);	
	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/3_".$_POST['vOldImage']);
	unlink(TPATH_SERVER_IMAGES_MEMBER."/".$iMemberId."/4_".$_POST['vOldImage']);
	if($res){
		$var_msg = "Image is Deleted Successfully.";
	}else{
		$var_msg="Eror-in Image Delete.";
	}	
	header("Location: ".$tconfig["tpanel_url"]."/index.php?file=m-member&mode=edit&iMemberId=$iMemberId&var_msg=$var_msg");
	exit;
}

?>
