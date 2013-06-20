{if  $recent_activities|@count gt 0}
{section name=i loop=$recent_activities}

<div class="timeline-view clearfix">
                  <div class="media"><a href="{$recent_activities[i].memurl}"><img src="{$recent_activities[i].vProfileImage}" alt="" /></a></div>
                  <div class="content">
                    <div class="info">
                      <h1><a href="#">{$recent_activities[i].vName}</a> - <span class="date">{$recent_activities[i].dAddedDate}</span></h1>
                      <span class="comment"> <a href="javascript:void(0);" id="comment{$recent_activities[i].iRecentActivityId}" onclick="showcomment1('{$recent_activities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$recent_activities[i].iRecentActivityId}');">Comments</a><a href="javascript:void(0);" id="countcom{$recent_activities[i].iRecentActivityId}" ></a> </span><div class="cl"></div></div>
                    <div class="description">
                      <p>{$recent_activities[i].vDescription}
		      
		      </p>
		      <div class="activity_text_gray"><a href="{$recent_activities[i].link}">{$recent_activities[i].eNameActivity}</a>
			
		      </div>
                    </div>
		    <div>
		  <ul class="clearfix" style="list-style:none;">
		        {if $recent_activities[i].vImage neq ''}
			{if $recent_activities[i]['eType'] == 'approve_friend_request' || $recent_activities[i]['eType'] == 'status_update'}
		        <li><img src="{$recent_activities[i].vImage}" alt="" width="71" height="71"/></li>			
			{else}
			<li><img src="{$recent_activities[i].vImage}" alt="" width="252" height="180"/></li>	
			{/if}
		        {/if}
		  </ul>
		    </div>
                    <div class="action">
                      <ul class="clearfix">
		        	
                        <li class="a1"> <a href="javascript:void(0);" id="likepublic{$recent_activities[i].iRecentActivityId}" onclick="qmelikepublic('{$recent_activities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$recent_activities[i].iRecentActivityId}','1');">Q Like</a> </li>
                        <li class="a2"><a href="#Share" id="share{$recent_activities[i].iRecentActivityId}" class="share">Share</a></li>
			
                      </ul>
                    </div>
                  </div>
	<div class="cl"></div>
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
		numcom('{/literal}{$recent_activities[i].iRecentActivityId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','recent_activity','{/literal}{$recent_activities[i].iRecentActivityId}{literal}');
		qmelikepublic('{/literal}{$recent_activities[i].iRecentActivityId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','recent_activity','{/literal}{$recent_activities[i].iRecentActivityId}{literal}','0');
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
		function showcomment1(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
			var url = site_url+"/index.php?file=a-ajcommentlist_actvt";
			var pars = extra;
			
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
			function savecomment1(IRecentId,IUserId,Type,Itemid)
			{
				
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
			var comment = $('#usercomment').val();
			extra+='&comment='+comment;
			var url = site_url+"/index.php?file=a-ajcommentlist_actvt";
			var pars = extra;
			$.post(url+pars,
			function(data1) {
			$(document).ready(function () {				
                            $.fancybox(data1,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',
                             'onComplete': function() { 
				jQuery("#fancybox-wrap, #fancybox-overlay").delay(1000).fadeOut();
				} });
                        });
				});
			}
		</script>
		{/literal}
	</div>
</div>
{/section}
<div class="more_recent_activity">
    {if $totRec gt $rec_limit}
        <a onclick="displaypublicprofile({$start},{$iMemberId})" style="cursor:pointer;">More Recent Activity <img src="{$tconfig["front_images"]}bot-arrow.png" alt="" title="" /><div class="ProcessingIndicationPublic Navigation Publicnews"  style="margin-bottom:-8px;margin-top:-20px;" id="recentactivity_loading"></div></a>
	
    {else}
        <div class="no_more_word">No More Recent Activity..</div>
    {/if}    
</div>

{else}
<div style="text-align:center;color:red;">No Recent activities available</div>
{/if}

{literal}
<script type="text/javascript">
$('#recentactivity_loading').show();
</script>
{/literal}