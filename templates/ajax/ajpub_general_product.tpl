{if $ProductArr|@count gt 0}
{section name=i loop=$ProductArr}
<div class="public_store_reapt_box">
	<div class="store_reapt_img"><a href="{$site_url}/pub_productdetail/{$ProductArr[i].iStoreCategoryId}/{$ProductArr[i].iProductId}/{$db_user[0].vMemberUrl}"><img src="{$ProductArr[i].vProductImage}" width="148" height="154"/></a></div>
	<div class="store_reapt_imgtext" style="text-align:center;">
		<div class="pub_store_title"><a href="{$site_url}/pub_productdetail/{$ProductArr[i].iStoreCategoryId}/{$ProductArr[i].iProductId}/{$db_user[0].vMemberUrl}">{$ProductArr[i].vProductName}</a></div>
		<div class="public_store_disprise">${$ProductArr[i].fPrice}</div>
		{if $url !== $memurl}
		<div class="add_to_card">
			<input type="image" src="{$tconfig["front_images"]}add-to-card.png" onClick="getAjaxCart('Add','{$ProductArr[i].iProductId}','{$ProductArr[i].iStoreCategoryId}','{$ProductArr[i].fPrice}');"/>
		</div>
		{/if}
	</div>
</div>
{/section}
<div class="page_link" style="width:386px;">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>

{else}
<div style="text-align:center;color:red;">No product available in this category</div>
{/if}

