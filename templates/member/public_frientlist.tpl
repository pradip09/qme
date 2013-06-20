<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div class="desboard_body" id="services_boxinnerbg ">
	<div class="public_pro_container">
		<div class="top_album_title">
			<div class="top_album_img"> {if $db_user[0].vProfileImage neq ''} <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" /> {else} <img src="{$tconfig["front_images"]}user_img.png" height="70" width="70"/> {/if} </div>
			<div class="album_name">{$db_user[0].vName}</div>
			<div class="cl"></div>
			<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		</div>
		<div class="myphoto_album_img">
			<div class="myphoto_album_title">{$db_user[0].vName}'s Friends</div>
			<div class="QmeinContentPart PostInnerContentPart" >
				<div class="ProcessingIndication Navigation Myaccount" id="mypostjob_loading">Please Wait All Blogs are Loading...</div>
				<div class="public_frnd_request">
					<div id="public_frndlist"></div>
				</div>
				<div class="cl"></div>
			</div>
			<div class="cl"> </div>
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
allfrnds('{/literal}{$iMemberid}{literal}');
$(document).ready(function(){
$('.blogtext').fancybox({
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