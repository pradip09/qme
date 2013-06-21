<?php
        session_start(); 
        $_SESSION['eTypeSearch']=$_REQUEST['eTypeSearch'];
	$eTypeSearch = $_SESSION['eTypeSearch'];
        $_SESSION['keyword']= $_REQUEST['searchqme'];
	$keyword = $_SESSION['keyword'];
	//echo $keyword.'/'.$eTypeSearch ;exit;
     
    ///$smarty->assign("eTypeSearch",$eTypeSearch);
    //$smarty->assign("iMemberId",$iMemberId);

?>