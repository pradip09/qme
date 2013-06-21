<?php


//echo "<pre>";
//print_r($_REQUEST);exit;

//$id=$_REQUEST['id'];
$iMemberId = $_SESSION['iUserId'];
$dAddedDate = date('Y-m-d H:i:s');
$eType = $_REQUEST['eType'];
$vDescription=$_REQUEST['text'];
$Data = array(
        'iMemberId'=>$iMemberId,
        'vDescription'=>$vDescription,
        'dAddedDate'=>$dAddedDate,
	'eType'=> $eType
    );
$id = $obj->MySQLQueryPerform("status_update",$Data,'insert');


if($eType == 'Private')
	{
	/*$sql = "select * from members where iMemberId='".$_REQUEST['iMemberId']."'";
	$user = $obj->MySQLSelect($sql);*/
       
	$Recent['iMemberId'] = $_REQUEST['iMemberId'];
	$Recent['eType'] = 'status_update';
	$Recent['iTypeId'] = $id;
	$Recent['vDescription'] = $_SESSION['Name'].' send private message. <br/><b> Message </b>';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] = $Data['vDescription'];
	$Recent['iType'] = $eType;
	$Recent['iPostMemberId'] = $_SESSION['iUserId'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	
	$Recent2['iMemberId'] = $_SESSION['iUserId'];
	$Recent2['eType'] = 'status_update';
	$Recent2['iTypeId'] = $id;
	$Recent2['vDescription'] = $_SESSION['Name'].' send private message. <br/><b> Message </b>';
	$Recent2['dAddedDate'] = $Data['dAddedDate'];
	$Recent2['eNameActivity'] = $Data['vDescription'];
	$Recent2['iType'] = $eType;
	if($_REQUEST['iMemberId'] != $_SESSION['iUserId']){
	$id2 = $obj->MySQLQueryPerform("recent_activities",$Recent2,'insert');
	}
	}

if($id){
       $var_msg= 'success';
    }
    else{
        $var_msg = 'Error in Posting Private message';
    }
echo $var_msg;exit;


?>