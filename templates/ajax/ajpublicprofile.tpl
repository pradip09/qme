{if  $recent_activities|@count gt 0}
{section name=i loop=$recent_activities}

<div class="commentwrap_nfl">
            	<a href="{$recent_activities[i].memurl}"><img src="{$recent_activities[i].vProfileImage}" style="height: 64px;width:64px;"></a>
            <div class="commentbox_nfl">
     
     			<div class="topcomment">
         			<span class="comment_title"><a style="color: #3D6A89" href="#">{$recent_activities[i].vName}</a> </span> said
				<span class="number_comments">
				<a href="javascript:void(0);" id="countcom{$recent_activities[i].iRecentActivityId}" ></a><a href="#" onclick="showcomment1('{$recent_activities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$recent_activities[i].iRecentActivityId}');">Comments</a></span><br>
				<span class="comment_time" >{$recent_activities[i].dAddedDate}</span>
				
					<ul>
					 {if $recent_activities[i].vImage neq ''}
					 <li ><img src="{$recent_activities[i].vImage}" alt="" width="252" height="180"/></li>
					{/if}
			        </ul>	      
				
				<p style="width:100%;">
			             {$recent_activities[i].vDescription}
				     <a onclick="toggleText('{$recent_activities[i].iRecentActivityId}');" pid="{$recent_activities[i].iRecentActivityId}" style="cursor:pointer;">More</a>
				   <br/>
				    <span class="slide{$recent_activities[i].iRecentActivityId}" style="display:none;">
			               <a href="{$recent_activities[i].link}" style="color: #3D6A89">{$recent_activities[i].eNameActivity}</a>				   
				    </span>
				</p>			
				
			      
   
			   </div> 
			    <div class="likebox_activity_nfl">
						 
			   <ul class="navact">
			        <li><a href="javascript:void(0);" class="likeicon" id="likepublic{$recent_activities[i].iRecentActivityId}" style="color: #999;" onclick="qmelikepublic('{$recent_activities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$recent_activities[i].iRecentActivityId}','1');">Cheers</a></li>
			        <li><a href="#Share" id="share{$recent_activities[i].iRecentActivityId}" style="color: #999;" class="shareicon">Share</a></li>			
			       <li ><a  href="#popmsg{$recent_activities[i].iRecentActivityId}"   style="color: #999;"class="commenticon" >Post Comment</a></li>
			   </ul>
						 
						 
           </div>
<div style="display:none">
	<div id="popmsg{$recent_activities[i].iRecentActivityId}" class="readpoppup">
	<form id="frm_msg{$recent_activities[i].iRecentActivityId}" enctype="multipart/form-data"  method="POST" name="frm_msg">
		<div><textarea rows="4" cols="50" class="textarea" id="data_msg{$recent_activities[i].iRecentActivityId}" name="data_msg"></textarea></div>
						
		<div class="btncommnet">
			<input class="btnbg " type="button" value="Send message" onclick="postMsg('Private','{$recent_activities[i].iRecentActivityId}','{$recent_activities[i].iPostMemberId}');" style="float:right;margin-right: 0px;">
			<div class="cl"></div>
		</div>
	</form>
	</div>
    </div>
     </div>
     </div>
     
     
     
{literal}
<script type="text/javascript">

function toggleText(id) {
	   $(".slide"+id).toggle(function() {
    
  });
  
}
$(document).ready(function(){
$('.commenticon').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});

function postMsg(eType,id,iMemberId){
	  
	var extraa ='';
	extraa+='&eType='+eType;
	var text = $('#data_msg'+id).val();
	extraa+='&text='+text;
	extraa+='&iMemberId='+iMemberId;
	
	var url = site_url+"/index.php?file=a-ajmymsgsend";
	var pars = extraa;
	//alert(url+pars);
	$.post(url+pars,
	function(data) {
	  
	if(data == 'success'){
	 
	var html='';
	html+='<div  class="signing" style="height:100px;">';
	html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Message send Successfully.</div>';
	html+='<div>';
	//alert(html);
	$(document).ready(function () {				
		$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	});
	}else{
	
	var html='';
	html+='<div  class="signing" style="height:100px;">';
	html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Message could not be sent.</div>';
	html+='<div>';
	//alert(html);
	$(document).ready(function () {				
		$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	});	
		
	}
		});
	
}

</script>
	<script type="text/javascript">
	$(document).ready(function(){
	$('.shareicon').fancybox({
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
    <!---<a onclick="displaypublicprofile({$start},{$iMemberId})"  class="btn_more_activity white" >More activity <span></span></a>-->
        <a onclick="displaypublicprofile({$start},{$iMemberId})"  class="btn_more_activity white" >More  Activity <img src="{$tconfig["front_images"]}bot-arrow.png" alt="" title="" /><div class="ProcessingIndicationPublic Navigation Publicnews"  style="margin-bottom:-8px;margin-top:-20px;" id="recentactivity_loading"></div></a>
	
    {else}
        <div class="no_more_word" style="color:#fff;">No More Recent Activity..</div>
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