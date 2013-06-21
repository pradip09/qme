<?php
$generalobj->checkFrontAuthntication();
    $sUserId= $_SESSION['iUserId'];
    $sql_user="select * from users where iUserId= '".$sUserId."'";
    
    $userArr=$obj->MySQLSelect($sql_user);
    $smarty->assign("userArr",$userArr);
?>