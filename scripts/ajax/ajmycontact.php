<?php

    $memberId = $_SESSION['iUserId'];
    $data = array();
    $data['vBizName'] = $_POST['vBizName'];
    $data['vBizAddress'] = $_POST['vBizAddress'];
    $data['vBizPhone'] = $_POST['vBizPhone'];
    $data['vBizEmail'] = $_POST['vBizEmail'];
    $data['vBizCity'] = $_POST['vBizCity'];
    $data['iBizCountryId'] = $_POST['iBizCountryId'];
    $data['iBizStateId'] = $_POST['iBizStateId'];
    $data['vWebsite1'] = $_REQUEST['vWebsite1'];
    $data['vWebsite2'] = $_REQUEST['vWebsite2'];
    $data['vWebsite3'] = $_REQUEST['vWebsite3'];
    $Data['dAddedDate'] = date('Y-m-d H:i:s');
    if($_POST['eNonProfit']){ $data['eNonProfit']= 'Yes'; } else { $data['eNonProfit']= 'No'; }
    if($_POST['eChruch']){ $data['eChruch']= 'Yes'; } else { $data['eChruch']= 'No'; }
    if($_POST['ePolitician']){ $data['ePolitician']= 'Yes'; } else { $data['ePolitician']= 'No'; }
    if($_POST['eFundraiser']){ $data['eFundraiser']= 'Yes'; } else { $data['eFundraiser']= 'No'; }
    $where = " iMemberId = '".$memberId."'";
    $res = $obj->MySQLQueryPerform("members",$data,'update',$where);
    if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
    $Recent['iMemberId'] = $memberId;
	$Recent['eType'] = 'Member';
	$Recent['iTypeId'] = $memberId;
	$Recent['vDescription'] = $_SESSION['Name'].' Updated '.' Biz Contact.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	
	$res = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    if($res){
        $var_msg="Contact Information Updated Successfully";
    }
    else {
        $var_msg="There is an Error in Updating image";
    }
    echo $var_msg; exit; 
?>