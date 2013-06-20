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
				<div class="ProcessingIndication Navigation Myaccount" id="addphoto_loading">Please wait while your photo is uploading.</div>
				<div id="photosadd" class="myphoto_album"> {if $mode eq 'add'}
					<div class="AddneweventTitle">Add New photo</div>
					{else}
					<div class="AddneweventTitle">EDIT photo</div>
					{/if}
					<div id="divContactmsgid" class="error_massage"></div>
					<div id="divmsgidinner" class="myphoto_blankspace"></div>
					<div class="AddneweventLeftPart1" style="margin-left:20px;width:342px;margin-top:20px;padding:0px 13px 0px;">
						<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadphoto">
							<input type="hidden" name="iPhotoId" id="iPhotoId" value="{$db_photo[0].iPhotoId}" />
							<input type="hidden" name="mode" id="mode" value="{$mode}" />
							<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_photo[0].vImage}" />
							<div class="photo_form_box">
								<table>
									<tr>
										<td><label>Photo title :</label>
										</td>
									</tr>
									<tr>
										<td  class="Photo_title"><input id="photoname" type="text" placeholder="Photo title" name="photoname" value="{$db_photo[0].vPhotoTitle}">
										</td>
									</tr>
									<tr>
										<td><label>Select image :</label>
										</td>
									</tr>
									<tr>
										<td><div class="imagedisplay">
												<input type="file" name="vPhoto" id="vPhoto" value="{$db_photo[0].vImage}" onchange="CheckValidFile(this.value,this.name)"/>
												{if $db_photo[0].vImage neq ''}
												<div class="viewimage"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
											</div>
											<div style="display:none;">
												<div id="view1">
													<div>
														<div> <img src="{$tconfig["tsite_upload_images_photo"]}/{$db_photo[0].iMemberId}/{$db_photo[0].vImage}"/> </div>
													</div>
												</div>
											</div>
											{else} </td>
										{/if}
										</td>
									</tr>
									<tr>
										<td><label>Select category:</label>
										</td>
									</tr>
									<tr>
										<td><div class="select_category_photo_box">
												<select name="iAlbum" id="iAlbum" style="width:325px;">
													<option value="">----Select photo category---</option>
											{if  $db_photocategory|@count gt 0}
											{section name=j loop=$db_photocategory}
												<option value="{$db_photocategory[j].iPhotoCategoryId}" {if $db_photocategory[j].iPhotoCategoryId eq $db_photo[0].iPhotoCategoryId}selected{/if}>{$db_photocategory[j].vPhotoCategory}</option>
											{/section}
											{/if}
												</select>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</form>
						<div class="submitbutton_new">
							<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadPhoto();" style="padding-right:2px;"/>
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

function uploadPhoto()
{
	
	//alert('hii');
	if($('#photoname')){
		if($('#photoname').val() ==''){
			$('#divContactmsgid').html("Please enter Photo Title").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#mode').val() =='add')
	{
			if($('#vPhoto').val() ==''){
			$('#divContactmsgid').html("Please select image file").addClass('errormsg').fadeTo(900,1);
			return false;
		}	
	}
	/*if($('#iAlbum')){
		if($('#iAlbum').val() ==''){
			$('#divContactmsgid').html("Please select album category").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}*/
	
	$('#divContactmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#photosadd').hide();
	$('#addphoto_loading').show();
	
	$("#frmUploadPhoto").ajaxForm({		
		target: '#divContactmsgid',
		success: finish
		}).submit();

}

function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myphoto/';
}

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