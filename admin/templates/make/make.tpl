<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=mk-make&mode=view">Make</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Make{else}Edit Make{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Make</h2>
		{else}
		
		<h2 class="left">Edit Make</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=mk-make_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="imakeId" id="imakeId" value="{$imakeId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Name:</strong></label>
					<input type="text" id="vMake" name="Data[vMake]" class="inputbox" value="{$db_make[0].vMake}" lang="*" title="Name"/>
				</div>

				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_make[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_make[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Make" class="btn" onclick="return validate(document.frmadd);" title="Add Make" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Make" class="btn" onclick="return validate(document.frmadd);" title="Edit Make" style="margin-left:140px;"/>
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
    var file = 'mk-make';
    window.location=admin_url+"/index.php?file=mk-make&mode=view";
    return false;
}

</script>
{/literal}


