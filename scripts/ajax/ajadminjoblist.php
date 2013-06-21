<?php

	$iUserId=$_SESSION['iUserId'];
        include_once(TPATH_CLASS_APP."/class.job.php");
	$PostJobObj = new PostJob();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$var_limit = " ";
	
	$ssql = " AND iAdminId !='0'";
        $refcat = $_REQUEST['refcat'];
	$PostJobArr = $PostJobObj->getJobList($var_limit,$ssql);
	
	
        $totRec = count($PostJobArrs);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	include_once(TPATH_CLASS_APP."/class.job.php");
	$PostJobObj = new PostJob();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_REQUEST['iMemberId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$var_limit = " ";
	
        $ssql = " AND iAdminId !='0'";
        $refcat = $_REQUEST['refcat'];
	$PostJobArr = $PostJobObj->getJobList($var_limit,$ssql);
	
	
        $totRec = count($PostJobArr);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}

	
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displayadminjob');
	$PostJobArr = $PostJobObj->getJobList($var_limit,$ssql);
	
	for($i = 0; $i < count($PostJobArr); $i++)
	{
            $PostJobArr[$i]['tFullDescription']=$PostJobArr[$i]['tDescription'];
	    $PostJobArr[$i][dAddedDate]=date("m-d-Y",strtotime($PostJobArr[$i][dAddedDate]));
	    if(strlen($PostJobArr[$i]['tDescription'])>145){
		$PostJobArr[$i]['tFullDescription']=$PostJobArr[$i]['tDescription'];
		$PostJobArr[$i]['tDescription']=substr($PostJobArr[$i]['tDescription'],0,144).'...';
		}
	}
	
	$recmsg = $PagingObj->setMessage('Jobs');
	$pages = $PagingObj->displayPaging();
  
	
	
	$smarty->assign("PostJobArr", $PostJobArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iUserId",$iUserId);
	$smarty->assign("iMemberId",$iMemberId);
?>

 