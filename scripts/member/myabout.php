<?php
 $sMemberId = $_SESSION['iUserId'];
 $msg=$_REQUEST['msg'];
 
  $sql_aboutus = "select * from aboutus_member where iMemberId = '".$sMemberId."'";
  $db_aboutus = $obj->MySQLSelect($sql_aboutus);
  //echo "<pre>";
  //print_r($db_aboutus);exit;
  $smarty->assign("db_aboutus",$db_aboutus);
  $smarty->assign("msg",$msg);

?>