<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_boxinnerbg">

<div class="public_pro_container">
	<div class="top_album_title">
	<div class="top_album_img">
		<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
	</div>
		<div class="album_name">{$db_user[0].vName}</div>
		
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
	</div>
	<div id="fundcontent_wrap">
		<input type="hidden" value="{$iMemberId}">
		<div id="breadcrums"  style="margin-left:75px;">{$db_user[0].vName}'s Fundraiser Campaign</div>	
	<!--<div class="myphoto_album_title" style="padding-bottom:0px;">{$db_user[0].vName}'s Fundraiser Campaign</div>-->
		<div class="ProcessingIndication Navigation Myaccount" id="publiccampaign_loading" style="margin-left:20%">Please Wait Campaign Loading...</div>				
		<div id="browseallfundcampaignlistdiv" ></div>
		
		
		<div class="cl">
		</div>
	</div>
</div>	
	
</div>
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
     <script type="text/javascript" href="http://<?php echo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?> " src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>
{literal}
<script type="text/javascript">
displayfundraisercompaign(0,'{/literal}{$iMemberid}{literal}');
</script>
{/literal}

