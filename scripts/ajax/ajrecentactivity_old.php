<?php
	
	include_once(TPATH_CLASS_APP."/class.recentactivity.php");
	$RecentActivityObj = new RecentActivity();
	$start 		= $_REQUEST['start'];
	$keyword = $_REQUEST['keyword'];
	$FRONT_REC_LIMIT_ALL =  $user_reclimit;
        $recLimit = 8; // my record limit
	$rec_limit 	= $recLimit ;
	
	$RecentActivityArr = $RecentActivityObj->getRecentActivity($var_limit,$ssql);
	
	$totRec = count($RecentActivityArr);
	
	if($start != 0){
		$num_limit = ($start-1)*$rec_limit;
		$var_limit = " LIMIT $num_limit, $rec_limit";
	}else{
		$var_limit = " LIMIT 0, $rec_limit";
		$start = 1;
	}
	require_once(TPATH_CLASS_GEN.'class.paging-ajax.php');
	$PagingObj = new Paging($totRec,$start,'displayrecentactivity');
	$RecentActivityArr = $RecentActivityObj->getRecentActivity($var_limit,$ssql);
        
	for($i=0;$i<count($RecentActivityArr);$i++){
		#echo $RecentActivityArr[$i]['dAddedDate'].'<br/>';
		#echo date('Y-m-d H:i:s');
		$Different[$i] = $generalobj->getDateDifference($RecentActivityArr[$i]['dAddedDate'],date('Y-m-d H:i:s'),'a');
		if($Different[$i]['days'] != 0){
		$RecentActivityArr[$i]['Differ'] = $Different[$i]['days'].' days '.$Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] != 0){
			$RecentActivityArr[$i]['Differ'] = $Different[$i]['hours'].' hours '.$Different[$i]['minutes'].' minutes ago';	
		}elseif($Different[$i]['days'] == 0 && $Different[$i]['hours'] == 0){
			$RecentActivityArr[$i]['Differ'] = $Different[$i]['minutes'].' minutes ago';	
		}
		
	$RecentActivityArr[$i]['dAddedDate'] = date("F jS Y", strtotime($RecentActivityArr[$i]['dAddedDate']));
	}
	
	$recmsg = $PagingObj->setMessage('Categor&iacute;a');
	$pages = $PagingObj->displayPaging();
  
	$smarty->assign("db_recentactivities", $RecentActivityArr);
	$smarty->assign("pages",$pages);
	$smarty->assign("recmsg",$recmsg);
?>

 