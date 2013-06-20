<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
				
				
				{include file="member/myaccountleft.tpl"}
					
				</div>
				<div class="desboard-right">
					<div class="MyVedioTitle">
						<h1>My Photos</h1>
					</div>
					<div class="cl"></div>
					
					<div class="UploadVideoBtn" style="padding-top: 19px;">
								
						<a href="{$site_url}/myphotoalbum/add"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a>
						<a href="{$site_url}/myphotodetail/add" id=""><img src="{$tconfig["front_images"]}upload-photo.gif" alt="Upload Photo" title="Upload Photo" border="0" /></a>
						<!---<a href="#" id=""><img src="{$tconfig["front_images"]}back_btn.png" alt="Back Album" title="Back Album" border="0" /></a>--->
					</div>
					<div class="MyPhotoContentPart">
				            <ul>
								<div class="ProcessingIndication Navigation Myaccount" id="photoalbum_loading">Please Wait Photo Albums Loading...</div>
						<!--<li>
						        <ul>
								<li class="MyphotoImg"><a href="{$site_url}/myallphotos/0"><img src="{$tconfig["front_images"]}cap-img.png" class="myphotoimg"/></a></li>
								<li class="MyphotoTxt">General ({$gen_count})</li>
							</ul>
						</li>-->

						<div id="myphotocategoryId" ></div>
					    </ul>
					</div>
						<div class="MyPhotoContentPart">
				            <ul>
								<div class="ProcessingIndication Navigation Myaccount" id="allphotos_loading">Please Wait Photos Loading...</div>
								<div id="myallphotos" ></div>
					    </ul>
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
displaymyphotocategory(0,'{/literal}{$iUserId}{literal}');
getallphotos(0,0);


</script>
{/literal}

