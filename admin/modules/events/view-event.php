<?
$ssql = "";

$alp = $_REQUEST['alp'];
$option = $_REQUEST['option21'];
$keyword = $_REQUEST['keyword21'];
$type = $_REQUEST['type'];

$my_mode = 'add';

$memberId = $_REQUEST['iMemberId'];

if($option == dEventDate )
{    
    list($y, $m, $d) = explode('-', $keyword);
    $keyword = date('Y-m-d', mktime(0,0,0,$y,$m,$d));
}

if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}

/*if($alp != ''){
    $ssql.= " AND vTitle LIKE '".stripslashes($alp)."%'";
}*/
$innerjoin = " INNER JOIN   members m ON (e.iMemberId = m.iMemberId) ";
//$sql_res = "SELECT * FROM events WHERE 1 $ssql";	
//$sql_res = "SELECT e.*,m.vName as Name FROM events e ".$innerjoin." WHERE 1 ".$ssql;
$sql_res = "SELECT * FROM events e ".$innerjoin."  where e.iMemberId=".$memberId." ".$ssql." order by iEventId ";

$db_res = $obj->MySQLSelect($sql_res);

$num_totrec = count($db_res);

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
//$sql_eve = "SELECT * FROM  events where 1 $ssql order by iEventId DESC $var_limit";	
//$db_eve = $obj->MySQLSelect($sql_eve);

$sql_cus = "SELECT * FROM events where iMemberId=".$memberId." ".$ssql." order by iEventId ".$var_limit;	
$db_viewevent= $obj->MySQLSelect($sql_cus);

$cnt=count($db_viewevent);
for($i=0;$i<$cnt;$i++)
{
	$db_viewevent[$i][dEventDate]=date("m-d-Y", strtotime($db_viewevent[$i][dEventDate]));
}

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
			$recmsg20= "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsg20="No Records Found.";
		}
 if($option == dEventDate )
{
    $keyword=date("m-d-Y", strtotime($keyword));        
}

if(!count($db_viewevent)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$cnt</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$cnt</font> matches:";
}
//$innerjoin = " INNER JOIN   members m ON (e.iMemberId = m.iMemberId) ";
//$sql_alp = "select vTitle from events where 1=1";
$sql_alp ="SELECT vTitle FROM events where iMemberId=".$memberId."";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vTitle'], 0,1));
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

	
$smarty->assign("totalEvent",$totalEvent);
$smarty->assign("page",$page);
$smarty->assign("total_pages",$total_pages);
$smarty->assign("my_mode",$my_mode);
$smarty->assign("type",$type);
$smarty->assign("db_viewevent",$db_viewevent);
$smarty->assign("db_eve",$db_eve);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg20",$recmsg20);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
