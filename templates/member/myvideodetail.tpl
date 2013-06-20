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
			<div class="ProcessingIndication Navigation Myaccount" id="addvideo_loading">Please wait while your Video is uploading.</div>
			<div id="addvideo" class="myphoto_album"> {if $mode eq 'add'}
				<div class="AddneweventTitle">Add Video</div>
				{else}
				<div class="AddneweventTitle">EDIT video</div>
				{/if}
				<div id="divvideoid" class="error_massage"></div>
				<div id="divmsgidinner" class="myphoto_blankspace"></div>
				<!--<form id="frmUploadVideo" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadvideo">
							<div class="myphoto_name_input"><label>Video Title :</label> <input type="text" name="videoname" id="videoname" class="singinput"/></div>
							<div  class="myphoto_name_input"><label>Select Cover Image :</label><input type="file" name="vVideoImages" id="vVideoImages" class="singinput" onchange="CheckValidFile(this.value,this.name)"/></div>
							<div  class="myphoto_name_input"><label>Select video :</label><input type="file" name="vVideo" id="vVideo" class="singinput" onchange="CheckValidVideoFile(this.value,this.name)"/></div>
							<div  class="myphoto_name_input myphoto_name_input_new"><label>Select Video Album:</label>
								<div style="margin-top:10px;">
								<select name="iVideoAlbum" id="iVideoAlbum">
								<option value="">Select album</option>
								{if  $db_albums|@count gt 0}
								{section name=j loop=$db_albums}
								<option value="{$db_albums[j].iVideoAlbumId}">{$db_albums[j].vVideoAlbum}</option>
								{/section}
								{/if}
								</select>
								</div>
							</div>
					</form>-->
				<div class="AddneweventLeftPart1" style="margin-left:20px;width:342px;margin-top:20px;padding:0px 13px 0px;">
				<form id="frmUploadVideo" name="frmUploadVideo" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadvideo">
					<input type="hidden" name="iVideoId" id="iVideoId" value="{$db_video[0].iVideoId}" />
					<input type="hidden" name="mode" id="mode" value="{$mode}" />
					<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_video[0].vImage}" />
					<div class="photo_form_box">
					<table>
						<tr>
							<td><label>Video title :</label>
							</td>
						</tr>
						<tr>
							<td  class="Photo_title"><input id="videoname" type="text" placeholder="Video title" name="videoname" value="{$db_video[0].vVideoName}">
							</td>
						</tr>
						<tr>
							<td><label>Select video type :</label>
							</td>
						</tr>
						<tr>
							<td>
						        <select id="eVideotype" name="eVideotype" onchange="checktype(this.value);">
								<option value="">--Select type--</option>
								<option value="Youtube" {if $db_video[0].eVideotype eq Youtube}selected{/if}>You tube</option>
								<option value="Personal" {if $db_video[0].eVideotype eq Personal}selected{/if}>Personal</option>
							</select>
							</td>
						       
						</tr>
						
						<tr>
								<td>
								     <div id="displayboxdiv" ></div>
								</td>
						</tr>
						{if $db_video[0].vVideolink neq ''}
						<tr><td>
						         <div id="videolink" style="height: 220px;width: 340px;">
								{$db_video[0].vVideolink}
								
						         </div></td>
						
						</tr>
						
						{/if}
						{if $db_video[0].vVideo neq ''}
						
						<tr>
							<td>
								<div id="videofile"><label>Select a video file :</label><br/>

								<div style="float:left; margin-right: 46px;margin-top: 10px;">
									<input type="file" name="vVideo" id="vVideo" onchange="CheckValidVideoFile(this.value,this.name)" value="{$db_video[0].vVideo}"/>
								</div>
								
								<div style="float:left; padding-top:1px;"><a href="#"><img src="{$tconfig["front_images"]}play-vedio-icon.png" onclick="playvideo('{$db_video[0].iVideoId}','{$db_video[0].vVideo}','{$db_video[0].iMemberId}');"/></a></div>
								
								</div>
							</td>
						</tr>
						{/if}
						<tr>
							<td><label>Select an image file:</label>
							</td>
						</tr>
						<tr>
							<td><div class="imagedisplay">
									<input type="file" name="vVideoImages" id="vVideoImages" value="{$db_video[0].vImage}" onchange="CheckValidFile(this.value,this.name)"/>
									{if $db_video[0].vImage neq ''}
									<div class="viewimage"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
								</div>
								<div style="display:none;">
									<div id="view1">
										<div>
											<div> <img src="{$tconfig["tsite_upload_images_video"]}/{$db_video[0].iMemberId}/{$db_video[0].vImage}"/> </div>
										</div>
									</div>
								</div>
								{else}
						</div>
						
						{/if}
						</td>
						
						</tr>
						
						<tr>
							<td><label>Select category:</label>
							</td>
						</tr>
						<tr>
							<td><div class="select_category_photo_box">
									<select name="iVideoAlbum" id="iVideoAlbum">
										<option value="">Select category</option>
										
												{if  $db_videocategory|@count gt 0}
												{section name=j loop=$db_videocategory}
												
										<option value="{$db_videocategory[j].iVideoAlbumId}" {if $db_videocategory[j].iVideoAlbumId eq $db_video[0].iVideoAlbumId}selected{/if}>{$db_videocategory[j].vVideoAlbum}</option>
										
												{/section}
												{/if}
												
									</select>
								</div></td>
						</tr>
					</table>
					<div id="displayboxdiv"></div>
					</div>
				</form>
				<div class="submitbutton_new">
					<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadVideo();"/>
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
var site_url='{/literal}{$site_url}{literal}';

