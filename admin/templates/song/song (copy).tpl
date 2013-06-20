<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=so-song_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iSongId" id="iSongId" value="{$iSongId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_song[0].vImage}" />
				<input type="hidden" name="vOldHifi" id="vOldHifi" value="{$db_song[0].vHifiFile}" />
				<input type="hidden" name="vOldLofi" id="vOldLofi" value="{$db_song[0].vLofiFile}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Song Name:</strong></label>
					<input type="text" id="vSongName" name="Data[vSongName]" class="inputbox" value="{$db_song[0].vSongName}" lang="*" title="Song Name"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Song Credits:</strong></label>
					<input type="text" id="vSongCredits" name="Data[vSongCredits]" class="inputbox" value="{$db_song[0].vSongCredits}" title="Song Credits"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Existing Album:</strong></label>
					<select id="iSongAlbumId" name="Data[iSongAlbumId]" lang="*" title="Existing Album" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Song Album--</option>
						{section name=i loop=$db_songAlb}
						<option value='{$db_songAlb[i].iSongAlbumId}' {if $db_songAlb[i].iSongAlbumId eq $db_song[0].iSongAlbumId}selected{/if}>{$db_songAlb[i].vSongAlbum}</option>
						{/section}
						<option value="0">New Album</option>
					</select>
					<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->

				</div>
				<div class="inputboxes" id="newcat" style="display:none;">
					<label for="textfield"><strong>New Album:</strong></label>
					<div id="newtext"></div>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_songMember}
						<option value='{$db_songMember[i].iMemberId}' {if $db_songMember[i].iMemberId eq $db_song[0].iMemberId}selected{/if}>{$db_songMember[i].vName}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Song Label:</strong></label>
					<input type="text" id="vSongLabel" name="Data[vSongLabel]" class="inputbox" value="{$db_song[0].vSongLabel}" title="Song Label"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Song Genre:</strong></label>
					<select id="iSongGenreId" name="Data[iSongGenreId]" lang="*" title="Song Genre">
						<option value=''>--Select Song Genre--</option>
						{section name=i loop=$db_songGenre}
						<option value='{$db_songGenre[i].iSongGenreId}' {if $db_songGenre[i].iSongGenreId eq $db_song[0].iSongGenreId}selected{/if}>{$db_songGenre[i].vGenreName}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Song Lyrics:</strong></label>
					
					<textarea id="tSongLyrics" name="Data[tSongLyrics]" class="inputbox" title="Text" style="width:900px; height:200px">{$db_song[0].tSongLyrics}</textarea>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Song Information:</strong></label>
					<textarea id="tSongInformation" name="Data[tSongInformation]" class="inputbox" title="Text" style="width:900px; height:200px">{$db_song[0].tSongInformation}</textarea>
				</div>
				
				<div class="inputboxes">
					<label for="chkbox1"><strong>Explicit Lyrics</strong></label>
					<input type="checkbox" id="eExplicitLyrics" name="eExplicitLyrics" value="1" {if $db_song[0].eExplicitLyrics eq 'Yes'}checked{/if}>
				</div>
				<div class="inputboxes">
					<label for="chkbox1"><strong>Hide Song:</strong></label>
					<input type="checkbox" id="eHideSong" name="eHideSong" value="1" {if $db_song[0].eHideSong eq 'Yes'}checked{/if}>
				</div>
				<div class="inputboxes">
					<label for="chkbox1"><strong>No Radio</strong></label>
					<input type="checkbox" id="eNoRadio" name="eNoRadio" value="1" {if $db_song[0].eNoRadio eq 'Yes'}checked{/if}>
				</div>
				
				<div style="display:block;width:1000px;">
					<div style="width:303px;float:left;">
					<label for="textfield"><strong>Upload HIFI File:</strong></label>
					{if $db_song[0].vHifiFile eq ''}
					<input type="file" id="vHifiFile1" name="mp3file[]" class="inputbox" value="{$db_song[0].vHifiFile}"  title="vHifiFile" lang="*" onchange="CheckValidAudioFile(this.value,this.id)"/>
					{else}
					<input type="file" id="vHifiFile1" name="mp3file[]" class="inputbox" value="{$db_song[0].vHifiFile}"  title="vHifiFile" onchange="CheckValidAudioFile(this.value,this.id)"/>
					{/if}
					</div>
					{if $db_song[0].vHifiFile neq ''}
					<div style="float:left; width:600px;">
						<div style="width:300px; float:left; margin-top:20px; margin-left:25px;">
							<object type="application/x-shockwave-flash" data="{$tconfig['tsite_music']}/dewplayer-bubble.swf" width="250" height="65" id="dewplayer" name="dewplayer">
								<param name="wmode" value="transparent" />
								<param name="movie" value="{$tconfig['tsite_music']}/dewplayer-bubble.swf" />
								<param name="flashvars" value="mp3={$tconfig['tsite_upload_music_song']}{$db_song[0].iMemberId}/{$db_song[0].vHifiFile}&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
							</object>
						</div>
						<div style="width:200px; float:left">
							<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="HifiDelete();"/></p>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				<div style="display:block;width:1000px;">
				
					<div style="width:303px;float:left;">
					<label for="textfield"><strong>Upload LOFI File:</strong></label>
					<input type="file" id="vLofiFile" name="mp3file[]" class="inputbox" value="{$db_song[0].vLofiFile}"  title="vLofiFile" onchange="CheckValidAudioFile(this.value,this.id)"/>
					</div>
					{if $db_song[0].vLofiFile neq ''}
					<div style="float:left; width:600px;">
						<div style="width:300px; float:left; margin-top:20px; margin-left:25px;">
							<object type="application/x-shockwave-flash" data="{$tconfig['tsite_music']}/dewplayer-bubble.swf" width="250" height="65" id="dewplayer" name="dewplayer">
								<param name="wmode" value="transparent" />
								<param name="movie" value="{$tconfig['tsite_music']}/dewplayer-bubble.swf"/>
								<param name="flashvars" value="mp3={$tconfig['tsite_upload_music_song']}{$db_song[0].iMemberId}/{$db_song[0].vLofiFile}&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
							</object>
						</div>
						<div style="width:200px; float:left">
							<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="LofiDelete();"/></p>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				
				<div style="display:block;width:1000px;">
					<div style="width:303px;float:left;">
					<label for="textfield"><strong>Upload New Image:</strong></label>
					{if $db_song[0].vImage eq ''}
					<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_song[0].vImage}"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
					{else}
					<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_song[0].vImage}"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
					{/if}
					</div>
					{if $db_song[0].vImage neq ''}
					<div style="float:left; width:450px;">
						<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_music_song"]}{$db_song[0].iMemberId}/{$db_song[0].vImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Price (USD):</strong></label>
					<input type="text" id="iPrice" name="Data[iPrice]" class="inputbox" value="{$db_song[0].iPrice}" title="Price (USD)" style="width:100px" onkeypress="return checkprice(event);" />
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_song[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_song[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Song" class="btn" onclick="return validate(document.frmadd);" title="Add Song"/>
   				{else}
   				<input type="submit" value="Edit Song" class="btn" onclick="return validate(document.frmadd);" title="Edit Song"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'so-song';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=so-song&mode=view";
    return false;
}
</script>
<script>

showdropdownvalue($('#iSongAlbumId').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vNewAlbum" name="vNewAlbum" class="inputbox" title="New Album" lang="*"/>';
		$('#newtext').html(html);
		$('#newcat').show();
	}
}


//$('#iBlogCategoryId').change(function() {
//    $('#vNewCategory').css('display', ($(this).val() == '0') ? 'block' : 'none');
//    $('#vNewCategory').attr('lang', ($(this).val() == '0') ? '*' : '');
//});

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
$(document).ready(function(){
	$('#test2').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});	
});


function HifiDelete(){
	var r=confirm("Are you sure to delete this Music File");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteHifi");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
function LofiDelete(){
	var r=confirm("Are you sure to delete this Music File");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteLofi");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}


function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
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
function CheckValidAudioFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'wav' || a == 'WAV' || a == 'mp3'  ||a == 'MP3' ||a == 'aif' ||a == 'AIF' ||a == 'mid' ||a == 'MID'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (wav,mp3,aif,mid)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tSongLyrics' );
	CKEDITOR.replace( 'tSongInformation' );
	
</script>
{/literal}


