<?php

 
   $generalobj->checkFrontAuthntication();
  
   $sMemberId = $_SESSION['iUserId'];
   $sMemberName = $_SESSION['Name'];
   $sMemberMail = $_SESSION['vEmail'];
   
   $member = "select * from members where iMemberId ='".$sMemberId."' ";
   $mem_info = $obj->MySQLSelect($member);
 
   
   if($mem_info[0]['dBirthdate'] !== '0000-00-00'){   
   $mem_info[0]['dBirthdate'] = date('m-d-Y',strtotime($mem_info[0]['dBirthdate']));
   }
   
   $sql_skill = "SELECT * FROM members WHERE iMemberId='".$sMemberId."'";
   $db_product = $obj->MySQLSelect($sql_skill);
   $relatedArr = explode(",",$db_product[0]['iSkillId']);
  //echo "<pre>";print_r($relatedArr);exit;
   $relatedArrIntrest = explode(",",$db_product[0]['iInterestId']);
  
   $sql_setting = "select * from general_setting where iMemberId = '".$sMemberId."' AND eStatus ='Active' ";
   $db_gen_setting = $obj->MySQLSelect($sql_setting);
   
   
   $sql_banner = "SELECT * FROM banner_image  WHERE iMemberId='".$sMemberId."' ORDER BY iBannerId";
   $db_banner_image_all = $obj->MySQLSelect($sql_banner);
   
   $db_banner_image = array();
   for($i=0,$j=0;$i<count($db_banner_image_all);$i++){
      if($db_banner_image_all[$i]['vBannerImage'] != ''  && is_file(TPATH_SERVER_IMAGES_MEMBER."/".$db_banner_image_all[$i]['iMemberId']."/banner/".$db_banner_image_all[$i]['vBannerImage'])){
	  $db_banner_image[$j]['iBannerId'] = $db_banner_image_all[$i]['iBannerId'];
	  $db_banner_image[$j]['vBannerImage'] = $db_banner_image_all[$i]['vBannerImage'];
	  $db_banner_image[$j]['iMemberId'] = $db_banner_image_all[$i]['iMemberId'];
	  $j++;
      }
   }
   
   $totUploadedBanner = count($db_banner_image);
   if(count($db_banner_image) > 0)
   {
      $totgal = count($db_banner_image);
      $flag=1;
   }
   else
   {
      $totgal = 1;
      $flag = 0;
   }
   $initBanner = 1;
   $totBanner = 5;
   $curBanner = 0;
   

   $sql_aboutus = "select * from aboutus_member where iMemberId = '".$sMemberId."'";
   $db_aboutus = $obj->MySQLSelect($sql_aboutus);
   //echo "<pre>";
   //print_r($db_aboutus);exit;
   
   $sql_country = "select * from country_master";
   $db_mycountry = $obj->MySQLSelect($sql_country);
   
   /*$sql_state = "select * from state_master";
   $db_state = $obj->MySQLSelect($sql_state);*/
   
   /*social networks */
   $iMemberId = $_SESSION['iUserId'];
   $sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
   $db_id = $obj->MySQLSelect($sql);
   
   if($db_id[0]['vFacebookUserName'] != '' && $db_id[0]['vFacebookAccessToken'] != '' && $db_id[0]['vFacebookName'] != ''){
      $isFacebookConnect = '1';
   }else{
      $isFacebookConnect = '0';
   }
   
   if($db_id[0]['vTwitterAccessToken'] != '' && $db_id[0]['vTwitteruserName'] != '' && $db_id[0]['vTwitteruserId'] != ''){
      $TwitterConnect = '1';
   }else{
      $TwitterConnect = '0';
   }

   $smarty->assign("TwitterConnect",$TwitterConnect);
   $smarty->assign("isFacebookConnect",$isFacebookConnect);
   $smarty->assign("relatedArrIntrest",$relatedArrIntrest);
   $smarty->assign("relatedArr",$relatedArr);
   $smarty->assign("db_aboutus",$db_aboutus);
   $smarty->assign("initBanner",$initBanner);
   $smarty->assign("totBanner",$totBanner);
   $smarty->assign("curBanner",$curBanner);
   $smarty->assign("totUploadedBanner",$totUploadedBanner);

   $smarty->assign("db_gen_setting",$db_gen_setting);
   $smarty->assign("db_banner_image",$db_banner_image);
   $smarty->assign("mem_info",$mem_info);
   $smarty->assign("sMemberName",$sMemberName);
   //$smarty->assign("country",$country);
   $smarty->assign("state",$state);
   $smarty->assign("totgal",$totgal);
   $smarty->assign("flag",$flag);
   $smarty->assign("db_state",$db_state);
   $smarty->assign("db_mycountry",$db_mycountry);
   //$smarty->assign("TPATH_ADMIN_CKEDITOR_URL",TPATH_ADMIN_CKEDITOR_URL);
?>