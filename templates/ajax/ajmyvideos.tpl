 {if  $VideoCategoryArr|@count gt 0}
{section name=i loop=$VideoCategoryArr}
<div class="VedioReaptBox">
	<div class="VedioImg"> <a href="javascript:void(0);" onclick="getallvideos(0,'{$VideoCategoryArr[i].iVideoAlbumId}');"> <img src="{$VideoCategoryArr[i].vImage}" style="border-radius:9px;"/>
		<!--<img src="{$tconfig["front_images"]}vedio-img.gif"  />-->
		</a> </div>
	<div class="VedioText"> {$VideoCategoryArr[i].vVideoAlbum}
		({$VideoCategoryArr[i].count}) </div>
	<div class="edit_delete_btn"><a href="{$site_url}/myvideoalbum/{$VideoCategoryArr[i].iVideoAlbumId}"><img src="{$tconfig["front_images"]}edit-album.png" title="edit photo" class="edit_photo"/></a> <img src="{$tconfig["front_images"]}delete.1.png" title="delete video" onclick="deleteitem({$VideoCategoryArr[i].iVideoAlbumId},'videoalbum');" style="cursor:pointer;padding-left:5px;"/></div>
</div>
{/section}
<div class="cl"></div>
{else}
<div style="text-align:center;color:red;">No Video albums available</div>
{/if}