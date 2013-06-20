<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.selectbox-0.5.js"></script>
<link href="{$tconfig["tsite_url"]}/public/css/style-select.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>
<div class="clear"></div>
<div id="content_wrap">
	<div class="grid_2 alpha" id="inner_leftnav">
		<ul id="mota_menu">
			<li><a href="{$site_url}/browsejob" class="jobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postjob" class="postjobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postcampaign" class="postcampaign">Post Campaigns</a></li>
			<li><a href="{$site_url}/browsecampaign" class="browsecampaignactive">Browse Jobs</a></li>
		</ul>
		<!-- mota menu ends here-->
	</div>
	<div class="ProcessingIndication Navigation" id="campagin_loading" >Please Wait Campaign Loading...</div>
	<div class="grid_10 omega" id="inner_rightcontent">
		<div id="breadcrums">Browse Campaign</div>
		{if $iUserId neq ''}
		<div id="errorjob" class="errormsg" style=" color:red; font-size:14px;font-weight:normal;"></div>
		<div class="left_thre_sect" style="margin-top: -20px;">
			<div class="artist_search_box" >
				<input type="text" name="searchcampaign"  id="searchcampaign" class="input_search" placeholder="What are you looking for?" />
				<a href="#" onclick="displayallcapaginlist(0);">
				<input type="image" src="{$tconfig["front_images"]}/src-btn.png"/>
				</a>
			</div>
			<div class="cl"></div>
			<div class="bro_cmp_box">
				<div class="SelectTextBox">
				<select name="searchcountry" id="searchcountry" onchange="displaybrowscamp(this.value);" style="width: 156px;margin-bottom:5px;">
				<option value="">Select Country</option>
				<option value='223' >United States</option>						
				{section name=i loop=$db_country}
				{if $db_country[i].iCountryId neq 223}
				<option value='{$db_country[i].iCountryId}'>{$db_country[i].vCountry}</option>
				{/if}
				{/section}
				</select>
				</div>
			</div>
			<div class="bro_cmp_box1">
				<div class="SelectTextBox">
					 <div class="browsecampstate">
								<select name="searchstate" id="searchstate" style="width: 156px;margin-bottom:5px;">
									<option value="">Select State</option>
								</select>
								</div>
				</div>
			</div>
			<div class="cl"></div>
			<div class="bro_cmp_box2">
				<div class="SelectTextBox">
					 <select name="vIndustry" id="vIndustry" style="width: 156px;margin-bottom:5px;">
								<option value="">Select Industry</option>
								{section name=i loop=$db_industry}
								<option value="{$db_industry[i].iIndustryId}">{$db_industry[i].iIndustry}</option>
								{/section}
							</select>
				</div>
			</div>
		</div>
		
		<div class="artisr_top_belt browsecomp_top_belt">			
			<div class="artist_search_box" style="float:left;margin-left:-180px;margin-top:19px;padding-right: 0; position:relative;width: 270px;z-index: 999;">
				<div id="errorjob" class="errormsg" style=" color:red; font-size:14px;font-weight:normal;"></div>
				<input type="text" name="searchzip"  id="searchzip" class="input_search" Placeholder="Zip code" onkeypress="return checkmobile(event);" maxlength="10"  style="margin-top: 41px; width:146px; border-radius: 4px; background:none #fffdfa; border:1px solid #e88532; height:30px; " />
			</div>
			
			
		</div>
		<div id="browseallcampaignlistdiv" style="margin-top:24px;"></div>
		{else}
		<div class="BroCampCenterPart" style="text-align:center;color:red;">Please Login first and then post a job.</div>
		{/if}
		<!--<div style="padding-bottom:15px;"><img src="{$tconfig["front_images"]}/brocamp_bot_curve.png" /></div>-->
	</div>
	<div class="cl"></div>
</div>
<div style="display:none">
  <div id="Share" style="width:335px;background:#fff;padding:10px;text-align:center;height:35px;">
    <div class="social_icon">
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
       <a class="addthis_button_preferred_1"></a>
       <a class="addthis_button_preferred_2"></a>
       <a class="addthis_button_preferred_3"></a>
       <a class="addthis_button_preferred_4"></a>
       <a class="addthis_button_compact"></a>
       <a class="addthis_counter addthis_bubble_style"></a>
      </div>
     <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>
{literal}
<script>
displayallcapaginlist(0);
displaybrowscamp(countryId);
function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
}




</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
		$('#searchcountry').selectbox({debug: true});
		$('#searchstate').selectbox({debug: true});
		$('#vIndustry').selectbox({debug: true});
	});
</script>
{/literal}