<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}jwplayer.js"></script>
{if  $CampaginArr|@count gt 0}
{section name=i loop=$CampaginArr}
<div class="campaignwrap" style="margin-left: 75px;">
    
<div class="leftcontent"><div class="leftcontent" id="displayboxdiv1{$CampaginArr[i].iCampaignId}"><div class="imagevideo"><img src="{$CampaginArr[i].vImage}" height="328px;" width="470px;"/></div></div></div>
<div class="rightcontent">
	<h3 class="campaign_title">{$CampaginArr[i].vCampaignName}</h3>
	{if $CampaginArr[i].tContent neq ''}
	<p>{$CampaginArr[i].tContent} <a href="#test{$CampaginArr[i].iCampaignId}" class="desc" > Read more..</a></p>
	{/if}
	<div style="display:none;">
		<div id="test{$CampaginArr[i].iCampaignId}" class="readpoppup">
		<div><div class="popupheadding">{$CampaginArr[i].vCampaignName}</div>
		<div class="popuptext">{$CampaginArr[i].tFullContent}</div></div>
		</div>
	</div>
	<h3 class="stats">Stats</h3>
	<p> Add Accept: <span>{$CampaginArr[i].iPointsViewingAd} points</span> <br>
		Video/ Commercial view: <span>{$CampaginArr[i].iPointsCommercialAd} points</span><br>
		Radio Ads: <span>{$CampaginArr[i].iPointsListenAd} points</span><br>
		Visit Website: <span>{$CampaginArr[i].iPointsWeblinkAd} points</span><br>
		Share Campaign: <span class="bluetext">{$CampaginArr[i].iPointsWhenShare} points</span> <br>
		Discount: <span class="bluetext">{$CampaginArr[i].iItemDiscount}%</span> </p>
    </div>
 {if $memid neq $CampaginArr[i].iMemberId}
 
    <div class="bottom_area">
	<!--area with four buy, commercial radio play links-->
	<ul class="navlinks">
		<li >{if $CampaginArr[i].vVideoFile neq ''}{if $CampaginArr[i].iViewCommerical eq 1}<a onclick="showdataonmaindiv2('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video','{$CampaginArr[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{else}
		<a onclick="showdataonmaindiv1('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video','{$CampaginArr[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{/if}{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li >{if $CampaginArr[i].vMp3File neq ''}{if $CampaginArr[i].iRadioAdd eq 1}<a onclick="showdataonmaindiv2('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','radio','{$CampaginArr[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{else}
		<a onclick="showdataonmaindiv1('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','radio','{$CampaginArr[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{/if}{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li >{if $CampaginArr[i].vURL neq ''}{if $CampaginArr[i].iViewWebsite neq 1}<a  onclick="getPoints('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vURL}','{$CampaginArr[i].iCampaignId}','Url','{$CampaginArr[i].iPointsWeblinkAd}');"  class="btnwebsite">Visit Website</a>{else}
		<a  onclick="getUrl('{$CampaginArr[i].vURL}');"  class="btnwebsite">Visit Website</a>{/if}{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		
		<li> <a style="width: 187px;margin-left: 12px;" onclick="sendId('{$CampaginArr[i].iMemberId}','{$CampaginArr[i].iCampaignId}');" id="campianitem{$CampaginArr[i].iCampaignId}" class="btnbuy" >View Campaign Items</a> </li>
		
	</ul>
    </div>
    <div class="accept_area">
						<!--area with four accept, decline links-->
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
		<li > {if $CampaginArr[i].vVideoFile neq ''}<a   onclick="showdataonmaindiv2('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vVideoFile}','{$CampaginArr[i].iCampaignId}','video','{$CampaginArr[i].iPointsCommercialAd}');" class="btncommercial">View Commercial</a>{else}<a  class="btncommercial_blank"></a>{/if}</li>
		<li > {if $CampaginArr[i].vMp3File neq ''}<a  onclick="showdataonmaindiv2('{$CampaginArr[i].iAdminId}','{$CampaginArr[i].iMemberId}','{$CampaginArr[i].vMp3File}','{$CampaginArr[i].iCampaignId}','radio','{$CampaginArr[i].iPointsListenAd}');" class="btnradio">Play Radio Ad</a>{else}<a  class="btnradio_blank"></a>{/if}</li>
		<li > {if $CampaginArr[i].vURL neq ''}<a href="#" onclick="getUrl('{$CampaginArr[i].vURL}');" class="btnwebsite">Visit Website</a>{else}<a  class="btnwebsite_blank"></a>{/if}</li>
		<li> <a style="width: 187px;margin-left: 12px;" onclick="sendId('{$CampaginArr[i].iMemberId}','{$CampaginArr[i].iCampaignId}');" id="campianitem{$CampaginArr[i].iCampaignId}" class="btnbuy" >View Campaign Items</a> </li>
	</ul>
    </div>
    <div class="accept_area">
						<!--area with four accept, decline links-->
	<ul class="navaccept">
		<li> <a href="javascript:void(0);"  class="linkaccept linkbtn">Accept</a></li>
		<li> <a href="javascript:void(0);"  class="linkdecline linkbtn">Decline</a></li>
		<li> <a href="#Share" id="share{$CampaginArr[i].iCampaignId}" class="linkshare linkbtn">Share</a></li>
		<li> <a href="javascript:void(0);" class="linkdonate linkbtn" id="comment{$CampaginArr[i].iCampaignId}" onclick="showcomment('{$CampaginArr[i].iCampaignId}','{$memid}','Campaign','{$CampaginArr[i].iCampaignId}');">Comment</a></li>
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
	});
