{if  $event_info|@count gt 0}
{section name=i loop=$event_info}
<div class="blog_listing_centerpart">
	<div class="bloglisting_reapt_box">
		<div class="blog_list_img"><img src="{$event_info[i].vEventImage}" alt="" title="" width="100" height="100" /></div>
		<div class="BrowseJobLikeLink">
			<a href="{$site_url}/myaddevent/{$event_info[i].iEventId}">Edit</a>&nbsp;|&nbsp;<a onclick="deleteitem({$event_info[i].iEventId},'myevent');" style="cursor:pointer;">Delete</a>
		</div>
		<div class="bloglisting_reapt_cont">
			<div class="blog_list_title">{$event_info[i].vTitle}</div>
			{$event_info[i].vDescription}<br />
			<span>Location:</span>&nbsp; {$event_info[i].vLocation}
			<div class="blog_reapt_date">{$event_info[i].dEventDate}</div>
			<div class="like_photo"><a href="javascript:void(0);" id="likepublic{$event_info[i].iEventId}" onclick="qmelikepublic('{$event_info[i].iEventId}','{$mem_info[0].iMemberId}','Event','{$event_info[i].iEventId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$event_info[i].iEventId}" onclick="showcomment('{$event_info[i].iEventId}','{$mem_info[0].iMemberId}','Event','{$event_info[i].iEventId}');">Comment</a><a href="javascript:void(0);" id="countcom{$event_info[i].iEventId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$event_info[i].iEventId}" class="share">Share</a></div>
		</div>
	</div>	
</div>

{literal}
<script type="text/javascript">
$(document).ready(function(){
	$('.share').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	});
	});
	numcom('{/literal}{$event_info[i].iEventId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Event','{/literal}{$event_info[i].iEventId}{literal}');
		qmelikepublic('{/literal}{$event_info[i].iEventId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Event','{/literal}{$event_info[i].iEventId}{literal}','0');
		function numcom(iRecentId,iUserId,type,itemid)
		{
		
		var extra ='';
		extra+='&iRecentId='+iRecentId;
		extra+='&iUserId='+iUserId;
		extra+='&type='+type;
		extra+='&itemid='+itemid;
		var url = site_url+"/index.php?file=a-ajcountcomment";
		var pars = extra;
		//alert(url+pars);
		$.post(url+pars,
		function(data) {
		
			id = data.split('&');
			var Data = id[0];
			var Id = id[1];
			$('#countcom'+Id+'').html(Data);
		});
		}
		
		function qmelikepublic(iRecentId,iUserId,type,itemid,start)
		{
		
		var extra ='';
		extra+='&start='+start;
		extra+='&iRecentId='+iRecentId;
		extra+='&iUserId='+iUserId;
		extra+='&type='+type;
		extra+='&itemid='+itemid;
		var url = site_url+"/index.php?file=a-ajlikeitem";
		var pars = extra;
		
		$.post(url+pars,
		function(data) {
		
			id = data.split('&');
			var Data = id[0];
			var Id = id[1];
		
			$('#likepublic'+Id+'').html(Data);
		});
		}
		function showcomment(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
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
{/literal}
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>
{else}
<div style="text-align:center;color:red;">No Events available</div>
{/if}