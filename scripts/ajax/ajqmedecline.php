<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
$userid=$_SESSION['iUserId'];
$campid=$_REQUEST['campid'];
$adminid=$_REQUEST['adminid'];
$imemerid=$_REQUEST['memid'];

if($imemerid != 0){
   
    
    //$data['iMemberId']=$imemerid;
    $data['iCampaignId']=$campid;
    $data['dAddedDate']= date('Y-m-d H:i:s');
    $data['tDescription']='Your campaign Declined by one Member';
    $data['eType']='Campaign';
    $data['iPostmemId']=$imemerid;
    $id = $obj->MySQLQueryPerform("points_activity",$data,'insert');
}
if($userid != 0){
    
    $data1['iMemberId']=$userid;
    $data1['iCampaignId']=$campid;
    $data1['dAddedDate']= date('Y-m-d H:i:s');
    $data1['tDescription']='Decline campaign Successfully';
    $data1['eType']='Campaign';
    //$data1['iPostmemId']=$imemerid;
    $id1= $obj->MySQLQueryPerform("points_activity",$data1,'insert');
}
if($adminid != 0){
$sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$_REQUEST['campid']."' and iMemberId='".$userid."'";
$db_res = $obj->MySQLSelect($sql_res);



if(count($db_res) == 0){
   
    $Data['iMemberId']=$userid;
    $Data['iCampaignId']=$campid;
    $Data['dDecline']='1';
    $res = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');

}else{
    $Data['dDecline']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$userid."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$Data,'update',$where);
    }
}elseif($imemerid != 0){
    $sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$_REQUEST['campid']."' and iMemberId='".$imemerid."'";
    $db_res = $obj->MySQLSelect($sql_res);

if(count($db_res) == 0){
   
    $Data['iMemberId']=$imemerid;
    $Data['iCampaignId']=$campid;
    $Data['dDecline']='1';
    $res = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');

}else{
    $Data['dDecline']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$imemerid."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$Data,'update',$where);
    }
}

if($res){
    $var_msg = "success/".$imemerid;
}
    echo $var_msg;exit;
    
?>