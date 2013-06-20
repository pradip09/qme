<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	{include file="member/myaccountleft.tpl"} </div>
	
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Video</h1>
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
		<ul>
			<div class="ProcessingIndication Navigation Myaccount" id="addvideoalbum_loading">Please wait while your video album is uploading.</div>
			<div id="addvideoalbum" class="myphoto_album"> {if $mode eq 'add'}
				<div class="AddneweventTitle">Add Video album</div>
				{else}
				<div class="AddneweventTitle">EDIT video album</div>
				{/if}
				<div id="divContactvideoid" class="error_massage"></div>
				<div id="divmsgidinner" class="myphoto_blankspace"></div>
				<div class="AddneweventLeftPart1" style="margin-left:20px;width:342px;margin-top:20px;padding:0px 13px 0px;">
				<form id="frmUploadVideoCategory" name="frmUploadVideoCategory" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadvideocategory">
					<input type="hidden" name="iVideoAlbumId" id="iVideoAlbumId" value="{$db_allvideocategory[0].iVideoAlbumId}" />
					<input type="hidden" name="mode" id="mode" value="{$mode}" />
					<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allvideocategory[0].vImage}" />
					<div class="photo_form_box">
					<table>
						<tr>
							<td><label>Album name :</label>
							</td>
						</tr>
						<tr>
							<td  class="Photo_title"><input id="videoalbum" type="text" placeholder="Album title" name="videoalbum" value="{$db_allvideocategory[0].vVideoAlbum}">
							</td>
						</tr>
						<tr>
							<td><label>Select image :</label>
							</td>
						</tr>
						<tr>
							<td><div class="imagedisplay">
									<input type="file" name="vVideoImage" id="vVideoImage" value="{$db_allvideocategory[0].vImage}" onchange="CheckValidFile(this.value,this.name)"/>
									{if $db_allvideocategory[0].vImage neq ''}
									<div class="viewimage"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
								</div>
								<div style="display:none;">
									<div id="view1">
										<div>
											<div> <img src="{$tconfig["tsite_upload_images_video"]}/{$db_allvideocategory[0].iMemberId}/{$db_allvideocategory[0].vImage}"/> </div>
										</div>
									</div>
								</div>
								{else}
						</div>
						
						{/if}
						</td>
						
						</tr>
						
					</table>
					</div>
				</form>
				<div class="submitbutton_new">
					<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadVideoCategory();"/>
					<a href="{$site_url}/myvideo"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
			</div>
			</div>
		</ul>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
function uploadVideoCategory()
{
	
	
	if($('#videoalbum')){
		if($('#videoalbum').val() ==''){
			$('#divContactvideoid').html("Please enter Album Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#mode').val() =='add')
	{
			if($('#vVideoImage').val() ==''){
			$('#divContactvideoid').html("Please select Image").addClass('errormsg').fadeTo(900,1);
			return false;
		}	
	}
	
	$('#divContactvideoid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addvideoalbum').hide();
	$('#addvideoalbum_loading').show();
	
	/*$("#frmUploadVideoCategory").ajaxForm({
		target: '#divContactvideoid',
		success: finish
		}).submit();*/
	
document.frmUploadVideoCategory.submit();	
}

/*function finish()
{
				window.location='{/literal}{$site_url}{literal}'+'/myvideo/';
}*/



function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}


$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

</script>
{/literal} 