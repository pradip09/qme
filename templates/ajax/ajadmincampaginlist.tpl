<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jlogin.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>
{if  $CampaginArr|@count gt 0}
{section name=i loop=$CampaginArr}
<div class="campaignwrap">
<div class="leftcontent"><div class="leftcontent" id="displayboxdiv{$CampaginArr[i].iCampaignId}">
	 <img  src="{$tconfig["tsite_upload_images_campaign"]}admin/{$CampaginArr[i].iAdminId}/2_{$CampaginArr[i].vImage}"/>
</div></div>

<div class="rightcontent">
	<h3 class="campaign_title">{$CampaginArr[i].vCampaignName}</h3>
	<p>{$CampaginArr[i].tContent} <a href="#test{$CampaginArr[i].iCampaignId}" class="desc" > Read more..</a></p>
	<div style="display:none;">
		<div id="test{$CampaginArr[i].iCampaignId}" class="readpoppup">
		<div><div class="popupheadding">{$CampaginArr[i].vCampaignName}</div>
		<div class="popuptext">{$CampaginArr[i].tFullContent}</div></div>
		</div>
	</div>
	<h3 class="stats">Stats</h3>
	<p>Add Accept: <span>{$CampaginArr[i].iPointsViewingAd} points</span> <br>
		Video/ Commercial view: <span>{$CampaginArr[i].iPointsCommercialAd} points</span><br>
		Radio Ads: <span>{$CampaginArr[i].iPointsListenAd} points</span><br>
		Visit Website: <span>{$CampaginArr[i].iPointsWeblinkAd} points</span><br>
		Share Campaign: <span class="bluetext">{$CampaginArr[i].iPontsWhenBuy} points</span> <br>
		Discount: <span class="bluetext">{$CampaginArr[i].iItemDiscount}%</span> </p>
