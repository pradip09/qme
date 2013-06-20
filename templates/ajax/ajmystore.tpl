<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

{if  $StoreArr|@count gt 0}
{section name=i loop=$StoreArr}
        <div class="store_reapt_box">
                <div class="store_logo"><a  href="{$site_url}/myproducts/{$StoreArr[i].iStoreId}"><img src="{$tconfig["tsite_upload_images_store"]}{$StoreArr[i].iStoreId}/2_{$StoreArr[i].vStoreImage}" /></a></div>
                <div class="store_name">{$StoreArr[i].vStoreName}({$StoreArr[i].count})</div>                
                <li class="edit_delete_btn" style= "list-style-type: none;"><a href="{$site_url}/mystore_add/{$StoreArr[i].iStoreId}"><img src="{$tconfig["front_images"]}edit.png" title="edit photo" class="edit_photo"/></a>                
                <img src="{$tconfig["front_images"]}delete.1.png" title="delete photo" onclick="deleteitem({$StoreArr[i].iStoreId},'store');" style="cursor:pointer;padding-left:5px;"/></li>
                  <!--<li class="edit_delete_btn"><a href="{$site_url}/myphotodetail/{$PhotoArr[i].iPhotoId}"><img src="{$tconfig["front_images"]}edit.png" title="edit photo" class="edit_photo"/></a>-->                         
        </div>
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>

{else}
<div style="text-align:center;color:red;">No Store available in My Store</div>
{/if}


