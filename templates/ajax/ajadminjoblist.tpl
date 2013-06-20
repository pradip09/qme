<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>

{if  $PostJobArr|@count gt 0}
{section name=i loop=$PostJobArr}
<div class="jobbox">
	<div class="jobleft"> <img src="{$tconfig["front_images"]}jobs.png" width="128" height="128" /><a href="javascript:void(0);" class="postedby">Admin</a> </div>
	<div class="jobright">
		<h3 class="jobtitle">{$PostJobArr[i].vSkill}</h3>
		<p> <span class="jobdate">Posted on {$PostJobArr[i].dAddedDate}</span> {$PostJobArr[i].tDescription} <a href="#readJob{$PostJobArr[i].iPostJobId}" class="description">Read more..</a> </p>
		<div class="likejob_box">
			<ul class="navjob">
				<li class="linkbtn"> <a  href="javascript:void(0);" id="likepost{$PostJobArr[i].iPostJobId}" onclick="qmelike('{$PostJobArr[i].iPostJobId}','{$mem_info[0].iMemberId}','Post_job','{$PostJobArr[i].iPostJobId}','1');">Like</a>&nbsp;|</li>
				<li class="linkbtn"> <a  href="#Share" id="share1{$db_recentactivities[i].iRecentActivityId}"  class="share">Share</a> &nbsp;|</li>
				{if $iUserId neq ''}
				<li class="linkbtn"> <a  href="#respond{$PostJobArr[i].iPostJobId}" id="respond1{$PostJobArr[i].iPostJobId}" class="respond">Respond</a> &nbsp;|</li>
				{/if}
				<!--<li class="linkbtn"> <a href="javascript:void(0);">Report if this is not a job</a></li>-->
			</ul>
		</div>
		<!--likejob box ends here-->
	</div>
</div>
<div style="display:none">
	<div id="readJob{$PostJobArr[i].iPostJobId}" class="readpoppup">
		<div>
			<div class="popupheadding">{$PostJobArr[i].vSkill}</div>
			<div class="popuptext">{$PostJobArr[i].tFullDescription}</div>
		</div>
	</div>
</div>

<div style="display:none">
	<div id="respond{$PostJobArr[i].iPostJobId}" class="readpoppup">
		<form id="frm_respond{$PostJobArr[i].iPostJobId}" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajrespond" method="POST" name="frm_respond">
			<input type="hidden" name="iPostJobId" value="{$PostJobArr[i].iPostJobId}">
			<div>
				<center>
					<div id="error_msgshow{$PostJobArr[i].iPostJobId}" style="font-size:13px;color:red;"></div>
				</center>
			</div>
			<div>
				<textarea rows="4" cols="50" class="textarea" id="msg_data{$PostJobArr[i].iPostJobId}" name="msg_data"></textarea>
			</div>
			<div class="attach" id="attach" onclick="replc({$PostJobArr[i].iPostJobId});"><a style="cursor: pointer;">Attach a File</a></div>
			<div class="browsedId"></div>
			<div class="browse">
				<input onchange="showBrowsedValue({$PostJobArr[i].iPostJobId});" id="Afile{$PostJobArr[i].iPostJobId}" name="Afile" class="file" type="file" title="File" size="20">
			</div>
			<div class="popupheadding" style="float: left;  padding-top: 4px;">
				<label> Link : </label>
				<input type="text" id="respond_link{$PostJobArr[i].iPostJobId}" name="respond_link"  class="inpuptbox"/>
			</div>
			<div class="btncommnet">
				<input class="btnbg " type="button" value="Send" onclick="return sendemail({{$PostJobArr[i].iPostJobId}});" style="float:right;">
				<div class="cl"></div>
			</div>
			<div class="note_ht">[Note : Give url with http://]</div>
		</form>
	</div>
</div>
{literal}
<script type="text/javascript">
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
		$('#likepost'+Id+'').html(Data);
	});
	}
</script>
{/literal}
{/section}
<div class="paginationarea">
	<ul class="pagination paginationI paginationI05">
		<li align="right" id="paging"> {$pages} </li>
	</ul>
</div>
<!--pagination class ends here-->
{else}
<div class="slider_bot_box" style="margin-left: 103px;margin-right: 115px;">
<div style="text-align:center;color:#EEEDEB;">No Job Found</div>
</div>
{/if}

{literal}
<script>

function sendemail(Id){	
	$("#frm_respond"+Id).ajaxForm({
		target:'#error_msgshow'+Id,
		success: finish
		}).submit();
}
function finish(){
	$('input:text').val("");
	$('select').val("");
	$('textarea').val("");
	$('input:file').val("");
	setTimeout("parent.jQuery.fancybox.close();", 5000);
}
	
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

$(document).ready(function(){
$('.browse').hide();
$('.respond').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});

function replc(id)
{
	$('#Afile'+id).click();
}
function showBrowsedValue(idd){
	
	$(".browsedId").html('<lable>'+$('#Afile'+idd).val()+'</lable>');
}


</script>
{/literal}