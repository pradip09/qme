<?php


$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];

if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}

if($alp != ''){
    $ssql.= " AND vPropertyType LIKE '".stripslashes($alp)."%'";
}
$leftjoin = " LEFT JOIN members m ON (r.iMemberId = m.iMemberId) ";

$sql_res = "select r.*, p.vPropertyType from product_real_estate r LEFT JOIN real_estate_property p ON (r.iPropertyTypeId = p.iPropertyTypeId) $leftjoin WHERE 1 ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);
include(TPATH_CLASS_GEN."paging.inc.php");
//echo $sql_res;exit; 
#Listing Starts from here
$sql_cus = "select r.*, p.vPropertyType, m.vName from product_real_estate r left JOIN real_estate_property p ON (r.iPropertyTypeId = p.iPropertyTypeId)  LEFT JOIN members m ON (r.iMemberId=m.iMemberId) WHERE 1 $ssql order by iPropertyTypeId DESC $var_limit";
$db_realestate = $obj->MySQLSelect($sql_cus);
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

if(!count($db_realestate)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
	$var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select r.*, p.vPropertyType from product_real_estate r left JOIN real_estate_property p ON r.iPropertyTypeId = p.iPropertyTypeId where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vPropertyType'], 0,1));
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

$smarty->assign("db_realestate",$db_realestate);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
