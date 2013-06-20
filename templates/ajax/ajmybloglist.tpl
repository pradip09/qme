 {if  $BlogListArr|@count gt 0}
{section name=i loop=$BlogListArr}
<div class="blog_listing_centerpart">
	<div class="bloglisting_reapt_box">
		<div class="blog_list_img"><img src="{$BlogListArr[i].vImage}" alt="" title="" /></div>
		<div class="bloglisting_reapt_cont">
			<div class="bloglisting_reapt_conttext">
			<div class="BrowseJobLikeLink"><a href="{$site_url}/myblogadd/{$BlogListArr[i].iBlogId}" title="edit blog">Edit</a> | <a href="#" onclick="deleteitem({$BlogListArr[i].iBlogId},'blog');" title="delete blog"> Delete</a></div>
				<div class="blog_list_title" style="color:#999795;" >{$BlogListArr[i].vBlogTitle}
					<!--{$BlogListArr[i].vBlogCategory}-->
				</div>
				
				{$BlogListArr[i].vText}
				<div class="blog_reapt_date">{$BlogListArr[i].dCreateDate}</div>
				<div class="like_photo"><a href="javascript:void(0);" id="likepublic{$BlogListArr[i].iBlogId}" onclick="qmelikepublic('{$BlogListArr[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$BlogListArr[i].iBlogId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$BlogListArr[i].iBlogId}" onclick="showcomment('{$BlogListArr[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$BlogListArr[i].iBlogId}');">Comment</a><a href="javascript:void(0);" id="countcom{$BlogListArr[i].iBlogId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$BlogListArr[i].iBlogId}" class="share">Share</a></div>
				<!--<div class="blog_reapt_link"><a href="#">[1]Like</a> | <a href="#">Comment [1]</a> | <a href="#">Share</a></div></div>-->
			</div>
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
	numcom('{/literal}{$BlogListArr[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$BlogListArr[i].iBlogId}{literal}');
		qmelikepublic('{/literal}{$BlogListArr[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$BlogListArr[i].iBlogId}{literal}','0');
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
<div class="page_link"> <span style="padding-left:10px; float:left;">{$recmsg}</span> <span class="nav" style="float:right">
	<div align="right" id="paging">{$pages}</div>
	</span> </div>
<div class="cl"></div>
{else}
<div style="text-align:center;color:red;">No Blogs available</div>
{/if}