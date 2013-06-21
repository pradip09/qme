<?php
   
    $path = TPATH_SERVER_IMAGES_EVENT;
    $memberId= $_SESSION['iUserId']; 
    $iEventId = $_REQUEST['iEventId'];
    $data['vTitle'] = $_REQUEST['vTitle'];
    $data['vLocation'] = $_REQUEST['vLocation'];
    $data['dEventDate'] = $_REQUEST['dEventDate'];
    $data['eHideEvent'] = $_REQUEST['eHideEvent'];
    $data['vDescription'] = addslashes($_REQUEST['vDescription']);
    $data['iTicketLimit'] = $_REQUEST['iTicketLimit'];
    $data['vPrice'] = $_REQUEST['vPrice'];
    $data['iSalesLimit'] = $_REQUEST['iSalesLimit'];
    $data['vItemDescription'] = $_REQUEST['vItemDescription'];
    $data['eCreateAsTicket'] = $_REQUEST['eCreateAsTicket'];
    $data['eHideVaultEntry'] = $_REQUEST['eHideVaultEntry'];
    
    $data['vOtherSkill'] = $_REQUEST['vOtherSkill'];
    $data['vOtherInterest'] = $_REQUEST['vOtherInterest'];
    $data['iMemberId'] = $memberId;
    $data['dAddedDate'] = date('Y-m-d H:i:s');
    list($m, $d, $y) = explode('-', $_REQUEST['dEventDate']);
    $data['dEventDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
    
    
    $data['iInterestId'] = implode(",",$_POST['iInterestId']);
    $data['iSkillId'] = implode(",",$_POST['iSkillId']);
    
    if($_POST['vOperation'] == 'insert')
    {
        if(!is_dir($path."/".$memberId)){
            @mkdir($path."/".$memberId, 0777);
        }  
        if ($_FILES['vEventImage']['name'] != "") {
            $PARAM_ARRAY = array
            (
             "TARGET_DIR" =>$path."/".$memberId,
                    array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                    array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7"),
                    array('WIDTH_HEIGHT' => "120X120", 'PREFIX' => "1")
            );
            $image=$generalobj->import($PARAM_ARRAY, $_FILES['vEventImage']);
            if($image !=''){$data['vEventImage'] = $image; }
        }
       
        $where = " iMemberId = '".$memberId."'";
        $res = $obj->MySQLQueryPerform("events",$data,'insert');
	$newId = $res;
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
         $Recent['iMemberId'] = $data['iMemberId'];
	$Recent['eType'] = 'Event';
	$Recent['iTypeId'] = $res;
	$Recent['vImage'] = $data['vEventImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' added new event .';
	$Recent['dAddedDate'] = $data['dAddedDate'];
	$Recent['eNameActivity'] =$data['vTitle'];
        $res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        if($res){
        $var_msg="Event Added Successfully";
	
	//Twitter Status Update Start
	$twUploadType = 'EVENT';
	$twEventId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
	
	//Facebook Status Update Start
	$fbUploadType = 'EVENT';
	$fbEventId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
	//Facebook Status Update End
	    
	    
	    
        }else {
            $var_msg="There is an Error in Added Record";
        }
        //echo $var_msg; exit;        
    }
    elseif($_POST['vOperation'] == 'update')
    {
        if(!is_dir($path."/".$memberId)){
            @mkdir($path."/".$memberId, 0777);
        }  
        if ($_FILES['vEventImage']['name'] != "") {
            $PARAM_ARRAY = array
            (
             "TARGET_DIR" =>$path."/".$memberId,
                    array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                    //array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                    array('WIDTH_HEIGHT' => "120X120", 'PREFIX' => "1")
            );
            $image=$generalobj->import($PARAM_ARRAY, $_FILES['vEventImage']);
            if($image !=''){$data['vEventImage'] = $image; }
        }
       $iEventId = $_REQUEST['iEventId'];
        $where = " iEventId = '".$iEventId."'";
        $res = $obj->MySQLQueryPerform("events",$data,'update',$where);
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $data['iMemberId'];
	$Recent['eType'] = 'Event';
	$Recent['iTypeId'] = $iEventId;
	if($data['vEventImage'] != ''){
	    $Recent['vImage'] = $data['vEventImage'];
	}else{
	    $Recent['vImage'] = $_REQUEST['vOldImage'];
	}
	
	$Recent['vDescription'] = $_SESSION['Name'].' updated event.';
	$Recent['dAddedDate'] = $data['dAddedDate'];
	$Recent['eNameActivity'] =$data['vTitle'];
	$res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
        if($res){
            $var_msg="Event Updated Successfully";
        }else {
            $var_msg="There is an Error in updated Record";
        }
       // echo $var_msg; exit;        
    }
    elseif($_POST['vOperation'] == 'delete')
    {
        unlink($path."/".$memberId."/".$_POST['vOldProfileImage']);
        unlink($path."/".$memberId."/1_".$_POST['vOldProfileImage']);
        unlink($path."/".$memberId."/2_".$_POST['vOldProfileImage']);
        $Data['vEventImage'] ='';
        $where = "iMemberId='".$memberId."'";
        $res = $obj->MySQLQueryPerform("events",$Data,'update',$where);
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $data['iMemberId'];
	$Recent['eType'] = 'Event';
	$Recent['iTypeId'] = $iEventId;
	$Recent['vDescription'] = $_SESSION['Name'].' Deleted event album.';
	$Recent['dAddedDate'] = $data['dAddedDate'];
	$Recent['eNameActivity'] =$data['vTitle'];
	$res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
        if($res)
        {
            $var_msg = "Profile image Deleted Successfully";
        }
        else
        {
            $var_msg = "Errror in deleting Profile Image";
        }
	
        
    }
     echo $var_msg; exit;
     //header('Location:'.$site_url.'/myevent');
     
     
?>