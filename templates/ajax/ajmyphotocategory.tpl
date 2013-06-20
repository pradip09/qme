{if  $PhotoCategoryArr|@count gt 0}
{section name=i loop=$PhotoCategoryArr}
<li>
        <ul>
                <li class="MyphotoImg"><a href="javascript:void(0);" onclick="getallphotos('0',{$PhotoCategoryArr[i].iPhotoCategoryId});"><img src="{$PhotoCategoryArr[i].vImage}" class="myphotoimg"/></a></li>
                <li class="MyphotoTxt">{$PhotoCategoryArr[i].vPhotoCategory}({$PhotoCategoryArr[i].count})</li>
                <div style="text-align:center;">
                <a href="{$site_url}/myphotoalbum/{$PhotoCategoryArr[i].iPhotoCategoryId}"><img src="{$tconfig["front_images"]}edit-album.png" title="edit photo" style="padding-top:10px;"/></a>
                <img src="{$tconfig["front_images"]}delete.1.png" title="delete album" onclick="deleteitem({$PhotoCategoryArr[i].iPhotoCategoryId},'photoalbum');" style="cursor:pointer;text-align:center;"/>
                </div>
                
        </ul>
</li>
{/section}
  
<!--<div class="page_link">
	<span style="padding-left:10px; float:left;font-size:14px;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">
        {$pages}
        </div></span>	
</div>-->
<div class="cl"></div>
{/if}

