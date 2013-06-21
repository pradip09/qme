<?php

	
	include_once(TPATH_CLASS_APP."/class.faq.php");
	$FaqObj = new Faq();
	$start = $_REQUEST['start'];
	$iFAQCategoryId = $_REQUEST['iFAQCategoryId'];
	$vCategory=$_REQUEST['vCategory'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $rec_limit 	= $FRONT_REC_LIMIT_ALL;
	$listingtypeid = $_REQUEST['listingtypeid'];
	$var_limit = " ";
	
	if($iFAQCategoryId !=''){
		$ssql = " AND iFAQCategoryId = '".$iFAQCategoryId."'";
	}
	$FaqArr = $FaqObj->getFaqList($var_limit,$ssql);
	$totRec = count($FaqArr);
	
	for($i=0;$i<count($FaqArr);$i++){
		$FaqArr[$i]['vQuestion']=stripslashes($FaqArr[$i]['vQuestion']);
		$FaqArr[$i]['tAnswer']=stripslashes($FaqArr[$i]['tAnswer']);
	}
	
	$smarty->assign("FaqArr", $FaqArr);
	
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
	$smarty->assign("iMemberId",$iMemberId);
	$smarty->assign("vCategory",$vCategory);
	$smarty->assign("listingtypeid",$listingtypeid);
	
?>

 