<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Photos</h1>
			
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
		<ul>
			<div class="ProcessingIndication Navigation Myaccount" id="addphotoalbum_loading">Please wait while your photo album is uploading.</div>
			<div id="addphotoalbum" class="myphoto_album"> {if $mode eq 'add'}
				<div class="AddneweventTitle">Add Photo album</div>
				{else}
				<div class="AddneweventTitle">EDIT photo album</div>
				{/if}
				<div id="divContactid" class="error_massage"></div>
				<div id="divmsgidinner" class="myphoto_blankspace"></div>
				<div class="AddneweventLeftPart1" style="margin-left:20px;width:342px;margin-top:20px;padding:0px 13px 0px;">
				<form id="frmUploadPhotoCat" name="frmUploadPhotoCat" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadphotocategory">
					<input type="hidden" name="iAlbumId" id="iAlbumId" value="{$db_allcategory[0].iPhotoCategoryId}" />
					<input type="hidden" name="mode" id="mode" value="{$mode}" />
					<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allcategory[0].vImage}" />
					<div class="photo_form_box">
					<table>
						<tr>
							<td><label>Album name :</label>
							</td>
						</tr>
						<tr>
							<td  class="Photo_title"><input id="albumname" type="text" placeholder="Album title" name="albumname" value="{$db_allcategory[0].vPhotoCategory}">
							</td>
						</tr>
						<tr>
							<td><label>Select image :</label>
							</td>
						</tr>
						<tr>
							<td><div class="imagedisplay">
									<input type="file" name="vImage" id="vImage" value="{$db_allcategory[0].vImage}" onchange="CheckValidFile(this.value,this.name)"/>
									{if $db_allcategory[0].vImage neq ''}
									<div class="viewimage"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
								</div>
								<div style="display:none;">
									<div id="view1">
										<div>
											<div> <img src="{$tconfig["tsite_upload_images_photo"]}/{$db_allcategory[0].iMemberId}/{$db_allcategory[0].vImage}"/> </div>
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
					<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadPhotoCategory();"/>
					<a href="{$site_url}/myphoto"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
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
function uploadPhotoCategory()
{	
if($('#albumname')){
	if($('#albumname').val() ==''){
		$('#divContactid').html("Please enter Album Name").addClass('errormsg').fadeTo(900,1);
		return false;
	}
}
if($('#mode').val() =='add')
{
		if($('#vImage').val() ==''){
		$('#divContactid').html("Please select Image").addClass('errormsg').fadeTo(900,1);
		return false;
	}
}
$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
$('#addphotoalbum').hide();
$('#addphotoalbum_loading').show();
/*$("#frmUploadPhotoCat").ajaxForm({
	target: '#divContactid'
	//success: finish
	}).submit();*/
document.frmUploadPhotoCat.submit();
	
}
/*function finish()
{
    window.location='{/literal}{$site_url}{literal}'+'/myphoto/';
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