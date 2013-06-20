<?php
$ssql = "";

$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];
if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}

if($alp != ''){
    $ssql.= " AND vName LIKE '".stripslashes($alp)."%'";
}

$sql_res = "SELECT * FROM members WHERE 1 $ssql";	
//echo $sql_res;exit;
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_mem = "SELECT * FROM members where 1 $ssql order by iMemberId DESC $var_limit";	
$db_mem = $obj->MySQLSelect($sql_mem);



#echo "<pre>";
#print_r($db_cus);exit;
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

if(!count($db_mem)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vName from members where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);
for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vName'], 0,1));
}
#echo "<pre>";
#print_r($db_alp);exit;

$alpha_rs =implode(",",$db_alp);
#echo $alpha_rs;exit;
$AlphaChar = @explode(',',$alpha_rs);
#echo "<pre>";
#print_r($AlphaChar);exit;
$AlphaBox.='<ul class="pagination">';
for($i=65;$i<=90;$i++){
	
	if(!@in_array(chr($i),$AlphaChar)){
		$AlphaBox.= '<li ><a href="#" onclick="return false;"  id="alch_'.$i.'">'.chr($i).'</a></li>';
	}else{
		$AlphaBox.= '<li class="page"><a  href="javascript:void(0);" onclick="AlphaSearch(\''.chr($i).'\');" id="alch_'.$i.'" >'.chr($i).'</a></li>';
	}
}
$AlphaBox.='</ul>';

$smarty->assign("db_mem",$db_mem);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>