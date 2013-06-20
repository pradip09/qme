<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My video</h1>
		</div>
		<div class="cl"></div>
		<div class="UploadVideoBtn"> <a href="{$site_url}/myvideoalbum/add" id="video"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a> <a href="{$site_url}/myvideodetail/add"><img src="{$tconfig["front_images"]}upload-video.png" alt="Upload Video" title="Upload Video" border="0" /></a> </div>
		<div class="VedioContentPart">
			<div class="ProcessingIndication Navigation Myaccount" id="videoalbum_loading">Please Wait Video Albums Loading...</div>
			<div id="myvideocategoryId"> </div>
		</div>
		<div class="ProcessingIndication Navigation Myaccount" id="videoalbum_loading">Please Wait Video Albums Loading...</div>
		<div class="my_vedio_borderbox">
			<div id="myvideoId"></div>
			<div class="cl"></div>
		</div>
	</div>
	<div class="cl"></div>
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
displaymyvideoalbum(0,'{/literal}{$iUserId}{literal}');
getallvideos(0,0);

</script>
{/literal} 