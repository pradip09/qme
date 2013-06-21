<?php

$iMemberId = $_SESSION['iUserId'];
ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();


    $mode = $_REQUEST['mode'];
    $iCampaignId = $_REQUEST['iCampaignId'];
    $path = TPATH_SERVER_IMAGES_CAMPAIGN;
    $Data = array();
    $Data['iMemberId'] = $_SESSION['iUserId'];
    $Data['vCampaignName'] = $_REQUEST['vCampaignName'];
    $Data['vIndustry'] = $_REQUEST['vIndustry'];
    $Data['vProductName'] =$_REQUEST['vProductName'];
    $Data['tContent'] = $_REQUEST['tContent'];
    $Data['vOtherinterest'] = $_REQUEST['vOtherinterest'];
    $Data['vOtherskill'] = $_REQUEST['vOtherskill'];
    $Data['vZipCode'] = $_REQUEST['vZipCode'];
    $Data['vMileRadius'] = $_REQUEST['vMileRadius'];
    $Data['iCountryId'] = $_REQUEST['iCountryId'];
    $Data['iStateId'] = $_REQUEST['iStateId'];
    $Data['vCity'] = $_REQUEST['vCity'];
    $Data['dStartDate'] = $_REQUEST['dStartDate'];
    $Data['dFinishDate'] = $_REQUEST['dFinishDate'];
    $Data['iPointsViewingAd'] = $_REQUEST['iPointsViewingAd'];
    $Data['iPointsListenAd'] = $_REQUEST['iPointsListenAd'];
    $Data['iPointsCommercialAd'] = $_REQUEST['iPointsCommercialAd'];
    $Data['vURL'] = $_REQUEST['vURL'];
    $Data['iPointsWeblinkAd'] = $_REQUEST['iPointsWeblinkAd'];
    $Data['vBuyLinkURL'] = $_REQUEST['vBuyLinkURL'];
    $Data['iItemCost'] = $_REQUEST['iItemCost'];
    $Data['iItemDiscount'] = $_REQUEST['iItemDiscount'];    
    $Data['iPontsWhenBuy'] = $_REQUEST['iPontsWhenBuy'];
    $Data['iPointsWhenShare'] = $_REQUEST['iPointsWhenShare'];
    if ($_REQUEST['eEarnPoints'] == 'on'){
      $Data['eEarnPoints']='Yes';   
    } else {
      $Data['eEarnPoints']='No';   
    }
   
    if ($_REQUEST['ePurchagePoints'] == 'on'){
      $Data['ePurchagePoints']='Yes';   
    } else {
      $Data['ePurchagePoints']='No';   
    }
   
    $Data['iNumMatchInCommunity'] = $_REQUEST['iNumMatchInCommunity'];
    $Data['iNumMatchOutCommunity'] = $_REQUEST['iNumMatchOutCommunity'];
    $Data['iNumSupportBiz'] = $_REQUEST['iNumSupportBiz'];
    $Data['iMaxAdViews'] = $_REQUEST['iMaxAdViews'];
    $Data['iMaxAdClicks'] = $_REQUEST['iMaxAdClicks'];
    $Data['dAddedDate'] = date('Y-m-d H:i:s');
    $Data['iInterestId'] = implode(",",$_POST['iInterestId']);
    $Data['iSkillId'] = implode(",",$_POST['iSkillId']);
    $eSendEachMyCommunity=$_REQUEST['eSendEachMyCommunity'];
    $eSendEachOutCommunity=$_REQUEST['eSendEachOutCommunity'];
    $eSendEachSupportBiz=$_REQUEST['eSendEachSupportBiz'];
    $vZipCode=$Data['vZipCode'] ;
    $InterestArr=$Data['iInterestId'];
    $iSkillId=$Data['iSkillId'];
    $vOtherInterest=$Data['vOtherinterest'];
    $vOtherSkill=$Data['vOtherskill'];
    
  
    list($m, $d, $y) = explode('-', $_REQUEST['dStartDate']);
    $Data['dStartDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
    list($m, $d, $y) = explode('-', $_REQUEST['dFinishDate']);
    $Data['dFinishDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
    if($_REQUEST['eIsLocal']){ $Data['eIsLocal'] = 'Yes'; } else{ $Data['eIsLocal'] = 'No'; }
    if($_REQUEST['eIsNational']){ $Data['eIsNational'] = 'Yes'; } else{ $Data['eIsNational'] = 'No'; }
    
    $memberId = $_SESSION['iUserId'];
    if(!is_dir($path."/member")){
        @mkdir($path."/member", 0777);
    }
    if(!is_dir($path."/member/".$memberId)){
        @mkdir($path."/member/".$memberId, 0777);
    }
    if ($_FILES['vImage']['name'] != "") {
    $PARAM_ARRAY = array
        (
         "TARGET_DIR" =>$path."/member/".$memberId,
                array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
                array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
                array('WIDTH_HEIGHT' => "478X300", 'PREFIX' => "2"),
                array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
        );
        $image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
        if($image !=''){ $Data['vImage'] = $image; }
    }
    
    if ($_FILES['vMp3File']['name'] != "") {
        $mp3 = move_uploaded_file($_FILES["vMp3File"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vMp3File"]["name"]);
        if($mp3) { $Data['vMp3File'] = $_FILES["vMp3File"]["name"]; }
    }
    if ($_FILES['vVideoFile']['name'] != "") {
        $video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/member/".$memberId."/".$_FILES["vVideoFile"]["name"]);
        if($video) { $Data['vVideoFile'] = $_FILES["vVideoFile"]["name"]; }
    }
    
    
function getLatLong($code,$country){
   //$mapsApiKey = 'your-google-maps-api-key';
   $query = "http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=".urlencode($code)."&country=".$country."&style=full";
   //http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=NC%2011001&country=USA&style=full
   $data = file_get_contents($query);
   if($data)
   {
      $data = json_decode($data);
      $long = $data->postalcodes[0]->lng;
      $lat = $data->postalcodes[0]->lat;
      return array('Latitude'=>$lat,'Longitude'=>$long);   
   }
   else{
      return false;
   }
}

function getLatLongmul($code,$mulcountry){
   //$mapsApiKey = 'your-google-maps-api-key';
   $query = "http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=".urlencode($code)."&country=".$mulcountry."&style=full";
   //http://ws.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=NC%2011001&country=USA&style=full
   $data = file_get_contents($query);
    
   if($data)
   {
      $data = json_decode($data);
      $long = $data->postalcodes[0]->lng;
      $lat = $data->postalcodes[0]->lat;
      return array('Latitude'=>$lat,'Longitude'=>$long);   
   }
   else{
      return false;
   }

}
    
if($mode == "add")
    {
	
    $iMemberId = $_SESSION['iUserId'];
    $id = $obj->MySQLQueryPerform("post_campaign",$Data,'insert');
    $newId = $id;
    
    //Twitter Status Update Start
    $twUploadType = 'POSTCAMPAIGN';
    $twPostcampId = $newId;
    include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
    //Twitter Status Update End
        
    //Facebook Status Update Start
    $fbUploadType = 'POSTCAMPAIGN';
    $fbPostcampId = $newId;
    include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
    //Facebook Status Update End
        
    $sql_country = "select * from country_master where iCountryId = '".$Data['iCountryId']."'";
    $db_country = $obj->MySQLSelect($sql_country);
    $country=$db_country[0]['vCountryCode'];

    $details=array();
    $details = getLatLong($vZipCode,$country);
    
    $Latitude =$details['Latitude'];
    $Longitude =$details['Longitude'];


//$sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$InterestArr.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$Data['iCountryId']." and iStateId=".$Data['iStateId']." and vCity='".$Data['vCity']."'";
//$db_member = $obj->MySQLSelect($sql_member);
if($vOtherInterest == '' && $vOtherSkill == '' ){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.")) and (iInterestId IN (".$InterestArr.")) and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member);
}else if($vOtherInterest != '' && $vOtherSkill != ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$InterestArr.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member); 
}else if($vOtherInterest != '' && $vOtherSkill == ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.")) and (iInterestId IN (".$InterestArr.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member); 
}else if($vOtherInterest == '' && $vOtherSkill != ''){
   $sql_member = "select * from members  where  (iSkillId IN (".$iSkillId.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$InterestArr.")) and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
   $db_member = $obj->MySQLSelect($sql_member);  
}

//echo "<pre>";
//print_r($sql_member);exit;
for($i=0;$i<count($db_member);$i++)
{
$mulzip[]=$db_member[$i]['vZipCode'];
$mem_country[$i] =$db_member[$i]['iCountryId'];
$sql_country_one = "select * from country_master where iCountryId = '".$mem_country[$i]."'";
$db_country_one= $obj->MySQLSelect($sql_country_one);
$mulcountry[$i]=$db_country_one[0]['vCountryCode'];
$mul_details=array();
$mul_details= getLatLongmul($mulzip[$i],$mulcountry[$i]);
$Latitudemul[]=$mul_details['Latitude'];
$Longitudemul[]=$mul_details['Longitude'];

}


if($eSendEachMyCommunity == 'on' ){
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){
     //$sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul."*pi()/180)) * cos(((".$Longitude."- ".$Longitudemul.")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` WHERE 'distance' <= '".$vMileRadius."' AND iMemberId = '".$db_member[$i]['iMemberId']."'";
      $sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= 3 AND iMemberId = '".$db_member[$i]['iMemberId']."'";
     $db_mem_count[]= $obj->MySQLSelect($sql);
  
 if(!empty($db_mem_count))
   {$cnt++;}
   else{
   
   }
  }
  
}
}

$sql_user_qme = "select * from members where  iMemberId='".$iMemberId."' ";
$db_user_qme = $obj->MySQLSelect($sql_user_qme);
 
for($y=0;$y<count($db_mem_count);$y++){
    for($x=0;$x<count($db_mem_count[$y]);$x++){
	
    $memid=$db_mem_count[$y][$x]['iMemberId'];
    $email_to=$db_mem_count[$y][$x]['vEmail'];
    //$email_to="bamadeb.upadhyaya@php2india.com";
    $NAME= $db_mem_count[$y][$x]['vName'];
    $sql_data = "select * from post_campaign where iMemberId ='".$memid."' ";
    $db_campaign = $obj->MySQLSelect($sql_data);
     $sql_email_buzz= "SELECT * FROM members u LEFT JOIN general_setting o ON ( u.iMemberId = o.iMemberId )  WHERE  u.iMemberId=".$memid." AND `eSupportBusiness` =  'Yes' ";
    $db_email_buzz[]= $obj->MySQLSelect($sql_email_buzz); 
    $comname= $db_campaign[$x]['vCampaignName'] ;
    $memberurl= $db_user_qme[0]['vMemberUrl'];
    $user= $db_user_qme[0]['vName'];
    $url = $site_url.'/postcamp_detail/'.$memberurl.'/'.$id;
    if($iMemberId != $memid){
	$body_arr = Array("#NAME#","#USER#","#CAMPAIGNNAME#","#SITE_URL#","#MAIL_FOOTER#");
	$post_arr = Array($NAME,$user,$comname,$url,$MAIL_FOOTER);
	$mailObj->Send("POST_COMPAIGN","Member",$email_to,$body_arr,$post_arr);
    }
    
}
}

if($eSendEachOutCommunity == 'on' ){
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){
     //$sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul."*pi()/180)) * cos(((".$Longitude."- ".$Longitudemul.")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` WHERE 'distance' <= '".$vMileRadius."' AND iMemberId = '".$db_member[$i]['iMemberId']."'";
      $sql_out="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance>= 3 AND iMemberId = '".$db_member[$i]['iMemberId']."'";
     $db_mem_count_out[]= $obj->MySQLSelect($sql_out);
 
 if(!empty($db_mem_count_out))
   {$count++;}
   else{
   
   }
  }
  
}
}


