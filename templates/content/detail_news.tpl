<div id="services_boxinnerbg" class="desboard_body">
	<div class="headerheding" style="width:940px;background:none; height:100%;">
		<a href="{$site_url}/{$db_sql[0]['vMemberUrl']}" style="margin-top:19px;font-size:15px;float:left;margin-left:18px;" >Back to home >></a>
		<h1 style="margin-top: 37px;margin-left: -127px;background:none;color:#424242;font-size:20px;">{$db_newsdetail[0].vTitle}</h1>
		</div>
			<span style="font-size:14px;float:right;margin-right: 27px;">Date-{$db_newsdetail[0].dAddedDate}</span>			
			<div class="cl"></div>

<div class="inner_body_box">
<div class="naticias-img_content">
<img src="{$tconfig["tsite_upload_images_news"]}{$db_newsdetail[0].iNewsId}/2_{$db_newsdetail[0].vImage}"/>

<p class="NewsContentTxt">{$db_newsdetail[0].vDescription}</p>
<div class="LikeCommentLinkNews"><a href="{$site_url}/news" style="font-size:15px;float:right;margin-right:10px;margin-bottom:10px;">See more news...</a></div>
<div class="cl"></div>
</div>
</div>

</div>
</div>