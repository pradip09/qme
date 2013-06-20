<?php

$sql_data = "SELECT * FROM `order` WHERE dtOrderDate >= DATE_SUB(CURDATE(),INTERVAL 1 DAY) order by iOrderId DESC  ";	
$db_data = $obj->MySQLSelect($sql_data);
$smarty->assign("db_data",$db_data);
function createDatesArray($days) {
       global $obj;
       //CLEAR OUTPUT FOR USE
       $output = array();
        //SET CURRENT DATE
       $month = date("m");
       $day = date("d");
       $year = date("Y");
        //LOOP THROUGH DAYS
       for($i=0; $i<$days; $i++){
            $output["day"][] = date('l', strtotime(date('Y-m-d',mktime(0,0,0,$month,($day-$i),$year))))."<Br>(".date('Y-m-d',mktime(0,0,0,$month,($day-$i),$year)).")";
	    $sql = "SELECT count(iOrderId) as cnt FROM `order` WHERE dtOrderDate like '".date('Y-m-d',mktime(0,0,0,$month,($day-$i),$year))."%' ";	
	    $db = $obj->MySQLSelect($sql);
	    $output["daycnt"][] = $db[0]["cnt"];
       }
       return $output;
   }
   
       
     $sql_admin = "SELECT * FROM administrators ";	
     $db_admin = $obj->MySQLSelect($sql_admin);
     $admin=count($db_admin);
     
     $sql_login = "SELECT * FROM   login_histories ORDER BY  `iLoginHistoryId` DESC LIMIT 0 , 1";
     $db_login = $obj->MySQLSelect($sql_login);
      $db_login[0][dLoginDate]=date("m-d-Y",strtotime($db_login[0][dLoginDate]));
     //$log=$db_login[0][dLoginDate];
    
     $sql_user = "SELECT * FROM members ";	
     $db_user = $obj->MySQLSelect($sql_user);
     $user=count($db_user);
   
     $sql_job = "SELECT * FROM post_job ";	
     $db_job = $obj->MySQLSelect($sql_job);
     $postjob=count($db_job);
   
     $sql_campaign = "SELECT * FROM post_campaign ";	
     $db_campaign = $obj->MySQLSelect($sql_campaign);
     $postcampaign=count($db_campaign);
     
     $sql_news = "SELECT * FROM news ";	
     $db_news = $obj->MySQLSelect($sql_news);
     $news=count($db_news);
   
   $dates = createDatesArray("7");
   $day = $dates["day"];
   $daycnt = $dates["daycnt"];
   $smarty->assign("day",$day);
   $smarty->assign("daycnt",$daycnt);
   $smarty->assign("admin",$admin);
   $smarty->assign("user",$user);
   $smarty->assign("postjob",$postjob);
   $smarty->assign("postcampaign",$postcampaign);
   $smarty->assign("news",$news);
   $smarty->assign("db_login",$db_login);
   
?>