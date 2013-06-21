<?php

include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$user_id = $_REQUEST['iMemberId'];
$status = $_REQUEST['status'];
$requestId=$_REQUEST['iRequestId'];

if($status == 'Approve'){
    
    $Date = date('Y-m-d H:i:s');
    $ssql1 = "UPDATE qme_friend set eStatus ='Approve' , dApproveDate = '".$Date."' where iMemberId='".$_SESSION['iUserId']."' AND iFriendId = '".$user_id."'";
    $db_update = $obj->MySQLSelect($ssql1);
    $ssql2 = "UPDATE qme_friend set eStatus ='Approve' , dApproveDate = '".$Date."' where iMemberId='".$user_id."' AND iFriendId = '".$_SESSION['iUserId']."'";
    $db_update = $obj->MySQLSelect($ssql2);
    $newId = $requestId;
    
    //Facebook Status Update Start
    $fbUploadType = 'FRIENDREQUEST';
    $fbUploadId = $newId;
    include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
    //Facebook Status Update End
    
    $ssql3 = "select * from qme_friend as qf LEFT JOIN members AS m ON(m.iMemberId = qf.iMemberId) where qf.iMemberId='".$user_id."' AND qf.iFriendId = '".$_SESSION['iUserId']."'";
    $update = $obj->MySQLSelect($ssql3);
    
    $Recent['iMemberId'] = $_SESSION['iUserId'];
    $Recent['eType'] = 'approve_friend_request';
    $Recent['iTypeId'] = $update[0]['iFriendRequestId'];
    $Recent['vImage'] = $update[0]['iMemberId']."/"."3_".$update[0]['vProfileImage'];
    $Recent['vDescription'] = $_SESSION['Name'].' is now friends with <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$update[0]['vMemberUrl'].'">'.$update[0]['vName'].'</a>.';
    $Recent['dAddedDate'] = $Date;
    $Recent['eNameActivity'] = '';
    
    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    
    $Recent1['iMemberId'] = $user_id;
    $Recent1['eType'] = 'approve_friend_request';
    $Recent1['iTypeId'] = $update[0]['iFriendRequestId'];
    $Recent1['vImage'] = $_SESSION['iUserId']."/"."3_".$_SESSION['vProfileImage'];
    $Recent1['vDescription'] = $update[0]['vName'].' is now friends with <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$_SESSION['vMemberUrl'].'">'.$_SESSION['Name'].'</a>.';
    $Recent1['dAddedDate'] = $Date;
    $Recent1['eNameActivity'] = '';
    
    $id2 = $obj->MySQLQueryPerform("recent_activities",$Recent1,'insert');
    
    $ssql = "select * from members where iMemberId ='".$_SESSION['iUserId']."'";
    $db_user_sender = $obj->MySQLSelect($ssql);
    $ssql12 = "select * from members where iMemberId ='".$user_id."'";
    $db_user = $obj->MySQLSelect($ssql12);
    $UserName = $db_user[0]['vName'];
    $Email = $db_user[0]['vEmail'];
    $Veryfy_Link = $site_url.'/'.$db_user_sender[0]['vMemberUrl'];
    $Sender_name = $db_user_sender[0]['vName'];
    $body_arr = Array("#NAME#","#SITE_NAME#","#SENDER_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#VERIFY_LINK#");
    $post_arr = Array($UserName,$SITE_NAME,$Sender_name,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$Veryfy_Link);                
    $mailObj->Send("MEMBER_ACCEPT_FRNDREQUEST","Administrator",$Email,$body_arr,$post_arr);    
    echo "success";exit;
}
else if($status == 'Cancel'){
    $ssql3 = "Delete from qme_friend where iMemberId='".$_SESSION['iUserId']."' AND iFriendId = '".$user_id."'";
    $db_delete = $obj->MySQLSelect($ssql3);
    $ssql4 = "Delete from qme_friend where iMemberId='".$user_id."' AND iFriendId = '".$_SESSION['iUserId']."'";
    $db_delete = $obj->MySQLSelect($ssql4);
    echo "decline";exit;
}else if($status == 'Blocked'){
    
    $ssql4 = "UPDATE qme_friend set eStatus ='Blocked' where iMemberId='".$_SESSION['iUserId']."' AND iFriendId = '".$user_id."'";
    $db_update = $obj->MySQLSelect($ssql4);
    $ssql5 = "UPDATE qme_friend set eStatus ='Blocked' where iMemberId='".$user_id."' AND iFriendId = '".$_SESSION['iUserId']."'";
    $db_update = $obj->MySQLSelect($ssql5);
    echo "blocked";exit;
}else if($status == 'Unblock'){
    
    $Date = date('Y-m-d H:i:s');
    $ssql4 = "UPDATE qme_friend set eStatus ='Approve', dApproveDate = '".$Date."' where iMemberId='".$_SESSION['iUserId']."' AND iFriendId = '".$user_id."'";
    $db_update = $obj->MySQLSelect($ssql4);
    $ssql5 = "UPDATE qme_friend set eStatus ='Approve', dApproveDate = '".$Date."' where iMemberId='".$user_id."' AND iFriendId = '".$_SESSION['iUserId']."'";
    $db_update = $obj->MySQLSelect($ssql5);
    echo "Unblocked";exit;
}
//$sql_like = "select * from qme_friend where user_id ='".$user_id."' AND like_type ='".$like_type."' AND item_id ='".$item_id."'";

?>