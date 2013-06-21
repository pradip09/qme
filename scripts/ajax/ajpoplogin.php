<?php

    session_start();
    $user_email = $_REQUEST['vLoginEmail'];
    $password = $_REQUEST['vLoginPassword'];
    $sql="select * from users WHERE vEmail = '".$user_email."' and vPassword ='".$password."'";
    $row=$obj->MySQLSelect($sql);
    if($row){
        if($row[0]['eStatus'] =='Active'){
            $_SESSION['iUserId'] =$row[0]['iUserId'];
            $_SESSION['Name'] =$row[0]['vFirstName']." ".$row[0]['vLastName'];
            $_SESSION['vEmail'] =$row[0]['vEmail'];
            $var_msg='success';
        }else{
            $var_msg='inactivemem';
        }
    }else{
        $var_msg='missmatch';
    }
    echo $var_msg;exit;
?>
