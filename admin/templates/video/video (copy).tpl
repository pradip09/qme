<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

<div class="contentcontainer" id="tabs">
	<div class="headings">
		{if $mode eq add}
		<h2 class="left">Add Video</h2>
		{else}
		
		<h2 class="left">Edit Video</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=v-video_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVideoId" id="iVideoId" value="{$iVideoId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_video[0].vImage}" />
				<input type="hidden" name="vOldVideo" id="vOldVideo" value="{$db_video[0].vVideo}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Video Name:</strong></label>
					<input type="text" id="vVideoName" name="Data[vVideoName]" class="inputbox" value="{$db_video[0].vVideoName}" lang="*" title="Video Name"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Video Credits:</strong></label>
					<input type="text" id="vVideoCredits" name="Data[vVideoCredits]" class="inputbox" value="{$db_video[0].vVideoCredits}" title="Video Credits"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Existing Album:</strong></label>
					<select id="iVideoAlbumId" name="Data[iVideoAlbumId]" lang="*" title="Existing Album" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Video Album--</option>
						{section name=i loop=$db_videoalbum}
						<option value='{$db_videoalbum[i].iVideoAlbumId}' {if $db_videoalbum[i].iVideoAlbumId eq $db_video[0].iVideoAlbumId}selected{/if}>{$db_videoalbum[i].vVideoAlbum}</option>
						{/section}
						<option value="0">New Video Album</option>
					</select>
					<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->

				</div>
				<div class="inputboxes">
				<div class="inputboxes" id="newcat" style="display:none;">
					<label for="textfield"><strong>New Video Album:</strong></label>
					<div id="newtext"></div>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_videoMember}
						<option value='{$db_videoMember[i].iMemberId}' {if $db_videoMember[i].iMemberId eq $db_video[0].iMemberId}selected{/if}>{$db_videoMember[i].vName}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Video Genre:</strong></label>
					{if $video_genre|@count gt 0}
					<select id="eVideoGenre" name="Data[eVideoGenre]">
					<option value="">Action</option>	
					{section name=i loop=$video_genre}
					<option value="{$video_genre[i]}"{if $db_video[0].eVideoGenre eq {$video_genre[i]}}selected{/if}>{$video_genre[i]}</option>
					{/section}
					{/if}
					</select>
				</div>
