<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=sp-storeplan&mode=view">Store Plan</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Store Plan{else}Edit Store Plan{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Store Plan</h2>
		{else}
		
		<h2 class="left">Edit Store Plan</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=sp-storeplan_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iStorePlanId" id="iStorePlanId" value="{$db_storeplan[0].iStorePlanId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
                
               
				<div class="inputboxes">
					<label for="textfield"><strong>Store Plan Name:</strong></label>
					<input type="text" id="vStorePlanName" name="Data[vStorePlanName]" class="inputbox" value="{$db_storeplan[0].vStorePlanName}" lang="*" title="Store Category"/>			                    
            	</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Point:</strong></label>
					<input type="text" id="iPoint" name="Data[iPoint]" class="inputbox" value="{$db_storeplan[0].iPoint}" onkeypress="return checkprice(event);" lang="*" title="Point" />
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="{$db_storeplan[0].fPrice}" onkeypress="return checkprice(event);" lang="*" title="Price" />
				</div>
		<div class="inputboxes">
					<label for="textfield"><strong>Item limit:</strong></label>
					<input type="text" id="item_limit" name="Data[item_limit]" class="inputbox" value="{$db_storeplan[0].item_limit}" onkeypress="return checkprice(event);" lang="*" title="Item limit" />
				</div>
                												
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" {if $db_storeplan[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_storeplan[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Store Plan" class="btn" onclick="return validate(document.frmadd);" title="Add Item" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Store Plan" class="btn" onclick="return validate(document.frmadd);" title="Edit Item" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
	</div>
</div>
{literal}
<script>
function checkprice(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if (unicodes>47 && unicodes<58){
	            return true;
		}else{
			return false;
		}
	}
}
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'sp-storeplan';
    window.location=admin_url+"/index.php?file=sp-storeplan&mode=view";
    return false;
}

</script>
{/literal}


