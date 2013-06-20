<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.datepicker.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.core.js"></script>
<script language="JavaScript" src="http://jqueryui.com/jquery-1.7.2.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<div id="services_box" class="desboard_body">
	
     {include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
	<div class="MyVedioTitle">
			<h1>Post Campaign</h1>
			
		</div>
		<div class="cl"></div>
		
		<a href="{$site_url}/myaddpostcampaign/add" style="padding-left:509px;"><img src="{$tconfig["front_images"]}add_post_campaign.png" alt="Add Post Job" title="Add Post Job" border="0" /></a>
		<div class="ProcessingIndication Navigation Myaccount" id="mycamp_loading">Please Wait Campaign is Loading...</div>
		<div id="displaypostcampaign"></div>
	</div>
	<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript" language="javascript">
$(document).ready(function() {
		$('#box7').selectbox({debug: true});
		$('#box8').selectbox({debug: true});
	});

displaymypostcampaign(0,'{/literal}{$iUserId}{literal}');


function validatePostCampaignForm(){

	if($('#vCampaignName').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Name").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vZipCode').val() ==''){
		$('#postCampaignMsg').html("Please enter Zip code").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vMileRadius').val() ==''){
		$('#postCampaignMsg').html("Please enter Mile Radius").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	/*else if($('#dStartDate').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Start Date").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#dFinishDate').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Finish Date").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}*/
	else if($('#iPointsViewingAd').val() ==''){
		$('#postCampaignMsg').html("Please enter Poing for viewing ad").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iPointsListenAd').val() ==''){
		$('#postCampaignMsg').html("Please enter Poing for listening radio ad").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iPointsCommercialAd').val() ==''){
		$('#postCampaignMsg').html("Please enter viewing commercial ad").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vURL').val() ==''){
		$('#postCampaignMsg').html("Please enter WebLink URL").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iPointsWeblinkAd').val() ==''){
		$('#postCampaignMsg').html("Please enter points for WebLink Ad").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vBuyLinkURL').val() ==''){
		$('#postCampaignMsg').html("Please enter BuyLink URl").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iPontsWhenBuy').val() ==''){
		$('#postCampaignMsg').html("Please enter points when member buy").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iPointsWhenShare').val() ==''){
		$('#postCampaignMsg').html("Please enter Point when memebers share to their extended network").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iNumMatchInCommunity').val() ==''){
		$('#postCampaignMsg').html("Please enter Number of members who match this campaign in my community").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iNumMatchOutCommunity').val() ==''){
		$('#postCampaignMsg').html("Please enter Number of members who match this campaign outside of my community").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iNumSupportBiz').val() ==''){
		$('#postCampaignMsg').html("Please enter Number of members who support biz in my community").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iMaxAdViews').val() ==''){
		$('#postCampaignMsg').html("Please enter Max Ad Views").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#iMaxAdClicks').val() ==''){
		$('#postCampaignMsg').html("Please enter Max Ad Clicks").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}	
	else
	{
		$('#postCampaignMsg').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
		$("#frmPostCampaign").ajaxForm({
			target: '#postCampaignMsg',
			success : finish
			}).submit();
		document.body.scrollTop = 100;
	}
}


function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}

function CheckValidAudioFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3' )
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}

function CheckValidVideoFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp4' || a == 'MP4' || a== 'avi' || a == 'AVI' || a == 'flv' || a == 'FLV')
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}


</script>
{/literal} 