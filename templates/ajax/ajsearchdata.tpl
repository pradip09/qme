<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.selectbox-0.5.js"></script>
<link href="{$tconfig["tsite_url"]}/public/css/style-select.css" rel="stylesheet" type="text/css" />

{if  $eTypeSearch eq 'bizmember'}
{if $db_searchdata|@count gt 0}
<div class="recent_activities_title">{$db_searchdata|@count} Related Business </div>
{/if}
<div class="myphoto_album_img">
	<div class="QmeinContentPart PostInnerContentPart" >
		<div class="public_frnd_request"> 
{if  $db_searchdata|@count gt 0}
            {section name=i loop=$db_searchdata}
<div class="OppurtunitiesReaptBox">
<div class="GumbohleftImge">
		<a href="{$site_url}/{$db_searchdata[i].vMemberUrl}"><img src="{$db_searchdata[i].vProfileImage}" alt="" title="" width="70" height="70" /></a>
		</div>
		<div class="GumbohContentTxt">
			<h5><a href="{$site_url}/{$db_searchdata[i].vMemberUrl}" class="ret_tit">{$db_searchdata[i].vName}</a></h5>
			<div class="OppurtunitiesTxt">
                            <div class="postjob_reapt_text">
                                     From : {$db_searchdata[i].vCity}</br>
                                     Degree : {$db_searchdata[i].vDegree}</br>
                                     Occupation : {$db_searchdata[i].vOccupation}</br>
                            </div>
                        </div>
			
	</div>
</div>
{/section}	
            {else}
<div style="text-align:center;color:red;">No Business found</div>

{/if}
{/if}
</div>
</div>
<div class="cl"></div>
</div>
    
{if  $eTypeSearch eq 'campaign'}
{if $db_searchdata|@count gt 0}	
<div class="recent_activities_title">{$db_searchdata|@count} Related Campaign</div>
{/if}
<div id="fundcontent_wrap">
<div class="seachresultbox">
<div class="ProcessingIndication Navigation Myaccount" id="campagin_loading">Please Wait Campaign Loading...</div>

<div class="left_thre_sect" style="margin-top: -20px;">
			<div class="artist_search_box" >
				<input type="text" name="searchcampaign"  id="searchcampaign" class="input_search" placeholder="What are you looking for?" />
				<a href="#" onclick="searchcapaginlist(0);">
				<input type="image" src="{$tconfig["front_images"]}/src-btn.png"/>
				</a>
			</div>
			<div class="cl"></div>
			<div class="bro_cmp_box">
				<div class="SelectTextBox">
				<select name="searchcountry" id="searchcountry" onchange="displaysearchcamp(this.value);" style="width:156px;margin-bottom:5px;">
				<option value="">Select Country</option>
				<option value='223' >United States</option>						
				{section name=i loop=$db_country}
				{if $db_country[i].iCountryId neq 223}
				<option value='{$db_country[i].iCountryId}'>{$db_country[i].vCountry}</option>
				{/if}
				{/section}
				</select>
				</div>
			</div>
			
			<div class="bro_cmp_box1">
				<div class="SelectTextBox">
					 <div class="searchcampstate">
								<select name="searchstate" id="searchstate" style="width: 156px;margin-bottom:5px;">
									<option value="">Select State</option>
								</select>
								</div>
				</div>
			</div>
			<div class="cl"></div>
			<div class="bro_cmp_box2">
				<div class="SelectTextBox">
					 <select name="vIndustry" id="vIndustry" style="width:156px;margin-bottom:5px;">
						<option value="">Select Industry</option>
						{section name=i loop=$db_industry}
						<option value="{$db_industry[i].iIndustryId}">{$db_industry[i].iIndustry}</option>
						{/section}
					</select>
					
				</div>
				
			</div>
			<div class="artist_search_box">
				<input type="text" name="searchzip"  id="searchzip" class="input_search" Placeholder="Zip code" onkeypress="return checkmobile(event);" maxlength="10" style="width: 147px;margin-top: -20px;margin-right: -25px;"/>
			</div>
			
		</div>
		
<div class="cl"></div>
</div>	
	
{if  $db_searchdata|@count gt 0}
{section name=i loop=$db_searchdata}