for($y=0;$y<count($db_mem_count_out);$y++){
    for($x=0;$x<count($db_mem_count_out[$y]);$x++){
	
    $memid=$db_mem_count_out[$y][$x]['iMemberId'];
    $email_to=$db_mem_count_out[$y][$x]['vEmail'];
    //$email_to="bamadeb.upadhyaya@php2india.com";
    $NAME= $db_mem_count_out[$y][$x]['vName'];
    
    $sql_data = "select * from post_campaign where iMemberId ='".$memid."' ";
    $db_campaign = $obj->MySQLSelect($sql_data);
    $sql_email_buz = "SELECT * FROM members u LEFT JOIN general_setting o ON ( u.iMemberId = o.iMemberId )  WHERE  u.iMemberId=".$memid." AND `eSupportBusiness` =  'Yes' ";
    $db_email_buz_out[]= $obj->MySQLSelect($sql_email_buz); 
    $comname= $db_campaign[$x]['vCampaignName'] ;
    $memberurl= $db_user_qme[0]['vMemberUrl'];
    $user= $db_user_qme[0]['vName'];
    $url = $site_url.'/postcamp_detail/'.$memberurl.'/'.$id;
    if($iMemberId != $memid){
	$body_arr = Array("#NAME#","#USER#","#CAMPAIGNNAME#","#SITE_URL#","#MAIL_FOOTER#");
	$post_arr = Array($NAME,$user,$comname,$url,$MAIL_FOOTER);
	$mailObj->Send("POST_COMPAIGN","Member",$email_to,$body_arr,$post_arr);
    }
    
}
}
  
