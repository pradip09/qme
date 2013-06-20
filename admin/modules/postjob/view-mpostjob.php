<?

$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['option23'];

$keyword = $_REQUEST['keyword23'];
$type = $_REQUEST['type'];
$memberId = $_REQUEST['iMemberId'];

if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
/*if($alp != ''){
    $ssql.= " AND vSkill LIKE '%".stripslashes($alp)."%'";

}*/

$sql_res = "SELECT * FROM post_job WHERE 1 AND iMemberId =$memberId  $ssql";
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);

//echo "num tot"; echo $num_totrec; exit;
include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_postjob_new = "SELECT * FROM post_job WHERE 1=1 AND iMemberId =$memberId  $ssql order by iPostJobId $var_limit";
$db_view_post_job = $obj->MySQLSelect($sql_postjob_new);

if(!isset($start))
	$start = 1;
	$num_limit = ($start-1)*$rec_limit;
	$startrec = $num_limit;
	
	$lastrec = $startrec + $rec_limit;
	$startrec = $startrec + 1;
	//echo "start"; echo $startrec; 
	if($lastrec > $num_totrec)
		$lastrec = $num_totrec;
	//echo "last";	echo $lastrec; exit;
		if($num_totrec > 0 )
		{
			$recmsg33= "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsg33="No Records Found.";
		}

if(!count($db_res)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vSkill from post_job where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vSkill'], 0,1));
}


$alpha_rs =implode(",",$db_alp);
$AlphaChar = @explode(',',$alpha_rs);

$AlphaBox.='<ul class="pagination">';
for($i=65;$i<=90;$i++){
	
	if(!@in_array(chr($i),$AlphaChar)){
		$AlphaBox.= '<li ><input type="hidden" value="'.$type.'" name="type" id="type" ><a href="#" onclick="return false;"  type ="'.$type.'" id="alch_'.$i.'">'.chr($i).'</a></li>';
	}else{
		$AlphaBox.= '<li class="page"><input type="hidden" value="'.$type.'" name="type" id="type"><a  href="javascript:void(0);" type ="'.$type.'"onclick="AlphaSearch(\''.chr($i).'\');" id="alch_'.$i.'" >'.chr($i).'</a></li>';
	}
}
$AlphaBox.='</ul>';


$smarty->assign("type",$type);
$smarty->assign("memberId",$memberId);
$smarty->assign("db_view_post_job",$db_view_post_job);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg33",$recmsg33);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
