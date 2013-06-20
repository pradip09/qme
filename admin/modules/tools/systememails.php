<?php
    
    $mode = $_REQUEST['mode'];
    $iEmailTemplateId = $_REQUEST['iEmailTemplateId'];
    
    if($iEmailTemplateId !=''){
        $sql_cat = "SELECT * FROM system_email  WHERE iEmailTemplateId='".$iEmailTemplateId."'";
        $db_system_email = $obj->MySQLSelect($sql_cat);
    }
    
    
    $smarty->assign("mode",$mode);
    $smarty->assign("db_system_email",$db_system_email);
    $smarty->assign("iEmailTemplateId",$iEmailTemplateId);
    $smarty->assign("TPATH_ADMIN_CKEDITOR_URL",TPATH_ADMIN_CKEDITOR_URL);
?>