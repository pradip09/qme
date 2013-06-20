<?php
    
    $mode = $_REQUEST['mode'];
    
    $iPostId = $_REQUEST['iPostId'];
    
    if($iPostId !=''){
        $sql_postoopt = "SELECT * FROM post_opportunity  WHERE iPostId='".$iPostId."'";	
        $db_postoopt = $obj->MySQLSelect($sql_postoopt);
    }
    $sqlMember = "select iMemberId,vName from members";
    $db_PostOppMember = $obj->MySQLSelect($sqlMember);
    $smarty->assign("mode",$mode);
    $smarty->assign("db_postoopt",$db_postoopt);
    $smarty->assign("iPostId",$iPostId);
    $smarty->assign("db_PostOppMember",$db_PostOppMember);
    
    ?>
