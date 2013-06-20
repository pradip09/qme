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
								<a href="{$site_url}/myphoto" style="float:left;margin-left:10px;margin-top:13px;color:#3EC10B">Back to MyPhotos</a>
						<a href="{$site_url}/myphotoalbum/add"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a>
						<a href="{$site_url}/myphotodetail/add"><img src="{$tconfig["front_images"]}upload-photo.gif" alt="Upload Photo" title="Upload Photo" border="0" /></a>
					</div>
					<div class="MyPhotoContentPart">
				            <ul>
								<div class="ProcessingIndication Navigation Myaccount" id="allphotos_loading">Please Wait Photos Loading...</div>
								<!--<div id="myallphotos" ></div>-->
					    </ul>
					</div>
				</div>
				<div class="cl"></div>
			</div>
</div>


{literal}
<script type="text/javascript">
getallphotos(0,'{/literal}{$iCateroryId}{literal}');

</script>
{/literal}