</div>
<!-- rightcontent div ends here-->
{if $iUserId != 0}
<div class="bottom_area">

	<ul class="navlinks">
	 
		<li >{if $CampaginArr[i].vVideoFile neq ''}{if $CampaginArr[i].iViewCommerical eq 1}<a onclick="showdataonmaindiv1('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video','{$CampaginArr[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{else}
		<a onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video','{$CampaginArr[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{/if}{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li >{if $CampaginArr[i].vMp3File neq ''}{if $CampaginArr[i].iRadioAdd eq 1}<a onclick="showdataonmaindiv1('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','radio','{$CampaginArr[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{else}
		<a onclick="showdataonmaindiv('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','radio','{$CampaginArr[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{/if}{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li >{if $CampaginArr[i].vURL neq ''}{if $CampaginArr[i].iViewWebsite neq 1}<a  onclick="getPoints('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vURL}','{$CampaginArr[i].iCampaignId}','Url','{$CampaginArr[i].iPointsWeblinkAd}');"  class="btnwebsite">Visit Website</a>{else}
		<a  onclick="getUrl('{$CampaginArr[i].vURL}');"  class="btnwebsite">Visit Website</a>{/if}{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		<li> {if $CampaginArr[i].vBuyLinkURL neq ''}<a style="cursor:pointer;" href="{$CampaginArr[i].vBuyLinkURL}" target="_blank" class="btnbuy">Buy this product</a>{/if}</li>
	</ul>
</div>

<!--bottom area ends here-->
<div class="accept_area">

	<ul class="navaccept">
	        {if $CampaginArr[i].iAccept eq 1}
		<li> <a href="javascript:void(0);"  class="linkaccept linkbtn">Accept</a></li>
		{else}
		<li> <a href="javascript:void(0);" onclick="getAccept('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].iCampaignId}','{$CampaginArr[i].iPointsViewingAd}');" class="linkaccept linkbtn">Accept</a></li>
		{/if}
		<li> <a href="javascript:void(0);" onclick="getDecline('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].iCampaignId}');" class="linkdecline linkbtn">Decline</a></li>
		<li> <a href="#Share" id="share{$CampaginArr[i].iCampaignId}" class="linkshare linkbtn">Share</a></li>
		<li> <a href="javascript:void(0);" class="linkdonate linkbtn" id="comment{$CampaginArr[i].iCampaignId}" onclick="showcomment('{$CampaginArr[i].iCampaignId}','{$memid}','Campaign','{$CampaginArr[i].iCampaignId}');">Comment</a></li>
		
	</ul>
</div>


{else}
<div class="bottom_area">

	<ul class="navlinks">
		<li>{if $CampaginArr[i].vVideoFile neq ''} <a href="#LoginId" id="btncomlog{$CampaginArr[i].iCampaignId}"  class="btncommercial">View Commercial</a>{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li >{if $CampaginArr[i].vMp3File neq ''} <a href="#LoginId" id="btnradiolog{$CampaginArr[i].iCampaignId}"  class="btnradio">Play Radio Ad</a>{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li > {if $CampaginArr[i].vURL neq ''} <a href="#LoginId" id="btnweblog{$CampaginArr[i].iCampaignId}"   class="btnwebsite">Visit Website</a>{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		<li> {if $CampaginArr[i].vBuyLinkURL neq ''}<a href="#LoginId" id="btnbuylog{$CampaginArr[i].iCampaignId}"  class="btnbuy">Buy this product</a>{/if}</li>
	</ul>
</div>
<div class="accept_area">
	<ul class="navaccept">
		<li> <a href="#LoginId"  id="acceptlink{$CampaginArr[i].iCampaignId}" class="linkaccept linkbtn">Accept</a></li>
		<li> <a href="#LoginId"  id="declinelink{$CampaginArr[i].iCampaignId}" class="linkdecline linkbtn">Decline</a></li>
		<li> <a href="#LoginId"  id="sharelink{$CampaginArr[i].iCampaignId}" class="linkshare linkbtn">Share</a></li>
		<li> <a href="#LoginId"  id="commentlink{$CampaginArr[i].iCampaignId}" class="linkdonate linkbtn">Comment</a></li>
	</ul>
</div>
{/if}

</div>

{literal}
<script type="text/javascript">

var id = '{/literal}{$CampaginArr[i].iCampaignId}{literal}';
$(document).ready(function(){
	$('#share'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	});
	$('#acceptlink'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
	$('#declinelink'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
	$('#sharelink'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
	$('#commentlink'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
	
	$('#btncomlog'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
});
	
	$('#btnradiolog'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	});
	
	$('#btnweblog'+id).fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	});
	
	$('#btnbuylog'+id).fancybox({
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
showdataonmaindiv('{/literal}{$CampaginArr[i].iAdminId}{literal}','{/literal}{$CampaginArr[i].iMemberId}{literal}','{/literal}{$CampaginArr[i].vImage}{literal}','{/literal}{$CampaginArr[i].iCampaignId}{literal}','image');
function showdataonmaindiv(iAdmId, iMemId, file,iCampaignId,type,points){
    
    if(type =='image'){
            var html = '<div class="imagevideo"><img src="{/literal}{$tconfig["tsite_upload_images_campaign"]}admin/{$CampaginArr[i].iAdminId}{literal}/2_'+file+'" height="328px;" width="470px;"></div>';
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
    }else if(type =='radio'){
	 
		  var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		  jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'width': '300',
		   'height': '24',
		   'autostart': 'true',
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
            var html = '<div class="imagevideo"><img src="{/literal}{$tconfig["tsite_upload_images_campaign"]}admin/{$CampaginArr[i].iAdminId}{literal}/2_'+file+'" height="328px;" width="470px;"></div>';
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
    }else if(type =='radio'){
	           
		  var url = '{/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		   jwplayer('displayboxdiv'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'width': '300',
		   'autostart': 'true',
		   'height': '240',
		   'file': url,		   
		   'controlbar': 'bottom',
		   'wmode':'transparent',
		   'icons': 'false',
		   'float':'left',
		   'style': 'padding-left:30'
		 });
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
	  $.post(url+pars,
          function(data) {
		  if(data != 0){
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
			 displayadmincapagin(0); 
			});
			
		  }});
}

function getAccept(adminid,memid,campid,points){
	
	  var extra ='';
	  extra+='&adminid='+adminid;
	  extra+='&memid='+memid;
	  extra+='&campid='+campid;
	  extra+='&points='+points;
	  var url = site_url+"/index.php?file=a-ajqmeaccept";
	  var pars = extra;
	  $.post(url+pars,
          function(data) {
		  if(data != 0){
		
		        var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Campaign Accept Successfully.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
//'onComplete': function() { // $("#fancybox-wrap, #fancybox-overlay").delay(3000).fadeOut();//displayadmincapagin(0);//}
				    });
				setTimeout("parent.$.fancybox.close()", 3000);
			        displayadmincapagin(0); 
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
	  //alert(url+extra);
	  var pars = extra;
	  $.post(url+pars,
          function(data) {
	  id = data.split('/');
	       var Idd = id[0];
	       var Id = id[1];
	       if(Idd=='video'){
		  
	           var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Member viewed video gallary.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no',
						 'onComplete': function() { 
					       $("#fancybox-wrap, #fancybox-overlay").delay(3000).fadeOut();
					        displayadmincapagin(0); }
					       
					       });
					
			});
		       //$('#viewCommercialhide'+campid).html('<a  class="btncommercial_blank"></a>');			 
		  }if(Idd=='radio'){
		
		    var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Member listened radio gallary.</div>';
			html+='<div>';
			
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
						 });
					      setTimeout("parent.$.fancybox.close()", 3000);
					      displayadmincapagin(0);
			});
			    //$('#viewradiohide'+campid).html('<a  class="btnradio_blank"></a>');
		  }if(Idd=='Url'){
		  
		    var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Member visited this website.</div>';
			html+='<div>';
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,
					         'margin' : '0',
						 'padding' : '0',
						 'scrolling' : 'no'
					       });
					     });
			     setTimeout("parent.$.fancybox.close()", 3000);
			     window.open(file);
			     displayadmincapagin(0); 
			     //window.open(file,'_blank');
			     //$('#viewurlhide'+campid).html('<a class="btnwebsite_blank"></a>');
		  }
		  
	 });
}

</script>
{/literal}
{/section}
<div class="paginationarea">
	<ul class="pagination paginationI paginationI05">
        {$pages}
        </ul>
</div>
{else}
<div class="slider_bot_box" style="margin-left: 103px;margin-right: 115px;">
<div style="text-align:center;color:#EEEDEB;">No Compaign Found</div>
</div>
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
{/literal}