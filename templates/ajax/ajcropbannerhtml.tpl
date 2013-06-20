<div id="outer" class="bannerPopup cropper">
<div class="jcExample">
<div class="article">
	<div >
		<p class="checkall" style="text-align:center;">(After selecting your crop area click crop image to continue)</p>
		<img src="{$tconfig["front_images"]}crope-img.png" onclick="return saveCroppedBanner({$iBannerId});" style="cursor:pointer;margin-left: 491px;">
		
		
		
		
		<!--<h1 style="margin-bottom:10px;">Banner Cropper</h1>-->
	</div>
	<div>
		<div class="bannerImage">
		<img src="{$tconfig["tsite_upload_images_member"]}banner_tmp/{$imgUploaded}" id="cropbox" onMouseOver="callJcorp();"/>
		</div>
	</div>
	
	<form id="bannerCropper" action="{$site_url}/index.php?file=a-ajcropbanner" method="post" onsubmit="return checkCoords();">
		<input type="hidden" id="banImage" name="banImage" value="{$imgUploaded}" />
		<input type="hidden" id="iBannerId" name="iBannerId" value="{$iBannerId}" />
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />	
	</form>
	
	<!--<input type="button" value="Crop Image" onclick="return saveCroppedBanner({$iBannerId});"/>-->
	</div>
</div>
</div>

<script>
function saveCroppedBanner()
{
	$("#bannerCropper").ajaxForm({
		complete: showUploadedBannerImage
		//target: '#divSettingmsgid'
		}).submit();
 	$.fancybox.close();
}
</script>
