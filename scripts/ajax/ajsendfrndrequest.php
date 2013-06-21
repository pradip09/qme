<?php

include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();


$requestId = $_REQUEST['iMemberId'];
$senderId = $_SESSION['iUserId'];
ob_clean();

if($_REQUEST['type'] == 'send')
{
    $Data2 = array(
            'iMemberId'=>$requestId,
            'iFriendId'=>$senderId,
            'eStatus'=>'Requested',
        );
    
    $id2 = $obj->MySQLQueryPerform("qme_friend",$Data2,'insert');
    
    $Data1 = array(
        'iMemberId'=>$senderId,
        'iFriendId'=>$requestId,
        'eStatus'=>'Pending',
        );
    
    $id1 = $obj->MySQLQueryPerform("qme_friend",$Data1,'insert');
    $var_msg = '';
    if($id2 && $id1){

       
        $ssql = "select * from members where iMemberId ='".$requestId."'";
        $db_user = $obj->MySQLSelect($ssql);
            
        $ssql12 = "select * from members where iMemberId ='".$_SESSION['iUserId']."'";
        $db_user_sender = $obj->MySQLSelect($ssql12);

        $userName = $db_user[0]['vName'];
        $Email = $db_user[0]['vEmail'];
        $Veryfy_Link = $site_url.'/'.$db_user_sender[0]['vMemberUrl'];
        $Sender_name = $db_user_sender[0]['vName'];
        $body_arr = Array("#NAME#","#SITE_NAME#","#SENDER_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#VERIFY_LINK#");
	$post_arr = Array($UserName,$SITE_NAME,$Sender_name,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$Veryfy_Link);
			
        $mailObj->Send("MEMBER_SEND_FRNDREQUEST","Administrator",$Email,$body_arr,$post_arr);
         
        $var_msg = 'success';
    }else{
        $var_msg = 'error';
    }
}else if($_REQUEST['type'] == 'accept')
{
    $Date = date('Y-m-d H:i:s');
    $ssql1 = "UPDATE qme_friend set eStatus ='Approve' , dApproveDate = '".$Date."' where iMemberId='".$senderId."' AND iFriendId = '".$requestId."'";
    $db_update = $obj->MySQLSelect($ssql1);
    $ssql2 = "UPDATE qme_friend set eStatus ='Approve' , dApproveDate = '".$Date."' where iMemberId='".$requestId."' AND iFriendId = '".$senderId."'";
    $db_update = $obj->MySQLSelect($ssql2);
    
    $ssql3 = "select * from qme_friend as qf LEFT JOIN members AS m ON(m.iMemberId = qf.iMemberId) where qf.iMemberId='".$requestId."' AND qf.iFriendId = '".$senderId."'";
    $update = $obj->MySQLSelect($ssql3);
    
    $Recent['iMemberId'] = $senderId;
    $Recent['eType'] = 'approve_friend_request';
    $Recent['iTypeId'] = $update[0]['iFriendRequestId'];
    $Recent['vDescription'] = $_SESSION['Name'].' is now friends with <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$update[0]['vMemberUrl'].'">'.$update[0]['vName'].'</a>.';
    $Recent['dAddedDate'] = $Date;
    $Recent['eNameActivity'] = '';
    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    
    $Recent1['iMemberId'] = $requestId;
    $Recent1['eType'] = 'approve_friend_request';
    $Recent1['iTypeId'] = $update[0]['iFriendRequestId'];
    $Recent1['vDescription'] = $update[0]['vName'].' is now friends with <a style="text-decoration:none;color: #E26700;" href="'.$site_url.'/'.$_SESSION['vMemberUrl'].'">'.$_SESSION['Name'].'</a>.';
    $Recent1['dAddedDate'] = $Date;
    $Recent1['eNameActivity'] = '';
    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent1,'insert');
    
    //mail section start
    $ssql = "select * from members where iMemberId ='".$_SESSION['iUserId']."'";
    $db_user = $obj->MySQLSelect($ssql);
    $ssql12 = "select * from members where iMemberId ='".$requestId."'";
    $db_user_sender = $obj->MySQLSelect($ssql12);
    $UserName = $db_user[0]['vName'];
    $Email = $db_user[0]['vEmail'];
    $Veryfy_Link = $site_url.'/'.$db_user_sender[0]['vMemberUrl'];
    $Sender_name = $db_user_sender[0]['vName'];
    $body_arr = Array("#NAME#","#SITE_NAME#","#SENDER_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#VERIFY_LINK#");
    $post_arr = Array($UserName,$SITE_NAME,$Sender_name,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$Veryfy_Link);
                
    $mailObj->Send("MEMBER_ACCEPT_FRNDREQUEST","Administrator",$Email,$body_arr,$post_arr);
    
    //mail section end
    
    $var_msg = 'Accept';
}
echo $var_msg;exit;
?>