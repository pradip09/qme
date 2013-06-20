<div class="contentcontainer">
<div class="headings">
	{if $mode eq add}
	<h2 class="left">Add Estimate Orders</h2>
	{else}
	<h2 class="left">Edit Estimate Orders</h2>
	{/if}
</div>
<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_orders_a" enctype="multipart/form-data" method="post">
        <input type="hidden" name="iEstimateDetailId" id="iEstimateDetailId" value="{$iEstimateDetailId}" />
        <input type="hidden" name="action" id="action" value="{$mode}" />
			<p>
				<label for="textfield"><strong>ProductCode :</strong></label>
				<input type="text" id="vProductCode" name="Data[vProductCode]" class="inputbox" value="{$db_cat[0].vProductCode}" lang="*" title="ProductCode"/>
			</p>
			<p>
				<label for="textfield"><strong>Title :</strong></label>
				<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="{$db_cat[0].vTitle}" lang="*" title="Title"/>
			</p>
			<p>
				<label for="textfield"><strong>Image :</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_cat[0].vImage}" title="Image"/>
				{if $mode eq edit}
						<label for="textfield"><strong>Old Image :</strong></label>
						<img src="{$upload_server_image}{$db_cat[0].vImage}"  />
					{/if}
			</p>
			<p>
				<label for="textfield"><strong>Description :</strong></label>
				<textarea type="text" id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="Description">{$db_cat[0].tDescription} </textarea>
			</p>
			<p>
				<label for="textfield"><strong>Price :</strong></label>
				<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="{$db_cat[0].fPrice}" lang="*" title="Price"/>
			</p>
			<p>
				<label for="textfield"><strong>Quantity :</strong></label>
				<input type="text" id="iQty" name="Data[iQty]" class="inputbox" value="{$db_cat[0].iQty}" lang="*" title="Quantity"/>
			</p>
			<p>
				<label for="textfield"><strong>TotalPrice :</strong></label>
				<input type="text" id="fTotalPrice" name="Data[fTotalPrice]" class="inputbox" value="{$db_cat[0].fTotalPrice}" lang="*" title="TotalPrice"/>
			</p>
			{if $mode eq add}
			<input type="submit" value="Add Orders" class="btn" title="Add Order" onclick="return validate(document.frmadd);"/>
			{else}
			<input type="submit" value="Edit Orders" class="btn" title="Edit Order" onclick="return validate(document.frmadd);"/>
			{/if}
			<input type="submit" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
</div>
</div>
{literal}
<script>
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=o-estimate_orders&mode=view";
    return false;
}
</script>
{/literal}
