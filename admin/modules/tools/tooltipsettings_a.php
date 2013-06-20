<?php
#echo "<pre>";
#print_r($_POST);exit;
$action = $_REQUEST['action'];
$Data = $_POST["Data"];

if($action == "edit")
{
    
    if($_POST) {
        $Data = $_POST['Data'];


foreach($Data as $key=>$val) {
            $Value = array(
                            'vToolTipText'=>$val
                            );
            $where = ' vToolTipField  = "'.$key.'"';
	    //echo "<pre>";
	    //print_r($Data);
            $result  = $obj->MySQLQueryPerform('question_tool_tip',$Value,'update',$where);                
//echo "<pre>";
//print_r($where);exit;

        }
        if($result){
            $var_msg='Tool setting Updated Successfully.';
        }else{
            $var_msg='Error-in updating setting.Please try again.';
        }
        header("Location: ".$tconfig["tpanel_url"]."/index.php?file=to-tooltipsettings&mode=edit&var_msg=$var_msg");
	    exit;
    }
}

?>