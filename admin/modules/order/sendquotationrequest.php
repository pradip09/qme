<?php
#echo "<pre>";
#print_r($_REQUEST);exit;
$iEstimateId = $_REQUEST['iEstimateId'];

$sql_Est = "SELECT e.*,concat(u.vFirstName,' ',u.vLastName) AS Name  FROM  estimates AS e LEFT JOIN users AS u ON(u.iUserId=e.iUserId)
where 1=1 AND e.iEstimateId='".$iEstimateId."' order by e.iEstimateId DESC";
$EstArr = $obj->MySQLSelect($sql_Est);


$sql_estor = "select * from "




?>