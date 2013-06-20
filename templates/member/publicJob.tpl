<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_boxinnerbg">

<div class="public_pro_container">
	<div class="top_album_title">
	<div class="top_album_img">
				{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
			<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}</div>
	        <div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
	</div>
	<div id="fundcontent_wrap">
		<div id="breadcrums"  style="margin-left:75px;">{$db_user[0].vName}'s Post Job </div>
	<!--<div class="myphoto_album_title">{$db_user[0].vName}'s Post Job</div>-->
		<div class="QmeinContentPart PostInnerContentPart" style="padding:15px 0 0 22px">
				<div class="ProcessingIndication Navigation Myaccount" id="mypostjob_loading">Please Wait All Jobs Loading...</div>	
					<div id="displaymemberjobs" ></div>
					</div>
				<div class="cl">	
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
     <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>


{literal}
<script type="text/javascript">
displaypublicprofilejob(0,'{/literal}{$iMemberid}{literal}');
</script>
{/literal}
