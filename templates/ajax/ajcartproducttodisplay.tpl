
<div class="checkproductbox">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="12%" height="41" class="productheading">&nbsp;</td>
				<td width="42%" class="productheading2">Product Name</td>
				<td width="15%" class="productheading">Unit Price</td>
				<td width="9%" class="productheading">Qty</td>
				<td width="13%" class="productheading">Sub total</td>
                                <td width="10%" class="productpaddingleftright">&nbsp;</td>
				
			</tr>
                        {if  $cart|@count gt 0}
                        {section name=i loop=$cart}
                       
		       <tr style="background:#F7F7F7;">
				<td valign="top" class="productimgpadding"><img src="{$cart[i].item_image}" width="92" height="69" alt="" /></td>
				<td valign="top" class="productnameheadding">{$cart[i].item_name}</td>
				<td valign="top" class="productprice">${$cart[i].item_prise}</td>
				<td valign="top" class="productprice">
				<div id="change{$cart[i].item_id}"><label style="float:none;border:none;" class="productqty1" value="{$cart[i].item_qty}">{$cart[i].item_qty}</label><br/><a href="javascript:void(0);" style="text-decoration:none;color:#E26700" onclick="change('{$cart[i].item_id}','{$cart[i].item_qty}');">Change</a></td></div>
				<td valign="top" class="productprice">${$cart[i].item_total}</td>
				<td valign="top" class="productpaddingleftright"><a href="javascript:void(0);" onClick="getAjaxCart('Delete','{$cart[i].item_id}','{$cart[i].item_category}','{$cart[i].item_prise}');""><img src="{$tconfig["front_images"]}delete.jpg" width="18" height="22" alt="" /></a></td>
				
			</tr>
			{literal}
			<script type="text/javascript">
			function change(id,qty)
			{
			    $('#change'+id).html('<input type="text" name="textfield" id="textfield" class="productqty1" value="'+qty+'"/><br/><a href="javascript:void(0);" style="text-decoration:none;color:#E26700" onclick="updatecart();">save</a></td>');
			}
			</script>
			{/literal}
                        {/section}
                        {else}
			<tr style="background:#F7F7F7;">
				<td valign="top" class="productimgpadding" colspan="6" style="text-align:center;color:red;">No product available in your cart</td>
			</tr>
                        {/if}
                </table></td>
	</tr>
	 {if  $cart|@count gt 0}
	<tr>
		<td valign="middle" class="bottombg"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="1%"><a href="{$site_url}/publicMystore/{$memurl}"><img src="{$tconfig["front_images"]}btn_shopping_continue.jpg" width="161" height="25" alt="" /></a></td>
				<td width="38%" align="left"><a href="javascript:void(0);" onclick="emptycart();"><img src="{$tconfig["front_images"]}btn_shopping_clear.jpg" width="161" height="25" alt="" /></a></td>
			</tr>
		</table></td>
	</tr>
	{/if}
</table>

	</div>
	
	 {if  $cart|@count gt 0}
	<div class="subtotalbox">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td class="Subtotal">Subtotal</td>
						<td class="Subtotal">${$subtotal}</td>
					</tr>
					<tr>
						<td class="grandtotal"> Grand Total</td>
						<td class="grandtotal">${$grandtotal}</td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="center"><a  href="{$site_url}/mypayment"><input style="cursor:pointer;" class="btnbg" type="button"  value="Proceed to Checkout" /></a></td>
			</tr>
		</table>
	</div>
	{/if}
