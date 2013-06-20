<div class="contentcontainer" id="tabs">
	<div class="headings">
		{if $mode eq add}
		<h2 class="left">Add Song Album</h2>
		{else}
		
		<h2 class="left">Edit Song Album</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=so-songalbum_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iSongAlbumId" id="iSongAlbumId" value="{$iSongAlbumId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<p>
					<label for="textfield"><strong>Photo Category:</strong></label>
					<input type="text" id="vSongAlbum" name="Data[vSongAlbum]" class="inputbox" value="{$db_songalbum[0].vSongAlbum}" lang="*" title="Song Album"/>
				</p>
				
				<p>
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_songalbum[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_songalbum[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</p>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Song Album" class="btn" onclick="return validate(document.frmadd);" title="Add Song Album"/>
   				{else}
   				<input type="submit" value="Edit Song Album" class="btn" onclick="return validate(document.frmadd);" title="Edit Song Album"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'so-songalbum';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=so-songalbum&mode=view";
    return false;
}

</script>
{/literal}


