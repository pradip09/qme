<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>

<div class="desboard_body" id="services_boxinnerbg">
	<div class="public_pro_container">
		<div class="top_album_title">
			<div class="top_album_img"> <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" /> </div>
			<div class="album_name">{$db_user[0].vName}</div>
			<div class="cl"></div>
			<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		</div>
		<div id="fundcontent_wrap">
		<div class="campaignwrap" style="margin-left: 75px;">
			 <div class="leftcontent" id="displayboxdiv{$db_postcamp[0].iCampaignId}"><img src="{$db_postcamp[0].vImage}" title="Post Campaign" /></div>
				 <div class="rightcontent">
					<h3 class="campaign_title">{$db_postcamp[0].vCampaignName}</h3>
					{if $db_postcamp[0].tContent neq ''}
					<p>{$db_postcamp[0].tContent}  <a href="#read{$db_postcamp[0].iCampaignId}" class="desc">Read more..</a></p>
					{/if}
						<div style="display:none">
                                                                <div id="read{$db_postcamp[0].iCampaignId}" class="readpoppup">
                                                                <div><div class="popupheadding">{$db_postcamp[0].vCampaignName}</div>
                                                                <div class="popuptext">{$db_postcamp[0].tFullContent}</div>
                                                </div></div></div>
						<h3 class="stats">Stats</h3>
						<p> Ad view/click: <span>{$db_postcamp[0].iPointsViewingAd} points</span> <br>
						Video/ Commercial view: <span>{$db_postcamp[0].iPointsCommercialAd} points</span><br>
						Radio Ads: <span>{$db_postcamp[0].iPointsListenAd} points</span><br>
						Visit Website: <span>{$db_postcamp[0].iPointsWeblinkAd} points</span><br>
						Share Campaign: <span class="bluetext">{$db_postcamp[0].iPointsWhenShare} points</span> <br>
						Discount: <span class="bluetext">{$db_postcamp[0].iItemDiscount}%</span> </p>
				</div>
				 <div class="bottom_area">
	<!--area with four buy, commercial radio play links-->
					<ul class="navlinks">
						<li>{if $db_postcamp[0].vVideoFile neq ''}<a id="viewCommercial"  onclick="showdataonmaindiv('{$db_postcamp[0].iAdminId}','{$db_postcamp[0].iMemberId}','{$db_postcamp[0].vVideoFile}','{$db_postcamp[0].iCampaignId}','video');" class="btncommercial">View Commercial</a>{else}<a  class="btncommercial_blank"></a>{/if}</li>
						<li> {if $db_postcamp[0].vMp3File neq ''}<a  onclick="showdataonmaindiv('{$db_postcamp[0].iAdminId}','{$db_postcamp[0].iMemberId}','{$db_postcamp[0].vMp3File}','{$db_postcamp[0].iCampaignId}','mp3');" class="btnradio">Play Radio Ad</a>{else}<a  class="btnradio_blank"></a>{/if}</li>
						<li> {if $db_postcamp[0].vURL neq ''}<a href="http://{$db_postcamp[0].vURL}" target="_blank" class="btnwebsite">Visit Website</a>{else}<a  class="btnwebsite_blank"></a>{/if}</li>
						<li> {if $db_postcamp[0].vBuyLinkURL neq ''}<a href="http://{$db_postcamp[0].vBuyLinkURL}" target="_blank" class="btnbuy">Buy this product</a>{/if}</li>
					</ul>
				</div>	
					
				 <div class="accept_area">
						<!--area with four accept, decline links-->
	<ul class="navaccept">
		<li> <a href="#" class="linkaccept linkbtn">Accept</a></li>
		<li> <a href="#" class="linkdecline linkbtn">Decline</a></li>
		<li> <a href="#" class="linkshare linkbtn">Share</a></li>
		<li> <a href="#" class="linkdonate linkbtn">Donate</a></li>
	</ul>
    </div>

    
</div>
</div></div></div>

{literal}
<script type="text/javascript">
showdataonmaindiv('{/literal}{$db_postcamp[0].iAdminId}{literal}','{/literal}{$db_postcamp[0].iMemberId}{literal}','{/literal}{$db_postcamp[0].vImage}{literal}','{/literal}{$db_postcamp[0].iCampaignId}{literal}','image');
function showdataonmaindiv(iAdmId, iMemId, file,iCampaignId,type){
    
    if(type =='image'){
	    var html = '';

	    if(iAdmId != 0)
		html = '<div class="imagevideo"><img src="'+file+'" width="470px" height="328px"></div>';
	    else
		html = '<div class="imagevideo"><img src="'+file+'"  width="470px" height="328px"></div>';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	    var html = '';
	    
	    if(iAdmId != 0)
	    {
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="328" width="478" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file+'&plugins=sharing-2"/>';
	    }
            else
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="328" width="478" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file+'&plugins=sharing-2"/>';
	    
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
{/literal}