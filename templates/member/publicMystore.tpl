<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductajax.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>

<div class="desboard_body" id="services_boxinnerbg">

<div class="myphoto_album_container">
	<div class="top_album_title">
	<div class="top_album_img">
				{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
			<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}</div>
		<div class="album_name">{$db_user[0].vName}</div>
				<div class="cl"></div>
			<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		<div class="cl"></div>
		
		
		
		

		
		
		
		
	</div>
	<div class="myphoto_album_img">
	<div class="myphoto_album_title">
		<div style="width:345px;float:right;padding-top:10px;" id="linkstore">
		{if $arrvideo[0].vFile neq ''}<a href="#" onclick="showvideofile()" style="color:#E26700;text-align:right;">Video</a>{/if}
		</div>
		<a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s Store</a>
	</div>
	
		<div class="rightwidth">
			<div id="showProductId">
				{if $arrBannerProduct|@count gt 0}
				<div id="slider" class="slider-wrapper theme-default">
				{section name=i loop=$arrBannerProduct}
					<img src="{$arrBannerProduct[i]}" data-thumb="{$arrBannerProduct[i]}" alt="" title="" height="339" width="535"/>
				{/section}
				</div>
				{else}
					<div class="height">No Product Available</div>
				
				{/if}
			</div>
			
			<div id="showvideo">
					<object><embed src="{$tconfig["tsite_music"]}/player.swf" height="339" width="535" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={$arrvideo[0].vFile}&plugins=sharing-2"/>
					</object>
			</div>
		</div>
		<div class="right_store_pub">
			
			<div class="pub_store_reapt_box">
				 <div class="pub_store_logo"><a style="cursor:pointer;" onclick="showPublicGeneralProduct(0,{$db_user[0].iMemberId},1);"><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[0].iStoreCategoryId}/1_{$db_store[0].vStoreImage}"></a></div>
				 <div class="pub_store_name">{$db_store[0].vStoreCategory}({$cntGeneral})</div>
			</div>
			<div class="pub_store_reapt_box">
				 <div class="pub_store_logo"><a style="cursor:pointer;" onclick="showPublicClothingProduct(0,{$db_user[0].iMemberId},2);"><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[1].iStoreCategoryId}/1_{$db_store[1].vStoreImage}"></a></div>
				 <div class="pub_store_name">{$db_store[1].vStoreCategory}({$cntClothing})</div>
			</div>
			<div class="pub_store_reapt_box">
				 <div class="pub_store_logo"><a style="cursor:pointer;" onclick="showPublicAutomotiveProduct(0,{$db_user[0].iMemberId},3);"><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[2].iStoreCategoryId}/1_{$db_store[2].vStoreImage}"></a></div>
				 <div class="pub_store_name">{$db_store[2].vStoreCategory}({$cntAutomotive})</div>
			</div>
			<div class="pub_store_reapt_box">
				 <div class="pub_store_logo"><a style="cursor:pointer;" onclick="showPublicRealestateProduct(0,{$db_user[0].iMemberId},4);"><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[3].iStoreCategoryId}/1_{$db_store[3].vStoreImage}"></a></div>
				 <div class="pub_store_name">{$db_store[3].vStoreCategory}({$cntReal})</div>
			</div>
		</div>
		<div class="cl"></div>
	</div>
</div>	
	
</div>
</div>

{literal}
<script type="text/javascript">
$('#showvideo').hide();
$(window).load(function() {
    $('#slider').nivoSlider({
	    animSpeed: 500, // Slide transition speed
	    pauseTime: 4000// How long each slide will show
    });
    $('#slider').nivoSlider();
});

function showvideofile()
{
	
	$('#showvideo').show();
	$('#showProductId').hide();
}
function showimage()
{
	$('#showvideo').hide();
	$('#showProductId').show();
}
</script>
{/literal}