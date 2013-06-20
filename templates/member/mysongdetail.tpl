<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Song</h1>
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
		<ul>
			<div class="ProcessingIndication Navigation Myaccount" id="addsong_loading">Please wait while your song is uploading.</div>
			<div id="addsong" class="myphoto_album"> {if $mode eq 'add'}
				<div class="AddneweventTitle">Add Song</div>
				{else}
				<div class="AddneweventTitle">Edit Song</div>
				{/if}
				<div id="divsongmsgidinner" class="error_massage"></div>
				<div id="divmsgidinner" class="myphoto_blankspace"></div>
				<div class="AddneweventLeftPart1" style="margin-left:20px;width:342px;margin-top:20px;padding:0px 13px 0px;">
				<form id="frmUploadSong" name="frmUploadSong" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadsong">
					<input type="hidden" name="iSongAlbumId" id="iSongAlbumId" value="{$db_songcategory[0].iSongAlbumId}" />
					<input type="hidden" name="iSongId" id="iSongId" value="{$db_music[0].iSongId}" />
					<input type="hidden" name="mode" id="mode" value="{$mode}" />
					<div class="photo_form_box">
					<table>
						<tr>
							<td><label>Song title :</label>
							</td>
						</tr>
						<tr>
							<td  class="Photo_title"><input id="songname" type="text" placeholder="Song title" name="songname" value="{$db_music[0].vSongTitle}">
							</td>
						</tr>
						<tr>
							<td><label>Select a audio file:</label>
							</td>
						</tr>
						<tr>
							<td><div style="float:left; margin-right:10px;">
									<input type="file" name="vSong" id="vSong" onchange="CheckAudioValidFile(this.value,this.name)"/>
								</div>
								{if $db_music[0].vSong neq ''}
								<div id="displaydiv{$db_music[0].iSongId}" style="float:left; padding-top:1px;">
								<a href="#"><img src="{$tconfig["front_images"]}play-icon.png" onclick="playmusic('{$db_music[0].iSongId}','{$db_music[0].vSong}','{$db_music[0].iMemberId}')"/></a>
								<div class="playicon"></div>
								{/if} </td>
						</tr>
						<!--<tr>
							<td><label>Select image :</label>
							</td>
						</tr>
						<tr>
							<td><div class="imagedisplay">
									<input type="file" name="vSongImage" id="vSongImage" value="{$db_music[0].vCoverImage}" onchange="CheckValidFile(this.value,this.name)"/>
									{if $db_music[0].vCoverImage neq ''}
									<div class="viewimage"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
								</div>
								<div style="display:none;">
									<div id="view1">
										<div>
											<div> <img src="{$tconfig["tsite_upload_music_song"]}/{$db_music[0].iMemberId}/{$db_music[0].vCoverImage}"/> </div>
										</div>
									</div>
								</div>
								{else}
						</div>
						
						{/if}
						</td>
						
						</tr>-->
						
						<tr>
							<td><label>Select album:</label>
							</td>
						</tr>
						<tr>
							<td><div class="select_category_photo_box">
									<select name="iSongAlbum" id="iSongAlbum" style="width:325px;">
										<option value="">Select album</option>
										
												{if  $db_songcategory|@count gt 0}
												{section name=j loop=$db_songcategory}
												
										<option value="{$db_songcategory[j].iSongAlbumId}" {if $db_songcategory[j].iSongAlbumId eq $db_music[0].iSongAlbumId}selected{/if}>{$db_songcategory[j].vSongAlbum}</option>
										
												{/section}
												{/if}
												
									</select>
								</div></td>
						</tr>
						<tr>
							<td><label>Select genre:</label>
							</td>
						</tr>
						<tr>
							<td><div class="select_category_photo_box">
									<select name="iGenre" id="iGenre" style="width:325px;">
										<option value="">Select genre</option>
										
												{if  $db_genre|@count gt 0}
												{section name=j loop=$db_genre}
												
										<option value="{$db_genre[j].iSongGenreId}">{$db_genre[j].vGenreName}</option>
										
												{/section}
												{/if}
												
									</select>
								</div></td>
						</tr>
						<tr>
							<td  class="myphoto_sub_cal_btn"></td>
						</tr>
					</table>
					</div>
				</form>
				<div class="submitbutton_new">
					<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return uploadSong();"/>
					<a href="{$site_url}/mysong"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
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

function uploadSong()
{	
	if($('#songname')){
				
		if($('#songname').val() ==''){
				
			$('#divsongmsgidinner').html("Please enter Song Title").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#mode').val() =='add')
	{
	if($('#vSong')){
		if($('#vSong').val() ==''){
			$('#divsongmsgidinner').html("Please select your song file").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#vSongImage')){
		if($('#vSongImage').val() ==''){
			$('#divsongmsgidinner').html("Please select Image").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	}
	
	
	$('#divsongmsgidinner').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addsong').hide();
	$('#addsong_loading').show();
	$("#frmUploadSong").ajaxForm({
		target: '#divsongmsgidinner',
		success: finish
		}).submit();

}


function finish()
{
      window.location='{/literal}{$site_url}{literal}'+'/mysong/';
}

$(document).ready(function(){
$('#testmusic').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});


function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckAudioValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
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


function playmusic(id,file,userId)
{
						
 var html = '';
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value=" mp3={/literal}{$tconfig["tsite_upload_music_song"]}{literal}/'+userId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object>';
	   //alert(html);
	    $('#displaydiv'+id).html(html);
}
</script>
{/literal} 