function checktype(type){
	
   if(type == 'Youtube'){
	var html='';
	html+='<tr>';
	html+='<td>';
	html+='<div ><label>Enter Embed video link :</label></div><br/>';
	html+='<div><textarea name="vVideolink" id="vVideolink" style="margin-top: 0px; margin-bottom: 0px; height: 62px; margin-left: 2px; margin-right: 2px; width: 256px; "></textarea></div>';
	html+='</td>';
	html+='</tr>';
        $('#displayboxdiv').html(html);
        $('#videofile').hide();
   }
        if(type == 'Personal'){
	
	var html='';
	html+='<tr>';
	html+='<td>';
	html+='<div ><label>Select a video file :</label></div>';
	html+='<input type="file" name="vVideo" id="vVideo" onchange="CheckValidVideoFile(this.value,this.name)" />';
	html+='</td>';
	html+='</tr>';
        $('#displayboxdiv').html(html);
	$('#vVideolink').val('');
	$('#videolink').hide();
	
	}
		
}



function uploadVideo()
{
	
	
	if($('#videoname')){
		if($('#videoname').val() ==''){
			$('#divvideoid').html("Please Enter Video Title").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#eVideotype')){
		if($('#eVideotype').val() ==''){
			$('#divvideoid').html("Select Video type").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#mode').val() == 'add')
	{
	if($('#vVideolink')){
		if($('#vVideolink').val() ==''){
			$('#divvideoid').html("Enter Video link").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	}
	if($('#mode').val() == 'add')
	{
		if($('#vVideo')){
		if($('#vVideo').val() ==''){
			$('#divvideoid').html("Please Select a video file").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#vVideoImages')){
		if($('#vVideoImages').val() ==''){
			$('#divvideoid').html("Please Select image").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}		
	}
	
	$('#divvideoid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addvideo').hide();
	$('#addvideo_loading').show();
	
	$("#frmUploadVideo").ajaxForm({
		target: '#divvideoid',
		success: finish
		}).submit();
     
}
function finish(){
		window.location= site_url+'/myvideo';
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


function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}


function playvideo(id,file,userId)
{
						
 var html = '';
	    
	    html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="180" width="280" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_video"]}{literal}'+userId+'/'+file+'&plugins=sharing-2"/>';
	    //alert(html);
	    $('#displayboxdiv').html(html);
}
</script>
{/literal} 
