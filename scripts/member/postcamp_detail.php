<?php
if(isset($_SESSION['iUserId']) == false && $_SESSION['iUserId'] ==''){
    $url = $_SERVER['REQUEST_URI'];
    header("location:".$tconfig["tsite_url"]."?file=c-home&url=".$url);    
}

//$generalobj->checkFrontAuthntication();
$vMemberUrl = $_REQUEST['mamberurl'];
$iCampaignId = $_REQUEST['iPostcampId'];

    if($iCampaignId == '')
    {
         header("location:".$tconfig["tsite_url"]."/home");
    }else{
     
        $sql_user = "select * from members where vMemberUrl='".$vMemberUrl."'";
        $db_user = $obj->MySQLSelect($sql_user);
        $iMemberId = $db_user[0]['iMemberId'];
        
        $sql_post = "select * from  post_campaign where iCampaignId = '".$iCampaignId."' AND eStatus = 'Active'";
        $db_postcamp = $obj->MySQLSelect($sql_post);
        
        
        $db_postcamp[0]['vImage'] = $tconfig["tsite_upload_images_campaign"]."/member/".$db_postcamp[0]['iMemberId']."/".$db_postcamp[0]['vImage'];
        $member_name = "select * from members where iMemberId = '".$db_postcamp[0]['iMemberId']."'";
        $db_membername = $obj->MySQLSelect($member_name);
        $name = $db_membername[0]['vName'];
        
        
        $db_postcamp[0]['tFullContent']=$db_postcamp[0]['tContent'];
        if(strlen($db_postcamp[0]['tContent'])>108){
            $db_postcamp[0]['tContent']=substr($db_postcamp[0]['tContent'],0,107).'..';
            
        }
        
    }
    
        
$smarty->assign("name", $name);
$smarty->assign("db_postcamp", $db_postcamp);
$smarty->assign("code", $vMemberUrl);
$smarty->assign("db_user", $db_user);


?>