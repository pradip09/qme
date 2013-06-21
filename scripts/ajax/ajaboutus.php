<?php

//echo "<pre>";
//print_r($_REQUEST);
    $iMemberId = $_SESSION['iUserId'];
    $Data['iMemberId'] = $_SESSION['iUserId'];
    $Data['vYourself'] = $_REQUEST['about_company'];
    $Data['vYourexperience'] = $_REQUEST['about_exp'];
    $Data['vYourmission'] = $_REQUEST['about_mission'];
    $Data['vYourservice'] = $_REQUEST['about_service'];
    
    $sql = "select * from aboutus_member where iMemberId = '".$iMemberId."'";
    $db_id = $obj->MySQLSelect($sql);
    
    $sql_mem = "select * from members where iMemberId = '".$iMemberId."'";
    $db_mem = $obj->MySQLSelect($sql_mem);
    
    $memurl= $db_mem[0]['vMemberUrl'];
    //echo $memurl;exit;
    $total=count($db_id);
  
  
    if ($total>0)
    {
	$iMemberId = $_SESSION['iUserId'];
	    $where = " iMemberId = '".$iMemberId."'";
	    
	    $id = $obj->MySQLQueryPerform("aboutus_member",$Data,'update',$where);
	   // echo $id;exit;
	    if($id){
	    $var_msg = "About us text update successfully";
	}
	else{
	    $var_msg = 'Error in update';
	}
	
    }else{
	$id = $obj->MySQLQueryPerform("aboutus_member",$Data,'insert');
	if($id){
	    $var_msg = "About us text update successfully";
	}
	else{
	    $var_msg = 'Error in insert';
	}
    }
//echo $var_msg;
header("Location: ".$site_url."/index.php?file=m-myabout&msg=$var_msg");
//eader("Location:".$site_url."file=?/myabout&msg=$var_msg");

?>