<?php

   $generalobj->checkFrontAuthntication();
   $sMemberId= $_SESSION['iUserId'];
   $sMemberName = $_SESSION['Name'];
   $sMemberMail = $_SESSION['vEmail'];
   
   $sql_recentactivities = "select * from recent_activities AS rs LEFT JOIN members AS m ON(rs.iMemberId =  m.iMemberId)";
   $db_recentactivities = $obj->MySQLSelect($sql_recentactivities);
    
    $member = "select * from qme_inbox where iToId ='".$sMemberId."' AND iFromId !='' AND eToType='Member' AND eRead='0'";
    $meminbox = $obj->MySQLSelect($member);
    $meminboxcnt=count($meminbox);
 
   $sql_member = "select * from members  where  iMemberId='".$sMemberId."'";
   $db_member = $obj->MySQLSelect($sql_member);
   $Zipcode = $db_member[0]['vZipCode'];
   $City = $db_member[0]['vCity'];
   $State = $db_member[0]['iStateId'];
    
   $sql_dist_news = "select * from distictnews where  iMemberId NOT IN('".$sMemberId."')";
   $db_dist_news = $obj->MySQLSelect($sql_dist_news);
   
    for($i=0;$i<count($db_dist_news);$i++){
    
     $sql_zip_member = "select * from members  where  iMemberId='".$db_dist_news[$i]['iMemberId']."'";
     $db_zip_member[] = $obj->MySQLSelect($sql_zip_member);   
    }
     
  for($i=0;$i<count($db_zip_member);$i++){
  if($Zipcode == $db_zip_member[$i][0]['vZipCode']){
    $mem[$i]=$db_zip_member[$i][0]['iMemberId'];
    }
  }
  $Memid=implode('\',\'',$mem);
  $sql_result = "select * from members  where  iMemberId IN ('".$Memid."') limit 0,1";
  $db_distresult = $obj->MySQLSelect($sql_result);    
  
  $sql_city_news = "select * from citynews where  iMemberId NOT IN('".$sMemberId."')";
  $db_city_news = $obj->MySQLSelect($sql_city_news);  
  
   for($i=0;$i<count($db_city_news);$i++){
    
     $sql_city_member = "select * from members  where  iMemberId='".$db_city_news[$i]['iMemberId']."'";
     $db_city_member[] = $obj->MySQLSelect($sql_city_member);   
    }
  
    
   for($i=0;$i<count($db_city_member);$i++){    
  
   $selectState= $db_city_member[$i][0]['iStateId'];
   $selectCity= $db_city_member[$i][0]['vCity'];
     
  //echo $City."<>".$selectCity;"<br />";
  //echo $State."<>".$selectState; 
  
    if(trim($City) == trim($selectCity) || trim($State) == trim($selectState)){     
      $mem_city[$i]=$db_city_member[$i][0]['iMemberId'];
      }
    }
    
    $Memid_city=implode('\',\'',$mem_city);
   
   
    $sql_result1 = "select * from members  where  iMemberId IN ('".$Memid_city."') ORDER BY iMemberId ASC limit 0,1";
    $db_cityresult = $obj->MySQLSelect($sql_result1);
   
   
    $sql_post= "select * from configurations where vName='POST_YOUR_UPDATE'";
    $db_post = $obj->MySQLSelect($sql_post);  
  
    $sql_friend= "SELECT *,qf.eStatus AS Status ,qf.dApproveDate AS ApproveDate FROM qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus='Active' AND qf.iFriendId = '".$sMemberId."' AND (qf.eStatus = 'Approve' OR qf.eStatus = 'Blocked')";
    $db_friend = $obj->MySQLSelect($sql_friend);  
  
   $friendlist = count($db_friend);
    //echo "<pre>";
    //print_r($friendlist);exit;
   
   
   $smarty->assign("friendlist",$friendlist);
   $smarty->assign("db_recentactivities",$db_recentactivities);
   $smarty->assign("meminboxcnt",$meminboxcnt);
   $smarty->assign("iMemberId",$sMemberId);
   $smarty->assign("db_distresult",$db_distresult);
   $smarty->assign("db_cityresult",$db_cityresult);
   $smarty->assign("db_post",$db_post);

?>
