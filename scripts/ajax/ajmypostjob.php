<?php

    $iMemberId = $_SESSION['iUserId'];
    $vSkill = $_REQUEST['vSkill'];
    $tDescription = $_REQUEST['tDescription'];
    $iStateId = $_REQUEST['iStateId'];
    $dAddedDate = date('Y-m-d');
    
    $Data = array(
        'iMemberId'=>$iMemberId,
        'vSkill'=>$vSkill,
        'tDescription'=>$tDescription,
        'iStateId'=>$iStateId,
        'dAddedDate'=>$dAddedDate
    );
    
    $id = $obj->MySQLQueryPerform("post_job",$Data,'insert');
    if($id){
        $var_msg = "success";
    }
    else{
        $var_msg = 'Error in Posting Job';
    }
    echo $var_msg;exit;
?>

