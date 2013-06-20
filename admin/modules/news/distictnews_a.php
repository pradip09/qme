<?php

$action = $_REQUEST['action'];
$Distnews = $_POST['iDistictId'];

if($Distnews != ''){
    $sql="Delete from distictnews";
    $db_sql=$obj->sql_query($sql);	

}
if($action == 'edit' && $db_sql != ''){
    for($i=0;$i<count($Distnews);$i++){
        $Data[$i]['iMemberId']=$Distnews[$i];
        $id = $obj->MySQLQueryPerform("distictnews",$Data[$i],'insert');    
        }
}

    if($id)$var_msg = "Member profile Added Successfully.";else $var_msg="Eror-in Add.";
    header("Location: ".$tconfig["tpanel_url"]."/index.php?file=n-distictnews&mode=edit&var_msg=$var_msg");


?>