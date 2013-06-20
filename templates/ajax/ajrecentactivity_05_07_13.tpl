<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
{if  $db_recentactivities|@count gt 0}
{section name=i loop=$db_recentactivities}

<div id="comment-block">
          <ul>
            <li>
              <div class="comment-img"><a href="{$site_url}/{$db_recentactivities[i].vMemberUrl}"><img src="{$db_recentactivities[i].vProfileImage}" alt=""  title=""></a></div>
	      
              <div class="comment-post">
                <div class="comment-arrow"></div>
                <div class="comment-head">
                  <h1><a href="{$site_url}/{$db_recentactivities[i].vMemberUrl}">{$db_recentactivities[i].vName}</a> - <span>{$db_recentactivities[i].dAddedDate}</span></h1>
                  <div class="comment"><a id="countcom{$db_recentactivities[i].iRecentActivityId}"></a> <a href="javascript:void(0);" id="comment{$db_recentactivities[i].iRecentActivityId}" onclick="showcomment('{$db_recentactivities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$db_recentactivities[i].iRecentActivityId}');"> Comments</a></div>
                </div>
                <div class="comment-content">
                  <p>{$db_recentactivities[i].vDescription} {if $db_recentactivities[i].eType eq 'status_update'}:{$db_recentactivities[i].eNameActivity}{/if}</p>
                </div>
		<div>
		<ul>
		     {if $db_recentactivities[i].vImage neq ''}
		     {if $db_recentactivities[i]['eType'] == 'approve_friend_request' || $db_recentactivities[i]['eType'] == 'status_update'}
		     <li ><img src="{$db_recentactivities[i].vImage}" alt="" width="71" height="71"/></li>
		     {else}
		     <li ><img src="{$db_recentactivities[i].vImage}" alt="" width="252" height="180"/></li>
		     {/if}
		    {/if}
		</ul>
		</div>
                <div class="comment-foot">
                  <ul>
		    
                    <li class="like"><a href="javascript:void(0);"> &nbsp;</a>  <a href="javascript:void(0);" onclick="qmelike('{$db_recentactivities[i].iRecentActivityId}','{$mem_info[0].iMemberId}','recent_activity','{$db_recentactivities[i].iRecentActivityId}','1');" id="likedata{$db_recentactivities[i].iRecentActivityId}"> Q Like</a> </li>
                    <li class="share"><a href="#Share" id="share{$db_recentactivities[i].iRecentActivityId}" class="share1"> Share</a></li>
		     <li class="delete"><a href="javascript:void(0);" onclick="delcomment('{$db_recentactivities[i].iRecentActivityId}');"  class="test" >Delete</a></li>
		    {if $db_recentactivities[i].eType eq 'PostJob' || $db_recentactivities[i].eType eq 'Post_job'}
		    <li class="share"><a href="#respond{$db_recentactivities[i].iRecentActivityId}" id="respond1{$db_recentactivities[i].iRecentActivityId}" class="respond">Respond</a></li>
		    {/if}
		    {if $db_recentactivities[i].iType eq 'Private'}
		   <li class="share"><a href="#popmsg{$db_recentactivities[i].iRecentActivityId}"  class="test" >Send a Massage</a></li>
		{/if}
                  </ul>
                </div>
		
              </div>
            </li>
          </ul>
          
        </div>

<div style="display:none">
	<div id="popmsg{$db_recentactivities[i].iRecentActivityId}" class="readpoppup">
	<form id="frm_msg{$db_recentactivities[i].iRecentActivityId}" enctype="multipart/form-data"  method="POST" name="frm_msg">
		<!--<input type="hidden" name="iRecentActivityId" value="{$db_recentactivities[i].iRecentActivityId}">
		<div><center><div id="errormsg{$db_recentactivities[i].iRecentActivityId}" style="font-size:13px;color:red;"></div></center></div>-->
		<div><textarea rows="4" cols="50" class="textarea" id="data_msg{$db_recentactivities[i].iRecentActivityId}" name="data_msg"></textarea></div>
						
		<div class="btncommnet">
			<input class="btnbg " type="button" value="Send message" onclick= "Sendmsg('Private','{$db_recentactivities[i].iRecentActivityId}','{$db_recentactivities[i].iMemberId}');" style="float:right;">
			<div class="cl"></div>
		</div>
	</form>
	</div>
