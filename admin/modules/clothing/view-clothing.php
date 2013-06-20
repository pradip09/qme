<?php

$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];
$keyword = $_REQUEST['keyword'];

if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}

if($alp != ''){
    $ssql.= " AND vProductName LIKE '".stripslashes($alp)."%' ";
}

$leftjoin = " INNER JOIN  members m ON (cl.iMemberId = m.iMemberId) ";
$sql_res = "SELECT cl.*,m.vName as Name FROM product_clothing_accessories as cl ".$leftjoin." WHERE 1 ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);
include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_cus = "SELECT cl.*,m.vName as Name FROM product_clothing_accessories as cl ".$leftjoin." where 1 $ssql order by iProductId DESC $var_limit";
$db_clothing= $obj->MySQLSelect($sql_cus);
//$sql_cat = "SELECT * FROM   product_clothing_accessories where 1 $ssql order by iProductId DESC $var_limit";	
//$db_clothing = $obj->MySQLSelect($sql_cat);
#$result = array_merge((array)$num_totrec, (array)$db_product2);
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

if(!count($db_clothing)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
	 $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vProductName from  product_clothing_accessories where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);


for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vProductName'], 0,1));
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



$smarty->assign("db_clothing",$db_clothing);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);


?>
