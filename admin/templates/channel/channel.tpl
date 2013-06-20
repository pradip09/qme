<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="content">
<div class="container">
<div class="conthead">
	{if $mode eq add}
	<h2 class="left">Add Channel</h2>
	{else}
	<h2 class="left">Edit Channel</h2>
	{/if}
</div>
<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=ch-channel_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iChannelId" id="iChannelId" value="{$iChannelId}" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_channel[0].vImage}" />
		<input type="hidden" name="action" id="action" value="{$mode}" />
			<p>
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_ChannelMember}
						<option value='{$db_ChannelMember[i].iMemberId}' {if $db_ChannelMember[i].iMemberId eq $db_channel[0].iMemberId}selected{/if}>{$db_ChannelMember[i].vName}</option>
						{/section}
					</select>
			</p>
			
			<!--<p>
				<label for="textfield"><strong>Channel File Type:</strong></label>
				<label for="textfield">{$db_channel[0].tChannelFileType}</label>
			</p>-->
			<p>
				<label for="textfield"><strong>Channel Name:</strong></label>
				<input type="text" id="vChannelName" name="Data[vChannelName]" class="inputbox" lang="*" title="Channel Name" value="{$db_channel[0].vChannelName}"/>
			</p>
			<p>
				<label for="textfield"><strong>Channel Description:</strong></label>
				<textarea id="tChannelDescription" name="Data[tChannelDescription]" class="inputbox" title="Channel Description">{$db_channel[0].tChannelDescription}</textarea>
			</p>
			<p>
				<label for="textfield"><strong>Randomize Videos:</strong></label>
				<input type="radio" name="Data[eRandomizeVideos]" id="eRandomizeVideos" value="Yes"{if $db_channel[0].eRandomizeVideos eq Yes}checked{/if}>Yes
				<input type="radio" name="Data[eRandomizeVideos]" id="eRandomizeVideos" value="No"{if $db_channel[0].eRandomizeVideos eq No}checked{/if}>No	
			</p>
			<p>
				<label for="textfield"><strong>Repeat Videos:</strong></label>
				<input type="radio" name="Data[eRepeatVideos]" id="eRepeatVideos" value="Yes"{if $db_channel[0].eRepeatVideos eq Yes}checked{/if}>Yes
				<input type="radio" name="Data[eRepeatVideos]" id="eRepeatVideos" value="No"{if $db_channel[0].eRepeatVideos eq No}checked{/if}>No	
			</p>	
			
			<p>
					<label for="textfield"><strong>Channel Mode:</strong></label>
					{if $ChannelMode|@count gt 0}
					<select id="eChannelMode" name="Data[eChannelMode]" lang="*">
					<option value='0'>Choose Mode</option>	
					{section name=i loop=$ChannelMode}
					<option value="{$ChannelMode[i]}"{if $db_channel[0].eChannelMode eq {$ChannelMode[i]}}selected{/if}>{$ChannelMode[i]}</option>
					{/section}
					{/if}
					</select>
					
			</p>
			<div style="display:block;">
				<div style="width:303px;">
				<label for="textfield"><strong>Upload Channel Image:</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_channel[0].vImage}"  title="Channel Image" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				{if $db_channel[0].vImage neq ''}
				<div style="float:left; width:450px;">
				<div style="display:none;">
				<div id="channelimg">
					<div class="popup_box">
						<div><img src="{$tconfig["tsite_upload_images_channel"]}{$db_channel[0].iMemberId}/{$db_channel[0].vImage}"/></div>
						
					</div>
				</div>
				</div>
					
				</div>
				<label for="textfield"><strong>Current Channel Image:</strong></label>
				
				<a href="#channelimg" id="currentchannel_img"><img src="{$tconfig["tsite_upload_images_channel"]}{$db_channel[0].iMemberId}/{$db_channel[0].vImage}" height="150" width="150"/><a/>
				{/if}
			</div>
				{if $db_channel[0].vImage neq ''}
				<p>
					<label for="textfield"><strong>Delete Channel Image?:</strong>
					<input type="checkbox" id="eDeleteImage" name="eDeleteImage" onclick="ImageDelete();"value="Yes" {if $db_channel[0].eDeleteImage eq Yes}checked{/if}/></label>
				</p>
				{/if}			
			<p>
				<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_channel[0].eStatus eq Active}selected{/if} >Active</option>
					<option value="Inactive" {if $db_channel[0].eStatus eq Inactive}selected{/if} >Inactive</option>
				</select>
			</p>
			{if $mode eq add}
			<input type="submit" value="Add Channel" class="btn" title="Add Opportunity" onclick="return validate(document.frmadd);"/>
			{else}
			<input type="submit" value="Edit Channel" class="btn" title="Edit Opportunity" onclick="return validate(document.frmadd);"/>
			{/if}
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
</div>
</div>
</div>

{literal}
<script>
$(document).ready(function(){
	$('#currentchannel_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

	
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=ch-channel&mode=view";
    return false;
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


</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tChannelDescription' );


</script>
{/literal}
