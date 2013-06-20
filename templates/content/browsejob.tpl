<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.selectbox-0.5.js"></script>
<link href="{$tconfig["tsite_url"]}/public/css/style-select.css" rel="stylesheet" type="text/css" />

<div class="clear"></div>
<div id="content_wrap">


	<div class="grid_2 alpha" id="inner_leftnav">
		<ul id="mota_menu">
			
			<li><a href="{$site_url}/browsejob" class="jobsactive">Browse Jobs</a></li>
			<li><a href="{$site_url}/postjob" class="postjobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postcampaign" class="postcampaign">Post Campaigns</a></li>
			<li><a href="{$site_url}/browsecampaign" class="browsecampaign">Browse Jobs</a></li>
			
		</ul>
		<!-- mota menu ends here-->
	</div>
	{if $iUserId neq ''}
	<div class="grid_10 omega" id="inner_rightcontent">
		
		<div id="breadcrums">Search Job </div>
		
		<div class="cl"></div>
		<div class="left_thre_sect">
			<div class="bro_cmp_box">
				<div class="SelectTextBox">
					
					<select name="searchcountry" id="searchcountry" onchange="displaybrowsjob(this.value);" >
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
			
			<div class="bro_cmp_box2">
				<div class="SelectTextBox">
					<div class="browsestate">
					<select name="searchstate" id="searchstate" style="width: 156px;margin-bottom: 5px;">
						<option value=''>Select State</option>
					</select>
					</div>
				</div>
			</div>
		</div>
		<div class="artisr_top_belt browsejob_top_belt" style="position:relative;">
			<div class="artist_search_box" style="width:380px; position:absolute; padding-right:0px; top: -34px;
left: 10px;">
				<input type="text" name="searchjob"  id="searchjob" class="input_search" Placeholder="What are you looking for?" />
				<a href="#" onclick="searchjoblist(0);"><input type="image" src="{$tconfig["front_images"]}/src-btn.png"/></a>
				</div>
				
			<div class="artist_search_box" style="float: left; margin-left: -195px; margin-top: 7px; padding-right: 0; position: relative;   width: 270px;   z-index: 999;">
				<input type="text" name="searchzip"  id="searchzip" class="input_search" Placeholder="Zip code" onkeypress="return checkmobile(event);" maxlength="10"  style=" width:174px; border-radius: 4px; background:none #fffdfa; border:1px solid #e88532; height:30px; " />
			</div>
		</div>
		
		
		
		<div class="ProcessingIndication Navigation Myaccount" id="searchdataqme">Please Wait searching process is running...</div>
		  <div class="cl"></div>
		  <div id="browsealljoblistdiv" style="margin-top:14px;"></div>
		
		{else}
                <div class="OppurtunitiesCenterPart" style="text-align:center;color:red;">Please Login first and then post a job.</div>
		{/if}
		
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

<script type="text/javascript">
searchjoblist(0);
//displaybrowsjob(countryId)
function displaybrowsjob(countryId){
	
	var extra ='';
	extra+='&countryId='+countryId;
	var url = site_url+"/index.php?file=a-ajbrowsestatelist";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('.browsestate')){
			$('.browsestate').html(data);
		}
	});
	
}	

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
		//$('#box3').selectbox({debug: true});
	});
</script>
{/literal}