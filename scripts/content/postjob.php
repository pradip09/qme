<?php

    $sqlState = "select iStateId, vState from state_master where vCountryCode ='US' ";
    $db_state = $obj->MySQLSelect($sqlState);
    
    $mode='add';
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_postjob",$db_postjob);
    $smarty->assign("db_state",$db_state);
?>