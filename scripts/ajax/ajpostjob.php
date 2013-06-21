<?php
//echo "<pre>";
//print_r($_REQUEST);exit;
ob_clean();
include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();
$mode = $_REQUEST['mode'];
$iPostJobId = $_REQUEST['iPostJobId'];

    $iMemberId = $_SESSION['iUserId'];
    $vOtherSkill = $_REQUEST['vSkill'];
    $skill=$_REQUEST['iSkillId'];
    $relatedArr =  implode(",",$skill);
    $iInterestId=$_REQUEST['iInterestId'];
    $relatedinterest =  implode(",",$iInterestId);
    $vOtherInterest=$_REQUEST['vOtherInterest'];
    $eHideEvent = $_REQUEST['eHideEvent'];
    $inviteqmein = $_REQUEST['inviteqmein'];
    $tDescription = $_REQUEST['tDescription'];
    $iCountryId = $_REQUEST['iCountryId'];
    $iStateId = $_REQUEST['iStateId'];
    $vCity = $_REQUEST['vCity'];
    $vZip = $_REQUEST['vZip'];
    $vMile = $_REQUEST['vMile'];
    $dAddedDate = date('Y-m-d H:i:s');
    
$sql_country = "select * from country_master where iCountryId = '".$iCountryId."'";
$db_country = $obj->MySQLSelect($sql_country);
$country=$db_country[0]['vCountryCode'];
    
$details=array();
$details = getLatLong($vZip,$country);
$Latitude =$details['Latitude'];
$Longitude =$details['Longitude'];
//print_r($details);

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

$sql_member = "select * from members  where (iSkillId IN (".$relatedArr.") OR  `vOtherSkill` = '".$vOtherSkill."') and (iInterestId IN (".$relatedinterest.") OR `vOtherInterest` = '".$vOtherInterest."') and iCountryId= ".$iCountryId." and iStateId=".$iStateId." and vCity='".$vCity."'";
$db_member = $obj->MySQLSelect($sql_member);

