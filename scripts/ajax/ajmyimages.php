<?php
    $path = TPATH_SERVER_IMAGES_MEMBER;   
    $memberId = $_SESSION['iUserId'];
     $data['dAddedDate'] = date('Y-m-d H:i:s');
    if($_POST['vOperation'] == 'insert')
    {
        if(!is_dir($path."/".$memberId)){
            @mkdir($path."/".$memberId, 0777);
        }
        
        if ($_FILES['vProfileImage']['name'] != "") {
            $PARAM_ARRAY = array
            (
             "TARGET_DIR" =>$path."/".$memberId,
                    array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                    array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                    array('WIDTH_HEIGHT' => "84X84", 'PREFIX' => "2"),
                    array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3"),
		    array('WIDTH_HEIGHT' => "52X52", 'PREFIX' => "4"),
		    array('WIDTH_HEIGHT' => "154X154", 'PREFIX' => "5"),
		    array('WIDTH_HEIGHT' => "36X36", 'PREFIX' => "6"),
		    array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
            );
            $image=$generalobj->import($PARAM_ARRAY, $_FILES['vProfileImage']);
            if($image !=''){$Data['vProfileImage'] = $image; $_SESSION['vProfileImage'] = $image;}
        }
        $where = " iMemberId = ".$memberId;
        $res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        /*updated recent activity*/ 
        $Recent['iMemberId'] = $memberId;
	$Recent['eType'] = 'Member';
	$Recent['iTypeId'] = $memberId;
	$Recent['vImage'] = $Data['vProfileImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' Updated '.' Profile Image.';
	$Recent['dAddedDate'] = date('Y-m-d H:i:s');
	
	$res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        if($res){
            $var_msg="Profile Image Uploaded Successfully";
        }else {
            $var_msg="There is an Error in uploading image";
        }
        echo $var_msg; exit;        
    }
    elseif($_POST['vOperation'] == 'delete')
    {
        unlink($path."/".$memberId."/".$_POST['vOldProfileImage']);
        unlink($path."/".$memberId."/1_".$_POST['vOldProfileImage']);
        unlink($path."/".$memberId."/2_".$_POST['vOldProfileImage']);
        $Data['vProfileImage'] ='';
	$_SESSION['vProfileImage'] = '';
        $where = "iMemberId='".$memberId."'";
        $res = $obj->MySQLQueryPerform("members",$Data,'update',$where);
        if($res)
        {
            $var_msg = "Profile image Deleted Successfully";
        }
        else
        {
            $var_msg = "Errror in deleting Profile Image";
        }
        echo $var_msg; exit;
    }

?>