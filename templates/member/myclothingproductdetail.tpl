<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
	
	
{include file="member/myaccountleft.tpl"}
</div>
	
	
	<div class="desboard-right" style="padding-bottom:30px;">
		<div class="MyVedioTitle">
			<h1>Product Details</h1>
		</div>
		
		<div class="bredcums" style="padding-top:60px;">
			<a href="{$site_url}/mystore">My Store</a> > <a href="{$site_url}/myproducts/2"> Clothing and Accessories </a> > {$db_product[0].vProductName}
		</div>
		
		<div class="mystore_detail_container">
			<div class="mystore_detail_contentpart">
				<div class="mystore_detail_leftimg"> <a href="#original" id="hrefId"><img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreId}/2/{$db_product[0].iProductId}/1_{$db_product[0].vProductImage}" width="325" height="300" /></a> </div>
				<div style="display:none">
					<div id="original"> <img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreId}/2/{$db_product[0].iProductId}/{$db_product[0].vProductImage}" /> </div>
				</div>
				<div class="mystore_detail_content">
					<div class="prise_detail_txt">${$db_product[0].fPrice}</div>
				<div class="detail_title">{$db_product[0].vProductName}</div>
					<!--<div class="prise_detail_box">
						
						<div class="qty_inputbox"> Qty
							<input type="text" value="1" class="qty_input" />
							<input type="image" src="{$tconfig["front_images"]}add-to-card.png" class="addtocard_input" />
						</div>
					</div>-->
					<strong>Description: </strong> {$db_product[0].tProductDescription}<br />
					<strong>Purchase Note: </strong> {$db_product[0].tPurchaseNote}<br />
					<strong>Product Size: </strong> {$db_product[0].vProductSize}<br />
					<strong>Product Color: </strong> {$db_product[0].vProductColor}<br />
					<strong>Custom Color: </strong> {$db_product[0].vCustomColor}<br />
					<strong>Quantity: </strong> {$db_product[0].iQuantity}<br />
					<strong>Purchase Limit: </strong> {$db_product[0].iPurchaseLimit}<br />
					<strong>Handling Cost: </strong> {$db_product[0].fHandlingCost}<br />
					
				</div>
			</div>
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
displaymysongalbum(0,'{/literal}{$iUserId}{literal}');



$(document).ready(function(){
$('#hrefId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});
</script>
{/literal} 