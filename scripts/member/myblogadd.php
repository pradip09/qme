<?php


$generalobj->checkFrontAuthntication();

    $iBlogId = $_REQUEST['iBlogId'];
    $iMemberId    = $_SESSION['iUserId'];
    
   $sql_skill = "SELECT * FROM   skill";
   $db_blogskill = $obj->MySQLSelect($sql_skill);   
   
   $sql_interest = "SELECT * FROM    interest";
   $db_bloginterest = $obj->MySQLSelect($sql_interest);
   
   
   
    
    if($iBlogId == 'add')
    {
        $mode = 'add';
        
    }else{        
	
	
	$sql_blog = "select * from blog where iBlogId='".$iBlogId."' AND iMemberId = '".$iMemberId."'";	       
        $db_blog = $obj->MySQLSelect($sql_blog);
	#echo "<pre>";
    #print_r($db_blog);exit;
	
        $db_blog[0][dCreateDate]=date("m-d-Y",strtotime($db_blog[0][dCreateDate]));
	
	#echo "<pre>";
    #print_r($db_blog);exit;
	
//echo ($db_blog[0][dCreateDate]);exit;

	
        $mode = 'edit';
        #$sql_photocategory = "select * from photo_category iMemberId = '".$iMemberId."' AND iPhotoCategoryId='".$db_photo[0]['iPhotoCategoryId']."'";
        #$db_photocategory = $obj->MySQLSelect($sql_photocategory);
        
    }
   $sql_skill = "SELECT * FROM blog WHERE iBlogId='".$iBlogId."'";
   $db_arr = $obj->MySQLSelect($sql_skill);
   $relatedArr = explode(",",$db_arr[0]['iSkillId']);
   $relatedArrIntrest = explode(",",$db_arr[0]['iInterestId']);
    
    $sql_blogcategory = "select * from blogcategory";
    
    $db_blogcategory = $obj->MySQLSelect($sql_blogcategory);
#echo "<pre>";
#print_r($db_photo);

$smarty->assign("db_blogskill",$db_blogskill);
$smarty->assign("db_bloginterest",$db_bloginterest);
$smarty->assign("relatedArr",$relatedArr);
$smarty->assign("relatedArrIntrest",$relatedArrIntrest);
$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_blogcategory",$db_blogcategory);
$smarty->assign("db_blog",$db_blog);

?>