<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=ve-vehicle&mode=view">Vehicle type</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Vehicle type{else}Edit Vehicle type{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Vehicle Type</h2>
		{else}
		
		<h2 class="left">Edit Vehicle Type</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ve-vehicle_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVehicleTypeId" id="iVehicleTypeId" value="{$iVehicleTypeId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Name of Vehicle Type:</strong></label>
					<input type="text" id="vName" name="Data[vName]" class="inputbox" value="{$db_vehicle_type[0].vName}" lang="*" title="Vehicle type"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" {if $db_vehicle_type[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_vehicle_type[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Vehicle Type" class="btn" onclick="return validate(document.frmadd);" title="Add Vehicle Type" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Vehicle Type" class="btn" onclick="return validate(document.frmadd);" title="Edit Vehicle Type" style="margin-left:140px;"/>
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
    var file = 've-vehicle';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ve-vehicle&mode=view";
    return false;
}

</script>
{/literal}


