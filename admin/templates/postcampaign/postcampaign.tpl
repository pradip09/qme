<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}datetimepicker.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=pc-postcampaign&mode=view">Post Campaign</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Post Campaign{else}Edit Post Campaign{/if}</li>
	</ul>
</div>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			{if $mode eq add}
			<h2 class="left">Post Campaign</h2>
			{else}
			<h2 class="left">Edit Campaign</h2>
			{/if}
		</div>
	</div>
	<div class="contentbox" style="padding:0 !important">
		<form id="frmadd" name="frmadd" action="index.php?file=pc-postcampaign_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iCampaignId" id="iCampaignId" value="{$iCampaignId}" />
			<input type="hidden" name="action" id="action" value="{$mode}" />
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_postcampaign[0].vImage}" />
			<input type="hidden" name="vOldMp3" id="vOldMp3" value="{$db_postcampaign[0].vMp3File}" />
			<input type="hidden" name="vOldVideo" id="vOldVideo" value="{$db_postcampaign[0].vVideoFile}" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="{$db_postcampaign[0].iStateId}"/>

<div style="float:left; width:49%;" >

	<div class="container">
			<div class="conthead">
				<h2>Create a Campaign</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Name:</strong></label>
					<input type="text" id="vCampaignName" name="Data[vCampaignName]" class="inputbox" lang="*" title="Campaign Name" value="{$db_postcampaign[0].vCampaignName}"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Content:</strong></label>
				</div>
				<textarea id="tContent" name="Data[tContent]" class="inputbox"  title="Ad Content"  style="margin-left:140px;width:357px; height:90px;">{$db_postcampaign[0].tContent}</textarea>
				<div style="clear:both;"></div>
				<br>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Image:</strong></label>
					{if $db_postcampaign[0].vImage eq ''}
					<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_postcampaign[0].vImage}"  title="Ad Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:206px;"/>
					{else}
					<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_postcampaign[0].vImage}"  title="Ad Image" onchange="CheckValidFile(this.value,this.name)" style="width:206px;"/>
					{/if}
					
					{if $db_postcampaign[0].vImage neq ''}
					<div style="float:right; width:200px;">
						<div style="float:left; margin:0px 5px 0px 10px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_campaign"]}/admin/{$db_postcampaign[0].iAdminId}/{$db_postcampaign[0].vImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Campaign Interests:</strong></label>
					{if $db_interest|@count gt 0}
					<select multiple name="iInterestId[]" id="iInterestId" title="Campaign Interest" lang="*" style="width:227px;">
						
						{section name=i loop=$db_interest}
						<option value="{$db_interest[i].iInterestId}" {if $db_interest[i].iInterestId|in_array:$relatedArrIntrest} selected {/if}>{$db_interest[i].vInterest}</option>
						{/section}
					</select>
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" id="vOtherinterest" name="Data[vOtherinterest]" class="inputbox"  title="Other Interest" value="{$db_postcampaign[0].vOtherinterest}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Campaign Skills:</strong></label>
					{if $db_skill|@count gt 0}
					<select multiple name="iSkillId[]" id="iSkillId" title="Campaign Skill" lang="*" style="width:227px;">
						
						{section name=i loop=$db_skill}
						<option value="{$db_skill[i].iSkillId}" {if $db_skill[i].iSkillId|in_array:$relatedArr} selected {/if}>{$db_skill[i].vSkill}</option>
						{/section}
					</select>
					{/if}
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Other Skill:</strong></label>
					<input type="text" id="vOtherskill" name="Data[vOtherskill]" class="inputbox" title="Other Skill" value="{$db_postcampaign[0].vOtherskill}"/>
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Your Country" onchange="getCountry(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						{section name=i loop=$db_con}
						<option value='{$db_con[i].iCountryId}' {if $db_con[i].iCountryId eq $db_postcampaign[0].iCountryId}selected{/if}>{$db_con[i].vCountry}</option>
						{/section}
					</select>                
				</div>             
                                	 
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallstates">					
						<select id="iStateId" name="Data[iStateId]" title="Your State"  lang="*"  style="width:227px">							
						<option value=''>--Select State--</option>
					    </select>	
					</div>				 
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" lang="*" title="Your City" value="{$db_postcampaign[0].vCity}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose a zip code:</strong></label>
					<input type="text" id="vZipCode" name="Data[vZipCode]" class="inputbox" title="Zip Code" lang="*" value="{$db_postcampaign[0].vZipCode}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose mile radius from your location:</strong></label>
					<input type="text" id="vMileRadius" name="Data[vMileRadius]" class="inputbox" title="Mile Radius" lang="*" value="{$db_postcampaign[0].vMileRadius}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Is this a local community campaign?:</strong></label>
					<label for="textfield"><input type="checkbox" id="eIsLocal" name="eIsLocal" value="Yes" {if $db_postcampaign[0].eIsLocal eq Yes}checked{/if}><strong>Yes</strong></label>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Is this a National community campaign?:</strong></label>
					<label for="textfield"><input type="checkbox" id="eIsNational" name="eIsNational" value="Yes" {if $db_postcampaign[0].eIsNational eq Yes}checked{/if}><strong>Yes</strong></label>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Start Date:</strong></label>
					<input type="text" id="dStartDate" name="Data[dStartDate]" class="inputbox" title="Campaign Start Date" lang="*" value="{$db_postcampaign[0].dStartDate}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Finish Date:</strong></label>
					<input type="text" id="dFinishDate" name="Data[dFinishDate]" class="inputbox" title="Ad Finish Date"  value="{$db_postcampaign[0].dFinishDate}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Points for viewing Ad:</strong></label>
					<input type="text" id="iPointsViewingAd" name="Data[iPointsViewingAd]" class="inputbox" title="Points for viewing Ad" lang="*" value="{$db_postcampaign[0].iPointsViewingAd}" onkeypress="return checkprice(event);"/>
				</div>
				
				
			</div>
		</div>
        
        
     <div class="container">
			<div class="conthead">
				<h2>Radio Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Mp3 File:</strong></label>
						{if $db_postcampaign[0].vMp3File eq ''}
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="{$db_postcampaign[0].vMp3File}"  title="Mp3 File"  onchange="CheckValidAudioFile(this.value,this.id)" style="width:201px;"/>
						{else}
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="{$db_postcampaign[0].vMp3File}"  title="Mp3 File" onchange="CheckValidAudioFile(this.value,this.id)" style="width:201px;"/>
						{/if}
					</div>
					{if $db_postcampaign[0].vMp3File neq ''}
					<div style="float:left; width:392px; margin-top: 11px;">
						<div style="width:200px; float:left; margin-left:135px;">
							<object type="application/x-shockwave-flash" data="{$tconfig['tsite_music']}/dewplayer.swf" width="200" height="20" id="dewplayer" name="dewplayer">
								<param name="wmode" value="transparent" />
								<param name="movie" value="{$tconfig['tsite_music']}/dewplayer.swf" />
								<param name="flashvars" value="mp3={$tconfig["tsite_upload_images_campaign"]}/admin/{$db_postcampaign[0].iAdminId}/{$db_postcampaign[0].vMp3File}&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
							</object>
						</div>
						<div style="width:50px; float:right">
							<p><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="Mp3Delete();"/></p>
						</div>
					</div>
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts to Listen To radio ad:</strong></label>
					<input type="text" id="iPointsListenAd" name="Data[iPointsListenAd]" class="inputbox" title="Ponts to Listen To radio ad"  value="{$db_postcampaign[0].iPointsListenAd}" onkeypress="return checkprice(event);"/>
				</div>
				
				
			</div>
		</div>   
        
        <div class="container">
			<div class="conthead">
				<h2>Commercial Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Video File:</strong></label>
						{if $db_postcampaign[0].vVideoFile eq ''}
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="{$db_postcampaign[0].vVideoFile}"  title="VideoFile"  onchange="CheckValidVideoFile(this.value,this.id)" style="width:201px;"/>
						{else}
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="{$db_postcampaign[0].vVideoFile}"  title="VideoFile" onchange="CheckValidVideoFile(this.value,this.id)" style="width:201px;"/>
						{/if}
					</div>
					{if $db_postcampaign[0].vVideoFile neq ''}
					<div style="float:left; width:450px; margin-top: 15px;">
						<div id="video-container">Loading the player ...
							<input type="hidden" id="playerUrl" value="{$tconfig['tsite_music']}/player.swf">
							<input type="hidden" id="videoUrl" value="{$tconfig["tsite_upload_images_campaign"]}/admin/{$db_postcampaign[0].iAdminId}/{$db_postcampaign[0].vVideoFile}">
						</div>
						<div style="width:50px; float:left">
							<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="videoDelete();"/></p>
						</div>
					</div>
					{/if}
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Points to view Commercial ad:</strong></label>
					<input type="text" id="iPointsCommercialAd" name="Data[iPointsCommercialAd]" class="inputbox" title="Ponts to view Commercial ad" value="{$db_postcampaign[0].iPointsCommercialAd}" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>

</div>


<div style="float:right; width:49%;">
<div class="container">
			<div class="conthead">
				<h2>WebLink Option</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Ad URL:</strong></label>
					<input type="text" id="vURL" name="Data[vURL]" class="inputbox" title="Ad URL" value="{$db_postcampaign[0].vURL}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts to visit This memeber site:</strong></label>
					<input type="text" id="iPointsWeblinkAd" name="Data[iPointsWeblinkAd]" class="inputbox" title="Ponts to visit This memeber site" value="{$db_postcampaign[0].iPointsWeblinkAd}" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>
<div class="container">
			<div class="conthead">
				<h2>BuyLink Option</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Buy Link URL:</strong></label>
					<input type="text" id="vBuyLinkURL" name="Data[vBuyLinkURL]" class="inputbox" title="Buy Link URL" value="{$db_postcampaign[0].vBuyLinkURL}"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Item cost:</strong></label>
					<input type="text" id="iItemCost" name="Data[iItemCost]" class="inputbox" title="Item Cost" value="{$db_postcampaign[0].iItemCost}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Discount:</strong></label>
					<input type="text" id="iItemDiscount" name="Data[iItemDiscount]" class="inputbox" title="Item Discount" value="{$db_postcampaign[0].iItemDiscount}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts When Members buy:</strong></label>
					<input type="text" id="iPontsWhenBuy" name="Data[iPontsWhenBuy]" class="inputbox" title="Points When Members buy" value="{$db_postcampaign[0].iPontsWhenBuy}" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>



<div class="container">
			<div class="conthead">
				<h2>Share Option</h2>
			</div>
			<div class="contentbox">
				<label for="textfield"><strong>Point when memebers share to their extended network:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iPointsWhenShare" name="Data[iPointsWhenShare]" class="inputbox" title="Point when memebers share to their extended network" value="{$db_postcampaign[0].iPointsWhenShare}" onkeypress="return checkprice(event);" style="margin-left:136px;"/>
				</div>
			</div>
		</div>
<!--<div class="container">
			<div class="conthead">
				<h2>Who Match this campaign</h2>
			</div>
			<div class="contentbox">
				
				<label for="textfield"><strong>Number of members who match this campaign in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchInCommunity" name="Data[iNumMatchInCommunity]" class="inputbox" title="Number of members who match this amp- aign in my community" lang="*" value="{$db_postcampaign[0].iNumMatchInCommunity}" onkeypress="return checkprice(event);"/>
				</div>
				
				<label for="textfield"><strong>Number of members who match this campaign outside of my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchOutCommunity" name="Data[iNumMatchOutCommunity]" class="inputbox" title="Number of members who match this campaign outside of my community" lang="*" value="{$db_postcampaign[0].iNumMatchOutCommunity}" onkeypress="return checkprice(event);"/>
				</div>
				
				<label for="textfield"><strong>Number of members who support biz in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumSupportBiz" name="Data[iNumSupportBiz]" class="inputbox" title="Number of members who support biz in my community" lang="*" value="{$db_postcampaign[0].iNumSupportBiz}" onkeypress="return checkprice(event);"/>
				</div>
			</div>
		</div>-->


<div class="container">
			<div class="conthead">
				<h2>Number of clicks for this campaign</h2>
			</div>
			<div class="contentbox">
				<!--<div class="inputboxes">
					<label for="textfield"><strong>Max Ad Views:</strong></label>
					<input type="text" id="iMaxAdViews" name="Data[iMaxAdViews]" class="inputbox" title="Max Ad Views" lang="*" value="{$db_postcampaign[0].iMaxAdViews}" onkeypress="return checkprice(event);"/>
				</div>-->
				<div class="inputboxes">
					<label for="textfield"><strong>Max Ad Clicks:</strong></label>
					<input type="text" id="iMaxAdClicks" name="Data[iMaxAdClicks]" class="inputbox" title="Max Ad Clicks" value="{$db_postcampaign[0].iMaxAdClicks}" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:223px;">
						<option value="Active" {if $db_postcampaign[0].eStatus eq Active}selected{/if} >Active</option>
						<option value="Inactive" {if $db_postcampaign[0].eStatus eq Inactive}selected{/if} >Inactive</option>
					</select>
				</div>
				
				<br><br><br>
				
				{if $mode eq add}
				<input type="submit" value="Add Campaign" class="btn" title="Add Campaign"  onclick="return validate(document.frmadd);" style="cursor:pointer;margin-left:140px;"/>
				{else}
				<input type="submit" value="Edit Campaign" class="btn" title="Edit Campaign" onclick="return validate(document.frmadd);" style="cursor:pointer;margin-left:140px;"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				
			</div>
			
		</div>

</div> 
		</div>
		
		<div style="clear:both;"></div>
		</form>
	</div>
	
</div>
{literal}
<script>
getId('{/literal}{$db_postcampaign[0].iCountryId}{literal}');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var countryId = id;
		getCountry(countryId);
	}
	
}

