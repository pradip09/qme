<link href="{$tconfig["tsite_url"]}/public/css/bx_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}jquery.bxSlider.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div class="desboard_body" id="services_boxinnerbg">
	<div class="myphoto_album_container">
		<div class="top_album_title">
			<div class="top_album_img">
				{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
			<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}</div>
			<div class="album_name">{$db_user[0].vName}</div>
			
			<!--<div class="photoalbums_text">Photoalbums</div>-->
			<div class="cl"></div>
			<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		</div>
		{if  $PhotoCategoryArr|@count gt 0}
		<div class="myphoto_album_img myphoto_album_slider">
			<div class="myphoto_album_title">{$db_user[0].vName}'s Photo Albums</div>
				<div class="slidergelleri">
					<div class="slider-img_box">
						
						<ul id="sliderlist">
							<!--<li>
								<div class="album_reapt_img"><a href="javascript:void(0);" onclick="publicprofileallphotos(0,'0','{$iMemberid}');"> <img src="{$tconfig["front_images"]}cap-img.png" width="100" height="102" /></a></div>
								<div class="album_reapt_text_frntpage">
								General<br />
								{$count_word}
								</div>
							</li>-->
							
							{section name=i loop=$PhotoCategoryArr}
								<li>
									<div class="album_reapt_img"><a href="javascript:void(0);" onclick="publicprofileallphotos(0,'{$PhotoCategoryArr[i].iPhotoCategoryId}','{$iMemberid}');"> <img src="{$PhotoCategoryArr[i].vImage}" width="110" height="102" /></a></div>
									<div class="album_reapt_text_frntpage">
									{$PhotoCategoryArr[i].vPhotoCategory}<br />
									{$PhotoCategoryArr[i].count}
									</div>
								</li>
							{/section}
						</ul>
						
							<!--<div style="text-align:center;color:#606060;margin-top:40px;font-weight:bold;">No Photo Album available</div>-->
							
					</div>
				</div>
			<div class="cl"> </div>
		</div>
		{/if}
		<div class="slider_bot_box">
			<div class="ProcessingIndication Navigation Myaccount" id="publicphotoalbum_loading" style="margin-left:20%;margin-top:16%;">Please Wait Photo alubs Loading...</div>				
			<div id="myallphotos"></div>
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
//displaypublicprofilephotoalbum(0,'{/literal}{$iMemberid}{literal}');
publicprofileallphotos(0,0,'{/literal}{$iMemberid}{literal}');
$('#sliderlist').bxSlider({
	infiniteLoop: false,
	hideControlOnEnd: false,
	displaySlideQty: 5,
	moveSlideQty: 5
});

</script>
{/literal}