<?php

$ses_mem = $_SESSION['iUserId'];
$imemerid=$_REQUEST['memid'];
 
$campid=$_REQUEST['campid'];
$points=$_REQUEST['points'];
$type=$_REQUEST['type'];
$adminid=$_REQUEST['adminid'];


$sql_name="select * from members where iMemberId='".$imemerid."'";
$db_name = $obj->MySQLSelect($sql_name);

/*$sql_namee="select * from members where iMemberId='".$ses_mem."'";
$db_name_ses = $obj->MySQLSelect($sql_namee);*/

if($imemerid != 0){
    $sql_points1="select * from qme_earnpoints where iMemberId='".$imemerid."'";
    $points1 = $obj->MySQLSelect($sql_points1);
    $total_points1 = $points1[0]['Total_earnpoints'] - $points;
    
    $Data1['Total_earnpoints']=$total_points1;
    $where = "iMemberId='".$imemerid."'";
    $res1 = $obj->MySQLQueryPerform("qme_earnpoints",$Data1,'update',$where);
}
if($ses_mem != 0){
    $sql_points2="select * from qme_earnpoints where iMemberId='".$ses_mem."'";
    $points2 = $obj->MySQLSelect($sql_points2);
    $total_points2= $points2[0]['Total_earnpoints'] + $points;
    
    $Data2['Total_earnpoints']=$total_points2;
    $where = "iMemberId='".$ses_mem."'";
    $res2 = $obj->MySQLQueryPerform("qme_earnpoints",$Data2,'update',$where);
}

if($type == 'video'){

//$data['iMemberId']=$imemerid;
$data['iCampaignId']=$campid;
$data['dAddedDate']= date('Y-m-d H:i:s');
$data['tDescription']='video gallary viewed by one member';
$data['eType']='Campaign';
$data['iPoint']=$points;
$data['iPostmemId']=$imemerid;
$id = $obj->MySQLQueryPerform("points_activity",$data,'insert');

$data1['iMemberId']=$ses_mem;
$data1['iCampaignId']=$campid;
$data1['dAddedDate']= date('Y-m-d H:i:s');
$data1['tDescription']='viewed video gallary';
$data1['eType']='Campaign';
$data1['iPoint']=$points;
//$data1['iPostmemId']=$imemerid;
$id1= $obj->MySQLQueryPerform("points_activity",$data1,'insert');

}
if($type == 'radio'){
 
//$data2['iMemberId']=$imemerid;
$data2['iCampaignId']=$campid;
$data2['dAddedDate']= date('Y-m-d H:i:s');
$data2['tDescription']='radio gallary listened by one member';
$data2['eType']='Campaign';
$data2['iPoint']=$points;
$data2['iPostmemId']=$imemerid;
//$data2['iPoint']=$total_points1;
$id2 = $obj->MySQLQueryPerform("points_activity",$data2,'insert');

$data3['iMemberId']=$ses_mem;
$data3['iCampaignId']=$campid;
$data3['dAddedDate']= date('Y-m-d H:i:s');
$data3['tDescription']='listened radio gallary';
$data3['eType']='Campaign';
//$data3['iPoint']=$total_points2;
$data3['iPoint']=$points;
//$data3['iPostmemId']=$imemerid;
$id3 = $obj->MySQLQueryPerform("points_activity",$data3,'insert'); 
   
}

if($type == 'Url'){
   
//$data5['iMemberId']=$imemerid;
$data5['iCampaignId']=$campid;
$data5['dAddedDate']= date('Y-m-d H:i:s');
$data5['tDescription']='website visited by one member';
$data5['eType']='Campaign';
//$data5['iPoint']=$total_points1;
$data5['iPoint']=$points;
$data5['iPostmemId']=$imemerid;
$id5 = $obj->MySQLQueryPerform("points_activity",$data5,'insert');

$data6['iMemberId']=$ses_mem;
$data6['iCampaignId']=$campid;
$data6['dAddedDate']= date('Y-m-d H:i:s');
$data6['tDescription']='visited website';
$data6['eType']='Campaign';
//$data6['iPoint']=$total_points2;
$data6['iPoint']=$points;
//$data6['iPostmemId']=$imemerid;
$idd = $obj->MySQLQueryPerform("points_activity",$data6,'insert'); 
    
}

if($adminid != 0){

$sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$campid."' and iMemberId='".$ses_mem."'";
$db_res = $obj->MySQLSelect($sql_res);

if($type == 'video'){
if($type == 'video' && count($db_res) != 0){
  
    $data12['iViewCommerical']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$ses_mem."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
}else{
    $Data['iMemberId']= $ses_mem;
    $Data['iViewCommerical']='1';
    $Data['iCampaignId']=$campid;
    $id1= $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}
if($type == 'radio'){
if($type == 'radio' && count($db_res) != 0){
     $data12['iRadioAdd']='1';
     $campid = $_REQUEST['campid'];
     $where = " iCampaignId = '".$campid."' and iMemberId='".$ses_mem."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
}else{
    $Data['iMemberId']= $ses_mem;
    $Data['iRadioAdd']='1';
    $Data['iCampaignId']=$campid;
    $id1 = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}
if($type == 'Url'){
if($type == 'Url' && count($db_res) != 0){
    $data12['iViewWebsite']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$ses_mem."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
}else{
    $Data['iMemberId']= $ses_mem;
    $Data['iViewWebsite']='1';
    $Data['iCampaignId']=$campid;
    $id1 = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
    }
}
elseif($imemerid != 0){
    
    $sql_res = "SELECT * FROM view_campaign WHERE iCampaignId='".$campid."' and iMemberId='".$imemerid."'";
    $db_res = $obj->MySQLSelect($sql_res);

if($type == 'video'){
if($type == 'video' && count($db_res) != 0){
  
    $data12['iViewCommerical']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$imemerid."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
}else{
    
    $Data['iMemberId']= $imemerid;
    $Data['iViewCommerical']='1';
    $Data['iCampaignId']=$campid;
    $id1= $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}
if($type == 'radio'){
if($type == 'radio' && count($db_res) != 0){
     $data12['iRadioAdd']='1';
     $campid = $_REQUEST['campid'];
     $where = " iCampaignId = '".$campid."' and iMemberId='".$imemerid."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
}else{
    $Data['iMemberId']= $imemerid;
    $Data['iRadioAdd']='1';
    $Data['iCampaignId']=$campid;
    $id1 = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
}
if($type == 'Url'){
if($type == 'Url' && count($db_res) != 0){
    $data12['iViewWebsite']='1';
    $campid = $_REQUEST['campid'];
    $where = " iCampaignId = '".$campid."' and iMemberId='".$imemerid."'";
    $res = $obj->MySQLQueryPerform("view_campaign",$data12,'update',$where);
    
}else{
    $Data['iMemberId']= $imemerid;
    $Data['iViewWebsite']='1';
    $Data['iCampaignId']=$campid;
    $id1 = $obj->MySQLQueryPerform("view_campaign",$Data,'insert');
    }
    } 
    
}
echo $type.'/'.$imemerid;exit;


?>
