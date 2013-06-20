{if  $CategoryArr|@count gt 0}
{section name=i loop=$CategoryArr}
<div class="category_bg">
	<div class="category_img"><a href="{$tconfig.tsite_url}/productlist/{$CategoryArr[i].iCategoryId}"><img src="{$CategoryArr[i].vImage}" title="{$CategoryArr[i].vTitle}" /></a></div>
	<div class="callaway_text">{$CategoryArr[i].vCategory}</div>
</div>
{/section}
<div class="page_link">
	<span style="padding-right:579px;">{$recmsg}</span>
	<span style="float:right" class="nav">{$pages}</span>
</div>
{else}
<div style=" background:#FFFFFF;text-align:center; height:30px;" class="errormsg_product">
	No Categor&iacute;a encontrados	  
    </div>
{/if}



    
      