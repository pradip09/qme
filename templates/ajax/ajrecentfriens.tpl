{if  $FriendArr|@count gt 0}
{section name=i loop=$FriendArr}
<div class="commentwrap_small">
      		<a href="{$site_url}/{$FriendArr[i].vMemberUrl}"><img src="{$FriendArr[i].vProfileImage}"></a>
     		<div class="commentbox_small">
		<p>
		<span class="comment_title">{$FriendArr[i].vName}  - <span class="date">{$FriendArr[i].ApproveDate}</span></span><br> 
			       <span class="livesin">Lives in: </span> {$FriendArr[i].vCity} <br>
			       <span class="relatedto">Related Skills: </span>{$FriendArr[i].vOccupation}
		</p>
      <div class="likebox_activity_small">						 
	 <ul class="navact_small"> 
	         <li ><a href="javascript:void(0);" id="likepublic{$FriendArr[i].iMemberId}" style="color: #999;" onclick="qmelikepublic('{$FriendArr[i].iMemberId}','{$mem_info[0].iMemberId}','approve_friend_request','{$FriendArr[i].iMemberId}','1');">Q Like</a> </li>
                 <li ><a href="#Share" id="share{$FriendArr[i].iMemberId}" style="color: #999;" class="share">Share</a></li>
                 <li ><a href="javascript:void(0);" style="color: #999;">Tags</a></li>
		 <li><a href="{$site_url}/{$FriendArr[i].vMemberUrl}" style="color: #999;">View Profile</a></li>
	</ul>
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
		numcom('{/literal}{$FriendArr[i].iMemberId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','approve_friend_request','{/literal}{$FriendArr[i].iMemberId}{literal}');
		qmelikepublic('{/literal}{$FriendArr[i].iMemberId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','approve_friend_request','{/literal}{$FriendArr[i].iMemberId}{literal}','0');
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
		function showcomment4(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
			var url = site_url+"/index.php?file=a-ajcommentlist_frd";
			var pars = extra;
			
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
			function savecomment4(IRecentId,IUserId,Type,Itemid)
			{
				
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
			var comment = $('#usercomment').val();
			extra+='&comment='+comment;
			var url = site_url+"/index.php?file=a-ajcommentlist_frd";
			var pars = extra;
			//alert(url+pars);
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
<div class="more_recent_activity" style="color: #FAFAFA !important">
    {if $totRec gt $rec_limit}
        <a onclick="displayrecentFriend({$start},{$iMemberId})"  class="btn_more_activity white">More Activity <img src="{$tconfig["front_images"]}bot-arrow.png" alt="" title="" /><div class="ProcessingIndicationPublic Navigation Publicnews"  style="margin-bottom:-8px;margin-top:-20px;" id="recentfrnd_loading"></div></a>
	
    {else}
        <div class="no_more_word">No More Recent Activity..</div>
    {/if}    
</div>
{else}
<div style="text-align:center;color:red;">No Friend available</div>
{/if}

{literal}
<script type="text/javascript">
$('#recentfrnd_loading').show();
</script>
{/literal}
