
{if  $relevent_news|@count gt 0}
{section name=i loop=$relevent_news}

<div class="timeline-view clearfix first">
                <div class="media">
			   <a href="{$site_url}/detail_news/{$relevent_news[i].iNewsId}">    <img src="{$relevent_news[i].vImage}"/></a>
		</div>
                <div class="content">
                    <div class="info">
                      <h1><a href="{$site_url}/detail_news/{$relevent_news[i].iNewsId}">{$relevent_news[i].vTitle}</a> - <span class="date">{$relevent_news[i].dAddedDate}</span></h1>
                      <span class="comment"><a href="javascript:void(0);" id="news{$relevent_news[i].iNewsId}" onclick="showcomment2('{$relevent_news[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$relevent_news[i].iNewsId}');">Comments</a>&nbsp;<a href="javascript:void(0);" id="countcomnews{$relevent_news[i].iNewsId}"></a></span><div class="cl"></div></div>
                    <div class="description">
                      <p>{$relevent_news[i].vDescription}</p>
                    </div>
                    <div class="action">
                      <ul class="clearfix">
                        <li class="a1"><a href="javascript:void(0);" id="likenews{$relevent_news[i].iNewsId}" onclick="qmelikenews('{$relevent_news[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$relevent_news[i].iNewsId}','1');">Q Like</a></li>
                        <li class="a2"><a href="#Share" id="share{$relevent_news[i].iNewsId}" class="share">Share</a></li>
                        <li class="a3"><a href="#">Tags</a></li>
				    <div class="cl"></div>
                      </ul>
                </div>	
                </div>
		   <div class="cl"></div>
                </div>

 
		{literal}
		<script type="text/javascript">
		numcom1('{/literal}{$relevent_news[i].iNewsId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','news','{/literal}{$relevent_news[i].iNewsId}{literal}');
		qmelikenews('{/literal}{$relevent_news[i].iNewsId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','news','{/literal}{$relevent_news[i].iNewsId}{literal}','0');
		function numcom1(iRecentId,iUserId,type,itemid)
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
				$('#countcomnews'+Id+'').html(Data);
			});
		}
		
		function qmelikenews(iRecentId,iUserId,type,itemid,start)
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
		
			$('#likenews'+Id+'').html(Data);
		});
		}
		function showcomment2(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
			var url = site_url+"/index.php?file=a-ajcommentlist_news";
			var pars = extra;
			
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
			function savecomment2(IRecentId,IUserId,Type,Itemid)
			{
				
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
			var comment = $('#usercomment').val();
			extra+='&comment='+comment;
			var url = site_url+"/index.php?file=a-ajcommentlist_news";
			var pars = extra;
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no','onComplete': function() { 
				jQuery("#fancybox-wrap, #fancybox-overlay").delay(1000).fadeOut();
				} });
                            
                        });
				
				});
			}
		</script>
		{/literal}
	 </div> 
	
{/section}
{/if}


{if  $db_bloglistmatch|@count gt 0}
{section name=i loop=$db_bloglistmatch}

	<div class="timeline-view clearfix first">
		<div class="media">                 
                    <a href="{$site_url}/blog_detail/{$code}/{$db_bloglistmatch[i].iBlogId}" ><img src="{$db_bloglistmatch[i].vImage}"/></a>
                </div>
		
		<div class="content">
                    <div class="info"><h1><a href="{$site_url}/blog_detail/{$code}/{$db_bloglistmatch[i].iBlogId}">{$db_bloglistmatch[i].vBlogTitle}</a> - <span class="date">{$db_bloglistmatch[i].dAddedDate}</span></h1>
		 <span class="comment"><a href="javascript:void(0);" id="blogcom{$db_bloglistmatch[i].iBlogId}" onclick="showcomment3('{$db_bloglistmatch[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$db_bloglistmatch[i].iBlogId}');">Comments</a><a href="javascript:void(0);" id="countcom{$db_bloglistmatch[i].iBlogId}" ></a></span></div>
		    <div class="description">
                      <p>{$db_bloglistmatch[i].vText}</p>
                    </div> 
		<div class="action">
                      <ul class="clearfix">
				<li class="a1"><a href="javascript:void(0);" id="likeblogs{$db_bloglistmatch[i].iBlogId}" onclick="qmelike('{$db_bloglistmatch[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$db_bloglistmatch[i].iBlogId}','1');">Qlike</a></li>
				 <li class="a2"><a href="#Share" id="share{$db_bloglistmatch[i].iBlogId}" class="share">Share</a></li>
				<li class="a3"><a href="#">Tags</a></li>
				    <div class="cl"></div>
                      </ul>
                </div>
				
                </div>
			   <div class="cl"></div>
                </div>
				
		
                {literal}
		<script type="text/javascript">
		numcom('{/literal}{$db_bloglistmatch[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$db_bloglistmatch[i].iBlogId}{literal}');
		qmelike('{/literal}{$db_bloglistmatch[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$db_bloglistmatch[i].iBlogId}{literal}','0');
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
		
		function qmelike(iRecentId,iUserId,type,itemid,start)
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
			
				$('#likeblogs'+Id+'').html(Data);
			});
		}
		function showcomment3(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
			var url = site_url+"/index.php?file=a-ajcommentlist_blog";
			var pars = extra;
			
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
			function savecomment3(IRecentId,IUserId,Type,Itemid)
			{
				
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
			var comment = $('#usercomment').val();
			extra+='&comment='+comment;
			var url = site_url+"/index.php?file=a-ajcommentlist_blog";
			var pars = extra;
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no','onComplete': function() { 
				jQuery("#fancybox-wrap, #fancybox-overlay").delay(1000).fadeOut();
				} });
                            
                        });
				
				});
			}
		</script>
		{/literal}
	
{/section}


<div class="more_recent_activity">
    {if $totRec gt $rec_limit}
        <a onclick="displayreleventnews({$start},{$iMemberId})" style="cursor:pointer;">More Relevent News <img src="{$tconfig["front_images"]}bot-arrow.png" alt="" title="" /><div class="ProcessingIndicationPublic Navigation Publicnews" id="releventnews_loading"></div></a>
	
    {else}
        <div class="no_more_word">No More Relevent News</div>
    {/if}    
</div>

{/if}

	<!--</div>
	<div class="activity_reapt_box">
		<div class="activity_img"> <img src="{$tconfig["front_images"]}activity-img-2.png" alt="" title="" /> </div>
		<div class="activity_text"> Mamta liked <span>Fiama di Wills.</span> </div>
	</div>
	<div class="activity_reapt_box">
		<div class="activity_img"> <img src="{$tconfig["front_images"]}activity-img-3.png" alt="" title="" /> </div>
		<div class="activity_text"> Mamta became friends with <span>Neha Patel.</span> </div>
	</div> -->


<!--
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>
-->

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
$('#releventnews_loading').show();
</script>
{/literal}