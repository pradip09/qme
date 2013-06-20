<?php
    
    $mode = $_REQUEST['mode'];
    $iChannelId = $_REQUEST['iChannelId'];
    $ChannelMode=array('Qme Tv','Qme Gamming');
    if($iChannelId !=''){
        $sql_channel = "SELECT * FROM channel  WHERE iChannelId='".$iChannelId."'";	
        $db_channel = $obj->MySQLSelect($sql_channel);
    }
    
    $sqlMember = "select iMemberId,vName from members";
    $db_ChannelMember = $obj->MySQLSelect($sqlMember);
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_channel",$db_channel);
    $smarty->assign("iChannelId",$iChannelId);
    $smarty->assign("db_ChannelMember",$db_ChannelMember);
    $smarty->assign("ChannelMode",$ChannelMode);
    
?>
