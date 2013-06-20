<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Blog Category</h2>
		{else}
		
		<h2 class="left">Edit Blog Category</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=bc-blogcategory_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iBlogCategoryId" id="iBlogCategoryId" value="{$iBlogCategoryId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Blog Category:</strong></label>
					<input type="text" id="vBlogCategory" name="Data[vBlogCategory]" class="inputbox" value="{$db_blogcategory[0].vBlogCategory}" lang="*" title="Blog Category" style="width:900px"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_blogcategory[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_blogcategory[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Blog Category" class="btn" onclick="return validate(document.frmadd);" title="Add Blog Category"/>
   				{else}
   				<input type="submit" value="Edit Blog Category" class="btn" onclick="return validate(document.frmadd);" title="Edit Blog Category"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
<div id="content">
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'bc-blogcategory';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=bc-blogcategory&mode=view";
    return false;
}

</script>
{/literal}