</script>
<script type="text/javascript">
showdataonmaindiv1('{/literal}{$CampaginArr[i].iAdminId}{literal}','{/literal}{$CampaginArr[i].iMemberId}{literal}','{/literal}{$CampaginArr[i].vImage}{literal}','{/literal}{$CampaginArr[i].iCampaignId}{literal}','image');
function showdataonmaindiv1(iAdmId, iMemId, file,iCampaignId,type,points){
    
    if(type =='image'){
	    var html = '';

	    if(iAdmId != 0)
		html = '<div class="imagevideo"><img src="'+file+'" height="328px;" width="470px;"></div>';
	    else
		html = '<div class="imagevideo"><img src="'+file+'" height="328px;" width="470px;"></div>';
           
	    $('#displayboxdiv1'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	//alert(type);
	    var html = '';
	    if(iAdmId != 0) 
	    {
		var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		jwplayer('displayboxdiv1'+iCampaignId).setup({
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
	      
		//html = '<div class="imagevideo"><embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="328" width="478" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_campaign"]}{literal}admin/'+iAdmId+'/'+file+'&plugins=sharing-2"/></div>';
	    }
            else{
		var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}member/'+iMemId+'/'+file;
		jwplayer('displayboxdiv1'+iCampaignId).setup({
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
	        var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		  jwplayer('displayboxdiv1'+iCampaignId).setup({
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
	     var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}member/'+iMemId+'/'+file;
		  jwplayer('displayboxdiv1'+iCampaignId).setup({
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
		// alert(url+pars);
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
function showdataonmaindiv2(iAdmId, iMemId, file,iCampaignId,type,points){
    
    if(type =='image'){
	    var html = '';

	    if(iAdmId != 0)
		html = '<div class="imagevideo"><img src="'+file+'" height="328" width="470"></div>';
	    else
		html = '<div class="imagevideo"><img src="'+file+'" height="328" width="470"></div>';
            $('#displayboxdiv'+iCampaignId).html(html);
	    
    }else if(type =='video'){
	   
	    if(iAdmId != 0) 
	    {
		var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		jwplayer('displayboxdiv1'+iCampaignId).setup({
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
		
		var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}member/'+iMemId+'/'+file;
		jwplayer('displayboxdiv1'+iCampaignId).setup({
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
	        var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}admin/'+iAdmId+'/'+file;
		   jwplayer('displayboxdiv1'+iCampaignId).setup({
		   'flashplayer': '{/literal}{$tconfig["tsite_music"]}/player.swf{literal}',
		   'id': 'playerID',
		   'autoplay':'true',
		   'width': '300',
		   'height': '24',
		   'file': url,
        	   'controlbar': 'top'
		 });
	}
	else
	{
		
	     var url = '{/literal}{$tconfig["tsite_upload_images_fundraiser_campaign"]}{literal}member/'+iMemId+'/'+file;
	     	   jwplayer('displayboxdiv1'+iCampaignId).setup({
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
			displayfundraisercompaign(0,Id); 
			});
			
		  }});
}

function getAccept(adminid,memid,campid){
	  var extra ='';
	  extra+='&adminid='+adminid;
	  extra+='&memid='+memid;
	  extra+='&campid='+campid;
	  var url = site_url+"/index.php?file=a-ajqmeaccept";
	  var pars = extra;
	  //alert(url+pars);
	  $.post(url+pars,
          function(data) {
		   if(data != ''){
		    id = data.split('/');
		    var Id = id[1];
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
			        displayfundraisercompaign(0,Id); 
			});
			// window.location= site_url+'/qmeoops';
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
					       displayfundraisercompaign(0,Id); }
					       });
					
			});
		      
			 
		  }else if(Idd=='radio'){
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
					     displayfundraisercompaign(0,Id);
			});
			
		  }else if(Idd=='Url'){
			
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
				          displayfundraisercompaign(0,Id);
					}
				});	 
			}

</script>
{/literal}	
{/section}
<!--<div class="paginationarea">
	<ul class="pagination paginationI paginationI05">
        {$pages}
        </ul>
</div>-->

<div class="cl"></div>
{else}
<div class="slider_bot_box" style="margin-left: 103px;margin-right: 115px;">
<div style="text-align:center;color:#EEEDEB;">No Fundraiser Campaign found</div>
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



function sendId(iMemberId,iCampaignId)
                {
                   //alert(iMemberId); 
                    var extra = '';	
                    if(iCampaignId !=''){
                        extra+='&iCampaignId='+iCampaignId;
                    }
		    if(iMemberId !=''){
                        extra+='&iMemberId='+iMemberId;
                    }
                    //alert(site_url);
                    var url = site_url+"/index.php?file=a-ajfundpopup";
                    var pars = extra;
		    
		    //alert(url+pars);
                    $.post(url+pars,
                    function(data) {
			//alert(data);
                     //$('#popupgallerydiv').html(data);
                        $("#flash").hide();
                        $(document).ready(function () {				
                            $.fancybox(data,{
				'overlayShow':true,
				'transitionIn':'elastic',
	                        'transitionOut':'elastic',
				'modal':false,
				'margin' : '0',
				'padding' : '0',
				'scrolling' : 'no'
				});
			    });
            });   
}


</script>


{/literal}