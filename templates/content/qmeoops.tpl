<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jlogin.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<div class="clear"></div>
<div id="content_wrap">
	<div class="grid_2 alpha" id="inner_leftnav">
		<ul id="mota_menu">
			{if $iUserId eq ''}
			<li><a href="#LoginId" id="browsejob" class="jobs">Browse Jobs</a></li>
			<li><a href="#LoginId" id="postjob" class="postjobs">Browse Jobs</a></li>
			<li><a href="#LoginId" id="postcamp" class="postcampaign">Post Campaigns</a></li>
			<li><a href="#LoginId" id="browsecamp" class="browsecampaign">Browse Jobs</a></li>
			{else}
			<li><a href="{$site_url}/browsejob" class="jobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postjob" class="postjobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postcampaign" class="postcampaign">Post Campaigns</a></li>
			<li><a href="{$site_url}/browsecampaign" class="browsecampaign">Browse Jobs</a></li>
			{/if}
		</ul>
		<!-- mota menu ends here-->
	</div>
	<!--innerleft nav ends here-->
	<div class="grid_10 omega" id="inner_rightcontent">
		<div id="breadcrums"><a href="#">Opportunities </a><img src="{$tconfig["front_images"]}bluearrow.png" width="13" height="9"> Featured Campaigns </div>
		<!--breadcrums ends here-->
		<div id="campaignlistdiv"></div>
		
		
		
		<!--pagination class ends here-->
		<div class="spacer20"></div>
		<h1 class="joblisting">Job Listing</h1>
		<div id="joblistdiv"></div>
		
		
	</div>
	<!--inner_rightcontent ends here-->
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
{include file='content/popuplogin.tpl'}

{literal}
<script>
displayadmincapagin(0);
displayadminjob(0);
</script>
{/literal}
