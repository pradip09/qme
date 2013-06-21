<?php
//echo "<pre>";
//print_r($_POST);exit;
    $data = array();
    $memId = $_SESSION['iUserId'];
    $data['iMemberId'] = $memId;   
    $iGeneralSettingId = $_POST['iGeneralSettingId'];
    $datee = date('Y-m-d');
    $Data['dAddedDate'] = date('Y-m-d H:i:s');
 
    
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
    $data['vLanguage'] = $_POST['vLanguage'];
    $data['eIsPrivatePublic'] = $_POST['eIsPrivatePublic'];
    $data['vQmePlatformColor'] = $_POST['vQmePlatformColor'];
    
    $sql_setting = "select * from general_setting where iMemberId = '".$memId."'";
    $db_gen_setting = $obj->MySQLSelect($sql_setting);
    //$db_gen_setting[0]['dAddedDate'] = date('Y-m-d', strtotime($db_gen_setting[0]['dAddedDate']));
   
    if(count($db_gen_setting)>0){	
        if($datee != $db_gen_setting[0]['dAddedDate']){

	    $Recent['iMemberId'] = $data['iMemberId'];
	    $Recent['eType'] = 'general_setting';
	    $Recent['iTypeId'] = $iGeneralSettingId;
	    $Recent['vDescription'] = $_SESSION['Name'].' updated General Setting.';
	    $Recent['dAddedDate'] = $Data['dAddedDate'];
	    $Recent['eNameActivity'] = '';
	    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
		
	}
	
	//echo $data['dAddedDate'];
	$data['dAddedDate'] = date('Y-m-d');
        $where = " iGeneralSettingId = '".$iGeneralSettingId."'";
        $res = $obj->MySQLQueryPerform("general_setting",$data,'update',$where);
	//echo $res;exit; 
    }
    else
    {
        $res = $obj->MySQLQueryPerform("general_setting",$data,'insert');
    }
   
    if($res){
        $var_msg = 'General Settings saved successfully';
    }
    else
    {
        $var_msg = "There is an error in saving settings ";
    }
    echo $var_msg; exit;
?>