<div class="campaignwrap" style="margin-left: 75px;">
    <div class="leftcontent">
	<div class="leftcontent" id="displayboxdiv{$db_searchdata[i].iCampaignId}">
	<img src="2_{$db_searchdata[i].vImage}"/>
    </div></div>

    <div class="rightcontent">
	<h3 class="campaign_title">{$db_searchdata[i].vCampaignName}</h3>
	{if $db_searchdata[i].tContent neq ''}
	<p>{$db_searchdata[i].tContent} <a href="#test{$db_searchdata[i].iCampaignId}" class="desc" > Read more..</a></p>
	{/if}
	<div style="display:none;">
		<div id="test{$db_searchdata[i].iCampaignId}" class="readpoppup">
		<div>
		    <div class="popupheadding">{$db_searchdata[i].vCampaignName}</div>
		<div class="popuptext">{$db_searchdata[i].tFullContent}</div>
		</div>
		</div>
	</div>
	<h3 class="stats">Stats</h3>
	<p> Ad view/click: <span>{$db_searchdata[i].iPointsViewingAd} points</span> <br>
		Video/ Commercial view: <span>{$db_searchdata[i].iPointsCommercialAd} points</span><br>
		Radio Ads: <span>{$db_searchdata[i].iPointsListenAd} points</span><br>
		Visit Website: <span>{$db_searchdata[i].iPointsWeblinkAd} points</span><br>
		Share Campaign: <span class="bluetext">{$db_searchdata[i].iPontsWhenBuy} points</span> <br>
		Discount: <span class="bluetext">{$db_searchdata[i].iItemDiscount}%</span> </p>
    </div>
			{if $iMemberId neq $db_searchdata[i].iMemberId}
	<div class="bottom_area">
	<ul class="navlinks">
		<li >{if $db_searchdata[i].vVideoFile neq ''}{if $db_searchdata[i].iViewCommerical eq 1}<a onclick="showdataonmaindiv1('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vVideoFile}','{$db_searchdata[i].iCampaignId}','video','{$db_searchdata[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{else}
		<a onclick="showdataonmaindiv('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vVideoFile}','{$db_searchdata[i].iCampaignId}','video','{$db_searchdata[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{/if}{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li >{if $db_searchdata[i].vMp3File neq ''}{if $db_searchdata[i].iRadioAdd eq 1}<a onclick="showdataonmaindiv1('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vMp3File}','{$db_searchdata[i].iCampaignId}','radio','{$db_searchdata[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{else}
		<a onclick="showdataonmaindiv('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vMp3File}','{$db_searchdata[i].iCampaignId}','radio','{$db_searchdata[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{/if}{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li >{if $db_searchdata[i].vURL neq ''}{if $db_searchdata[i].iViewWebsite neq 1}<a  onclick="getPoints('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vURL}','{$db_searchdata[i].iCampaignId}','Url','{$db_searchdata[i].iPointsWeblinkAd}');"  class="btnwebsite">Visit Website</a>{else}
		<a  onclick="getUrl('{$db_searchdata[i].vURL}');"  class="btnwebsite">Visit Website</a>{/if}{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		<li> {if $db_searchdata[i].vBuyLinkURL neq ''}<a style="cursor:pointer;" href="{$db_searchdata[i].vBuyLinkURL}" target="_blank" class="btnbuy">Buy this product</a>{/if}</li>
	</ul>
    </div>
			
	<div class="accept_area">
	<ul class="navaccept">
		{if $db_searchdata[i].iAccept eq 1}
		<li> <a href="javascript:void(0);"  class="linkaccept linkbtn">Accept</a></li>
		{else}
		<li> <a href="javascript:void(0);" onclick="getAccept('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].iCampaignId}','{$db_searchdata[i].iPointsViewingAd}');" class="linkaccept linkbtn">Accept</a></li>
		{/if}
		<!--<li> <a href="javascript:void(0);" onclick="getDecline('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].iCampaignId}');" class="linkdecline linkbtn">Decline</a></li>-->
		<li> <a style="margin-left: 25px;" href="#Share" id="share{$db_searchdata[i].iCampaignId}" class="linkshare linkbtn">Share</a></li>
		<li> <a style="margin-left: 31px;" href="javascript:void(0);" class="linkdonate linkbtn" id="comment{$db_searchdata[i].iCampaignId}" onclick="showcomment('{$db_searchdata[i].iCampaignId}','{$iMemberId}','Campaign','{$db_searchdata[i].iCampaignId}');">Comment</a></li>
		
	</ul>
    </div>
	 {else}
	<div class="bottom_area">
	
	<ul class="navlinks">
		<li > {if $db_searchdata[i].vVideoFile neq ''}<a   onclick="showdataonmaindiv1('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vVideoFile}','{$db_searchdata[i].iCampaignId}','video','{$db_searchdata[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li > {if $db_searchdata[i].vMp3File neq ''}<a  onclick="showdataonmaindiv1('{$db_searchdata[i].iAdminId}','{$db_searchdata[i].iMemberId}','{$db_searchdata[i].vMp3File}','{$db_searchdata[i].iCampaignId}','radio','{$db_searchdata[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li > {if $db_searchdata[i].vURL neq ''}<a href="#" onclick="getUrl('{$db_searchdata[i].vURL}');" class="btnwebsite">Visit Website</a>{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		<li> {if $db_searchdata[i].vBuyLinkURL neq ''}<a style="cursor:pointer;" href="{$db_searchdata[i].vBuyLinkURL}" target="_blank" class="btnbuy">Buy this product</a>{/if}</li>
		
	</ul>
    </div>
    <div class="accept_area">
						<!--area with four accept, decline links-->
	<ul class="navaccept">
		<li> <a href="javascript:void(0);"  class="linkaccept linkbtn">Accept</a></li>
		<!--<li> <a href="javascript:void(0);"  class="linkdecline linkbtn">Decline</a></li>-->
		<li> <a  style="margin-left: 33px;" href="#Share" id="share{$db_searchdata[i].iCampaignId}" class="linkshare linkbtn">Share</a></li>
		<li> <a style="margin-left: 31px;" href="javascript:void(0);" class="linkdonate linkbtn" id="comment{$db_searchdata[i].iCampaignId}" onclick="showcomment('{$db_searchdata[i].iCampaignId}','{$iMemberId}','Campaign','{$db_searchdata[i].iCampaignId}');">Comment</a></li>
	</ul>
    </div>
   {/if}
</div>

{literal}
<script>


function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
}




</script>

<script type="text/javascript">
//searchcapaginlist(0);
var id = '{/literal}{$db_searchdata[i].iCampaignId}{literal}';
//alert(id);
$(document).ready(function(){
	//alert(id);
	$('#share'+id).fancybox({		
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


showdataonmaindiv('{/literal}{$db_searchdata[i].iAdminId}{literal}','{/literal}{$db_searchdata[i].iMemberId}{literal}','{/literal}{$db_searchdata[i].vImage}{literal}','{/literal}{$db_searchdata[i].iCampaignId}{literal}','image');
function showdataonmaindiv(iAdmId, iMemId, file,iCampaignId,type,points){
    
    if(type =='image'){
	    var html = '';
	    if(iAdmId != 0)
		html = '<div class="imagevideo"><img src="'+file+'" width="470px" height="328px"></div>';
	    else
		html = '<div class="imagevideo"><img src="'+file+'"  width="470px" height="328px"></div>';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	    
	     if(iAdmId != 0) 
	    {
		var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		jwplayer('displayboxdiv'+iCampaignId).setup({
		  'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		  'id': 'playerID',
		  'autostart': 'true',
		  'width': '480',
		  'height': '360',
		  'allowscriptaccess':'always',
		  'file': url,
		  'events': {											
			      onComplete: function(event) {
			      getPoints(iAdmId, iMemId,file,iCampaignId,type,points);
			      }
			      },
		   
		});
	    }
            else{
		
		var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file;
		jwplayer('displayboxdiv'+iCampaignId).setup({
		  'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		  'id': 'playerID',
		  'autostart': 'true',
		  'width': '480',
		  'height': '360',
		  'allowscriptaccess':'always',
		  'file': url,
		  'events': {											
			      onComplete: function(event) {
			      getPoints(iAdmId, iMemId,file,iCampaignId,type,points);
			      }
			      },
		   
		});
	    }
	    
    }else if(type =='radio'){
	if(iAdmId != 0)
	{
	        var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		  jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'autoplay':'true',
		   'width': '300',
		   'height': '24',
		   'file': url,
        	   'controlbar': 'top',
		   'events': {											
				    onComplete: function(event) {
				    getPoints(iAdmId, iMemId,file,iCampaignId,type,points);
				    }
				    },
		 });
	}
	else
	{
	     var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file;
		  jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'autoplay':'true',
		   'width': '300',
		   'height': '24',
		   'file': url,
		   'controlbar': 'top',
		   'events': {											
				    onComplete: function(event) {
				    getPoints(iAdmId, iMemId,file,iCampaignId,type,points);
				    }
				    },
		 });
	}
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
<script>
function showcomment(IRecentId,IUserId,Type,Itemid)
	 {
		 
		 var extra ='';
		 extra+='&iRecentId='+IRecentId;
		 extra+='&iUserId='+IUserId;
		 extra+='&type='+Type;
		 extra+='&itemid='+Itemid;
	 //alert(extra);
		 var url = site_url+"/index.php?file=a-ajcommentlist";
		 var pars = extra;
		 //alert(url+pars);
		 $.post(url+pars,
		 function(data) {
				 $(document).ready(function () {			
		  $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		     
			 });
		 });
	 }
function savecomment(IRecentId,IUserId,Type,Itemid)
	 {
		 
	 var extra ='';
	 extra+='&iRecentId='+IRecentId;
	 extra+='&iUserId='+IUserId;
	 extra+='&type='+Type;
	 extra+='&itemid='+Itemid;
	 var comment = $('#usercomment').val();
	 extra+='&comment='+comment;
	 var url = site_url+"/index.php?file=a-ajcommentlist";
	 var pars = extra;
	 $.post(url+pars,
	 function(data) {
	 $(document).ready(function () {				
	     $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no','onComplete': function() { 
		     jQuery("#fancybox-wrap, #fancybox-overlay").delay(1000).fadeOut();
		     }});
	     
	 });
		 
		 });
	 }
</script>
<script>
function showdataonmaindiv1(iAdmId, iMemId, file,iCampaignId,type,points){
    
    if(type =='image'){
	    var html = '';
	    if(iAdmId != 0)
		html = '<img src="'+file+'" width="450px" height="300px">';
	    else
		html = '<img src="'+file+'"  width="450px" height="300px">';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	    
	     if(iAdmId != 0) 
	    {
		var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		jwplayer('displayboxdiv'+iCampaignId).setup({
		  'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		  'id': 'playerID',
		  'autostart': 'true',
		  'width': '480',
		  'height': '360',
		  'allowscriptaccess':'always',
		  'file': url
		   
		});
	    }
            else{
		
		var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file;
		jwplayer('displayboxdiv'+iCampaignId).setup({
		  'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		  'id': 'playerID',
		  'autostart': 'true',
		  'width': '480',
		  'height': '360',
		  'allowscriptaccess':'always',
		  'file': url
		   
		});
	    }
	    
    }else if(type =='radio'){
	if(iAdmId != 0)
	{
	        var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		  jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'autoplay':'true',
		   'width': '300',
		   'height': '24',
		   'controlbar': 'top',
		   'file': url
		 });
	}
	else
	{
	     var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}member/'+iMemId+'/'+file;
		  jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'autoplay':'true',
		   'width': '300',
		   'height': '24',
		   'file': url,
		   'controlbar': 'top'
		 });
	}
    }
    
}
</script>
<script>
function getDecline(adminid,memid,campid){
	 
	  var extra ='';
	  extra+='&adminid='+adminid;
	  extra+='&memid='+memid;
	  extra+='&campid='+campid;
	  var url = site_url+"/index.php?file=a-ajqmedecline";
	  var pars = extra;
	  //alert(url+pars);
	  $.post(url+pars,
          function(data) {
		//alert(data);
		  if(data != ''){
		    id = data.split('/');
		    var Id = id[1];
		    var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Campaign Decline Successfully.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
				    });
			setTimeout("parent.$.fancybox.close()", 3000);
			//displaypublicprofilecompaign(0,Id);
			var searchqme = $('#searchqme').val();
			//alert(searchqme);
			var extra = '';
			extra+='&eTypeSearch=campaign';
			extra+='&searchqme='+searchqme;
			refresh(extra);
			});
			
		  }});
}
function refresh(extra)
{
	var url = site_url+"/index.php?file=a-ajsearchdata";
	var pars = extra;
	$.post(url+pars,
        function(data) {
		
		$('#searchmsg').html("").addClass('errormsg').fadeTo(900,1);
		$('#displaysearchdata').html(data);
		$('#displayactivity').hide();
		$('#recentactivity').hide();
		$('#displaysearchdata').show();
		$('#searchdataqme').hide();
	
	});
}
function getAccept(adminid,memid,campid){
	  var extra ='';
	  extra+='&adminid='+adminid;
	  extra+='&memid='+memid;
	  extra+='&campid='+campid;
	  var url = site_url+"/index.php?file=a-ajqmeaccept";
	  var pars = extra;
	  $.post(url+pars,
          function(data) {
		  if(data != ''){
		        var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Campaign Accept Successfully.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
				
				    });
				setTimeout("parent.$.fancybox.close()", 3000);
				var searchqme = $('#searchqme').val();
				var extra = '';
				extra+='&eTypeSearch=campaign';
				extra+='&searchqme='+searchqme;
				refresh(extra);
				//window.location='{/literal}{$site_url}{literal}'+'/myaccount/';
			});
			
		  }});
}
function getUrl(file){
	 window.open(file);
}
function getPoints(adminid,memid,file,campid,type,points){
    
	  var extra ='';
	  extra+='&adminid='+adminid;
	  extra+='&memid='+memid;
	  extra+='&campid='+campid;
	  extra+='&points='+points;
	  extra+='&type='+type;
	  var url = site_url+"/index.php?file=a-ajqmecamppnts";
	  var pars = extra;
	  //alert(url+pars);
	  $.post(url+pars,
          function(data) {
	  id = data.split('/');
		var Idd = id[0];
		var Id = id[1];
	        if(Idd=='video'){
		        var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">One Member is going to view video gallary.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no',
						 'onComplete': function() { 
					       $("#fancybox-wrap, #fancybox-overlay").delay(3000).fadeOut();
					       var searchqme = $('#searchqme').val();
						var extra = '';
						extra+='&eTypeSearch=campaign';
						extra+='&searchqme='+searchqme;
						refresh(extra);
					         }
					       });
					
			});
		  
			 
		  }if(Idd=='radio'){
		        var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">One Member is going to listen radio gallary.</div>';
			html+='<div>';
			
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
						 });
					     setTimeout("parent.$.fancybox.close()", 3000);
					    var searchqme = $('#searchqme').val();
					var extra = '';
					extra+='&eTypeSearch=campaign';
					extra+='&searchqme='+searchqme;
					refresh(extra);
					     });
			    
		  }if(Idd=='Url'){
			
		        var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">One Member is going to visit member website.</div>';
			html+='<div>';
			
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
					     });
					});
			    setTimeout("parent.$.fancybox.close()", 3000);
			    window.location.href=file;
			    var searchqme = $('#searchqme').val();
				var extra = '';
				extra+='&eTypeSearch=campaign';
				extra+='&searchqme='+searchqme;
				refresh(extra);
			    
		  }
		  
		  });
	 
}


