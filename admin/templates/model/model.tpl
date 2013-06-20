<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=md-model&mode=view">Model</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Model{else}Edit Model{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Model</h2>
		{else}
		
		<h2 class="left">Edit Model</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=md-model_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iModelId" id="iModelId" value="{$iModelId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="inputboxes">
					<label for="textfield"><strong>Make:</strong></label>
					<select id="iMakeId" name="Data[iMakeId]" lang="*" title="Make" style="width:224px;">
						<option value="">Select Make</option>
						{section name=i loop=$db_make}
						<option value='{$db_make[i].imakeId}' {if $db_make[i].imakeId eq $db_model[0].iMakeId}selected{/if}>{$db_make[i].vMake}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Model:</strong></label>
					<input type="text" id="vModel" name="Data[vModel]" class="inputbox" value="{$db_model[0].vModel}" lang="*" title="Model" />
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_model[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_model[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Model" class="btn" onclick="return validate(document.frmadd);" title="Add Model" style="margin-left:140px"/>
   				{else}
   				<input type="submit" value="Edit Model" class="btn" onclick="return validate(document.frmadd);" title="Edit Model" style="margin-left:140px;"/>
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
    var file = 'md-model';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
   window.location=admin_url+"/index.php?file=md-model&mode=view";
    return false;
}

</script>
{/literal}


