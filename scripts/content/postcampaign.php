<?php
$sql_static_pages = "select * from static_pages where vPageCode = 'learnmore_campaign'";
$db_static_pages = $obj->MySQLSelect($sql_static_pages);
        
$sql_country = "select * from country_master";
$db_mycountry = $obj->MySQLSelect($sql_country);


    
$smarty->assign("db_static_pages", $db_static_pages);
$smarty->assign("db_mycountry",$db_mycountry);   
?>