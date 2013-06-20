<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Photo Category</h2>
		{else}
		
		<h2 class="left">Edit Photo Category</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ph-photocategory_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iPhotoCategoryId" id="iPhotoCategoryId" value="{$iPhotoCategoryId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Photo Category:</strong></label>
					<input type="text" id="vPhotoCategory" name="Data[vPhotoCategory]" class="inputbox" value="{$db_photocategory[0].vPhotoCategory}" lang="*" title="Photo Category" style="width:900px"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_photocategory[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_photocategory[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Add Photo Category"/>
   				{else}
   				<input type="submit" value="Edit Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Edit Photo Category"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'ph-photocategory';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ph-photocategory&mode=view";
    return false;
}

</script>
{/literal}


