<?php


    $iFAQCategoryId = $_REQUEST['iFAQCategoryId'];
    
    $sql1 = "select * from faq_category where iFAQCategoryId !='12' order by iFAQCategoryId DESC";
    $db_faqcatnam = $obj->MySQLSelect($sql1);
    #echo "<pre>";
    #print_r($db_faqcatnam);exit;
 
     $smarty->assign("db_faqcate",$db_faqcate);
     $smarty->assign("db_faqcatnam",$db_faqcatnam);
?>