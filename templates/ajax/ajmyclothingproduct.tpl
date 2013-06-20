{if  $ProductArr|@count gt 0}
{section name=i loop=$ProductArr}
        <div class="mystore_product_reapt_box">
                <div class="my_pro_img"><a href="{$site_url}/myclothingproductdetail/{$ProductArr[i].iProductId}"><img src="{$ProductArr[i].vProductImage}" width="164" height="170"/></a></div>
                <li class="edit_delete_btn" style= "list-style-type: none; padding-top:5px;"><a href="{$site_url}/myclothingproduct_add/{$ProductArr[i].iProductId}"><img src="{$tconfig["front_images"]}edit.png" title="Edit item" class="edit_photo"/></a> 
                <img src="{$tconfig["front_images"]}delete.1.png" title="Delete item" onclick="deleteitem({$ProductArr[i].iProductId},'clothingproduct');" style="cursor:pointer;padding-left:5px;"/></li>
                <div class="my_pro_dis" style="text-align:center;">
                        <div class="my_pro_distitle"><a href="{$site_url}/myclothingproductdetail/{$ProductArr[i].iProductId}">{$ProductArr[i].vProductName}</a></div>
                        <!--<div style="min-height:100px;">{$ProductArr[i].tDescription}</div>-->       
                        <div class="my_pro_disprise">${$ProductArr[i].fPrice}</div>
                        <div class="cart_campaign">
				 Would you like to create a campaign for this item ?
				 <div class="cart_campaign_inner">
				 <div class="store_learn">
					<a href="{$site_url}/myaddpostcampaign/add"><img src="{$tconfig["front_images"]}store_add_camp.png"/></a>
				 </div>
				 <div class="store_learn">
					<a href="#Learnmorecloth{$ProductArr[i].iProductId}" class="lern_link_cloth"><img src="{$tconfig["front_images"]}store_learn_more.png"/>
				 </div>
				 </div>
			
			</div>
			<div style="display:none;">
				<div id="Learnmorecloth{$ProductArr[i].iProductId}" class="signing">
					{$db_static_pages[0].lContents}
				</div>
			</div>
                </div>
        </div>
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>

{else}
<div style="text-align:center;color:red;">No product available in this category</div>
{/if}


{literal}
<script type="text/javascript">
$(document).ready(function(){
$('.lern_link_cloth').fancybox({
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