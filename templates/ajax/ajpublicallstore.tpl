<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


{if  $StoreArr|@count gt 0}
{section name=i loop=$StoreArr}

<div class="album_reapt_box">
			<div class="album_reapt_img"><!--<a href="{$site_url}/publicMyproducts/{$code}/{$StoreArr[i].iStoreId}">--><img src="{$StoreArr[i].vStoreImage}" class="myphotoimg" style="width:156px;height:144px;"/></a></div>
			<div class="album_reapt_text">
				{$StoreArr[i].vStoreName}<br />
				
			</div>
		</div>

{/section}

<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>

{else}
<div style="text-align:center;color:red;">No Product available in this store</div>
{/if}
{literal}
<script>

</script>
{/literal}