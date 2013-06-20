<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


{if  $PhotoArr|@count gt 0}
{section name=i loop=$PhotoArr}
<li>
		
        <ul>
                <li class="MyphotoImg">
			<a class="fancybox-thumb" rel="fancybox-thumb" href="{$PhotoArr[i].vImagePopup}"><img src="{$PhotoArr[i].vImage}" class="myphotoimg"/></a>
		
		<li class="MyphotoTxt">{$PhotoArr[i].vPhotoTitle}</li>
		<li class="edit_delete_btn"><a href="{$site_url}/myphotodetail/{$PhotoArr[i].iPhotoId}"><img src="{$tconfig["front_images"]}edit.png" title="edit photo" class="edit_photo"/></a>
		<img src="{$tconfig["front_images"]}delete.1.png" title="delete photo" onclick="deleteitem({$PhotoArr[i].iPhotoId},'image');" style="cursor:pointer;padding-left:5px;"/>
	<div class="like_photo"><a href="javascript:void(0);" id="likepublic{$PhotoArr[i].iPhotoId}" onclick="qmelikepublic('{$PhotoArr[i].iPhotoId}','{$mem_info[0].iMemberId}','Photo','{$PhotoArr[i].iPhotoId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$PhotoArr[i].iPhotoId}" onclick="showcomment('{$PhotoArr[i].iPhotoId}','{$mem_info[0].iMemberId}','Photo','{$PhotoArr[i].iPhotoId}');">Comment</a><a href="javascript:void(0);" id="countcom{$PhotoArr[i].iPhotoId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$PhotoArr[i].iPhotoId}" class="share">Share</a></div>
	</li>
        </ul>
</li>

<div style="display:none">
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
	numcom('{/literal}{$PhotoArr[i].iPhotoId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Photo','{/literal}{$PhotoArr[i].iPhotoId}{literal}');
		qmelikepublic('{/literal}{$PhotoArr[i].iPhotoId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Photo','{/literal}{$PhotoArr[i].iPhotoId}{literal}','0');
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
		    $(document).ready(function() {
			$(".fancybox-thumb").fancybox({
			prevEffect	: 'none',
			nextEffect	: 'none',
			helpers	: {
			title	: {
				type: 'outside'
			},
			overlay	: {
				opacity : 0.8,
				css : {
					'background-color' : '#000'
				}
			},
			thumbs	: {
				width	: 100,
				height	: 100
			}
			}
			});
			});
		    </script>
		    {/literal}
            </div>
{/section}

<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>

{else}
<div style="text-align:center;color:red;">No photo available in this album</div>
{/if}
{literal}
<script>

$(document).ready(function(){
$('.first').fancybox({
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