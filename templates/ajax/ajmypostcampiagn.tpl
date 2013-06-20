<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>

{if  $CampaginArr|@count gt 0}
{section name=i loop=$CampaginArr}
<div class="post_com_reapt_mainbg" style="height:368px;">
	<div class="post_com_reapt_bg">
		<div class="post_video_bg" id="displayboxdiv{$CampaginArr[i].iCampaignId}"><img src="{$CampaginArr[i].vImage}" width="450" height="320" /> </div>
		<div class="post_comp_dis" style="margin-left:465px;">
			<!---<div class="post_camedit_delete"><a href="{$site_url}/myaddpostcampaign/{$CampaginArr[i].iCampaignId}">Edit</a>&nbsp;|&nbsp;<a href="#" onclick="deleteitem({$CampaginArr[i].iCampaignId},'postcampaign');" style="cursor:pointer;">Delete</a></div>--->
			<div class="post_comp_dis_height">
				<h4>{$CampaginArr[i].vCampaignName}</h4>
				Description : <span class="Greentxt" style="font-size:13px;">{$CampaginArr[i].tContent}</span><br />
				<a href="#read{$CampaginArr[i].iCampaignId}" class="desc">Read more..</a><br/>
				<div style="display:none">
					<div id="read{$CampaginArr[i].iCampaignId}" class="readpoppup">
						<div>
							<div class="popupheadding">{$CampaginArr[i].vCampaignName}</div>
							<div class="popuptext">{$CampaginArr[i].tFullContent}</div>
						</div>
					</div>
				</div>
				Ad view/click : <span>{$CampaginArr[i].iPointsViewingAd} points</span><br />
				Video/ Commercial view : <span>{$CampaginArr[i].iPointsCommercialAd} points</span><br />
				Radio ads : <span>{$CampaginArr[i].iPointsListenAd} points</span><br />
				Visit website : <span>{$CampaginArr[i].iPointsWeblinkAd} points</span><br />
				Share campaign : <span>{$CampaginArr[i].iPointsWhenShare} points</span><br />
				Buy this Product : <span>{$CampaginArr[i].iPontsWhenBuy} points</span><br />
				<a href="#" class="camp_discount">A {$CampaginArr[i].iItemDiscount}% Discount</a> </div>
			<div class="post_camedit_delete"><a href="{$site_url}/myaddpostcampaign/{$CampaginArr[i].iCampaignId}">Edit</a>&nbsp;|&nbsp;<a href="#" onclick="deleteitem({$CampaginArr[i].iCampaignId},'postcampaign');" style="cursor:pointer;">Delete</a></div>
			<div class="accept_but">
				<input type="button" value="Accept" />
			</div>
			<div class="accept_but">
				<input type="button" value="Decline" />
			</div>
			<div class="accept_but">
				<input type="button" value="Share" />
			</div>
			<div class="accept_but">
				<input type="button" value="Donation" />
			</div>
		</div>
		<div class="cl"></div>
	</div>
	<div class="bottom_reapt_link"> 
		{if  $CampaginArr[i].vVideoFile neq ''} <a id="viewCommercial" style="cursor:pointer;" onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video');">View Commercial</a><span>|</span>{/if}
		{if  $CampaginArr[i].vMp3File neq ''} <a style="cursor:pointer;" onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','mp3');">View Radio Ad</a><span>|</span>{/if}
		{if  $CampaginArr[i].vURL neq ''} <a href="{$CampaginArr[i].vURL}" target="_blank">View Website</a><span>|</span>{/if}
		{if  $CampaginArr[i].vBuyLinkURL neq ''}<a href="{$CampaginArr[i].vBuyLinkURL}" target="_blank">Buy This Product</a>{/if} 
	</div>
</div>

{literal}
<script type="text/javascript">

showdataonmaindiv('{/literal}{$CampaginArr[i].iAdminId}{literal}','{/literal}{$CampaginArr[i].iMemberId}{literal}','{/literal}{$CampaginArr[i].vImage}{literal}','{/literal}{$CampaginArr[i].iCampaignId}{literal}','image');
function showdataonmaindiv(iAdmId, iMemId, file,iCampaignId,type){
    
    if(type =='image'){
	    var html = '';

	    if(iAdmId != 0)
		html = '<img src="'+file+'" width="450px" height="320px">';
	    else
		html = '<img src="'+file+'"  width="450px" height="320px">';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	    var html = '';
	    
	    if(iAdmId != 0)
	    {
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="320" width="435" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file+'&plugins=sharing-2"/>';
	    }
            else
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="320" width="435" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file+'&plugins=sharing-2"/>';
	    
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='mp3'){
	var html='';
	
	if(iAdmId != 0)
	{
	    html +='<div class="musicfile">';
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value="mp3={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}/admin/'+iAdmId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	     html += '</object></div>';
	}
	else
	{
	    html +='<div class="musicfile">';
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value="mp3={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}/member/'+iMemId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object></div>';
	}
	
	$('#displayboxdiv'+iCampaignId).html(html);
    }
    
}

</script>
{/literal}	

{/section}
<div class="page_link"> <span style="padding-left:10px; float:left;">{$recmsg}</span> <span class="nav" style="float:right">
	<div align="right" id="paging">{$pages}</div>
	</span> </div>
<div class="cl"></div>
{else}
<div style="text-align:center;color:red;">No Campaign available</div>
{/if}

{literal}
<script type="text/javascript">
$(document).ready(function(){
$('.desc').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});

</script>
<script type="text/javascript">
	var playerUrl;
	var videoUrl;
	playerUrl = $('#playUrl').val();	
	videoUrl = $('#videoUrl').val();
	jwplayer("video-container").setup({
	    flashplayer: playerUrl,
	    file: videoUrl,
	      plugins: {
		"sharing-2": {
		  code: "",
		  link: ""
		}
	      },
	    height: 270,
	    width: 450
	});
</script>
{/literal}