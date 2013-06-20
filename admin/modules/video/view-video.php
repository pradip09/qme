<?


$ssql = "";
$alp = $_REQUEST['alp'];
$option = $_REQUEST['optionn'];

$keyword = $_REQUEST['keywordd'];
$type = $_REQUEST['type'];

$my_mode = 'add';
$memberId = $_REQUEST['iMemberId'];

if($option != '' && $keyword != ''){
    $ssql.= " AND v.".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
/*if($alp != ''){
    $ssql.= " AND vVideoName LIKE '".stripslashes($alp)."%'";

}*/
$leftjoin = " LEFT JOIN video_album va ON (v.iVideoAlbumId = va.iVideoAlbumId) JOIN members m ON (v.iMemberId = m.iMemberId) ";
$sql_res = "SELECT v.*,va.vVideoAlbum FROM video as v ".$leftjoin." WHERE 1 AND v.iMemberId = ".$memberId." ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);
$num_totrec = count($db_res);
//echo $num_totrec;exit;

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_cus = "SELECT v.*,va.vVideoAlbum FROM video as v ".$leftjoin." where 1 AND v.iMemberId = ".$memberId." $ssql order by iVideoId $var_limit";
//$sql_cus = "select * from  video WHERE  iMemberId = ".$memberId." ".$ssql." order by iVideoId ".$var_limit;	
$db_video= $obj->MySQLSelect($sql_cus);

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
			$recmsgg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		}
		else
		{
			$recmsgg="No Records Found.";
		}

if(!count($db_res)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
	
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";

}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vVideoName from video where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vVideoName'], 0,1));
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

$smarty->assign("my_mode",$my_mode);
$smarty->assign("type",$type);
$smarty->assign("db_video",$db_video);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsgg",$recmsgg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?>
