
<div class="contentcontainer" id="tabs">
	<div class="headings">
		{if $mode eq add}
		<h2 class="left">Add Video Album</h2>
		{else}
		
		<h2 class="left">Edit Video Album</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=va-videoalbum_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVideoAlbumId" id="iVideoAlbumId" value="{$iVideoAlbumId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
<label for="textfield"><strong>Video Album:</strong></label>
					<input type="text" id="vVideoAlbum" name="Data[vVideoAlbum]" class="inputbox" value="{$db_videoalbum[0].vVideoAlbum}" lang="*" title="Video Album"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_videoalbum[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_videoalbum[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Video Album" class="btn" onclick="return validate(document.frmadd);" title="Add Video Album"/>
   				{else}
   				<input type="submit" value="Edit Video Album" class="btn" onclick="return validate(document.frmadd);" title="Edit Video Album"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'va-videoalbum';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=va-videoalbum&mode=view";
    return false;
}

</script>
{/literal}


