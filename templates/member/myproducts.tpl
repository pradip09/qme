<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductajax.js"></script>
<!--<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>-->
<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
				
					
					{include file="member/myaccountleft.tpl"}
					
				</div>
				<div class="desboard-right" style="padding-bottom:30px;">
				<div class="MyVedioTitle">
						<h1>{$vStoreCategory}</h1>
				</div>
				<div class="cl"></div>
				<div class="bredcums">
					<a href="{$site_url}/mystore">My Store</a> > {$vStoreCategory}
				</div>
				
					{if $iStoreCategoryId eq '1'}
					<div class="mystore_product_container">
						<div id="showMyproductDiv"></div>
					</div>
					{/if}
					{if $iStoreCategoryId eq '2'}
					<div class="mystore_product_container">
						<div id="showClothingDiv"></div>
					</div>
					{/if}
					{if $iStoreCategoryId eq '3'}
					<div class="mystore_product_container">
						<div id="showAutomotiveDiv"></div>
					</div>
					{/if}
					{if $iStoreCategoryId eq '4'}
					<div class="mystore_product_container">
						<div id="showRealestateDiv"></div>                        
					</div>
					{/if}
				


					
				</div>
				<div class="cl"></div>
			</div>
                        </div>
			
			
{literal}
<script type="text/javascript">

displayallproduct(0,'{/literal}{$iStoreCategoryId}{literal}');
displayallClothingproduct(0,'{/literal}{$iStoreCategoryId}{literal}');
displayallAutomotiveproduct(0,'{/literal}{$iStoreCategoryId}{literal}');
displayallRealestateproduct(0,'{/literal}{$iStoreCategoryId}{literal}');
</script>
{/literal}

