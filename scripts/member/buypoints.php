<?php
$generalobj->checkFrontAuthntication();
$sql = "SELECT faq.vQuestion, faq.tAnswer FROM faq INNER JOIN faq_category ON faq.iFAQCategoryId=faq_category.iFAQCategoryId AND vCategory = 'Buy Points'";
$db_faqcat = $obj->MySQLSelect($sql);

$sql="select * from buy_points_content where eStatus='Active' ORDER BY iContentId ASC";
$db_res=$obj->MySQLSelect($sql);	

/*$sql="select * from qme_points where iMemberId = '".$_SESSION['iUserId']."'";
$db_point=$obj->MySQLSelect($sql);	    
$total_points = $db_point[0]['Total_points'];*/

$sql_earn="select * from qme_earnpoints where iMemberId = '".$_SESSION['iUserId']."'";
$db_earn=$obj->MySQLSelect($sql_earn);

$sql_purchase="select * from qme_purchagepnts where iMemberId = '".$_SESSION['iUserId']."'";
$db_purchase=$obj->MySQLSelect($sql_purchase);

$total_earn = $db_earn[0]['Total_earnpoints'];
$total_purchase = $db_purchase[0]['Total_purchagepoints'];

$total_points = ($total_earn) + ($total_purchase);



$sql_mem = "select * from members  where iMemberId ='".$_SESSION['iUserId']."'";
$db_mem = $obj->MySQLSelect($sql_mem);

if($db_mem[0]['iSkillId'] == '' AND $db_mem[0]['iInterestId'] == '')
{
    $point_msg = 'Complete skill and interest section on my profile so you will get 500 points in your account.';
}else{
    $point_msg = '';
}

$smarty->assign("point_msg",$point_msg);
$smarty->assign("total_points",$total_points);
$smarty->assign("db_res",$db_res);
$smarty->assign("db_faqcat",$db_faqcat);

?>