</div>
<div style="display:none">
	<div id="respond{$db_recentactivities[i].iRecentActivityId}" class="readpoppup">
	<form id="frm_respond{$db_recentactivities[i].iRecentActivityId}" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajrespond" method="POST" name="frm_respond">
		<input type="hidden" name="iRecentActivityId" value="{$db_recentactivities[i].iRecentActivityId}">
		<div><center><div id="error_msgshow{$db_recentactivities[i].iRecentActivityId}" style="font-size:13px;color:red;"></div></center></div>
		<div><textarea rows="4" cols="50" class="textarea" id="msg_data{$db_recentactivities[i].iRecentActivityId}" name="msg_data"></textarea></div>
		<div class="attach" id="attach" onclick="replc({$db_recentactivities[i].iRecentActivityId});"><a style="cursor: pointer;">Attach a File</a></div>
		<div class="browsedId"></div>
		<div class="browse">
			<input onchange="showBrowsedValue({$db_recentactivities[i].iRecentActivityId});" id="Afile{$db_recentactivities[i].iRecentActivityId}" name="Afile" class="file" type="file" title="File" size="20">
		</div>
		<div class="popupheadding" style="float: left;  padding-top: 4px;"><label> Link : </label><input type="text" id="respond_link{$db_recentactivities[i].iRecentActivityId}" name="respond_link"  class="inpuptbox"/></div>
		<div class="btncommnet">
			<input class="btnbg " type="button" value="Send" onclick="return sendemail({{$db_recentactivities[i].iRecentActivityId}});" style="float:right;">
			<div class="cl"></div>
		</div>
		<div class="note_ht">[Note : Give url with http://]</div>
	</form>
	</div>
</div>



{literal}
<script type="text/javascript">
function delcomment(id){	 
		    
	        var html='';
		html+='<div class="popup_box" style="height:60px;">';			  	
		html+='<div  style="text-align:center;line-height:24px;color:#5E5E5E" class="errormsg">Are you sure to delete this post</div>';
		html+='<div class="cancelar_btn" style="margin-left:247px;margin-top:10px;" ><a href="javascript:void(0);" onclick="$.fancybox.close();"><img src="'+site_url+'/public/images/no_btn.png"  alt="" /></a></div>';
		html+='<div class="cancelar_btn" style="margin-left:191px;margin-top:-30px;"><a href="javascript:void(0);" onclick="postdel('+id+')"><img src="'+site_url+'/public/images/yes_btn.png"  alt="" /></a></div>';
		html+='<div>';
		//alert(html);
		$(document).ready(function () {				
			$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		});
	   
}
function postdel(id){
	         
	  var extra ='';
	  extra+='&id='+id;
	  extra+='&type=comment';	  
	  var url = site_url+"/index.php?file=a-ajdeletedata";
	  var pars = extra;
	  $.post(url+pars,
	  function(data) {
		  window.location= site_url+'/myaccount';
	  });
	  
}


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

</script>
<script type="text/javascript">
numcom('{/literal}{$db_recentactivities[i].iRecentActivityId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','recent_activity','{/literal}{$db_recentactivities[i].iRecentActivityId}{literal}');
qmelike('{/literal}{$db_recentactivities[i].iRecentActivityId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','recent_activity','{/literal}{$db_recentactivities[i].iRecentActivityId}{literal}','0');
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

	$('#likedata'+Id+'').html(Data);
});
}

function showcomment(IRecentId,IUserId,Type,Itemid)
{
	
	var extra ='';
	extra+='&iRecentId='+IRecentId;
	extra+='&iUserId='+IUserId;
	extra+='&type='+Type;
	extra+='&itemid='+Itemid;
//alert(extra);
	var url = site_url+"/index.php?file=a-ajcommentlist";
	var pars = extra;
	
	$.post(url+pars,
	function(data) {
		//alert(data);
			$(document).ready(function () {			
	 $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    
		});
	});
}
function savecomment(IRecentId,IUserId,Type,Itemid)
{
	//alert('cvbvb');
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
		
<div class="page_link">
    <span style="float:left; padding-top:3px;">{$recmsg}</span>
    <span class="nav" style="float:right;"><div align="right" id="paging">{$pages}</div></span>	
</div>
<div class="cl"></div>
{else}
<!--<div class="whitebg"><h1>MY QME INC WELCOMES YOU!</h1>
Begin by following step one, load your profile image, add your skills, connect to your other social networks and more it's easy. Complete steps 1 - 5 to receive your 500 free QME points, begin getting paid offers start racking up your QME rewards.</div>-->

<div class="whitebg"><h1>Welcome To MYQME.COM</h1>
Begin by completing your my profile setup section 1-4 under the(My  Profile) tab to collect your first 500 QME points.</div>
		{/if}
		
{literal}
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-503714094bb367f5"></script>
<script>


$(document).ready(function(){
$('.share1').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});

$(document).ready(function(){
$('.test').fancybox({
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

function sendemail(Id){
	//alert('hello');
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
	
function replc(id)
{
	$('#Afile'+id).click();
}
function showBrowsedValue(idd){
	
	$(".browsedId").html('<lable>'+$('#Afile'+idd).val()+'</lable>');
}
</script>
{/literal}