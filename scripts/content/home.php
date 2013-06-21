<?php

if(isset($_REQUEST['url']) == true && $_REQUEST['url'] != ''){
    $url = $_REQUEST['url'];
    //$url = str_replace("qme/","",$url);
    //$url = substr($url,"qme");
   
}else{
    $url = '';
}
if(isset($_REQUEST['type']))
{
    $type= $_REQUEST['type'];
}else{
    $type= '';
}
$smarty->assign("url",$url);
$smarty->assign("type",$type);


    $sql="select * from static_pages where vFileName='What is MYQME'";
    $qme=$obj->MySQLSelect($sql);

    $sql1="select * from static_pages where vFileName='Professional'";
    $professional=$obj->MySQLSelect($sql1);
    
    $sql2="select * from static_pages where vFileName='Non Profit'";
    $non_profit=$obj->MySQLSelect($sql2);
    
    $sql3="select * from static_pages where vFileName='Content Producer'";
    $content=$obj->MySQLSelect($sql3);
    
    $sql4="select * from static_pages where vFileName='Job Seekers'";
    $job_seekers=$obj->MySQLSelect($sql4);
    
    $sql5="select * from static_pages where vFileName='Members'";
    $members=$obj->MySQLSelect($sql5);
    
    $sql6="select * from static_pages where vFileName='Biz'";
    $biz=$obj->MySQLSelect($sql6);

    $sql7="select * from static_pages where vFileName='Artist'";
    $artist=$obj->MySQLSelect($sql7);
    
    if(strlen($professional[0]['lContents'])>120){
			$professional[0]['lContents1']=substr($professional[0]['lContents'],0,120).'..';
    }else{
	$professional[0]['lContents1'] = $professional[0]['lContents'];
    }
    if(strlen($non_profit[0]['lContents'])>120){
			$non_profit[0]['lContents1']=substr($non_profit[0]['lContents'],0,120).'..';
    }else{
	$non_profit[0]['lContents1'] = $non_profit[0]['lContents'];
    }
    if(strlen($content[0]['lContents'])>120){
			$content[0]['lContents1']=substr($content[0]['lContents'],0,120).'..';
    }else{
	$content[0]['lContents1'] = $content[0]['lContents'];
    }
    if(strlen($job_seekers[0]['lContents'])>90){
			$job_seekers[0]['lContents1']=substr($job_seekers[0]['lContents'],0,90).'..';
    }else{
	$job_seekers[0]['lContents1'] = $job_seekers[0]['lContents'];
    }
    if(strlen($members[0]['lContents'])>90){
			$members[0]['lContents1']=substr($members[0]['lContents'],0,90).'..';
    }else{
	$members[0]['lContents1'] = $members[0]['lContents'];
    }
    if(strlen($biz[0]['lContents'])>90){
			$biz[0]['lContents1']=substr($biz[0]['lContents'],0,90).'..';
    }else{
	$biz[0]['lContents1'] = $biz[0]['lContents'];
    }
    if(strlen($artist[0]['lContents'])>90){
			$artist[0]['lContents1']=substr($artist[0]['lContents'],0,90).'..';
    }else{
	$artist[0]['lContents1'] = $artist[0]['lContents'];
    }
    
    
    
     $ssql1="select * from banner_tab where eBannerType='MEMBERS'";
     $hometabmember=$obj->MySQLSelect($ssql1);
     $ssql2="select * from banner_tab where eBannerType='PROFESSIONALS'";
     $hometabpro=$obj->MySQLSelect($ssql2);
     $ssql3="select * from banner_tab where eBannerType='BUSINESSES'";
     $hometabbus=$obj->MySQLSelect($ssql3);
     $ssql4="select * from banner_tab where eBannerType='NON-PROFITS'";
     $hometabnonprofit=$obj->MySQLSelect($ssql4);
    
    /*
    #echo "<pre>";
    #print_r($hometab); exit;
    */
    
    #echo "<pre>";
    #print_r($professional);exit;
    
    $smarty->assign("hometabmember",$hometabmember);
    $smarty->assign("hometabpro",$hometabpro);
    $smarty->assign("hometabbus",$hometabbus);
    $smarty->assign("hometabnonprofit",$hometabnonprofit);
    $smarty->assign("qme",$qme);
    $smarty->assign("professional",$professional);
    $smarty->assign("non_profit",$non_profit);
    $smarty->assign("content",$content);
    $smarty->assign("job_seekers",$job_seekers);
    $smarty->assign("members",$members);
    $smarty->assign("biz",$biz);
    $smarty->assign("artist",$artist);
    
?>