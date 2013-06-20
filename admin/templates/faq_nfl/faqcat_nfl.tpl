<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=fan-faqcat_nfl&mode=view">FAQ Category</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add FAQ Category{else}Edit FAQ Category{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add FAQ Category</h2>
		{else}
		
		<h2 class="left">Edit FAQ Category</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">            
		<form id="frmadd" name="frmadd" action="index.php?file=fan-faqcat_nfl_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iFAQCategoryId" id="iFAQCategoryId" value="{$iFAQCategoryId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="inputboxes">
					<label for="textfield"><strong>FAQ Category</strong></label>
					{if $db_faqcat[0].vCategory eq 'Buy Points'}
					<input type="text" id="vCategory" name="Data[vCategory]" class="inputbox" value="{$db_faqcat[0].vCategory}" lang="*" title="Category" readonly="readonly"/>
					{else}
					<input type="text" id="vCategory" name="Data[vCategory]" class="inputbox" value="{$db_faqcat[0].vCategory}" lang="*" title="Category"/>
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Order No :</strong></label>
					<select id="iOrderNo" name="Data[iOrderNo]" title="Order No"  lang="*"  style="width:224px;">
						<option value=''>Select Order  No</option>
						{if $mode eq add}
							{while ($totalRec+1) >= $initOrder}
								<option value="{$initOrder}" {if $db_faqcat[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
							{/while}
						{else}
							{while ($totalRec) >= $initOrder}
								<option value="{$initOrder}" {if $db_faqcat[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
							{/while}
						{/if}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]"  style="width:224px;">
						<option value="Active" {if $db_faqcat[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_faqcat[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add FAQ Category" class="btn" onclick="return validate(document.frmadd);" title="Add FAQ Category"  style="margin-left: 140px;"/>
   				{else}
   				<input type="submit" value="Edit FAQ Category" class="btn" onclick="return validate(document.frmadd);" title="Edit FAQ Category"  style="margin-left: 140px;"/>
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
    var file = 'fan-faqcat_nfl';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=fan-faqcat_nfl&mode=view";
    return false;
}

</script>
{/literal}


