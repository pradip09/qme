<?php

    $memId= $_SESSION['iUserId'];
  //  echo $memId;exit; 
    $data['vName'] = $_REQUEST['vName'];
    $data['vEmail'] = $_REQUEST['vEmailadd'];
    $data['tAbout'] = $_REQUEST['tAbout'];
    $data['eGender'] = $_REQUEST['eGender'];
    $data['vStudiedAt'] = $_REQUEST['vStudiedAt'];
    $data['vEducation'] = $_REQUEST['vEducation'];
    $data['vDegree'] = $_REQUEST['vDegree'];
    $data['vWorkedAt'] = $_REQUEST['vWorkedAt'];
    $data['vOccupation'] = $_REQUEST['vOccupation'];
    $data['vOtherInterest'] = $_REQUEST['vOtherInterest'];
    //$data['dAddedDate'] = date('Y-m-d H:i:s');
    list($m, $d, $y) = explode('-', $_REQUEST['dBirthdate']);
    $data['dBirthdate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
    $data['vOtherSkill'] = $_REQUEST['vOtherSkill'];
    $data['iCountryId'] = $_REQUEST['iCountryId'];
    $data['iStateId'] = $_REQUEST['iStateId'];
    $data['vCity'] = $_REQUEST['vCity'];
    $data['vAddress'] = $_REQUEST['vAddress'];
    $data['vZipCode'] = $_REQUEST['vZipCode'];
    //$data['flatitude'] = $_REQUEST['flatitude'];
    //$data['flongitude'] = $_REQUEST['flongitude'];
    $data['vPhone'] = $_REQUEST['vPhone'];
    $data['iInterestId'] = implode(",",$_POST['iInterestId']);
    $data['iSkillId'] = implode(",",$_POST['iSkillId']);
    
    $eMail = $_REQUEST['vEmailadd'];
    $sql="select * from members where vEmail= '".$eMail."' AND iMemberId !='".$memId."'";
    $row=$obj->MySQLSelect($sql);
   
    $sql="select * from members where iMemberId ='".$_SESSION['iUserId']."'";
    $member_data=$obj->MySQLSelect($sql);
    
    if($member_data[0]['iSkillId'] == '' AND $member_data[0]['iInterestId'] == '' AND $data['iInterestId'] != '' AND $data['iSkillId'] != '')
    {
	
	    $sql_points="select * from qme_earnpoints where iMemberId='".$member_data[0]['iMemberId']."'";
	    $points = $obj->MySQLSelect($sql_points);
	    $total_points = $points[0]['Total_earnpoints'] + 500;
	    
	    if($total_points == 500){
		//$sqql="INSERT INTO `qme_points`(`iMemberId`, `Total_points`) VALUES (".$member_data[0]['iMemberId'].",".$total_points.")";
		//$point_insert = $obj->sql_query($sqql);
		
		$point_update_sql = "UPDATE qme_earnpoints set Total_earnpoints='".$total_points."' where iMemberId='".$member_data[0]['iMemberId']."'";
		$point_update = $obj->sql_query($point_update_sql);
		
		$Activity['iMemberId']= $member_data[0]['iMemberId'];
		$Activity['eType']= 'Register';
		$Activity['iPoint']= $total_points;
		$Activity['tDescription']= $member_data[0]['vName']. ' registered successfully'; 
		$Activity['dAddedDate']= date('Y-m-d H:i:s');
		$idd = $obj->MySQLQueryPerform("points_activity",$Activity,'insert');    
	    
    }    

    }
   
    if(count($row) > 0){
        $var_msg="Email ID already exist";
    }else{
        $where = " iMemberId = '".$memId."'";
        $res = $obj->MySQLQueryPerform("members",$data,'update',$where);
	if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}

        $Recent['iMemberId'] = $memId;
	$Recent['eType'] = 'Member';
	$Recent['iTypeId'] = $memId;
	$Recent['vDescription'] = $_SESSION['Name'].' updated Personal information.';
	$Recent['dAddedDate'] = date('Y-m-d H:i:s');
	$Recent['eNameActivity'] ='';
	$res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');

        if($res){
            $var_msg="Personal information updated successfully";
        }else {
            $var_msg="Error in update";
        }
    }
    echo $var_msg;exit;
?>
