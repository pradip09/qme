<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
{if  $ProductArr|@count gt 0}
{section name=i loop=$ProductArr}
<div class="automotive_rapt_box">
     <div class="automotive_pro_img"><a href="{$site_url}/myrealestateproductdetail/{$ProductArr[i].iProductId}"><img src="{$ProductArr[i].vImage}" width="150" height="120"/></a></div>
	 <div class="automotive_pro_dis">
	 	<div class="automotive_disprise">${$ProductArr[i].fAskingPrice}</div>
		<div class="automotive_distitle"><a href="{$site_url}/myrealestateproductdetail/{$ProductArr[i].iProductId}">{$ProductArr[i].vPropertyType} in {$ProductArr[i].vCity}</a></div>
		<div class="automotive_reapt_text"><b>{$ProductArr[i].vState}, {$ProductArr[i].vCountry}</b><br/>
		    {$ProductArr[i].iBedrooms} bedroom, {$ProductArr[i].iBaths} bath <br/>
		    {$ProductArr[i].fSqft} sq.ft.<br/>
		</div>
		
		<div class="automotive_edit_delete"><a href="{$site_url}/myrealestateproduct_add/{$ProductArr[i].iProductId}" title="Edit item">Edit</a>&nbsp;|&nbsp;<a href="#" onclick="deleteitem({$ProductArr[i].iProductId},'realestate');" title="Delete item">Delete</a></div>
		<div class="detaile_link_auto"><a href="{$site_url}/myrealestateproductdetail/{$ProductArr[i].iProductId}">View Details</a>
		   <!-- <a href="{$site_url}/myaddpostcampaign/add"><img src="{$tconfig["front_images"]}store_add_camp.png"/></a>
		    <a href="#Learnmore{$ProductArr[i].iProductId}" class="lern_link"><img src="{$tconfig["front_images"]}store_learn_more.png"/></a>-->
		    </div>
	</div>
	 <div style="display:none;">
				<div id="Learnmore{$ProductArr[i].iProductId}" class="signing">
					{$db_static_pages[0].lContents}
				</div>
			</div>
</div>
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">
        {$pages}
        </div></span>	
</div>
{else}
<div style="text-align:center;color:red;">No product available in this category</div>
{/if}


{literal}
<script type="text/javascript">
$(document).ready(function(){
$('.lern_link').fancybox({
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