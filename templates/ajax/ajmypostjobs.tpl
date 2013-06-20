{if  $PostJobArr|@count gt 0}
{section name=i loop=$PostJobArr}
<div class="OppurtunitiesReaptBox_bg"><div class="OppurtunitiesReaptBox">
	<div class="GumbohleftImge">
		<div class="GumbohImge"> {if $user[0].iMemberId neq '0'} <img src="{$tconfig["tsite_upload_images_member"]}/{$user[0].iMemberId}/2_{$user[0].vProfileImage}"   alt=" " title="" border="0" /> {/if} </div>
		<div class="GumbohImgebottx"> {if $PostJobArr[i].iAdminId neq '0'}
			Admin	
			{else}
			{$PostJobArr[i].vName}
			{/if} </div>
	</div>
	<div class="GumbohContentTxt">
		<div class="browseedit_delete"><a href="{$site_url}/mypostjobadd/{$PostJobArr[i].iPostJobId}">Edit</a> | <a href="#" onclick="deleteitem({$PostJobArr[i].iPostJobId},'postjob');"> Delete</a></div>
		<h5>{$PostJobArr[i].vSkill}</h5>
		<div class="OppurtunitiesTxt">
			<div class="postjob_reapt_text">{$PostJobArr[i].tDescription}</div>
			<h6>{$PostJobArr[i].dAddedDate}</h6>
			
			<div class="BrowseJobLikeLink"><a href="javascript:void(0);" style="text-decoration:none;" onclick="qmelike('{$PostJobArr[i].iPostJobId}','{$mem_info[0].iMemberId}','Post_job','{$PostJobArr[i].iPostJobId}','1');" id="likejobs{$PostJobArr[i].iPostJobId}">QLike</a><span>|</span> <a href="#Share" id="share{$PostJobArr[i].iPostJobId}" class="share">Share</a><!--<span>|</span> <a href="#">Respond</a><span>|</span> <a href="#">Report if this is not a job</a> --></div>
			<a href="#readJob{$PostJobArr[i].iPostJobId}" class="description">Read more..</a><br/>
		</div>
		<div style="display:none">
			<div id="readJob{$PostJobArr[i].iPostJobId}" class="readpoppup">
				<div>
					<div class="popupheadding">{$PostJobArr[i].vSkill}</div>
					<div class="popuptext">{$PostJobArr[i].tFullDescription}</div>
				</div>
			</div>
		</div>
	</div>
</div></div>

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
			qmelike('{/literal}{$PostJobArr[i].iPostJobId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Post_job','{/literal}{$PostJobArr[i].iPostJobId}{literal}','0');
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
				$('#likejobs'+Id+'').html(Data);
			});
			}
		</script>
		{/literal}


{/section}
<div class="page_link"> <span style="padding-left:10px; float:left;">{$recmsg}</span> <span class="nav" style="float:right">
	<div align="right" id="paging"> {$pages} </div>
	</span> </div>
{else}
<div style="text-align:center;color:red;">No Post Job available</div>
{/if}

{literal}
<script>
	$(document).ready(function(){
	$('.description').fancybox({
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