<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_box">

<div class="myphoto_album_container">
	<div class="top_album_title">
	<div class="top_album_img"><a href="{$site_url}/{$db_user[0].vMemberUrl}">
            <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" /></a>
		
	</div>
		<div class="album_name">{$db_user[0].vName}</div>
		
		<div class="cl"></div>
	</div>
	<div class="myphoto_album_img">
	<div class="myphoto_album_title"><a href="{$site_url}/publiPhotoalbum/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s albums</a> > {$db_user[0].vPhotoCategory} album</div>
		<div id="myallphotos" ></div>
		
		
		<div class="cl">
		</div>
	</div>
</div>	
	
</div>
</div>

{literal}
<script type="text/javascript">
publicprofileallphotos(0,'{/literal}{$iCatPhotoId}{literal}','{/literal}{$iMemberid}{literal}');
</script>
{/literal}