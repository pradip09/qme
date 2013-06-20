

{if  $PhotoCategoryArr|@count gt 0}
{section name=i loop=$PhotoCategoryArr}
<li>
	<div class="album_reapt_img"><a href="javascript:void(0);" onclick="publicprofileallphotos(0,'{$PhotoCategoryArr[i].iPhotoCategoryId}','{$iMemberid}');"> <img src="{$PhotoCategoryArr[i].vImage}" width="136" height="126" /></a></div>
	<div class="album_reapt_text_frntpage">
		{$PhotoCategoryArr[i].vPhotoCategory}<br />
		{$PhotoCategoryArr[i].count}
	</div>
</li>
{/section}

<div class="cl"></div>
{else}
<div style="text-align:center;color:red;">No photo albums available</div>
{/if}
{literal}
<script type="text/javascript">
publicprofileallphotos(0,0,'{/literal}{$iMemberid}{literal}');
</script>
{/literal}
