<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>

<div class="artisr_top_belt browsecomp_top_belt">
    <div class="artist_search_box">
	    <input type="text" name="" class="input_search" value="Search">
	    <input type="image" src="{$tconfig["front_images"]}/search_go_btn.png">
    </div>
    <div class="SelectTextBoxCamPaign">
	    <select name="selectPro" id="box7">
		    <option>Industry</option>
		    <option>State 1</option>
		    <option>State 2</option>
		    <option>State 3</option>
		    <option>State 4</option>
	    </select>
    </div>
    <div class="artist_top_roman">
	    <ul>
		    <li><a class="Select" href="#">A</a></li>
		    <li><a href="#">B</a></li>
		    <li><a href="#">C</a></li>
		    <li><a href="#">D</a></li>
		    <li><a href="#">E</a></li>
		    <li><a href="#">f</a></li>
		    <li><a href="#">g</a></li>
		    <li><a href="#">h</a></li>
		    <li><a href="#">i</a></li>
		    <li><a href="#">j</a></li>
		    <li><a href="#">k</a></li>
		    <li><a href="#">l</a></li>
		    <li><a href="#">m</a></li>
		    <li><a href="#">n</a></li>
		    <li><a href="#">o</a></li>
		    <li><a href="#">p</a></li>
		    <li><a href="#">q</a></li>
		    <li><a href="#">r</a></li>
		    <li><a href="#">s</a></li>
		    <li><a href="#">t</a></li>
		    <li><a href="#">u</a></li>
		    <li><a href="#">v</a></li>
		    <li><a href="#">w</a></li>
		    <li><a href="#">x</a></li>
		    <li><a href="#">y</a></li>
		    <li><a href="#">z</a></li>
	    </ul>
    </div>
</div>

{if  $CampaginArr|@count gt 0}
{section name=i loop=$CampaginArr}
<div class="Browse_com_reapt_mainbg">
    <div class="Browse_com_reapt_bg">
	<div class="browse_video_bg" id="displayboxdiv{$CampaginArr[i].iCampaignId}"> <img src="{$tconfig["tsite_upload_images_campaign"]}admin/{$CampaginArr[i].iAdminId}/2_{$CampaginArr[i].vImage}" /> </div>
	<div class="browse_comp_dis">
	<div class="browse_comp_dis_height">
	    <h4>{$CampaginArr[i].vCampaignName}</h4>
	    Description : <span class="Greentxt" style="font-size:13px;">{$CampaginArr[i].tContent}</span><br />
            
            <a href="#read{$CampaginArr[i].iCampaignId}" class="desc">Read more..</a><br/>
	    
            <div style="display:none">
                    <div id="read{$CampaginArr[i].iCampaignId}" class="readpoppup">
                    <div><div class="popupheadding">{$CampaginArr[i].vCampaignName}</div>
                    <div class="popuptext">{$CampaginArr[i].tFullContent}</div></div>
                    </div>
            </div>
			
	    Ad view/click : <span>{$CampaginArr[i].iPointsViewingAd} points</span><br />
            Video/ Commercial view : <span>{$CampaginArr[i].iPointsCommercialAd} points</span><br />
            Radio ads : <span>{$CampaginArr[i].iPointsListenAd} points</span><br />
            Visit website : <span>{$CampaginArr[i].iPointsWeblinkAd} points</span><br />
	    Share campaign : <span>{$CampaginArr[i].iPointsWhenShare} points</span><br />
	    </div>
	    <div class="accept_but">
		    <input type="button" value="Accept" />
	    </div>
	    <div class="accept_but">
		    <input type="button" value="Qlike" />
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
    <div class="bottom_reapt_link"> <a id="viewCommercial" style="cursor:pointer;" onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video');">View Commercial</a><span>|</span>
    <a style="cursor:pointer;" onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','mp3');">View Radio Ad</a><span>|</span>
    <a href="{$CampaginArr[i].vURL}" target="_blank">View Website</a><span>|</span><a href="{$CampaginArr[i].vBuyLinkURL}" target="_blank">Buy This Product</a> </div>
</div>

{literal}
<script type="text/javascript">

showdataonmaindiv('{/literal}{$CampaginArr[i].iAdminId}{literal}','{/literal}{$CampaginArr[i].iMemberId}{literal}','{/literal}{$CampaginArr[i].vImage}{literal}','{/literal}{$CampaginArr[i].iCampaignId}{literal}','image');
function showdataonmaindiv(iAdmId, iMemId, file,iCampaignId,type){
    
    if(type =='image'){
	    var html = '';

	    if(iAdmId != 0)
		html = '<img src="{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/2_'+file+'">';
	    else
		html = '<img src="{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/2_'+file+'">';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	    var html = '';
	    
	    if(iAdmId != 0)
	    {
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="300" width="478" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file+'&plugins=viral-2d"/>';
	    }
            else
		html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="300" width="478" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file+'&plugins=viral-2d"/>';
	    
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='mp3'){
	var html='';
	
	if(iAdmId != 0)
	{
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value=" mp3={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}/admin/'+iAdmId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object>';
	}
	else
	{
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value=" mp3={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}/member/'+iMemId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object>';    
	}
	
	$('#displayboxdiv'+iCampaignId).html(html);
    }
    
}

</script>
{/literal}	
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>
{/if}

{literal}
<script>
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