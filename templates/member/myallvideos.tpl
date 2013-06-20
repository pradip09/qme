
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
				
					{include file="member/myaccountleft.tpl"}
					
					
				</div>
				<div class="desboard-right">
					<div class="MyVedioTitle">
						<h1>My video</h1>
					</div>
					<div class="cl"></div>
					<div class="UploadVideoBtn" style="padding-top: 19px;">
								<a href="{$site_url}/myvideo" style="float:left;margin-left:10px;margin-top:13px;color:#3EC10B">Back to MyVideos</a>
								<a href="{$site_url}/myvideoalbum/add"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a>
						<a href="{$site_url}/myvideodetail/add"><img src="{$tconfig["front_images"]}upload-video.png" alt="Upload Video" title="Upload Video" border="0" /></a>
					</div>
					<div class="VedioContentPart">
						<div class="ProcessingIndication Navigation Myaccount" id="allvideos_loading">Please Wait Videos Loading...</div>				
						<div id="myvideoId" ></div>
						
					</div>
					
					
					
					
					
				</div>
				<div class="cl"></div>
			</div>
</div>


{literal}
<script type="text/javascript">

getallvideos(0,'{/literal}{$iVideoAlbumId}{literal}');



</script>
{/literal}

