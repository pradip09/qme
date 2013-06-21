<?php

//$url = $_REQUEST['mamberurl'];
//echo $url;exit;


    $sql="select * from static_pages where vFileName='aboutus'";
    $aboutus=$obj->MySQLSelect($sql);
    #echo "<pre>";
    #print_r($aboutus);
    
    $sql1="select * from static_pages where vFileName='ourservice'";
    $ourservice=$obj->MySQLSelect($sql1);
    
    $sql2="select * from static_pages where vFileName='ourmission'";
    $ourmission=$obj->MySQLSelect($sql2);
    
    $sql3="select * from static_pages where vFileName='experience_qualifications_certifications'";
    $experience=$obj->MySQLSelect($sql3);



    $smarty->assign("ourservice",$ourservice);
    $smarty->assign("ourmission",$ourmission);
    $smarty->assign("experience",$experience);
    $smarty->assign("aboutus",$aboutus);
    
   
?>