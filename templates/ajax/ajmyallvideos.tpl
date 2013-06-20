
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

{if  $VideosArr|@count gt 0}
{section name=i loop=$VideosArr}

<div class="VedioReaptBox">
		<div id="displayboxdiv{$VideosArr[i].iVideoId}" class="VedioImg">		
			<a href="javascript:void(0);">
			<img src="{$VideosArr[i].vImage}" width="213px;" height="131px;" class="transperent_video" onclick="playvideo('{$VideosArr[i].iVideoId}','{$VideosArr[i].vVideo}','{$VideosArr[i].iMemberId}','{$VideosArr[i].eVideotype}','{$VideosArr[i].vVideolink}')"/>
			</a>
		
		</div>
		<div class="VedioText">{$VideosArr[i].vVideoName}</div>
		<div class="edit_delete_btn"><a href="{$site_url}/myvideodetail/{$VideosArr[i].iVideoId}" class="first"><img src="{$tconfig["front_images"]}edit.png" title="edit video" class="edit_photo"/></a>
                	<img src="{$tconfig["front_images"]}delete.1.png" title="delete video" onclick="deleteitem({$VideosArr[i].iVideoId},'video');" style="cursor:pointer;padding-left:5px;"/></div>
		<div class="like_photo"><a href="javascript:void(0);" id="likepublic{$VideosArr[i].iVideoId}" onclick="qmelikepublic('{$VideosArr[i].iVideoId}','{$mem_info[0].iMemberId}','Video','{$VideosArr[i].iVideoId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$VideosArr[i].iVideoId}" onclick="showcomment('{$VideosArr[i].iVideoId}','{$mem_info[0].iMemberId}','Video','{$VideosArr[i].iVideoId}');">Comment</a><a href="javascript:void(0);" id="countcom{$VideosArr[i].iVideoId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$VideosArr[i].iVideoId}" class="share">Share</a></div>
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
	numcom('{/literal}{$VideosArr[i].iVideoId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Video','{/literal}{$VideosArr[i].iVideoId}{literal}');
		qmelikepublic('{/literal}{$VideosArr[i].iVideoId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Video','{/literal}{$VideosArr[i].iVideoId}{literal}','0');
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
{literal}
<script type="text/javascript">
function playvideo(id,file,userId,type,link){
		
       var html = '';
		  if(type == 'Personal'){
		   html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="133" width="213" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_video"]}{literal}'+userId+'/'+file+'&plugins=sharing-2"/>';
		  }	 
	
       if(type == 'Youtube'){	    
		html = ''+link+'';
		//alert(html);
       }
         $('#displayboxdiv'+id).html(html);	
}

</script>
{/literal}

{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;font-size:14px;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">
        {$pages}
        </div></span>	
</div>
{else}
<div style="text-align:center;color:red;">No Video available in this album</div>
{/if}
