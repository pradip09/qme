{if  $SongCategoryArr|@count gt 0}
{section name=i loop=$SongCategoryArr}

<div class="mysongs_box">
<div class="my_song_img">
<a href="javascript:void(0);" onclick="getallsongs(0,{$SongCategoryArr[i].iSongAlbumId});">							

<img src="{$SongCategoryArr[i].vImage}" alt="" title="" style="border-radius:9px;"/>
<!---<img src="{$tconfig["front_images"]}my-songs-img.png" alt="" title="" />--->
</a>
</div>
<div class="mysongs_box_bg"></div>
<div class="mysong_name">
{$SongCategoryArr[i].vSongAlbum}({$SongCategoryArr[i].count})

</div>
<div class="edit_delete_btn">
				<a href="{$site_url}/mysongalbum/{$SongCategoryArr[i].iSongAlbumId}" class="first"><img src="{$tconfig["front_images"]}song-update.png" title="edit album" class="edit_photo"/></a>
				<img src="{$tconfig["front_images"]}delete.2.png" title="delete album" onclick="deleteitem({$SongCategoryArr[i].iSongAlbumId},'songalbum');" style="cursor:pointer;padding-left:5px;"/>
			</div>
</div>


{/section}

{else}
<div style="text-align:center;color:red;">No Song albums available</div>
{/if}