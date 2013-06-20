<?php

//echo "<pre>";
//print_r($_SESSION);
    session_destroy();
    $sql = "update login_histories set dLogoutDate=NOW() WHERE iLoginHistoryId='".$_SESSION["iLoginHistoryId"]."' AND eType='Administrator'";
    $db_sql = $obj->sql_query($sql);
    //echo $sql;exit; 
    $var_msg = "You have logout Successfully.";
    header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login&var_msg=$var_msg");
    exit;
    
    
?>