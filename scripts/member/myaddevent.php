<?php
$generalobj->checkFrontAuthntication();
#$generalobj->checkFrontAuthntication();
#echo "<pre>";
    #print_r($_SESSION['Cart']);exit;
    $iEventId= $_REQUEST['iEventId'];
    $mode="add";
    if($iEventId!='add')
    {
        $sql_events="select * from events where iEventId= '".$iEventId."'";
        $eventsArr=$obj->MySQLSelect($sql_events);
        $eventsArr[0][dEventDate]=date("m-d-Y",strtotime($eventsArr[0][dEventDate]));
        $mode="edit";
    }
   $sql_skill = "SELECT * FROM events WHERE iEventId='".$iEventId."'";
   $db_product = $obj->MySQLSelect($sql_skill);
   $relatedArr = explode(",",$db_product[0]['iSkillId']);
   $relatedArrIntrest = explode(",",$db_product[0]['iInterestId']);
     #echo "<pre>";
     #print_r($eventsArr);exit;
    $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
    $smarty->assign("relatedArr",$relatedArr);
    $smarty->assign("mode",$mode);
    $smarty->assign("eventsArr",$eventsArr);
?>
