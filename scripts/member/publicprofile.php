<?php

//echo count($_SESSION['iUserId']);exit;
$urll = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if($_SESSION['iUserId'] == ''){
        header("location:".$tconfig["tsite_url"]."/index.php?file=c-home&type=Signup");
	exit;
 }
$generalobj->checkFrontAuthntication();
$url = $_REQUEST['mamberurl'];
 
$sql_user = "select * from members where vMemberUrl='".$url."'";
$db_user = $obj->MySQLSelect($sql_user);

    
	if($db_user[0]['iMemberId'] == ''){
	    header("location:".$tconfig["tsite_url"]."/home");
	}else{
	    $userid = $db_user[0]['iMemberId'];
    
	$sql_banner = "select * from banner_image where iMemberId =".$userid." ORDER BY RAND()";
	$db_banner_all = $obj->MySQLSelect($sql_banner);
	
	for($i=0,$j=0;$i<count($db_banner_all);$i++){
	    
	    if($db_banner_all[$i]['vBannerImage'] != ''  && is_file(TPATH_SERVER_IMAGES_MEMBER."/".$db_banner_all[$i]['iMemberId']."/banner/".$db_banner_all[$i]['vBannerImage'])){
		$db_banner[$j]['iBannerId'] = $db_banner_all[$i]['iBannerId'];
		$db_banner[$j]['vBannerImage'] = $db_banner_all[$i]['vBannerImage'];
		$db_banner[$j]['iMemberId'] = $db_banner_all[$i]['iMemberId'];
		$j++;
	    }
	}
	
	
	}
	$sql_skill = "SELECT * FROM members WHERE iMemberId='".$userid."'";
	$db_product = $obj->MySQLSelect($sql_skill);
	$relatedArr = explode(",",$db_product[0]['iSkillId']);	
	$relatedArrIntrest = explode(",",$db_product[0]['iInterestId']);
        
	for($i = 0; $i < count($relatedArr); $i++)
	{
            $sql_skill = "SELECT * FROM skill WHERE iSkillId='".$relatedArr[$i]."'";
            $db_relatedArr[$i] = $obj->MySQLSelect($sql_skill);
        }
     
	 for($i = 0; $i < count($db_relatedArr); $i++)
	{
           $db_relatedArr[$i] = $db_relatedArr[$i][0]['vSkill'];
        }
     
	for($i = 0; $i < count($relatedArrIntrest); $i++)
	{
            $sql_intrest = "SELECT * FROM interest WHERE iInterestId='".$relatedArrIntrest[$i]."'";
            $relatedArrIntrest[$i] = $obj->MySQLSelect($sql_intrest);
        }
    
	for($i = 0; $i < count($relatedArrIntrest); $i++)
	{
           $db_relatedArrIntrest[$i] = $relatedArrIntrest[$i][0]['vInterest'];
        }
    
    $sql_mem_country = "select vCountry from country_master where iCountryId =".$db_user[0]['iCountryId'];
    $memCountry = $obj->MySQLSelect($sql_mem_country);
    $db_user[0]['vCountry'] = $memCountry[0]['vCountry'];
   
    $sql_mem_state = "select vState from state_master where iStateId =".$db_user[0]['iStateId'];
    $memState = $obj->MySQLSelect($sql_mem_state);
    $db_user[0]['vState'] = $memState[0]['vState'];
    
    $sql_countPhoto = "select * from photo where eStatus='Active' AND iMemberId =".$userid;
    $db_countPhoto = $obj->MySQLSelect($sql_countPhoto);
    $totPhoto = count($db_countPhoto);
    
    $sql_countCampaign = "select * from post_campaign where eStatus='Active' AND iMemberId =".$userid;
    $db_countCampaign = $obj->MySQLSelect($sql_countCampaign);
    $totCampaign = count($db_countCampaign);
    
    $sql_countJob = "select * from post_job where eStatus='Active' AND iMemberId =".$userid;
    $db_countJob = $obj->MySQLSelect($sql_countJob);
    $totJob = count($db_countJob);
    
    $sql_generalsetting = "select * from general_setting where eStatus='Active' AND iMemberId =".$userid;
    $db_generalsetting = $obj->MySQLSelect($sql_generalsetting);
    
    $frndcount = "select count(m.iMemberId) AS count from qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where m.eStatus ='Active' AND qf.eStatus='Approve' AND qf.iMemberId =".$userid;
    $db_frndcount = $obj->MySQLSelect($frndcount);
    
    $frndphoto = "select * from qme_friend AS qf LEFT JOIN members AS m ON(qf.iFriendId = m.iMemberId) where m.eStatus ='Active' AND qf.eStatus='Approve' AND qf.iMemberId =".$userid." ORDER BY dApproveDate DESC LIMIT 0,6";
    $db_frndphoto = $obj->MySQLSelect($frndphoto);
    #echo "<pre>";
    #print_r($db_frndphoto);exit;
    $checkfrnd = "select * from qme_friend where iMemberId =".$userid." AND iFriendId ='".$_SESSION['iUserId']."'";
    $checkfrnd = $obj->MySQLSelect($checkfrnd);
    $checkfrnd1 = "select * from qme_friend where iMemberId =".$_SESSION['iUserId']." AND iFriendId ='".$userid."'";
    $checkfrnd1 = $obj->MySQLSelect($checkfrnd1);
    
    if($checkfrnd1[0]['eStatus'] == 'Approve' AND $checkfrnd[0]['eStatus'] == 'Approve')
    {
	$check_frnd = 'Approve';
	
    }else if($checkfrnd1[0]['eStatus'] == 'Pending' AND $checkfrnd[0]['eStatus'] == 'Requested'){
	
	$check_frnd = 'Pending';
	
    }else if($checkfrnd1[0]['eStatus'] == 'Blocked'){
	$check_frnd = 'Blocked';
    }else if($checkfrnd1[0]['eStatus'] == 'Requested' AND $checkfrnd[0]['eStatus'] == 'Pending'){
	$check_frnd = 'Requested';
    }else if(count($checkfrnd)+count($checkfrnd1) != 2)
    {
	$check_frnd = 'Notsend';
    }
    for($i=0;$i<count($db_frndphoto);$i++){
		
		if($db_frndphoto[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$db_frndphoto[$i]['iMemberId']."/".$db_frndphoto[$i]['vProfileImage'])){
			$db_frndphoto[$i]['vProfileImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$db_frndphoto[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$db_frndphoto[$i]['iMemberId']."/"."4_".$db_frndphoto[$i]['vProfileImage'];
		}
	}
	
    $sql_earnpnts="select * from qme_earnpoints where iMemberId ='".$db_user[0]['iMemberId']."'";
    $earn_pnts = $obj->MySQLSelect($sql_earnpnts);
    $tot_earnpnt= $earn_pnts[0]['Total_earnpoints'];
    
    $sql_purchasepnts="select * from qme_purchagepnts where iMemberId ='".$db_user[0]['iMemberId']."'";
    $purchase_pnts = $obj->MySQLSelect($sql_purchasepnts);
    $tot_pursepnt = $purchase_pnts[0]['Total_purchagepoints'];    	
    $Total_pnts= $tot_earnpnt + $tot_pursepnt ;	
    //$Total_pnts = str_split($pieces);
    //echo "<pre>";print_r($pieces);exit;
        
    $sql_member = "select * from members  where  iMemberId='".$userid."'";
    $db_member = $obj->MySQLSelect($sql_member);
    $Zipcode = $db_member[0]['vZipCode'];
    $City = $db_member[0]['vCity'];
    $State = $db_member[0]['iStateId'];
     
    $sql_dist_news = "select * from distictnews where  iMemberId NOT IN('".$userid."')";
    $db_dist_news = $obj->MySQLSelect($sql_dist_news);
   
    for($i=0;$i<count($db_dist_news);$i++){
    
     $sql_zip_member = "select * from members  where  iMemberId='".$db_dist_news[$i]['iMemberId']."'";
     $db_zip_member[] = $obj->MySQLSelect($sql_zip_member);   
    }
	
     for($i=0;$i<count($db_zip_member);$i++){
     if($Zipcode == $db_zip_member[$i][0]['vZipCode']){
       $mem[$i]=$db_zip_member[$i][0]['iMemberId'];
       }
     }
     $Memid=implode('\',\'',$mem);
     $sql_result = "select * from members  where  iMemberId IN ('".$Memid."') limit 0,1";
     $db_distresult = $obj->MySQLSelect($sql_result);  
     
  
  
    $sql_city_news = "select * from citynews where  iMemberId NOT IN('".$userid."')";
    $db_city_news = $obj->MySQLSelect($sql_city_news);
    
    for($i=0;$i<count($db_city_news);$i++){
     
      $sql_city_member = "select * from members  where  iMemberId='".$db_city_news[$i]['iMemberId']."'";
      $db_city_member[] = $obj->MySQLSelect($sql_city_member);   
     }
    for($i=0;$i<count($db_city_member);$i++){
	
      $selectState= $db_city_member[$i][0]['iStateId'];
      $selectCity= $db_city_member[$i][0]['vCity'];
       
    if(trim($City) == trim($selectCity) || trim($State) == trim($selectState)){     
      $mem_city[$i]=$db_city_member[$i][0]['iMemberId'];
      }
     }
     $Memid_city=implode('\',\'',$mem_city);
     
     $sql_result1 = "select * from members  where  iMemberId IN ('".$Memid_city."') ORDER BY iMemberId ASC limit 0,1";
     $db_cityresult = $obj->MySQLSelect($sql_result1);  
  
    
    $sql_album = "SELECT sa.*,count(s.iSongAlbumId) AS count from song_album AS sa LEFT JOIN song AS s ON(sa.iSongAlbumId =  s.iSongAlbumId) where sa.eStatus='Active' AND sa.iMemberId='".$userid."' GROUP BY sa.iSongAlbumId";
    $SongCategoryArr =$obj->MySQLSelect($sql_album);
    $songalb=count($SongCategoryArr);
  
    $sql_song = "SELECT * FROM  song where  eStatus='Active' AND iMemberId='".$userid."' AND  iSongAlbumId= '0'";
    $result =$obj->MySQLSelect($sql_song);
    $song=count($result);
    // echo "<pre>";
    //print_r($song);exit;
    
    $sql_vidalbum = "SELECT va.*,count(v.iVideoAlbumId) AS count from video_album AS va LEFT JOIN video AS v ON(va.iVideoAlbumId =  v.iVideoAlbumId) where va.eStatus='Active' AND va.iMemberId='".$userid."' GROUP BY va.iVideoAlbumId";
    $VideoCategoryArr =$obj->MySQLSelect($sql_vidalbum);

    $sql_vid = "SELECT * FROM  video where eStatus='Active' AND iMemberId='".$userid."' AND  iVideoAlbumId= '0'";	
    $video =$obj->MySQLSelect($sql_vid);
    
    $sqlevent="SELECT * FROM events WHERE iMemberId = '".$userid."'  AND eStatus = 'Active'";
    $db_events = $obj->MySQLSelect($sqlevent);
    $event =count($db_events);
    
    $sqlblog="SELECT * FROM blog WHERE iMemberId = '".$userid."' AND eStatus = 'Active'";
    $db_blogs = $obj->MySQLSelect($sqlblog);
    $blog =count($db_blogs);   
    
    $sql_aboutus = "select * from aboutus_member where iMemberId = '".$userid."'";
    $db_aboutus = $obj->MySQLSelect($sql_aboutus);
    
    
    
    
    
    
    
    
    
    $aboutus =count($db_aboutus);
    $smarty->assign("db_distresult",$db_distresult);
    $smarty->assign("db_cityresult",$db_cityresult);
    $smarty->assign("Total_pnts",$Total_pnts);
    $smarty->assign("db_frndphoto",$db_frndphoto);
    $smarty->assign("check_frnd",$check_frnd);
    $smarty->assign("frnd_count",$db_frndcount[0]['count']);
    $smarty->assign("db_generalsetting",$db_generalsetting);
    $smarty->assign("db_user",$db_user);
    $smarty->assign("db_relatedArrIntrest",$db_relatedArrIntrest);
    $smarty->assign("db_relatedArr",$db_relatedArr);
    $smarty->assign("db_banner",$db_banner);
    $smarty->assign("totPhoto",$totPhoto);
    $smarty->assign("totCampaign",$totCampaign);
    $smarty->assign("totJob",$totJob);
    $smarty->assign("url",$url);
    $smarty->assign("urll",$urll);
    $smarty->assign("songalb",$songalb);
    $smarty->assign("song",$song);
    $smarty->assign("VideoCategoryArr",$VideoCategoryArr);
    $smarty->assign("video",$video);
    $smarty->assign("event",$event);
    $smarty->assign("blog",$blog);
    $smarty->assign("aboutus",$aboutus);
	
?>