<label for="textfield"><strong>Video Caption:</strong></label>
				<div class="inputboxes">
					
					<textarea id="vVideoCaption" name="Data[vVideoCaption]" class="inputbox" title="Text" style="width:900px; height:200px">{$db_video[0].vVideoCaption}</textarea>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Artist License:</strong></label>
					<input type="text" id="vArtistLicense" name="Data[vArtistLicense]" class="inputbox" value="{$db_video[0].vArtistLicense}" lang="*" title="Artist License"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Explicit Content?</strong></label>
					<input type="checkbox" id="eExplicitContent" name="eExplicitContent" value="1" {if $db_video[0].eExplicitContent eq 'Yes'}checked{/if}>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Video:</strong></label>
					<input type="checkbox" id="eHideVideo" name="eHideVideo" value="1" {if $db_video[0].eHideVideo eq 'Yes'}checked{/if}>
				</div>
				
				{if $db_video[0].vVideo neq ''}
				<div class="inputboxes">
					<label for="textfield"><strong>Current Video File:</strong></label>
					<a class="video"  title="The Falltape" href="{$tconfig["tsite_upload_images_video"]}{$db_video[0].iMemberId}/{$db_video[0].vVideo}?fs=1&amp;autoplay=1"><img src="{{$tconfig["tsite_images"]}}play.png"/></a>
					
					
				</div>
				{/if}
				
				<div class="inputboxes">
					<label for="textfield"><strong>Upload Video File:</strong></label>
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="{$db_video[0].vVideo}"  title="Video File" onchange="CheckValidVideoFile(this.value,this.name)"/>
					
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Video Viewer Access:</strong></label>
					{if $VideoViewerAccess|@count gt 0}
					<select id="eVideoViewerAccess" name="Data[eVideoViewerAccess]">
					<option value="">Streaming Only</option>	
					{section name=i loop=$VideoViewerAccess}
					<option value="{$VideoViewerAccess[i]}"{if $db_video[0].eVideoViewerAccess eq {$VideoViewerAccess[i]}}selected{/if}>{$VideoViewerAccess[i]}</option>
					{/section}
					{/if}
					</select>
				</div>
				{if $db_video[0].vVideo neq ''}
				<div class="inputboxes">
					<label for="textfield"><strong>Delete Video?:</strong>
					<input type="checkbox" id="eDeleteVideo" name="eDeleteVideo" onclick="VideoDelete();" value="Yes" {if $db_video[0].eDeleteVideo eq Yes}checked{/if}/></label>
				</div>
				{/if}			
				<div style="display:block;">
				<div style="width:303px;">
				<label for="textfield"><strong>Upload Video Image:</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_video[0].vImage}"  title="Video Image" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				{if $db_video[0].vImage neq ''}
				<div class="inputboxes">
						<!--<div style="float:left; margin:26px 5px 0px 26px;"><a href="#videoimg" id="video_img"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>-->
						
						<div style="display:none;">
						<div id="videoimg">
							<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_images_video"]}{$db_video[0].iMemberId}/{$db_video[0].vImage}"/></div>
								
							</div>
						</div>
						</div>
					
				</div>
				<div style="clear:both;"></div>
				<div class="inputboxes">
				<label for="textfield"><strong>Current Video Image:</strong></label>
				
				<a href="#videoimg" id="currentvideo_img"><img src="{$tconfig["tsite_upload_images_video"]}{$db_video[0].iMemberId}/{$db_video[0].vImage}" height="100" width="100"/><a/>
				{/if}
				</div>
				{if $db_video[0].vImage neq ''}
				<div class="inputboxes">
					<label for="textfield"><strong>Delete Video Image?:</strong>
					<input type="checkbox" id="eDeleteVideoImage" name="eDeleteVideoImage" onclick="ImageDelete();"value="Yes" {if $db_video[0].eDeleteVideoImage eq Yes}checked{/if}/></label>
				</div>
				{/if}
<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Price(USD):</strong></label>
					<input type="text" id="vPrice" name="Data[vPrice]" class="inputbox" value="{$db_video[0].vPrice}" title="Price(USD)" style="width:100px" onkeypress="return checkprice(event);" />
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_video[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_video[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Video" class="btn" onclick="return validate(document.frmadd);" title="Add Video"/>
   				{else}
   				<input type="submit" value="Edit Video" class="btn" onclick="return validate(document.frmadd);" title="Edit Video"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'v-video';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=v-video&mode=view";
    return false;
}
</script>
<script>

showdropdownvalue($('#iVideoAlbumId').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vNewPageCode" name="vNewPageCode" class="inputbox" title="New PageCode" lang="*"/>';
		$('#newtext').html(html);
		$('#newcat').show();
	}
}


//$('#iBlogCategoryId').change(function() {
//    $('#vNewCategory').css('display', ($(this).val() == '0') ? 'block' : 'none');
//    $('#vNewCategory').attr('lang', ($(this).val() == '0') ? '*' : '');
//});

$(document).ready(function(){
	$('#video_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
$(document).ready(function(){
	$('#currentvideo_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

jQuery(document).ready(function() {
	 
    $(".video").click(function() {
	        $.fancybox({
	            'padding'       : 0,
	            'autoScale'     : false,
	            'transitionIn'  : 'none',
	            'transitionOut' : 'none',
	            'title'         : this.title,
	            'width'         : 640,
	            'height'        : 385,
	            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
	           'type'  : 'iframe',
	            'iframe'           : {
	            'wmode'             : 'transparent',
	            'allowfullscreen'   : 'true'
	            }
	        });
	 
	        return false;
	    });
	});

function VideoDelete(){
	var r=confirm("Are you sure to delete this Video File");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteVideo");
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

function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'vVideoCaption' );
</script>
{/literal}


