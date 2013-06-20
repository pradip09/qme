<?php

$action = $_REQUEST['action'];
$Data = $_POST["Data"];

if($action == "edit")
{   
    if($_POST) {
	    $Data = $_POST['Data'];
	    foreach($Data as $key=>$val) {
            $Value = array(
                            'vValue'=>$val
                            );
            $where = ' vName  = "'.$key.'"';
                        
            $result  = $obj->MySQLQueryPerform('configurations',$Value,'update',$where);                
        }
        if($result){
            $var_msg='Setting Updated Successfully.';
        }else{
            $var_msg='Error-in updating setting.Please try again.';
        }
        header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-generalsettings&mode=edit&var_msg=$var_msg");
	    exit;
    }
}

?>