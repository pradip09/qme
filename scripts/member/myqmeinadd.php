<?php

//echo "<pre>";
//print_r($_GET);exit;
$generalobj->checkFrontAuthntication();
    $iQmeInId = $_REQUEST['iQmeInId'];
    $iMemberId    = $_SESSION['iUserId'];
    if($iQmeInId == 'add')
    {
        $mode = 'add';
        
    }else{
   
        $sql_qmein = "select * from qmein where iQmeInId='".$iQmeInId."' AND iMemberId = '".$iMemberId."'";
        
        $db_qmein = $obj->MySQLSelect($sql_qmein);
        $mode = 'edit';
        $relatedArr = explode(",",$db_qmein[0]['iSkillId']);
        $relatedArrIntrest = explode(",",$db_qmein[0]['iInterestId']);
  
    }
   
    
$smarty->assign("relatedArrIntrest",$relatedArrIntrest);    
$smarty->assign("relatedArr",$relatedArr);
$smarty->assign("mode",$mode);
$smarty->assign("iMemberId",$iMemberId);
$smarty->assign("db_qmein",$db_qmein);


?>