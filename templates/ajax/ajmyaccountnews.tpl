
{if  $relevent_news|@count gt 0}
{section name=i loop=$relevent_news}

<div class="newswrap">
          	<a href="{$site_url}/detail_news/{$relevent_news[i].iNewsId}"><img src="{$relevent_news[i].vImage}" width="64" height="64"/></a>
		
        	<div class="topnews">
         		<span class="news_title"><a style="color:#4D85AC" href="{$site_url}/detail_news/{$relevent_news[i].iNewsId}">{$relevent_news[i].vTitle} ...</a></span>
		        <span class="number_comments"><a href="javascript:void(0);" id="countcomnews{$relevent_news[i].iNewsId}"></a>&nbsp;<a href="javascript:void(0);" id="news{$relevent_news[i].iNewsId}" onclick="showcomment2('{$relevent_news[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$relevent_news[i].iNewsId}');">Comments</a></span>
		        <span class="news_date"> {$relevent_news[i].dAddedDate}</span>
				<p>{$relevent_news[i].vDescription}
				<a href="#">More</a>
				</p>
		</div> 
		<div class="likebox_activity">
				<ul class="navact">
						
				       <li><a style="color: #999;" class="likeicon" href="javascript:void(0);" id="likenews{$relevent_news[i].iNewsId}" onclick="qmelikenews('{$relevent_news[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$relevent_news[i].iNewsId}','1');">Q Like</a></li>
				       <li><a style="color: #999;" href="#Share" id="share{$relevent_news[i].iNewsId}" class="shareicon">Share this</a></li>
				       <li><a style="color: #999;" href="javascript:void(0);" class="qtagicon">Qtag</a></li>
				       <li ><a style="color: #999;" href="#popmsg{$relevent_news[i].iNewsId}"  class="shareicon" >Post Comment</a></li>
				       
				</ul>
		</div>
		
		<div style="display:none">
				<div id="popmsg{$relevent_news[i].iNewsId}" class="readpoppup">
				<form id="frm_msg{$relevent_news[i].iNewsId}" enctype="multipart/form-data"  method="POST" name="frm_msg">
					<!--<input type="hidden" name="iRecentActivityId" value="{$db_recentactivities[i].iRecentActivityId}">
					<div><center><div id="errormsg{$db_recentactivities[i].iRecentActivityId}" style="font-size:13px;color:red;"></div></center></div>-->
					<div><textarea rows="4" cols="50" class="textarea" id="data_msg{$relevent_news[i].iNewsId}" name="data_msg"></textarea></div>
									
					<div class="btncommnet">
						<input class="btnbg " type="button" value="Send message" onclick= "Sendmsg('Private','{$relevent_news[i].iNewsId}','{$relevent_news[i].iMemberId}');" style="float:right;margin-right: 0px;">
						<div class="cl"></div>
					</div>
				</form>
				</div>
		</div>
		

     </div> 
     
     
     
     


{literal}
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
$('#releventnews_loading').show();
</script>
<script type="text/javascript">
function Sendmsg(eType,id,iMemberId){	
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

 <div class="newswrap">
           <a href="{$site_url}/blog_detail/{$code}/{$db_bloglistmatch[i].iBlogId}" ><img src="{$db_bloglistmatch[i].vImage}" width="64" height="64"/></a>
           
     			<div class="topnews">
         		<span class="news_title"<a href="{$site_url}/blog_detail/{$code}/{$db_bloglistmatch[i].iBlogId}">{$db_bloglistmatch[i].vBlogTitle}</a></span>                 
				 <span class="number_comments"><a href="javascript:void(0);" id="countcom{$db_bloglistmatch[i].iBlogId}" ></a><a href="javascript:void(0);" id="blogcom{$db_bloglistmatch[i].iBlogId}" onclick="showcomment3('{$db_bloglistmatch[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$db_bloglistmatch[i].iBlogId}');">Comments</a></span>
				 <span class="news_date">{$db_bloglistmatch[i].dAddedDate}</span>
				<p>
				{$db_bloglistmatch[i].vText}
				<a href="#">More</a>
				</p>
		      </div>
		      <div class="likebox_activity">						 
				      <ul class="navact">							 
						<li><a style="color: #999;" class="likeicon" href="javascript:void(0);" id="likeblogs{$db_bloglistmatch[i].iBlogId}" onclick="qmelike('{$db_bloglistmatch[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$db_bloglistmatch[i].iBlogId}','1');">Qlike</a></li>
						<li><a style="color: #999;" href="#Share" id="share{$db_bloglistmatch[i].iBlogId}" class="shareicon">Share this</a></li>
						<li><a style="color: #999;" href="javascript:void(0);" class="qtagicon">Qtag</a></li>
						 <li ><a style="color: #999;" href="#popmsg1{$db_bloglistmatch[i].iBlogId}"  class="commenticon" >Post Comment</a></li>
												 
				     </ul> 					 
		     </div>
		      <div style="display:none">
				<div id="popmsg1{$db_bloglistmatch[i].iBlogId}" class="readpoppup">
				<form id="frm_msg{$db_bloglistmatch[i].iBlogId}" enctype="multipart/form-data"  method="POST" name="frm_msg">
					<!--<input type="hidden" name="iRecentActivityId" value="{$db_recentactivities[i].iRecentActivityId}">
					<div><center><div id="errormsg{$db_recentactivities[i].iRecentActivityId}" style="font-size:13px;color:red;"></div></center></div>-->
					<div><textarea rows="4" cols="50" class="textarea" id="data_msg{$db_bloglistmatch[i].iBlogId}" name="data_msg"></textarea></div>
									
					<div class="btncommnet">
						<input class="btnbg " type="button" value="Send message" onclick= "Sendmsg('Private','{$db_bloglistmatch[i].iBlogId}','{$db_bloglistmatch[i].iMemberId}');" style="float:right;margin-right: 0px;">
						<div class="cl"></div>
					</div>
				</form>
				</div>
		</div>
        
     
</div>





{literal}

<script type="text/javascript">
function Sendmsg1(eType,id,iMemberId){	
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
</script>
{/literal}
	
{/section}


<div class="more_recent_activity">
	
    {if $totRec gt $rec_limit}
        <a onclick="displayreleventnews({$start},{$iMemberId})" class="btn_more_activity" >More activity <span></span><div class="ProcessingIndicationPublic Navigation Publicnews" id="releventnews_loading"></div></a>
	
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
