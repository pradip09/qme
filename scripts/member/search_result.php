<?php

$generalobj->checkFrontAuthntication();
   $sMemberId= $_SESSION['iUserId'];
   $sMemberName = $_SESSION['Name'];
   $sMemberMail = $_SESSION['vEmail'];   
   //echo "<pre>";
   //print_r($_REQUEST);exit;
   $keyword = $_SESSION['keyword'];
   $type = $_SESSION['eTypeSearch'];
     
   if( $type == 'member' ){
     $type = 'People';
     $type_2 = 'member';
   }else if($type == 'bizmember'){
    $type = 'Business';
    $type_2 = 'bizmember';
   }else{
    $type = 'QMESearch';
    $type_2 = 'campaign';
   }
   
   $smarty->assign("keyword",$keyword);
   $smarty->assign("type",$type);
   $smarty->assign("type_2",$type_2);
   
   $smarty->assign("db_recentactivities",$db_recentactivities);
   $smarty->assign("meminboxcnt",$meminboxcnt);

?>
