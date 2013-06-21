<?php
    $iMemberId = $_SESSION['iUserId'];
    $data['iMemberId'] = $iMemberId;
    $data['vFacebookName'] = $_REQUEST['name'];
    $data['vFacebookUserName'] = $_REQUEST['username'];
    $data['vFacebookAccessToken'] = $_REQUEST['accesstoken'];
    
    $sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
    $db_id = $obj->MySQLSelect($sql);
    
    if(count($db_id)){
        $where = " iMemberId = '".$iMemberId."'";
        $save_id = $obj->MySQLQueryPerform("member_social_network",$data,'update',$where);        
    }else{
        $save_id = $obj->MySQLQueryPerform("member_social_network",$data,'insert');
    }  
    echo $save_id;exit;
?>