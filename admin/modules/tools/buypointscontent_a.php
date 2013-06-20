<?php

$action = $_REQUEST['action'];
$Data = $_POST["Data"];

if($action == "edit")
{   
    if($_POST) {
	    $Data = $_POST['Data'];
	    foreach($Data as $key=>$val) {
            $Value = array(
                            'vDescription'=>$val
                            );
            $where = ' content_code  = "'.$key.'"';
                        
            $result  = $obj->MySQLQueryPerform('buy_points_content',$Value,'update',$where);                
        }
        if($result){
            $var_msg='Buy points Content Updated Successfully.';
        }else{
            $var_msg='Error-in updating Buy points Content.Please try again.';
        }
        header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-buypointscontent&mode=edit&var_msg=$var_msg");
	    exit;
    }
}

?>