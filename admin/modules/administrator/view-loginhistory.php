<?php

$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];

if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '%".stripslashes($keyword)."%'";
}

if($alp != ''){
    $ssql.= " AND concat(vFirstName,' ',vLastName) LIKE '%".stripslashes($alp)."%'";
}

$sql = "SELECT * FROM login_histories WHERE eType='Administrator' $ssql";
$adminhist = $obj->MySQLSelect($sql);
$num_totrec = count($adminhist);
include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_hist = "SELECT * FROM login_histories WHERE eType='Administrator' $ssql order by iLoginHistoryId DESC $var_limit";	
$db_hist = $obj->MySQLSelect($sql_hist);

#ends here
if(!isset($start))
	$start = 1;
	$num_limit = ($start-1)*$rec_limit;
	$startrec = $num_limit;
	
	$lastrec = $startrec + $rec_limit;
	$startrec = $startrec + 1;
	if($lastrec > $num_totrec)
		$lastrec = $num_totrec;
		if($num_totrec > 0 )
		{
			$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsg="No Records Found.";
		}

if(!count($db_hist)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
	$var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select lh.vFirstName from login_histories AS lh where 1=1 AND lh.eType='Administrator'";
$db_alp = $obj->MySQLSelect($sql_alp);
for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vFirstName'], 0,1));
}

$alpha_rs =implode(",",$db_alp);
$AlphaChar = @explode(',',$alpha_rs);
$AlphaBox.='<ul class="pagination">';
for($i=65;$i<=90;$i++){
	
	if(!@in_array(chr($i),$AlphaChar)){
		$AlphaBox.= '<li ><a href="#" onclick="return false;"  id="alch_'.$i.'">'.chr($i).'</a></li>';
	}else{
		$AlphaBox.= '<li class="page"><a  href="javascript:void(0);" onclick="AlphaSearch(\''.chr($i).'\');" id="alch_'.$i.'" >'.chr($i).'</a></li>';
	}
}
$AlphaBox.='</ul>';


$smarty->assign("db_hist",$db_hist);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
