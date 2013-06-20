<?php
    
    $mode = $_REQUEST['mode'];
    $iSkillId = $_REQUEST['iSkillId'];
    
    if($iSkillId !=''){
        $sql_cat = "SELECT * FROM skill  WHERE iSkillId='".$iSkillId."'";
        $db_skill = $obj->MySQLSelect($sql_cat);
    }
    
   
    $smarty->assign("mode",$mode);
    $smarty->assign("db_skill",$db_skill);
    $smarty->assign("iSkillId",$iSkillId);
    
?>