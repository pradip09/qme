<?php

 $Name=$_SESSION['Name'];
 $iUserId =$_SESSION['iUserId'];
 $sql_points="select * from points_activity where iMemberId ='".$_SESSION['iUserId']."' order by iPointActivityId desc";
 //$sql_points="select * from points_activity pa,post_campaign pc left join members m ON (pc.iMemberId = m.iMemberId) where pa.iCampaignId = pc.iCampaignId And pa.iMemberId ='".$_SESSION['iUserId']."' order by iPointActivityId desc";
 $points = $obj->MySQLSelect($sql_points);
  
 for($i=0;$i<count($points);$i++){
   
    $sql_campaign="select * from post_campaign pc left join members m ON (pc.iMemberId = m.iMemberId) where iCampaignId='".$points[$i]['iCampaignId']."'";
    $campaign = $obj->MySQLSelect($sql_campaign);
   
    $total_points = $points[$i]['iPoint'];    
    $total=$total+$total_points;
    $points[$i][dAddedDate]=date("m-d-Y H:i:s",strtotime($points[$i][dAddedDate]));
    $points[$i][vCampaignName]=$campaign[0]['vCampaignName'];
    $points[$i][vName]=$campaign[0]['vName'];
 }
  



 $sql_campaign="select * from points_activity pa,post_campaign pc inner join members m ON (pc.iMemberId = m.iMemberId) where pa.iCampaignId = pc.iCampaignId And pa.iPostmemId ='".$_SESSION['iUserId']."' And pa.eType='Campaign' order by iPointActivityId desc";
 //$sql_campaign="select * from points_activity where iMemberId ='".$_SESSION['iUserId']."'";
 $campaign = $obj->MySQLSelect($sql_campaign);
//echo "<pre>";
//print_r($campaign);exit;

for($i=0;$i<count($campaign);$i++){
    $total_campaign = $campaign[$i]['iPoint'];    
    $total1=$total1+$total_campaign;
    $campaign[$i][dAddedDate]=date("m-d-Y  H:i:s",strtotime($campaign[$i][dAddedDate]));
 }

 
$smarty->assign("campaign",$campaign);
$smarty->assign("total1",$total1);
$smarty->assign("points",$points);
$smarty->assign("total",$total);
$smarty->assign("Name",$Name);
$smarty->assign("iUserId",$iUserId);

?>