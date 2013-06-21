<?php
	
	include_once(TPATH_CLASS_APP."/class.QmeIn.php");
	$QmeInObj = new QmeIn();
	$start 		= $_REQUEST['start'];
	$iMemberId    = $_SESSION['iUserId'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
	$recLimit = 10; // my record limit
        $rec_limit 	= $recLimit;
	$var_limit = " ";
	
	if($iMemberId !=''){
		$ssql .= "eStatus='Active' AND iMemberId='".$iMemberId."' order by iQmeInId Desc";
	}
	
	
	$QmeInArr = $QmeInObj->getQmeIn($var_limit,$ssql);
	
	$totRec = count($QmeInArr);
	
	$tot_page = ceil($totRec/$recLimit);

	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}


	require_once(TPATH_CLASS_GEN.'class.browsepaging-ajax.php');

	$PagingObj = new Paging($totRec,$start,'displaymyqmein');
	$QmeInArr = $QmeInObj->getQmeIn($var_limit,$ssql);
    
	for($i=0;$i<count($QmeInArr);$i++){
        $QmeInArr[$i][dAddedDate] = date('m-d-Y',strtotime($QmeInArr[$i][dAddedDate]));
        }
	
	$recmsg = $PagingObj->setMessage('Qme In');
	$pages = $PagingObj->displayBrowseJobPaging($tot_page);
	
	$smarty->assign("QmeInArr", $QmeInArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
?>

 