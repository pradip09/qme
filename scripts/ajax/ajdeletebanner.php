<?php
    $iBannerId = $_REQUEST['iBannerId'];
    $bannerNum = $_REQUEST['bannerNum'];
    
    $Data = array();
    $Data['vBannerImage'] = '';
    
    $where = " iBannerId = '".$iBannerId."'";
    
    $sql="select * from banner_image where ".$where; 
    $db_sql=$obj->sql_query($sql);
    
    $dest = $path.'/'.$db_sql[0]['iMemberId'].'/banner/'.$db_sql[0]['vBannerImage'];
    unlink($dest);
    
    $Data_gal['vBannerImage'] = '';
    #$sql="Delete from banner_image where ".$where; 
    $ban = $obj->MySQLQueryPerform("banner_image",$Data_gal,'update',$where);
    #$db_sql=$obj->sql_query($sql);
?>