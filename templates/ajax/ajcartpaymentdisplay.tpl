<div class="right_pay_info">
			
			<div class="order_sta_title">Order SUMMARY</div>
			<div class="order_sta_table">
				<table cellpadding="0" cellspacing="1" width="100%">
					<tbody>
						<tr>
							<th width="50">&nbsp;</th>
							<th>Name</th>
							<th width="50px">Qty</th>
							<th width="50px">Price</th>
							<th width="40px">&nbsp;</th>
						</tr>
                                                </tbody>
             {if  $cart|@count gt 0}
             {section name=i loop=$cart}
            <tbody class="order_strept">
                    <tr>    
                            <td class="order_img" align="center"><img src="{$cart[i].item_image}" width="30" height="30" /></td>
                            <td>{$cart[i].item_name}</td>
                            <td><div id="change{$cart[i].item_id}"><label style="float:none;border:none;" class="productqty1" value="{$cart[i].item_qty}">{$cart[i].item_qty}</label><br/><a href="javascript:void(0);" style="text-decoration:none;color:#E26700" onclick="change('{$cart[i].item_id}','{$cart[i].item_qty}');">Change</a></div></td>
                            <td>${$cart[i].item_prise}</td>
                            <td align="center"><a href="javascript:void(0);" onClick="getAjaxCart('Delete','{$cart[i].item_id}','{$cart[i].item_category}','{$cart[i].item_prise}');"><img src="{$tconfig["front_images"]}delete.jpg" width="18" height="22" alt="" /></a></td>
                    </tr>
            </tbody>
	    
			
            {literal}
            <script type="text/javascript">
            function change(id,qty)
            {
                $('#change'+id).html('<input type="text" name="textfield" id="textfield" class="productqty1" value="'+qty+'"/><br/><a href="javascript:void(0);" style="text-decoration:none;color:#E26700" onclick="updatecart();">save</a></td>');
            }
            </script>
            {/literal}
            {/section}
	   <table width="100%" cellpadding="0" cellspacing="0" class="pay_total">
					<tr>
						<td>Subtotal</td>
						<td>${$subtotal}</td>
					</tr>
					<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>${$grandtotal}</strong></td>
					</tr>
				</table>
            {else}
			<tr>
				<td valign="top" class="productimgpadding" colspan="6" style="text-align:center;color:red;">No product available in your cart</td>
			</tr>
                       
            {/if}
            
    </table>
</div>
			 
				
           
</div>