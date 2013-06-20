{literal}
	<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
	
{/literal}
{if  $SongArr|@count gt 0}
<table>
<tr>
	<th style="padding-bottom:10px;text-align:left;">Song Title</th>
</tr>
{section name=i loop=$SongArr}
<tr>
	<td class="detail_name">
		<div class="playicon" id="displaydiv{$SongArr[i].iSongId}"><a href="#"><img src="{$tconfig["front_images"]}play-icon.png" alt="" title=""  onclick="playmusic('{$SongArr[i].iSongId}','{$SongArr[i].vSong}','{$SongArr[i].iMemberId}')"/></a></div>
		{$SongArr[i].vSongTitle}
	</td>
	<td><div class="like_photo"><a href="javascript:void(0);" id="likepublic{$SongArr[i].iSongId}" onclick="qmelikepublic('{$SongArr[i].iSongId}','{$mem_info[0].iMemberId}','Song','{$SongArr[i].iSongId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$SongArr[i].iSongId}" onclick="showcomment('{$SongArr[i].iSongId}','{$mem_info[0].iMemberId}','Song','{$SongArr[i].iSongId}');">Comment</a><a href="javascript:void(0);" id="countcom{$SongArr[i].iSongId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$SongArr[i].iSongId}" class="share">Share</a></div></td>
</tr>


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
	numcom('{/literal}{$SongArr[i].iSongId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Song','{/literal}{$SongArr[i].iSongId}{literal}');
		qmelikepublic('{/literal}{$SongArr[i].iSongId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Song','{/literal}{$SongArr[i].iSongId}{literal}','0');
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
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
</script>
{/literal}
{literal}
<script type="text/javascript">
function playmusic(id,file,userId)
{
						
 var html = '';
	    html += '<object type="application/x-shockwave-flash" data="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" width="200" height="20" id="dewplayer" name="dewplayer">';
	    html += '<param name="wmode" value="transparent" />';
	    html += '<param name="movie" value="{/literal}{$tconfig["tsite_music"]}/dewplayer.swf{literal}" />';
	    html += '<param name="flashvars" value="mp3={/literal}{$tconfig["tsite_upload_music_song"]}{literal}'+userId+'/'+file+'&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />';
	    html += '</object>';
            
	    $('#displaydiv'+id).html(html);
}
</script>
{/literal}

{/section}
</table>
<div class="page_link"> <span style="padding-left:10px; float:left;font-size:14px;">{$recmsg}</span> <span class="nav" style="float:right">
	<div align="right" id="paging"> {$pages} </div>
	</span> </div>
{else}
<div style="text-align:center;color:red;">No Song available in this album</div>
{/if} 
