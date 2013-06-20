<?php /* Smarty version Smarty-3.0.7, created on 2012-07-13 12:04:11
         compiled from "/var/www/qme_theme/admin/templates/photo/view-photo.php" */ ?>
<?php /*%%SmartyHeaderCode:18706184404fffc163e85987-15392648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd96e730e5bd51f35425ef376c1619cdabea79a8b' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/photo/view-photo.php',
      1 => 1341656493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18706184404fffc163e85987-15392648',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<<?php ?>?
$ssql = "";

$alp = $_REQUEST['alp'];
$option = $_REQUEST['option'];

$keyword = $_REQUEST['keyword'];
$type = $_REQUEST['type'];


if($option != '' && $keyword != ''){
    $ssql.= " AND ".stripslashes($option)." LIKE '".stripslashes($keyword)."%'";
}
if($alp != ''){
    $ssql.= " AND vPhotoTitle LIKE '".stripslashes($alp)."%'";

}
$innerjoin = " INNER JOIN photo_category pc ON (p.iPhotoCategoryId = pc.iPhotoCategoryId) JOIN members m ON (p.iMemberId = m.iMemberId) ";

$sql_res = "SELECT p.*,pc.vPhotoCategory as PhotoCategory,m.vName as Name FROM photo as p ".$innerjoin." WHERE 1 ".$ssql;
$db_res = $obj->MySQLSelect($sql_res);

$num_totrec = count($db_res);

include(TPATH_CLASS_GEN."paging.inc.php");

#Listing Starts from here
$sql_cus = "SELECT p.*,pc.vPhotoCategory as PhotoCategory,m.vName as Name FROM photo as p ".$innerjoin." where 1 $ssql order by iPhotoId $var_limit";	

$db_photo= $obj->MySQLSelect($sql_cus);


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

if(!count($db_photo)>0 && $keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>0</font> matches:";
}else if($keyword != ""){
	$var_msg_new = "Your search for <font color=#2e71b3>$keyword</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}else if($alp !=''){
    $var_msg_new = "Your search for <font color=#2e71b3>$alp</font> has found <font color=#2e71b3>$num_totrec</font> matches:";
}

$sql_alp = "select vPhotoTitle from photo where 1=1";
$db_alp = $obj->MySQLSelect($sql_alp);

for($i=0;$i<count($db_alp);$i++){
    $db_alp[$i] = strtoupper(substr($db_alp[$i]['vPhotoTitle'], 0,1));
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
$smarty->assign("db_photo",$db_photo);
$smarty->assign("AlphaBox",$AlphaBox);
$smarty->assign("recmsg",$recmsg);
$smarty->assign("var_msg",$var_msg);
$smarty->assign("keyword",$keyword);
$smarty->assign("option",$option);
$smarty->assign("page_link",$page_link);
$smarty->assign("var_msg_new",$var_msg_new);

?<?php ?>>
