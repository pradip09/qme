{if  $ProductArr|@count gt 0}
{section name=i loop=$ProductArr}
<div class="automotive_rapt_box">
     <div class="automotive_pro_img"><a href="{$site_url}/pub_productdetail/{$ProductArr[i].iStoreCategoryId}/{$ProductArr[i].iProductId}/{$db_user[0].vMemberUrl}"><img src="{$ProductArr[i].vImage}" width="150" height="120"/></a></div>
	 <div class="automotive_pro_dis">
	 	<div class="automotive_disprise">${$ProductArr[i].fAskingPrice}</div>
		<div class="automotive_distitle"><a href="{$site_url}/pub_productdetail/{$ProductArr[i].iStoreCategoryId}/{$ProductArr[i].iProductId}/{$db_user[0].vMemberUrl}">{$ProductArr[i].vPropertyType} in {$ProductArr[i].vCity}</a></div>
		<div class="automotive_reapt_text"><b>{$ProductArr[i].vState}, {$ProductArr[i].vCountry}</b><br/>
		    {$ProductArr[i].iBedrooms} bedroom, {$ProductArr[i].iBaths} bath <br/>
		    {$ProductArr[i].fSqft} sq.ft.<br/>
		</div>
		
		<!--<div class="automotive_edit_delete"><a href="{$site_url}/myrealestateproduct_add/{$ProductArr[i].iProductId}">Edit</a>&nbsp;|&nbsp;<a href="#" onclick="deleteitem({$ProductArr[i].iProductId},'realestate');" title="Delete Product">Delete</a></div>-->
		<div class="detaile_link_auto"><a href="{$site_url}/pub_productdetail/{$ProductArr[i].iStoreCategoryId}/{$ProductArr[i].iProductId}/{$db_user[0].vMemberUrl}">View Details</a></div>
	</div>
</div>
{/section}
<div class="page_link" style="width:386px;">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">
        {$pages}
        </div></span>	
</div>
{else}
<div style="text-align:center;color:red;">No product available in this category</div>
{/if}	