<?php
$iMemberId= $_REQUEST['iMemberId'];
$iCampaignId= $_REQUEST['iCampaignId'];

$sql =  "select * from compaign_item where iCampaignId='".$iCampaignId."' AND iMemberId = '".$iMemberId."'";
$CampaginArr = $obj->MySQLSelect($sql);
//echo "<pre>";
//print_r($CampaginArr);exit;

for($i = 0; $i < count($CampaginArr); $i++)
{
	    $CampaginArr[$i]['FullContent']=$CampaginArr[$i]['tDescription'];
	if(strlen($CampaginArr[$i]['tDescription'])>15){
		$CampaginArr[$i]['tDescription']=substr($CampaginArr[$i]['tDescription'],0,6).'..';
	}
        if($CampaginArr[$i]['Image'] =='' && !is_file(TPATH_SERVER_IMAGES_FUNDRAISER_CAMPAIGN."/".$CampaginArr[$i]['iMemberId']."/".$CampaginArr[$i]['Image'])){
      
              $CampaginArr[$i]['Image'] = $tconfig["front_images"]."cap-img.png";
	}else{
	      
	      $CampaginArr[$i]['Image'] = $tconfig["tsite_upload_images_fundraiser_campaign"].'member/'.$CampaginArr[$i]['iMemberId']."/"."2_".$CampaginArr[$i]['Image'];
	}
	
}
  if(count($CampaginArr) > 0){
   
    $html .='<div class="campaign_popup" style="width:564px">';
	$html .='<div class="campaign_popup_title">Fundraiser Items</div>';
    $html .='<div class="campaign_popup_cont">';
  for($i=0;$i<count($CampaginArr);$i++){
        
		$html .='<div class="camp_reapt_box" >';
			$html .='<div class="camp_reapt_img">';
				$html .='<img src="'.$CampaginArr[$i][Image].'" alt="" title=""  />';
			$html .='</div>';
			$html .='<div class="camp_reapt_text" style="margin-left:297px;">';
				$html .='
				<strong>Name:</strong> <storng>'.$CampaginArr[$i][vItemName].'</storng><br />
				<strong>Description : </strong>'.$CampaginArr[$i][tDescription].'<br />
				<a href="#readd'.$CampaginArr[$i][iItemId].'" class="descc" style="text-decoration:none;">Read more..</a><br/>					
				<div style="display:none">
					<div id="readd'.$CampaginArr[$i][iItemId].'" class="readpoppup">
					<div><div class="popupheadding">'.$CampaginArr[$i][vItemName].'</div>
					<div class="popuptext">'.$CampaginArr[$i][FullContent].'</div></div>
					</div>
				</div>
				$ '.$CampaginArr[$i][vQualify].' <strong> Minimum donation to qualify for this time</strong><br />
				$ '.$CampaginArr[$i][vQualifyall].' <strong> Maximum donation to qualify for all Item shown in this campaign</strong><br />';
				$html .='<div class="accept_but" style="float:right;"><input type="button" value="Donation" /></div>';
			$html .='</div>';
			
			$html .='<div class="cl"></div>';
			$html .='</div>';
	
  }
  $html .='</div>';
  $html .='</div>';
  
  }
echo "<script> $(document).ready(function(){
$('.descc').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
 </script>";
echo $html;exit;
 
?>