</script>
{/literal}
    
{/section}
{else}
<div class="slider_bot_box" style="margin-left: 103px;margin-right: 115px;">
<div style="text-align:center;color:#EEEDEB;">No Compaign Found</div>
</div>
{/if}
    

{/if}
{if  $eTypeSearch eq 'member'}
{if $db_searchdata|@count gt 0}	
<div class="recent_activities_title">{$db_searchdata|@count} Related Member</div>
{/if}
<div class="myphoto_album_img">
	<div class="QmeinContentPart PostInnerContentPart" >
		<div class="public_frnd_request">  
{if  $db_searchdata|@count gt 0}
    {section name=i loop=$db_searchdata}
 
<div class="OppurtunitiesReaptBox">
<div class="GumbohleftImge">
		<a href="{$site_url}/{$db_searchdata[i].vMemberUrl}"><img src="{$db_searchdata[i].vProfileImage}" alt="" title="" height="70" width="70" /></a>
		</div>
		<div class="GumbohContentTxt">
			<h5><a href="{$site_url}/{$db_searchdata[i].vMemberUrl}" class="ret_tit">{$db_searchdata[i].vName}</a></h5>
			<div class="OppurtunitiesTxt">
                            <div class="postjob_reapt_text">
                                     From : {$db_searchdata[i].vCity}</br>
                                     Degree : {$db_searchdata[i].vDegree}</br>
                                     Occupation : {$db_searchdata[i].vOccupation}</br>
                            </div>
                        </div>
			
	</div>
</div>
{/section}
    {else}
<div style="text-align:center;color:red;">No Member found</div>

	
{/if}

{/if}
</div>
</div>
<div class="cl"></div>
</div>

{literal}
<script>
$(document).ready(function() {
	
		$('#searchcountry').selectbox({debug: true});
		$('#searchstate').selectbox({debug: true});
		$('#vIndustry').selectbox({debug: true});
		
	});





</script>
{/literal}