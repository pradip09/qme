<?php

$ses_mem= $_SESSION['iUserId'];
$adminid=$_REQUEST['adminid'];
$imemerid=$_REQUEST['memid'];
$campid=$_REQUEST['campid'];
$points=$_REQUEST['points'];


$sql_name="select * from members where iMemberId='".$imemerid."'";
$db_name = $obj->MySQLSelect($sql_name);

if($imemerid != 0){
    $sql_points1="select * from qme_earnpoints where iMemberId='".$imemerid."'";
    $points1 = $obj->MySQLSelect($sql_points1);
    $total_points1 = $points1[0]['Total_earnpoints'] - $points;
    
    $Data1['Total_earnpoints']=$total_points1;
    $where = "iMemberId='".$imemerid."'";
    $res1 = $obj->MySQLQueryPerform("qme_earnpoints",$Data1,'update',$where);
    
    //$data['iMemberId']=$imemerid;
    $data['iCampaignId']=$campid;
    $data['dAddedDate']= date('Y-m-d H:i:s');
    $data['tDescription']='Your campaign accepted by one Member';
    $data['eType']='Campaign';
    $data['iPoint']=$points;
    $data['iPostmemId']=$imemerid;
    $id = $obj->MySQLQueryPerform("points_activity",$data,'insert');
}
if($ses_mem != 0){
    $sql_points2="select * from qme_earnpoints where iMemberId='".$ses_mem."'";
    $points2 = $obj->MySQLSelect($sql_points2);
    $total_points2= $points2[0]['Total_earnpoints'] + $points;
    
    $Data2['Total_earnpoints']=$total_points2;
    $where = "iMemberId='".$ses_mem."'";
    $res2 = $obj->MySQLQueryPerform("qme_earnpoints",$Data2,'update',$where);
    
    $data1['iMemberId']=$ses_mem;
    $data1['iCampaignId']=$campid;
    $data1['dAddedDate']= date('Y-m-d H:i:s');
    $data1['tDescription']='Accept campaign Successfully';
    $data1['eType']='Campaign';
    $data1['iPoint']=$points;
    //$data1['iPostmemId']=$imemerid;
    $id1= $obj->MySQLQueryPerform("points_activity",$data1,'insert');
}



if($adminid){
        $sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$campid."' and iMemberId='".$ses_mem."'";
        $db_res = $obj->MySQLSelect($sql_res);
if(count($db_res) != 0){
        $Data['iAccept']='1';
        $campid = $_REQUEST['campid'];
        $where = " iCampaignId = '".$campid."' and iMemberId='".$ses_mem."'";
        $res = $obj->MySQLQueryPerform("view_campaign",$Data,'update',$where);
}else{
        $Data['iMemberId']=$ses_mem;
        $Data['iAccept']='1';
        $Data['iCampaignId']=$campid;
        $res = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}else{
        $sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$campid."' and iMemberId='".$imemerid."'";
        $db_res = $obj->MySQLSelect($sql_res);
if(count($db_res) != 0){
        $Data['iAccept']='1';
        $campid = $_REQUEST['campid'];
        $where = " iCampaignId = '".$campid."' and iMemberId='".$imemerid."'";
        $res = $obj->MySQLQueryPerform("view_campaign",$Data,'update',$where);
}else{
        $Data['iMemberId']=$imemerid;
        $Data['iAccept']='1';
        $Data['iCampaignId']=$campid;
        $res = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}
if($res){
    $var_msg = "success/".$imemerid;
}
echo $var_msg;exit;

?>