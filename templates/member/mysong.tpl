<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body" >
	
		{include file="member/myaccountleft.tpl"}
</div>

	<div class="desboard-right" >
		<div class="MyVedioTitle">
			<h1>My Songs</h1>
		</div>
						<div class="cl"></div>
		<div class="UploadVideoBtn" style="padding-top: 19px;"> <a href="{$site_url}/mysongalbum/add"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a> <a href="{$site_url}/mysongdetail/add"><img src="{$tconfig["front_images"]}upload-song.png" alt="Upload Songs" title="Upload Songs" /></a>
			<!---<a href="#" id=""><img src="{$tconfig["front_images"]}back_btn.png" alt="Back Album" title="Back Album" border="0" /></a>--->
		</div>
		<div class="upload_sond_btn"> </div>
		<div class="mysong_container">
			<div class="ProcessingIndication Navigation Myaccount" id="songalbum_loading">Please Wait Song Albums Loading...</div>
			<div class="my_mysong_borderbox">
				<div id="mysongalbum"></div>
				<div class="cl"></div>
			</div>
		</div>
		<div class="mysong_list">
		
				<div class="mysong_container">
				
					<div class="ProcessingIndication Navigation Myaccount" id="allsongs_loading">Please Wait Songs Loading...</div>
					
					<div id="myallsongs"></div>
					</div>
				</div>
	
		</div>
	<div style=" clear:both";></div>
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
displaymysongalbum(0,'{/literal}{$iUserId}{literal}');
getallsongs(0,0);


</script>
{/literal} 