if($eSendEachSupportBiz == 'on' ){

    for($y=0;$y<count($db_email_buzz);$y++){
    for($x=0;$x<count($db_email_buzz[$y]);$x++){
        $iMemberid=$db_email_buzz[$y][$x]['iMemberId'];
        $email_to=$db_email_buzz[$y][$x]['vEmail'];
        //$email_to="bamadeb.upadhyaya@php2india.com";
        $NAME= $db_email_buzz[$y][$x]['vName'];
        //print_r($NAME);
        $sql_dataa = "select * from post_campaign where iMemberId ='".$iMemberid."' ";
        $db_campaignn = $obj->MySQLSelect($sql_dataa);
        $memberurl= $db_user_qme[0]['vMemberUrl'];
        $user= $db_user_qme[0]['vName'];
        $url = $site_url.'/postcamp_detail/'.$memberurl.'/'.$id;
        $comname= $db_campaignn[$y]['vCampaignName'] ;
    if($iMemberId != $iMemberid){    
    $body_arr = Array("#NAME#","#USER#","#CAMPAIGNNAME#","#SITE_URL#","#MAIL_FOOTER#");
    $post_arr = Array($NAME,$user,$comname,$url,$MAIL_FOOTER);
    $mailObj->Send("POST_COMPAIGN","Member",$email_to,$body_arr,$post_arr);
    }
    }
}

  for($y=0;$y<count($db_email_buz_out);$y++){
    for($x=0;$x<count($db_email_buz_out[$y]);$x++){

        $iMemberid=$db_email_buz_out[$y][$x]['iMemberId'];
        $email_to=$db_email_buz_out[$y][$x]['vEmail'];
        //$email_to="bamadeb.upadhyaya@php2india.com";
        $NAME= $db_email_buz_out[$y][$x]['vName'];
        
        $sql_data = "select * from post_campaign where iMemberId ='".$iMemberid."' ";
        $db_campaign = $obj->MySQLSelect($sql_data);
        $memberurl= $db_user_qme[0]['vMemberUrl'];
        $user= $db_user_qme[0]['vName'];
        $url = $site_url.'/postcamp_detail/'.$memberurl.'/'.$id;
        $comname= $db_campaign[$y]['vCampaignName'] ;
    if($iMemberId != $iMemberid){    
    $body_arr = Array("#NAME#","#USER#","#CAMPAIGNNAME#","#SITE_URL#","#MAIL_FOOTER#");
    $post_arr = Array($NAME,$user,$comname,$url,$MAIL_FOOTER);
    $mailObj->Send("POST_COMPAIGN","Member",$email_to,$body_arr,$post_arr);
    }
    }
    }

}
  
    if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'post_campaign';
	$Recent['iTypeId'] = $id;
        $Recent['vImage'] = $Data['vImage'];
	$Recent['vDescription'] = $_SESSION['Name'].' added new post compaign.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vCampaignName'];
	$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
	
    }elseif($mode == "edit"){
        //echo "<pre>";
        //print_r($Data);exit;
        $iCampaignId = $_REQUEST['iCampaignId'];
	$where = " iCampaignId = '".$iCampaignId."'";
        $id = $obj->MySQLQueryPerform("post_campaign",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
	{
	$word = 'his';
	}elseif($_SESSION['eGender'] == 'Female'){
	$word = 'her';
	}else{
	$word = '';
	}
        $Recent['iMemberId'] = $Data['iMemberId'];
	$Recent['eType'] = 'post_campaign';
	$Recent['iTypeId'] = $iCampaignId;
        //$Recent['vImage'] = $Data['vImage'];
        if($Data['vImage'] != ''){
	    $Recent['vImage'] = $Data['vImage'];
	}else{
	    $Recent['vImage'] = $_REQUEST['vOldImage'];
	}
	$Recent['vDescription'] = $_SESSION['Name'].' updated post compaign.';
	$Recent['dAddedDate'] = $Data['dAddedDate'];
	$Recent['eNameActivity'] =$Data['vCampaignName'];
        $id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
        
    }
    
    if($id){$var_msg = "Campaign Posted successfully"; }
    else{$var_msg = 'Error in Posting Campaign';}
    echo $var_msg; exit;
    
   
    
?>