function getCountry(countryId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = admin_url+"/index.php?file=pc-ajcountrylist";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
      // alert(data);
		if($('#showallstates')){
			$('#showallstates').html(data);
          
		}
	});
}
</script>
<script>
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=pc-postcampaign&mode=view";
    return false;
}

function checkOnly(x)
  {
  $('#eIsLocal').attr("checked", false);
    $(x).attr("checked", true);
  }       

$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
	
	
});


function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}


function Mp3Delete(){
	var r=confirm("Are you sure to delete this Mp3");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteMp3");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
}
function videoDelete(){
	var r=confirm("Are you sure to delete this video");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteVideo");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
}
function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckValidAudioFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3' )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckValidVideoFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp4' || a == 'MP4' || a== 'avi' || a == 'AVI' || a == 'flv' || a == 'FLV')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

</script>

<script type="text/javascript">
	
	$(document).ready(function() {
	$(function() {$('#dStartDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
	
	$(document).ready(function() {
	$(function() {$('#dFinishDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
</script>

<script type="text/javascript">
	var playerUrl;
	var videoUrl;
	playerUrl = $('#playerUrl').val();	
	videoUrl = $('#videoUrl').val();
	jwplayer("video-container").setup({
	    flashplayer: playerUrl,
	    file: videoUrl,
	      plugins: {
		"sharing-2": {
		  code: "",
		  link: ""
		}
	      },
	    height: 270,
	    width: 450
	});
</script>

<script type="text/javascript">
	CKEDITOR.replace( 'tContent' );
	/*var editor_exp = CKEDITOR.instances['tContent'].getData();
	 if(editor_exp=="")
		{
		//$('#divmsgid').html("Please  enter text for your experience,qualifications,certifications,education").addClass('errormsg').fadeTo(900,1);
		alert('Please enter Text');
		return false;
		}*/
	
</script>
<!--<script type="text/javascript">
function printpage() {
	
$(document).ready(function() {
  $('#frmadd').submit(function() {
     if ($('#tContent').val() == '') {
        alert('Please Enter description.');
        return false;
     }
  }); // end submit()
});
}
</script>-->
{/literal}