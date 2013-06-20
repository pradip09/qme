<?php

$action = $_REQUEST['action'];
$Citynews = $_POST['iCitynewsId'];

if($Citynews != ''){
    $sql="Delete from citynews";
    $db_sql=$obj->sql_query($sql);	

}

if($action == 'edit' && $db_sql != ''){
   for($i=0;$i<count($Citynews);$i++){
        $Data[$i]['iMemberId']=$Citynews[$i];  
        $id = $obj->MySQLQueryPerform("citynews",$Data[$i],'insert');
   }
}

if($id)$var_msg = "Member profile Added Successfully.";else $var_msg="Eror-in Add.";
header("Location: ".$tconfig["tpanel_url"]."/index.php?file=n-citynews&mode=edit&var_msg=$var_msg");



?>