$mul_details=array();
for($i=0;$i<count($db_member);$i++)
{
$mulzip[]=$db_member[$i]['vZipCode'];
$mem_country[$i] =$db_member[$i]['iCountryId'];
//$mem_id[]=$db_member[$i]['iMemberId'];

$sql_country_one = "select * from country_master where iCountryId = '".$mem_country[$i]."'";
$db_country_one= $obj->MySQLSelect($sql_country_one);
$mulcountry[$i]=$db_country_one[0]['vCountryCode'];
$mul_details= getLatLongmul($mulzip[$i],$mulcountry[$i]);
$Latitudemul[]=$mul_details['Latitude'];
$Longitudemul[]=$mul_details['Longitude'];


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


$cnt=0;
//$email=array();
if(isset($details['Longitude']) && isset($details['Latitude']) && ($Latitudemul) != '' && $Longitudemul != ''){
  for($i=0;$i<count($db_member);$i++){

     $sql="SELECT *,(((acos(sin((".$Latitude."*pi()/180)) * sin((".$Latitudemul[$i]."*pi()/180))+cos((".$Latitude."*pi()/180)) *  cos((".$Latitudemul[$i]."*pi()/180)) * cos(((".$Longitude." - ".$Longitudemul[$i].")*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= ".$vMile." AND iMemberId = '".$db_member[$i]['iMemberId']."'";
//SELECT *,(((acos(sin((40.298988*pi()/180)) * sin((40.261767*pi()/180))+cos((40.298988*pi()/180)) *  cos((40.261767*pi()/180)) * cos(((-76.847194 - -76.883079)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM `members` having distance<= 5 AND iMemberId = '26'
   //$sql="SELECT acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) as 'Distance' FROM members WHERE acos(sin(".$Latitude.") * sin(".$Latitudemul.") + cos(".$Latitude.") * cos(".$Latitudemul.") * cos(".$Longitude." - (".$Longitudemul."))) * 6371 ";
    $db_mem_count[]= $obj->MySQLSelect($sql);
   
   if(!empty($db_mem_count))
   {$cnt++;}
   else{
   
   }
 
  }
  
}

 $sql_user_qme = "select * from members where  iMemberId='".$iMemberId."' ";
 $db_user_qme = $obj->MySQLSelect($sql_user_qme);

 for($y=0;$y<count($db_mem_count);$y++){
    for($x=0;$x<count($db_mem_count[$y]);$x++){
    $memberId=$db_mem_count[$y][$x]['iMemberId'];
    //$memberId[]=$db_mem_count[0]['iMemberId'];
    $sql_top = "SELECT *  FROM members  where (iSkillId IN (".$relatedArr.") OR  `vOtherSkill` = '".$vOtherSkill."') and iMemberId=".$memberId.""; 
    $db_qmein_top[] = $obj->MySQLSelect($sql_top);

    }
  }
    $Data = array(
        'iMemberId'=>$iMemberId,
        'vSkill'=>$vOtherSkill,
    'iSkillId'=>$relatedArr,
    'iInterestId'=>$relatedinterest,
    'vOtherInterest'=>$vOtherInterest,
        'tDescription'=>$tDescription,
        'iCountryId'=>$iCountryId,
        'iStateId'=>$iStateId,
        'dAddedDate'=>$dAddedDate,
        'vCity'=>$vCity,
        'vZip'=>$vZip,
        'vMile'=>$vMile
    );
    
    
if($mode == "add")
    {
        $id = $obj->MySQLQueryPerform("post_job",$Data,'insert');
        $newId = $id;       
        
    if($eHideEvent == 'Yes' ){
	
    for($y=0;$y<count($db_mem_count);$y++){
        for($x=0;$x<count($db_mem_count[$y]);$x++){
        $memid=$db_mem_count[$y][$x]['iMemberId'];
        $email_to=$db_mem_count[$y][$x]['vEmail'];
        //$email_to="bamadeb.upadhyaya@php2india.com";
        $NAME= $db_mem_count[$y][$x]['vName'];
        $sql_qme_co = "select * from post_job where  iMemberId='".$memid."' ";
        $db_qme_conwth = $obj->MySQLSelect($sql_qme_co);
        $Skill= $db_qme_conwth[$x]['vSkill'];
        $memberurl= $db_user_qme[0]['vMemberUrl'];
        $user=$db_user_qme[0]['vName'];
        $url = $site_url.'/job_detail/'.$memberurl.'/'.$id;
        if($iMemberId != $memid){
        $body_arr = Array("#NAME#","#USER#","#SITE_URL#","#SKILL#","#MAIL_FOOTER#");
        $post_arr = Array($NAME,$user,$url,$Skill,$MAIL_FOOTER);
        $mailObj->Send("POST_JOB","Member",$email_to,$body_arr,$post_arr);       
        }
      }
   }
}
   
   if($inviteqmein == 'Yes' ){
   
    for($y= 0; $y < count($db_qmein_top); $y++){
    for($x=0;$x<count($db_qmein_top[$y]);$x++){
    $memid= $db_qmein_top[$y][$x]['iMemberId'];
    $sql_qme_conn = "select * from post_job where  iMemberId='".$memid."' ";
    $db_qme_conn = $obj->MySQLSelect($sql_qme_conn);
    $memberurl= $db_user_qme[0]['vMemberUrl'];
    $user=$db_user_qme[0]['vName'];
    $url = $site_url.'/job_detail/'.$memberurl.'/'.$id;
    $NAME= $db_qmein_top[$y][$x]['vName'];
    //$email_to="bamadeb.upadhyaya@php2india.com";
    $email_to=$db_qmein_top[$y][$x]['vEmail'];
    //echo $memberurl;exit;
    $Skill= $db_qme_conn[$x]['vSkill'];
    if($iMemberId != $memid){
    $body_arr = Array("#NAME#","#USER#","#SITE_URL#","#SKILL#","#MAIL_FOOTER#");
    $post_arr = Array($NAME,$user,$url,$Skill,$MAIL_FOOTER);
    $mailObj->Send("POST_JOB","Member",$email_to,$body_arr,$post_arr);    
      }
     }
  }
}
   
       //Twitter Status Update Start
	$twUploadType = 'POSTJOB';
	$twJobId = $newId;
	include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
	//Twitter Status Update End
        
       //Facebook Status Update Start
	$fbUploadType = 'POSTJOB';
	$fbJobId = $newId;
	include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
       //Facebook Status Update End
    
   if($_SESSION['eGender'] == 'Male')
    {
    $word = 'his';
    }elseif($_SESSION['eGender'] == 'Female'){
    $word = 'her';
    }else{
    $word = '';
    }
    $Recent['iMemberId'] = $Data['iMemberId'];
    $Recent['eType'] = 'Post_job';
    $Recent['iTypeId'] = $id;
    $Recent['vDescription'] = $_SESSION['Name'].' added new job.';
    $Recent['dAddedDate'] = $Data['dAddedDate'];
    $Recent['eNameActivity'] =$Data['vSkill'];
    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    }else
    {
        $iPostJobId = $_REQUEST['iPostJobId'];
        $where = " iPostJobId = '".$iPostJobId."'";
        $id = $obj->MySQLQueryPerform("post_job",$Data,'update',$where);
        if($_SESSION['eGender'] == 'Male')
    {
    $word = 'his';
    }elseif($_SESSION['eGender'] == 'Female'){
    $word = 'her';
    }else{
    $word = '';
    }
    $Recent['iMemberId'] = $Data['iMemberId'];
    $Recent['eType'] = 'Post_job';
    $Recent['iTypeId'] = $iPostJobId;
    $Recent['vDescription'] = $_SESSION['Name'].' updated job.';
    $Recent['dAddedDate'] = $Data['dAddedDate'];
    $Recent['eNameActivity'] =$Data['vSkill'];
    $id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
    }
    
    if($id){
        $var_msg = "success";
    }
    else{
        $var_msg = 'Error in Posting Job';
    }
    echo $var_msg;exit;
?>
